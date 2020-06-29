<?php

$title = 'connexions';
$Member = new membres;

$formError = array();

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
        $Member->name = htmlspecialchars($_POST['nameUser']);
    } else {
        echo 'proute1';
    }
    if (!empty($_POST['firstnameUser'])) {
        $Member->firstname = htmlspecialchars($_POST['firstnameUser']);
    } else {
        echo 'proute2';
    }

    if (!empty($_POST['adressUser'])) {
        $Member->adress = htmlspecialchars($_POST['adressUser']);
    } else {
        echo 'proute3';
    }
    if (!empty($_POST['adressUser'])) {
        $Member->adress = htmlspecialchars($_POST['adressUser']);
    } else {
        echo 'proute3';
    }

    if (!empty($_POST['zipeCodeUser'])) {
        $Member->ZipeCode = htmlspecialchars($_POST['zipeCodeUser']);
    } else {
        echo 'proute5';
    }
        if (!empty($_POST['zipeCodeUser'])) {
        $Member->ZipeCode = htmlspecialchars($_POST['zipeCodeUser']);
    } else {
        echo 'proute6';
    }
          if (!empty($_POST['city'])) {
        $Member->City = htmlspecialchars($_POST['city']);
    } else {
        echo 'proute7';
    }
       if (!empty($_POST['passwordUser'])) {
        if ($_POST['passwordUser'] == $_POST['confirmPasswordUser']) {
            $user->password = password_hash($_POST['passwordUser'], PASSWORD_BCRYPT);
        } else {
            $formError['password'] = 'Attention, les mots de passe ne sont pas identiques.';
        }
    } else {
        $formError['password'] = 'Merci de remplir les champs password';
    }
    $Member->cle = $cle;
          if (!empty($_POST['asaCode'])) {
        $Member->AsaCode = htmlspecialchars($_POST['asaCode']);
    } else {
        echo 'proute7';
    } 
           if (!empty($_POST['licenceNumber'])) {
        $Member->LicenceNumber = htmlspecialchars($_POST['licenceNumber']);
    } else {
        echo 'proute7';
    } 
    
} else {
    echo 'validate';
}
var_dump($Member);
