<?php

$title='Modification de licences';
// initialisation d'un tableau d'erreur
$formError = array();
$regexId = '/^\d+$/';
//liste des licences secondaire
$ListOfLicense = new FunctionSummary();
$ListLicences = $ListOfLicense->DisplayOfAllLicenses();

//affichage de la licence principal
$FonctionList = new functions();
$listerFunctions = $FonctionList->ListOfFunction();
//Modificcation  des licences
$ModifyLicence = new FunctionSummary();
if (isset($_GET['IdLicence'])) {
    $IdLicence = htmlspecialchars($_GET['IdLicence']);
   
    
}
if (isset($_SESSION['idUser'])) {
    $RegisteredId = $_SESSION['idUser'];
    $ModifyLicence=$RegisteredId;
}
if (isset($_POST['ModifyLicences'])) {
    if (!empty($_POST['TypeOfLicence'])) {
        if (preg_match($regexId, $_POST['TypeOfLicence'])) {
            $ModifyLicence->id_0108asap_function = htmlspecialchars($_POST['TypeOfLicence']);
            
        }
    } else {
        $formError['TypeOfLicence'] = 'Merci choisir votre fonction à ajouter';
    }
    if (!empty($_POST['LicenceNumber'])) {
        if (preg_match($regexId, $_POST['LicenceNumber'])) {
            $ModifyLicence->LicenceNumber = htmlspecialchars($_POST['LicenceNumber']);
        } else {
            $formError['LicenceNumber'] = 'Merci de remplir votre numéro de licence uniquement avec des chiffres';
        }
    } else {
        $formError['LicenceNumber'] = 'Votre numéro de licence est vide merci de le compléter';
    }
    if (!empty($_POST['IdMember'])) {
        $ModifyLicence->id_0108asap_member = htmlspecialchars($_POST['IdMember']);
    }
    if (count($formError) == 0) {
        $ModifyTheLicencse = $ModifyLicence->Licensing();

        if ($ModifyTheLicencse == true) {
            $Message = 'votre nouvelle license a été ajouté avec succés';

        } else {
            $MessageError = 'Une erreur est survenue veuillez contacter le web master via l\'adresse mail dev.gaetan.jonard@outlook.fr avec le code erreur AddLicense comme objet du mail';
        }
    } else {
        $ModifyTheLicencse = '';
    }
}