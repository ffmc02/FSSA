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

            </div>
            <div class="col-lg-6 centralColumm">
                <div>
                    <p>Vous pouvez ajouter une comptétition grace au formulaire suivant :</p>
                </div>
                <div>
                    <form name="AddCompetitions" method="PÖST" id="AddCommpetitions">
                        <div> 
                            <label for="CatgoryCompetition">Catégorie de la compétion</label>
                            <select class="custom-select custom-select-sm" name="CatgoryCompetition" id="CatgoryCompetition">
                                <option selected="">Choissez dans la liste suivante </option>
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
                            <label for="typeCompetiton">Type de competition (rallye, course de cote etc)</label>
                            <select class="custom-select custom-select-sm" name="typeCompetiton" id="typeCompetiton">
                                <option selected="">Choissez dans la liste suivante </option>
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
                            <label for="NameOfCompetion">Nom de La compétition: </label>
                            <input type="text" name="NameOfCompetion" id="NameOfCompetion" />
                            <p class="text-danger"><?= isset($formError['NameOfCompetion']) ? $formError['NameOfCompetion'] : '' ?></p>
                        </div>
                        <div> 
                            <label for="StartOfTheCompetition">Date de début de la compétition</label>
                            <input type="date" name="StartOfTheCompetition" id="StartOfTheCompetition" />
                            <p class="text-danger"><?= isset($formError['StartOfTheCompetition']) ? $formError['StartOfTheCompetition'] : '' ?></p>
                        </div>
                        <div> 
                            <label for="NumberDays ">Nombre de jour de compétions</label>
                            <input type="text" name="NumberDays " id="NumberDays " />
                            <p class="text-danger"><?= isset($formError['NumberDays ']) ? $formError['NumberDays '] : '' ?></p>
                        </div>
                        <div>
                            <label for="OpenOrClose">Ouvrire la compétition</label>
                            <select class="custom-select custom-select-sm" name="OpenOrClose" id="OpenOrClose">
                                <option selected="">Choissez si vous ouvrez la compétition à l'nscription</option>
                                <option value="Open">Ouvert</option>
                                <option value="Close">Fermer</option>
                            </select>
                            <p class="text-danger"><?= isset($formError['OpenOrClose ']) ? $formError['OpenOrClose '] : '' ?></p>
                        </div>
                        <div> 
                            <input type="submit" name="AddCompetition" id="AddCompetition" value="Ajouter la compétition" />
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
<!-- 
                        <div> 
                            <label for=""></label>
                            <input type="" name="" id="" />
                            <p class="text-danger"><?= isset($formError['']) ? $formError[''] : '' ?></p>
                        </div>
-->