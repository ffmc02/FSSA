<?php
include_once '../Config.php';
include_once '../Controller/EditingProfilesCtrl.php';
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
                <h1>Modifier son profils </h1>
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
                <form method="post" id="Edditing">
                    <?php
                    foreach ($UserProfil as $UserProfils) {
                        if ($UserProfils->id == $RegisteredId) {
                            ?>

                            <div>  
                                <label for="NameUser"> Votre nom :</label> 
                                <input id="NameUser" type="text" name="NameUser" value="<?= $UserProfils->Name ?>" />
                                <p class="text-danger"><?= isset($formError['NameUser']) ? $formError['NameUser'] : '' ?></p>
                            </div>
                            <div>  
                                <label for="FirstnameUser"> Votre prénom :</label> 
                                <input id="FirstnameUser" type="text" name="FirstnameUser" value="<?= $UserProfils->Firstname ?>"/>
                                <p class="text-danger"><?= isset($formError['FirstnameUser']) ? $formError['FirstnameUser'] : '' ?></p>
                            </div>
                            <div>  
                                <label for="EmailUser"> Votre Email :</label> 
                                <input id="EmailUser" type="email" name="EmailUser" value="<?= $UserProfils->Email ?>" />
                                <p class="text-danger"><?= isset($formError['EmailUser']) ? $formError['EmailUser'] : '' ?></p>
                            </div>
                            <div>  
                                <label for="AddressUser"> Votre adresse :</label> 
                                <input id="AddressUser" type="text" name="AddressUser" value="<?= $UserProfils->Address ?>" />
                                <p class="text-danger"><?= isset($formError['AddressUser']) ? $formError['AddressUser'] : '' ?></p>
                            </div>
                            <div>  
                                <label for="ZipCodeUser"> Votre code postale :</label> 
                                <input id="ZipCodeUser" type="text" name="ZipCodeUser" value="<?= $UserProfils->ZipCode ?>" />
                                <p class="text-danger"><?= isset($formError['ZipCodeUser']) ? $formError['ZipCodeUser'] : '' ?></p>
                            </div>
                            <div>  
                                <label for="City"> votre ville :</label> 
                                <input id="City" type="text" name="City" value="<?= $UserProfils->City ?> "/>
                                <p class="text-danger"><?= isset($formError['City']) ? $formError['City'] : '' ?></p>
                            </div>

                            <div>  
                                <label for="AsaCode">Numéro de votre ASA ou ASK :</label> 
                                <input id="AsaCode" type="text" name="AsaCode" value="<?= $UserProfils->AsaCode ?> "/>
                                <p class="text-danger"><?= isset($formError['AsaCode']) ? $formError['AsaCode'] : '' ?></p>
                            </div>
                            <div>  
                                <label for="AsaName">Nom de votre ASA ou ASK :</label> 
                                <input id="AsaName" type="text" name="AsaName" value="<?= $UserProfils->AsaName ?>" />
                                <p class="text-danger"><?= isset($formError['AsaName']) ? $formError['AsaName'] : '' ?></p>
                            </div>

                            <div> 
                                <input id="inscription" type="submit" name="Edditing" value="je modifie" />
                            </div>
                            <?php
                        }
                    }
                    ?>
                </form>

                <a href="HomeLogin.php"><button>Retour à l'accueil de connexion</button></a>   
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