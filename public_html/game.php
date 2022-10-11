<?php
$page='<h3>Gra w odbijanie kulki</h3>
<p>Gra polega na odbijaniu kulki paletką, którą steruje się przesuwając myszą po najechaniu na biały kwadrat. Z każdym odbiciem prędkość kulki wzrasta.</p>
<a href="#c" id="start"><button>Zagraj!</button></a><br>
<div class="col-12">
<a name="c"><canvas id="canvas"></canvas></a>
</div>';
$script=file_get_contents("game_js.js");
require("main.php")
?>