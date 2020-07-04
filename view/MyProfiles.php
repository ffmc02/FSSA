<?php
include_once '../Model/DataBase.php';
include_once '../Model/Members.php';
include_once '../Config.php';
include_once '../Controller/MyProfilesCtrl.php';
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
                <h1></h1>
            </div>
            <div class="col-lg-3">
                <img src="../assets/img/imgPresentation/logo.jpg" alt=""/>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 leftColumm">

            </div>
            <div class="col-lg-6 centralColumm">
                <p>Mon profil est le suivant :</p>
                <?php
                foreach ($MembersProfile as $MemberDetail) {
                    $IdProfile = $MemberDetail->IdMembers;
                    if ($IdProfile == $RegisteredId) {
                        ?>
                        <p>Votre nom :<?= $MemberDetail->Name ?> </p>
                        <p>Votre Prénom :<?= $MemberDetail->Firstname ?></p>
                        <p>Votre Email :<?= $MemberDetail->Email ?></p>
                        <p>Votre Adresse :<?= $MemberDetail->Address ?></p>
                        <p>Votre Code Postam :<?= $MemberDetail->ZipCode ?></p>
                        <p>Votre Vile :<?= $MemberDetail->City ?></p>
                        <p>Votre Numéro d'ASA ou ASK :<?= $MemberDetail->AsaCode ?></p>
                        <p>Votre Numero de license :<?= $MemberDetail->LicenceNumber ?></p>
                        <p>Votre Fonction :<?= $MemberDetail->TypeOfLicence ?></p>

                    <?php
                    }
                }
                ?>
                        <a href="HomeLogin.php"><button>Retour à l'accueil de connexion</button></a>   

            </div>
            <div class="col-lg-3 rigthColumm">

            </div>
        </div>
    </div>
    <?php
} else {
    include_once '../Include/RestrictedZone.php';
}
include_once '../Include/footer.php';
?>