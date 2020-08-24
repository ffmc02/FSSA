<?php
include_once '../Config.php';
include_once '../Controller/RallyOpenToRegistrationCtrl.php';
include_once '../Include/Header.php';
include_once '../Include/Navbar.php';
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-3">
            <img src="../assets/img/imgPresentation/logo.jpg" alt=""/>
        </div>
        <div class="col-lg-6 ">

            <h1>Epreuve de Rallye / Rallye tout terrain </h1>
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
                <p>Vous pouvez ajouter une comptétition grace au formulaire suivant :</p>
            </div>
            <div>
                <form name="AddCompetitions" method="post" id="AddCommpetitions">
                    <div> 
                        <label for="CatgoryCompetition">Catégorie de la compétion: </label>
                        <select class="custom-select custom-select-sm" name="CatgoryCompetition" id="CatgoryCompetition">
                            <option selected="" value="0">Choissez dans la liste suivante </option>
                            <?php
                            foreach ($DisplayListOfCompetitions as $ListCompetition) {
                                ?>
                                <option value="<?= $ListCompetition->id ?>"> <?= $ListCompetition->TypeOfCompetiton ?></option>
                                <?php
                            }
                            ?>
                        </select>
                        <p class="text-danger"><?= isset($formError['CatgoryCompetition']) ? $formError['CatgoryCompetition'] : '' ?></p>
                    </div>
                    <div> 
                        <label for="typeCompetiton">Type de competition (rallye, course de cote etc): </label>
                        <select class="custom-select custom-select-sm" name="typeCompetiton" id="typeCompetiton">
                            <option selected="" value="0">Choissez dans la liste suivante </option>
                            <?php
                            foreach ($DisplayCategoryCompetion as $CategoryCompetition) {
                                if ($CategoryCompetition->id == 1 || $CategoryCompetition->id == 2) {
                                    ?>
                                    <option value="<?= $CategoryCompetition->id ?>"> <?= $CategoryCompetition->CategoryCompetition ?></option>
                                    <?php
                                }
                            }
                            ?>
                        </select>
                        <p class="text-danger"><?= isset($formError['typeCompetiton']) ? $formError['typeCompetiton'] : '' ?></p>
                    </div>
                    <div> 
                        <label for="NameOfCompetion">Nom de La compétition: </label>
                        <input type="text" name="NameOfCompetion" id="NameOfCompetion" />
                        <p class="text-danger"><?= isset($formError['NameOfCompetion']) ? $formError['NameOfCompetion'] : '' ?></p>
                    </div>
                    <div> 
                        <label for="Location_Circuit">Lieu ou circuit où à lieu la compétition: </label>
                        <input type="text" name="Location_Circuit" id="Location_Circuit" />
                        <p class="text-danger"><?= isset($formError['Location_Circuit']) ? $formError['Location_Circuit'] : '' ?></p>
                    </div>
                    <div> 
                        <label for="StartOfTheCompetition">Date de début de la compétition: </label>
                        <input type="date" name="StartOfTheCompetition" id="StartOfTheCompetition" />
                        <p class="text-danger"><?= isset($formError['StartOfTheCompetition']) ? $formError['StartOfTheCompetition'] : '' ?></p>
                    </div>
                    <div> 
                        <label for="NumberDaysCompetition">Nombre de jour de compétition: </label>
                        <input type="text" name="NumberDaysCompetition" id="NumberDaysCompetition" />
                        <p class="text-danger"><?= isset($formError['NumberDays ']) ? $formError['NumberDays '] : '' ?></p>
                    </div>
                    <div>
                        <label for="OpenOrClose">Ouvrire la compétition: </label>
                        <select class="custom-select custom-select-sm" name="OpenOrClose" id="OpenOrClose">
                            <option selected="" value="0">Choissez si vous ouvrez la compétition à l'nscription</option>
                            <option value="Open">Ouvert</option>
                            <option value="Close">Fermer</option>
                        </select>
                        <p class="text-danger"><?= isset($formError['OpenOrClose ']) ? $formError['OpenOrClose '] : '' ?></p>
                    </div>
                    <div> 
                        <label for="Observation">Observation: </label>
                        <input type="text" name="Observation" id="Observation" />
                        <p class="text-danger"><?= isset($formError['Observation']) ? $formError['Observation'] : '' ?></p>
                    </div>
                       <div> 
                        <label for="NumberOfSteps">Nombre d'étapes: </label>
                        <input type="text" name="NumberOfSteps" id="NumberOfSteps" />
                        <p class="text-danger"><?= isset($formError['NumberOfSteps']) ? $formError['NumberOfSteps'] : '' ?></p>
                    </div>
                       <div> 
                        <label for="NumberOfEs">Nombre d'Epreuvres Spéciales: </label>
                        <input type="text" name="NumberOfEs" id="NumberOfEs" />
                        <p class="text-danger"><?= isset($formError['NumberOfEs']) ? $formError['NumberOfEs'] : '' ?></p>
                    </div>
                      <div> 
                        <label for="NumberOfCompetitonDays">Nombre de jours de compétition: </label>
                        <input type="text" name="NumberOfCompetitonDays" id="NumberOfEs" />
                        <p class="text-danger"><?= isset($formError['NumberOfCompetitonDays']) ? $formError['NumberOfCompetitonDays'] : '' ?></p>
                    </div>
                    <div> 
                        <label for="RecognitionDay ">date des reconnaissances: </label>
                        <input type="Date" name="RecognitionDay" id="RecognitionDay" /><span class="text-danger">*</span>
                        <input type="Date" name="RecognitionDay2" id="RecognitionDay2" />
                        <input type="Date" name="RecognitionDay3" id="RecognitionDay3" />
                        <p class="text-danger">* Date obligatoire pour l'enregistrement</p>
                        <p class="text-danger"><?= isset($formError['NumberOfCompetitonDays']) ? $formError['NumberOfCompetitonDays'] : '' ?></p>
                    </div>
                     <div> 
                        <label for="AsaOrganizer">ASA organisatrice: </label>
                        <input type="text" name="AsaOrganizer" id="NumberOfEs" />
                        <p class="text-danger"><?= isset($formError['AsaOrganizer']) ? $formError['AsaOrganizer'] : '' ?></p>
                    </div>
                      <div> 
                        <label for="DatePcNeed1 ">date des Besoins au PC: </label>
                        <input type="Date" name="DatePcNeed1" id="DatePcNeed1" />
                        <input type="Date" name="DatePcNeed2" id="DatePcNeed2" />
                        <input type="Date" name="DatePcNeed3" id="DatePcNeed3" />
                        <p class="text-danger"><?= isset($formError['DatePcNeed']) ? $formError['DatePcNeed'] : '' ?></p>
                    </div>
                        <div> 
                        <label for="DateNeedForTheCommissioner1 ">date des Besoins Sur le terrain: </label>
                        <input type="Date" name="DateNeedForTheCommissioner1" id="DateNeedForTheCommissioner1" />
                        <input type="Date" name="DateNeedForTheCommissioner2" id="DateNeedForTheCommissioner2" />
                        <input type="Date" name="DateNeedForTheCommissioner3" id="DateNeedForTheCommissioner3" />
                        <p class="text-danger"><?= isset($formError['DateNeedForTheCommissioner']) ? $formError['DateNeedForTheCommissioner'] : '' ?></p>
                    </div>
                    <div>  
                        <input type="submit" name="AddCompetition" id="AddCompetition" value="Ajouter la compétition" />
                    </div>
                </form>
                <div>
                    <a href="HomeLogin.php"><button> Retour</button></a>
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
include_once '../include/footer.php';
?>