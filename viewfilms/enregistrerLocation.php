<?php
session_start();
if(!(isset($_SESSION['statusUsagerSS'])))
{  return 'X';}
$emailUsager = $_SESSION['emailUsagerSS'];
$statusUsager = $_SESSION['statusUsagerSS'];
$idFilm = $_REQUEST['idFilm'];

// echo '<br> Email :'.$emailUsager;
// echo '<br> Status:'.$statusUsager;
// echo '<br> Film  :'.$idFilm;
// $emailUsager ='ingwilsonreyes@gmail.com';
// $statusUsager = '1';
// $idFilm = '2';
require_once "../bd/connexion.inc.php";
include_once "../librairie/membres.inc.php";
include_once "../librairie/connexions.inc.php";
include_once "../librairie/panier.inc.php";
if ($statusUsager = '0') {return;}
try {
    $idrecevoirMem = getconnexion_email($emailUsager);
    if (!$idrecevoirMem) {
        echo "Utilisateur invalide";
        exit;
    } else {
        // prix du film
        $filmprix = getFilmprix($idFilm);
        $location = array($idrecevoirMem->idMembre, '');
        $getdoclocation = getidLocation($location);
        if (!$getdoclocation) { // je dois créer un document
            $tetdoc = array($idrecevoirMem->idMembre);
            $nrodoc = putTetePanier($tetdoc); //Nouveau nombre du document
            $tetconta = array($nrodoc, 0, '');
            putContabilite($tetconta);
            $_SESSION['idlocationSS'] = $nrodoc;

            $detdoc = array($nrodoc, $idFilm, '1', $filmprix->prixFilm, '0000-00-00');
            
            putdetailPanier($detdoc);

        } else { //// je dois mettre à jour le document
            $_SESSION['idlocationSS'] = $getdoclocation->idlocation;
            $detdoc = array($getdoclocation->idlocation, $idFilm);
            $filmdeja = getFilmPanier($detdoc);  
            // echo var_dump($filmdeja);
            // exit;
            if ($filmdeja == null) { // nouveau détail  prixFilm
                $detdoc = array($getdoclocation->idlocation, $idFilm, '1', $filmprix->prixFilm, '0000-00-00');
                putdetailPanier($detdoc);
                // echo 'location' . $getdoclocation->idlocation . '<br> Nro film : ' . $idFilm;
            }

        }
        
        $Nrofilms = getcountFilmdet($_SESSION['idlocationSS']);
        echo $Nrofilms->kfilms;
        
    }
    // echo $Nrofilms->kfilms;
} catch (Exception $e) {echo "Probleme pour consulter ";
    //   echo $e->getMessage();
} finally {
    unset($connexion);
    unset($stmt);
}
