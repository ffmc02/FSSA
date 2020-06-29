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
    public $City = '';
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
        $queryResult->bindValue(':name', $this->name, PDO::PARAM_STR);
        $queryResult->bindValue(':Firstname', $this->Firstname, PDO::PARAM_STR);
        $queryResult->bindValue(':password', $this->password, PDO::PARAM_STR);
        $queryResult->bindValue(':cle', $this->cle, PDO::PARAM_STR);
        $queryResult->bindValue(':adress', $this->adress, PDO::PARAM_STR);
        $queryResult->bindValue(':ZipeCode', $this->ZipeCode, PDO::PARAM_INT);
        $queryResult->bindValue(':City', $this->City, PDO::PARAM_STR);
        $queryResult->bindValue(':AsaCode', $this->AsaCode, PDO::PARAM_INT);
        $queryResult->bindValue(':LicenceNumber', $this->LicenceNumber, PDO::PARAM_INT);
        return $queryResult->execute();
    }

}
