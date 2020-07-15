<?php

$title='Supressions de licences';
$regexId = '/^\d+$/';
// initialisation d'un tableau d'erreur
$formError = array();
$DeleteAlicence=new FunctionSummary();

if (isset($_GET['IdLicence'])) {
    $IdLicence = htmlspecialchars($_GET['IdLicence']);
   
    
}
if (isset($_SESSION['idUser'])) {
    $RegisteredId = $_SESSION['idUser'];
    
    //$ModifyLicence=$RegisteredId;
}
if(isset($_POST['DeleteMyLicense'])){
  if (isset($_GET['IdLicence'])) {
        if (preg_match($regexId, $_GET['IdLicence'])) {
            $DeleteAlicence->id= htmlspecialchars($_GET['IdLicence']);
        } else {
        $formError['IdLicences']='une erreur est arrivé mercie de contacter le webMaster par mail avec le code erreur DeleteLicenses';    
        }
    }
 if (count($formError) == 0) {
    $DeleteMyLicense= $DeleteAlicence->DeleteALicense();
 }
 if($DeleteMyLicense==true){
     header("Location: AddLicense.php");
 }
}


//liste des licences secondaire
$ListOfLicense = new FunctionSummary();
$ListLicences = $ListOfLicense->DisplayOfAllLicenses();
