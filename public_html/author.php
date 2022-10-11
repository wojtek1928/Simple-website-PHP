<?php
$page='<h3>Autor</h3>
<p>Jestem studentem inżynierii mechatronicznej i pochodzę z okolicy Nowego Sącza. Ukończyłem technikum o profilu technik informatyk. Poniżej znajdują się zdjęcia nawiązujące do moich zainteresowań, jakimi są gra na trąbce, jazda na rowerze, chodzenie po górach i szeroko pojęta technika.</p>
<div id="carouselExampleIndicators" class="carousel slide col-10 align-self-center" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
    <img src="image1.jpg" alt="Błąd wczytywania obrazu" class="col-12">
    </div>
    <div class="carousel-item">
    <img src="image2.jpg" alt="Błąd wczytywania obrazu" class="col-12">
    </div>
    <div class="carousel-item">
    <img src="image3.jpg" alt="Błąd wczytywania obrazu" class="col-12">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>';

$style='#carouselExampleIndicators{
    margin: auto;
  }';
  
require("main.php");
?>
