<?php
include_once '../Config.php';
include_once '../controller/AddCarsCtrl.php';
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
                <h1>Ajouté un véhicules</h1>
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
                    <p class="text-danger"><?= isset($Error['Session']) ? $Error['Session'] : '' ?></p>
                    <p class="text-danger"><?= isset($Error['Error']) ? $Error['Error'] : '' ?></p>
                    <p class="text-primary"><?= isset($Success['AddCars']) ? $Success['AddCars'] : '' ?></p>
                </div>
                <div>
                    <div>
                        <form name="AddCar" method="POST" >
                            <div>
                                <label for="Occupying">Nombre d'occupant :</label>
                                <input id="Occupying" name="Occupying" type="text" />
                                <p class="text-danger"><?= isset($formError['Occupying']) ? $formError['Occupying'] : '' ?></p>
                            </div>
                            <div>
                                <label for="Mark">Marque :</label>
                                <input id="Mark" name="Mark" type="text" />
                                <p class="text-danger"><?= isset($formError['Mark']) ? $formError['Mark'] : '' ?></p>
                            </div>
                            <div>
                                <label for="Model">Model :</label>
                                <input id="Model" name="Model" type="text" />
                                <p class="text-danger"><?= isset($formError['Model']) ? $formError['Model'] : '' ?></p>
                            </div>
                            <div>
                                <label for="Category">Catégorie</label>
                                <input id="Category" name="Category" type="text" />
                                <p class="text-danger"><?= isset($formError['Category']) ? $formError['Category'] : '' ?></p>
                            </div>
                            <div>
                                <label for="Classroom">Classe :</label>
                                <input id="Classroom" name="Classroom" type="text" />
                                <p class="text-danger"><?= isset($formError['Classroom']) ? $formError['Classroom'] : '' ?></p>
                            </div>
                            <div>
                                <input type="submit" name="AddCars" value="Ajouter la voiture"/>
                            </div>
                        </form>
                        <a href="HomeLogin.php"><button>Retour</button></a>
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