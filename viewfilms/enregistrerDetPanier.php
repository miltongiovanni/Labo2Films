<?php
session_start();
$idLocation = $_SESSION['idlocationSS'];
$idfilm = $_POST['idposition'] ;
$idfilmjour = $_POST['quantiteUpd'];

// echo "Location :".$idLocation;
// echo "Jour :".$idfilmjour;
// echo "Film :".$idfilm;

require_once "../bd/connexion.inc.php";
include_once "../librairie/panier.inc.php";
try {
    $panierdet= array($idfilmjour,$idLocation, $idfilm);
    putjourPanier($panierdet);
    $panierdet= array($idLocation, $idfilm);
    putprixPanier($panierdet);
    echo '<script>
        self.location="panier.php";
        </script>';
} catch (Exception $e) {
    echo "Problème pour jours de mise à jour du film";
} finally {
    unset($connexion);
    unset($stmt);
}
