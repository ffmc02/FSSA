<?php

$title = 'S\'Inscrire à une compétiton';
$regexId = '/^\d+$/';
if (isset($_GET['IdCompet'])) {
    if (preg_match($regexId, $_GET['IdCompet'])) {
        $IdCompetition= htmlspecialchars($_GET['IdCompet']);
    }
}

$DisplayListCompettion=new Competiton();
$ListOfOpenCompetitons=$DisplayListCompettion->DisplayCompetitionRegistration();