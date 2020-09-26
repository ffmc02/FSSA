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
    public $ZipCode = '0';
    public $City = '';
    public $AsaCode = '0';
    public $AsaName = '';
    public $Actif = false;
    public $id_0108asap_functions = 0;
    public $PliotID = 0;
    public $TypeOfLicence = '';

    public function __construct() {
//fonction de connexion a ma base de donnéer 
        //ordi formation
        $this->pdo = dataBase::getIntance();


        // Sinon on affiche un message d'erreur
        //il les faut pour faire les transaction (3 prochaine methode)
    }

    public function lastInsertId() {
        return $this->pdo->db->lastInsertId();
    }

    public function newMember() {
        $query = 'INSERT INTO `0108asap_membres`( `Name`, `Firstname`, `Email`, `Password`, `Cle`, `Actif`, `Address`, `ZipCode`, `City`, `AsaCode`, `AsaName`) '
                . 'VALUES (:Name, :Firstname, :Email, :Password, :Cle, :Actif, :Address, :ZipCode, :City, :AsaCode, :AsaName)';
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->bindValue(':Name', $this->Name, PDO::PARAM_STR);
        $queryResult->bindValue(':Firstname', $this->Firstname, PDO::PARAM_STR);
        $queryResult->bindValue(':Email', $this->Email, PDO::PARAM_STR);
        $queryResult->bindValue(':Password', $this->Password, PDO::PARAM_STR);
        $queryResult->bindValue(':Cle', $this->Cle, PDO::PARAM_STR);
        $queryResult->bindValue(':Actif', $this->Actif, PDO::PARAM_STR);
        $queryResult->bindValue(':Address', $this->Address, PDO::PARAM_STR);
        $queryResult->bindValue(':ZipCode', $this->ZipCode, PDO::PARAM_STR);
        $queryResult->bindValue(':City', $this->City, PDO::PARAM_STR);
        $queryResult->bindValue(':AsaCode', $this->AsaCode, PDO::PARAM_STR);
        $queryResult->bindValue(':AsaName', $this->AsaName, PDO::PARAM_STR);
        //  //permet d'afficher la reguette excuter
//          $queryResult->debugDumpParams();
//    die();
        //execution de la requette préparer:
        return $queryResult->execute();
    }

    public function ConnexionMembers() {
        $query = 'SELECT `id` AS `CountMembers` , `id`, `Name`, `Firstname`, `Email`, `Password`,`AsaName`,`AsaCode`FROM `0108asap_membres`'
                . 'WHERE `Email`= :Email '
                . 'GROUP BY `id`, `Email`, `Name`, `Firstname`, `Password`,`AsaCode`,`AsaName`'
                . '';
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->bindValue(':Email', $this->Email, PDO::PARAM_STR);
        $queryResult->execute();
        return $queryResult->fetch(PDO::FETCH_OBJ);
    }

    public function MemberExist() {
        $query = 'SELECT `Email` AS MemberExist FROM `0108asap_membres` WHERE `Email`=:Email';
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->bindValue(':Email', $this->Email, PDO::PARAM_STR);
        $queryResult->execute();
        if ($queryResult->rowCount() == 1) {
            return true;
        } else {
            return false;
        }
    }

    public function MemberProfile() {
        $query = 'SELECT `0108asap_membres`.`id` AS `IdMembers`, `Name`, `Firstname`, `Email`, `Address`, `ZipCode`, `City`, `AsaCode`, `AsaName` , '
                . '`TypeOfLicence` '
                . 'FROM `0108asap_membres '
                . '`INNER JOIN 0108asap_functionsummary '
                . 'ON`0108asap_functionsummary`.`id_0108asap_member`=`0108asap_membres`.`id` '
                . 'INNER JOIN  0108asap_functions '
                . 'ON `0108asap_functionsummary`.`id_0108asap_function`= `0108asap_functions`.`id`'
                . ' WHERE `LicencePrimary`=1 '
                . '';
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->execute();
        return $queryResult->fetchAll(PDO::FETCH_OBJ);
    }

    public function UserProfil() {
        $query = 'SELECT `id`, `Name`, `Firstname`, `Email`, `Address`, `ZipCode`, `City`, `AsaCode`, `AsaName` '
                . 'FROM `0108asap_membres`'
                . '';
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->execute();
        return $queryResult->fetchAll(PDO::FETCH_OBJ);
    }

    public function ProfilEdditing() {
        $query = 'UPDATE `0108asap_membres` '
                . ''
                . 'SET `Name`=:Name, `Firstname`=:Firstname,`Email`=:Email, `Address`=:Address, `ZipCode`=:ZipCode,`City`=:City,`AsaCode`=:AsaCode,`AsaName`=:AsaName '
                . 'WHERE `id`=:id'
                . '';
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->bindValue(':id', $this->id, PDO::PARAM_INT);
        $queryResult->bindValue(':Name', $this->Name, PDO::PARAM_STR);
        $queryResult->bindValue(':Firstname', $this->Firstname, PDO::PARAM_STR);
        $queryResult->bindValue(':Email', $this->Email, PDO::PARAM_STR);
        $queryResult->bindValue(':Address', $this->Address, PDO::PARAM_STR);
        $queryResult->bindValue(':ZipCode', $this->ZipCode, PDO::PARAM_INT);
        $queryResult->bindValue(':City', $this->City, PDO::PARAM_STR);
        $queryResult->bindValue(':AsaCode', $this->AsaCode, PDO::PARAM_STR);
        $queryResult->bindValue(':AsaName', $this->AsaName, PDO::PARAM_STR);
        //permet d'afficher la reguette excuter
//          $queryResult->debugDumpParams();
//    die();
        // execution de la requette préparer:
        return $queryResult->execute();
    }

    public function DisplayPilote() {
        $query = 'SELECT `0108asap_membres`.`id`AS`CopliotID`, `Name`, `Firstname`, `Email`, `Address`, `ZipCode`, `City`, `AsaCode`, `AsaName`,  `TypeOfLicence`, `id_0108asap_function` '
                . ' FROM `0108asap_membres` '
                . 'INNER JOIN `0108asap_functionsummary` '
                . 'ON `0108asap_functionsummary`.`id_0108asap_member`= `0108asap_membres`.`id` '
                . 'INNER JOIN `0108asap_functions` '
                . 'ON `0108asap_functions`.`id`=`0108asap_functionsummary`.`id_0108asap_function`'
                . ' WHERE `id_0108asap_function`';
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->execute();
        return $queryResult->fetchAll(PDO::FETCH_OBJ);
    }

    public function DisplayCoPilote() {
        $query = 'SELECT  `0108asap_membres`.`id` AS `CopliotID`, `Name`, `Firstname`, `0108asap_functionsummary`.`id_0108asap_function` '
                . 'FROM `0108asap_membres` '
                . ' INNER JOIN `0108asap_functionsummary`'
                . ' ON `0108asap_functionsummary`.`id_0108asap_member`=`0108asap_membres`.`id` '
                . 'WHERE `0108asap_functionsummary`.`id_0108asap_function`=16'
                . '';
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->execute();
        return $queryResult->fetchAll(PDO::FETCH_OBJ);
    }

    public function ArrayPilot() {
        $query = 'SELECT  `0108asap_membres`.`id` AS `PliotID`,  `0108asap_functionsummary`.`id_0108asap_function`  '
                . 'FROM `0108asap_membres`  '
                . 'INNER JOIN `0108asap_functionsummary` '
                . ' ON `0108asap_functionsummary`.`id_0108asap_member`=`0108asap_membres`.`id`'
                . ' ';
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->execute();
        return $queryResult->fetchAll(PDO::FETCH_OBJ);
    }

