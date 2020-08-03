<?php

$title = 'Mon profil';
$ListOfLicense = new FunctionSummary();
$ListLicences = $ListOfLicense->DisplayOfAllLicenses();
$ListPrimaryLicenses = new FunctionSummary();
$PrmaryLicensesUsed = $ListPrimaryLicenses->PrimaryLicensesUsed();
$ProfilUser = new membres();
$UserProfil = $ProfilUser->UserProfil();
if (isset($_SESSION['idUser'])) {
    $RegisteredId = $_SESSION['idUser'];
}