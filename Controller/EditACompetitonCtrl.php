<?php

$title = 'Modifier une competition ';
$formError = array();
$regexId = '/^\d+$/';
if (isset($_GET['IdCompet'])) {
    if (preg_match($regexId, $_GET['IdCompet'])) {
        $CompetitionId = htmlspecialchars($_GET['IdCompet']);
    }
}
if (isset($_GET['TypeCompet'])) {
    if (preg_match($regexId, $_GET['TypeCompet'])) {
        $CompetitionCategory = htmlspecialchars($_GET['TypeCompet']);
    }
}
//competition Hors rallye
if ($CompetitionCategory != 1 && $CompetitionCategory != 2) {
// liste des course hors rallye 
    $ListCompetitioOustideRally = new Competiton();
    $ListRaceOustideRally = $ListCompetitioOustideRally->ListCompetitionOustidRally();
}

//compettition de rallye ou rallye tt 
if ($CompetitionCategory == 1 || $CompetitionCategory == 2) {
    
}
//liste des type de compétition 
$ListOfCompetitions = new TypeOfCompetition();
$DisplayListOfCompetitions = $ListOfCompetitions->ListTypeOfCompetiton();
//liste des categorie de compétion 
$listCategoryCompetition = new CategoryCompetition();
$DisplayCategoryCompetion = $listCategoryCompetition->DisplayCategoryCompetition();
