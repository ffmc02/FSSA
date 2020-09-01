<?php
$title='Rouvrir une compétition fermé';$DisplayCompetition = new Competiton();

$formError = array();
$regexId = '/^\d+$/';
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
            $CloseCompetiton->Close = 0;
            $CloseCompetiton->Open = 1;
        }
    }
    $CheckCloseCompetiton = $CloseCompetiton->ClosedCompetiton();
    if ($CheckCloseCompetiton == true) {
        $messageSuccess='La competition a été ouverter avec succees';
          header("Location: ListOfOpenCompetitons.php");
        
    }
}