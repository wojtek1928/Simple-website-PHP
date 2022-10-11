<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Wojciech Orzeł</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="style.css">
    <?php if(isset($style))echo "<style>\n\t$style\n</style>\n"; ?>
</head>
<body>
    <header>
        <img src="logo1.png" alt="Wystąpił błąd pobierania obrazka" id="logo">
    </header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="index.php">Strona główna</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="author.php">Autor</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="raports.php">Sprawozdania</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="game.php">Gra</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="guest.php">Opinie</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="contact.php">Kontakt</a>
      </li>
    </ul>
  </div>
</nav>    
    <main class="container-fluid">
        <?php if(isset($page))echo "\t$page\n"; ?>
    </main>
    <footer>
        <p>Wykonał: Wojciech Orzeł</p>
    </footer>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="js/bootstrap.min.js"></script>
<script>
winMW=screen.width;

window.onload=function(){
img = document.querySelector("#logo");
imgMW = document.querySelector("#logo").width;

if(winMW<img.width){
      newWidth=winMW*0.8;
      img.style.setProperty("width", newWidth+"px");
    }else if(winMW>img.width&&img.width<imgMW){
      newWidth=winMW*0.8;
      img.style.setProperty("width", newWidth+"px");
    }}

window.addEventListener("resize", function() {
    if((0.8*window.innerWidth)<img.width){
      newWidth=window.innerWidth*0.8;
      img.style.setProperty("width", newWidth+"px");
    }else if(window.innerWidth>(1.2*img.width)&&img.width<imgMW){
      newWidth=window.innerWidth*0.8;
      img.style.setProperty("width", newWidth+"px");
    }
});

var nav = document.querySelectorAll(".nav-link");
var longest=0;
for (var value of nav) {
      if(value.innerHTML.length>longest)longest=value.innerHTML.length+2;
    }
for (var value of nav) {
      value.style.setProperty("width", longest+"ex");
    } 
<?php if(isset($script))echo "\n$script\n</script>\n";else echo'</script>'; ?>

</html>