<?php
require_once "../bd/connexion.inc.php";
require_once "../librairie/historique.inc.php";
session_start();
$DateHistorique = $_POST['DateHistorique'];
if ($DateHistorique !== "choisir...") {
    try {
        $rangeesEcheance = getLocation_dateEcheance($DateHistorique);
        for ($i = 0; $i < count($rangeesEcheance); $i++) {
             $rangeHistorique = array($rangeesEcheance[$i]->idlocation, $rangeesEcheance[$i]->idFilm, $rangeesEcheance[$i]->idMembre, $rangeesEcheance[$i]->dateEcheance, $rangeesEcheance[$i]->joursLocation);
             putLocation_historique($rangeHistorique);
         }
        deletedetLocation($DateHistorique);
        $rangeesLocation = getLocation_sans_enfants();
        for ($i = 0; $i < count($rangeesLocation); $i++) {
             deleteLocation_sans_enfants($rangeesLocation->idLocation);
        }
    } catch (Exception $e) {echo "Probleme pour consulter ";
        //   echo $e->getMessage();
    } finally {
        unset($connexion);
        unset($stmt);
        echo "Processus est fini!";
        echo '<script>
              self.location="listerhistorique.php?pagina=1";
             </script>';
    }
}
