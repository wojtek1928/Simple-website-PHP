<?php
$page='<section class="row">
<div class="col-xl-6 col-md-12">
    <h3>Strona wykonana w ramach Laboratorium Sieci Komputerowych i Baz Daznych</h3>
    <p>Strona WIMiR:</p>
    <a href="http://www.imir.agh.edu.pl/" target="_blank">Wydział Inżynierii Mechanicznej i Robotyki</a>
    <p>Strona laboratorium:</p>
    <a href="http://mts.wibro.agh.edu.pl/dydaktyka/skibd/" target="_blank">Sieci komputerowe i bazy danych</a>
    
</div>
<div class="col-xl-6 col-sm-12">
    <h3>Zadania z laboratoriów 1-5</h3>
    <button onclick="time()">Akutualny czas</button>
    <table>
        <tr>
            <td>Godzina</td>
            <td>Data</td>
        </tr>
        <tr>
            <td id="time">
                --:--
            </td>
            <td id="date">
                --/--/----
            </td>
        </tr>
    </table>
    <span>Test wyświetlania polskich znaków (ą, ć, ę, ł, ń, ó, ś, ź, ż):</span>
    <a name="proverb"><p id="proverb">~"Łaska pańska na pstrym koniu jeździ"</p></a>
</div>
</section>';
$script='function time(){
    var data = new Date();
    var hour,minute,day,month;
    if(data.getHours()<10)hour=\'0\'+data.getHours();else hour=data.getHours();
    if(data.getUTCMinutes()<10)minute=\'0\'+data.getUTCMinutes();else minute=data.getUTCMinutes();
    if(data.getUTCDate()<10)day=\'0\'+data.getUTCDate();else day=data.getUTCDate();
    if((data.getUTCMonth()+1)<10)month=\'0\'+(data.getUTCMonth()+1);else month=(data.getUTCMonth()+1);
    document.getElementById("time").innerHTML=hour+":"+minute;
    document.getElementById("date").innerHTML=day+"/"+month+"/"+data.getUTCFullYear();
}';
$style='tr,td{
    border:dashed 1px white;
    text-align:center;
    }';
 require_once("main.php");
?>
