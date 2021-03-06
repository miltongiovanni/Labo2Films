<!doctype html>
<html lang="fr">

<head>
    <!-- Required meta tags -->

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="../images/favicon.ico" type="image/ico" sizes="16x16">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
        crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ"
        crossorigin="anonymous">
    <link rel="stylesheet" href="../css/stylesfilm.css">
    <title>Liste de films</title>
    <script src="../js/general.js"></script>


</head>

<body>
    <?php
    session_start();
    include 'includes/header.php'; 
    ?>
    <section class="container-fluid">
        <h3>Liste de films</h3>
        <button type="button" class="btn btn-outline-warning form-group" data-toggle="modal" data-target="#insertFilmForm">
            Ajouter film
        </button>

        <?php
        include_once "../BD/connexion.inc.php";
        include_once "../librairie/film.inc.php";
        $films = getFilms(-1);
        for ($i = 0; $i < count($films); $i++) {
            echo '<div class="row mb-3">';
            echo '<div class="col-md-1 ">';
            echo '<img src="../pochettes/' . $films[$i]->pochetteFilm . '" class="img-fluid img-thumbnail " alt="' . $films[$i]->titreFilm . '">';
            echo '</div>';
            echo '<div class="col-md-10 d-flex flex-column  mb-3">';
            echo '<div class="row">';
            echo '<div class="col-md-4 font-weight-bold">Titre</div>';
            echo '<div class="col-md-2 font-weight-bold">Publication</div>';
            echo '<div class="col-md-6 font-weight-bold">Url</div>';
            echo '</div>';
            echo '<div class="row">';
            echo '<div class="col-md-4">' . $films[$i]->titreFilm . '</div>';
            echo '<div class="col-md-2">' . $films[$i]->pubFilm . '</div>';
            echo '<div class="col-md-6">' . $films[$i]->urlFilm . '</div>';
            echo '</div>';
            echo '<div class="row">';
            echo '<div class="col-md-6">';
            echo '<div class="row">';
            echo '<div class="col-md-8 font-weight-bold">Réalisateur</div>';
            echo '<div class="col-md-4 font-weight-bold">Durée</div>';
            echo '</div>';
            echo '<div class="row">';
            echo '<div class="col-md-8">' . $films[$i]->resFilm . '</div>';
            echo '<div class="col-md-4">' . $films[$i]->dureeFilm . ' h</div>';
            echo '</div>';
            echo '<div class="row">';
            echo '<div class="col-md-8 font-weight-bold">Categorie</div>';
            echo '<div class="col-md-4 font-weight-bold">Prix</div>';
            echo '</div>';
            echo '<div class="row">';
            echo '<div class="col-md-8">' . $films[$i]->CatFilm . '</div>';
            echo '<div class="col-md-4">' . $films[$i]->prixFilm . ' $</div>';
            echo '</div>';
            echo '</div>';
            echo '<div class="col-md-6">';
            echo '<div class="row">';
            echo '<div class="col-md-12 font-weight-bold">Déscription</div>';
            echo '</div>';
            echo '<div class="row">';
            echo '<div class="col-md-12">' . $films[$i]->descFilm . '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '<div class="col-md-1 d-flex flex-column align-self-center">';
            echo '<div class="row justify-content-center"><form action="modifierFilmform.php" method="post" name="modiFilm' . $i . '">
            <input class="btn btn-outline-warning mr-2 mb-2 btn-block" type="submit" name="Submit" value="Modifier" >
            <input name="idFilm" type="hidden" value="' . $films[$i]->idFilm . '" >
            </form></div>';
            echo '<div class="row justify-content-center"><form action="eliminerFilm.php" method="post" name="elimFilm' . $i . '">
            <input class="btn btn-outline-danger btn-block" type="submit" name="Submit" value="Supprimer" >
            <input name="idFilm" type="hidden" value="' . $films[$i]->idFilm . '" >
            </form></div>';
            echo '</div>';
            echo '</div>';
            echo '';

        }
        ?>


    </section>

    <!-- Modal -->
    <div class="modal fade" id="insertFilmForm" tabindex="-1" role="dialog" aria-labelledby="insertFilmFormTitle"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="insertFilmFormTitle">Ajouter Film</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span class="text-warning" aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <form id="filmForm" enctype="multipart/form-data" action="enregistrerFilm.php" method="POST"
                            onSubmit="return valider(filmForm, document.getElementById('alerte'));">
                            <div class="form-group row">
                                <div class="alert alert-danger col-12" id="alerte">
                                    <strong>Aille !</strong>Tous les champs sont obligatoires!
                                    <button type="button" class="close" onclick="document.getElementById('alerte').style.display = 'none';">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="titreFilm" class="col-sm-4 col-form-label">Titre</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="titreFilm" name="titreFilm" title="Titre du film"
                                        required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="resFilm" class="col-sm-4 col-form-label">Réalisateur</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="resFilm" name="resFilm" title="Réalisateur du film"
                                        required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-4">
                                    <label for="">Catégorie</label>
                                </div>
                                <div class="col-sm-8">
                                    <select id="idCatFilm" name="idCatFilm" class="form-control" required>
                                        <option selected value="">----------------------------------</option>
                                        <?php
                                        include_once "../BD/connexion.inc.php";
                                        include_once "../librairie/cateFilm.inc.php";
                                        $catFilms = getCatFilms();
                                        for ($i = 0; $i < count($catFilms); $i++) {
                                            echo '<option value="' . $catFilms[$i]->idCatFilm . '">' . $catFilms[$i]->catFilm . '</option>';
                                        }
                                        unset($connexion);
                                        unset($stmt);
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nom" class="col-sm-4 col-form-label">Durée</label>
                                <div class="col-sm-8">
                                    <input type="time" class="form-control" id="dureeFilm" name="dureeFilm" title="Durée du film"
                                        required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="prixFilm" class="col-sm-4 col-form-label">Prix</label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control" min="1.0" max="5.0" id="prixFilm" name="prixFilm"
                                        step="0.1" title="Prix location du film" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="urlFilm" class="col-sm-4 col-form-label">Url</label>
                                <div class="col-sm-8">
                                    <input type="url" class="form-control" id="urlFilm" name="urlFilm" title="URL du film"
                                        required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="pubFilm" class="col-sm-4 col-form-label">Publication</label>
                                <div class="col-sm-8">
                                    <input type="date" class="form-control" id="pubFilm" name="pubFilm" title="Date de publication"
                                        required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="descFilm" class="col-sm-4 col-form-label">Déscription</label>
                                <div class="col-sm-8">
                                    <textarea class="form-control" id="descFilm" name="descFilm" rows="3" title="Déscription du film"
                                        required></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Pochette</label>
                                <div class="custom-file col-sm-8">
                                    <input type="file" class="custom-file-input" id="pochetteFilm" name="pochetteFilm"
                                        required>
                                    <label class="custom-file-label" for="pochetteFilm" data-browse="Choisir fichier">Sélectionner
                                        fichier</label>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <!-- <div class="form-group row"> -->
                                <!-- <div class="col-sm-6 d-flex justify-content-center"> -->
                                <button type="submit" class="btn btn-outline-warning">Envoyer</button>
                                <!-- </div> -->
                                <!-- <div class="col-sm-6 d-flex justify-content-center"> -->
                                <button type="reset" class="btn btn-outline-danger">Effacer</button>
                                <!-- </div> -->
                                <!-- </div> -->
                            </div>
                        </form>
                    </div>
                </div>
                <!-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div> -->
            </div>
        </div>
    </div>

    <?php include 'includes/footer.php'; ?>                                       

</body>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
    crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        bsCustomFileInput.init()
    });
</script>

</html>