<?php
session_start();
$idLocation = $_SESSION['idlocationSS'];
require_once "../bd/connexion.inc.php";
include_once "../librairie/panier.inc.php";
try {
    deletedetailPanier($idLocation);
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