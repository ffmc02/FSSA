<?php
$title = 'pages d\'accueil connecter';
$Profil = new membres();
$MembersProfile = $Profil->MemberProfile();
if(isset($_SESSION['idUser'])){
$RegisteredId = $_SESSION['idUser'];
}
$ListOfLicense= new FunctionSummary();
$ListLicences= $ListOfLicense->DisplayOfAllLicenses();
