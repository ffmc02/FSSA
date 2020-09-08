<?php
$title='Liste des membres inscrits';
//Listes des membre inscrit
$AssignManager= new membres();
$AssignAManagerLicence=$AssignManager->AssignAManager();
$License = new FunctionSummary();

//liste de fonction 
$FonctionList = new functions();
$listerFunctions = $FonctionList->ListOfFunction();