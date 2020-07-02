<?php

/**
 * Description of functions
 *
 * @author gaeta
 */
class functions {

    public $pdo;
    public $id = 0;
    public $TypeOfLicence = '';

    public function __construct() {
//fonction de connexion a ma base de donnéer 
        //ordi formation
        $this->pdo = dataBase::getIntance();


        // Sinon on affiche un message d'erreur
        //il les faut pour faire les transaction (3 prochaine methode)
    }

    public function ListOfFunction() {
        $query = 'SELECT `id`, `TypeOfLicence` FROM `0108asap_functions`';
        $queryResult = $this->pdo->db->prepare($query);
//         $queryResult->debugDumpParams();
//    die();
        $queryResult->execute();
        return $queryResult->fetchAll(PDO::FETCH_OBJ);
    }

    public function FunctionOfUser() {
        $query = 'SELECT `id_0108asap_functions`,`TypeOfLicence`, 0108asap_membres.`id`FROM `0108asap_membres` INNER JOIN 0108asap_functions ON 0108asap_membres.`id_0108asap_functions`=0108asap_functions.`id` WHERE 0108asap_membres.`id`=:id GROUP BY `TypeOfLicence`, `id_0108asap_functions`';
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->bindValue(':id', $this->id, PDO::PARAM_INT);
//         $queryResult->debugDumpParams();
//    die();
         $queryResult->execute();
        return $queryResult->fetch(PDO::FETCH_OBJ);
    }

}
