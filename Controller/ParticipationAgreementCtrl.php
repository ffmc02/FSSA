<?php
$title='Epreuves où je suis inscrit';
$DisplayOfCompetitors= new RegistrationForCompetitors();
$DisplayListCompetitors= $DisplayOfCompetitors->DisplayOfCompetitors();
$CopilotInformationDiplay= new membres();
$CopilotInformation=$CopilotInformationDiplay->DisplayCoPilote();