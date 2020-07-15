<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Functionsummary
 *
 * @author gaeta
 */
class FunctionSummary {

    public $id = 0;
    public $LicenceNumber = '0';
    public $id_0108asap_member = 0;
    public $id_0108asap_function = 0;
    public $pdo;

    public function __construct() {
//fonction de connexion a ma base de donnÃ©er 
        //ordi formation
        $this->pdo = dataBase::getIntance();


        // Sinon on affiche un message d'erreur
        //il les faut pour faire les transaction (3 prochaine methode)
    }

    public function AddLicences() {
        $query = 'INSERT INTO `0108asap_functionsummary`( `LicenceNumber`, `id_0108asap_member`, `id_0108asap_function`) '
                . 'VALUES (:LicenceNumber, :id_0108asap_member, :id_0108asap_function)';
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->bindValue(':LicenceNumber', $this->LicenceNumber, PDO::PARAM_STR);
        $queryResult->bindValue(':id_0108asap_member', $this->id_0108asap_member, PDO::PARAM_INT);
        $queryResult->bindValue(':id_0108asap_function', $this->id_0108asap_function, PDO::PARAM_INT);
        return $queryResult->execute();
    }

    public function DisplayOfAllLicenses() {
        $query = 'SELECT`0108asap_functionsummary`.`id` AS `IdSummary`, `0108asap_functionsummary`.`LicenceNumber` AS `SecondaryLicense`, `0108asap_functions`.`TypeOfLicence`, `0108asap_functionsummary`.`id_0108asap_member` AS `IdMembers` '
                . 'FROM `0108asap_functionsummary` '
                . 'INNER JOIN `0108asap_functions` '
                . 'ON `0108asap_functionsummary`.`id_0108asap_function`=`0108asap_functions`.`id`';
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->execute();
        return $queryResult->fetchAll(PDO::FETCH_OBJ);
    }

    public function Licensing() {
        $query = 'UPDATE `0108asap_functionsummary`'
                . ' SET `LicenceNumber`=:LicenceNumber,`id_0108asap_member`=:id_0108asap_member,`id_0108asap_function`=:id_0108asap_function'
                . ' WHERE `id`=:id';
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->bindValue(':id', $this->id, PDO::PARAM_INT);
        $queryResult->bindValue(':LicenceNumber', $this->LicenceNumber, PDO::PARAM_STR);
        $queryResult->bindValue(':id_0108asap_member', $this->id_0108asap_member, PDO::PARAM_INT);
        $queryResult->bindValue(':id_0108asap_function', $this->id_0108asap_function, PDO::PARAM_INT);
        return $queryResult->execute();
    }

    public function DeleteALicense() {
        $query = 'DELETE FROM `0108asap_functionsummary` WHERE `id`=:id';
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $queryResult->execute();
    }

}
