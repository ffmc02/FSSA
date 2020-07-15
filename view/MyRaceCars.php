<?php
include_once '../Config.php';
include_once '../Controller/MyRaceCarsCtrl.php';
include_once '../Include/Header.php';
include_once '../Include/Navbar.php';
if (isset($_SESSION['connect']) && $_SESSION['connect'] == 'OK' && in_array($_SESSION['access'], $Function)) {
    $idUser = $_SESSION['access'];
    ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3">
                <img src="../assets/img/imgPresentation/logo.jpg" alt=""/>
            </div>
            <div class="col-lg-6 ">
                <h1>Mes voitures de courses </h1>
            </div>
            <div class="col-lg-3">
                <img src="../assets/img/imgPresentation/logo.jpg" alt=""/>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 leftColumm">

            </div>
            <div class="col-lg-6 centralColumm">
                <h2>Les voitures que je posséde</h2>
                <div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($ListOfOwners AS $ListMyCards) {
                                if ($idUser == $ListMyCards->id_0108ASAP_membres) {
                                    ?>              
                                    <tr>
                                        <th scope="row"></th>
                                        <td><?= $ListCars->Marque ?></td>
                                        <td><?= $ListCars->Model ?></td>
                                        <td><?= $ListCars->Categorie ?></td>
                                        <td><?= $ListCars->Classe ?></td>
                                        <td><?= $ListCars->NombreDOccupant ?></td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>    
                        </tbody>
                    </table>

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