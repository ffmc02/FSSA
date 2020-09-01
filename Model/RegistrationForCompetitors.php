<?php

class RegistrationForCompetitors {

    public $pdo;
    public $id_0108asap_cars = 0;
    public $id_0108asap_competiton = 0;
    public $id_0108asap_functionsPilot = 15;
    public $id_0108asap_membres = 0;
    public $Copilot = 0;
    public $id_0108asap_functionsCopilote = 16;
    public $id = 0;
    public $idCompet=0;

    public function __construct() {
//fonction de connexion a ma base de donnÃ©er 
        //ordi formation
        $this->pdo = dataBase::getIntance();


        // Sinon on affiche un message d'erreur
        //il les faut pour faire les transaction (3 prochaine methode)
    }

    public function AddCompetitorForRace() {
        $query = 'INSERT INTO `0108asap_registrationforcompetitors`( `id_0108asap_cars`, `id_0108asap_competiton`, '
                . '`id_0108asap_functionsPilot`, `id_0108asap_membres`, `Copilot`,  `id_0108asap_functionsCopilote`) '
                . 'VALUES '
                . '(:id_0108asap_cars, :id_0108asap_competiton, :id_0108asap_functionsPilot, :id_0108asap_membres, :Copilot,  :id_0108asap_functionsCopilote)';
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->bindValue(':id_0108asap_cars', $this->id_0108asap_cars, PDO::PARAM_INT);
        $queryResult->bindValue(':id_0108asap_competiton', $this->id_0108asap_competiton, PDO::PARAM_INT);
        $queryResult->bindValue(':id_0108asap_functionsPilot', $this->id_0108asap_functionsPilot, PDO::PARAM_INT);
        $queryResult->bindValue(':id_0108asap_membres', $this->id_0108asap_membres, PDO::PARAM_INT);
        $queryResult->bindValue(':Copilot', $this->Copilot, PDO::PARAM_INT);
        $queryResult->bindValue(':id_0108asap_functionsCopilote', $this->id_0108asap_functionsCopilote, PDO::PARAM_INT);
        return $queryResult->execute();
    }

    public function DisplayOfCompetitors() {
        $query = 'SELECT `0108asap_registrationforcompetitors`.`id`, `id_0108asap_cars`, `id_0108asap_competiton`, `id_0108asap_functionsPilot`, '
                . '`Mark`, `Model`, `Category`, `Classroom`, `0108asap_sportsevents`.`NameOfTheTest` '
                . '`0108asap_registrationforcompetitors`.`id_0108asap_membres`, `Copilot`, `id_0108asap_functionsCopilote`, '
                . '`0108asap_membres`.`Name`, `0108asap_membres`.`Firstname`, `0108asap_membres`.`id` AS `UserId`,  `NameOfTheTest` FROM `0108asap_registrationforcompetitors` '
                . 'INNER JOIN `0108asap_cars` '
                . 'ON `0108asap_cars`.`id`=`0108asap_registrationforcompetitors`.`id_0108asap_cars` '
                . 'INNER JOIN `0108asap_competiton` '
                . 'ON `0108asap_competiton`.`id`=`0108asap_registrationforcompetitors`.`id_0108asap_competiton`'
                . 'INNER JOIN `0108asap_sportsevents`'
                . 'ON `0108asap_sportsevents`.`id` =`0108asap_competiton`.`id_0108asap_sportsevents` '
                . 'INNER JOIN `0108asap_functions` '
                . 'ON `0108asap_functions`.`id`=`0108asap_registrationforcompetitors`.`id_0108asap_functionsPilot` '
                . 'INNER JOIN `0108asap_membres` '
                . 'ON `0108asap_membres`.`id`=`0108asap_registrationforcompetitors`.`id_0108asap_membres` '
                . 'INNER JOIN `0108asap_sportsevents` '
                . 'ON `0108asap_sportsevents`.`id`=`0108asap_competiton`.`id_0108asap_sportsevents`'
                . 'WHERE `0108asap_registrationforcompetitors`.`id`';
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->execute();
        return $queryResult->fetchAll(PDO::FETCH_OBJ);
    }

    public function DisplayOfCompitiorsForCompetiton() {
        $query = 'SELECT '
                . '`0108asap_registrationforcompetitors`.`id`, '
                . '`id_0108asap_cars`, '
                . '`id_0108asap_competiton`, '
                . '`id_0108asap_functionsPilot`, '
                . '`Mark`, '
                . '`Model`,'
                . '  `Category`, '
                . '`Classroom`, '
                . '`0108asap_registrationforcompetitors`.`id_0108asap_membres`, '
                . '`Copilot`,  '
                . '`id_0108asap_functionsCopilote`, '
                . ' `0108asap_membres`.`Name`, '
                . '`0108asap_membres`.`Firstname`, '
                . '`0108asap_membres`.`id` AS `UserId`, '
                . '`NameOfTheTest` '
                . 'FROM `0108asap_registrationforcompetitors` '
                . 'INNER JOIN `0108asap_cars`  '
                . 'ON `0108asap_cars`.`id`=`0108asap_registrationforcompetitors`.`id_0108asap_cars` '
                . 'INNER JOIN `0108asap_competiton` '
                . 'ON `0108asap_competiton`.`id`=`0108asap_registrationforcompetitors`.`id_0108asap_competiton`'
                . ' INNER JOIN `0108asap_functions`  '
                . 'ON `0108asap_functions`.`id`=`0108asap_registrationforcompetitors`.`id_0108asap_functionsPilot` '
                . 'INNER JOIN `0108asap_membres`  '
                . 'ON `0108asap_membres`.`id`=`0108asap_registrationforcompetitors`.`id_0108asap_membres` '
                . 'INNER JOIN `0108asap_sportsevents` '
                . 'ON `0108asap_sportsevents`.`id`=`0108asap_competiton`.`id_0108asap_sportsevents` '
                . 'WHERE `id_0108asap_competiton`=:id_0108asap_competiton '
                . '';
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->execute();
        return $queryResult->fetchAll(PDO::FETCH_OBJ);
        
//        $queryResult = $this->pdo->db->prepare($query);
//        $queryResult->bindValue(':id_0108asap_competiton', $this->id_0108asap_competiton, PDO::PARAM_INT);
//         $queryResult->execute();
//        return $queryResult->fetchAll(PDO::FETCH_OBJ);
    }

    public function NameOfTest(){
        $query='SELECT  `id_0108asap_competiton`, '
                . '`NameOfTheTest` '
                . 'FROM `0108asap_registrationforcompetitors`'
                . ' INNER JOIN `0108asap_competiton`'
                . ' ON `0108asap_competiton`.`id` = `0108asap_registrationforcompetitors`.`id_0108asap_competiton` '
                . 'INNER JOIN `0108asap_sportsevents` '
                . 'ON `0108asap_sportsevents`.`id`=`0108asap_competiton`.`id_0108asap_sportsevents`'
                .'WHERE `0108asap_competiton`.`id`=:idCompet ';

        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->bindValue(':idCompet', $this->idCompet, PDO::PARAM_INT);
        $queryResult->execute();
        return $queryResult->fetch(PDO::FETCH_OBJ);
    }
}
