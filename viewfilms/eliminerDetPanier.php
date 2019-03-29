<?php
session_start();
$idLocation = $_SESSION['idlocationSS'];
$idfilm = $_POST['idposition'] ;

require_once "../bd/connexion.inc.php";
include_once "../librairie/panier.inc.php";
//    echo "Documento: ".$idLocation;
//    echo "<br> Film: ". $idfilm;
//    exit;

try {
    $panierdet = array($idLocation,$idfilm);
    deletedetailPanierfilm($panierdet);
    echo '<script>
        self.location="panier.php";
        </script>';
} catch (Exception $e) {
    echo "Problème pour eliminer le panier";
} finally {
    unset($connexion);
    unset($stmt);
}
?>