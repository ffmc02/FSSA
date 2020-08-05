<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Rally
 *
 * @author gaeta
 */
class Rally {

    public $pdo;
    public $id = 0;
    public $NumberOfSteps = 0;
    public $NumberOfEs = 0;
    public $NumberOfCompetitonDays = 0;
    public $RecognitionDates = '1970-01-01';
    public $RecognitionDates2 = '1970-01-01';
    public $RecognitionDates3 = '1970-01-01';
    public $id_0108asap_typeofcompetition=0;
    public $id_0108asap_categorycompetition=0;
    public $id_0108asap_competiton=0;
    public $id_0108asap_sportsevents=0;    
    
    public function __construct() {
//fonction de connexion a ma base de donnÃ©er 
//ordi formation
        $this->pdo = dataBase::getIntance();


// Sinon on affiche un message d'erreur
//il les faut pour faire les transaction (3 prochaine methode)
    }

}
