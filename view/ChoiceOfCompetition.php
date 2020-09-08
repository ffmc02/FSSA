<?php
include_once '../Config.php';
include_once '../Controller/ChoiceOfCompetitionCtrl.php';
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
                <h1>Choix de la compétition à ouvrir:</h1>
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
                <p>Compétition <a href="AddACompetition.php">Circuit <</a> </p>
                <p>Compétition <a href="AddACompetition.php">Course de côte </a> </p>
                <p>Compétition <a href="AddACompetition.php">Drift </a> </p>
                <p>Compétition <a href="AddACompetition.php">Slallom </a> </p>
                <p>Compétition <a href="RallyOpenToRegistration.php">Rallye</a></p>
                <p>Compétition <a href="RallyOpenToRegistration.php">Rallye tout terrain</a></p>
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