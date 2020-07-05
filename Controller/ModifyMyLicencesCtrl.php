<?php

$title='Modification de licences';
$ListOfLicense = new FunctionSummary();
$ListLicences = $ListOfLicense->DisplayOfAllLicenses();

//liste de fonction 
$FonctionList = new functions();
$listerFunctions = $FonctionList->ListOfFunction();
if (isset($_GET['IdLicence'])) {
    $IdLicence = htmlspecialchars($_GET['IdLicence']);
}
if (isset($_SESSION['idUser'])) {
    $RegisteredId = $_SESSION['idUser'];
}