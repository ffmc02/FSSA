<?php
include_once '../Config.php';
include_once '../Controller/ListOfregistridedMembersCtrl.php';
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
                <h1>Tabelau des licenciers </h1>
            </div>
            <div class="col-lg-3">
                <img src="../assets/img/imgPresentation/logo.jpg" alt=""/>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-1 leftColumm">
               
            </div>
            <div class="col-lg-10 centralColumm">
                <div>
                     <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Nom Du Licencier</th>
                            <th scope="col">Prénom du licencier </th>
                            <th scope="col">Licence principal </th>
                            <th scope="col">Modifier la licence</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($AssignAManagerLicence AS $AssignAManger) {
                            ?>
                            <tr>              
                                <th scope="row"><?= $AssignAManger->Name ?></th>
                                <td><?= $AssignAManger->Firstname ?></td>
                                <td><?= $AssignAManger->TypeOfLicence ?></td>
                                <td><a href="AssignAManagerLicence.php?IdSummryLicense=<?=$AssignAManger->IdFunctionSummary?>">ICI</a></td>
                            </tr>
                            <?php
                        }
//                
                        ?>
                    </tbody>
                </table>
                </div>

            </div>
            <div class="col-lg-1 rigthColumm">
              
            </div>
        </div>
    </div>
    <?php
} else {
    include_once '../Include/RestrictedZone.php';
}
include_once '../include/footer.php';
?>