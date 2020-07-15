<?php
//SportsEvents
include_once '../Config.php';
include_once '../controller/SportsEventsCtrl.php';
include_once '../Include/Header.php';
include_once '../Include/Navbar.php';
if (isset($_SESSION['connect']) && $_SESSION['connect'] == 'OK' && in_array($_SESSION['access'], $Responsible)) {
    ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3">
                <img src="../assets/img/imgPresentation/logo.jpg" alt=""/>
            </div>
            <div class="col-lg-6 ">
                <h1>Liste des Hébergement </h1>
            </div>
            <div class="col-lg-3">
                <img src="../assets/img/imgPresentation/logo.jpg" alt=""/>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 leftColumm">

            </div>
            <div class="col-lg-6 centralColumm">
                <p>Hébergement choix des dates et noms de l'épreuve</p>
                <?php
                    foreach ($listSportEvents as $listSport){
                        ?>
                <p>Nom de l'épreuve :<?= $listSport->NameOfTheTest?></p>
                <p>Date de l'évenemet :<?= $listSport->DateOfTeste?></p>
                <p>Type d'hebergement :<?=$listSport->TypeOfAccommodation?></p>
                <p>Observation :<?=$listSport->Observation?></p>
                   <?php  }
                ?>
                <a href="HomeLogin.php"><button>Retour</button></a>
            </div>
            <div class="col-lg-3 rigthColumm">

            </div>
        </div>
    </div>
    <?php
} else {
    include_once '../Include/RestrictedZone.php';
}
include_once '../include/footer.php';
?>