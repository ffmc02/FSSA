<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SportsEventsModel
 *
 * @author gaeta
 */
class SportsEventsModel {

    public $pdo;
    public $NameOfTheTest = '';
    public $DateOfTeste = 0;
    public $TypeOfAccommodation = '';
    public $Observation = '';

    public function __construct() {
//fonction de connexion a ma base de donnÃ©er 
        //ordi formation
        $this->pdo = dataBase::getIntance();


        // Sinon on affiche un message d'erreur
        //il les faut pour faire les transaction (3 prochaine methode)
    }

    public function ListSporsEvents() {
        $query = 'SELECT  `NameOfTheTest`, `DateOfTeste`, `TypeOfAccommodation`, `Observation` FROM `0108asap_sportsevents`';
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->execute();
        return $queryResult->fetchAll(PDO::FETCH_OBJ);
    }

}
