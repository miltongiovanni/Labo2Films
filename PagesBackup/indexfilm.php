<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="images/favicon.ico" type="image/ico" sizes="16x16">
    <title>WMC Films</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ"
        crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="css/stylesfilm.css">
</head>

<body>

    <<header class="fixed-top">
        <nav id="navbar" class="container-fluid navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="#"><img id="imglogo" src="images/logo.png" alt="WCM Films"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="indexfilm.php">Accueil<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            Genres
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Comédies</a>
                            <a class="dropdown-item" href="#">Drames</a>
                            <a class="dropdown-item" href="#">Romantiques</a>
                            <a class="dropdown-item" href="#">Horreur</a>
                            <a class="dropdown-item" href="#">Thrillers</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown" id="navBdfilms">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            BD Films
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="viewfilms/listerCategories.php">Catégories</a>
                            <a class="dropdown-item" href="viewfilms/listerFilms.php">Films</a>
                            <a class="dropdown-item" href="#">Membres</a>
                            <a class="dropdown-item" href="#">Historique</a>
                            <a class="dropdown-item" href="#">Comptabilité</a>
                        </div>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link disabled" href="#">Disabled</a>
                    </li> -->
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <p class="text-warning mr-2 pt-3" id="emailUsernav"><b>admin@wmcfilms.com</b></p>
                    <button type="button" id="btnConfiguration" class="btn btn-outline-warning my-2 mr-2 my-sm-0">
                        <i class="fas fa-cog"></i></i>
                    </button>
                    <a href="#" data-target="#membreModal" data-toggle="modal" class="color-gray-darker c6 td-hover-none">
                        <button class="btn btn-outline-warning my-2 mr-2 my-sm-0" id="btnDevmembre" type="submit">Devenir
                            membre</button>
                    </a>
                    <a href="#" data-target="#connexionModal" data-toggle="modal" class="color-gray-darker c6 td-hover-none">
                        <button class="btn btn-outline-warning my-2 mr-2 my-sm-0" id="btnConnexion" type="button">Connexion</button>
                    </a>
                    <button class="btn btn-outline-danger my-2 mr-2 my-sm-0" id="btnDesconnexion" type="submit">Desconnexion</button>
                    <a href="viewfilms/panier.php" class="btn btn-outline-warning my-2 my-sm-0" role="button"><i class="fas fa-shopping-cart"></i><b>
                            2</b></a>
                </form>
            </div>
        </nav>
        </header>

        <section class="container" id="sectionIndex">
            <div class="row">
                <div class="col-sm-12 col-md-4 col-lg-3">
                    <div class="feature-gallery">
                        <img class="thumb rounded" src="images/black-water.jpg" alt="" title="">
                        <div class="fg-overlay text-center">
                            <h2 class="text-warning"><b>Black Water</b></h2>
                            <p>Bradley Cooper</p>
                            <p class="text-warning"><b>Action</b></p>
                            <p>2h 17m / 03-10-2018</p>
                            <p>Prisonnier dans un sous-marin sous l'autorité de la CIA, un agent qui travaille sous
                                couverture tente de sauver sa vie. Il reçoit une aide inattendue.</p>
                        </div>
                    </div>
                    <p class="text-center"><a href="#" data-target="#previewModal" data-toggle="modal" class="btn btn-danger my-2 my-sm-0"
                            role="button"><i class="fas fa-play"></i></a>
                        <a href="indexfilm.html" class="btn btn-warning"> $6.99 Ajouter</a></p>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-3">
                    <div class="feature-gallery">
                        <img class="thumb rounded" src="images/kungfupanda.jpg" alt="" title="">
                        <div class="fg-overlay text-center">
                            <h2 class="text-warning"><b>Black Water</b></h2>
                            <p>Bradley Cooper</p>
                            <p class="text-warning"><b>Action</b></p>
                            <p>2h 17m / 03-10-2018</p>
                            <p>Prisonnier dans un sous-marin sous l'autorité de la CIA, un agent qui travaille sous
                                couverture tente de sauver sa vie. Il reçoit une aide inattendue.</p>
                        </div>
                    </div>
                    <p class="text-center"><a href="#" data-target="#previewModal" data-toggle="modal" class="btn btn-danger my-2 my-sm-0"
                            role="button"><i class="fas fa-play"></i></a>
                        <a href="indexfilm.html" class="btn btn-warning"> $6.99 Ajouter</a></p>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-3">
                    <div class="feature-gallery">
                        <img class="thumb rounded" src="images/firs-man.jpg" alt="" title="">
                        <div class="fg-overlay text-center">
                            <h2 class="text-warning"><b>Black Water</b></h2>
                            <p>Bradley Cooper</p>
                            <p class="text-warning"><b>Action</b></p>
                            <p>2h 17m / 03-10-2018</p>
                            <p>Prisonnier dans un sous-marin sous l'autorité de la CIA, un agent qui travaille sous
                                couverture tente de sauver sa vie. Il reçoit une aide inattendue.</p>
                        </div>
                    </div>
                    <p class="text-center"><a href="#" data-target="#previewModal" data-toggle="modal" class="btn btn-danger my-2 my-sm-0"
                            role="button"><i class="fas fa-play"></i></a>
                        <a href="indexfilm.html" class="btn btn-warning"> $6.99 Ajouter</a></p>
                </div>

                <div class="col-sm-12 col-md-4 col-lg-3">
                    <div class="feature-gallery">
                        <img class="thumb rounded" src="images/civilwar.jpg" alt="" title="">
                        <div class="fg-overlay text-center">
                            <h2 class="text-warning"><b>Black Water</b></h2>
                            <p>Bradley Cooper</p>
                            <p class="text-warning"><b>Action</b></p>
                            <p>2h 17m / 03-10-2018</p>
                            <p>Prisonnier dans un sous-marin sous l'autorité de la CIA, un agent qui travaille sous
                                couverture tente de sauver sa vie. Il reçoit une aide inattendue.</p>
                        </div>
                    </div>
                    <p class="text-center"><a href="#" data-target="#previewModal" data-toggle="modal" class="btn btn-danger my-2 my-sm-0"
                            role="button"><i class="fas fa-play"></i></a>
                        <a href="indexfilm.html" class="btn btn-warning"> $6.99 Ajouter</a></p>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-3">
                    <div class="feature-gallery">
                        <img class="thumb rounded" src="images/batmansuperman.jpg" alt="" title="">
                        <div class="fg-overlay text-center">
                            <h2 class="text-warning"><b>Black Water</b></h2>
                            <p>Bradley Cooper</p>
                            <p class="text-warning"><b>Action</b></p>
                            <p>2h 17m / 03-10-2018</p>
                            <p>Prisonnier dans un sous-marin sous l'autorité de la CIA, un agent qui travaille sous
                                couverture tente de sauver sa vie. Il reçoit une aide inattendue.</p>
                        </div>
                    </div>
                    <p class="text-center"><a href="#" data-target="#previewModal" data-toggle="modal" class="btn btn-danger my-2 my-sm-0"
                            role="button"><i class="fas fa-play"></i></a>
                        <a href="indexfilm.html" class="btn btn-warning"> $6.99 Ajouter</a></p>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-3">
                    <div class="feature-gallery">
                        <img class="thumb rounded" src="images/Zootopia.jpg" alt="" title="">
                        <div class="fg-overlay text-center">
                            <h2 class="text-warning"><b>Black Water</b></h2>
                            <p>Bradley Cooper</p>
                            <p class="text-warning"><b>Action</b></p>
                            <p>2h 17m / 03-10-2018</p>
                            <p>Prisonnier dans un sous-marin sous l'autorité de la CIA, un agent qui travaille sous
                                couverture tente de sauver sa vie. Il reçoit une aide inattendue.</p>
                        </div>
                    </div>
                    <p class="text-center"><a href="#" data-target="#previewModal" data-toggle="modal" class="btn btn-danger my-2 my-sm-0"
                            role="button"><i class="fas fa-play"></i></a>
                        <a href="indexfilm.html" class="btn btn-warning"> $6.99 Ajouter</a></p>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-3">
                    <div class="feature-gallery">
                        <img class="thumb rounded" src="images/Aquaman.jpg" alt="" title="">
                        <div class="fg-overlay text-center">
                            <h2 class="text-warning"><b>Black Water</b></h2>
                            <p>Bradley Cooper</p>
                            <p class="text-warning"><b>Action</b></p>
                            <p>2h 17m / 03-10-2018</p>
                            <p>Prisonnier dans un sous-marin sous l'autorité de la CIA, un agent qui travaille sous
                                couverture tente de sauver sa vie. Il reçoit une aide inattendue.</p>
                        </div>
                    </div>
                    <p class="text-center"><a href="#" data-target="#previewModal" data-toggle="modal" class="btn btn-danger my-2 my-sm-0"
                            role="button"><i class="fas fa-play"></i></a>
                        <a href="indexfilm.html" class="btn btn-warning"> $6.99 Ajouter</a></p>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-3">
                    <div class="feature-gallery">
                        <img class="thumb rounded" src="images/legrinch.jpg" alt="" title="">
                        <div class="fg-overlay text-center">
                            <h2 class="text-warning"><b>Black Water</b></h2>
                            <p>Bradley Cooper</p>
                            <p class="text-warning"><b>Action</b></p>
                            <p>2h 17m / 03-10-2018</p>
                            <p>Prisonnier dans un sous-marin sous l'autorité de la CIA, un agent qui travaille sous
                                couverture tente de sauver sa vie. Il reçoit une aide inattendue.</p>
                        </div>
                    </div>
                    <p class="text-center"><a href="#" data-target="#previewModal" data-toggle="modal" class="btn btn-danger my-2 my-sm-0"
                            role="button"><i class="fas fa-play"></i></a>
                        <a href="indexfilm.html" class="btn btn-warning"> $6.99 Ajouter</a></p>
                </div>
            </div>
            <!-- Modal Preview d’un film -->
            <div class="modal fade" id="previewModal" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal Content -->
                    <div class="modal-content">
                        <div class="modal-header text-white">
                            <h4 class="modal-title">Black Water</h4>
                        </div>
                        <div class="modal-body">
                            <div class="embed-responsive embed-responsive-16by9">
                                <iframe width="560" height="315" src="https://www.youtube.com/embed/wfnil7m0qR8"
                                    frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen></iframe>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-warning" data-dismiss="modal">Quitter</button>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Modal Connexion -->
            <div class="modal fade" id="connexionModal" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal Content -->
                    <div class="modal-content" id="modalConnexion">
                        <div class="modal-header text-white">
                            <h4 class="modal-title">Connexion</h4>
                        </div>
                        <div class="modal-body">
                            <form id="formConnexion" enctype="multipart/form-data" action="viewfilms/enregistrerConnexion.php"
                                method="POST" onsubmit="return valider(formConnexion, document.getElementById('alerteConnex'));">
                                <div class="form-group row">
                                    <div class="alert alert-danger col-12" id="alerteConnex">
                                        <strong>Aille !</strong>
                                        <p id="changer01">Tous les champs sont obligatoires!</p>
                                        <button type="button" class="close" onclick="document.getElementById('alerteConnex').style.display = 'none';">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1" class="sr-only">Email</label>
                                    <input type="email" class="form-control" id="emailUsager" name="emailUsager"
                                        aria-describedby="emailHelp" placeholder="Entre email">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1" class="sr-only">Mot de passe</label>
                                    <input type="password" class="form-control" id="pwdUsager" name="pwdUsager"
                                        placeholder="Mot de passe">
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-outline-warning">Se Connecter</button>
                                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Annuler</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Modal Devenir membre -->
            <div class="modal fade" id="membreModal" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal Content -->
                    <div class="modal-content">
                        <div class="modal-header text-white">
                            <h4 class="modal-title">Devenir membre</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span class="text-warning" aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id="formMembre" enctype="multipart/form-data" action="viewfilms/enregistrerMembre.php"
                                method="POST" onsubmit="return valider(formMembre, document.getElementById('alerte'));">
                                <div class="form-group row">
                                    <div class="alert alert-danger col-12" id="alerte">
                                        <strong>Aille !</strong>
                                        <p id="changer01">Tous les champs sont obligatoires!</p>
                                        <button type="button" class="close" onclick="document.getElementById('alerte').style.display = 'none';">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nomMembre" class="col-sm-4 col-form-label">Nom</label>
                                    <div class="col-sm-8">
                                        <input name="nomMembre" id="nomMembre" class="form-control" type="text" title="Nom"
                                            required></div>
                                </div>
                                <div class="form-group row">
                                    <label for="telMembre" class="col-sm-4 col-form-label">Telephone</label>
                                    <div class="col-sm-8">
                                        <input type="text" title="Téléphone" class="form-control" id="telMembre" name="telMembre"
                                            pattern="[0-9]{10}" value="" required></div>
                                </div>
                                <div class="form-group row">
                                    <label for="emailUsager" class="col-sm-4 col-form-label">Email</label>
                                    <div class="col-sm-8">
                                        <input type="email" class="form-control" id="emailUsager" name="emailUsager"
                                            title="email@example.com" required></div>
                                </div>
                                <div class="form-group row">
                                    <label for="adMembre" class="col-sm-4 col-form-label">Adresse</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="adMembre" name="adMembre" title="Adresse"
                                            required></div>
                                </div>
                                <div class="form-group row">
                                    <label for="cpMembrel" class="col-sm-4 col-form-label">Code postal</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="cpMembre" id="cpMembre" class="form-control" title="Code Postal"
                                            pattern="[A-Za-z][0-9][A-Za-z][0-9][A-Za-z][0-9]" title="Lettre Numéro Lettre Numéro Lettre Numéro"
                                            required></div>
                                </div>
                                <div class="form-group row">
                                    <label for="pwdUsager1" class="col-sm-4 col-form-label">Mot de passe</label>
                                    <div class="col-sm-8">
                                        <input type="password" class="form-control" id="pwdUsager1" name="pwdUsager1"
                                            title="Les mots de passe doivent comprendre au moins 8 caractères." pattern="[A-Za-z0-9!?-]{8,12}"
                                            placeholder="au moins 8 caractères" required></div>
                                </div>
                                <div class="form-group row">
                                    <label for="pwdUsager2" class="col-sm-4 col-form-label">Confirmer</label>
                                    <div class="col-sm-8">
                                        <input type="password" class="form-control" id="pwdUsager2" name="pwdUsager2"
                                            title="Confirme Password" pattern="[A-Za-z0-9!?-]{8,12}" placeholder="Confirmer votre mode de passe"
                                            required></div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-outline-warning">Confirmer</button>
                                    <button type="reset" class="btn btn-outline-danger">Effacer</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </section>
        <footer class="page-footer font-small cyan darken-3">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 py-5">
                        <div class="mb-5 flex-center text-center">
                            <a class="fb-ic">
                                <i class="fab fa-facebook-f fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
                            </a>
                            <a class="tw-ic">
                                <i class="fab fa-twitter fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
                            </a>
                            <a class="yt-ic">
                                <i class="fab fa-youtube fa-lg white-text mr-md-5 mr-3 fa-2x"></i>
                            </a>
                            <a class="ins-ic">
                                <i class="fab fa-instagram fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
                            </a>
                            <a class="pin-ic">
                                <i class="fab fa-pinterest fa-lg white-text fa-2x"> </i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-copyright text-center py-3">© 2019 Copyright:
                <a href="indexfilm.php"> WMCFilms.com</a>
            </div>
        </footer>
</body>
<script src="js/general.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
    crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
    crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
    crossorigin="anonymous"></script>

</html>