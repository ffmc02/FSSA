
<div>
     <p>Profils <a href="ProfilsManagement.php"><img src="https://img.icons8.com/dusk/64/000000/contract-job.png"/></a></p>
</div>
<div>
    <?php if (isset($_SESSION['connect']) && $_SESSION['connect'] == 'OK' && in_array($_SESSION['access'], $Responsible)) {
                    ?>
    <a href="AdministrativeManagement.php"><img src="https://img.icons8.com/ios/50/000000/add-administrator.png"/></a>
    <?php } ?>
</div>