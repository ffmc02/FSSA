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
                <h1>Je modifie mes licenses </h1>
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
                    <p>Pour modifié votre license Utilisé le formulaire suivant</p>
                </div>
                <div>
                    <form method="post" name="LicenceAdd">
                        <div>
                            <label>Sélectionnez le type de licence dans la liste suivante :</label><br>
                            <select class="custom-select custom-select-sm" name="TypeOfLicence" id="TypeOfLicence">
                                <?php foreach ($listerFunctions as $FunctionList) { ?>
                                    <option value="<?= $FunctionList->id ?>"> <?= $FunctionList->TypeOfLicence ?></option>
                                    <?php
                                }
                                if ($IdProfile == $RegisteredId) {
                                    ?>
                                    <option value="<?= $FunctionList->id ?>"> <?= $FunctionList->TypeOfLicence ?></option>
                                </select>
                                <p class="text-danger"><?= isset($formError['TypeOfLicence']) ? $formError['TypeOfLicence'] : '' ?></p>
                            </div>
                            <div>  
                                <label for="LicenceNumber"> Votre numéro de licence:</label> 
                                <?php
                                foreach ($ListLicences as $MemberDetail) {
                                    $IdProfile = $MemberDetail->IdMembers;
                                    $IdSummary = $MemberDetail->IdSummary;
                                    if ($IdProfile == $RegisteredId) {
                                        ?>

                                        <input id="LicenceNumber" type="text" name="LicenceNumber" placeholder=""/>
                                        <p class="text-danger"><?= isset($formError['LicenceNumber']) ? $formError['LicenceNumber'] : '' ?></p>
                                    </div>
                                    <?php
                                }
                            }
                            ?>
                            <div>
                                <input id="IdMember" name="IdMember" type="hidden" value="<?= $_SESSION['idUser'] ?>" />
                            </div>
                            <div> <input type="submit" value="enregister" name="AddLicences" id="AddLicences"/>

                            </div>
                            <?php
                        }
                        ?>
                    </form>
                </div>
            </div>
            <div class="col-lg-3 rigthColumm">

            </div>
        </div>
    </div>
    <?php
} else {
    include_once '../Include/RestrictedZone.php';
}
include_once '../include/footer.php';
?>