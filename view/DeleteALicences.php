<?php
include_once '../Config.php';
include_once '../Controller/DeleteALicencesCtrl.php';
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
                <h1>Supprimer ma licenses</h1>
            </div>
            <div class="col-lg-3">
                <img src="../assets/img/imgPresentation/logo.jpg" alt=""/>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 leftColumm">

            </div>
            <div class="col-lg-6 centralColumm">
                <?php
                foreach ($ListLicences as $modelDetailListe) {
                    $Licences = $modelDetailListe->IdSummary;
                    if ($Licences == $IdLicence) {
                        ?>
                        <p>Vous souhaitez suprimer  la licence de <?= $modelDetailListe->TypeOfLicence ?> avec le numéro <?= $modelDetailListe->SecondaryLicense ?> de votre profils </p>
                      
                            <p class="text-danger"><?= isset($formError['IdLicences']) ? $formError['IdLicences'] : '' ?></p>
                        <div>
                            <p class="text-danger">Attention si vous validez la license seras supprimer de la base de donnée de maniere définitive</p>
                            <form id="DeleteMyLicense" method="POST" name="DeleteMyLicense">
                                <div>
                                    <input type="hidden" name="IDLicense" id="IDLicense" value="<?=$Licences?>"/>
                                </div>
                                <div>
                                    <input value="supprimer" type="submit" name="DeleteMyLicense" />
                                </div>
                            </form>
                            <div>
                                <a href="AddLicense.php"><button>Retour</button></a>
                            </div>
                        </div>                            
                        <?php
                    }
                }
                ?>
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