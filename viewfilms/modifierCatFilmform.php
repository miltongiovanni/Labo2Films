<!doctype html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="images/favicon.ico" type="image/ico" sizes="16x16">
    <title>Modifier categories de films</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ"
        crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="../css/stylesfilm.css">
    <script src="../js/general.js"></script>
</head>
<?php
    session_start(); 
    
    $idCatFilm = $_POST['idCatFilm'];
    include_once "../BD/connexion.inc.php";
    include_once "../librairie/cateFilm.inc.php";
    include_once "../librairie/film.inc.php";
    $categorie=getCatFilm($idCatFilm);
?>

<body>
    <?php include 'includes/header.php'; ?>
    <section class="container text-center">
        <h2>Modifier catégorie du film</h2>
        <form id="catFilmForm" action="modifierCatFilm.php" method="POST" onSubmit="return valider(catFilmForm, document.getElementById('alerte'));">
            <div class="form-group row">
                <div class="alert alert-danger col-12" id="alerte">
                    <strong>Aille !</strong>Tous les champs sont obligatoires!
                    <button type="button" class="close" onclick="document.getElementById('alerte').style.display = 'none';">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
            <div class="form-group row">
                <label for="titreFilm" class="col-sm-4 col-form-label">Id Catégorie</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="idCatFilm" name="idCatFilm" title="Catégorie du film"
                        value="<?php echo $categorie->idCatFilm; ?>" readOnly required>
                </div>
            </div>
            <div class="form-group row">
                <label for="titreFilm" class="col-sm-4 col-form-label">Catégorie</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="catFilm" name="catFilm" title="Catégorie du film" value="<?php echo $categorie->catFilm; ?>"
                        required>
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
<script src="js/general.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
    crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
    crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
    crossorigin="anonymous"></script>

</html>