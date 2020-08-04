<?php
$title='Modification de votre profiles';
$ModfifyOfProfil = new membres;
$formError = array();
$regexMail = '/^[a-z0-9.-]+@[a-z0-9.-]{2,}.[a-z]{2,4}$/';
$regexTitle = '/^[A-Za-z \d\-àâéèêôùûçÀÂÉÈÔÙÛÇ]+$/';
$regexId = '/^\d+$/';
if (isset($_POST['Edditing'])) {
//    je vérifier que les input ne sont pas vide
    if (!empty($_POST['NameUser'])) {
        if (preg_match($regexTitle, $_POST['NameUser'])) {
            $ModfifyOfProfil->Name = htmlspecialchars($_POST['NameUser']);
        } else {
            $formError['NameUser'] = 'Veuiller ne mettre que des caractères alphabétiques!!!!!!!!!!';
        }
    } else {
        $formError['NameUser'] = 'Vous n\'avez pas remplie votre Nom';
    }
    if (!empty($_POST['FirstnameUser'])) {
        if (preg_match($regexTitle, $_POST['FirstnameUser'])) {
            $ModfifyOfProfil->Firstname = htmlspecialchars($_POST['FirstnameUser']);
        } else {
            $formError['FirstnameUser'] = 'merci de ne mettre que des carracteres ALPHABETIQUE !!!!!!';
        }
    } else {
        $formError['FirstnameUser'] = 'Vous n\'avez pas remplie votre prénom';
    }
    if (!empty($_POST['EmailUser'])) {
        if (filter_var($_POST['EmailUser'], FILTER_VALIDATE_EMAIL)) {
            $ModfifyOfProfil->Email = htmlspecialchars($_POST['EmailUser']);
        } else {
            $formError['EmailUser'] = 'Veuillez mettre un mail correct';
        }
    } else {
        $formError['EmailUser'] = 'Veuillez remplir mail';
    }
    if (!empty($_POST['AddressUser'])) {
        $ModfifyOfProfil->Address = htmlspecialchars($_POST['AddressUser']);
    } else {
        $formError['AddressUser'] = 'Vous n\'avez pas remplie votre adresse';
    }
    if (!empty($_POST['ZipCodeUser'])) {
        if (preg_match($regexTitle, $_POST['NameUser'])) {
            $ModfifyOfProfil->ZipCode = htmlspecialchars($_POST['ZipCodeUser']);
        }
    } else {
        $formError['ZipCodeUser'] = 'Vous n\'avez pas remplie votre code postale';
    }
    if (!empty($_POST['City'])) {
        $ModfifyOfProfil->City = htmlspecialchars($_POST['City']);
    } else {
        $ModfifyOfProfil['City'] = 'Vous n\'avez pas remplie votre ville';
    }
    if (!empty($_POST['AsaCode'])) {
        if (preg_match($regexTitle, $_POST['NameUser'])) {
            $ModfifyOfProfil->AsaCode = htmlspecialchars($_POST['AsaCode']);
        } else {
            $formError['AsaCode']='Merci de ne mettre que des chiffres'; 
        }
    } else {
        $formError['AsaCode'] = 'Vous n\'avez pas remplie votre numéro d\'ASA';
    }
    if (!empty($_POST['AsaName'])) {
        $ModfifyOfProfil->AsaName = htmlspecialchars($_POST['AsaName']);
    } else {
        $formError['AsaName'] = 'Vous n\'avez pas remplie votre Nom de votre ASA';
    }
    if(isset($_SESSION['idUser'])){
        $ModfifyOfProfil->id= htmlspecialchars($_SESSION['idUser']);  
    }
    
    if (count($formError) == 0) {
       
      $ModfifyOfProfil->Actif='true';
      
      $ChekEditingProfil=$ModfifyOfProfil->ProfilEdditing();
      if($ChekEditingProfil==true){
             $_SESSION['loginMail'] =$_POST['EmailUser'] ;
                $_SESSION['Name'] = $_POST['NameUser'];
                $_SESSION['Firstname'] = $_POST['FirstnameUser'];
                
            header("Location:MyProfiles.php ");
      }
   
    }
}
$ProfilUser=new membres();
$UserProfil=$ProfilUser->UserProfil();
if(isset($_SESSION['idUser'])){
$RegisteredId = $_SESSION['idUser'];
}
