<?php
include_once '../Modele/dataBase.php';
include_once '../Modele/functions.php';
include_once '../config.php';
include_once '../controlleur/HomeLoginCtrl.php';
include_once '../include/header.php';
include_once '../include/navbar.php';
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-3">
            <img src="../assets/img/imgPresentation/logo.jpg" alt=""/>
        </div>
        <div class="col-lg-6 ">
            <h1>Bonjour <?= $_SESSION['Firstname'] . " " . $_SESSION['Name'] ?> </h1>
        </div>
        <div class="col-lg-3">
            <img src="../assets/img/imgPresentation/logo.jpg" alt=""/>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3 leftColumm">

        </div>
        <div class="col-lg-6 centralColumm">
            
            <p>Vous étes <?= $TypeLicence ?></p>
           <?php 
                
            
?>
                      
        </div>
        <div class="col-lg-3 rigthColumm">

        </div>
    </div>
</div>
<?php
include_once '../include/footer.php';
?>