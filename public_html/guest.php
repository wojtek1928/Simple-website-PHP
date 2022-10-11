<?php
$dbAdr='mysql:host=localhost;dbname=s400883';
$user='s400883';
$password='orzelwojciech';
$pdo=new PDO($dbAdr,$user,$password);

$info='';

if(isset($_POST['name'],$_POST['mark'])){
    if($_POST['name']!=''){
        
        if(strlen($_POST['name'])>10||strlen($_POST['comment'])>15){
            $info='<p>Błąd danych!</p>';
        }else{
            $reg=$pdo->prepare('INSERT INTO tab VALUES(NULL,? ,? ,? ,current_timestamp());');
            $reg->execute(array($_POST['name'],$_POST['mark'],$_POST['comment']));
            $info="Pomyślnie opublikowano twoją opinię";}
    }else{
        $info='<p>Błąd danych!</p>';
    }
}else if(!isset($_POST['mark'])&&isset($_POST['name'])){
    $info='<p>Zaznacz opinię!</p>';
}


$part1='<section class="row">
    <div class="col-xl-6 col-sm-12">
        <h3>Wystaw ocenę</h3>
        <p>Jeżeli jesteś chętny, oceń tą strone</p>
        <form action="" method="post">  
            <label>Pseudonim:</label><br>
                <input type="text" name="name"><span class="err"></span><br><br>
            <label>Ocena:</label>
                <input type="radio" name="mark" value="1"><label>1</label>
                <input type="radio" name="mark" value="2"><label>2</label>
                <input type="radio" name="mark" value="3"><label>3</label>
                <input type="radio" name="mark" value="4"><label>4</label>
                <input type="radio" name="mark" value="5"><label>5</label><br><br>
            <label>Komentarz(opcjonalnie):</label><br>
                <input type="text" name="comment"><span class="err"></span><br><br>
            <input type="submit">
            '.$info.'
        </form>
    </div>
    <div class"col-xl-6 col-sm-12">
        <h3>Opinie</h3>
        <table border="1">
        <tr><td>Pseduonim</td><td>Ocena[0-5]</td><td>Komentarz</td><td>Data dodania</td></tr>';

$part2='</table>
    </div>
</section>';

$row=$pdo->query('SELECT MAX(`id`) FROM `tab`;')->fetch(PDO::FETCH_ASSOC);

for($i=1;$i<=$row['MAX(`id`)'];$i++){
    $result=$pdo->query('SELECT `name`,`mark`,`comment`,`date` FROM `tab` WHERE id='.$i.';')->fetch(PDO::FETCH_ASSOC);
    if($result['name']!='')
    $part1=$part1.'<tr><td>'.$result['name'].'</td><td>'.$result['mark'].'</td><td>'.$result['comment'].'</td><td>'.$result['date'].'</td></tr>';
        
}

$page=$part1.$part2;

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
    ';

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
       if(document.querySelector("input[name=\'comment\']").value.length<=15)submit.disabled=false;
   }});

document.querySelector("input[name=\'comment\']").addEventListener("input",function(){
if(this.value.length>15){span2.innerHTML="Komentarz za długi(MAX 15 znaków)";
   this.setAttribute("class","err");
   submit.disabled=true;
}else{
       span2.innerHTML="";
       this.removeAttribute("class");
       if(document.querySelector("input[name=\'name\']").value.length<=10)submit.disabled=false;
   }  
  
  });';
  
require("main.php");
?>