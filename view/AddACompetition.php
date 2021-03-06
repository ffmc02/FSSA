<?php
include_once '../Config.php';
include_once '../controller/AddACompetionCtrl.php';
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
                <h1>Ajout d'une compétition Automobile</h1>
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
                    <p>Vous pouvez ajouter une comptétition grâce au formulaire suivant :</p>
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
                            <label for="typeCompetiton">Type de compétition (rallye, course de côte etc): </label>
                            <select class="custom-select custom-select-sm" name="typeCompetiton" id="typeCompetiton">
                                <option selected="" value="0">Choissez dans la liste suivante </option>
                                <?php
                                foreach ($DisplayCategoryCompetion as $CategoryCompetition) {
                                    ?>
                                    <option value="<?= $CategoryCompetition->id ?>"> <?= $CategoryCompetition->CategoryCompetition ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                            <p class="text-danger"><?= isset($formError['typeCompetiton']) ? $formError['typeCompetiton'] : '' ?></p>
                        </div>
                        <div> 
                            <label for="NameOfCompetion">Nom de la compétition: </label>
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
                            <label for="NumberDaysCompetition">Nombre de jours de compétition: </label>
                            <input type="text" name="NumberDaysCompetition" id="NumberDaysCompetition" />
                            <p class="text-danger"><?= isset($formError['NumberDays ']) ? $formError['NumberDays '] : '' ?></p>
                        </div>
                        <div>
                            <label for="OpenOrClose">Ouvrir la compétition: </label>
                            <select class="custom-select custom-select-sm" name="OpenOrClose" id="OpenOrClose">
                                <option selected="" value="0">Choissez si vous ouvrez la compétition à l'nscription</option>
                                <option value="Open">Ouvert</option>
                                <option value="Close">Fermé</option>
                            </select>
                            <p class="text-danger"><?= isset($formError['OpenOrClose ']) ? $formError['OpenOrClose '] : '' ?></p>
                        </div>
                        <div> 
                            <label for="Observation">Observation: </label>
                            <input type="text" name="Observation" id="Observation" />
                            <p class="text-danger"><?= isset($formError['Observation']) ? $formError['Observation'] : '' ?></p>
                        </div>
                        <div>
                            <label for="CompetitionStarDay">date à laquelle débute la compétition</label>
                            <input type="date" name="CompetitionStarDay" id="CompetitionStarDay" />
                            <p class="text-danger"><?= isset($formError['CompetitionStarDay']) ? $formError['CompetitionStarDay'] : '' ?></p>
                        </div>

                        <div>
                            <label for="CompetitionEndDay">date à laquelle se finit la compétition</label>
                            <input type="date" name="CompetitionEndDay" id="CompetitionStarDay" />
                            <p class="text-danger"><?= isset($formError['CompetitionEndDay']) ? $formError['CompetitionEndDay'] : '' ?></p>
                        </div>
                        <div>
                            <p>Dates des besoins des officiels </p>
                        </div>
                        <div>
                            <label for="RequirementDate1">date des besoins 1</label>
                            <input type="date" name="RequirementDate1" id="RequirementDate1" />
                            <p class="text-danger"><?= isset($formError['NameOfCompetion']) ? $formError['NameOfCompetion'] : '' ?></p>
                        </div>
                           <div>
                            <label for="RequirementDate2">date des besoins 2</label>
                            <input type="date" name="RequirementDate2" id="RequirementDate2" />
                            <p class="text-danger"><?= isset($formError['NameOfCompetion']) ? $formError['NameOfCompetion'] : '' ?></p>
                        </div>
                           <div>
                            <label for="RequirementDate3">date des besoins 3</label>
                            <input type="date" name="RequirementDate3" id="RequirementDate3" />
                            <p class="text-danger"><?= isset($formError['NameOfCompetion']) ? $formError['NameOfCompetion'] : '' ?></p>
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
} else {
    include_once '../Include/RestrictedZone.php';
}
include_once '../include/footer.php';
?>
<!-- 
                        <div> 
                            <label for=""></label>
                            <input type="" name="" id="" />
                          <p class="text-danger"><?= isset($formError['Observation']) ? $formError['Observation'] : '' ?></p>
                        </div>
-->