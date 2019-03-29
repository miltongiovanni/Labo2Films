<header class="fixed-top">
        <nav id="navbar" class="container-fluid navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="adminutilisateur.php"><img id="imglogo" src="../images/logo.png" alt="WCM Films"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="adminutilisateur.php">Accueil<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item dropdown" id="navBdfilms">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            BD Films
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="listerCategories.php">Catégories</a>
                            <a class="dropdown-item" href="listerFilms.php">Films</a>
                            <a class="dropdown-item" href="listerMembres.php">Membres</a>
                            <a class="dropdown-item" href="listerhistorique.php?pagina=1">Historique</a>
                            <a class="dropdown-item" href="listerComptabilite.php?pagina=1">Comptabilité</a>
                        </div>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <p class="text-warning mr-2 pt-3" id="emailUsernavAdmin"><b>admin@wmcfilm.com</b></p>
                    <button type="button" id="btnConfiguration" class="btn btn-outline-warning my-2 mr-2 my-sm-0">
                        <i class="fas fa-cog"></i></i>
                    </button>
                </form>
                <form action="desconnexion.php" method="post" name="desconnexion">
                    <button class="btn btn-outline-danger my-2 mr-2 my-sm-0" id="btnDesconnexionAdmin" type="submit">Desconnexion</button>
                </form>
            </div>
        </nav>
    </header>