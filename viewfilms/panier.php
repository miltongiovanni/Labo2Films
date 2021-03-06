<!doctype html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
        crossorigin="anonymous">
    <link rel="icon" href="../images/favicon.ico" type="image/ico" sizes="16x16">
    <title>Panier de Location</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ"
        crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>




    <script>
        function Envoyer(enregistre) {
	    var xhr = new XMLHttpRequest();
	    xhr.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("numPanier").innerHTML = this.responseText;
		}
	};
	xhr.open("GET", "viewfilms/enregistrerLocation.php?idFilm=" + enregistre, true);
	xhr.send();
    }
    </script>
    <script src="../js/general.js"></script>
    <link rel="stylesheet" href="../css/stylesfilm.css">


</head>

<body>
    <?php
    require_once "../bd/connexion.inc.php";
    include_once "../librairie/panier.inc.php";
    session_start();
    if (!(isset($_SESSION['emailUsagerSS']))) {
        // echo '<script>
        // self.location="../indexfilm.php";
        // </script>';
        return 'X';} else {
        if (isset($_SESSION['statusUsagerSS'])) {
            if ($_SESSION['statusUsagerSS'] == '0') {
                echo '<script>
                self.location="../indexfilm.php";
                </script>';
            }
        }
    }
    $idLocation = $_SESSION['idlocationSS'];
    

    ?>

    <<header class="fixed-top">
        <nav id="navbar" class="container-fluid navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="../indexfilm.php"><img id="imglogo" src="../images/logo.png" alt="WCM Films"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="../indexfilm.php">Accueil<span class="sr-only">(current)</span></a>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <p class="text-warning mr-2 pt-3" id="emailUsernav"><b>
                            <?php 
                        if(isset($_SESSION['statusUsagerSS'])){
                            echo $_SESSION['emailUsagerSS']; 
                        }
                        ?>
                        </b>
                    </p>
                    <button type="button" id="btnConfiguration" class="btn btn-outline-warning my-2 mr-2 my-sm-0">
                        <i class="fas fa-cog"></i></i>
                    </button>
                    <!-- <a href="#" data-target="#membreModal" data-toggle="modal" class="color-gray-darker c6 td-hover-none">
                        <button class="btn btn-outline-warning my-2 mr-2 my-sm-0" id="btnDevmembre" type="submit">Devenir
                            membre</button>
                    </a> -->
                    <!-- <a href="#" data-target="#connexionModal" data-toggle="modal" class="color-gray-darker c6 td-hover-none">
                        <button class="btn btn-outline-warning my-2 mr-2 my-sm-0" id="btnConnexion" type="button">Connexion</button>
                    </a> -->
                </form>
                <form action="desconnexion.php" method="post" name="desconnexion">
                    <button class="btn btn-outline-danger my-2 mr-2 my-sm-0 d-inline-block" id="btnDesconnexion" type="submit">Desconnexion</button>
                </form>
                <a href="panier.php" class="btn btn-outline-warning my-2 my-sm-0" role="button"><i class="fas fa-shopping-cart"></i><b
                        id="numPanier">
                        <?php
                        include_once "../librairie/connexions.inc.php";
                        include_once "../librairie/panier.inc.php";
                        if(isset($_SESSION['idlocationSS'])){
                           $Nrofilms = getcountFilmdet($_SESSION['idlocationSS']);
                           echo $Nrofilms->kfilms;
                        }else{
                           echo 0;   
                        }

                        ?>
                    </b></a>

            </div>
        </nav>
        </header>

        <section class="container">
            <h3 class="col-sm-12 text-center">Votre panier</h3>
            <table class="table table-hover table-dark text-center" id="tableLocation1">
                <thead>
                    <tr>
                        <th scope="col">Pochette</th>
                        <th scope="col">Titre</th>
                        <th scope="col">Nombre de Jours</th>
                        <th scope="col">Prix</th>
                        <!-- <th scope="col">Gestion</th> -->
                        <th scope="col" colspan="2">
                            <form id="effacer_panier" action="eliminerPanier.php" method="POST">
                                <button type="button" id="poubelle" class="btn btn-outline-warning" onclick="DesActiverModification('','effacer')">
                                    <i class="far fa-trash-alt"> </i></button>
                            </form>
                        </th>
                    </tr>
                </thead>
                <tbody>

                    <?php

            $tot = 0;
            try {
                $PanierFilmDet = getfilmsPanier($idLocation);
                for ($i = 0; $i < count($PanierFilmDet); $i++) {
                    $tot += $PanierFilmDet[$i]->prixLocation;
                    // echo $PanierFilmDet[$i]->idFilm;
                    // echo $PanierFilmDet[$i]->joursLocation;
                    // echo $PanierFilmDet[$i]->prixLocation;
                    // echo $PanierFilmDet[$i]->pochetteFilm;
                    // echo $PanierFilmDet[$i]->titreFilm;"<br>"; 
                    echo '<tr>';
                    echo '<form  id=Panier' . $PanierFilmDet[$i]->idFilm . ' action="enregistrerDetPanier.php" method="POST">';
                    echo '<td scope="row">';
                    echo '  <img src="../pochettes/' . $PanierFilmDet[$i]->pochetteFilm . '" class="img-fluid img-thumbnail w-50" alt="...">';
                    echo '</td>';
                    echo '<td class ="d-xs-none" >'; 
                    echo   '<input type="text" name="idposition" hidden value=' . $PanierFilmDet[$i]->idFilm . ' > ' . $PanierFilmDet[$i]->titreFilm . '</td>';
                    echo '<td>';
                    echo   '<input id="quantite'. $PanierFilmDet[$i]->idFilm . '" type="number" class="w-100 bg-transparent text-white text-center border-1" size="4" readonly value="' . $PanierFilmDet[$i]->joursLocation . '">';
                    echo    '<input id="quantite1' . $PanierFilmDet[$i]->idFilm . '" name="quantiteUpd" type="number" class="w-100 bg-light text-dark text-center border-1" size="4" min="1" step="1" value="' . $PanierFilmDet[$i]->joursLocation . '"style="display:none" required>';
                    echo '</td>';
                    echo '<td>';
                    echo   '<input id="prix' . $PanierFilmDet[$i]->idFilm . '" name="prix' . $PanierFilmDet[$i]->idFilm . '" type="text" class=" w-50 bg-transparent text-white text-right border-0" readonly value="' . $PanierFilmDet[$i]->prixLocation . '">$CAD';
                    echo   '</td>';
                    echo '<td>';
                    echo    '<button id="Modification' . $PanierFilmDet[$i]->idFilm . '" type="button" class="btn btn-outline-warning btn-block" onclick="ActiverModification(' . $PanierFilmDet[$i]->idFilm .' )" style="width: 100px">Modifier</button>';
                    echo    '<button id="Enregistrer' . $PanierFilmDet[$i]->idFilm .'" type="button" class="btn btn-outline-warning w-auto" style="display:none" onclick="DesActiverModification('.$PanierFilmDet[$i]->idFilm.',\'Save\')" style="width: 100px">Enregistrer</button>';
                    echo '</td>';
                    echo '</form>';
                    echo '<td>';
                    echo    '<form id="PanierE' . $PanierFilmDet[$i]->idFilm . '"  action="eliminerDetPanier.php" method="POST">';
                    echo       '<input type="text" name="idposition" hidden value=' . $PanierFilmDet[$i]->idFilm . ' >';
                    echo       '<button id="supprimer' . $PanierFilmDet[$i]->idFilm . '" type="button" class="btn btn-outline-danger btn-block" onclick="DesActiverModification(' . $PanierFilmDet[$i]->idFilm . ',\'Delete\')" style="width: 100px">Supprimer</button>';
                    echo     '</form>';
                    echo     '<button id="annuler' . $PanierFilmDet[$i]->idFilm . '" type="button" class="btn btn-outline-danger btn-block" style="display:none" onclick="DesActiverModification(' . $PanierFilmDet[$i]->idFilm . ',\'Cancel\')" style="width: 100px">Annuler</button>';
                    echo '</td>';
                    echo '</tr>';
                }
                // echo '<script>
                //                 self.location="../indexfilm.php";
                //                 </script>';
            } catch (Exception $e) {
                echo "Problème pour lister le panier";
            } finally {
                unset($connexion);
                unset($stmt);
            }

            ?>

                </tbody>
            </table>

            <div class="container">
                <div class="row">
                    <div class="col-10">
                        <table class="table d-flex justify-content-end table-dark text-right" id="tableLocation2">
                            <tbody>
                                <tr>
                                    <th scope="row">Sous-total:</th>
                                    <td> <input type="text" value=<?php echo number_format($tot,2) ?> class="w-50
                                        bg-transparent text-white text-right border-0">$</td>
                                </tr>
                                <tr>
                                    <th scope="row">TVQ:</th>
                                    <td><input type="text" value=<?php echo number_format($tot * 0.09975,2) ?>
                                        class="w-50 bg-transparent text-white text-right border-0">$</td>
                                </tr>
                                <tr>
                                    <th scope="row">TPS:</th>
                                    <td><input type="text" value=<?php echo number_format($tot * 0.05,2) ?> class="w-50
                                        bg-transparent text-white text-right border-0">$</td>
                                </tr>
                                <tr>
                                    <th scope="row">Total:</th>
                                    <td><input type="text" value=<?php echo number_format($tot + number_format($tot *
                                            0.09975,2) + number_format($tot * 0.05,2),2) ?> class="w-50 bg-transparent
                                        text-white text-right border-0">$</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-2 align-self-end mb-4 text-right">

                        <form id="payerfrm" action="enregistrerpayer.php" method="POST">
                            <button type="button" id="payer" class="btn btn-outline-primary btn-block" role="button"
                                onclick="DesActiverModification('','PayPal')"><i class="fab fa-paypal"></i><b>
                                    PayPal</b></button>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <?php include 'includes/footer.php';?>

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
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script> -->

<script src="../js/general.js" type="text/javascript"></script>

</html>