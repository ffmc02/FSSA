<?php

$title = 'ajout de licence';
$regexId = '/^\d+$/';
// initialisation d'un tableau d'erreur
$formError = array();
$Profil = new membres();
$MembersProfile = $Profil->MemberProfile();
if (isset($_SESSION['idUser'])) {
    $RegisteredId = $_SESSION['idUser'];
}
$Profil = new membres();
$MembersProfile = $Profil->MemberProfile();
if(isset($_SESSION['idUser'])){
$RegisteredId = $_SESSION['idUser'];
}
$ListOfLicense= new FunctionSummary();
$ListLicences= $ListOfLicense->DisplayOfAllLicenses();

$ListPrimaryLicenses=new FunctionSummary();
$PrmaryLicensesUsed= $ListPrimaryLicenses->PrimaryLicensesUsed();

//liste de fonction 
$FonctionList = new functions();
$listerFunctions = $FonctionList->ListOfFunction();
$LicenceNew = new FunctionSummary();
if (isset($_POST['AddLicences'])) {
    if (!empty($_POST['TypeOfLicence'])) {
        if (preg_match($regexId, $_POST['TypeOfLicence'])) {
            $LicenceNew->id_0108asap_function = htmlspecialchars($_POST['TypeOfLicence']);
            
        }
    } else {
        $formError['TypeOfLicence'] = 'Merci de choisir votre fonction à ajouter';
    }
    if (!empty($_POST['LicenceNumber'])) {
        if (preg_match($regexId, $_POST['LicenceNumber'])) {
            $LicenceNew->LicenceNumber = htmlspecialchars($_POST['LicenceNumber']);
        } else {
            $formError['LicenceNumber'] = 'Merci de remplir votre numéro de licence uniquement avec des chiffres';
        }
    } else {
        $formError['LicenceNumber'] = 'Votre numéro de licence est vide merci de le compléter';
    }
    if (!empty($_POST['IdMember'])) {
        $LicenceNew->id_0108asap_member = htmlspecialchars($_POST['IdMember']);
    }
    if (count($formError) == 0) {
        $AddANewLicencse = $LicenceNew->AddLicences();

        if ($AddANewLicencse == true) {
            $Message = 'votre nouvelle licence a été ajouté avec succés';

        } else {
            $MessageError = 'Une erreur est survenue veuillez contacter le web master via l\'adresse mail dev.gaetan.jonard@outlook.fr avec le code erreur AddLicense comme objet du mail';
        }
    } else {
        $AddANewLicencse = '';
    }
}
$ListOfLicense = new FunctionSummary();
$ListLicences = $ListOfLicense->DisplayOfAllLicenses();
