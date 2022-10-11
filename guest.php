<?php

$dbAdr='mysql:host=localhost;dbname=opnion';//zmień s400883 na swój login
$user='root';// tak samo j.w.
$password='';//hasło do twjej bazy
$pdo=new PDO($dbAdr,$user,$password);//stworzenie obiektu połączenia z bazą danych

$info='';

if(isset($_POST['name'],$_POST['mark'])){
    if($_POST['name']!=''){
        
        if(strlen($_POST['name'])>15||strlen($_POST['comment'])>15){
            $info='<p>Błąd danych!</p>';
        }else{
            $reg=$pdo->prepare('INSERT INTO tab VALUES(NULL,? ,? ,? ,current_timestamp());');
            $reg->execute(array($_POST['name'],$_POST['mark'],$_POST['comment']));//dodanie rekordu do bazy danych
            $info="Pomyślnie opublikowano twoją opinię";}
    }else{
        $info='<p>Błąd danych!</p>';
    }
}else if(!isset($_POST['mark'])&&isset($_POST['name'])){
    $info='<p>Zaznacz opinię!</p>';
}//Sprwdzenie poprawności danych po stronie serwera(zabezpiecznie js jest banalne do złamania)


$part1='<section class="row">
    <div class="col-6">
        <h3>Wystaw ocenę</h3>
        <p>Jeżeli jesteś chętny, oceń tą strone</p>
        <form action="" method="post">  
            <label>Pseudonim:</label><br>
                <input type="text" name="name"><span class="err"></span><br>
            <label>Ocena:</label>
                <input type="radio" name="mark" value="1"><label>1</label>
                <input type="radio" name="mark" value="2"><label>2</label>
                <input type="radio" name="mark" value="3"><label>3</label>
                <input type="radio" name="mark" value="4"><label>4</label>
                <input type="radio" name="mark" value="5"><label>5</label><br>
            <label>Komentarz(opcjonalnie):</label><br>
                <input type="text" name="comment"><span class="err"></span><br><br>
            <input type="submit">
            '.$info.'
        </form>
    </div>
    <div class"col-6">
        <h3>Opinie</h3>
        <table border="1">
        <tr><td>Pseduonim</td><td>Ocena[0-5]</td><td>Komentarz</td><td>Data dodania</td></tr>';

$part2='</table>
    </div>
</section>';

$row=$pdo->query('SELECT MAX(`id`) FROM `tab`;')->fetch(PDO::FETCH_ASSOC);//sprawdznie największe go id

for($i=1;$i<=$row['MAX(`id`)'];$i++){
    $result=$pdo->query('SELECT `name`,`mark`,`comment`,`date` FROM `tab` WHERE id='.$i.';')->fetch(PDO::FETCH_ASSOC);//popbranie danych z bazy
    if($result['name']!='')
    $part1=$part1.'<tr><td>'.$result['name'].'</td><td>'.$result['mark'].'</td><td>'.$result['comment'].'</td><td>'.$result['date'].'</td></tr>';
        
}//dopisanie wierszy do tabeli

$page=$part1.$part2; //treść strony musiała być rozbita na dwie zmienne poniważ nie da się wstawić funcji w połączenie zmiennych tekstowych(konkatenacja)

$style='table{
    color:white;
    }
    input.err{
        border: solid red 2px;
    }
    span.err{
        color:red;
    }
    input[name=\'comment\']{
        width:50%;
    }
    ';//stylowanie tabeli

$script='submit=document.querySelector("input[type=\'submit\']");
span1=document.querySelectorAll("span.err")[0];
span2=document.querySelectorAll("span.err")[1];

document.querySelector("input[name=\'name\']").addEventListener("input",function(){
if(this.value.length>10){span1.innerHTML="Pseudonium za długi(MAX 10 znaków)";
   this.setAttribute("class","err");
   submit.disabled=true;
}else{
       span1.innerHTML="";
       this.removeAttribute("class");
       submit.disabled=false;
   }});

document.querySelector("input[name=\'comment\']").addEventListener("input",function(){
if(this.value.length>15){span2.innerHTML="Komentarz za długi(MAX 15 znaków)";
   this.setAttribute("class","err");
   submit.disabled=true;
}else{
       span2.innerHTML="";
       this.removeAttribute("class");
       submit.disabled=false;
   }  
  
  });';//skrypt wstępnie badający poprawność wprowadzonych danych
  
require("main.php");
unset($pdo);//zwolnienie obiektu połącznia z bazą
?>
