
<?php
include_once '../Config.php';
include_once '../Controller/ListOfOpenCompetitonsCtrl.php';
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
                <h1>Liste des compétitions ouvertes</h1>
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
            <div class="col-lg-7 centralColumm">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Nom de l'épreuve</th>
                            <th scope="col">Type d'épreuve</th>
                            <th scope="col">Localisation ou circuit</th>
                            <th scope="col">Date de la cource</th>
                            <th scope="col">Durée</th>
                            <th scope="col">Observation </th>
                            <th scope="col">S'inscrire </th>
                            <?php if (in_array($_SESSION['access'], $Responsible)) { ?>
                                <th scope="col">Modifier</th>
                                <th scope="col">Fermér </th>
                                <?php
                            }
                            ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($ListOfOpenCompetitons AS $OpenCompetition) {
                            ?>
                            <!--///p>-->
                            <tr>              
                                <th scope="row"><?= $OpenCompetition->NameOfTheTest ?></th>
                                <td><?= $OpenCompetition->CategoryCompetition ?></td>
                                <td><?= $OpenCompetition->Location_Circuit ?></td>
                                <td><?= $OpenCompetition->DateOfCompetition ?></td>
                                <td><?= $OpenCompetition->NumberDays ?></td>
                                <td><?= $OpenCompetition->Observation ?></td>
                                <td><a href="FunctionForCompetition.php?IdCompet=<?= $OpenCompetition->id ?>">sur cette épreuves</a></td>
                                <?php if (in_array($_SESSION['access'], $Responsible)) { ?>
                                    <td> <a href="EditACompetiton.php?IdCompet=<?= $OpenCompetition->id ?>">ICI</a></td>
                                    <td> <a href="ClosedCompetition.php?IdCompet=<?= $OpenCompetition->id ?>">ICI</a></td>
                                    <?php
                                }
                                ?>
                            </tr>
                            <?php
                        }
//                
                        ?>
                    </tbody>
                </table>

                <div>
                    <a href="HomeLogin.php"><button> Retour</button></a>
                </div>
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