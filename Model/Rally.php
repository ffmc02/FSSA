<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Rally
 *
 * @author gaeta
 */
class Rally {

    public $pdo;
    public $id = 0;
    public $NumberOfSteps = 0;
    public $NumberOfEs = 0;
    public $NumberOfCompetitonDays = 0;
    public $RecognitionDay = '';
    public $RecognitionDay2 = '';
    public $RecognitionDay3 = '';
    public $AsaOrganizer='';
    public $DatePcNeed1='';
    public $DatePcNeed2='';
    public $DatePcNeed3='';
    public $DateNeedForTheCommissioner1='';
    public $DateNeedForTheCommissioner2='';
    public $DateNeedForTheCommissioner3='';
    public $id_0108asap_competiton = 0;

    public function __construct() {
//fonction de connexion a ma base de donnÃ©er 
//ordi formation
        $this->pdo = dataBase::getIntance();


// Sinon on affiche un message d'erreur
//il les faut pour faire les transaction (3 prochaine methode)
    }

    public function AddRaly() {
        $query = 'INSERT INTO `0108asap_rally`'
                . '(`NumberOfSteps`, `NumberOfEs`, `NumberOfCompetitonDays`, '
                . '`RecognitionDay`, `RecognitionDay2`, `RecognitionDay3`, `AsaOrganizer`, `DatePcNeed1`, `DatePcNeed2`, `DatePcNeed3`, '
                . '`DateNeedForTheCommissioner1`, `DateNeedForTheCommissioner2`, `DateNeedForTheCommissioner3`, `id_0108asap_competiton` ) '
                . 'VALUES '
                . '(:NumberOfSteps, :NumberOfEs, :NumberOfCompetitonDays, '
                . ' :RecognitionDay,  :RecognitionDay2, :RecognitionDay3, :AsaOrganizer, :DatePcNeed1, :DatePcNeed2, :DatePcNeed3, :DateNeedForTheCommissioner1, '
                . ':DateNeedForTheCommissioner2, :DateNeedForTheCommissioner3, :id_0108asap_competiton )';
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->bindValue(':NumberOfSteps', $this->NumberOfSteps, PDO::PARAM_INT);
        $queryResult->bindValue(':NumberOfEs', $this->NumberOfEs, PDO::PARAM_INT);
        $queryResult->bindValue(':NumberOfCompetitonDays', $this->NumberOfCompetitonDays, PDO::PARAM_INT);
        $queryResult->bindValue(':RecognitionDay', $this->RecognitionDay, PDO::PARAM_STR);
        $queryResult->bindValue(':RecognitionDay2', $this->RecognitionDay2, PDO::PARAM_STR);
        $queryResult->bindValue(':RecognitionDay3', $this->RecognitionDay3, PDO::PARAM_STR);
        $queryResult->bindValue(':AsaOrganizer', $this->AsaOrganizer, PDO::PARAM_STR);
        $queryResult->bindValue(':DatePcNeed1', $this->DatePcNeed1, PDO::PARAM_STR);
        $queryResult->bindValue(':DatePcNeed2', $this->DatePcNeed2, PDO::PARAM_STR);
        $queryResult->bindValue(':DatePcNeed3', $this->DatePcNeed3, PDO::PARAM_STR);
        $queryResult->bindValue(':DateNeedForTheCommissioner1', $this->DateNeedForTheCommissioner1, PDO::PARAM_STR);
        $queryResult->bindValue(':DateNeedForTheCommissioner2', $this->DateNeedForTheCommissioner2, PDO::PARAM_STR);
        $queryResult->bindValue(':DateNeedForTheCommissioner3', $this->DateNeedForTheCommissioner3, PDO::PARAM_STR);
        $queryResult->bindValue(':id_0108asap_competiton', $this->id_0108asap_competiton, PDO::PARAM_INT);
//        $queryResult->debugDumpParams();
//        die();
        return $queryResult->execute();
    }

}
