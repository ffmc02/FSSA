<?php

$title = 'fermer une competiton';
$formError = array();
$regexId = '/^\d+$/';
$DisplayCompetition = new Competiton();
$DisplayNameCompetion = $DisplayCompetition->DisplayClosedCompetiton();
$CloseCompetiton = new Competiton();
if (isset($_GET['IdCompet'])) {
    if (preg_match($regexId, $_GET['IdCompet'])) {
        $CompetitionId = htmlspecialchars($_GET['IdCompet']);
    }
}
if (isset($_POST['CloseCompetition'])) {
    if (isset($_GET['IdCompet'])) {
        if (preg_match($regexId, $_GET['IdCompet'])) {
            $CloseCompetiton->id = htmlspecialchars($_GET['IdCompet']);
            $CloseCompetiton->Close = 1;
            $CloseCompetiton->Open = 0;
        }
    }
    $CheckCloseCompetiton = $CloseCompetiton->ClosedCompetiton();
    if ($CheckCloseCompetiton == true) {
        $messageSuccess='La competition a été cloturer avec succees';
          header("Location: ListOfOpenCompetitons.php");
    }
}