<?php
$title='ajout d\'une compétition';
$formError = array();
$regexId = '/^\d+$/';
$SportEvent= new SportsEventsModel();
if(isset($_POST['AddCompetition'])){
  if()
}

//lisste des tyoe de compétitions
$ListOfCompetitions=new TypeOfCompetition();
$DisplayListOfCompetitions=$ListOfCompetitions->ListTypeOfCompetiton();
//liste des categorie de compétion 
$listCategoryCompetition= new CategoryCompetition();
$DisplayCategoryCompetion= $listCategoryCompetition->DisplayCategoryCompetition();