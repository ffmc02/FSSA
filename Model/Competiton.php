<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Competiton
 *
 * @author gaeta
 */
class Competiton {

    public $pdo;
    public $id_0108asap_categorycompetition = 0;
    public $id_0108asap_sportsevents = 0;
    public $id_0108asap_typeofcompetition = 0;
    public $Open = '0';
    public $Close = '1';
    public $id = 0;

    public function __construct() {
//fonction de connexion a ma base de donnÃ©er 
        //ordi formation
        $this->pdo = dataBase::getIntance();


        // Sinon on affiche un message d'erreur
        //il les faut pour faire les transaction (3 prochaine methode)
    }

    //AJout d'une competition
    public function AddCompetitionManager() {
        $query = 'INSERT INTO `0108asap_competiton`'
                . '(  `id_0108asap_categorycompetition`,   `id_0108asap_sportsevents`, '
                . '`id_0108asap_typeofcompetition`, `Open`, `Close`) '
                . 'VALUES (:id_0108asap_categorycompetition, :id_0108asap_sportsevents, :id_0108asap_typeofcompetition, :Open, :Close)';
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->bindValue(':id_0108asap_categorycompetition', $this->id_0108asap_categorycompetition, PDO::PARAM_INT);
        $queryResult->bindValue(':id_0108asap_sportsevents', $this->id_0108asap_sportsevents, PDO::PARAM_INT);
        $queryResult->bindValue(':id_0108asap_typeofcompetition', $this->id_0108asap_typeofcompetition, PDO::PARAM_INT);
        $queryResult->bindValue(':Open', $this->Open, PDO::PARAM_STR);
        $queryResult->bindValue(':Close', $this->Close, PDO::PARAM_STR);
        return $queryResult->execute();
    }

    public function DisplayCompetitionRegistration() {
        $query = 'SELECT `0108asap_competiton`.`id`, `Open`, `Close`, `NameOfTheTest`, `Location_Circuit`, DATE_FORMAT(`0108asap_sportsevents`. `DateOfTeste`,\'%d/%m/%Y\') AS `DateOfCompetition`,'
                . ' `NumberDays`, `Observation`,  `CategoryCompetition` '
                . 'FROM `0108asap_competiton` '
                . 'INNER JOIN `0108asap_sportsevents` '
                . 'ON `0108asap_sportsevents`.`id`=`0108asap_competiton`.`id_0108asap_sportsevents` '
                . 'INNER JOIN `0108asap_categorycompetition` '
                . ' ON `0108asap_competiton`.`id_0108asap_categorycompetition`=`0108asap_categorycompetition`.`id` '
                . 'WHERE `Open`=1 && `0108asap_sportsevents`.`DateOfTeste`>= CURDATE() ';
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->execute();
        return $queryResult->fetchAll(PDO::FETCH_OBJ);
    }

