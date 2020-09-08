<?php

$title = 'Modification De la licences principales';
$regexId = '/^\d+$/';
$formError = array();
$ModifyMyLicense = new FunctionSummary();
if (isset($_POST['EditingLicence'])) {
    if (!empty($_POST['IdLicennsePrimary'])) {
        if (preg_match($regexId, $_POST['IdLicennsePrimary'])) {
            $ModifyMyLicense->id = htmlspecialchars($_POST['IdLicennsePrimary']);
        }
    }
    if (!empty($_POST['NewLicenseNumber'])) {
        if (preg_match($regexId, $_POST['NewLicenseNumber'])) {
            $ModifyMyLicense->LicenceNumber = htmlspecialchars($_POST['NewLicenseNumber']);
        } else {
            $formError['NewLicenseNumber']='veuillez mettre que des chiffres dans le champ mon numéro de licence';
        }
    } else {
         $formError['NewLicenseNumber']='Remplissez le numéro de licence';
    }
      if (!empty($_POST['TypeOfLicence'])) {
            $ModifyMyLicense->id_0108asap_function = htmlspecialchars($_POST['TypeOfLicence']);
    }    var_dump($ModifyMyLicense);

     if (count($formError) == 0) {
         $CheckModifyLicense=$ModifyMyLicense->ModifyTheMainLicense();
         if($CheckModifyLicense==true){
             $_SESSION['access']=htmlspecialchars($_POST['TypeOfLicence']);
             header("Location: MyProfiles.php");
         }
     }
}

$FonctionList = new functions();
$listerFunctions = $FonctionList->ListOfFunction();
$ListPrimaryLicenses = new FunctionSummary();
$PrmaryLicensesUsed = $ListPrimaryLicenses->PrimaryLicensesUsed();
if (isset($_SESSION['idUser'])) {
    $RegisteredId = $_SESSION['idUser'];
}