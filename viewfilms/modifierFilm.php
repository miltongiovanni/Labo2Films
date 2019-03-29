<?php

$idFilm = $_POST['idFilm'];
$titreFilm = $_POST['titreFilm'];
$idCatFilm = $_POST['idCatFilm'];
$resFilm = $_POST['resFilm'];
$dureeFilm = $_POST['dureeFilm'];
$prixFilm = $_POST['prixFilm'];
$urlFilm = $_POST['urlFilm'];
$pubFilm = $_POST['pubFilm'];
$descFilm = $_POST['descFilm'];
$tmp=$_FILES['pochetteFilm']['tmp_name'];
$ancienpochette = $_POST['ancienpochette'];
$dossier = "../pochettes/";
$nomPochette = $_POST['titreFilm'];
include_once "../BD/connexion.inc.php";
include_once "../librairie/film.inc.php";
include_once "../librairie/gestionFichiers.inc.php";

if($tmp !== ""){
	//Je dois enlever l'ancienne pochete
	enleverFichier($dossier,$ancienpochette);
	$nomPochette=$titreFilm;
	$pochetteFilm=deposerFichier("pochetteFilm",$dossier,$nomPochette);
}else{
    $extension=strrchr($ancienpochette,'.');
    $pochetteFilm=$titreFilm.$extension;
    rename($dossier.$ancienpochette, $dossier.$pochetteFilm);
}

$film=array($titreFilm, $idCatFilm, $resFilm, $pochetteFilm, $dureeFilm, $prixFilm, $urlFilm, $pubFilm, $descFilm, $idFilm);

try {
    updateFilm($film);
    echo '<script>
        self.location="listerFilms.php";
        </script>';
} catch (Exception $e) {
    echo "Problème pour modifier le film";
} finally {
    unset($connexion);
    unset($stmt);
}
?>