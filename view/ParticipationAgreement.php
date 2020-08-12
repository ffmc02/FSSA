<?php
include_once '../Config.php';
include_once '../Controller/ParticipationAgreementCtrl.php';
include_once '../Include/Header.php';
include_once '../Include/Navbar.php';
if (isset($_SESSION['connect']) && $_SESSION['connect'] == 'OK' && in_array($_SESSION['access'], $Function)) {
    foreach ($DisplayPilotInformation AS $DisplayPilotId) {
        $IdPilot = $DisplayPilotId->PliotID;
    }
    ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3">
                <img src="../assets/img/imgPresentation/logo.jpg" alt=""/>
            </div>
            <div class="col-lg-6 ">
                <h1>Epreuve où je suis inscrit</h1>
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
            <?php
            if (isset($_SESSION['idUser']) && $_SESSION['idUser'] == $IdPilot || in_array($_SESSION['access'], $Responsible)) {
                if (in_array($_SESSION['access'], $Officiel)) {
                    ?>
                   
                        <div>
                            <p>Vous êtes inscrit à la compétition comme officiel </p>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Course</th>
                                        <th scope="col">Date </th>
                                        <th scope="col">Lieu</th>
                                        <th scope="col">Type de compétition</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($DisplayListOfficial as $RegisteredForCompetition) {
                                        ?>
                                        <tr>
                                            <td><?= $RegisteredForCompetition->NameOfTheTest ?></td>>
                                            <td><?= $RegisteredForCompetition->DateOfTeste ?></td> 
                                            <td><?= $RegisteredForCompetition->Location_Circuit ?></td> 
                                            <td><?= $RegisteredForCompetition->CategoryCompetition ?></td> 
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
                   
                    <?php
                }
                if (in_array($_SESSION['access'], $Pilote)) {
                    ?>
                 
                        <div>
                            <p>Vous êtes inscrit à la compétition </p>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Course</th>
                                        <th scope="col">Nom du copiote</th>
                                        <th scope="col">Prénom du copilote</th>
                                        <th scope="col">Marque de la voiture</th>
                                        <th scope="col">Model</th>
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

                        <?php
                    }
                } else {
                    ?>   
                    <div>
                        <h2>Vous êtes Inscrit a aucune commpétition </h2>
                    </div>
                    <div>
                        <a href="HomeLogin.php"><button> Retour</button></a>
                    </div>
                    <?php
                }
                ?>
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