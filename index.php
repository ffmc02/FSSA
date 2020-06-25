<?php
include_once 'controlleur/indexCtrl.php';
 ?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title><?= isset($title) ? $title : '' ?></title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link href="assets/css/style.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
          <a class="nav-link" href="index.php">pages D'accueil <span class="sr-only">(current)</span></a>
      </li>
<!--      <li class="nav-item">
        <a class="nav-link" href="#">Features</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Pricing</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown link
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>-->
      </li>
    </ul>
  </div>
</nav>
<main>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 title">
                <h1>Bienvenue sur le site d'inscription aux épreuves de la <br>Ligue des hauts de france (FFSA)
                </h1>
            </div>
            
        </div>
        <div class="row">
            <div class="col-lg-3 leftColumm">
                <p>Les prochaines épreuve <a href="">Par ici</a></p>
            </div>
            <div class="col-lg-6 centralColumm">
                <p>essaye centre </p>
            </div>
            <div class="col-lg-3 rigthColumm">
                <p>essay droite</p>
            </div>
        </div>
        
    </div>
</main>
