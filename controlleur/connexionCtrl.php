<?php

$title = 'connexion';
$newMember = new membres;

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
if (isset($POST['inscription'])) {
//    je vérifier que les input ne sont pas vide
    if (!empty($POST['nameUser'])) {
        $newMember->name = htmlspecialchars($POST['nameUser']);
    }
    if (!empty($POST['firstnameUser'])) {
        $newMember->name = htmlspecialchars($POST['firstnameUser']);
    }
    if (!empty($POST['adressUser'])) {
        $newMember->adressUser = htmlspecialchars($POST['adressUser']);
    }
}