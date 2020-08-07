
<?php
include_once '../Config.php';
include_once '../Controller/FunctionForCompetitionCtrl.php';
include_once '../Include/Header.php';
include_once '../Include/Navbar.php';
if (isset($_SESSION['connect']) && $_SESSION['connect'] == 'OK' && in_array($_SESSION['access'], $Function)) {
    ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3">
                <img src="../assets/img/imgPresentation/logo.jpg" alt=""/>
            </div>
            <div class="col-lg-6 ">
                <h1>Fonction pour la cources.</h1>
            </div>
            <div class="col-lg-3">
                <img src="../assets/img/imgPresentation/logo.jpg" alt=""/>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 leftColumm">
                <?php
                include_once '../Include/LeftColum.php';
                ?>
            </div>
            <div class="col-lg-6 centralColumm">
                    <?php
                     foreach ($ListOfOpenCompetitons AS $OpenCompetition) {
                         if($IdCompetition== $OpenCompetition->id ){
                            ?> 
                <div>
                    <p>VOus shaitez participez aux  <?= $OpenCompetition->NameOfTheTest?> compétition de <?= $OpenCompetition->CategoryCompetition?>  </p>
                    <p>qui auras lieux à partire du <?= $OpenCompetition->DateOfCompetition?> à/ aux <?= $OpenCompetition->Location_Circuit?>. </p>
                  
                </div>
                <div>
                    <p>Vous êtes un concurant cliquez <a href="RegisterForACompetition.php?Function=Concurrent&IdCompet=<?= $OpenCompetition->id ?>">ICI</a></p>
                </div>
                <div>
                    <p>Vous êtes un officiel(commissaire, directeur D'ES, chrono etc) c'est par <a href="RegisterForACompetition.php?Function=Officiel&IdCompet=<?= $OpenCompetition->id ?>">ICI</a></p>
                </div>
                   <?php 
                         }
                     }
                     ?>
                <div>
                    <a href="HomeLogin.php"><button> Retour</button></a>
                </div>
            </div>
            <div class="col-lg-3 rigthColumm">
                <?php
                include_once '../Include/RightColum.php';
                ?>
            </div>
        </div>
    </div>
    <?php
} else {
    include_once '../Include/RestrictedZone.php';
}
include_once '../include/footer.php';
?>
