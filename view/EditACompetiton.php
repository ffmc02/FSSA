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
                <h1>Modifier une compétition</h1>
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
                    <p>Vous pouvez modifier la  comptétition grace au formulaire suivant :</p>
                </div>
                <?php
                if ($CompetitionCategory != 1 && $CompetitionCategory != 2) {
                    foreach ($ListRaceOustideRally AS $IdComepetions) {
                        $CompetId = $IdComepetions->id;

                        if ($CompetId == $CompetitionId) {
                            ?>
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
                                                <label for="NumberDaysCompetition">Nombre de jour de compétition:* </label>
                                                <input type="text" name="NumberDaysCompetition" id="NumberDaysCompetition" value="<?= $RaceType->NumberDays ?>" />
                                                <p class="text-danger"><?= isset($formError['NumberDays ']) ? $formError['NumberDays '] : '' ?></p>
                                            </div>
                                            <div> 
                                                <label for="Observation">Observation: </label>
                                                <input type="text" name="Observation" id="Observation" value="<?= $RaceType->Observation?>"/>
                                                <p class="text-danger"><?= isset($formError['Observation']) ? $formError['Observation'] : '' ?></p>
                                            </div>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                </form>

                            </div>
                            <?php
                        }
                    }
                }
                if ($CompetitionCategory == 1 || $CompetitionCategory == 2) {
                    ?>
                    <div>

                        <p>Teeest</p>
                    </div>
                    <?php
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