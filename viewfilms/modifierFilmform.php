<!doctype html>
<html lang="fr">

<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="images/favicon.ico" type="image/ico" sizes="16x16">
    <title>Modifier films</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ"
        crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="../css/stylesfilm.css">
    <script src="../js/general.js"></script>
</head>
<?php
$idFilm = $_POST['idFilm'];
include_once "../BD/connexion.inc.php";
include_once "../librairie/film.inc.php";
$film=getFilm($idFilm);
?>

<body>
    <?php include 'includes/header.php'; ?>
    <section class="container text-center">
        <h2>Modifier film</h2>
        
        <form id="filmForm" enctype="multipart/form-data" action="modifierFilm.php" method="POST" onSubmit="return valider(filmForm, document.getElementById('alerte'));">
            <div class="form-group row">
                <div class="alert alert-danger col-12" id="alerte">
                    <strong>Aille !</strong>Tous les champs sont obligatoires!
                    <button type="button" class="close" onclick="document.getElementById('alerte').style.display = 'none';">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
            <div class="form-group row">
                <label for="titreFilm" class="col-sm-4 col-form-label">Id Film</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="idFilm" name="idFilm" title="Id du film" value="<?php echo $film->idFilm; ?>"
                        readOnly>
                </div>
            </div>
            <div class="form-group row">
                <label for="titreFilm" class="col-sm-4 col-form-label">Titre</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="titreFilm" name="titreFilm" title="Titre du film" value="<?php echo $film->titreFilm; ?>"
                        required>
                </div>
            </div>
            <div class="form-group row">
                <label for="resFilm" class="col-sm-4 col-form-label">Réalisateur</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="resFilm" name="resFilm" title="Réalisateur du film"
                        value="<?php echo $film->resFilm; ?>" required>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-4">
                    <label for="">Catégorie</label>
                </div>
                <div class="col-sm-8">
                    <select id="idCatFilm" name="idCatFilm" class="form-control" required>
                        <option selected value="<?php echo $film->idCatFilm; ?>">
                            <?php echo $film->CatFilm; ?>
                        </option>
                        <?php
                        include_once "../BD/connexion.inc.php";
                        include_once "../librairie/cateFilm.inc.php";
                        $catFilms = getCatFilms();
                        for ($i = 0; $i < count($catFilms); $i++) {
                            if($catFilms[$i]->idCatFilm != $film->idCatFilm){
                                echo '<option value="' . $catFilms[$i]->idCatFilm . '">' . $catFilms[$i]->catFilm . '</option>';
                            }
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
                    <input type="time" class="form-control" id="dureeFilm" name="dureeFilm" title="Durée du film" value="<?php echo $film->dureeFilm; ?>"
                        required>
                </div>
            </div>
            <div class="form-group row">
                <label for="prixFilm" class="col-sm-4 col-form-label">Prix</label>
                <div class="col-sm-8">
                    <input type="number" class="form-control" min="1.0" max="5.0" id="prixFilm" name="prixFilm" value="<?php echo $film->prixFilm; ?>"
                        step="0.1" title="Prix location du film" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="urlFilm" class="col-sm-4 col-form-label">Url</label>
                <div class="col-sm-8">
                    <input type="url" class="form-control" id="urlFilm" name="urlFilm" title="URL du film" value="<?php echo $film->urlFilm; ?>"
                        required>
                </div>
            </div>
            <div class="form-group row">
                <label for="pubFilm" class="col-sm-4 col-form-label">Publication</label>
                <div class="col-sm-8">
                    <input type="date" class="form-control" id="pubFilm" name="pubFilm" title="Date de publication"
                        value="<?php echo $film->pubFilm; ?>" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="descFilm" class="col-sm-4 col-form-label">Déscription</label>
                <div class="col-sm-8">
                    <textarea class="form-control" id="descFilm" name="descFilm" rows="4" title="Déscription du film"
                        required><?php echo $film->descFilm; ?></textarea>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-2 align-self-center">
                    <label class="col-form-label">Pochette</label>
                    <input type="text" name="ancienpochette" id="ancienpochette" value="<?php echo $film->pochetteFilm; ?>" hidden>
                </div>
                <div class="col-sm-2 align-self-center">
                    <img src="../pochettes/<?php echo $film->pochetteFilm; ?>" class="rounded mx-auto d-block" width="100px" alt="<?php echo $film->titreFilm; ?>">
                </div>
                
                <div class="custom-file col-sm-8 align-self-center">
                    <input type="file" class="custom-file-input" id="pochetteFilm" name="pochetteFilm" >
                    <label class="custom-file-label" for="pochetteFilm" data-browse="Choisir fichier">Sélectionner
                        fichier</label>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-12 d-flex justify-content-end">
                    <button type="submit" class="btn btn-outline-warning mr-2">Envoyer</button>
                    <button type="reset" class="btn btn-outline-danger">Effacer</button>
                </div>
            </div>
        </form>
    </section>
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