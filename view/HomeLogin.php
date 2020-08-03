<?php
include_once '../Config.php';
include_once '../Controller/HomeLoginCtrl.php';
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
                <h1>Bonjour <?= $_SESSION['Firstname'] . " " . $_SESSION['Name'] ?> </h1>
            </div>
            <div class="col-lg-3">
                <img src="../assets/img/imgPresentation/logo.jpg" alt=""/>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 leftColumm">
                <p>Ajouter une licence <a href="AddLicense.php">ICI</a></p>

            </div>
            <div class="col-lg-6 centralColumm">
                <div>
                   <?php
                    foreach ($PrmaryLicensesUsed as $PrimaryLicencesList) {
                        $IdProfile = $PrimaryLicencesList->IdMembers;
                        if ($IdProfile == $RegisteredId) {
                            ?>
                            <p>Vous avez la fonction  <?= $PrimaryLicencesList->TypeOfLicence ?></p>
                            <?php
                        }
                    }
                    ?>

                    <?php
                    foreach ($ListLicences as $MemberDetail) {
                        $IdProfile = $MemberDetail->IdMembers;
                        if ($IdProfile == $RegisteredId) {
                            ?>
                            <p>et vos autre licences</p>
                            <p><?= $MemberDetail->TypeOfLicence ?> Avec le Numéro <?= $MemberDetail->SecondaryLicense ?></p>

                        <?php } else {
                            ?>
                            <p>Vous n'avez pas d'autre licences pour le moment </p>
                            <?php
                        }
                    }
                    ?>
                </div>  
                <p>Liste des rallyes ouvert à l'inscription <a href="RallyOpenToRegistration.php">ICI</a></p>
                <p>Liste des rallyes ou vous étes inscrit <a href="ParticipationAgreement.php">ICI</a></p>
                <?php if (isset($_SESSION['connect']) && $_SESSION['connect'] == 'OK' && in_array($_SESSION['access'], $Pilote)) { ?>
                <p>Ajouter votre ou vcs voiture <a href="AddCars.php">ICI</a></p>
                <p>Mes voitures déja enregistré<a href="MyRaceCars.php">ICI</a></p>

                <?php
                }
                if (isset($_SESSION['connect']) && $_SESSION['connect'] == 'OK' && in_array($_SESSION['access'], $Responsible)) {
                    ?>
                    <p>Listes des Voitures enregistré <a href="ListOfCars.php">ICI</a></p>
                    <p> ouvrire une compétition à l'inscription <a href="AddACompetition.php">ICI</a></p>
                    <p>liste des compétitions <a href="SportsEvents.php">ICI</a></p>
                <?php }
                ?>        
            </div>
            <div class="col-lg-3 rigthColumm">
                <p>Votre profils <a href="MyProfiles.php">ICI</a></p>
            </div>
        </div>
    </div>
    <?php
} else {
    include_once '../Include/RestrictedZone.php';
}
include_once '../Include/Footer.php';
?>