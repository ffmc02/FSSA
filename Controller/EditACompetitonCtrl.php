<?php

$title = 'Modifier une competition ';
$formError = array();
$regexId = '/^\d+$/';
$EdditRaceOustidRallye = new RaceOutsideRally();
$EdditSprotEventsOutsideRally = new SportsEventsModel();
$EdditCompetitionOustideRally = new Competiton();
if (isset($_GET['IdCompet'])) {
    if (preg_match($regexId, $_GET['IdCompet'])) {
        $CompetitionId = htmlspecialchars($_GET['IdCompet']);
    }
}
if (isset($_GET['TypeCompet'])) {
    if (preg_match($regexId, $_GET['TypeCompet'])) {
        $CompetitionCategory = htmlspecialchars($_GET['TypeCompet']);
    }
}
//competition Hors rallye
if ($CompetitionCategory != 1 && $CompetitionCategory != 2) {
    $h1title = 'Modifier une course';
    $title = 'Modifier une course ';
    if (isset($_POST['EditRace'])) {
        //partie competition
        if (!empty($_POST['CatgoryCompetition'])) {
            if (preg_match($regexId, $_POST['typeCompetiton'])) {
                $EdditCompetitionOustideRally->id_0108asap_categorycompetition = htmlspecialchars($_POST['CatgoryCompetition']);
            }
        }
        if (!empty($_POST['typeCompetiton'])) {
            if (preg_match($regexId, $_POST['typeCompetiton'])) {
                $EdditCompetitionOustideRally->id_0108asap_typeofcompetition = htmlspecialchars($_POST['typeCompetiton']);
            }
        }
        if (isset($_GET['IdCompet'])) {
            if (preg_match($regexId, $_GET['IdCompet'])) {
                $EdditCompetitionOustideRally->id = htmlspecialchars($_GET['IdCompet']);
            }
        }
        //partie sportevents
        if (!empty($_POST['IdSportEvents'])) {
            if (preg_match($regexId, $_POST['IdSportEvents'])) {
                $EdditSprotEventsOutsideRally->id = htmlspecialchars($_POST['IdSportEvents']);
            }
        }
        if (!empty($_POST['NameOfCompetion'])) {
            $EdditSprotEventsOutsideRally->NameOfTheTest = htmlspecialchars($_POST['NameOfCompetion']);
        }
        if (!empty($_POST['Location_Circuit'])) {
            $EdditSprotEventsOutsideRally->Location_Circuit = htmlspecialchars($_POST['Location_Circuit']);
        }
        if (!empty($_POST['StartOfTheCompetition'])) {
            $EdditSprotEventsOutsideRally->DateOfTeste = htmlspecialchars($_POST['StartOfTheCompetition']);
        }
        if (!empty($_POST['NumberDaysCompetition'])) {
            $EdditSprotEventsOutsideRally->NumberDays = htmlspecialchars($_POST['NumberDaysCompetition']);
        }
        if (!empty($_POST['Observation'])) {
            $EdditSprotEventsOutsideRally->Observation = htmlspecialchars($_POST['Observation']);
        }
        //partie coure hors rally
        if (!empty($_POST['Idraceoutsiderally'])) {
            if (preg_match($regexId, $_POST['Idraceoutsiderally'])) {
                $EdditRaceOustidRallye->id = htmlspecialchars($_POST['Idraceoutsiderally']);
            }
        }
        if (!empty($_POST['StartOfTheCompetition'])) {
            $EdditRaceOustidRallye->CompetitionStarDay = htmlspecialchars($_POST['StartOfTheCompetition']);
        }
        if (!empty($_POST['EndOfTheCompetition'])) {
            $EdditRaceOustidRallye->CompetitionEndDay = htmlspecialchars($_POST['EndOfTheCompetition']);
        }
        if (!empty($_POST['RequirementDate1'])) {
            $EdditRaceOustidRallye->RequirementDate1 = htmlspecialchars($_POST['RequirementDate1']);
        }
        if (!empty($_POST['RequirementDate2'])) {
            $EdditRaceOustidRallye->RequirementDate2 = htmlspecialchars($_POST['RequirementDate2']);
        }
        if (!empty($_POST['RequirementDate3'])) {
            $EdditRaceOustidRallye->RequirementDate3 = htmlspecialchars($_POST['RequirementDate3']);
        }
        $CheckEdditCompetitionOustideRally = $EdditCompetitionOustideRally->EdditCompetitionOustideRally();

        if ($CheckEdditCompetitionOustideRally == true) {
            $CheckEdditSprotEventsOutsideRally = $EdditSprotEventsOutsideRally->EdditSportEvents();
            if ($CheckEdditSprotEventsOutsideRally == true) {
                $CheckEdditRaceOustidRallye = $EdditRaceOustidRallye->EdditRaceOutsideRally();


                if ($CheckEdditRaceOustidRallye == true) {

                    header("Location: ListOfOpenCompetitons.php");
                }
            }
        }
    }
}

