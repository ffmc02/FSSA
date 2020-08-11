<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of cars
 *
 * @author gaeta
 */
class cars {

    public $pdo;
    public $NomberOfOccupant = 0;
    public $Mark = '';
    public $Model = '';
    public $Category = '';
    public $Classroom = '';
    public $id_0108ASAP_membres = 0;

    public function __construct() {
//fonction de connexion a ma base de donnÃ©er 
        //ordi formation
        $this->pdo = dataBase::getIntance();


        // Sinon on affiche un message d'erreur
        //il les faut pour faire les transaction (3 prochaine methode)
    }

    public function ListOfCars() {
        $query = 'SELECT `0108asap_cars`.`id`, `NomberOfOccupant` AS `NombreDOccupant`, `Mark` AS `Marque`, `Model`,'
                . ' `Category`AS `Categorie`, `Classroom`AS `Classe`, `id_0108ASAP_membres`, `0108asap_membres`.`Name`AS `NomsPilote`, '
                . '`0108asap_membres`.`Firstname` AS `PrenomPilote` '
                . 'FROM `0108asap_cars` '
                . 'INNER JOIN `0108asap_membres` '
                . 'ON `0108asap_membres`.`id`=`0108asap_cars`.`id_0108ASAP_membres` ';
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->execute();
        return $queryResult->fetchAll(PDO::FETCH_OBJ);
    }

    public function AddCars() {
        $query = 'INSERT INTO `0108asap_cars`( `NomberOfOccupant`, `Mark`, `Model`, `Category`, `Classroom`, `id_0108ASAP_membres`) VALUES'
                . '(:NomberOfOccupant, :Mark, :Model,  :Category, :Classroom, :id_0108ASAP_membres)';
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->bindValue(':NomberOfOccupant', $this->NomberOfOccupant, PDO::PARAM_INT);
        $queryResult->bindValue(':Mark', $this->Mark, PDO::PARAM_STR);
        $queryResult->bindValue(':Model', $this->Model, PDO::PARAM_STR);
        $queryResult->bindValue(':Category', $this->Category, PDO::PARAM_STR);
        $queryResult->bindValue(':Classroom', $this->Classroom, PDO::PARAM_STR);
        $queryResult->bindValue(':id_0108ASAP_membres', $this->id_0108ASAP_membres, PDO::PARAM_INT);
                //  //permet d'afficher la reguette excuter
//          $queryResult->debugDumpParams();
//    die();
        //execution de la requette préparer:
        return $queryResult->execute();
    }

}
