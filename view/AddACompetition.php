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
                    <form name="AddCompetition" method="PÖST" id="AddCommpetition">
                        <div> 
                            <label for=EventCategory"">Nom de la cource</label>
                            <input type="text" name="EventCategory" id="EventCategory" />
                            <p class="text-danger"><?= isset($formError['EventCategory']) ? $formError['EventCategory'] : '' ?></p>
                        </div>

                        <div> 
                            <label for="TypeOfRace">Type de cource(Rallye, Rallye tout terrain, slalom, etc</label>
                            <input type="text" name="TypeOfRace" id="TypeOfRace" />
                            <p class="text-danger"><?= isset($formError['TypeOfRace']) ? $formError['TypeOfRace'] : '' ?></p>
                        </div>
                        <div> 
                            <label for="Area">Type de surface (route circuit terre etc </label>
                            <input type="text" name="Area" id="Area" />
                            <p class="text-danger"><?= isset($formError['Area']) ? $formError['Area'] : '' ?></p>
                        </div>
                        <div> 
                            <label for="CategoryOfTheCompetition">Catégorie de la cource (championat national, régional etc</label>
                            <input type="text" name="CategoryOfTheCompetition" id="CategoryOfTheCompetition" />
                            <p class="text-danger"><?= isset($formError['CategoryOfTheCompetition']) ? $formError['CategoryOfTheCompetition'] : '' ?></p>
                        </div>
                        <div> 
                            <label for="MaximunNumberOfConcurrent">Nombre maximun de concurrents </label>
                            <input type="text" name="MaximunNumberOfConcurrent" id="MaximunNumberOfConcurrent" />
                            <p class="text-danger"><?= isset($formError['MaximunNumberOfConcurrent']) ? $formError['MaximunNumberOfConcurrent'] : '' ?></p>
                        </div>
                        <div> 
                            <label for="MinimumNumberOfCommissioners">Nombre de commicaire minimun </label>
                            <input type="text" name="MinimumNumberOfCommissioners" id="MinimumNumberOfCommissioners" />
                            <p class="text-danger"><?= isset($formError['MinimumNumberOfCommissioners']) ? $formError['MinimumNumberOfCommissioners'] : '' ?></p>
                        </div>
                        <div> 
                            <label for="MinimumNumberOfOfficials">Nombre minimun d'officiel (voiture ouveurse DES et PC </label>
                            <input type="text" name="MinimumNumberOfOfficials" id="MinimumNumberOfOfficials" />
                            <p class="text-danger"><?= isset($formError['MinimumNumberOfOfficials']) ? $formError['MinimumNumberOfOfficials'] : '' ?></p>
                        </div>
                        <div> 
                            <label for="MinimunNumbersOfVolunteers">Nombre de Bénévole minimun</label>
                            <input type="" name="" id="" />
                            <p class="text-danger"><?= isset($formError['']) ? $formError[''] : '' ?></p>
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