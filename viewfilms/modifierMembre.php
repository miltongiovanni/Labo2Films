<?php
$idMembre = $_POST['idMembre'];
$statusUsager = $_POST['statusUsager'];
include_once "../BD/connexion.inc.php";
include_once "../librairie/connexions.inc.php";



try {
    if($statusUsager==1){
        updateEtatUsager($idMembre, 0);
    }else{
        updateEtatUsager($idMembre, 1);
    }
    echo '<script>
        self.location="listerMembres.php";
        </script>';
} catch (Exception $e) {
    echo "Probleme pour la modification du membre";
} finally {
    unset($connexion);
    unset($stmt);
}
?>