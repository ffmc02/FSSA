<?php
$title='Liste des concurrents indcrit au differente compétition';
$DisplayOfCompetitors= new RegistrationForCompetitors();
$DisplayListCompetitors= $DisplayOfCompetitors->DisplayOfCompetitors();
$CopilotInformationDiplay= new membres();
$CopilotInformation=$CopilotInformationDiplay->DisplayCoPilote();