<?php
$title='Mes voiture de course';
$List= new cars();
$ListOfOwners= $List->ListOfCars();
if(isset($_SESSION['idUser'])){
    $IdUserCars= htmlspecialchars($_SESSION['idUser']);
}