//    Liste des membbres avec nom Prenom 
    public function AssignAManager() {
        $query = 'SELECT `0108asap_membres`.`id` AS `IdMembers`, `Name`, `Firstname`, `0108asap_functions`.`TypeOfLicence`, `0108asap_functionsummary`.`id` AS `IdFunctionSummary` '
                . 'FROM `0108asap_membres` '
                . 'INNER JOIN `0108asap_functionsummary` '
                . 'ON `0108asap_functionsummary`.`id_0108asap_member`=`0108asap_membres`.`id` '
                . 'INNER JOIN `0108asap_functions` '
                . 'ON `0108asap_functions`.`id`=`0108asap_functionsummary`.`id_0108asap_function` '
                . 'WHERE `0108asap_functionsummary`.`LicencePrimary`=1 ';
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->execute();
        return $queryResult->fetchAll(PDO::FETCH_OBJ);
    }

    public function AssignAManagerLicense() {
        $query = 'SELECT `0108asap_membres`.`id` AS `IdMembers`, `Name`, `Firstname`, `0108asap_functions`.`TypeOfLicence`, `0108asap_functionsummary`.`id` AS `IdFunctionSummary` '
                . 'FROM `0108asap_membres` '
                . 'INNER JOIN `0108asap_functionsummary`'
                . ' ON `0108asap_functionsummary`.`id_0108asap_member`=`0108asap_membres`.`id` '
                . 'INNER JOIN `0108asap_functions` '
                . 'ON `0108asap_functions`.`id`=`0108asap_functionsummary`.`id_0108asap_function` '
                . 'WHERE `0108asap_functionsummary`.`LicencePrimary`=1 && `0108asap_functionsummary`.`id`=:id';
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->bindValue(':id', $this->id, PDO::PARAM_INT);
        $queryResult->execute();
        return $queryResult->fetch(PDO::FETCH_OBJ);
    }

    public function ModifyCle() {
        $query = 'UPDATE `0108asap_membres` SET `Cle`=:Cle WHERE `Email`=:Email';
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->bindValue(':Email', $this->Email, PDO::PARAM_STR);
        $queryResult->bindValue(':Cle', $this->Cle, PDO::PARAM_STR);
        $queryResult->execute();
        return $queryResult->fetch(PDO::FETCH_OBJ);
    }

    public function ModifyPassword() {
        $query = 'UPDATE `0108asap_membres` SET `Password`= :Password, `Cle`=:Cle WHERE `Email`=:Email';
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->bindValue(':Email', $this->Email, PDO::PARAM_STR);
        $queryResult->bindValue(':Cle', $this->Cle, PDO::PARAM_STR);
        $queryResult->bindValue(':Password', $this->Password, PDO::PARAM_STR);
        return $queryResult->execute();
    }

    public function MemberExistEmailAndCle() {
        $query = 'SELECT COUNT(`Email`) AS MemberExist, `Email`, Cle FROM `0108asap_membres` WHERE `Email`=:Email GROUP BY`Email`, `Cle`';
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->bindValue(':Email', $this->Email, PDO::PARAM_STR);
        $queryResult->execute();
        return $queryResult->fetch(PDO::FETCH_OBJ);
    }

    public function FunctionOfUser() {
        $query = 'SELECT `id_0108asap_functions`,`TypeOfLicence`, 0108asap_functions.`id` AS `IdFunction` FROM `0108asap_membres` INNER JOIN 0108asap_functions ON 0108asap_membres.`id_0108asap_functions`=0108asap_functions.`id` WHERE 0108asap_membres.`id`=:id GROUP BY `TypeOfLicence`, `id_0108asap_functions`';
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->bindValue(':id', $this->id, PDO::PARAM_INT);
//         $queryResult->debugDumpParams();
//    die();
        $queryResult->execute();
        return $queryResult->fetch(PDO::FETCH_OBJ);
    }

}
