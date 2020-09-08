<?php
include_once '../Config.php';
include_once '../Controller/AdministrativeManagementCtrl.php';
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
                <h1>Gestion administrative</h1>
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
<div>
    <?php if (isset($_SESSION['connect']) && $_SESSION['connect'] == 'OK' && in_array($_SESSION['access'], $Responsible)) {
                    ?>
    
                    <p> ouvrir une compétition à l'inscription <a href="ChoiceOfCompetition.php">ICI</a></p>
                    <p>liste des compétitions <a href="ListOfOpenCompetitons.php">ICI</a></p>
                    <p>Réouvrir une compétition <a href="ListOfcloseCompetition.php">Par ICI</a></p>
                    <p>Liste des concurrents inscrits aux compétitions <a href="ListOfRegisteredCompetitors.php">ICI</a></p>
    <?php } ?>
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