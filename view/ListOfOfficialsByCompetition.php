
<?php
include_once '../Config.php';
include '../Controller/ListOfOfficialsByCompetitionCtrl.php';
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
                <h1>Liste des officiels inscrtits sur <?= $ListeOfficialByCompetition ?> </h1>
            </div>
            <div class="col-lg-3">
                <img src="../assets/img/imgPresentation/logo.jpg" alt=""/>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-1 leftColumm">
               
            </div>
            <div class="col-lg-10 centralColumm">
                  <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Nom de l'épreuve </th>
                            <th scope="col">Nom de l'officiel</th>
                            <th scope="col">Prénom de l'officiel </th>
                            <th scope="col">Fonction</th>
                            <th scope="col">Disponible Jour 1 PC</th>
                            <th scope="col">Disponible Jour 2 PC</th>
                            <th scope="col">Disponible Jour 3 PC</th>
                            <th scope="col">Disponible Jour 1 Terrain</th>
                            <th scope="col">Disponible Jour 2 Terrain</th>
                            <th scope="col">Disponible Jour 3 Terrain</th>
                            <th scope="col">Besoin d'hebergement </th>
                           
                        </tr>
                    </thead>
                    <tbody>
                        <?php  foreach ($DisplayListOfficialByCompetition AS $DisplayOFficialByCompetiton) { ?>
                            <tr>
                                <th scope="row"><?= $DisplayOFficialByCompetiton->NameOfTheTest ?></th>
                                <th scope="row"><?= $DisplayOFficialByCompetiton->Name ?></th>
                                <th scope="row"><?= $DisplayOFficialByCompetiton->Firstname ?></th>
                                <th scope="row"><?= $DisplayOFficialByCompetiton->TypeOfLicence ?></th>
                                <th scope="row"><?= $DisplayOFficialByCompetiton->ResponseDatePcNeed1 ?></th>
                                <th scope="row"><?= $DisplayOFficialByCompetiton->ResponseDatePcNeed2 ?></th>
                                <th scope="row"><?= $DisplayOFficialByCompetiton->ResponseDatePcNeed3 ?></th>
                                <th scope="row"><?= $DisplayOFficialByCompetiton->AvaibleDateNeedForTheCommissioner1 ?></th>
                                <th scope="row"><?= $DisplayOFficialByCompetiton->AvaibleDateNeedForTheCommissioner2 ?></th>
                                <th scope="row"><?= $DisplayOFficialByCompetiton->AvaibleDateNeedForTheCommissioner3 ?></th>                            
                                <th scope="row"><?= $DisplayOFficialByCompetiton->Accommodation ?></th>
                        <?php  } ?>  
                    </tbody>
                </table>
            </div>
            <div class="col-lg-1 rigthColumm">
                <div>
                    <a href="ListOfOpenCompetitons.php"><button>Retour</button></a>
                </div>
            </div>
        </div>
    </div>
    <?php
} else {
    include_once '../Include/RestrictedZone.php';
}
include_once '../include/footer.php';
?>