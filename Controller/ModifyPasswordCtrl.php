<?php

$title = 'Modifier son mot de passe';
//tableau d'erreur 
$formError = array();
$MemberExist = new membres();
$NewPassword = new membres();
if (isset($_POST['ValdidateNewPassword'])) {
    if (!empty($_POST['EmailUser'])) {
        if (filter_var($_POST['EmailUser'], FILTER_VALIDATE_EMAIL)) {
            $MemberExist->Email = htmlspecialchars($_POST['EmailUser']);
            $NewPassword->Email = htmlspecialchars($_POST['EmailUser']);
        } else {
            $formError['MailRegister'] = 'Merci de mettre un mail correct';
        }
    } else {
        $formError['MailRegister'] = 'Vous n\'avez pas rempli votre mail';
    }
    if (!empty($_POST['NewPassword'])) {
        if (!empty($_POST['ConfirmNewPassword'])) {
            if ($_POST['NewPassword'] == $_POST['ConfirmNewPassword']) {
                $NewPassword->Password = password_hash($_POST['NewPassword'], PASSWORD_BCRYPT);
            } else {
                $formError['password'] = 'les mots de passe ne sont pas identiques.';
            }
        } else {
            $formError['ConfirmPassword'] = 'Merci de remplir le champs confirmation de votre mot de passe';
        }
    } else {
        $formError['password'] = 'Merci de remplir le champs votre mot de passe';
    }

    function generateRandomString($length = 40) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    $test1 = generateRandomString();
    $test = generateRandomString(50);
    $time = time();
    $cle2 = $test1 . $time . $test;
    $NewPassword->Cle = $cle2;
    $userCle = $_GET['cle'];
    $timestamp = substr($userCle, 40, -50);
    //delais de 3600 seconde soit une heurs 
    $delai = $timestamp +=  60 * 60;
    if ($delai >= time()) {
        if (count($formError) == 0) {
            $CheckMemberExist=$MemberExist->MemberExist();
            if ($CheckMemberExist==true) {
                $CheckNewPassword=$NewPassword->ModifyPassword();
                if ($CheckNewPassword== true) {
                    $MessageSucces='Votre mot de passe a été modifié avec succés vous pouvez vous connecter en cliquant sur le liens <a href="Connection.php">suivant</a>';
                } else {
                   $formError['Technical']='Une erreur technique est survenue merci de contacter l\'administraeur du site par mail dev.gaetan.jonard@outlook.fr';
                }
            } else {
                 $formError['$UserNotRegistred']='Vous n\êtes pas enregistré sur le site';
            }
        } 
    } else {
        $$UserNotRegistred='Le délais pour utilisé le lien est passé merci de refaire une demande en cliquant <a href="ForgottenPassword.php">ici</a>';
    }
}

