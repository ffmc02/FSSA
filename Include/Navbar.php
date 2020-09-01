<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <?php if (isset($_SESSION['connect'])) { ?>
                <li class="nav-item active">
                    <a class="nav-link" href="HomeLogin.php"> Accueil de connexion <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="../index.php"> Accueil Du site <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="https://img.icons8.com/ios/50/000000/user-menu-male.png"/>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="MyProfiles.php">Mon profils</a>
                        <a class="dropdown-item" href="AddLicense.php">License complémentaire</a>
                        <!--<a class="dropdown-item" href="#">Something else here</a>-->
                    </div>
                </li>
                <?php if (isset($_SESSION['connect']) && $_SESSION['connect'] == 'OK' && in_array($_SESSION['access'], $Responsible)) {
                    ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="https://img.icons8.com/ios/50/000000/add-administrator.png"/>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="ChoiceOfCompetition.php">Ouvrir une compétition</a>
                            <a class="dropdown-item"  href="ListOfOpenCompetitons.php">Liste des compétition ouverte</a>
                            <a class="dropdown-item" href="ListOfcloseCompetition.php">Réouvrir une Compétition</a>
                            <a class="dropdown-item" href="ListOfRegisteredCompetitors.php">Concurrent insrit</a>
                        </div>
                    </li>
                <?php
                }
                if (isset($_SESSION['connect']) && $_SESSION['connect'] == 'OK' && in_array($_SESSION['access'], $Function)) {
                    ?>
                       <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="https://img.icons8.com/doodle/48/000000/finish-flag.png"/>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="ListOfOpenCompetitons.php">Liste des compétitions ouverte à l'inscritptions</a>
                        <a class="dropdown-item" href="ParticipationAgreement.php">Compétitions où je suis inscris </a>
                    </div>
                </li>
                <?php }
                ?>
                <li class="nav-item active">
                    <a class="nav-link" href="logout.php"> <img src="https://img.icons8.com/metro/26/000000/logout-rounded-up.png"/> <span class="sr-only">(current)</span></a>
                </li>
<?php } else { ?>
                <a class="nav-link" href="../index.php">Accueil <span class="sr-only">(current)</span></a>
                <li class="nav-item">
                    <a class="nav-link" href="Connection.php">connexion</a>
                </li>
            <?php }
            ?>

<?php ?>



        </ul>
    </div>
</nav>
<main>