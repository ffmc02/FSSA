<!--Partie Pilote-->

<div>
    
    <?php
    if (isset($_SESSION['connect']) && $_SESSION['connect'] == 'OK' && in_array($_SESSION['access'], $Pilote)) { 
        ?>
    <p>Mes voiture</p>
        <p>Ajouter votre ou vcs voiture <a href="AddCars.php">ICI</a></p>
        <p>Mes voitures déja enregistré<a href="MyRaceCars.php">ICI</a></p>

    <?php }
    ?>
</div>
<div> 

</div>