//compettition de rallye ou rallye tt 
$EdditSprotEventsRally = new SportsEventsModel();
$EdditRally = new Rally();
$EdditCompetitionRally = new Competiton();
if ($CompetitionCategory == 1 || $CompetitionCategory == 2) {
    $h1title = 'Modifier un Rallye';
    $title = 'Modifier un Rallye ';
    if (isset($_POST['EdditTheRally'])) {
        if (!empty($_POST['CatgoryCompetition'])) {
            if (preg_match($regexId, $_POST['typeCompetiton'])) {
                $EdditCompetitionRally->id_0108asap_categorycompetition = htmlspecialchars($_POST['CatgoryCompetition']);
            }
        }
        if (!empty($_POST['typeCompetiton'])) {
            if (preg_match($regexId, $_POST['typeCompetiton'])) {
                $EdditCompetitionRally->id_0108asap_typeofcompetition = htmlspecialchars($_POST['typeCompetiton']);
            }
        }
        if (isset($_GET['IdCompet'])) {
            if (preg_match($regexId, $_GET['IdCompet'])) {
                $EdditCompetitionRally->id = htmlspecialchars($_GET['IdCompet']);
            }
        }
        //partie sportevents
        if (!empty($_POST['IdSportEvents'])) {
            if (preg_match($regexId, $_POST['IdSportEvents'])) {
                $EdditSprotEventsOutsideRally->id = htmlspecialchars($_POST['IdSportEvents']);
            }
        }
        if (!empty($_POST['NameOfCompetion'])) {
            $EdditSprotEventsRally->NameOfTheTest = htmlspecialchars($_POST['NameOfCompetion']);
        }
        if (!empty($_POST['Location_Circuit'])) {
            $EdditSprotEventsRally->Location_Circuit = htmlspecialchars($_POST['Location_Circuit']);
        }
        if (!empty($_POST['StartOfTheCompetition'])) {
            $EdditSprotEventsRally->DateOfTeste = htmlspecialchars($_POST['StartOfTheCompetition']);
        }
        if (!empty($_POST['NumberDaysCompetition'])) {
            $EdditSprotEventsRally->NumberDays = htmlspecialchars($_POST['NumberDaysCompetition']);
        }
        if (!empty($_POST['Observation'])) {
            $EdditSprotEventsRally->Observation = htmlspecialchars($_POST['Observation']);
        }
        //parti rallye
        if (!empty($_POST['NumberOfSteps'])) {
            if (preg_match($regexId, $_POST['NumberOfSteps'])) {
                $EdditRally->NumberOfSteps = htmlspecialchars($_POST['NumberOfSteps']);
            } else {
                $formError['NumberOfSteps'] = 'Merci de ne mettre que des chiffres';
            }
        } else {
            $formError['NumberOfSteps'] = 'Merci d\'inscrire le nombre de jour d\'étapes.';
        }
        if (!empty($_POST['NumberOfEs'])) {
            if (preg_match($regexId, $_POST['NumberOfEs'])) {
                $EdditRally->NumberOfEs = htmlspecialchars($_POST['NumberOfEs']);
            } else {
                $formError['NumberOfEs'] = 'Merci de ne mettre que des chiffres';
            }
        } else {
            $formError['NumberOfEs'] = 'Merci d\'inscrire le nombre de jour d\'épreuves spécial..';
        }
        if (!empty($_POST['NumberOfCompetitonDays'])) {
            if (preg_match($regexId, $_POST['NumberOfCompetitonDays'])) {
                $EdditRally->NumberOfCompetitonDays = htmlspecialchars($_POST['NumberOfCompetitonDays']);
            } else {
                $formError['NumberOfCompetitonDays'] = 'Merci de ne mettre que des chiffres';
            }
        } else {
            $formError['NumberOfCompetitonDays'] = 'Merci d\'inscrire le nombre de jour de compétition.';
        }
        if (!empty($_POST['RecognitionDay'])) {
            $EdditRally->RecognitionDay = htmlspecialchars($_POST['RecognitionDay']);
        }
        if (!empty($_POST['RecognitionDay2'])) {
            $EdditRally->RecognitionDay2 = htmlspecialchars($_POST['RecognitionDay2']);
        }
        if (!empty($_POST['RecognitionDay3'])) {
            $EdditRally->RecognitionDay3 = htmlspecialchars($_POST['RecognitionDay3']);
        }
        if (!empty($_POST['AsaOrganizer'])) {
            $EdditRally->AsaOrganizer = htmlspecialchars($_POST['AsaOrganizer']);
        } else {
            $formError['AsaOrganizer'] = 'veuillez remplir le champs Asa organisatrice';
        }
        if (!empty($_POST['RecognitionDay3'])) {
            $EdditRally->RecognitionDay3 = htmlspecialchars($_POST['RecognitionDay3']);
        }
        if (!empty($_POST['DatePcNeed1'])) {
            $EdditRally->DatePcNeed1 = htmlspecialchars($_POST['DatePcNeed1']);
        }
        if (!empty($_POST['DatePcNeed2'])) {
            $EdditRally->DatePcNeed2 = htmlspecialchars($_POST['DatePcNeed2']);
        }
        if (!empty($_POST['DatePcNeed3'])) {
            $EdditRally->DatePcNeed3 = htmlspecialchars($_POST['DatePcNeed3']);
        }
        if (!empty($_POST['DateNeedForTheCommissioner1'])) {
            $EdditRally->DateNeedForTheCommissioner1 = htmlspecialchars($_POST['DateNeedForTheCommissioner1']);
        }
        if (!empty($_POST['DateNeedForTheCommissioner2'])) {
            $EdditRally->DateNeedForTheCommissioner2 = htmlspecialchars($_POST['DateNeedForTheCommissioner2']);
        }
        if (!empty($_POST['DateNeedForTheCommissioner3'])) {
            $EdditRally->DateNeedForTheCommissioner3 = htmlspecialchars($_POST['DateNeedForTheCommissioner3']);
        }
        if (!empty($_POST['idRally'])) {
            if (preg_match($regexId, $_POST['idRally'])) {
                $EdditRally->id = htmlspecialchars($_POST['idRally']);
            }
        }
        $CheckEdditCompetitionRally = $EdditCompetitionRally->EdditCompetitionOustideRally();
        if ($CheckEdditCompetitionRally == true) {
            $CheckEdditSprotEventsRally= $EdditSprotEventsRally->EdditSportEvents();
        }
        if($CheckEdditSprotEventsRally==true){
            $CheckEdditRally=$EdditRally->EdditRally();
        }
        if($CheckEdditRally==true){
            header("Location: ListOfOpenCompetitons.php");
        }
    }
}
//liste des type de compétition 
$ListOfCompetitions = new TypeOfCompetition();
$DisplayListOfCompetitions = $ListOfCompetitions->ListTypeOfCompetiton();
//liste des categorie de compétion 
$listCategoryCompetition = new CategoryCompetition();
$DisplayCategoryCompetion = $listCategoryCompetition->DisplayCategoryCompetition();
// liste des course hors rallye 
$ListCompetitioOustideRally = new Competiton();
$ListRaceOustideRally = $ListCompetitioOustideRally->ListCompetitionOustidRally();
//liste des rallyes
$DisplayListRallys = new Competiton();
$DisplayListRallys->id = $CompetitionId;
$ListRally = $DisplayListRallys->ListCompetitionRally();
