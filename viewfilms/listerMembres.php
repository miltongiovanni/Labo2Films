<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="../images/favicon.ico" type="image/ico" sizes="16x16">
    <title>Lister Membres</title>
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
membres.idMembre, nomMembre, telMembre, adMembre, cpMembre, emailUsager, statusUsager
    <section class="container text-center">
    <h2>Liste de Membres</h2>
        <table class="table table-hover " id="tableCategories">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Téléphone</th>
                    <th scope="col">Adresse</th>
                    <th scope="col">Code Postal</th>
                    <th scope="col">Courriel</th>
                    <th scope="col">État</th>
                    <th scope="col">Gestion</th>
                </tr>
            </thead>
            <tbody>

            <?php
            include_once "../BD/connexion.inc.php";
            include_once "../librairie/membres.inc.php";
            $membres = getMembres();
            for ($i = 1; $i < count($membres); $i++) {
                if ($membres[$i]->statusUsager == 1) {
                    $etatUsager = "Actif";
                } else {
                    $etatUsager = "No Actif";
                }

                echo '<tr>';
                echo '<td>' . $membres[$i]->idMembre . '</td>';
                echo '<td>' . $membres[$i]->nomMembre . '</td>';
                echo '<td>' . $membres[$i]->telMembre . '</td>';
                echo '<td>' . $membres[$i]->adMembre . '</td>';
                echo '<td>' . $membres[$i]->cpMembre . '</td>';
                echo '<td>' . $membres[$i]->emailUsager . '</td>';
                echo '<td>' . $etatUsager . '</td>';
                echo '<td><div class="input-group">';
                if ($membres[$i]->statusUsager == 0) {
                    echo '<form action="modifierMembre.php" method="post" name="modifMem' . $i . '">
                    <input class="btn btn-outline-warning mr-2 mb-2" type="submit" name="Submit" value="Activer" >
                    <input name="idMembre" type="hidden" value="' . $membres[$i]->idMembre . '" >
                    <input name="statusUsager" type="hidden" value="' . $membres[$i]->statusUsager . '" >
                    </form>';
                } else {
                    echo '<form action="modifierMembre.php" method="post" name="modifMem' . $i . '">
                    <input class="btn btn-outline-danger" type="submit" name="Submit" value="Désactiver" >
                    <input name="idMembre" type="hidden" value="' . $membres[$i]->idMembre . '" >
                    <input name="statusUsager" type="hidden" value="' . $membres[$i]->statusUsager . '" >
                    </form>';
                }

                echo '</div>';
                echo '</td>';
                echo '</tr>';
            }
            unset($connexion);
            unset($stmt);
            ?>
            </tbody>
        </table>


    </section>

    <?php include 'includes/footer.php';?>

</body>
<script src="js/general.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
    crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
    crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
    crossorigin="anonymous"></script>

</html>