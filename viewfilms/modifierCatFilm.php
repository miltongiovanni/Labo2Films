<?php
$idCatFilm = $_POST['idCatFilm'];
$catFilm = $_POST['catFilm'];
include_once "../BD/connexion.inc.php";
include_once "../librairie/cateFilm.inc.php";

try {
    updateCatFilm($idCatFilm, $catFilm);
    echo '<script>
        self.location="listerCategories.php";
        </script>';
} catch (Exception $e) {
    echo "Probleme pour insérer la catégorie de film";
} finally {
    unset($connexion);
    unset($stmt);
}
?>