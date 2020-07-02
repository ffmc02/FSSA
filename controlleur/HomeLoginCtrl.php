<?php

$title = 'pages d\'accueil connecter';
$FonctionList = new functions();
$ListerFunctions = $FonctionList->FunctionOfUser();
var_dump($FonctionList);

if( $ListerFunctions->id==$_SESSION['access']){
 $TypeLicence=$ListerFunctions->TypeOfLicence;  
}