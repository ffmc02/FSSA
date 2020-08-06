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
        $formError['CatgoryCompetition'] = 'Merci de sélectionner le type de championnat dans le champs Catégorie de la compétition';
    }
    if (!empty($_POST['typeCompetiton'])) {
        if (!empty($_POST['typeCompetiton'])) {
            if (preg_match($regexId, $_POST['typeCompetiton'])) {
                $AddCompetitionManger->id_0108asap_categorycompetition = htmlspecialchars($_POST['typeCompetiton']);
                $CategoryCompetiton = htmlspecialchars($_POST['typeCompetiton']);
            }
        }
    } else {
        $formError['typeCompetiton'] = 'MErci de selectrion le type de comp&tion (Rallye etc)';
    }
    if (!empty($_POST['NameOfCompetion'])) {
        $SportEvent->NameOfTheTest = htmlspecialchars($_POST['NameOfCompetion']);
    } else {
        $formError['NameOfCompetion'] = 'Merci de remplire le nom de la compétition';
    }
    if (!empty($_POST['Location_Circuit'])) {
        $SportEvent->Location_Circuit = htmlspecialchars($_POST['Location_Circuit']);
    } else {
        $formError['Location_Circuit'] = 'Merci de remplire le lieu de la compétition';
    }
    if (!empty($_POST['StartOfTheCompetition'])) {
        $SportEvent->DateOfTeste = htmlspecialchars($_POST['StartOfTheCompetition']);
    } else {
        $formError['StartOfTheCompetition'] = 'Merci de selectionner la date de la compétition ';
    }

    if (!empty($_POST['NumberDaysCompetition'])) {

        if (preg_match($regexId, $_POST['NumberDaysCompetition'])) {

            $SportEvent->NumberDays = htmlspecialchars($_POST['NumberDaysCompetition']);
        } else {
            $formError['NumberDays'] = 'Merci de ne mettre que des chiffres';
        }
    } else {
        $formError['NumberDays'] = 'Merci d\'inscrire le nombre de jour de compétition.';
    }
    if (!empty($_POST['Observation'])) {
        $SportEvent->Observation = htmlspecialchars($_POST['Observation']);
    } else {
        $formError['Observation'] = 'MErci de remplir une observation';
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
            $formError['NumberOfSteps'] = 'Merci de ne mettre que des chiffres';
        }
    } else {
        $formError['NumberOfSteps'] = 'Merci d\'inscrire le nombre de jour d\'étapes.';
    }
    if (!empty($_POST['NumberOfEs'])) {
        if (preg_match($regexId, $_POST['NumberOfEs'])) {
            $AddRally->NumberOfEs = htmlspecialchars($_POST['NumberOfEs']);
        } else {
            $formError['NumberOfEs'] = 'Merci de ne mettre que des chiffres';
        }
    } else {
        $formError['NumberOfEs'] = 'Merci d\'inscrire le nombre de jour d\'épreuves spécial..';
    }
    if (!empty($_POST['NumberOfCompetitonDays'])) {
        if (preg_match($regexId, $_POST['NumberOfCompetitonDays'])) {
            $AddRally->NumberOfCompetitonDays = htmlspecialchars($_POST['NumberOfCompetitonDays']);
        } else {
            $formError['NumberOfCompetitonDays'] = 'Merci de ne mettre que des chiffres';
        }
    } else {
        $formError['NumberOfCompetitonDays'] = 'Merci d\'inscrire le nombre de jour de compétition.';
    }
    if (!empty($_POST['RecognitionDay'])) {
        $AddRally->RecognitionDay = htmlspecialchars($_POST['RecognitionDay']);
    } else {
        $formError['RecognitionDay'] = 'Merci de selectionner la date de la premiére journée de reconnaissance';
    }
    if (!empty($_POST['RecognitionDay2'])) {
         $AddRally->RecognitionDay2 = htmlspecialchars($_POST['RecognitionDay2']);
    } else {
        $AddRally->RecognitionDay2=null;
    }
    if (!empty($_POST['RecognitionDay3'])) {
         $AddRally->RecognitionDay3 = htmlspecialchars($_POST['RecognitionDay3']);
      } else {
        $AddRally->RecognitionDay3=null;
    }
       if (!empty($_POST['AsaOrganizer'])) {
         $AddRally->AsaOrganizer = htmlspecialchars($_POST['AsaOrganizer']);
      } else {
        $formError['AsaOrganizer']='veuillez remplir le champs Asa organisatrice';
    }
    var_dump($formError);
    if (count($formError) == 0) {
        $CheckSportEvents = $SportEvent->AddSorpEvents();
        $LastIDSportEvents = new SportsEventsModel();
        $IdSportEvents = $LastIDSportEvents->lastInsertIdSportEvents();
        $AddCompetitionManger->id_0108asap_sportsevents = $IdSportEvents;
        $CheckAddCompetitioManager = $AddCompetitionManger->AddCompetitionManager();
        $ListIDCompetition= new Competiton();
        $LastIdCompetition=$ListIDCompetition->lastInsertIdCompetition();
        $AddRally->id_0108asap_competiton= $LastIdCompetition;  
        var_dump($AddRally);
        $CheckAddRally=$AddRally->AddRaly();
        var_dump($CheckAddRally);
        
        if ($CheckAddCompetitioManager == true) {
            if ($CheckSportEvents == true) {
                if($CheckAddRally==true){
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
