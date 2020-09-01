<?php

$title = "Liste des officiels par competitions";
$regexId = '/^\d+$/';
$ListOfficial= new Registrationforofficial();
$NameOfCompetiton= new Registrationforofficial();
        if (isset($_GET['IdCompet'])) {
    if (preg_match($regexId, $_GET['IdCompet'])) {
        $IdCompetition= htmlspecialchars($_GET['IdCompet']);
      $ListOfficial->idCompet=$IdCompetition; 
      $NameOfCompetiton->idCompet=$IdCompetition; 
    }
    
}
$DisplayListOfficialByCompetition= $ListOfficial->DisplayListOfficialsByCompetition();
$TitleCompetition=$NameOfCompetiton->NameOfTest();
$ListeOfficialByCompetition=$TitleCompetition->NameOfTheTest;
