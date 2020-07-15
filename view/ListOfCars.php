<?php
include_once '../Config.php';
include_once '../Controller/ListOfCarsCtrl.php';
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
                <h1>Liste des voitures et des propriaitaires enregistré</h1>
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
                    <h2>Liste des voitures et propiaitaire enregistré</h2>
                </div>
                <div>
                  
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col">Nom</th>
                                    <th scope="col">Prénom</th>
                                    <th scope="col">Marque de la voiture</th>
                                    <th scope="col">Model</th>
                                    <th scope="col">Catégorie</th>
                                    <th scope="col">Classe</th>
                                    <th scope="col">Nombre d'occupant</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($ListOfOwners AS $ListCars) {
                                    ?>
                                    <tr>
                                        <th scope="row"></th>
                                        <td><?= $ListCars->NomsPilote  ?></td>                                        
                                        <td><?= $ListCars->PrenomPilote  ?></td>
                                        <td><?= $ListCars->Marque  ?></td>
                                        <td><?= $ListCars->Model  ?></td>
                                        <td><?= $ListCars->Categorie  ?></td>
                                        <td><?= $ListCars->Classe  ?></td>
                                        <td><?= $ListCars->NombreDOccupant  ?></td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>


                    </div>
                    <div>
                        <p>Ajouté une voiture <a href="AddCars.php">ICI</a></p>
                    </div>
                    <div>
                        <a href="HomeLogin.php"><button>Retour</button></a>
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