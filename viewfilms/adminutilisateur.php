<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="images/favicon.ico" type="image/ico" sizes="16x16">
    <title>Administrateur</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ"
        crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="../css/stylesfilm.css">
    <script src="../js/general.js"></script>
</head>

<body>

    <?php
    session_start();
    include 'includes/header.php'; 
    ?>

    <section class="container text-center" id="sectionIndex">
        <div class="row justify-content-center">
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="feature-gallery">
                    <a href="listerCategories.php">
                        <img class="thumb rounded" src="../images/categories.jpg" alt="" title="">
                        <div class="fg-overlay text-center">
                            <h2 class="text-warning"><b>Catégories</b></h2>
                            <p>WMC Films</p><br>
                            <p class="text-warning"><b>Ajouter - Modifier - Supprimer</b></p>
                            <p>Ajouter, modifier ou supprimer les catégories de films.</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="feature-gallery">
                    <a href="listerFilms.php">
                        <img class="thumb rounded" src="../images/films.jpg" alt="" title="">
                        <div class="fg-overlay text-center">
                            <h2 class="text-warning"><b>Films</b></h2>
                            <p>WMC Films</p><br>
                            <p class="text-warning"><b>Ajouter - Modifier - Supprimer</b></p>
                            <p>Ajouter, modifier ou supprimer le catalogue de films.</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="feature-gallery">
                    <a href="listerMembres.php">
                        <img class="thumb rounded" src="../images/membres.jpg" alt="" title="">
                        <div class="fg-overlay text-center">
                            <h2 class="text-warning"><b>Membres</b></h2>
                            <p>WMC Films</p><br>
                            <p class="text-warning"><b>Visualiser - Modifier</b></p>
                            <p>Visualiser et modifier le statut (actifs - inactifs) de tous les membres.</p>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="feature-gallery">
                    <a href="listerhistorique.php?pagina=1">
                        <img class="thumb rounded" src="../images/historique.jpg" alt="" title="">
                        <div class="fg-overlay text-center">
                            <h2 class="text-warning"><b>Historique</b></h2>
                            <p>WMC Films</p><br>
                            <p class="text-warning"><b>Visualiser</b></p>
                            <p>Visualiser l'historique de location.</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4 text">
                <div class="feature-gallery">
                    <a href="listerComptabilite.php?pagina=1">
                        <img class="thumb rounded" src="../images/comptabilite.jpg" alt="" title="">
                        <div class="fg-overlay text-center">
                            <h2 class="text-warning"><b>Comptabilité</b></h2>
                            <p>WMC Films</p><br>
                            <p class="text-warning"><b>Visualiser</b></p>
                            <p>Visualiser la comptabilité de location.</p>
                        </div>
                    </a>
                </div>
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
                        <form>
                            <div class="form-group">
                                <label for="exampleInputEmail1" class="sr-only">Email</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                    placeholder="Entre email">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1" class="sr-only">Mot de passe</label>
                                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Mot de passe">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-warning" onClick="montrerElem();">Se
                                    Connecter</button>
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
                        <form>
                            <div class="form-group row">
                                <label for="nomClient" class="col-sm-4 col-form-label">Nom</label>
                                <div class="col-sm-8">
                                    <input name="nomClient" id="nomClient" class="form-control" type="text" title="Nom"></div>
                            </div>
                            <div class="form-group row">
                                <label for="staticTelephone" class="col-sm-4 col-form-label">Telephone</label>
                                <div class="col-sm-8">
                                    <input type="text" title="Téléphone" class="form-control" id="staticTelephone"
                                        value=""></div>
                            </div>
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-4 col-form-label">Email</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="staticEmail" title="email@example.com"></div>
                            </div>
                            <div class="form-group row">
                                <label for="adresse" class="col-sm-4 col-form-label">Adresse</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="adresse" name="adresse" title="Adresse"></div>
                            </div>
                            <div class="form-group row">
                                <label for="codePostal" class="col-sm-4 col-form-label">Code postal</label>
                                <div class="col-sm-8">
                                    <input type="text" name="codePostal" id="codePostal" class="form-control" title="Code Postal"></div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword1" class="col-sm-4 col-form-label">Password</label>
                                <div class="col-sm-8">
                                    <input type="password" class="form-control" id="inputPassword1" title="Password"></div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword2" class="col-sm-4 col-form-label">Confirmer</label>
                                <div class="col-sm-8">
                                    <input type="password" class="form-control" id="inputPassword2" title="Confirme Password"></div>
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

    <?php include 'includes/footer.php'; ?>

</body>
<script src="js/general.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
    crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
    crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
    crossorigin="anonymous"></script>

</html>