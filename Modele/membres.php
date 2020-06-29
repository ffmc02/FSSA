<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of membres
 *
 * @author gaeta
 */
class membres {

    public $id = 0;
    public $name = '';
    public $firstname = '';
    public $password = '';
    public $cle = '';
    public $adress = '';
    public $ZipeCode = 0;
    public $city = '';
    public $AsaCode = 0;
    public $LicenceNumber = 0;
    public $Actif = false;

    public function __construct() {
//fonction de connexion a ma base de donnéer 
        //ordi formation
        $this->pdo = dataBase::getIntance();


        // Sinon on affiche un message d'erreur
        //il les faut pour faire les transaction (3 prochaine methode)
    }

    public function newMember() {
        $query = 'INSER INTO  `0108asap_membres` '
                . '(`name`, `Firstname`, `password`, `cle`,  `adress`, `ZipeCode`, `City`, `AsaCode`, `LicenceNumber`)'
                . 'VALUES (`:name`, `:Firstname`, `:password`, `:cle`,  `:adress`, `:ZipeCode`, `:City`, `:AsaCode`, `:LicenceNumber`)';
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->bindValue(':name', $this->title, PDO::PARAM_STR);
        $queryResult->bindValue(':Firstname', $this->title, PDO::PARAM_STR);
        $queryResult->bindValue(':password', $this->title, PDO::PARAM_STR);
        $queryResult->bindValue(':cle', $this->title, PDO::PARAM_STR);
        $queryResult->bindValue(':adress', $this->title, PDO::PARAM_STR);
        $queryResult->bindValue(':ZipeCode', $this->idExtraUrban, PDO::PARAM_INT);
        $queryResult->bindValue(':City', $this->title, PDO::PARAM_STR);
        $queryResult->bindValue(':AsaCode', $this->idExtraUrban, PDO::PARAM_INT);
        $queryResult->bindValue(':LicenceNumber', $this->idExtraUrban, PDO::PARAM_INT);
        return $queryResult->execute();
    }

}
