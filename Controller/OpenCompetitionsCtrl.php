<?php
$title='évènements sportifs';
$ListSports= new SportsEventsModel();
$listSportEvents= $ListSports->ListSporsEvents();
$ListOfCompetition= new Competiton();
$CompetitonDisplay= $ListOfCompetition->DisplayCompetitionregistration();
