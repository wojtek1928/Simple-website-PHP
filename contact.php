<?php
$info="";//zmienna komunikatów pod formularzem
if(isset($_POST['message'],$_POST['mail'])){//sprawdznie czy zmienne są zadelarowane
    if($_POST['mail']!=''&&$_POST['message']!=''){//sprawdznie czy zmienne nie są puste
        $message=$_POST['message']."\n Nadawca:".$_POST['mail'];
        mail("wojtek1928@gmail.com","Pytanie ze strony",$_POST['message']);//wysłanie maila
        $info="<p>Wiadomość została wysłana</p>";
    }else{
        $info="<p>Błąd danych!</p>";
    }
}

$page='<section class="row">
        <div class="col-md-6 col-xs-12">
            <h3>Kontakt</h3>
            <p>Jeśli potrzebujesz kontaktu, wypęłnij formularz obok.</p>
        </div>
        <div class="col-md-6 col-xs-12">
            <h3>Formularz kontaktowy</h3>
            <form action="" method="post">
                <label>Twój adres e-mail:</label><br>
                <input type="email" placeholder="example@example.com" name="mail"><br>
                <label>Treść widaomości:</label><br>
                <textarea name="message" rows="10" placeholder="Wiadomość...(NIE DZIAŁA BO NIE DAŁEM RADY SKONFIGUROWAĆ POCZTY)"></textarea><br>
            <input type="submit">'.$info.'
            </form>
        </div>    
</section>';

$style='textarea,input{
        width:90%;
    }';//stylowanie dużego pola tekstowego

require("main.php");
?>


