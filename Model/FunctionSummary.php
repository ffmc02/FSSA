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
    public $LicencePrimary = 0;
    public $id0108asap_member = 0;
    public $pdo;

    public function __construct() {
//fonction de connexion a ma base de donnÃ©er 
        //ordi formation
        $this->pdo = dataBase::getIntance();


        // Sinon on affiche un message d'erreur
        //il les faut pour faire les transaction (3 prochaine methode)
    }

    //licence principal
    public function AddPrimaryLicense() {
        $query = 'INSERT INTO `0108asap_functionsummary`( `LicenceNumber`, `id_0108asap_member`, `id_0108asap_function`, `LicencePrimary`) '
                . 'VALUES (:LicenceNumber, :id_0108asap_member, :id_0108asap_function, :LicencePrimary)';
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->bindValue(':LicenceNumber', $this->LicenceNumber, PDO::PARAM_STR);
        $queryResult->bindValue(':id_0108asap_member', $this->id_0108asap_member, PDO::PARAM_INT);
        $queryResult->bindValue(':id_0108asap_function', $this->id_0108asap_function, PDO::PARAM_INT);
        $queryResult->bindValue(':LicencePrimary', $this->LicencePrimary, PDO::PARAM_INT);
//          //permet d'afficher la reguette excuter
//          $queryResult->debugDumpParams();
//    die();
        return $queryResult->execute();
    }

    public function VerifLicense() {
        $query = 'SELECT COUNT(`id_0108asap_member`)WHERE `id_0108asap_member`=:id0108asap_member';
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->bindValue(':id0108asap_member', $this->id0108asap_member, PDO::PARAM_INT);
        $queryResult->execute();
        return $queryResult->setFetchMode(PDO::FETCH_OBJ);
    }

    //licence principal
    public function DisplayPrimaryLicenses() {
        $query = 'SELECT '
//                . 'COUNT(`id_0108asap_member`), '
                . ' `LicenceNumber`, `id_0108asap_member`, `id_0108asap_function`, `LicencePrimary` '
                . 'FROM `0108asap_functionsummary`'
                . ' WHERE `id_0108asap_member`=:id0108asap_member && `LicencePrimary`=1 '
                . 'GROUP BY  `LicenceNumber`, `id_0108asap_member`, `id_0108asap_function`, `LicencePrimary`';
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->bindValue(':id0108asap_member', $this->id0108asap_member, PDO::PARAM_INT);
        $queryResult->execute();

        return $queryResult->fetchAll(PDO::FETCH_OBJ);
    }

    //licence principal
    public function PrimaryLicensesUsed() {
        $query = 'SELECT`0108asap_functionsummary`.`id` AS `IdSummary`, `0108asap_functionsummary`. `LicenceNumber` AS `SecondaryLicense`, `LicencePrimary`, `0108asap_functions`.`TypeOfLicence`, `0108asap_functionsummary`.`id_0108asap_member` AS `IdMembers` '
                . 'FROM `0108asap_functionsummary` '
                . 'INNER JOIN `0108asap_functions` '
                . 'ON `0108asap_functionsummary`.`id_0108asap_function`=`0108asap_functions`.`id`'
                . 'WHERE `LicencePrimary`=1 ';
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->execute();
        return $queryResult->fetchAll(PDO::FETCH_OBJ);
    }

    //licence principa
    public function ModifyTheMainLicense() {
        $query = 'UPDATE `0108asap_functionsummary` SET `LicenceNumber`=:LicenceNumber, `id_0108asap_function`=:id_0108asap_function WHERE `id`=:id';
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->bindValue(':LicenceNumber', $this->LicenceNumber, PDO::PARAM_STR);
        $queryResult->bindValue(':id', $this->id, PDO::PARAM_INT);
        $queryResult->bindValue(':id_0108asap_function', $this->id_0108asap_function, PDO::PARAM_INT);
        return $queryResult->execute();
    }

    //licence secondaire
    public function AddLicences() {
        $query = 'INSERT INTO `0108asap_functionsummary`( `LicenceNumber`, `id_0108asap_member`, `id_0108asap_function`) '
                . 'VALUES (:LicenceNumber, :id_0108asap_member, :id_0108asap_function)';
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->bindValue(':LicenceNumber', $this->LicenceNumber, PDO::PARAM_STR);
        $queryResult->bindValue(':id_0108asap_member', $this->id_0108asap_member, PDO::PARAM_INT);
        $queryResult->bindValue(':id_0108asap_function', $this->id_0108asap_function, PDO::PARAM_INT);
        return $queryResult->execute();
    }

//licence secpndaire
    public function DisplayOfAllLicenses() {
        $query = 'SELECT`0108asap_functionsummary`.`id` AS `IdSummary`, `0108asap_functionsummary`.`LicenceNumber` AS `SecondaryLicense`, `LicencePrimary`, `0108asap_functions`.`TypeOfLicence`, `0108asap_functionsummary`.`id_0108asap_member` AS `IdMembers` '
                . 'FROM `0108asap_functionsummary` '
                . 'INNER JOIN `0108asap_functions` '
                . 'ON `0108asap_functionsummary`.`id_0108asap_function`=`0108asap_functions`.`id`'
                . 'WHERE `LicencePrimary`=0 ';
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->execute();
        return $queryResult->fetchAll(PDO::FETCH_OBJ);
    }

//licence secpndaire
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

//licence secpndaire
    public function DeleteALicense() {
        $query = 'DELETE FROM `0108asap_functionsummary` WHERE `id`=:id';
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $queryResult->execute();
    }

    public function LicenseModifyByTheManagement() {
        $query = 'UPDATE `0108asap_functionsummary` SET `id_0108asap_function`=:id_0108asap_function WHERE `id`=:id';
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->bindValue(':id', $this->id, PDO::PARAM_INT);
        $queryResult->bindValue(':id_0108asap_function', $this->id_0108asap_function, PDO::PARAM_INT);
        return $queryResult->execute();
    }

}
