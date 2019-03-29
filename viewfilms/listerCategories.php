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
    <title>Categories de films</title>
    <script src="../js/general.js"></script>


</head>

<body>
    <?php
    session_start();
    include 'includes/header.php'; 
    ?>

    <section class="container">
        <h2>Categories de films</h2>
        <button type="button" class="btn btn-outline-warning form-group" data-toggle="modal" data-target="#insertCatFilmForm">
            Ajouter Categorie
        </button>
        <table class="table table-hover" id="tableCategories">
            <thead>
                <tr>
                    <th scope="col">Id Categorie</th>
                    <th scope="col">Déscription</th>
                    <th scope="col" colspan="2">Gestion</th>

                </tr>
            </thead>
            <tbody>

                <?php
                include_once "../BD/connexion.inc.php";
                include_once "../librairie/cateFilm.inc.php";
                $categories = getCatFilms();
                for ($i = 0; $i < count($categories); $i++) {

                    echo '<tr>';
                    echo '<td>' . $categories[$i]->idCatFilm . '</td>';
                    echo '<td>' . $categories[$i]->catFilm . '</td>';
                    echo '<td><div class="input-group">';

                    echo '<form action="modifierCatFilmform.php" method="post" name="modifCat' . $i . '">
                        <input class="btn btn-outline-warning mr-2 mb-2" type="submit" name="Submit" value="Modifier" >
                        <input name="idCatFilm" type="hidden" value="' . $categories[$i]->idCatFilm . '" >
                        </form>';

                    echo '<form action="eliminerCategorie.php" method="post" name="elimCat' . $i . '">
                        <input class="btn btn-outline-danger" type="submit" name="Submit" value="Supprimer" >
                        <input name="idCatFilm" type="hidden" value="' . $categories[$i]->idCatFilm . '" >
                        </form>';

                    echo '</div>';
                    echo '</td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
    </section>
    
<!-- Modal -->
<div class="modal fade" id="insertCatFilmForm" tabindex="-1" role="dialog" aria-labelledby="insertCatFilmFormTitle"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="insertCatFilmFormTitle">Ajouter Catégorie du Film</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span class="text-warning" aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <form id="catFilmForm" action="enregistrerCatFilm.php" method="POST"
                        onSubmit="return valider(catFilmForm, document.getElementById('alerte'));">
                        <div class="form-group row">
                            <div class="alert alert-danger col-12" id="alerte">
                                <strong>Aille !</strong>Tous les champs sont obligatoires!
                                <button type="button" class="close" onclick="document.getElementById('alerte').style.display = 'none';">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="titreFilm" class="col-sm-4 col-form-label">Catégorie</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="catFilm" name="catFilm" title="Catégorie du film" required>
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

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
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