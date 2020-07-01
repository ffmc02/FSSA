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
    public $Email='';
    public $Password = '';
    public $Cle = '';
    public $Address = '';
    public $ZipCode = 0;
    public $City = '';
    public $AsaCode = '0';
    public $LicenceNumber = '0';
    public $Actif = false;

    public function __construct() {
//fonction de connexion a ma base de donnéer 
        //ordi formation
        $this->pdo = dataBase::getIntance();


        // Sinon on affiche un message d'erreur
        //il les faut pour faire les transaction (3 prochaine methode)
    }

    public function newMember() {
        $query = 'INSERT INTO `0108asap_membres`( `Name`, `Firstname`, `Email`, `Password`, `Cle`, `Actif`, `Address`, `ZipCode`, `City`, `AsaCode`, `LicenceNumber`) '
                . 'VALUES (:Name, :Firstname, :Email, :Password, :Cle, :Actif, :Address, :ZipCode, :City, :AsaCode, :LicenceNumber)';
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
        //  //permet d'afficher la reguette excuter
//          $queryResult->debugDumpParams();
//    die();
        //execution de la requette préparer:
        return $queryResult->execute();
    }
public function connexionMembers(){
    
}
}
