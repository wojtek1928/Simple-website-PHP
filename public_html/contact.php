<?php
$info="";
if(isset($_POST['message'],$_POST['mail'])){
    if($_POST['mail']!=''&&$_POST['message']!=''){
        $message=$_POST['message'];
        $headers='From:'.$_POST['mail'];
        mail('worzel@student.agh.edu.pl','Pytanie ze strony',$message,$headers);
        $info="<p>Wiadomość została wysłana</p>";
    }else{
        $info="<p>Błąd danych!</p>";
    }
}

$page='<section class="row">
        <div class="col-xl-6 col-sm-12">
            <h3>Kontakt</h3>
            <p>Jeśli potrzebujesz kontaktu, wypełnij formularz obok.</p>
        </div>
        <div class="col-xl-6 col-sm-12">
            <h3>Formularz kontaktowy</h3>
            <form action="" method="post">
                <label>Twój adres e-mail:</label><br>
                <input type="email" placeholder="example@example.com" name="mail"><br>
                <label>Treść widaomości:</label><br>
                <textarea name="message" rows="10" placeholder="Wiadomość..."></textarea><br>
            <input type="submit">'.$info.'
            </form>
        </div>    
</section>';

$style='textarea,input{
        width:90%;
    }';

require("main.php");
?>


