<?php
include_once '../Model/DataBase.php';
include_once '../Config.php';
include_once '../Controller/ModifyMyLicencesCtrl.php';
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
                <h1>Je modifie mes licences </h1>
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
                    <p>Pour modifier votre licence Utilisez le formulaire suivant</p>
                </div>
                <div>
                    <?php
                    foreach ($ListLicences as $modelDetailListe) {
                        $Licences = $modelDetailListe->IdSummary;
                        if ($Licences == $IdLicence) {
                            ?>
                            <p>Vous souhaitez modifier la licence <?= $modelDetailListe->TypeOfLicence ?> avec le numéro <?= $modelDetailListe->SecondaryLicense ?></p>
                            <form method="post" name="LicenceAdd">
                                <div>
                                    <label>Sélectionnez le type de licence dans la liste suivante :*</label><br>
                                    <select class="custom-select custom-select-sm" name="TypeOfLicence" id="TypeOfLicence">
                                        <option selected=""></option>
                                        <?php foreach ($listerFunctions as $FunctionList) { ?>
                                            <option value="<?= $FunctionList->id ?>" > <?= $FunctionList->TypeOfLicence ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                    <p class="text-danger"><?= isset($formError['TypeOfLicence']) ? $formError['TypeOfLicence'] : '' ?></p>
                                </div>
                                <div>  
                                    <label for="LicenceNumber"> Votre numéro de licence:</label> 
                                    <input id="LicenceNumber" type="text" name="LicenceNumber" placeholder="<?= $modelDetailListe->SecondaryLicense ?>"/>
                                    <p class="text-danger"><?= isset($formError['LicenceNumber']) ? $formError['LicenceNumber'] : '' ?></p>
                                </div>
                                <div>
                                    <input id="IdMember" name="IdMember" type="hidden" value="<?= $_SESSION['idUser'] ?>" />
                                </div>
                                <div> <input type="submit" value="Modifier mes licences" name="ModifyLicences" id="ModifyLicences"/>

                                </div>
                            </form>
                            <div>
                                <a href="AddLicense.php"><button class="retour">Retour</button></a>
                            </div>
                            <?php
                        }
                    }
                    ?>
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