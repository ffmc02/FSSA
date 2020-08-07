<?php

$title = 'S\'Inscrire à une compétiton';
$regexId = '/^\d+$/';
if (isset($_GET['Function'])) {
    $Demande = htmlspecialchars($_GET['Function']);
}


if (isset($_GET['Function'])) {
    $Demande = htmlspecialchars($_GET['Function']);
}

if (isset($_GET['IdCompet'])) {
    if (preg_match($regexId, $_GET['IdCompet'])) {
        $IdCompetition = htmlspecialchars($_GET['IdCompet']);
    }
}
if($Demande=='Concurrent'){
    
}
if($Demande=='Officiel'){
    
}
$FonctionList = new functions();
$listerFunctions = $FonctionList->ListOfFunction();