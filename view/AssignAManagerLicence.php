<?php
include_once '../Config.php';
include_once '../Controller/AssignAManagerLicenceCtrl.php';
include_once '../Include/Header.php';
include_once '../Include/Navbar.php';
if (isset($_SESSION['connect']) && $_SESSION['connect'] == 'OK' && in_array($_SESSION['access'], $Responsible)) {
    ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3">
                <img src="../assets/img/imgPresentation/logo.jpg" alt=""/>
            </div>
            <div class="col-lg-6 ">
                <h1>Assignation d'un responsable.</h1>
            </div>
            <div class="col-lg-3">
                <img src="../assets/img/imgPresentation/logo.jpg" alt=""/>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-1 leftColumm">
               
            </div>
            <div class="col-lg-10 centralColumm">.
                <div>
                    <h2>Vous désirez assigner un nouveau responsable ou président d'ASA remplissez le formulaire suivant:</h2>
                </div>
                <div>
                    <form id="AssignAManagerLicence" method="POST" name="AssignAManagerLicence">
                        <div>
                            <label for="Members">Choississez le membres</label>
                            <select class="custom-select custom-select-sm" id="Members"  name="Member">
                                 <option selected="">Choissez dans la liste suivante </option>
                                 <?php
                                     foreach ($AssignAManagerLicence as $assignAManager){
                                 ?>
                                 <option value="<?= $assignAManager->id ?>"><?= $assignAManager->Name?>, <?= $assignAManager->Firstname ?></option>
                                 <?php 
                                     }
                                     ?>
                            </select>
                        </div>
                        <div>
                            <label for="PrimaryLicense">Choisir la nouvelle licence</label>
                        <select class="custom-select custom-select-sm" name="TypeOfLicence" id="TypeOfLicence">
                            <option selected="">Choissez dans la liste suivante </option>
                            <?php
                            foreach ($listerFunctions as $FunctionList) {
                                if ($FunctionList->id != 155 && $FunctionList->id != 1 && $FunctionList->id != 2 &&  $FunctionList->id != 3 && $FunctionList->id != 4
                                      && $FunctionList->id !=5 && $FunctionList->id !=6  && $FunctionList->id !=7 && $FunctionList->id !=8 && $FunctionList->id !=9 && $FunctionList->id !=10
                                   && $FunctionList->id !=11 && $FunctionList->id !=15  && $FunctionList->id !=16 && $FunctionList->id !=17 && $FunctionList->id !=18) {
                                    ?>
                                    <option value="<?= $FunctionList->id ?>"> <?= $FunctionList->TypeOfLicence ?></option>
                                    <?php
                                }
                            }
                            ?>
                        </select>                         
                        </div>
                        <div>
                            <input type="submit" name="AssignAManagerLicence" value="Modifier la license principal" />
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-1 rigthColumm">
                <a href="HomeLogin.php"><button>Retour</button></a>
            </div>
        </div>
    </div>
    <?php
} else {
    include_once '../Include/RestrictedZone.php';
}
include_once '../include/footer.php';
?>