    public function DisplayRallyRegistration() {
        $query = 'SELECT `0108asap_comptitionregistration`.`id`,'
                . ' `0108asap_comptitionregistration`.`id_0108asap_competiton`,'
                . ' `id_0108asap_membres`, '
                . ' `id_0108asap_functions`,  '
                . '`TypeOfCompetiton`, '
                . '`NameOfTheTest`,'
                . ' `NumberDays`, '
                . '`0108asap_competiton`.`Open`, '
                . '`Observation`, '
                . 'DATE_FORMAT(`0108asap_sportsevents`. `DateOfTeste`,\'%d/%m/%Y\') AS `DateOfCompetition`,  '
                . '`Name`, '
                . '`Firstname`, '
                . '`City`, `'
                . '`TypeOfLicence`, '
                . '`NumberOfSteps`,'
                . ' `NumberOfEs`, '
                . '`NumberOfCompetitonDays`,'
                . ' DATE_FORMAT(`0108asap_rally`. `RecognitionDay`,\'%d/%m/%Y\') AS `1jour reco`,'
                . ' DATE_FORMAT(`0108asap_rally`. `RecognitionDay2`,\'%d/%m/%Y\') AS `2 jour reco`, '
                . 'DATE_FORMAT(`0108asap_rally`. `RecognitionDay3`,\'%d/%m/%Y\') AS `3 jour reco`, '
                . ' `AsaOrganizer`'
                . ' FROM `0108asap_comptitionregistration` '
                . 'INNER JOIN `0108asap_competiton` '
                . 'ON `0108asap_competiton`.`id`=`0108asap_comptitionregistration`.`id_0108asap_competiton`  '
                . 'INNER JOIN  `0108asap_membres`  '
                . 'ON `0108asap_membres`.`id`=`0108asap_comptitionregistration`.`id_0108asap_membres`  '
                . 'INNER JOIN `0108asap_sportsevents` '
                . 'ON `0108asap_sportsevents`.`id`=`0108asap_competiton`.`id_0108asap_sportsevents`  '
                . 'INNER JOIN `0108asap_typeofcompetition`  '
                . 'ON `0108asap_typeofcompetition`.`id`=`0108asap_competiton`.`id_0108asap_typeofcompetition` '
                . ' INNER  JOIN `0108asap_categorycompetition` '
                . ' ON `0108asap_categorycompetition`.`id`=`0108asap_competiton`.`id_0108asap_categorycompetition` '
                . 'INNER JOIN `0108asap_rally` '
                . 'ON `0108asap_competiton`.`id`=`0108asap_rally`.`id_0108asap_competiton`  '
                . 'WHERE `0108asap_competiton`.`Open`=1 ';
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->execute();
        return $queryResult->fetchAll(PDO::FETCH_OBJ);
    }

    public function lastInsertIdCompetition() {
        return $this->pdo->db->lastInsertId();
    }

    public function DisplayClosedCompetiton() {
        $query = 'SELECT `0108asap_competiton`.`id` AS `IdCompetition`,  `id_0108asap_sportsevents`, `NameOfTheTest` '
                . 'FROM `0108asap_competiton` '
                . 'INNER JOIN `0108asap_sportsevents` '
                . 'ON `0108asap_sportsevents`.`id`=`0108asap_competiton`.`id_0108asap_sportsevents`'
                . '';
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->execute();
        return $queryResult->fetchAll(PDO::FETCH_OBJ);
    }

    public function ClosedCompetiton() {
        $query = 'UPDATE `0108asap_competiton` SET `Open`=:Open, `Close`=:Close WHERE `id`=:id ';
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->bindValue(':id', $this->id, PDO::PARAM_INT);
        $queryResult->bindValue(':Open', $this->Open, PDO::PARAM_STR);
        $queryResult->bindValue(':Close', $this->Close, PDO::PARAM_STR);
        return $queryResult->execute();
    }

    public function DisplayReopenCompetition() {
        $query = 'SELECT `0108asap_competiton`.`id`, `0108asap_competiton`.`id_0108asap_sportsevents`, `0108asap_competiton`.`Open`, '
                . '`0108asap_competiton`.`Close`, `0108asap_sportsevents`.`NameOfTheTest`, `0108asap_sportsevents`.`Location_Circuit`, '
                . 'DATE_FORMAT(`0108asap_sportsevents`.`DateOfTeste`,\'%d/%m/%Y\') AS `DateOfCompetition`, `0108asap_categorycompetition`.`CategoryCompetition` '
                . 'FROM `0108asap_competiton` '
                . 'INNER JOIN `0108asap_categorycompetition` '
                . 'ON `0108asap_categorycompetition`.`id`=`0108asap_competiton`.`id_0108asap_categorycompetition` '
                . 'INNER JOIN `0108asap_sportsevents` '
                . 'ON `0108asap_sportsevents`.`id`=`0108asap_competiton`.`id_0108asap_sportsevents`'
                . ' WHERE `0108asap_competiton`.`Open`=0 '
                . ' ';
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->execute();
        return $queryResult->fetchAll(PDO::FETCH_OBJ);
    }

    public function ReopenCompetiton() {
        $query = 'UPDATE `0108asap_competiton` SET `Open`=:Open, `Close`=:Close WHERE `id`=:id ';
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->bindValue(':id', $this->id, PDO::PARAM_INT);
        $queryResult->bindValue(':Open', $this->Open, PDO::PARAM_STR);
        $queryResult->bindValue(':Close', $this->Close, PDO::PARAM_STR);
        return $queryResult->execute();
    }

}
