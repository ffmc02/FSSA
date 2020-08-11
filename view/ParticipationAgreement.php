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
                <div>
                    <p>Vous êtes inscrit à la compétition </p>
                    <?php
                    foreach ($DisplayListCompetitors as $RegisteredForCompetition) {
                        ?>
                        <p><?= $RegisteredForCompetition->NameOfTheTest ?></p>
                        <?php 
                        if($RegisteredForCompetition->Copilot!=0){
                          $CopilotId=$RegisteredForCompetition->Copilot;
                          foreach ($CopilotInformation as $DiplayInformationCopilot){
                          if($DiplayInformationCopilot->CopliotID==$RegisteredForCompetition->Copilot){
                        ?>
                        <p><?=$DiplayInformationCopilot->name ?></p>
                        <?php
                          }
                        }
                    }
                    ?>
                        <p>Avec comme copilote <?= $RegisteredForCompetition->Copilot ?></p>
                        <p>et comme voiture <?= $RegisteredForCompetition->Mark ?></p>
                        <p><?= $RegisteredForCompetition->Model ?></p>
                        <?php
//                        }
                    }
                    ?>
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