<?php
include_once '../Config.php';
include_once '../Controller/RegisterForACompetitionCtrl.php';
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
                <h1>S'insrire a une course.</h1>
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
                    <?php
                    if (isset($_SESSION['connect']) && $_SESSION['connect'] == 'OK' && in_array($_SESSION['access'], $Pilote)) {
                        if ($Demande == 'Concurrent') {
                            ?>
                            <p class="text-danger" > Seul les pilotes peuvent s'inscrire</p>
                            <?php
                            if (in_array($_SESSION['access'], $Pilot)) {
                                ?>
                                <div>
                                    <form name="CompetitorForCompetition" id="CompetitorForCompetition" method="POST" >
                                        <div>
                                            <input value="<?= $_SESSION['idUser'] ?>" type="hidden" name="IdPilote" />
                                        </div>
                                        <div>
                                            <label>Selectionner le nombre d'occupant*</label>
                                            <select name="NumberOfOccupants" >
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                            </select>
                                            <span class="text-danger">Si vous êtes seul dans la voiture mettez 1 </span>
                                        </div>
                                        <div id="CopilotDisplay" class="CopilotDisplay">
                                            <p>Selection du copilote</p>
                                            <select name="CoPilot">
                                                <option value="0" selected="">Selectionnez votre copilote dans la liste suivante</option>
                                                <?php
                                                foreach ($DisplayMemers AS $ListMembers) {
                                                    if ($ListMembers->id_0108asap_function == 16) {
                                                        ?>            
                                                        <option value="<?= $ListMembers->CopliotID ?>"><?= $ListMembers->Name ?>, <?= $ListMembers->Firstname ?></option>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div>
                                            <label>Sélectionnez Votre voiture pour la compétition:</label><br>
                                            <select class="custom-select custom-select-sm" name="Cars" id="Cars">
                                                <option selected="" value="0">Choissez dans la liste suivante </option>
                                                <?php
                                                foreach ($ListOfOwners AS $ListMyCards) {
                                                    if ($IdUserCars == $ListMyCards->id_0108ASAP_membres) {
                                                        ?>  
                                                        <option value="<?= $ListMyCards->id ?>"><?= $ListMyCards->Marque ?>, <?= $ListMyCards->Model ?></option>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                            </select>
                                            <p class="text-danger"><?= isset($formError['Cars']) ? $formError['Cars'] : '' ?></p>
                                        </div>
                                        <div>
                                            <input type="submit" name="PilotRegisterForCompetition" value="S'inscrire" />
                                        </div>
                                    </form>

                                </div>
                            <?php } else {
                                ?>
                                <p class="text-danger" > Vous ne pouvez pas inscrire votre équipage si vous n'avez pas de license de Pilote enregistrer.</p>
                                <?php
                            }
                        }
                    }
                    ?>
                </div>
                <div>
                    <?php
                    if (isset($_SESSION['connect']) && $_SESSION['connect'] == 'OK' && in_array($_SESSION['access'], $Officiel)) {
                        if ($Demande == 'Officiel') {
                            if (in_array($_SESSION['access'], $Officiel)) {
                                ?><div>
                                    <p>Vous souhaitez vous inscrire comme officiel à la compétitions, utilisez le formulaire suivant</p>
                                    <p class="text-danger"><?= isset($formError['$AlreadyRegistered']) ? $formError['$AlreadyRegistered'] : '' ?></p>
                                </div>
                                <div>
                                    <form id="RegistrationOfficial" method="POST">

                                        <div>
                                            <label>Sélectionnez le type de Fonction dans la liste suivante :*</label><br>
                                            <select class="custom-select custom-select-sm" name="TypeOfLicence" id="TypeOfLicence">
                                                <option selected="" value="0">Choissez dans la liste suivante </option>
                                                <?php
                                                foreach ($listerFunctions as $FunctionList) {
                                                    if (in_array($_SESSION['access'], $OfficialBis)) {
                                                        if ($FunctionList->id != 155 && $FunctionList->id != 14 && $FunctionList->id != 13 && $FunctionList->id != 13 && $FunctionList->id != 11 && $FunctionList->id != 12 &&
                                                                $FunctionList->id != 15 && $FunctionList->id != 16) {
                                                            ?>

                                                            <option value="<?= $FunctionList->id ?>"> <?= $FunctionList->TypeOfLicence ?> </option>
                                                            <?php
                                                        }
                                                    }
                                                    if (in_array($_SESSION['access'], $Responsible)) {
                                                        if ($FunctionList->id != 155 && $FunctionList->id != 15 && $FunctionList->id != 16) {
                                                            ?>
                                                            <p>2</p>
                                                            <option value="<?= $FunctionList->id ?>"> <?= $FunctionList->TypeOfLicence ?></option>
                                                            <?php
                                                        }
                                                    }
                                                }
                                                ?>
                                            </select>
                                            <p class="text-danger"><?= isset($formError['TypeOfLicence']) ? $formError['TypeOfLicence'] : '' ?></p>
                                        </div>
                                        <div>
                                            <?php
                                            foreach ($ListRally AS $DisplayListRally) {
                                                if ($IdCompetition == $DisplayListRally->id_0108asap_competiton) {
                                                    ?>
                                                    <p>Est vous disponible:<br> Pour assuré des fonctions au PC le </p>
                                                    <div>
                                                        <p><?= $DisplayListRally->BesoinPC1 ?></p>
                                                        <select class="custom-select custom-select-sm" name="BesoinPC1">
                                                            <option selected=""<option selected="">Choissez dans la liste suivante </option>
                                                            <option value="Oui">Oui</option>
                                                            <option value="Oui">NON</option>
                                                        </select>
                                                        <p class="text-danger"><?= isset($formError['BesoinPC1']) ? $formError['BesoinPC1'] : '' ?></p>
                                                    </div>
                                                    <div>
                                                        <?php if ($DisplayListRally->BesoinPC2 != null) { ?>
                                                            <p><?= $DisplayListRally->BesoinPC2 ?></p>
                                                            <select class="custom-select custom-select-sm" name="BesoinPC2">
                                                                <option selected=""<option selected="">Choissez dans la liste suivante </option>
                                                                <option value="Oui">Oui</option>
                                                                <option value="Oui">NON</option>
                                                            </select>
                                                        <?php } ?>
                                                    </div>
                                                    <div>
                                                        <?php if ($DisplayListRally->BesoinPC3 != null) { ?>
                                                            <p><?= $DisplayListRally->BesoinPC3 ?></p>
                                                            <select class="custom-select custom-select-sm" name="BesoinPC3">
                                                                <option selected=""<option selected="">Choissez dans la liste suivante </option>
                                                                <option value="Oui">Oui</option>
                                                                <option value="Oui">NON</option>
                                                            </select>
                                                        <?php } ?>
                                                    </div>
                                                    <p>Pour assurée une fonction sur le terrain </p>
                                                    <div>

                                                        <p><?= $DisplayListRally->BesoinSite1 ?></p>
                                                        <select class="custom-select custom-select-sm" name="NeedLand1">
                                                            <option selected=""<option selected="">Choissez dans la liste suivante </option>
                                                            <option value="Oui">Oui</option>
                                                            <option value="Oui">NON</option>
                                                        </select>
                                                        <p class="text-danger"><?= isset($formError['NeedLand1']) ? $formError['NeedLand1'] : '' ?></p>
                                                    </div>
                                                    <div>
                                                        <?php if ($DisplayListRally->BesoinSite2 != null) { ?>
                                                            <p><?= $DisplayListRally->BesoinSite2 ?></p>
                                                            <select class="custom-select custom-select-sm" name="NeedLand2">
                                                                <option selected=""<option selected="">Choissez dans la liste suivante </option>
                                                                <option value="Oui">Oui</option>
                                                                <option value="Non">NON</option>
                                                            </select>
                                                        <?php } ?>
                                                    </div>
                                                    <div>
                                                        <?php if ($DisplayListRally->BesoinSite3 != null) { ?>
                                                            <p><?= $DisplayListRally->BesoinSite3 ?></p>
                                                            <select class="custom-select custom-select-sm" name="NeedLand3">
                                                                <option selected=""<option selected="">Choissez dans la liste suivante </option>
                                                                <option value="Oui">Oui</option>
                                                                <option value="Oui">NON</option>
                                                            </select>
                                                        <?php } ?>
                                                    </div>
                                                    <div>
                                                        <label for="Accommodation">Avez vous Besoin d'ëtre Heberger</label>
                                                        <select class="custom-select custom-select-sm" name="Accommodation" id="Accommodation">
                                                            <option selected=""<option selected="">Choissez dans la liste suivante </option>
                                                            <option value="Oui">Oui</option>
                                                            <option value="Oui">NON</option>
                                                        </select>
                                                        <p class="text-danger"><?= isset($formError['Accommodation']) ? $formError['Accommodation'] : '' ?></p>
                                                    </div>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </div>
                                        <div> 
                                            <input type="submit" name="OfficialForComptition" value="s'inscrire" />
                                        </div>
                                    </form>
                                </div>
                                <?php
                            }
                        }
                    }
                    ?>

                </div>
                <div>
                    <a href="ListOfOpenCompetitons.php"><button> Retour</button></a>
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
