<?php
include_once '../Config.php';
include_once '../Controller/ClosedCompetitionCtrl.php';
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
                <h1>Fermer une compétition</h1>

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
                    <p class="text-primary"><?= isset($messageSuccess) ? $messageSuccess : '' ?></p>
                    <?php
                    foreach ($DisplayNameCompetion AS $DisplayCompetion) {
                        $IdCompetition = $DisplayCompetion->IdCompetition;
                        if ($IdCompetition == $CompetitionId) {
                            ?>
                    <p>Vous souhaitez fermer le <?= $DisplayCompetion->NameOfTheTest ?></p>
                    <div>
                        <p>Cliquez sur fermer</p>
                        <form name="CloseCompet" method="POST">
                            <input name="CloseCompetition" value="Fermer" type="submit" />
                        </form>
                    </div>
                            <?php
                        }
                    }
                    ?>
                </div>
                <div>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                </div>
                <div>
                    <a href="ListOfOpenCompetitons.php"><button> Retour</button></a>
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