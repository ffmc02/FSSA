<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of registrationforofficial
 *
 * @author gaeta
 */
class Registrationforofficial {

    public $pdo;
    public $ResponseDatePcNeed1 = '';
    public $ResponseDatePcNeed2 = '';
    public $ResponseDatePcNeed3 = '';
    public $AvaibleDateNeedForTheCommissioner1 = '';
    public $AvaibleDateNeedForTheCommissioner2 = '';
    public $AvaibleDateNeedForTheCommissioner3 = '';
    public $Accommodation = '';
    public $id_0108asap_competiton = 0;
    public $id_0108asap_membres = 0;
    public $id_0108asap_functions = 0;
    public $idCompet = 0;

    public function __construct() {
//fonction de connexion a ma base de donnÃ©er 
//ordi formation
        $this->pdo = dataBase::getIntance();


// Sinon on affiche un message d'erreur
//il les faut pour faire les transaction (3 prochaine methode)
    }

    public function AddOffical() {
        $query = 'INSERT INTO `0108asap_registrationforofficials`'
                . '( `ResponseDatePcNeed1`, `ResponseDatePcNeed2`, `ResponseDatePcNeed3`, '
                . '`AvaibleDateNeedForTheCommissioner1`, `AvaibleDateNeedForTheCommissioner2`, `AvaibleDateNeedForTheCommissioner3`,'
                . ' `Accommodation`, `id_0108asap_competiton`, `id_0108asap_membres`, `id_0108asap_functions`) '
                . 'VALUES (:ResponseDatePcNeed1, :ResponseDatePcNeed2, :ResponseDatePcNeed3, '
                . ':AvaibleDateNeedForTheCommissioner1, :AvaibleDateNeedForTheCommissioner2, :AvaibleDateNeedForTheCommissioner3, '
                . ':Accommodation, :id_0108asap_competiton, :id_0108asap_membres, :id_0108asap_functions)';
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->bindValue(':ResponseDatePcNeed1', $this->ResponseDatePcNeed1, PDO::PARAM_STR);
        $queryResult->bindValue(':ResponseDatePcNeed2', $this->ResponseDatePcNeed2, PDO::PARAM_STR);
        $queryResult->bindValue(':ResponseDatePcNeed3', $this->ResponseDatePcNeed3, PDO::PARAM_STR);
        $queryResult->bindValue(':AvaibleDateNeedForTheCommissioner1', $this->AvaibleDateNeedForTheCommissioner1, PDO::PARAM_STR);
        $queryResult->bindValue(':AvaibleDateNeedForTheCommissioner2', $this->AvaibleDateNeedForTheCommissioner2, PDO::PARAM_STR);
        $queryResult->bindValue(':AvaibleDateNeedForTheCommissioner3', $this->AvaibleDateNeedForTheCommissioner3, PDO::PARAM_STR);
        $queryResult->bindValue(':Accommodation', $this->Accommodation, PDO::PARAM_STR);
        $queryResult->bindValue(':id_0108asap_competiton', $this->id_0108asap_competiton, PDO::PARAM_INT);
        $queryResult->bindValue(':id_0108asap_membres', $this->id_0108asap_membres, PDO::PARAM_INT);
        $queryResult->bindValue(':id_0108asap_functions', $this->id_0108asap_functions, PDO::PARAM_INT);
        return $queryResult->execute();
    }

    public function CheckRegistrerOfficial() {
        $query = 'SELECT  `id_0108asap_membres` AS `OfficialExists`, `id`, `id_0108asap_competiton`'
                . ' FROM `0108asap_registrationforofficials`'
                . ' WHERE `id_0108asap_membres`=:id_0108asap_membres'
                . ' GROUP BY `id_0108asap_membres`, `id`, `id_0108asap_competiton`';
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->bindValue(':id_0108asap_membres', $this->id_0108asap_membres, PDO::PARAM_INT);
        return $queryResult->execute();
        $queryResult->execute();
        return $queryResult->fetch(PDO::FETCH_OBJ);
    }

