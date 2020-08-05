<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CategoryCompetition
 *
 * @author gaeta
 */
class CategoryCompetition {

    public $pdo;
    public $id = 0;
    public $CategoryCompetition = '';

    public function __construct() {
//fonction de connexion a ma base de donnÃ©er 
        //ordi formation
        $this->pdo = dataBase::getIntance();


        // Sinon on affiche un message d'erreur
        //il les faut pour faire les transaction (3 prochaine methode)
    }
//affichage des categorie de compétion (rallye, cource de cote etc)
     public function lastInsertIdCategoryCompetition() {
        return $this->pdo->db->lastInsertId();
    }
    public function DisplayCategoryCompetition() {
        $query = 'SELECT `id`, `CategoryCompetition` FROM `0108asap_categorycompetition`';
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->execute();
        return $queryResult->fetchAll(PDO::FETCH_OBJ);
    }

}
