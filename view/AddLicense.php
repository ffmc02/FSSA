<?php
include_once '../Config.php';
include_once '../controller/AddLicencesCtrl.php';
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
                <h1>Liste des licenses de votre profils</h1>
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
                    <p class="text-primary"><?= isset($Message) ? $Message : '' ?></p>
                    <p class="text-danger"><?= isset($MessageError) ? $MessageError : '' ?></p>
                </div>
                <div class="Licences">
                    <h2>Vous avez comme license principal  </h2>
                    <?php
                    foreach ($MembersProfile as $MemberDetail) {
                        $IdProfile = $MemberDetail->IdMembers;
                        if ($IdProfile == $RegisteredId) {
                            ?>
                            <p><?= $MemberDetail->TypeOfLicence ?></p>
                            <?php
                        }
                    }
                    ?>
                </div>
                <div class="Licences">
                    <p>Vous avez comme license secondaire la ou les license de </p>
                    <?php
                    foreach ($ListLicences as $MemberDetail) {
                        $IdProfile = $MemberDetail->IdMembers;
                        $IdSummary = $MemberDetail->IdSummary;
                        if ($IdProfile == $RegisteredId) {
                            ?>
                            <p><?= $MemberDetail->TypeOfLicence ?></p>
                            <p>Avec le Numéro <?= $MemberDetail->SecondaryLicense ?></p>
                            <p>Modifier cette <a href="ModifyMyLicences.php?IdLicence=<?= $IdSummary ?>">Licences</a></p>
                            <p>Supprimer cette <a href="DeleteALicences.php?IdLicence=<?= $IdSummary ?>">Licences</a></p>
                            <?php
                        }
                    }
                    ?>
                            <div>
                                <a href="HomeLogin.php"><button> Retour</button></a>
                            </div>
                </div>

                <div class="Licences">
                    <h3> Vous souhaitez ajouter une ou plusieurs licence ?</h3>
                    <p>Utilisé le formulaire<button class="BtnFormAddLicences"> suivant:</button></p>
                </div>
                <div class="FormAddLicences">
                    <form method="post" name="LicenceAdd">
                        <div>
                            <label>Sélectionnez le type de licence dans la liste suivante :*</label><br>
                            <select class="custom-select custom-select-sm" name="TypeOfLicence" id="TypeOfLicence">
                                <option selected=""></option>
                                <?php foreach ($listerFunctions as $FunctionList) { 
//                                if()){?>
                                    <option value="<?= $FunctionList->id ?>"> <?= $FunctionList->TypeOfLicence ?></option>
                                    <?php
//                                }
                                
                                }
                                ?>
                            </select>
                            <p class="text-danger"><?= isset($formError['TypeOfLicence']) ? $formError['TypeOfLicence'] : '' ?></p>
                        </div>
                        <div>  
                            <label for="LicenceNumber"> Votre numéro de licence:</label> 
                            <input id="LicenceNumber" type="text" name="LicenceNumber" />
                            <p class="text-danger"><?= isset($formError['LicenceNumber']) ? $formError['LicenceNumber'] : '' ?></p>
                        </div>
                        <div>
                            <input id="IdMember" name="IdMember" type="hidden" value="<?= $_SESSION['idUser'] ?>" />
                        </div>
                        <div> <input type="submit" value="enregister" name="AddLicences" id="AddLicences"/>
                            <a href="AddLicense.php">  <button class="retour">Retour</button></a>
                        </div>
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