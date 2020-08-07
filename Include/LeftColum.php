<div>
    <h2>Votre profil vos licences</h2>
</div>
<div>
     <p>Votre profils <a href="MyProfiles.php">ICI</a></p>
</div>
<div>
    <p>Ajouter une licence <a href="AddLicense.php">ICI</a></p>
</div>
<div>
    <?php if (isset($_SESSION['connect']) && $_SESSION['connect'] == 'OK' && in_array($_SESSION['access'], $Responsible)) {
                    ?>
                    <p>Listes des Voitures enregistré <a href="ListOfCars.php">ICI</a></p>
                    <p> ouvrire une compétition à l'inscription <a href="ChoiceOfCompetition.php">ICI</a></p>
                    <p>liste des compétitions <a href="ListOfOpenCompetitons.php">ICI</a></p>

    <p></p>
    <?php } ?>
</div>