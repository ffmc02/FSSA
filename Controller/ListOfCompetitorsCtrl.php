<?php

$title = 'Liste des concurrents inscrit';
$regexId = '/^\d+$/';
$listCompetitors= new RegistrationForCompetitors();
$NameOfCompetiton= new RegistrationForCompetitors();

if (isset($_GET['IdCompet'])) {
    if (preg_match($regexId, $_GET['IdCompet'])) {
        $IdCompetition = htmlspecialchars($_GET['IdCompet']);
      
        $listCompetitors->idCompet=$IdCompetition;
        $NameOfCompetiton->idCompet=$IdCompetition;
    }
}
 
 $DisplayListCompetitorsByCompetition=$listCompetitors->DisplayOfCompitiorsForCompetiton();
  if($DisplayListCompetitorsByCompetition==null){
      $message="Aucun concurrent inscrit pour le moment ";
  }
 var_dump($DisplayListCompetitorsByCompetition);
 $TitleCompetition=$NameOfCompetiton->NameOfTest();
 $NameofCompet=$TitleCompetition->NameOfTheTest;