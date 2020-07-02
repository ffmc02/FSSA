<?php

//partie inscription 
$title = 'connexions';
$Member = new membres;
//liste de fonction 
$FonctionList = new functions();
$listerFunctions = $FonctionList->ListOfFunction();

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
    if (!empty($_POST['NameUser'])) {
        if (preg_match($regexTitle, $_POST['NameUser'])) {
            $Member->Name = htmlspecialchars($_POST['NameUser']);
        } else {
            $formError['NameUser'] = 'Veuiller ne mettre que des caractères alphabétiques!!!!!!!!!!';
        }
    } else {
        $formError['NameUser'] = 'Vous n\'avez pas remplie votre Nom';
    }
    if (!empty($_POST['FirstnameUser'])) {
        $Member->Firstname = htmlspecialchars($_POST['FirstnameUser']);
    } else {
        $formError['FirstnameUser'] = 'Vous n\'avez pas remplie votre prénom';
    }
    if (!empty($_POST['EmailUser'])) {
        if (filter_var($_POST['EmailUser'], FILTER_VALIDATE_EMAIL)) {
            $Member->Email = htmlspecialchars($_POST['EmailUser']);
        } else {
            $formError['EmailUser'] = 'Veuillez mettre un mail correct';
        }
    } else {
        $formError['EmailUser'] = 'Veuillez remplir mail';
    }
    if (!empty($_POST['AddressUser'])) {
        $Member->Address = htmlspecialchars($_POST['AddressUser']);
    } else {
        $formError['AddressUser'] = 'Vous n\'avez pas remplie votre adresse';
    }
    if (!empty($_POST['ZipCodeUser'])) {
        $Member->ZipCode = htmlspecialchars($_POST['ZipCodeUser']);
    } else {
        $formError['ZipCodeUser'] = 'Vous n\'avez pas remplie votre code postale';
    }
    if (!empty($_POST['City'])) {
        $Member->City = htmlspecialchars($_POST['City']);
    } else {
        $formError['City'] = 'Vous n\'avez pas remplie votre ville';
    }
    if (!empty($_POST['PasswordUser'])) {
        if ($_POST['PasswordUser'] == $_POST['ConbfirmPasswordUSer']) {
            $Member->Password = password_hash($_POST['PasswordUser'], PASSWORD_BCRYPT);
        } else {
            $formError['PasswordUser'] = 'Attention, les mots de passe ne sont pas identiques.';
        }
    } else {
        $formError['PasswordUser'] = 'Merci de remplir les champs password';
    }
    $Member->Cle = $cle;
    if (!empty($_POST['AsaCode'])) {
        $Member->AsaCode = htmlspecialchars($_POST['AsaCode']);
    } else {
        $formError['AsaCode'] = 'Vous n\'avez pas remplie votre numéro d\'ASA';
    }
    if (!empty($_POST['LicenceNumber'])) {
        $Member->LicenceNumber = htmlspecialchars($_POST['LicenceNumber']);
    } else {
        $formError['LicenceNumber'] = 'Vous n\'avez pas remplie votre numéro de licences';
    }
    $Member->Actif = 'true';
    if (!empty($_POST['TypeOfLicence'])) {
        $Member->id_0108asap_functions = htmlspecialchars($_POST['TypeOfLicence']);
    } else {
        $formError['TypeOfLicence'] = 'Vous n\'avez pas séléctionné le type de licences!';
    }
    if (count($formError) == 0) {
        $chekMembre = $Member->newMember();
        if ($chekMembre == true) {
            $_POST['connexion'] = '';
            $_POST['LoginNameUseer'] = $_POST['NameUser'];
            $_POST['LoginMailUser'] = $_POST['EmailUser'];
            $_POST['LoginPasswordUser'] = $_POST['PasswordUser'];
            $_POST['LoginLicenceNumber'] = $_POST['LicenceNumber'];
        }
    } else {
        $formError['licenceNumber'] = 'une erreur est survenue';
    }
} else {
    
}
// partie connection 
if (isset($_POST['connection'])) {
    $MembersExist = new membres();
    $IdMembers = new membres();
    $formError = array();
    if (!empty($_POST['LoginMailUser'])) {
        if (filter_var($_POST['LoginMailUser'], FILTER_VALIDATE_EMAIL)) {
            $MembersExist->Email = htmlspecialchars($_POST['LoginMailUser']);
        } else {
            $formError['LoginMailUser'] = 'Veuillez mettre un mail correct';
        }
    } else {
        $formError['LoginMailUser'] = 'Veuillez remplir mail';
    }
    if (!empty($_POST['LoginPasswordUser'])) {

        $LoginPassword = $_POST['LoginPasswordUser'];
    } else {
        $formError['LoginPasswordUser'] = 'Merci de remplir les champs password';
    }
    if (!empty($_POST['LoginNameUseer'])) {
        $NameUser = htmlspecialchars($_POST['LoginNameUseer']);
    } else {
        $formError['LoginNameUseer'] = 'Merci de remplir votre nom';
    }
    if (!empty($_POST['LoginLicenceNumber'])) {
        $LicenceNumber = htmlspecialchars($_POST['LoginLicenceNumber']);
    } else {
        $formError['LoginLicenceNumber'] = 'Merci de remplir votre numéro de licences';
    }
    if (count($formError) == 0) {
        $verif = $MembersExist->connexionMembers();
//            var_dump($verif);

        if ($verif->CountMembers == 1)
        //je verifier que l'utilisateur existe bien dans la base de donnée grace a son email  
        //
//          je verifie que le password entré par l'utilisateur et le meme que celui renseigner dans la base de donnée
            $password = $verif->Password;

        $validPassword = password_verify($LoginPassword, $password);
        if ($validPassword) {
            $_SESSION['idUser'] = $verif->id;
            $_SESSION['loginMail'] = $verif->Email;
            $_SESSION['Name'] = $verif->Name;
            $_SESSION['Firstname']=$verif->Firstname;
            $_SESSION['LicenceNumber'] = $verif->LicenceNumber;
            $_SESSION['connect'] = 'OK';
            $_SESSION['access'] = $verif->id_0108asap_functions;
          
            if (in_array($_SESSION['access'], $fonction)) {
                header("Location: HomeLogin.php");
            } else {
                header("Location: ../index.php");
            }
        }
    }
} 