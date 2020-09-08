<?php
include_once '../Config.php';
include_once '../Controller/ListOfRegisteredCompetitorsCtrl.php';
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
                <h1>Concurrents inscrits aux différentes compétitions</h1>
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
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Course</th>
                                <th scope="col">Nom du copilote</th>
                                <th scope="col">Prénom du copilote</th>
                                <th scope="col">Marque de la voiture</th>
                                <th scope="col">Modèle</th>
                                <th scope="col">Groupe </th>
                                <th scope="col">Classe</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($DisplayListCompetitors as $RegisteredForCompetition) {
                                ?>
                                <tr>
                                    <td><?= $RegisteredForCompetition->NameOfTheTest ?></td>>
                                    <?php
                                    if ($RegisteredForCompetition->Copilot != 0) {
                                        $CopilotId = $RegisteredForCompetition->Copilot;
                                        foreach ($CopilotInformation as $DiplayInformationCopilot) {
                                            if ($DiplayInformationCopilot->CopliotID == $RegisteredForCompetition->Copilot) {
                                                ?>

                                                <td><?= $DiplayInformationCopilot->Name ?></td> 
                                                <td><?= $DiplayInformationCopilot->Firstname ?></td> 
                                                <?php
                                            }
                                        }
                                    }
                                    ?>
                                    <td><?= $RegisteredForCompetition->Mark ?></td> 
                                    <td><?= $RegisteredForCompetition->Model ?></td>
                                    <td><?= $RegisteredForCompetition->Category ?></td> 
                                    <td><?= $RegisteredForCompetition->Classroom ?></td>
                                    <?php
//                        }
                                }
                                ?>
                        </tbody>
                    </table>
                </div>
                <div>
                        <a href="HomeLogin.php"><button> Retour</button></a>
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