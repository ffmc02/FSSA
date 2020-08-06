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

    public function DisplayCompetitionregistration() {
        $query = 'SELECT `0108asap_comptitionregistration`.`id`, `id_0108asap_competiton`, `id_0108asap_membres`, '
                . '`id_0108asap_functions`,  `TypeOfCompetiton`, `NameOfTheTest`, `NumberDays`, `Observation`, DATE_FORMAT(`0108asap_sportsevents`. `DateOfTeste`,\'%d/%m/%Y\') AS `DateOfCompetition '
                . '`Name`, `Firstname`, `City`, `TypeOfLicence`   '
                . 'FROM `0108asap_comptitionregistration`'
                . 'INNER JOIN `0108asap_competiton` '
                . 'ON `0108asap_competiton`.`id`=`0108asap_comptitionregistration`.`id_0108asap_competiton`'
                . ' INNER JOIN  `0108asap_membres` '
                . 'ON `0108asap_membres`.`id`=`0108asap_comptitionregistration`.`id_0108asap_membres` '
                . 'INNER JOIN`0108asap_functions` '
                . ' ON `0108asap_functions`.`id`= `0108asap_comptitionregistration`.`id_0108asap_functions` '
                . 'INNER JOIN `0108asap_sportsevents`'
                . ' ON `0108asap_sportsevents`.`id`=`0108asap_competiton`.`id_0108asap_sportsevents`'
                . ' INNER JOIN `0108asap_typeofcompetition`'
                . ' ON `0108asap_typeofcompetition`.`id`=`0108asap_competiton`.`id_0108asap_typeofcompetition` '
                . 'INNER  JOIN `0108asap_categorycompetition` '
                . 'ON `0108asap_categorycompetition`.`id`=`0108asap_competiton`.`id_0108asap_categorycompetition`';
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->execute();
        return $queryResult->fetchAll(PDO::FETCH_OBJ);
    }

}
