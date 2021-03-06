<?php
define("USAGER", "root");
define("PASSE", "novaquim");

//Parametres pour la connexion à la base de données: dbname=nomBaseDeDonnés; host=serveur; charset=utf8;
$dsn = 'mysql:dbname=bdfilms;host=localhost;charset=utf8';
$options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

try {
    $connexion = new PDO($dsn, USAGER, PASSE, $options);
} catch (Exception $e) {
    echo 'Connexion incorrect à la base de données';
    echo $e->getMessage();
    exit();
}
