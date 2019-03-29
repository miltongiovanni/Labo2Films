<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="images/favicon.ico" type="image/ico" sizes="16x16">
    <title>WMC Films</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ"
        crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="css/stylesfilm.css">
    
</head>

<body>
    <?php
require_once "../bd/connexion.inc.php";
include_once "../librairie/connexions.inc.php";
include_once "../librairie/panier.inc.php";
session_start();
$emailUsager = $_POST['emailUsager1'];
$pwdUsager = $_POST['pwdUsager'];
try {
    $pwdUsager = sha1($pwdUsager);
    $pwd = getconnexion_emailpass($emailUsager);
    if (!$pwd) {
        $_SESSION['AlertNav'] = 2;
        echo '<script>self.location="../indexfilm.php";</script>';
    } else
    if (($pwd->pwdUsager == $pwdUsager) and ($pwd->statusUsager == '1')) {
        if ($emailUsager == "admin@wmcfilms.com") {
            echo '<script> self.location="adminutilisateur.php";</script>';
            $_SESSION['emailUsagerSS'] = $emailUsager;
            $_SESSION['statusUsagerSS'] = $pwd->statusUsager;
            $_SESSION['idlocationSS'] = 1;
        } else {
            $_SESSION['emailUsagerSS'] = $emailUsager;
            $_SESSION['statusUsagerSS'] = $pwd->statusUsager;
            $idMembre = getStatusUsager($emailUsager);
            if (!($idMembre)) {$_SESSION['idlocationSS'] = 0;} else {
                $TemIdLocation = array($idMembre->idMembre, '');
                $idLocationActi = getidLocation($TemIdLocation);
                if (!($idLocationActi)) {
                    $_SESSION['idlocationSS'] = 0;
                } else {
                    $_SESSION['idlocationSS'] = $idLocationActi->idlocation;
                }
            }
            echo $_SESSION['idlocationSS'];
            // echo '1 el email del usuario es'.$emailUsager;
            echo '<script>self.location="../indexfilm.php";</script>';
            echo '<script>';
            echo 'montrerElem();';
            echo '</script>';
        }
    } else {
        if (($pwd->statusUsager == '0') and ($pwd->pwdUsager == $pwdUsager)){
            $_SESSION['AlertNav'] = 5;
            echo '<script>self.location="../indexfilm.php";</script>';

        } else {
            $_SESSION['AlertNav'] = 2;
            echo '<script>self.location="../indexfilm.php";</script>';
        }
    }
} catch (Exception $e) {echo " Problème pour commencer la session ";
    //   echo $e->getMessage();
} finally {
    unset($connexion);
    unset($stmt);
    // echo '2';
    // exit;
    // echo '<script>
    //     self.location="../indexfilm.php";
    //     </script>';
}
?>
</body>
<script src="js/general.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
    crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
    crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
    crossorigin="anonymous"></script>

</html>