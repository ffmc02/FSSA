<!--Partie Pilote-->

<div>
    
    <?php
    if (isset($_SESSION['connect']) && $_SESSION['connect'] == 'OK' && in_array($_SESSION['access'], $Pilote)) { 
        ?>
    <div>
        <p>Mes voitures <a href=""><img src="https://img.icons8.com/ios/50/000000/f1-race-car-top-veiw.png"/></a></p>
        
    <p></p>
<!--        <p>Ajouter votre ou vcs voiture <a href="AddCars.php">ICI</a></p>
        <p>Mes voitures déja enregistré<a href="MyRaceCars.php">ICI</a></p>-->
        </div>
    <div>
             <p>Liste des Compétitions ouvert à l'inscription <a href="ListOfOpenCompetitons.php">ICI</a></p>
                <p>Liste des compeétitions ou vous étes inscrit <a href="ParticipationAgreement.php">ICI</a></p>
    </div>
    <?php }
    ?>
</div>
<div> 

</div>