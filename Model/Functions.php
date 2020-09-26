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


}
