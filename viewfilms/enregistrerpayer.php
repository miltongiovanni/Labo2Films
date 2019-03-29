<?php
session_start();
$idLocation = $_SESSION['idlocationSS'];
require_once "../bd/connexion.inc.php";
include_once "../librairie/panier.inc.php";
// echo "Termine el proceso";
// exit;

try {
    //  $idLocation = 11; 
    
    $bis_idlocation = array($idLocation,$idLocation);
    putpaiement($bis_idlocation);
    putfilmActiver($idLocation);
    $_SESSION['idlocationSS'] = 0;
    // echo "Termine el proceso :".$idLocation;
    // exit;
    echo '<script>
        self.location="../indexfilm.php";
        </script>';
} catch (Exception $e) {
    echo " Problèmes pour payer des films";
} finally {
    unset($connexion);
    unset($stmt);
}
