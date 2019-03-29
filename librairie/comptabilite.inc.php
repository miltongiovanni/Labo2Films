<?php
/**
 * Cette fonction retourne un tableau contenant toute l'information des locations dans la comptabilité
 * 
 * @author  Camilo Puerto - Wilson Reyes - Milton Espitia
 *
 * @version 1.0
 *
 * @return array  Retourne un tableau d'objets anonymes contenant toute l'information des locations dans la comptabilité
 */
function getComptabilite(){
    global $connexion;
    $requete = "SELECT idLocation, totalLocation, dateLocation, numReference FROM comptabilite WHERE totalLocation >= 0";
    $stmt = $connexion->prepare($requete);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_OBJ);
    return $result;
}
/**
 * Cette fonction retourne le nombre de films par location dans la comptabilité
 * 
 * @author  Camilo Puerto - Wilson Reyes - Milton Espitia
 *
 * @version 1.0
 *
 * @param int  $panierReg  Identifiant de la location
 * @return array  Retourne un objet anonyme contenant le nombre de films par location 
 */
function getRangeesCompta(){
    global $connexion;
    $requete = "SELECT count(idlocation) as idLocation FROM comptabilite  WHERE totalLocation >= 0";
    $stmt = $connexion->prepare($requete);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_OBJ);
    return $result;
}
