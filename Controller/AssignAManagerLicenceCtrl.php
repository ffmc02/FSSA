<?php

$title = "Assigner une licence de responsable";
$formError = array();
$regexId = '/^\d+$/';
$License = new FunctionSummary();
if (isset($_GET['IdSummryLicense'])) {
    if (preg_match($regexId, $_GET['IdSummryLicense'])) {
        $IdLicenceSummaryUser = htmlspecialchars($_GET['IdSummryLicense']);
    }
}
if (isset($_POST['AssignAManagerLicence'])) {
    if (isset($_GET['IdSummryLicense'])) {
        if (preg_match($regexId, $_GET['IdSummryLicense'])) {
            $License->id = htmlspecialchars($_GET['IdSummryLicense']);
        }
    }
    if (!empty($_POST['TypeOfLicence'])) {
        if (preg_match($regexId, $_POST['TypeOfLicence'])) {
            $License->id_0108asap_function= htmlspecialchars($_POST['TypeOfLicence']);
        }
    }
    $CheckModifyLicenceByManager=$License->LicenseModifyByTheManagement();
    if($CheckModifyLicenceByManager==true){
         header("Location: ListOfregistridedMembers.php");
    }
}

//Liste des membres inscrits 
$AssignManager = new membres();
$AssignAManagerLicence = $AssignManager->AssignAManager();

//Personne en fonction de la personne choisie
$DisplayMemberAccordinToLicense = new membres();
$DisplayMemberAccordinToLicense->id = $IdLicenceSummaryUser;
$DisplayAccrdinToLicense = $DisplayMemberAccordinToLicense->AssignAManagerLicense();
//liste de fonction 
$FonctionList = new functions();
$listerFunctions = $FonctionList->ListOfFunction();


