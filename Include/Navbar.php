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
                <li class="nav-item active">
                    <a class="nav-link" href="logout.php"> Déconnexion <span class="sr-only">(current)</span></a>
                </li>
                <?php } else { ?>
                <a class="nav-link" href="../index.php">Accueil <span class="sr-only">(current)</span></a>
                <li class="nav-item">
                    <a class="nav-link" href="Connection.php">connexion</a>
                </li>
            <?php }
            ?>

            <?php ?>
            <!--       <li class="nav-item">
                  <a class="nav-link" href="#">Pricing</a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Dropdown link
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                  </div>-->
            </li>
        </ul>
    </div>
</nav>
<main>