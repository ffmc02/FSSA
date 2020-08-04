<?php
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
                <div>
                    <p>Votre profil: </p>
                    <p>Votree nom: <?= $_SESSION['Name'] ?></p>
                    <p>votre Prénom: <?= $_SESSION['Firstname'] ?></p>
                    <p> Votre Mail de contact: <?= $_SESSION['loginMail'] ?></p>
                    <?php
                    foreach ($UserProfil as $UserProfils) {
                        if ($UserProfils->id == $RegisteredId) {
                            ?> 
                            <p>Votre adresse: <?= $UserProfils->Address ?></p>
                            <p>Votre code postale: <?= $UserProfils->ZipCode ?></p>
                            <p>Votre ville: <?= $UserProfils->City ?></p>
                            <p>Le numéro de votre ASA ou ASK: <?= $UserProfils->AsaCode ?></p>
                            <p>Le nom de votre ASA ou ASK: <?= $UserProfils->AsaName ?></p>
                            <?php
                        }
                    }
                    ?>
                    <div>
                        <a href="EditingProfiles.php?IdUser=<?= $_SESSION['idUser'] ?>"><button>Modifier Mon profils</button></a>
                    </div>
                </div>
                <div>
                    <p>Votre licence principale est :</p>
                    <?php
                    foreach ($PrmaryLicensesUsed as $PrimaryLicencesList) {
                        $IdProfile = $PrimaryLicencesList->IdMembers;
                        if ($IdProfile == $RegisteredId) {
                            ?>
                    <p>Votre licence principal est : <?= $PrimaryLicencesList->TypeOfLicence ?> avec le numéro: <?= $PrimaryLicencesList->SecondaryLicense ?> </p>
                            <?php
                        }
                    }
                    foreach ($ListLicences as $MemberDetail) {
                        $IdProfile = $MemberDetail->IdMembers;
                        if ($IdProfile == $RegisteredId) {
                            ?>
                    
                            <p>vos licence secondaire sont :<?= $MemberDetail->TypeOfLicence ?>  Numéro <?= $MemberDetail->SecondaryLicense ?></p>
                            <?php
                        }
                    }
                    ?>
                </div>
                <div>
                    <a href="ModifyManLicense.php?IdUser=<?= $_SESSION['idUser'] ?>"><button>Modifier ma license principale</button></a>
                </div>
                <div>
                    <br> <br><br>
                </div>
                <div>
                    <a href="HomeLogin.php"><button>Retour à l'accueil de connexion</button></a>   
                </div>
            </div>
        </div>
    </div>
    <?php
} else {
    include_once '../Include/RestrictedZone.php';
}
include_once '../Include/footer.php';
?>