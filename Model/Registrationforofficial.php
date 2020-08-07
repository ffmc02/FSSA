<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of registrationforofficial
 *
 * @author gaeta
 */
class Registrationforofficial {

    public $pdo;
    public $ResponseDatePcNeed1 = '';
    public $ResponseDatePcNeed2 = '';
    public $ResponseDatePcNeed3 = '';
    public $AvaibleDateNeedForTheCommissioner1 = '';
    public $AvaibleDateNeedForTheCommissioner2 = '';
    public $AvaibleDateNeedForTheCommissioner3 = '';
    public $Accommodation='';
    public $id_0108asap_competiton=0;
    public $id_0108asap_membres=0;
    public $id_0108asap_functions=0;
    
    public function __construct() {
//fonction de connexion a ma base de donnÃ©er 
//ordi formation
        $this->pdo = dataBase::getIntance();


// Sinon on affiche un message d'erreur
//il les faut pour faire les transaction (3 prochaine methode)
    }

    public function AddOffical() {
        $query = 'INSERT INTO `0108asap_registrationforofficials`(`ResponseDatePcNeed1`, `ResponseDatePcNeed2`, `ResponseDatePcNeed3`, '
                . '`AvaibleDateNeedForTheCommissioner1`, `AvaibleDateNeedForTheCommissioner2`, `AvaibleDateNeedForTheCommissioner3`, '
                . '`Accommodation`, `id_0108asap_competiton`, `id_0108asap_membres`, `id_0108asap_functions`)'
                . ' VALUES(:ResponseDatePcNeed1, :ResponseDatePcNeed2, ResponseDatePcNeed3, '
                . ':AvaibleDateNeedForTheCommissioner1, :AvaibleDateNeedForTheCommissioner2, :AvaibleDateNeedForTheCommissioner3, '
                . ':Accommodation, :id_0108asap_competiton, :id_0108asap_membres, :id_0108asap_functions)';
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->bindValue(':ResponseDatePcNeed1', $this->ResponseDatePcNeed1, PDO::PARAM_STR);
        $queryResult->bindValue(':ResponseDatePcNeed2', $this->ResponseDatePcNeed2, PDO::PARAM_STR);
        $queryResult->bindValue(':ResponseDatePcNeed3', $this->ResponseDatePcNeed3, PDO::PARAM_STR);
        $queryResult->bindValue(':AvaibleDateNeedForTheCommissioner1', $this->AvaibleDateNeedForTheCommissioner1, PDO::PARAM_STR);
        $queryResult->bindValue(':AvaibleDateNeedForTheCommissioner2', $this->AvaibleDateNeedForTheCommissioner2, PDO::PARAM_STR);
        $queryResult->bindValue(':AvaibleDateNeedForTheCommissioner3', $this->AvaibleDateNeedForTheCommissioner3, PDO::PARAM_STR);
        $queryResult->bindValue(':Accommodation', $this->Accommodation, PDO::PARAM_STR);
        $queryResult->bindValue(':id_0108asap_competiton', $this->id_0108asap_competiton, PDO::PARAM_INT);
        $queryResult->bindValue(':id_0108asap_membres', $this->id_0108asap_membres, PDO::PARAM_INT);
        $queryResult->bindValue(':id_0108asap_functions', $this->id_0108asap_functions, PDO::PARAM_INT);
    }

}
