<?php

$title = 'Ouvrire un  rallye/ rallye TT';
$formError = array();
$regexId = '/^\d+$/';
$SportEvent = new SportsEventsModel();
$AddCompetitionManger = new Competiton();
$AddRally = new Rally();
if (isset($_POST['AddCompetition'])) {
    if (!empty($_POST['CatgoryCompetition'])) {
        if (preg_match($regexId, $_POST['CatgoryCompetition'])) {
            $AddCompetitionManger->id_0108asap_typeofcompetition = htmlspecialchars($_POST['CatgoryCompetition']);
        }
    } else {
        $formError['CatgoryCompetition'] = 'Merci de sélectionner le type de championnat dans le champ Catégorie de la compétition';
    }
    if (!empty($_POST['typeCompetiton'])) {
        if (!empty($_POST['typeCompetiton'])) {
            if (preg_match($regexId, $_POST['typeCompetiton'])) {
                $AddCompetitionManger->id_0108asap_categorycompetition = htmlspecialchars($_POST['typeCompetiton']);
                $CategoryCompetiton = htmlspecialchars($_POST['typeCompetiton']);
            }
        }
    } else {
        $formError['typeCompetiton'] = 'Merci de sélectionner le type de compétition (Rallye etc)';
    }
    if (!empty($_POST['NameOfCompetion'])) {
        $SportEvent->NameOfTheTest = htmlspecialchars($_POST['NameOfCompetion']);
    } else {
        $formError['NameOfCompetion'] = 'Merci de remplir le nom de la compétition';
    }
    if (!empty($_POST['Location_Circuit'])) {
        $SportEvent->Location_Circuit = htmlspecialchars($_POST['Location_Circuit']);
    } else {
        $formError['Location_Circuit'] = 'Merci de remplir le lieu de la compétition';
    }
    if (!empty($_POST['StartOfTheCompetition'])) {
        $SportEvent->DateOfTeste = htmlspecialchars($_POST['StartOfTheCompetition']);
    } else {
        $formError['StartOfTheCompetition'] = 'Merci de sélectionner la date de la compétition ';
    }

    if (!empty($_POST['NumberDaysCompetition'])) {

        if (preg_match($regexId, $_POST['NumberDaysCompetition'])) {

            $SportEvent->NumberDays = htmlspecialchars($_POST['NumberDaysCompetition']);
        } else {
            $formError['NumberDays'] = 'Merci de mettre que des chiffres';
        }
    } else {
        $formError['NumberDays'] = 'Merci d\'inscrire le nombre de jours de compétition.';
    }
    if (!empty($_POST['Observation'])) {
        $SportEvent->Observation = htmlspecialchars($_POST['Observation']);
    } else {
        $formError['Observation'] = 'Merci de remplir une observation';
    }
    if (!empty($_POST['OpenOrClose'])) {
        if ($_POST['OpenOrClose'] != '0') {
            if ($_POST['OpenOrClose'] == 'Open') {
                $AddCompetitionManger->Close = 0;
                $AddCompetitionManger->Open = 1;
            }
        }
    }
    if (!empty($_POST['NumberOfSteps'])) {
        if (preg_match($regexId, $_POST['NumberOfSteps'])) {
            $AddRally->NumberOfSteps = htmlspecialchars($_POST['NumberOfSteps']);
        } else {
            $formError['NumberOfSteps'] = 'Merci de mettre que des chiffres';
        }
    } else {
        $formError['NumberOfSteps'] = 'Merci d\'inscrire le nombre de jours d\'étapes.';
    }
    if (!empty($_POST['NumberOfEs'])) {
        if (preg_match($regexId, $_POST['NumberOfEs'])) {
            $AddRally->NumberOfEs = htmlspecialchars($_POST['NumberOfEs']);
        } else {
            $formError['NumberOfEs'] = 'Merci de mettre que des chiffres';
        }
    } else {
        $formError['NumberOfEs'] = 'Merci d\'inscrire le nombre de jours d\'épreuves spécial..';
    }
    if (!empty($_POST['NumberOfCompetitonDays'])) {
        if (preg_match($regexId, $_POST['NumberOfCompetitonDays'])) {
            $AddRally->NumberOfCompetitonDays = htmlspecialchars($_POST['NumberOfCompetitonDays']);
        } else {
            $formError['NumberOfCompetitonDays'] = 'Merci de mettre que des chiffres';
        }
    } else {
        $formError['NumberOfCompetitonDays'] = 'Merci d\'inscrire le nombre de jours de compétition.';
    }
    if (!empty($_POST['RecognitionDay'])) {
        $AddRally->RecognitionDay = htmlspecialchars($_POST['RecognitionDay']);
    } else {
        $formError['RecognitionDay'] = 'Merci de sélectionner la date de la premiére journée de reconnaissance';
    }
    if (!empty($_POST['RecognitionDay2'])) {
        $AddRally->RecognitionDay2 = htmlspecialchars($_POST['RecognitionDay2']);
    } else {
        $AddRally->RecognitionDay2 = null;
    }
    if (!empty($_POST['RecognitionDay3'])) {
        $AddRally->RecognitionDay3 = htmlspecialchars($_POST['RecognitionDay3']);
    } else {
        $AddRally->RecognitionDay3 = null;
    }
    if (!empty($_POST['AsaOrganizer'])) {
        $AddRally->AsaOrganizer = htmlspecialchars($_POST['AsaOrganizer']);
    } else {
        $formError['AsaOrganizer'] = 'veuillez remplir le champ Asa organisatrice';
    }
    if (!empty($_POST['RecognitionDay3'])) {
        $AddRally->RecognitionDay3 = htmlspecialchars($_POST['RecognitionDay3']);
    } else {
        $AddRally->RecognitionDay3 = null;
    }
    if (!empty($_POST['DatePcNeed1'])) {
        $AddRally->DatePcNeed1 = htmlspecialchars($_POST['DatePcNeed1']);
    } else {
        $AddRally->DatePcNeed1 = null;
    }
    if (!empty($_POST['DatePcNeed2'])) {
        $AddRally->DatePcNeed2 = htmlspecialchars($_POST['DatePcNeed2']);
    } else {
        $AddRally->DatePcNeed2 = null;
    }
    if (!empty($_POST['DatePcNeed3'])) {
        $AddRally->DatePcNeed3 = htmlspecialchars($_POST['DatePcNeed3']);
    } else {
        $AddRally->DatePcNeed3 = null;
    }
    if (!empty($_POST['DateNeedForTheCommissioner1'])) {
        $AddRally->DateNeedForTheCommissioner1 = htmlspecialchars($_POST['DateNeedForTheCommissioner1']);
    } else {
        $AddRally->DateNeedForTheCommissioner1 = null;
    }
    if (!empty($_POST['DateNeedForTheCommissioner2'])) {
        $AddRally->DateNeedForTheCommissioner2 = htmlspecialchars($_POST['DateNeedForTheCommissioner2']);
    } else {
        $AddRally->DateNeedForTheCommissioner2 = null;
    }
    if (!empty($_POST['DateNeedForTheCommissioner3'])) {
        $AddRally->DateNeedForTheCommissioner3 = htmlspecialchars($_POST['DateNeedForTheCommissioner3']);
    } else {
        $AddRally->DateNeedForTheCommissioner3 = null;
    }
    if (count($formError) == 0) {
        $CheckSportEvents = $SportEvent->AddSorpEvents();
        $LastIDSportEvents = new SportsEventsModel();
        $IdSportEvents = $LastIDSportEvents->lastInsertIdSportEvents();
        $AddCompetitionManger->id_0108asap_sportsevents = $IdSportEvents;
        $CheckAddCompetitioManager = $AddCompetitionManger->AddCompetitionManager();
        $ListIDCompetition = new Competiton();
        $LastIdCompetition = $ListIDCompetition->lastInsertIdCompetition();
        $AddRally->id_0108asap_competiton = $LastIdCompetition;
        $CheckAddRally = $AddRally->AddRaly();
        var_dump($CheckAddRally);

        if ($CheckAddCompetitioManager == true) {
            if ($CheckSportEvents == true) {
                if ($CheckAddRally == true) {
                    header("Location: HomeLogin.php");
                }
            }
        }
    }
}
//var_dump($AddCompetitionManger);
//lisste des tyoe de compétitions
$ListOfCompetitions = new TypeOfCompetition();
$DisplayListOfCompetitions = $ListOfCompetitions->ListTypeOfCompetiton();
//liste des categorie de compétion 
$listCategoryCompetition = new CategoryCompetition();
$DisplayCategoryCompetion = $listCategoryCompetition->DisplayCategoryCompetition();
