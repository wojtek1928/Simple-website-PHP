<?php
$page='<section class="row">
<div class="col-6">
    <h3>Strona wykonana w ramach Laboratorium Sieci Komputerowych i Baz Daznych</h3>
    <p>Strona WIMiR:</p>
    <a href="http://www.imir.agh.edu.pl/">Wydział Inżynierii Mechanicznej i Robotyki</a>
    <p>Strona laboratorium:</p>
    <a href="http://mts.wibro.agh.edu.pl/dydaktyka/skibd/">Sieci komputerowe i bazy danych</a>
    
</div>
<div class="col-6">
    <h3>Zadania z laboratoriów 1-5</h3>
    <button onclick="time()">Akutualny czas</button>
    <table border="1">
        <tr>
            <td>Godzina</td>
            <td>Data</td>
        </tr>
        <tr>
            <td id="time">
                
            </td>
            <td id="date">

            </td>
        </tr>
    </table>
    <span>Test wyświetlania polskich znaków (ą, ć, ę, ł, ń, ó, ś, ź, ż):</span>
    <a name="proverb"><p id="proverb">~"Łaska pańska na pstrym koniu jeździ"</p></a>
</div>
</section>';
$script='function time(){
    var data = new Date();
    document.getElementById("time").innerHTML=data.getHours()+":"+data.getUTCMinutes();
    document.getElementById("date").innerHTML=data.getUTCDate()+"/"+(data.getUTCMonth()+1)+"/"+data.getUTCFullYear();

}';//skrpt wyświetlający godzine
 require("main.php");
?>