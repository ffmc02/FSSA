<?php

//partie inscription 
$title = 'connexions';
$Member = new membres;
$License = new FunctionSummary();
$LastId = new membres();
//liste de fonction 
$FonctionList = new functions();
$listerFunctions = $FonctionList->ListOfFunction();
// liste des membre déja inscrit
$MembersExist = new membres();
$formError = array();
$regexMail = '/^[a-z0-9.-]+@[a-z0-9.-]{2,}.[a-z]{2,4}$/';
$regexTitle = '/^[A-Za-z \d\-àâéèêôùûçÀÂÉÈÔÙÛÇ]+$/';
$regexId = '/^\d+$/';

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
            $TemporaryName = htmlspecialchars($_POST['NameUser']);
        } else {
            $formError['NameUser'] = 'Veuillez mettre que des caractères alphabétiques!!!!!!!!!!';
        }
    } else {
        $formError['NameUser'] = 'Vous n\'avez pas rempli votre Nom';
    }
    if (!empty($_POST['FirstnameUser'])) {
        $Member->Firstname = htmlspecialchars($_POST['FirstnameUser']);
    } else {
        $formError['FirstnameUser'] = 'Vous n\'avez pas rempli votre Prénom';
    }
    if (!empty($_POST['EmailUser'])) {
        if (filter_var($_POST['EmailUser'], FILTER_VALIDATE_EMAIL)) {
            $Member->Email = htmlspecialchars($_POST['EmailUser']);
            $TemporaryEmail = htmlspecialchars($_POST['EmailUser']);
            $MembersExist->Email = htmlspecialchars($_POST['EmailUser']);
        } else {
            $formError['EmailUser'] = 'Veuillez mettre un mail correcte';
        }
    } else {
        $formError['EmailUser'] = 'Veuillez remplir le mail';
    }
    if (!empty($_POST['AddressUser'])) {
        $Member->Address = htmlspecialchars($_POST['AddressUser']);
    } else {
        $formError['AddressUser'] = 'Vous n\'avez pas rempli votre adresse';
    }
    if (!empty($_POST['ZipCodeUser'])) {
        if (preg_match($regexId, $_POST['ZipCodeUser'])) {
             if (strlen($_POST['ZipCodeUser']) > 5) {
                  if (strlen($_POST['ZipCodeUser']) < 5) {
                       $Member->ZipCode = htmlspecialchars($_POST['ZipCodeUser']);
                  } else {
                      $formError['ZipCodeUser'] ='Vous devez mettre 5 chiffres';
                  }
             } else {
                   $formError['ZipCodeUser'] ='Vous devez mettre 5 chiffres';
             }
        } else {
            $formError['ZipCodeUser'] = 'Merci de mettre uniquement des chiffres ';
        }
    } else {
        $formError['ZipCodeUser'] = 'Vous n\'avez pas rempli votre code postal';
    }
    if (!empty($_POST['City'])) {
        $Member->City = htmlspecialchars($_POST['City']);
    } else {
        $formError['City'] = 'Vous n\'avez pas rempli votre ville';
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
        if (strlen($_POST['AsaCode']) > 4) {
            if (strlen($_POST['AsaCode']) < 4) {
                $Member->AsaCode = htmlspecialchars($_POST['AsaCode']);
            } else {
                $formError['AsaCode'] = 'Vous devez Metre 4 chiffres ';
            }
        } else {
            $formError['AsaCode'] = 'Vous devez Metre 4 chiffres ';
        }
    } else {
        $formError['AsaCode'] = 'Vous n\'avez pas rempli votre numéro d\'ASA';
    }
    if (!empty($_POST['AsaName'])) {
        $Member->AsaName = htmlspecialchars($_POST['AsaName']);
    } else {
        $formError['AsaName'] = 'Vous n\'avez pas rempli votre Nom de votre ASA';
    }
    $Member->Actif = 'true';
    if (!empty($_POST['TypeOfLicence'])) {
        $LicenseTemporary = htmlspecialchars($_POST['TypeOfLicence']);
    } else {
        $formError['TypeOfLicence'] = 'Vous n\'avez pas séléctionné le type de licence!';
    }
    if (!empty($_POST['LicenceNumber'])) {
        if (preg_match($regexId, $_POST['LicenceNumber'])) {
            if (strlen($_POST['LicenceNumber']) > 6) {
                if (strlen($_POST['LicenceNumber']) < 6) {
                      $License->LicenceNumber = htmlspecialchars($_POST['LicenceNumber']);
                } else {
                    $formError['LicenceNumber'] ='VOus devez mettre 6 chiffres!';
                }
            } else {
                    $formError['LicenceNumber'] ='VOus devez mettre 6 chiffres!';
            }
        } else {
            $formError['LicenceNumber'] = 'Merci de mettre que des chiffres dans le champ Nuéro de licence';
        }
    } else {
        $formError['LicenceNumber'] = 'Merci de remplir le champ Numéro de licence';
    }
    $CheckMemberExist = $MembersExist->MemberExist();
    if ($CheckMemberExist == '0') {
        if (count($formError) == 0) {
            $chekMembre = $Member->newMember();
            $License->id_0108asap_function = $LicenseTemporary;
            $License->LicencePrimary = 1;
            $License->id_0108asap_member = $LastId->lastInsertId();
            $CheckLicences = $License->AddPrimaryLicense();
            if ($chekMembre == true) {
                $_SESSION['TemporyloginMail'] = $TemporaryEmail;
                $_SESSION['TemporyName'] = $TemporaryName;
                $_SESSION['TemporyLicenceNumber'] = $LicenseTemporary;
                $_POST['connexion'] = '';
                $_POST['LoginNameUseer'] = $_POST['NameUser'];
                $_POST['LoginMailUser'] = $_POST['EmailUser'];
                $_POST['LoginPasswordUser'] = $_POST['PasswordUser'];
                $_POST['LoginLicenceNumber'] = $_POST['LicenceNumber'];
//            header("Location: Connection.php");
            } else {
                $formError['Technical'] = 'une erreur est survenue';
            }
        } else {
            $formError['MeessageMemberExist'] = 'vous avez des erreurs dans le formulaires';
        }
    } else {
        $formError['MeessageMemberExist'] = 'L\'adresse mail que vous avez choisie est déja Utlisé merci d\'utiliser une autre adresse mail!';
    }
}
// partie connection ----------------------------------------------------------------------------------------------
if (isset($_POST['connection'])) {
    $MembersExist = new membres();
    $IdMembers = new membres();
    $LicencePrimary = new FunctionSummary();

    $formError = array();
    if (!empty($_POST['LoginMailUser'])) {
        if (filter_var($_POST['LoginMailUser'], FILTER_VALIDATE_EMAIL)) {
            $MembersExist->Email = htmlspecialchars($_POST['LoginMailUser']);
        } else {
            $formError['LoginMailUser'] = 'Veuillez mettre un mail correcte';
        }
    } else {
        $formError['LoginMailUser'] = 'Veuillez remplir le mail';
    }
    if (!empty($_POST['LoginPasswordUser'])) {

        $LoginPassword = $_POST['LoginPasswordUser'];
    } else {
        $formError['LoginPasswordUser'] = 'Merci de remplir le champ password';
    }


    if (count($formError) == 0) {
        $verif = $MembersExist->ConnexionMembers();
        if ($verif->CountMembers == 1) {
//je verifier que l'utilisateur existe bien dans la base de donnée grace a son email  
//          je verifie que le password entré par l'utilisateur et le meme que celui renseigner dans la base de donnée
            $password = $verif->Password;
            $validPassword = password_verify($LoginPassword, $password);
            if ($validPassword) {
                $IDUser = $verif->id;
                $_SESSION['idUser'] = $verif->id;
                $_SESSION['loginMail'] = $verif->Email;
                $_SESSION['Name'] = $verif->Name;
                $_SESSION['Firstname'] = $verif->Firstname;
                $_SESSION['connect'] = 'OK';
                $_SESSION['TemporyloginMail'] = '';
                $_SESSION['TemporyName'] = '';
                $_SESSION['TemporyLicenceNumber'] = '';
                $LicencePrimary->id_0108asap_member = $IDUser;
                $ListOfLicense = $LicencePrimary->VerifLicense();
                if ($ListOfLicense == true) {
                    $CheckLicensesExist = new FunctionSummary();
                    $CheckLicensesExist->id0108asap_member = $IDUser;
                    $CheckOkLicenses = $CheckLicensesExist->DisplayPrimaryLicenses();
                    $_SESSION['access'] = $CheckOkLicenses[0]->id_0108asap_function;
                }
                if (in_array($_SESSION['access'], $Function)) {
                    header("Location: HomeLogin.php");
                } else {
                    header("Location:index.php");
                }
            } else {
                $formError['LoginPasswordUser'] = 'ERREUR DE MOT DE PASSE';
            }
        } else {
            $UserNotRegistred = 'Vous n\'avez pas de compte';
        }
    }
}    