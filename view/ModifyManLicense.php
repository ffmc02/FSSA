<?php
include_once '../Config.php';
include_once '../Controller/ModifyMainLicenseCtrl.php';
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
                <h1>Modification de la premiére licence</h1>
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
                    <form method="post" name="EditingLicence" id="EditingLicence" >
                        <div>
                            <select class="custom-select custom-select-sm" name="TypeOfLicence" id="TypeOfLicence">
                                <?php
                                foreach ($PrmaryLicensesUsed as $PrimaryLicencesList) {
                                    $IdProfile = $PrimaryLicencesList->IdMembers;
                                    if ($IdProfile == $RegisteredId) {
                                        ?>
                                <option selected="" value="<?=$PrimaryLicencesList->IdSummary?>"> votre licence est : <?=$PrimaryLicencesList->TypeOfLicence?></option>
                                        <?php
                                    }
                                }
                                foreach ($listerFunctions as $FunctionList) {
                                    if ($_SESSION['access'] != in_array($_SESSION['access'],$Responsible)
//                                            || $_SESSION['access'] != in_array($_SESSION['access'],$Responsible)
                                            ) {
                                        if ($FunctionList->id != 155 && $FunctionList->id != 14 && $FunctionList->id != 13 && $FunctionList->id != 13 && $FunctionList->id != 11 && $FunctionList->id != 12) {
                                            ?>
                                            <option value="<?= $FunctionList->id ?>"> <?= $FunctionList->TypeOfLicence ?></option>
                                            <?php
                                        }
                                    } else {
                                        ?>
                                        <option value="<?= $FunctionList->id ?>"> <?= $FunctionList->TypeOfLicence ?></option>
                                        <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div>
                            <?php
                            foreach ($PrmaryLicensesUsed as $PrimaryLicencesList) {
                                $IdProfile = $PrimaryLicencesList->IdMembers;
                                if ($IdProfile == $RegisteredId) {
                                    ?>
                                    <input  name="IdLicennsePrimary" type="hidden"  value="<?= $PrimaryLicencesList->IdSummary ?>" />
                                    <?php
                                }
                            }
                            ?>
                        </div>
                        <div>
                            <label for="NewLicenseNumber">Mon numéro de licence</label>
                            <?php
                            foreach ($PrmaryLicensesUsed as $PrimaryLicencesList) {
                                $IdProfile = $PrimaryLicencesList->IdMembers;
                                if ($IdProfile == $RegisteredId) {
                                    ?>
                                    <input type="text" name="NewLicenseNumber" id="NewLicenseNumber" value="<?= $PrimaryLicencesList->SecondaryLicense ?>" />
                                    <p class="text-danger"><?= isset($formError['NewLicenseNumber']) ? $formError['NewLicenseNumber'] : '' ?></p>
                                    <?php
                                }
                            }
                            ?>
                        </div>
                        <div>
                            <input type="submit" name="EditingLicence" value="Je modfie ma licence" id="EditingLicenceValide" />
                        </div>
                    </form>
                     <div>                        
                         <a href="MyProfiles.php"><button>Retour à mon profil</button></a>   
                    </div>
                    <div>                        
                        <a href="HomeLogin.php"><button>Retour à l'accueil de connexion</button></a>   
                    </div>
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