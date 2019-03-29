<?php
$idCatFilm = $_POST['idCatFilm'];
include_once "../BD/connexion.inc.php";
include_once "../librairie/cateFilm.inc.php";

try {
    deleteCatFilm($idCatFilm);
    echo '<script>
        self.location="listerCategories.php";
        </script>';
} catch (Exception $e) {
    echo "Problème pour eliminer la catégorie de film";
} finally {
    unset($connexion);
    unset($stmt);
}
?>