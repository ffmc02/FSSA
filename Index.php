<?php
include_once 'Config.php';
include_once 'Controller/IndexCtrl.php';

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
         <?php if (isset($_SESSION['connect'])) { ?>
          <li class="nav-item active">
          <a class="nav-link" href="index.php">pages D'accueil Principal <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
          <a class="nav-link" href="view/HomeLogin.php">Page d'accueil de connexion </a>
      </li> 
      <li class="nav-item">
          <a class="nav-link" href="view/Logout.php">Déconnexion </a>
      </li>
        <?php } else { ?>
      <li class="nav-item active">
          <a class="nav-link" href="index.php">pages D'accueil <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
          <a class="nav-link" href="view/Connection.php">Connexion</a>
      </li>
        <?php }
            ?>
 <!--     <li class="nav-item">
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
            <div class="col-lg-3">
                <img src="assets/img/imgPresentation/logo.jpg" alt=""/>
            </div>
            <div class="col-lg-6 title">
                <?php if (isset($_SESSION['connect'])) { ?>
                <h1>Bienvenue sur le site d'inscription aux épreuves  <?= $_SESSION['Firstname'] . " " . $_SESSION['Name'] ?></h1>
                 <?php } else { ?>
                <h1>Bienvenue sur le site d'inscription aux épreuves de la <br>Ligue des hauts de france (FFSA)
                </h1>
                  <?php }
            ?>
                <img src="assets/img/imgPresentation/emotionheader4728052_9.jpg" alt="illustration"/>
            </div>
            <div class="col-lg-3">
                <img src="assets/img/imgPresentation/logo.jpg" alt=""/>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 leftColumm">
                 <?php if (isset($_SESSION['connect'])) { ?>
                <p>Les prochaines épreuve <a href="view/RallyOpenToRegistration.php">Par ici</a></p>
                <p>Liste des épreuves où vous étes <a href="view/ParticipationAgreement.php">ICI</a></p>
                 <?php } else {?>
                
                     <?php }
            ?>
            </div>
            <div class="col-lg-6 centralColumm">
                 <?php
                     if(isset($_SESSION['connect']) && $_SESSION['connect'] == 'OK' && in_array($_SESSION['access'], $Pilote)){?>
                <p>Ajouter votre ou vcs voiture <a href="view/CarOwn.php">ICI</a></p>
                
                 <?php 
                     
                     } else { ?>
                <p>Inscrivé vous <a href="">Ici </a> </p>
                   <?php }
            ?>
            </div>
            <div class="col-lg-3 rigthColumm">
                 <?php if (isset($_SESSION['connect'])) { ?>
                <p>Voir mon profils <a href="view/MyProfiles.php">ICI</a></p>
                 <?php } else {?>
                                
                            <?php }
            ?>
            </div>
        </div>
        
    </div>
</main>
<footer>
    
</footer>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
 <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
        <script src="assets/js/script.js" type="text/javascript"></script>
    </body>
</html>
