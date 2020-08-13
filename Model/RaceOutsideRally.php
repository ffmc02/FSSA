<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of raceoutsiderally
 *
 * @author gaeta
 */
class RaceOutsideRally {
    public $pdo;
    public $id=0;
    public $CompetitionStarDay='';
    public $CompetitionEndDay='';
    public $RequirementDate2='';
    public  $RequirementDate1='';
    public $RequirementDate3='';
    public $IdCompetition=0;
    
        public function __construct() {
//fonction de connexion a ma base de donnÃ©er 
        //ordi formation
        $this->pdo = dataBase::getIntance();


        // Sinon on affiche un message d'erreur
        //il les faut pour faire les transaction (3 prochaine methode)
    }
    
   public function AddRaceOutsideRally(){
       $query='INSERT INTO `0108asap_raceoutsiderally`'
               . '( `CompetitionStarDay`, `CompetitionEndDay`, `RequirementDate1`, `RequirementDate2`, `RequirementDate3`, `IdCompetition`)'
               . ' VALUES (:CompetitionStarDay, :CompetitionEndDay, :RequirementDate1, :RequirementDate2, :RequirementDate3, :IdCompetition)';
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->bindValue(':IdCompetition', $this->IdCompetition, PDO::PARAM_INT);
        $queryResult->bindValue(':CompetitionStarDay', $this->CompetitionStarDay, PDO::PARAM_STR);
        $queryResult->bindValue(':CompetitionEndDay', $this->CompetitionEndDay, PDO::PARAM_STR);
        $queryResult->bindValue(':RequirementDate1', $this->RequirementDate1, PDO::PARAM_STR);
        $queryResult->bindValue(':RequirementDate2', $this->RequirementDate2, PDO::PARAM_STR);
        $queryResult->bindValue(':RequirementDate3', $this->RequirementDate3, PDO::PARAM_STR);
        return $queryResult->execute();
   }
   public function ListeRaceOutsideRally(){
       $query='SELECT `id`, `CompetitionStarDay`, `CompetitionEndDay`, `RequirementDate1`, `RequirementDate2`, `RequirementDate3`, `IdCompetition` '
               . 'FROM `0108asap_raceoutsiderally`';
       
        $queryResult = $this->pdo->db->prepare($query);
        $queryResult->execute();
        return $queryResult->fetchAll(PDO::FETCH_OBJ);
   }
}
