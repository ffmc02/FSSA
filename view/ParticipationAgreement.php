<?php
include_once '../Config.php';
include_once '../Controller/ParticipationAgreementCtrl.php';
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
                <h1>Epreuve oÃ¹ je suis inscrit</h1>
            </div>
            <div class="col-lg-3">
                <img src="../assets/img/imgPresentation/logo.jpg" alt=""/>
            </div>
        </div>
        <div class="row">
           
            <div class="col-lg-10 centralColumm">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Nom  de l'épreuve </th>
                            <th scope="col">Date de début  de l'épreuve </th>
                            <th scope="col">Nom de l'officiel</th>
                            <th scope="col">PrÃ©nom de l'officiel </th>
                            <th scope="col">Fonction</th>
                            <th scope="col">Disponible Jour 1 PC</th>
                            <th scope="col">Disponible Jour 2 PC</th>
                            <th scope="col">Disponible Jour 3 PC</th>
                            <th scope="col">Disponible Jour 1 Terrain</th>
                            <th scope="col">Disponible Jour 2 Terrain</th>
                            <th scope="col">Disponible Jour 3 Terrain</th>
                            <th scope="col">Besoin d'hébergement </th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($DisplayListOfficial AS $ListOfRegisteredOfficials) {
                            if (in_array($_SESSION['access'], $Responsible)|| $_SESSION['idUser'] == $ListOfRegisteredOfficials->IdMembers) {
                                ?>
                                <tr>
                                    <th scope="row"><?= $ListOfRegisteredOfficials->NameOfTheTest ?> </th>
                                    <th scope="row"><?= $ListOfRegisteredOfficials->StartDate ?> </th>
                                    <td><?= $ListOfRegisteredOfficials->Name ?></td>
                                    <td><?= $ListOfRegisteredOfficials->Firstname ?></td>
                                    <td><?= $ListOfRegisteredOfficials->TypeOfLicence ?></td>
                                    <td><?= $ListOfRegisteredOfficials->ResponseDatePcNeed1 ?></td>
                                    <td><?= $ListOfRegisteredOfficials->ResponseDatePcNeed2 ?></td>
                                    <td><?= $ListOfRegisteredOfficials->ResponseDatePcNeed3 ?></td>
                                    <td><?= $ListOfRegisteredOfficials->AvaibleDateNeedForTheCommissioner1 ?></td>
                                    <td><?= $ListOfRegisteredOfficials->AvaibleDateNeedForTheCommissioner2 ?></td>
                                    <td><?= $ListOfRegisteredOfficials->AvaibleDateNeedForTheCommissioner3 ?></td>
                                    <td><?= $ListOfRegisteredOfficials->Accommodation ?></td>
                                    
                                </tr>
                            <?php
                            }
                        }
                        ?>  
                    </tbody>
                </table>
            </div>
            <div class="col-lg-2 rigthColumm">
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