<?php
include_once '../Config.php';
include_once '../Controller/EditACompetitonCtrl.php';
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

                <h1><?= $h1title ?></h1>
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

                <?php
                if ($CompetitionCategory != 1 && $CompetitionCategory != 2) {
                    foreach ($ListRaceOustideRally AS $IdComepetions) {
                        $CompetId = $IdComepetions->id;

//                        if ($CompetId == $CompetitionId) {
                        ?>
                        <div>
                            <p>Pour modifier les informations de la course remplacer les données dans le formulaire suivant</p>
                        </div>
                        <div>
                            <form name="EdditCompetition" id="EdditCompetition" method="POST" >
                                <div> 
                                    <label> Si besoin de modifier le type de Competition selectioner dans la liste suivante.</label>
                                    <select class="custom-select custom-select-sm" name="CatgoryCompetition" id="CatgoryCompetition">
                                        <?php
                                        foreach ($ListRaceOustideRally as $CategoryCompetitions) {
                                            ?>
                                            <option selected="" value="<?= $CategoryCompetitions->idTypeCompetition ?>"> <?= $CategoryCompetitions->TypeOfCompetiton ?></option>
                                            <?php
                                        }
                                        foreach ($DisplayListOfCompetitions as $ListCompetition) {
                                            ?>
                                            <option value="<?= $ListCompetition->id ?>"> <?= $ListCompetition->TypeOfCompetiton ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div> 
                                    <label for="typeCompetiton">Si besoin selectionnez le nouveau Type de course dans la liste suivante </label>
                                    <select class="custom-select custom-select-sm" name="typeCompetiton" id="typeCompetiton">
                                        <?php
                                        foreach ($ListRaceOustideRally as $RaceType) {
                                            ?>
                                            <option selected="" value="<?= $RaceType->IdRaceType ?>"><?= $RaceType->CategoryCompetition ?> </option>
                                            <?php
                                        }
                                        foreach ($DisplayCategoryCompetion as $CategoryCompetition) {
                                            ?>
                                            <option value="<?= $CategoryCompetition->id ?>"> <?= $CategoryCompetition->CategoryCompetition ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div>
                                    <?php
                                    foreach ($ListRaceOustideRally as $RaceType) {
                                        ?>
                                        <div> 
                                            <p class="text-danger">Si vous avez besoin de modifier les informations compléter les champs sinon laissez les vides.*</p>
                                        </div>
                                        <div>
                                            <input type="hidden" name="IdSportEvents" id="IdSportEvents" value="<?= $RaceType->IdSportEvents ?>"/>

                                        </div>
                                        <div> 
                                            <label for="NameOfCompetion">Nom de La compétition:* </label>
                                            <input type="text" name="NameOfCompetion" id="NameOfCompetion" value="<?= $RaceType->NameOfTheTest ?>" />
                                            <p class="text-danger"><?= isset($formError['NameOfCompetion']) ? $formError['NameOfCompetion'] : '' ?></p>
                                        </div>
                                        <div> 
                                            <label for="Location_Circuit">Lieu ou circuit où à lieu la compétition:* </label>
                                            <input type="text" name="Location_Circuit" id="Location_Circuit" value="<?= $RaceType->Location_Circuit ?>" />
                                            <p class="text-danger"><?= isset($formError['Location_Circuit']) ? $formError['Location_Circuit'] : '' ?></p>
                                        </div>
                                        <div> 
                                            <label for="StartOfTheCompetition">Date de début <?= $RaceType->DateDebut ?>: *</label>
                                            <input type="date" name="StartOfTheCompetition" id="StartOfTheCompetition" value="<?= $RaceType->DateDebut ?>"/>
                                            <p class="text-danger"><?= isset($formError['StartOfTheCompetition']) ? $formError['StartOfTheCompetition'] : '' ?></p>
                                        </div>
                                        <div> 
                                            <label for="EndOfTheCompetition">Date de Fin <?= $RaceType->End ?>: *</label>
                                            <input type="date" name="EndOfTheCompetition" id="EndOfTheCompetition" value="<?= $RaceType->End ?>"/>
                                            <p class="text-danger"><?= isset($formError['EndOfTheCompetition']) ? $formError['EndOfTheCompetition'] : '' ?></p>
                                        </div>
                                        <div> 
                                            <label for="NumberDaysCompetition">Nombre de jour de compétition:* </label>
                                            <input type="text" name="NumberDaysCompetition" id="NumberDaysCompetition" value="<?= $RaceType->NumberDays ?>" />
                                            <p class="text-danger"><?= isset($formError['NumberDays ']) ? $formError['NumberDays '] : '' ?></p>
                                        </div>
                                        <div> 
                                            <label for="Observation">Observation: *</label>
                                            <input type="text" name="Observation" id="Observation" value="<?= $RaceType->Observation ?>"/>
                                            <p class="text-danger"><?= isset($formError['Observation']) ? $formError['Observation'] : '' ?></p>
                                        </div>
                                        <div>
                                            <p>Dates des besoins des officiels </p>
                                        </div>
                                        <div>
                                            <input type="hidden" name="Idraceoutsiderally" value="<?= $RaceType->Idraceoutsiderally ?>" />
                                        </div>
                                        <div>
                                            <label for="RequirementDate1">date des besoins 1*(<?= $RaceType->Day1 ?>) </label>
                                            <input type="date" name="RequirementDate1" id="RequirementDate1" />
                                            <p class="text-danger"><?= isset($formError['NameOfCompetion']) ? $formError['NameOfCompetion'] : '' ?></p>
                                        </div>
                                        <div>
                                            <label for="RequirementDate2">date des besoins 2*(<?= $RaceType->Day2 ?>)</label>
                                            <input type="date" name="RequirementDate2" id="RequirementDate2" />
                                            <p class="text-danger"><?= isset($formError['NameOfCompetion']) ? $formError['NameOfCompetion'] : '' ?></p>
                                        </div>
                                        <div>
                                            <label for="RequirementDate3">date des besoins 3*(<?= $RaceType->Day3 ?>)</label>
                                            <input type="date" name="RequirementDate3" id="RequirementDate3" />
                                            <p class="text-danger"><?= isset($formError['NameOfCompetion']) ? $formError['NameOfCompetion'] : '' ?></p>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                </div>
                                <div> 
                                    <input type="submit" name="EditRace" id="EditRace" value="Modier" />
                                </div>

                            </form>

                        </div>
                        <?php
//                        }
                    }
                }
                if ($CompetitionCategory == 1 || $CompetitionCategory == 2) {
//                    foreach ($ListRally as $DisplayRally) {
                    $Competid = $ListRally->id;
                    if ($Competid == $CompetitionId) {
                        ?>
                        <div>
                            <p>Pour modifier les informations du rallye remplacer les données dans le formulaire suivant</p>
                        </div>
                        <div>
                            <form name="EdditRally" method="POST" id="EdditRally">
                                <div> 
                                    <label for="CatgoryCompetition">Catégorie de la compétion: </label>
                                    <select class="custom-select custom-select-sm" name="CatgoryCompetition" id="CatgoryCompetition">
                                        <option selected="" value="<?= $ListRally->idTypeCompetition ?>"><?= $ListRally->TypeOfCompetiton ?> </option>
                                        <?php
                                        foreach ($DisplayListOfCompetitions as $ListCompetition) {
                                            ?>
                                            <option value="<?= $ListCompetition->id ?>"> <?= $ListCompetition->TypeOfCompetiton ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div> 
                                    <label for="typeCompetiton">Si besoin selectionnez le nouveau Type de course dans la liste suivante </label>
                                    <select class="custom-select custom-select-sm" name="typeCompetiton" id="typeCompetiton">
                                        <?php
                                        foreach ($ListRaceOustideRally as $RaceType) {
                                            ?>
                                            <option selected="" value="<?= $ListRally->IdRaceType ?>"><?= $ListRally->CategoryCompetition ?> </option>
                                            <?php
                                        }
                                        foreach ($DisplayCategoryCompetion as $CategoryCompetition) {
                                            ?>
                                            <option value="<?= $CategoryCompetition->id ?>"> <?= $CategoryCompetition->CategoryCompetition ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div>
                                    <div> 
                                        <p class="text-danger">Si vous avez besoin de modifier les informations compléter les champs sinon laissez les Comme ils sont.*</p>
                                    </div>
                                    <div>
                                        <input type="hidden" name="IdSportEvents" id="IdSportEvents" value="<?= $DisplayRally->IdSportEvents ?>"/>
                                    </div>
                                    <div> 
                                        <label for="NameOfCompetion">Nom de La compétition:* </label>
                                        <input type="text" name="NameOfCompetion" id="NameOfCompetion" value="<?= $ListRally->NameOfTheTest ?>" />
                                        <p class="text-danger"><?= isset($formError['NameOfCompetion']) ? $formError['NameOfCompetion'] : '' ?></p>
                                    </div>
                                    <div> 
                                        <label for="Location_Circuit">Lieu ou circuit où à lieu la compétition:* </label>
                                        <input type="text" name="Location_Circuit" id="Location_Circuit" value="<?= $ListRally->Location_Circuit ?>" />
                                        <p class="text-danger"><?= isset($formError['Location_Circuit']) ? $formError['Location_Circuit'] : '' ?></p>
                                    </div>
                                    <div> 
                                        <label for="StartOfTheCompetition">Date de début <?= $RaceType->DateDebut ?>: *</label>
                                        <input type="date" name="StartOfTheCompetition" id="StartOfTheCompetition" value="<?= $ListRally->DateDebut ?>"/>
                                        <p class="text-danger"><?= isset($formError['StartOfTheCompetition']) ? $formError['StartOfTheCompetition'] : '' ?></p>
                                    </div>
                                    <div> 
                                        <label for="NumberDaysCompetition">Nombre de jour de compétition:* </label>
                                        <input type="text" name="NumberDaysCompetition" id="NumberDaysCompetition" value="<?= $ListRally->NumberDays ?>" />
                                        <p class="text-danger"><?= isset($formError['NumberDays ']) ? $formError['NumberDays '] : '' ?></p>
                                    </div>
                                    <div> 
                                        <label for="Observation">Observation: *</label>
                                        <input type="text" name="Observation" id="Observation" value="<?= $ListRally->Observation ?>"/>
                                        <p class="text-danger"><?= isset($formError['Observation']) ? $formError['Observation'] : '' ?></p>
                                    </div>
                                    <div>
                                        <input name="idRally" id="idRally" type="hidden" value="<?= $ListRally->IdRally ?>"/>
                                    </div>
                                    <div> 
                                        <label for="NumberOfSteps">Nombre d'étapes: *</label>
                                        <input type="text" name="NumberOfSteps" id="NumberOfSteps" value="<?= $ListRally->NumberOfSteps ?>" />
                                        <p class="text-danger"><?= isset($formError['NumberOfSteps']) ? $formError['NumberOfSteps'] : '' ?></p>
                                    </div>
                                    <div> 
                                        <label for="NumberOfEs">Nombre d'Epreuvres Spéciales: *</label>
                                        <input type="text" name="NumberOfEs" id="NumberOfEs" value="<?= $ListRally->NumberDays ?>"/>
                                        <p class="text-danger"><?= isset($formError['NumberOfEs']) ? $formError['NumberOfEs'] : '' ?></p>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4"> 
                                            <label for="DatePcNeed1 ">date Besoins PC: *</label>
                                            <div>                                     
                                                <p><?= $ListRally->DatePcNeed1 ?>*</p>
                                                <input type="Date" name="DatePcNeed1" id="DatePcNeed1" />
                                            </div>
                                            <div>
                                                <p><?= $ListRally->DatePcNeed2 ?>*</p>
                                                <input type="Date" name="DatePcNeed2" id="DatePcNeed2" />
                                            </div>
                                            <div>
                                                <p><?= $ListRally->DatePcNeed3 ?>*</p>
                                                <input type="Date" name="DatePcNeed3" id="DatePcNeed3" />
                                            </div>
                                            <p class="text-danger"><?= isset($formError['DatePcNeed']) ? $formError['DatePcNeed'] : '' ?></p>
                                        </div>
                                        <div class="col-lg-4"> 
                                            <div>
                                                <label for="RecognitionDay ">date reconnaissances: *</label>
                                            </div>
                                            <div>
                                                <p><?= $ListRally->RecognitionDay ?>*</p>
                                                <input type="Date" name="RecognitionDay" id="RecognitionDay" /><span class="text-danger">*</span>
                                            </div>
                                            <div>
                                                <p><?= $ListRally->RecognitionDay2 ?>*</p>
                                                <input type="Date" name="RecognitionDay2" id="RecognitionDay2" />
                                            </div>
                                            <div>  
                                                <p><?= $ListRally->RecognitionDay3 ?>*</p>
                                                <input type="Date" name="RecognitionDay3" id="RecognitionDay3" />
                                            </div>
                                        </div>
                                        <div class="col-lg-4"> 
                                            <label for="DateNeedForTheCommissioner1 ">date des Besoins terrain:* </label>
                                            <div>                                    
                                                <p><?= $ListRally->DateNeedForTheCommissioner1 ?>*</p>
                                                <input type="Date" name="DateNeedForTheCommissioner1" id="DateNeedForTheCommissioner1" />
                                            </div>
                                            <div>                                    
                                                <p><?= $ListRally->DateNeedForTheCommissioner2 ?>*</p>
                                                <input type="Date" name="DateNeedForTheCommissioner2" id="DateNeedForTheCommissioner2" />
                                            </div>
                                            <div>                                    
                                                <p><?= $ListRally->DateNeedForTheCommissioner3 ?>*</p>
                                                <input type="Date" name="DateNeedForTheCommissioner3" id="DateNeedForTheCommissioner3" />
                                            </div>
                                            <p class="text-danger"><?= isset($formError['DateNeedForTheCommissioner']) ? $formError['DateNeedForTheCommissioner'] : '' ?></p>
                                        </div>
                                    </div>
                                    <div> 
                                        <label for="AsaOrganizer">ASA organisatrice: *</label>
                                        <input type="text" name="AsaOrganizer" id="NumberOfEs" value="<?= $ListRally->AsaOrganizer ?>" />
                                        <p class="text-danger"><?= isset($formError['AsaOrganizer']) ? $formError['AsaOrganizer'] : '' ?></p>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                            <div>
                                <input type="submit" name="EdditTheRally" value="Modifier le rallye" />
                            </div>
                    </div>
                    </form>     

                    <?php
//            }
                }
                ?>

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