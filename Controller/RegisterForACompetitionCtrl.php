<?php

$title = 'S\'Inscrire à une compétiton';
$regexId = '/^\d+$/';
$formError = array();
if (isset($_GET['Function'])) {
    $Demande = htmlspecialchars($_GET['Function']);
}


if (isset($_GET['Function'])) {
    $Demande = htmlspecialchars($_GET['Function']);
}

if (isset($_GET['IdCompet'])) {
    if (preg_match($regexId, $_GET['IdCompet'])) {
        $IdCompetition = htmlspecialchars($_GET['IdCompet']);
    }
}
if ($Demande == 'Concurrent') {
    $Addcrew = new RegistrationForCompetitors();
    $ListMember = new membres();
    $DisplayMemers = $ListMember->DisplayPilote();
    $List = new cars();
    $ListOfOwners = $List->ListOfCars();
    if (isset($_SESSION['idUser'])) {
        $IdUserCars = htmlspecialchars($_SESSION['idUser']);
    }
    if (isset($_POST['PilotRegisterForCompetition'])) {
        if (!empty($_POST['IdPilote'])) {
            if (preg_match($regexId, $_POST['IdPilote'])) {
                $Addcrew->id_0108asap_membres = htmlspecialchars($_POST['IdPilote']);
            }
        }
        if (!empty($_POST['PilotId'])) {
            if (preg_match($regexId, $_POST['PilotId'])) {
                $Addcrew->Copilot = htmlspecialchars($_POST['PilotId']);
            }
        }
        if (isset($_GET['IdCompet'])) {
            if (preg_match($regexId, $_GET['IdCompet'])) {
                $Addcrew->id_0108asap_competiton = htmlspecialchars($_GET['IdCompet']);
            }
        }
        if ($_POST['NumberOfOccupants'] == 2) {
            if (!empty($_POST['CoPilotId'])) {
                if (preg_match($regexId, $_POST['CoPilotId'])) {
                    $Addcrew->Copilot = htmlspecialchars($_POST['CoPilotId']);
                    $CopiloteId = htmlspecialchars($_POST['CoPilotId']);
                }
            }
        }

        if (!empty($_POST['Cars'])) {
            if (preg_match($regexId, $_POST['Cars'])) {
                $Addcrew->id_0108asap_cars = htmlspecialchars($_POST['Cars']);
            }
        } else {
            $formError['Cars'] = 'Veuillez selection votrte voiture pour la compétition';
        }
        
        if (count($formError) == 0) {
            $CheckAddCompetitor = $Addcrew->AddCompetitorForRace();
        }
        var_dump($Addcrew);
        if ($CheckAddCompetitor == true) {
            header("Location: HomeLogin.php");
        }
    }
}









if ($Demande == 'Officiel') {
    $CheckExistOfficial = New Registrationforofficial();
    $CheckOfficial = $CheckExistOfficial->CheckRegistrerOfficial();
    if ($CheckOfficial->id_0108asap_competiton != $IdCompetition) {
        $AddOfficalForCompetition = new Registrationforofficial();
        if (isset($_POST['OfficialForComptition'])) {
            if (!empty($_POST['TypeOfLicence'])) {
                if (preg_match($regexId, $_POST['TypeOfLicence'])) {
                    if ($_POST['TypeOfLicence'] != 0) {
                        $AddOfficalForCompetition->id_0108asap_functions = htmlspecialchars($_POST['TypeOfLicence']);
                    } else {
                        $formError['TypeOfLicence'] = 'Veuillez selectionner une fonction dans la liste';
                    }
                }
            }
            if (!empty($_POST['BesoinPC1'])) {
                $AddOfficalForCompetition->ResponseDatePcNeed1 = htmlspecialchars($_POST['BesoinPC1']);
            } else {
                $formError['BesoinPC1'] = 'MErci de remplir la premier date de disponibilité pour le pc ';
            }
            if (!empty($_POST['BesoinPC2'])) {
                $AddOfficalForCompetition->ResponseDatePcNeed2 = htmlspecialchars($_POST['BesoinPC2']);
            } else {
                $AddOfficalForCompetition->ResponseDatePcNeed2 = null;
            }
            if (!empty($_POST['BesoinPC3'])) {
                $AddOfficalForCompetition->ResponseDatePcNeed3 = htmlspecialchars($_POST['BesoinPC3']);
            } else {
                $AddOfficalForCompetition->ResponseDatePcNeed3 = null;
            }
            if (!empty($_POST['NeedLand1'])) {
                $AddOfficalForCompetition->AvaibleDateNeedForTheCommissioner1 = htmlspecialchars($_POST['NeedLand1']);
            } else {
                $formError['NeedLand1'] = 'NeedLand1';
            }
            if (!empty($_POST['NeedLand2'])) {
                $AddOfficalForCompetition->AvaibleDateNeedForTheCommissioner2 = htmlspecialchars($_POST['NeedLand2']);
            } else {
                $AddOfficalForCompetition->AvaibleDateNeedForTheCommissioner2 = null;
            }
            if (!empty($_POST['NeedLand3'])) {
                $AddOfficalForCompetition->AvaibleDateNeedForTheCommissioner3 = htmlspecialchars($_POST['NeedLand3']);
            } else {
                $AddOfficalForCompetition->AvaibleDateNeedForTheCommissioner3 = null;
            }
            if (!empty($_POST['Accommodation'])) {
                $AddOfficalForCompetition->Accommodation = htmlspecialchars($_POST['BesoinPC3']);
            } else {
                $formError['Accommodation'] = 'merci de remplir si vous avez besoin d\'un hébergement';
            }
            if (isset($_GET['IdCompet'])) {
                if (preg_match($regexId, $_GET['IdCompet'])) {
                    $AddOfficalForCompetition->id_0108asap_competiton = htmlspecialchars($_GET['IdCompet']);
                }
            }
            if (!empty($_SESSION['idUser'])) {
                if (preg_match($regexId, $_SESSION['idUser'])) {
                    $AddOfficalForCompetition->id_0108asap_membres = htmlspecialchars($_SESSION['idUser']);
                }
            }
            if (count($formError) == 0) {
                $CheckRegistrationOfficial = $AddOfficalForCompetition->AddOffical();
            }
            if ($CheckRegistrationOfficial == true) {
                header("Location: HomeLogin.php");
            }
        }
    } else {
        $AlreadyRegistered = 'Vous êtes dééjà inscri pour cette compétition';
    }
}



$FonctionList = new functions();
$listerFunctions = $FonctionList->ListOfFunction();
$DisplayRegistreurRally = new Rally();
$ListRally = $DisplayRegistreurRally->DisplayRegistrationOfficial();
