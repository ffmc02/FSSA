<?php

//partie inscription 
$title = 'connexions';
$Member = new membres;
//liste de fonction 
$ListFunction= new functions();
$listerFunctions= $ListFunction->ListOfFunction();
var_dump($listerFunctions);
$formError = array();
$regexMail = '/^[a-z0-9.-]+@[a-z0-9.-]{2,}.[a-z]{2,4}$/';
$regexTitle = '/^[A-Za-z \d\-àâéèêôùûçÀÂÉÈÔÙÛÇ]+$/';

//je genere une clé comprenant des caracteres aléatoire choisie parmis les caractére derteminé et comprenant un timetemps
function generateRandomString($length = 15) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ&#@à';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

$test1 = generateRandomString();
$test = generateRandomString(40);
$time = time();
$cle = $test1 . $time . $test1;
//je verifie que le bonton inscription a été cliqué
if (isset($_POST['validate'])) {
//    je vérifier que les input ne sont pas vide
    if (!empty($_POST['nameUser'])) {
        if (preg_match($regexTitle, $_POST['nameUser'])) {
            $Member->Name = htmlspecialchars($_POST['nameUser']);
        } else {
            $formError['nameUser'] = 'Veuiller ne mettre que des caractères alphabétiques!!!!!!!!!!';
        }
    } else {
        $formError['nameUser'] = 'Vous n\'avez pas remplie votre Nom';
    }
    if (!empty($_POST['firstnameUser'])) {
        $Member->Firstname = htmlspecialchars($_POST['firstnameUser']);
    } else {
        $formError['firstnameUser'] = 'Vous n\'avez pas remplie votre prénom';
    }
    if (!empty($_POST['emailUser'])) {
        if (filter_var($_POST['emailUser'], FILTER_VALIDATE_EMAIL)) {
            $Member->Email = htmlspecialchars($_POST['emailUser']);
        } else {
            $formError['emailUser'] = 'Veuillez mettre un mail correct';
        }
    } else {
        $formError['emailUser'] = 'Veuillez remplir mail';
    }


    if (!empty($_POST['adressUser'])) {
        $Member->Address = htmlspecialchars($_POST['adressUser']);
    } else {
        $formError['adressUser'] = 'Vous n\'avez pas remplie votre adresse';
    }
    if (!empty($_POST['zipeCodeUser'])) {
        $Member->ZipCode = htmlspecialchars($_POST['zipeCodeUser']);
    } else {
        $formError['zipeCodeUser'] = 'Vous n\'avez pas remplie votre code postale';
    }
    if (!empty($_POST['city'])) {
        $Member->City = htmlspecialchars($_POST['city']);
    } else {
        $formError['city'] = 'Vous n\'avez pas remplie votre ville';
    }
    if (!empty($_POST['passwordUser'])) {
        if ($_POST['passwordUser'] == $_POST['confirmPasswordUser']) {
            $Member->Password = password_hash($_POST['passwordUser'], PASSWORD_BCRYPT);
        } else {
            $formError['passwordUser'] = 'Attention, les mots de passe ne sont pas identiques.';
        }
    } else {
        $formError['passwordUser'] = 'Merci de remplir les champs password';
    }
    $Member->Cle = $cle;
    if (!empty($_POST['asaCode'])) {
        $Member->AsaCode = htmlspecialchars($_POST['asaCode']);
    } else {
        $formError['asaCode'] = 'Vous n\'avez pas remplie votre numéro d\'ASA';
    }
    if (!empty($_POST['licenceNumber'])) {
        $Member->LicenceNumber = htmlspecialchars($_POST['licenceNumber']);
    } else {
        $formError['licenceNumber'] = 'Vous n\'avez pas remplie votre numéro de licences';
    }
    $Member->Actif = 'true';
    if (count($formError) == 0) {
        $chekMembre = $Member->newMember();
        var_dump($chekMembre);
        if ($chekMembre == true) {
            $_POST['connexion'] = '';
            $_POST['loginNameUser'] = $_POST['nameUser'];
            $_POST['loginpasswordUser'] = $_POST['passwordUser'];
            $_POST['loginLicenceNumber'] = $_POST['licenceNumber'];
        }
    } else {
        $formError['licenceNumber'] = 'une erreur est survenue';
    }
} else {
    
}
// partie connection 

