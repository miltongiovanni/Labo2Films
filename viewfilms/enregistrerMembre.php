<?php
session_start();
require_once "../bd/connexion.inc.php";
include_once "../librairie/membres.inc.php";
include_once "../librairie/connexions.inc.php";

$nomMembre   = $_POST['nomMembre'];
$telMembre   = $_POST['telMembre'];
$adMembre    = $_POST['adMembre'];
$cpMembre    = $_POST['cpMembre'];
$pwdUsager1  = $_POST['pwdUsager1'];
$pwdUsager2  = $_POST['pwdUsager2'];
$emailUsager = $_POST['emailUsager'];
if ($pwdUsager1  == $pwdUsager2 ) {
    try{
        $membre_actif = getconnexion_email($emailUsager); 
        $membre = array($nomMembre, $telMembre, $adMembre, $cpMembre);
        if(!$membre_actif) {
             $membre_new = putMembres($membre);
             if ($emailUsager == "admin@wmcfilms.com"){
                 $profilUsager = 'A';
             }else{
                $profilUsager = 'U';
             }
             $pwdUsager1=sha1($pwdUsager2);
             $login_conx= array($membre_new, '1', $pwdUsager1, $profilUsager, $emailUsager);
             $last_connex= putconnexions($login_conx);
             $_SESSION['AlertNav'] = 1;
            }
        else
            {// Update
                $idMembreActif=$membre_actif->idMembre;
                
              $membre = array($nomMembre, $telMembre, $adMembre, $cpMembre, $idMembreActif);  
              putupdMembre($membre);
              $pwdUsager1=sha1($pwdUsager2);
              $login_conx= array('1', $pwdUsager1, 'U', $emailUsager,$idMembreActif);
              putupdconnexion($login_conx);
              $_SESSION['AlertNav'] = 4;
            }   
            echo '<script>self.location="../indexfilm.php";</script>';
        }
      
    catch (Exception $e)
        { echo "Probleme pour consulter ";
        //   echo $e->getMessage();
        } 
    finally {
         unset($connexion);
         unset($stmt);
    }
} else {
    $_SESSION['AlertNav']=2;
    echo '<script>self.location="../indexfilm.php";</script>';
}
?>

<!-- $("#alert4").alert(); -->