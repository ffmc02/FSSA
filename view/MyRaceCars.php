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
                <?php
                include_once '../Include/LeftColum.php';
                ?>
            </div>
            <div class="col-lg-6 centralColumm">
                <h2>Les voitures que je posséde</h2>
                <div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Marque</th>
                                <th scope="col">Modèle</th>
                                <th scope="col">Groupe</th>
                                <th scope="col">Classe</th>
                                <th scope="col">Nombre d'occupants</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($ListOfOwners AS $ListMyCards) {
                                if ($IdUserCars == $ListMyCards->id_0108ASAP_membres) {
                                    ?>              
                                    <tr>
<!--                                        <th scope="row">Voiture</th>-->
                                        <td><?= $ListMyCards->Marque ?></td>
                                        <td><?= $ListMyCards->Model ?></td>
                                        <td><?= $ListMyCards->Categorie ?></td>
                                        <td><?= $ListMyCards->Classe ?></td>
                                        <td><?= $ListMyCards->NombreDOccupant ?></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>    
                        </tbody>
                    </table>
                    <a href="HomeLogin.php"><button>Retour</button></a>
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