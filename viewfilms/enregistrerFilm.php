<?php

$titreFilm = $_POST['titreFilm'];
$idCatFilm = $_POST['idCatFilm'];
$resFilm = $_POST['resFilm'];
$dureeFilm = $_POST['dureeFilm'];
$prixFilm = $_POST['prixFilm'];
$urlFilm = $_POST['urlFilm'];
$pubFilm = $_POST['pubFilm'];
$descFilm = $_POST['descFilm'];
$dossier = "../pochettes/";
$nomPochette = $_POST['titreFilm'];
include_once "../BD/connexion.inc.php";
include_once "../librairie/film.inc.php";
include_once "../librairie/gestionFichiers.inc.php";


if ($_FILES['pochetteFilm']['tmp_name'] !== "") {
    //Upload de la photo
    $pochetteFilm=deposerFichier("pochetteFilm",$dossier,$nomPochette);
}



$film=array($titreFilm, $idCatFilm, $resFilm, $pochetteFilm, $dureeFilm, $urlFilm, $pubFilm, $descFilm, $prixFilm);


try {
    insertFilm($film);
    echo '<script>
        self.location="listerFilms.php";
        </script>';
} catch (Exception $e) {
    echo "Probleme pour insérer le film";
} finally {
    unset($connexion);
    unset($stmt);
}


/*
$requete="INSERT INTO films VALUES(0,'$titre','$res','$pochette')";
if($result=@mysql_query($requete,$connexion)){
$numFilm=@mysql_insert_id($connexion);
echo "Film ".$numFilm." bien enregistre";
}else {
echo "Probleme d'insertion";
}
@mysql_close($connexion);
?>
<br><br><a href="../accueil.html">Retour a accueil</a>*/
