<?php

/**
 * Description of membres
 *
 * @author gaeta
 */
class membres {

    public $pdo;
    public $id = 0;
    public $Name = '';
    public $Firstname = '';
    public $Email = '';
    public $Password = '';
    public $Cle = '';
    public $Address = '';
    public $ZipCode = 0;
    public $City = '';
    public $AsaCode = '0';
    public $LicenceNumber = '0';
    public $Actif = false;
    public $id_0108asap_functions = 0;
    public $TypeOfLicence='';

    public function __construct() {
//fonction de connexion a ma base de donnéer 
        //ordi formation
        $this->pdo = dataBase::getIntance();


        // Sinon on affiche un message d'erreur
        //il les faut pour faire les transaction (3 prochaine methode)
    }

    public function newMember() {
        $query = 'INSERT INTO `0108asap_membres`( `Name`, `Firstname`, `Email`, `Password`, `Cle`, `Actif`, `Address`, `ZipCode`, `City`, `AsaCode`, `LicenceNumber`, `id_0108asap_functions`) '
                . 'VALUES (:Name, :Firstname, :Email, :Password, :Cle, :Actif, :Address, :ZipCode, :City, :AsaCode, :LicenceNumber, :id_0108asap_functions)';
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->bindValue(':Name', $this->Name, PDO::PARAM_STR);
        $queryResult->bindValue(':Firstname', $this->Firstname, PDO::PARAM_STR);
        $queryResult->bindValue(':Email', $this->Email, PDO::PARAM_STR);
        $queryResult->bindValue(':Password', $this->Password, PDO::PARAM_STR);
        $queryResult->bindValue(':Cle', $this->Cle, PDO::PARAM_STR);
        $queryResult->bindValue(':Actif', $this->Actif, PDO::PARAM_STR);
        $queryResult->bindValue(':Address', $this->Address, PDO::PARAM_STR);
        $queryResult->bindValue(':ZipCode', $this->ZipCode, PDO::PARAM_INT);
        $queryResult->bindValue(':City', $this->City, PDO::PARAM_STR);
        $queryResult->bindValue(':AsaCode', $this->AsaCode, PDO::PARAM_STR);
        $queryResult->bindValue(':LicenceNumber', $this->LicenceNumber, PDO::PARAM_STR);
        $queryResult->bindValue(':id_0108asap_functions', $this->id_0108asap_functions, PDO::PARAM_INT);
        //  //permet d'afficher la reguette excuter
//          $queryResult->debugDumpParams();
//    die();
        //execution de la requette préparer:
        return $queryResult->execute();
    }

    public function connexionMembers() {
        $query = 'SELECT COUNT(`id`)AS `CountMembers` , `id`, `Name`, `Firstname`, `Email`, `Password`, `LicenceNumber`'
                . ', `id_0108asap_functions` '
                . ' FROM `0108asap_membres`'
                . ' WHERE `Email`= :Email '
                . 'GROUP BY `id`, `Email`, `Name`, `Firstname`, `Password`, `LicenceNumber`'
                . ', `id_0108asap_functions`'
                . '';
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->bindValue(':Email', $this->Email, PDO::PARAM_STR);
        $queryResult->execute();
        return $queryResult->fetch(PDO::FETCH_OBJ);
    }
    public function MemberProfile(){
       $query='SELECT `0108asap_membres`.`id` AS `IdMembers`, `Name`, `Firstname`, `Email`, `Address`, `ZipCode`, `City`, `AsaCode`, `LicenceNumber`, `id_0108asap_functions` , `TypeOfLicence` '
               . 'FROM `0108asap_membres`'
               . ' INNER JOIN 0108asap_functions'
               . ' ON `id_0108asap_functions`=0108asap_functions.`id` '
               . ''; 
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->execute();
        return $queryResult->fetchAll(PDO::FETCH_OBJ);
    }

}
