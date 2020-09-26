<?php

$title = 'ajout d\'une compétition';
$formError = array();
$regexId = '/^\d+$/';
$SportEvent = new SportsEventsModel();
$AddCompetitionManger = new Competiton();
$AddRace = new RaceOutsideRally();
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
        $formError['Observation'] = '';
    }
    if (!empty($_POST['OpenOrClose'])) {
        if ($_POST['OpenOrClose'] != '0') {
            if ($_POST['OpenOrClose'] == 'Open') {
                $AddCompetitionManger->Close = 0;
                $AddCompetitionManger->Open = 1;
            }
        }
    }
    if (!empty($_POST['CompetitionStarDay'])) {
        $AddRace->CompetitionStarDay = htmlspecialchars($_POST['CompetitionStarDay']);
    } else {
        $formError['CompetitionStarDay'] = 'Merci de mettre la date de début de la compétition ';
    }
    if (!empty($_POST['CompetitionEndDay'])) {
        $AddRace->CompetitionEndDay = htmlspecialchars($_POST['CompetitionEndDay']);
    } else {
        $formError['CompetitionEndDay'] = 'Merci de mettre la date de fin de la compétition ';
    }

    if (!empty($_POST['RequirementDate1'])) {
        $AddRace->RequirementDate1 = htmlspecialchars($_POST['RequirementDate1']);
    } else {
        $formError['RequirementDate1'] = 'Merci de mettre la date de fin de la compétition ';
    }
    if (!empty($_POST['RequirementDate2'])) {
        $AddRace->RequirementDate2 = htmlspecialchars($_POST['RequirementDate2']);
    }
    if (!empty($_POST['RequirementDate3'])) {
        $AddRace->RequirementDate3 = htmlspecialchars($_POST['RequirementDate3']);
    } 
    if (count($formError) == 0) {
        $CheckSportEvents = $SportEvent->AddSorpEvents();
        $LastIDSportEvents = new SportsEventsModel();
        $IdSportEvents = $LastIDSportEvents->lastInsertIdSportEvents();
        $AddCompetitionManger->id_0108asap_sportsevents = $IdSportEvents;
        $CheckAddCompetitioManager = $AddCompetitionManger->AddCompetitionManager();
        $CompetitionLastId = new Competiton();
        $LastInsertIdCompetion = $CompetitionLastId->lastInsertIdCompetition();
        $AddRace->IdCompetition = htmlspecialchars($LastInsertIdCompetion);
        $CheckAddRace = $AddRace->AddRaceOutsideRally();
        if ($CheckAddCompetitioManager == true) {
            
            if ($CheckSportEvents == true) {
                if ($CheckAddRace == true) {
                    header("Location: HomeLogin.php");
                } else {
                    echo 'erreur $CheckAddRace';
                }
            } else {
                echo 'erreur $CheckSportEvents';
            }
        } else {
            echo 'erreur $CheckSportEvents';
        }
    } else {
        echo 'erreur majeur';    
    }
}
//lisste des tyoe de compétitions
$ListOfCompetitions = new TypeOfCompetition();
$DisplayListOfCompetitions = $ListOfCompetitions->ListTypeOfCompetiton();
//liste des categorie de compétion 
$listCategoryCompetition = new CategoryCompetition();
$DisplayCategoryCompetion = $listCategoryCompetition->DisplayCategoryCompetition();