    public function DisplayRegistredOfficial() {
        $query = 'SELECT `0108asap_registrationforofficials`.`id`, '
                . ' DATE_FORMAT(`0108asap_rally`. `DatePcNeed1`,\'%d/%m/%Y\') AS `BesoinPC1`,'
                . ' DATE_FORMAT(`0108asap_rally`. `DatePcNeed2`,\'%d/%m/%Y\') AS `BesoinPC2`, '
                . 'DATE_FORMAT(`0108asap_rally`. `DatePcNeed3`,\'%d/%m/%Y\') AS `BesoinPC3`, '
                . ' DATE_FORMAT(`0108asap_rally`. `DateNeedForTheCommissioner1`,\'%d/%m/%Y\') AS `BesoinSite1`,'
                . ' DATE_FORMAT(`0108asap_rally`. `DateNeedForTheCommissioner2`,\'%d/%m/%Y\') AS `BesoinSite2`, '
                . 'DATE_FORMAT(`0108asap_rally`. `DateNeedForTheCommissioner3`,\'%d/%m/%Y\') AS `BesoinSite3`,'
                . 'DATE_FORMAT(`0108asap_sportsevents`. `DateOfTeste`,\'%d/%m/%Y\') AS `StartDate`,'
                . ' `ResponseDatePcNeed1`, '
                . '`ResponseDatePcNeed2`, '
                . '`ResponseDatePcNeed3`, '
                . '`AvaibleDateNeedForTheCommissioner1`, '
                . '`AvaibleDateNeedForTheCommissioner2`, '
                . '`AvaibleDateNeedForTheCommissioner3`, '
                . '`Accommodation`, '
                . '`0108asap_functions`.`TypeOfLicence`, '
                . '`0108asap_registrationforofficials`.`id_0108asap_competiton`, '
                . ' `0108asap_sportsevents`.`NameOfTheTest`, '
                . '`id_0108asap_membres` AS `IdMembers`, '
                . '`0108asap_membres`.`Name`,'
                . ' `0108asap_membres`.`Firstname`, '
                . '`0108asap_sportsevents`.`Location_Circuit`,'
                . ' `0108asap_categorycompetition`.`CategoryCompetition`, '
                . ' `0108asap_sportsevents`.`DateOfTeste` '
                . 'FROM `0108asap_registrationforofficials`'
                . ' INNER JOIN `0108asap_competiton`'
                . ' ON `0108asap_competiton`.`id` = `0108asap_registrationforofficials`.`id_0108asap_competiton` '
                . ' INNER JOIN `0108asap_functions` '
                . 'ON `0108asap_functions`.`id`= `0108asap_registrationforofficials`.`id_0108asap_functions`  '
                . 'INNER JOIN `0108asap_membres` '
                . 'ON `0108asap_registrationforofficials`.`id_0108asap_membres`= `0108asap_membres`.`id` '
                . 'INNER JOIN `0108asap_categorycompetition`'
                . ' ON `0108asap_categorycompetition`.`id`= `0108asap_competiton`.`id_0108asap_categorycompetition`'
                . ' INNER JOIN `0108asap_sportsevents`'
                . ' ON `0108asap_sportsevents`.`id`=`0108asap_competiton`.`id_0108asap_sportsevents` '
                . 'INNER JOIN `0108asap_typeofcompetition`'
                . ' ON `0108asap_typeofcompetition`.`id`=`0108asap_competiton`.`id_0108asap_typeofcompetition`'
                . ' INNER JOIN `0108asap_rally` '
                . 'ON `0108asap_rally`.`id_0108asap_competiton`= `0108asap_competiton`.`id`'
                . '';

        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->execute();
        return $queryResult->fetchAll(PDO::FETCH_OBJ);
    }

    public function DisplayListOfficialsByCompetition() {
        $query = 'SELECT  `0108asap_competiton`.`id`,'
                . '`0108asap_registrationforofficials`.`id` AS `IdRegistrationforofficials`,'
                . '`ResponseDatePcNeed1`, '
                . '`ResponseDatePcNeed2`, '
                . '`ResponseDatePcNeed3`, '
                . '`AvaibleDateNeedForTheCommissioner1`, '
                . '`AvaibleDateNeedForTheCommissioner2`, '
                . ' `AvaibleDateNeedForTheCommissioner3`, '
                . ' `Accommodation`, '
                . '`0108asap_functions`.`TypeOfLicence`, '
                . ' `0108asap_sportsevents`.`NameOfTheTest`,'
                . ' `0108asap_membres`.`Name`, '
                . '`0108asap_membres`.`Firstname` '
                . 'FROM `0108asap_registrationforofficials` '
                . 'INNER JOIN `0108asap_competiton` '
                . 'ON `0108asap_competiton`.`id` = `0108asap_registrationforofficials`.`id_0108asap_competiton` '
                . ' INNER JOIN `0108asap_functions` '
                . 'ON `0108asap_functions`.`id`= `0108asap_registrationforofficials`.`id_0108asap_functions`  '
                . 'INNER JOIN `0108asap_membres` '
                . 'ON `0108asap_registrationforofficials`.`id_0108asap_membres`= `0108asap_membres`.`id` '
                . 'INNER JOIN `0108asap_categorycompetition` '
                . ' ON `0108asap_categorycompetition`.`id`= `0108asap_competiton`.`id_0108asap_categorycompetition` '
                . 'INNER JOIN `0108asap_sportsevents` '
                . 'ON `0108asap_sportsevents`.`id`=`0108asap_competiton`.`id_0108asap_sportsevents` '
                . 'INNER JOIN `0108asap_typeofcompetition` '
                . 'ON `0108asap_typeofcompetition`.`id`=`0108asap_competiton`.`id_0108asap_typeofcompetition` '
                . 'INNER JOIN `0108asap_rally` '
                . 'ON `0108asap_rally`.`id_0108asap_competiton`= `0108asap_competiton`.`id`'
                . 'WHERE `0108asap_competiton`.`id`=:idCompet ';

        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->bindValue(':idCompet', $this->idCompet, PDO::PARAM_INT);
        $queryResult->execute();
        return $queryResult->fetchAll(PDO::FETCH_OBJ);
    }
public function NameOfTest(){
    $query = 'SELECT `id_0108asap_competiton`,'
            . ' `0108asap_sportsevents`.`NameOfTheTest` '
            . ' FROM `0108asap_registrationforofficials`'
            . ' INNER JOIN `0108asap_competiton`'
            . ' ON  `0108asap_competiton`.`id`=`0108asap_registrationforofficials`.`id_0108asap_competiton` '
            . 'INNER JOIN `0108asap_sportsevents` '
            . 'ON `0108asap_sportsevents`.`id`= `0108asap_competiton`.`id_0108asap_sportsevents`'
            .'WHERE `0108asap_competiton`.`id`=:idCompet ';

        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->bindValue(':idCompet', $this->idCompet, PDO::PARAM_INT);
        $queryResult->execute();
        return $queryResult->fetch(PDO::FETCH_OBJ);
}
}
