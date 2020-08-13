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
    public $id = 0;
    public $NameOfTheTest = '';
    public $DateOfTeste = 0;
    public $NumberDays = 0;
    public $Observation = '';
    public $Location_Circuit = '';

    public function __construct() {
//fonction de connexion a ma base de donnÃ©er 
        //ordi formation
        $this->pdo = dataBase::getIntance();


        // Sinon on affiche un message d'erreur
        //il les faut pour faire les transaction (3 prochaine methode)
    }

    public function lastInsertIdSportEvents() {
        return $this->pdo->db->lastInsertId();
    }

    public function ListSporsEvents() {
        $query = 'SELECT  `NameOfTheTest`,`, `Observation`'
                . ' FROM `0108asap_sportsevents`';
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->execute();
        return $queryResult->fetchAll(PDO::FETCH_OBJ);
    }

    public function AddSorpEvents() {
        $query = 'INSERT INTO `0108asap_sportsevents`(`NameOfTheTest`, `Location_Circuit`, `DateOfTeste`, `NumberDays`,  `Observation`) '
                . 'VALUES (:NameOfTheTest, :Location_Circuit, :DateOfTeste, :NumberDays, :Observation)';
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->bindValue(':NameOfTheTest', $this->NameOfTheTest, PDO::PARAM_STR);
        $queryResult->bindValue(':Location_Circuit', $this->Location_Circuit, PDO::PARAM_STR);
        $queryResult->bindValue(':DateOfTeste', $this->DateOfTeste, PDO::PARAM_STR);
        $queryResult->bindValue(':NumberDays', $this->NumberDays, PDO::PARAM_INT);
        $queryResult->bindValue(':Observation', $this->Observation, PDO::PARAM_STR);
//          $queryResult->debugDumpParams();
//    die();
        return $queryResult->execute();
    }

    public function UpdateSportEvents() {
    $query='UPDATE `0108asap_sportsevents` SET `NameOfTheTest`=:NameOfTheTest, `Location_Circuit`=:Location_Circuit, '
            . '`DateOfTeste`=:DateOfTeste, `NumberDays`=:NumberDays, `Observation`=:Observation'
            . 'WHERE `id`=:id'; 
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->bindValue(':NameOfTheTest', $this->NameOfTheTest, PDO::PARAM_STR);
        $queryResult->bindValue(':Location_Circuit', $this->Location_Circuit, PDO::PARAM_STR);
        $queryResult->bindValue(':DateOfTeste', $this->DateOfTeste, PDO::PARAM_STR);
        $queryResult->bindValue(':NumberDays', $this->NumberDays, PDO::PARAM_INT);
        $queryResult->bindValue(':Observation', $this->Observation, PDO::PARAM_STR); 
        $queryResult->bindValue(':id', $this->id, PDO::PARAM_INT);  
    }
public function ListSportEvents(){
    $query='SELECT  `NameOfTheTest`, `Location_Circuit`, `DateOfTeste`, `NumberDays`, `Observation` FROM `0108asap_sportsevents`';
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->execute();
        return $queryResult->fetchAll(PDO::FETCH_OBJ);
}
}
