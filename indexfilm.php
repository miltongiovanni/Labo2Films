<?php
session_start();
?>
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

    <link rel="stylesheet" href="css/stylesfilm.css">

</head>

<body>
    <header class="fixed-top">
        <nav id="navbar" class="container-fluid navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="indexfilm.php"><img id="imglogo" src="images/logo.png" alt="WCM Films"></a>
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
                            <?php
                            include_once "bd/connexion.inc.php";
                            include_once "librairie/cateFilm.inc.php";
                            $genres = getCatFilms();
                            for ($i = 0; $i < count($genres); $i++) {
                                echo '<form action="" method="post">';
                                //echo '<a class="dropdown-item" href="#">'.$genres[$i]->catFilm.'</a>';
                                echo '<input type="text" value="' . $genres[$i]->idCatFilm . '" name="idCatFilm2" hidden>';
                                echo '<a class="dropdown-item" id="dropdownNav" href="#"><input type="submit" class="btn btn-link btn-block text-dark" id="btnGenres" value="' . $genres[$i]->catFilm . '"></a>';
                                echo '</form>';
                            }
                            ?>
                        </div>
                    </li>
                </ul>
                <div class="alert alert-warning alert-dismissible fade show my-2" id="alertNav1" role="alert">
                    <strong>Super!</strong> Votre inscription a bien été enregistrée!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="alert alert-danger alert-dismissible fade show my-2" id="alertNav2" role="alert">
                    <strong>Erreur!</strong> Votre email ou mot de passe est erroné!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="alert alert-danger alert-dismissible fade show my-2" id="alertNav3" role="alert">
                    <strong>Erreur!</strong> Vous devez établir connexion!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="alert alert-warning alert-dismissible fade show my-2" id="alertNav4" role="alert">
                    <strong>Super!</strong> La mise à jour de vos donnés a bien été faite!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="alert alert-danger alert-dismissible fade show my-2" id="alertNav5" role="alert">
                    <strong>Erreur!</strong> Votre compte est inactive! SVP Contactez à l'administrateur
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php
                if(isset($_SESSION['AlertNav'])){
                    switch ($_SESSION['AlertNav']) {
                        case "1":
                            echo '<script>';
                            echo "document.getElementById('alertNav1').style.display = 'inline-block';";
                            echo '</script>';
                            $_SESSION['AlertNav'] = 0;
                            break;
                        case "2":
                            echo '<script>';
                            echo "document.getElementById('alertNav2').style.display = 'inline-block';";
                            echo '</script>';
                            $_SESSION['AlertNav'] = 0;
                            break;
                        case "3":
                            echo '<script>';
                            echo "document.getElementById('alertNav3').style.display = 'inline-block';";
                            echo '</script>';
                            $_SESSION['AlertNav'] = 0;
                            break;
                        case "4":
                            echo '<script>';
                            echo "document.getElementById('alertNav4').style.display = 'inline-block';";
                            echo '</script>';
                            $_SESSION['AlertNav'] = 0;
                            break;
                        case "5":
                            echo '<script>';
                            echo "document.getElementById('alertNav5').style.display = 'inline-block';";
                            echo '</script>';
                            $_SESSION['AlertNav'] = 0;
                            break;
                        default:
                            echo '<script>';
                            echo "document.getElementById('alertNav1').style.display = 'none';";
                            echo "document.getElementById('alertNav2').style.display = 'none';";
                            echo "document.getElementById('alertNav3').style.display = 'none';";
                            echo "document.getElementById('alertNav4').style.display = 'none';";
                            echo "document.getElementById('alertNav5').style.display = 'none';";
                            echo '</script>';
                    }
                } else {
                    $_SESSION['AlertNav']=0;
                }

                ?>
                <form class="form-inline my-2 my-lg-0">
                    <p class="text-warning mr-2 pt-3" id="emailUsernav">
                        <b>
                            <?php
                            if (isset($_SESSION['statusUsagerSS'])) {
                                echo $_SESSION['emailUsagerSS'];
                            }
                            ?>
                        </b>
                    </p>
                    <a href="#" data-target="#membreModal" data-toggle="modal" class="color-gray-darker c6 td-hover-none">
                    <button type="button" id="btnConfiguration" class="btn btn-outline-warning my-2 mr-2 my-sm-0">
                        <i class="fas fa-cog"></i></i></button>
                        </a>
                    <a href="#" data-target="#membreModal" data-toggle="modal" class="color-gray-darker c6 td-hover-none">
                        <button class="btn btn-outline-warning my-2 mr-2 my-sm-0" id="btnDevmembre" type="submit">Devenir
                            membre</button>
                    </a>
                    <a href="#" data-target="#connexionModal" data-toggle="modal" class="color-gray-darker c6 td-hover-none">
                        <button class="btn btn-outline-warning my-2 mr-2 my-sm-0" id="btnConnexion" type="button">Connexion</button>
                    </a>
                </form>
                <form action="viewfilms/desconnexion.php" method="post" name="desconnexion">
                    <button class="btn btn-outline-danger my-2 mr-2 my-sm-0" id="btnDesconnexion" type="submit">Desconnexion</button>
                </form>
                <a href="viewfilms/panier.php" class="btn btn-outline-warning my-2 my-sm-0" id="btnPanier" role="button"><i
                        class="fas fa-shopping-cart"></i>
                    <b id="numPanier">
                        <?php
                    include_once "librairie/connexions.inc.php";
                    include_once "librairie/panier.inc.php";
                    if (isset($_SESSION['idlocationSS'])) {
                        $Nrofilms = getcountFilmdet($_SESSION['idlocationSS']);
                        echo $Nrofilms->kfilms;
                    } else {
                        echo 0;
                    }

                    ?>
                    </b>
                </a>
            </div>
        </nav>
    </header>

    <section class="container" id="sectionIndex">
        <div class="row justify-content-center">
            <?php

            if (isset($_SESSION['statusUsagerSS'])) { //Détermine si une variable est définie et est différente de NULL

                $dossier = "pochettes/";
                $idMembre = getconnexion_email($_SESSION['emailUsagerSS']);

                $sessionStatus = $_SESSION['statusUsagerSS'];

                if ($sessionStatus == '1') {

                    echo '<script>';
                    echo "document.getElementById('btnConnexion').style.display = 'none';";
                    echo "document.getElementById('btnDevmembre').className = 'd-none';";
                    echo "document.getElementById('btnDesconnexion').style.display = 'inline-block';";
                    echo "document.getElementById('btnPanier').style.display = 'inline-block';";
                    echo "document.getElementById('btnConfiguration').style.display = 'inline-block';";
                    echo '</script>';

                    try {
                        $filmsAct = getFilmsAct($idMembre->idMembre);

                        if ($filmsAct !== null) {

                            for ($j = 0; $j < count($filmsAct); $j++) {
                                // echo "Film=".$filmsAct[$j]->idFilm;
                                // echo "<br>pochette ".$filmsAct[$j]->pochetteFilm;
                                if ($j == 0) {
                                    echo '<h3 class="col-sm-12 text-center">Mes films</h3>';
                                }
                                echo '<div class="col-sm-12 col-md-4 col-lg-2">';
                                echo '<div class="feature-gallery">';
                                echo '<img class="thumb rounded" src="' . $dossier . $filmsAct[$j]->pochetteFilm . '" alt="" title="">';
                                echo '</div>';
                                echo '</div>';
                            }

                        }
                    } catch (Exception $e) {echo "Probleme pour consulter ";
                    } finally {
                        //  unset($connexion);
                        // unset($stmt);
                    }
                }
            }

            ?>

        </div>

        <div class="row">
            <?php

                include_once "librairie/film.inc.php";
                $dossier = "pochettes/";

                try {
                    if (isset($_POST['idCatFilm2'])) {
                        $films = getFilms2($_POST['idCatFilm2']);
                        echo '<h3 class="col-sm-12">' . $films[$i]->CatFilm . '</h3>';
                        for ($i = 0; $i < count($films); $i++) {
                            echo '<div class="col-sm-12 col-md-4 col-lg-3">';
                            echo '<div class="feature-gallery">';
                            echo '<img class="thumb rounded" id="pochetteFilm' . $films[$i]->idFilm . '" src="' . $dossier . $films[$i]->pochetteFilm . '" alt="" title="">';
                            echo '<div class="fg-overlay text-center">';
                            echo '<h2 class="text-warning" id="titreFilm' . $films[$i]->idFilm . '"><b>' . $films[$i]->titreFilm . '</b></h2>';
                            echo '<p id="resFilm' . $films[$i]->idFilm . '" class="d-inline-block">' . $films[$i]->resFilm . ' |</p>';
                            echo '<p class="text-warning d-inline-block" id="catFilm' . $films[$i]->idFilm . '"><b>&nbsp;' . $films[$i]->CatFilm . '</b></p>';
                            echo '<p class="d-inline-block" id="dureeFilm' . $films[$i]->idFilm . '">' . $films[$i]->dureeFilm . ' |</p><p class="d-inline-block">&nbsp;' . $films[$i]->pubFilm . '</p>';
                            echo '<p>' . $films[$i]->descFilm . '</p>';
                            echo '</div>';
                            echo '</div>';
                            echo '<p class="text-center">';
                            echo '<a href="#" data-target="#previewModal' . $i . '" data-toggle="modal" class="btn btn-danger my-2 mr-2 my-sm-0" role="button"><i class="fas fa-play"></i></a>';
                            echo '<input type="button" class="btnAjouter btn btn-warning" id="nombre' . $films[$i]->idFilm . '" value="' . $films[$i]->prixFilm . '$ Ajouter" onclick="Envoyer(' . $films[$i]->idFilm . ')"></p>';
                            echo '</div>';
                        }
                        echo '</div>';

                        if ($sessionStatus = '1') {

                            echo '<script>';
                            echo 'var btnAjouters = document.querySelectorAll("input[class~=btnAjouter]");';
                            echo ' for (var i = 0; i < btnAjouters.length; i++) {
                                                        btnAjouters[i].classList.remove("btnAjouter");
                                                    }';
                            echo '</script>';

                        }
                        //<!-- Modal Preview d’un film -->
                        for ($i = 0; $i < count($films); $i++) {
                            echo '<div class="modal fade" id="previewModal' . $i . '" role="dialog">';
                            echo '<div class="modal-dialog">';
                            //<!-- Modal Content -->
                            echo '<div class="modal-content">';
                            echo '<div class="modal-header text-white">';
                            echo '<h4 class="modal-title">' . $films[$i]->titreFilm . '</h4>';
                            echo '</div>';
                            echo '<div class="modal-body" id="modalVideo' . $i . '">';
                            echo '<div class="embed-responsive embed-responsive-16by9">';
                            echo '<iframe width="560" height="315" src="' . $films[$i]->urlFilm . '"';
                            echo 'frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"';
                            echo 'allowfullscreen></iframe>';
                            echo '</div>';
                            echo '</div>';
                            echo '<div class="modal-footer">';
                            echo '<button type="button" class="btn btn-outline-warning" data-dismiss="modal" onclick="arreterVideo(modalVideo' . $i . ')">Quitter</button>';
                            echo '</div>';
                            echo '</div>';
                            echo '</div>';
                            echo '</div>';
                        }
                    } else {
                        define("TAILLE_PAGE", 8);

                        //examino la p�gina a mostrar y el inicio del registro a mostrar
                        if (isset($_GET['page'])) {
                            $page = $_GET['page'] - 1;
                        } else {
                            $page = 0;
                        }
                        $nombreTotalFilms = countFilms();
                        $totalPages = ceil($nombreTotalFilms / TAILLE_PAGE);

                        $films = getFilms($page * 8);
                        //$films = getFilms2($idCatFilm2);
                        echo '<h3 class="col-sm-12">Populaires sur WMC Films</h3>';
                        //echo '<h3 class="col-sm-12">' . $films[$i]->CatFilm . '</h3>';
                        for ($i = 0; $i < count($films); $i++) {
                            echo '<div class="col-sm-12 col-md-4 col-lg-3">';
                            echo '<div class="feature-gallery">';
                            echo '<img class="thumb rounded" id="pochetteFilm' . $films[$i]->idFilm . '" src="' . $dossier . $films[$i]->pochetteFilm . '" alt="" title="">';
                            echo '<div class="fg-overlay text-center">';
                            echo '<h2 class="text-warning" id="titreFilm' . $films[$i]->idFilm . '"><b>' . $films[$i]->titreFilm . '</b></h2>';
                            echo '<p id="resFilm' . $films[$i]->idFilm . '" class="d-inline-block">' . $films[$i]->resFilm . ' |</p>';
                            echo '<p class="text-warning d-inline-block" id="catFilm' . $films[$i]->idFilm . '"><b>&nbsp;' . $films[$i]->CatFilm . '</b></p>';
                            echo '<p class="d-inline-block" id="dureeFilm' . $films[$i]->idFilm . '">' . $films[$i]->dureeFilm . ' |</p><p class="d-inline-block">&nbsp;' . $films[$i]->pubFilm . '</p>';
                            echo '<p>' . $films[$i]->descFilm . '</p>';
                            echo '</div>';
                            echo '</div>';
                            echo '<p class="text-center">';
                            echo '<a href="#" data-target="#previewModal' . $i . '" data-toggle="modal" class="btn btn-danger my-2 mr-2 my-sm-0" role="button"><i class="fas fa-play"></i></a>';
                            echo '<input type="button" class="btnAjouter btn btn-warning" id="nombre' . $films[$i]->idFilm . '" value="' . $films[$i]->prixFilm . '$ Ajouter" onclick="Envoyer(' . $films[$i]->idFilm . ')"></p>';
                            echo '</div>';
                        }
                        echo '</div>';
                        //Navigation

                        echo '<nav aria-label="Page navigation example">';
                        echo '<ul class="pagination justify-content-center pagination">';

                        if ($page == 0) {
                            echo '<li class="page-item disabled">';
                            echo '<a class="page-link" href="#" tabindex="-1" aria-disabled="true">Précédant</a>';
                            echo '</li>';
                        } else {
                            echo '<li class="page-item">';
                            echo '<a class="page-link" href="indexfilm.php?page=' . ($page) . '" >Précédant</a>';
                            echo '</li>';
                        }

                        for ($j = 0; $j < $totalPages; $j++) {
                            if ($page == $j) {
                                echo '<li class="page-item active"><a class="page-link" href="indexfilm.php?page=' . ($j + 1) . '">' . ($j + 1) . '</a></li>';
                            } else {
                                echo '<li class="page-item"><a class="page-link" href="indexfilm.php?page=' . ($j + 1) . '">' . ($j + 1) . '</a></li>';
                            }

                        }
                        if ($page == ($totalPages - 1)) {
                            echo '<li class="page-item disabled">';
                            echo '<a class="page-link" href="#" tabindex="-1" aria-disabled="true">Suivant</a>';
                            echo '</li>';
                        } else {
                            echo '<li class="page-item">';
                            echo '<a class="page-link" href="indexfilm.php?page=' . ($page + 2) . '">Suivant</a>';
                            echo '</li>';
                        }

                        echo '</ul>';
                        echo '</nav>';

                        if (isset($_SESSION['statusUsagerSS'])) {

                            if ($sessionStatus == '1') {
                                echo '<script>';
                                echo 'var btnAjouters = document.querySelectorAll("input[class~=btnAjouter]");';
                                echo ' for (var i = 0; i < btnAjouters.length; i++) {
                                    btnAjouters[i].classList.remove("btnAjouter");
                                }';
                                echo '</script>';

                            }
                        }

                        //<!-- Modal Preview d’un film -->
                        for ($i = 0; $i < count($films); $i++) {
                            echo '<div class="modal fade" id="previewModal' . $i . '" role="dialog">';
                            echo '<div class="modal-dialog">';
                            //<!-- Modal Content -->
                            echo '<div class="modal-content">';
                            echo '<div class="modal-header text-white">';
                            echo '<h4 class="modal-title">' . $films[$i]->titreFilm . '</h4>';
                            echo '</div>';
                            echo '<div class="modal-body" id="modalVideo' . $i . '">';
                            echo '<div class="embed-responsive embed-responsive-16by9">';
                            echo '<iframe width="560" height="315" src="' . $films[$i]->urlFilm . '"';
                            echo 'frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"';
                            echo 'allowfullscreen></iframe>';
                            echo '</div>';
                            echo '</div>';
                            echo '<div class="modal-footer">';
                            echo '<button type="button" class="btn btn-outline-warning" data-dismiss="modal" onclick="arreterVideo(modalVideo' . $i . ')">Quitter</button>';
                            echo '</div>';
                            echo '</div>';
                            echo '</div>';
                            echo '</div>';
                        }
                    }

                } catch (Exception $e) {echo "Probleme pour consulter ";
                } finally {
                   // unset($connexion);
                    //unset($stmt);
                }

                ?>

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
                                    <label for="emailUsager1" class="sr-only">Email</label>
                                    <input type="email" class="form-control" id="emailUsager1" name="emailUsager1"
                                        aria-describedby="emailHelp" placeholder="Entre email">
                                </div>
                                <div class="form-group">
                                    <label for="pwdUsager" class="sr-only">Mot de passe</label>
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
                            <h4 class="modal-title">Membre</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span class="text-warning" aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body" id="membreModalBody">
                            <form id="formMembre" action="viewfilms/enregistrerMembre.php"
                                method="POST" onsubmit="return valider(formMembre, document.getElementById('alert'));">
                                <div class="form-group row">
                                    <div class="alert alert-danger col-12" id="alerte">
                                        <strong>Aille !</strong>
                                        <p id="changer01">Tous les champs sont obligatoires!</p>
                                        <button type="button" class="close" onclick="document.getElementById('alerte').style.display = 'none';">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                </div>
                                <?php
                             
                                include_once "bd/connexion.inc.php";
                                include_once "librairie/membres.inc.php";
                                include_once "librairie/connexions.inc.php";
                                try {
                                    $nomMembre='';
                                    $telMembre='';
                                    $adMembre='';
                                    $cpMembre='';
                                    $emailUsager='';
                                    if (isset($_SESSION['emailUsagerSS'])){
                                        if (($_SESSION['emailUsagerSS'] != '') && ($_SESSION['emailUsagerSS'] != NULL )){
                                            $membre_actif = getconnexion_email($_SESSION['emailUsagerSS']);
                                            $idenMembre = $membre_actif->idMembre;
                                            $membre_donne = getMembre($idenMembre);
                                            $nomMembre=$membre_donne->nomMembre;
                                            $telMembre=$membre_donne->telMembre;
                                            $adMembre=$membre_donne->adMembre;
                                            $cpMembre=$membre_donne->cpMembre;
                                            $emailUsager=$_SESSION['emailUsagerSS'];
                                        }
                                    }  

                                    } catch (Exception $e) {echo "Probleme pour consulter ";
                                    } finally {
                                        //unset($connexion);
                                    }
                                ?>
                                <div class="form-group row">
                                    <label for="nomMembre" class="col-sm-4 col-form-label">Nom</label>
                                    <div class="col-sm-8">
                                        <input name="nomMembre" id="nomMembre" class="form-control" type="text" title="Nom"
                                         value="<?php echo $nomMembre ?>"  required></div>
                                </div>
                                <div class="form-group row">
                                    <label for="telMembre" class="col-sm-4 col-form-label">Telephone</label>
                                    <div class="col-sm-8">
                                        <input type="text" title="Téléphone" class="form-control" id="telMembre" name="telMembre"
                                            pattern="[0-9]{10}" value="<?php echo $telMembre ?>" required></div>
                                </div>
                                <div class="form-group row">
                                    <label for="emailUsager" class="col-sm-4 col-form-label">Email</label>
                                    <div class="col-sm-8">
                                        <input type="email" class="form-control" id="emailUsager" name="emailUsager"
                                            title="email@example.com" value="<?php echo $emailUsager ?>" required></div>
                                </div>
                                <div class="form-group row">
                                    <label for="adMembre" class="col-sm-4 col-form-label">Adresse</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="adMembre" name="adMembre" title="Adresse"
                                        value="<?php echo $adMembre ?>" required></div>
                                </div>
                                <div class="form-group row">
                                    <label for="cpMembrel" class="col-sm-4 col-form-label">Code postal</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="cpMembre" id="cpMembre" class="form-control" title="Code Postal"
                                            pattern="[A-Za-z][0-9][A-Za-z][0-9][A-Za-z][0-9]" title="Lettre Numéro Lettre Numéro Lettre Numéro"
                                            value="<?php echo $cpMembre ?>"  required></div>
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
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
    crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
    crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
    crossorigin="anonymous"></script>
<script src="js/general.js"></script>

</html>