<?php
$idFilm = $_POST['idFilm'];
include_once "../BD/connexion.inc.php";
include_once "../librairie/film.inc.php";
echo "film ".$idFilm;

try {
    deleteFilm($idFilm);
    echo '<script>
        self.location="listerFilms.php";
        </script>';
} catch (Exception $e) {
    echo "Probleme pour eliminer le film";
} finally {
    unset($connexion);
    unset($stmt);
}
?>