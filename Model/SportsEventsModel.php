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
    public $NumberDays=0;
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
        $query = 'SELECT  `NameOfTheTest`,DATE_FORMAT(`0108asap_sportsevents`. `DateOfTeste`,\'%d/%m/%Y\') AS `DateOfCompetition`, `Observation`'
                . ' FROM `0108asap_sportsevents`';
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->execute();
        return $queryResult->fetchAll(PDO::FETCH_OBJ);
    }

    public function AddSorpEvents() {
        $query = 'INSERT INTO `0108asap_sportsevents`(`NameOfTheTest`, `DateOfTeste`, `NumberDays`,  `Observation`) '
                . 'VALUES (:NameOfTheTest, :DateOfTeste, :NumberDays, :Observation)';
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->bindValue(':NameOfTheTest', $this->NameOfTheTest, PDO::PARAM_STR);
        $queryResult->bindValue(':DateOfTeste', $this->DateOfTeste, PDO::PARAM_INT);
        $queryResult->bindValue(':NumberDays', $this->NumberDays, PDO::PARAM_INT);
        $queryResult->bindValue(':Observation', $this->Observation, PDO::PARAM_STR);
        return $queryResult->execute();
    }

}
