<?php
$title="Assigner une licence de responsable";
//Liste des membres inscrits 
$AssignManager= new membres();
$AssignAManagerLicence=$AssignManager->AssignAManager();
$License = new FunctionSummary();

//liste de fonction 
$FonctionList = new functions();
$listerFunctions = $FonctionList->ListOfFunction();


