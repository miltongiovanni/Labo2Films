<?php
/**
  * Cette fonction ajoute un membre dans la table membres 
  *
  * @author  Camilo Puerto - Wilson Reyes - Milton Espitia
  *
  * @version 1.0
  *
  * @param array $Membre  Array avec tous les paramétres de la requête
  * @return int Retourne le dernier identifiant du membre ajouté
  */
function putMembres($Membre){
    global $connexion;
    /*Prepare l'insert' */
    $requete = "INSERT INTO membres VALUES (0, ?,?,?,?)";
    $stmt = $connexion->prepare($requete);
    $stmt->execute($Membre);
    return $connexion->lastInsertId();
}
/**
  * Cette fonction change l'état du membre identifie par idMembre
  *
  * @author  Camilo Puerto - Wilson Reyes - Milton Espitia
  *
  * @version 1.0
  *
  * @param int    $idMembre  Identifiant du membre
  * @param string    $etatMembre  État du membre
  * @return void
  */
function putupdMembre($Membre){
    global $connexion;
    $requete = "UPDATE membres SET nomMembre = ? , telMembre = ?, adMembre = ? , cpMembre = ? WHERE idMembre = ?;";
    $stmt = $connexion->prepare($requete);
    $stmt->execute(array($Membre));
}
/**
 * Cette fonction retourne un tableau contenant toute l'information des membres
 * 
 * @author  Camilo Puerto - Wilson Reyes - Milton Espitia
 *
 * @version 1.0
 *
 * @return  array  Retourne un tableau d'objets anonymes contenant l'information de tous les membres
 */
function getMembres(){
    global $connexion;
    $requete = "SELECT membres.idMembre, nomMembre, telMembre, adMembre, cpMembre, emailUsager, statusUsager FROM membres, connexions WHERE membres.idMembre=connexions.idMembre";
    $stmt = $connexion->prepare($requete);
    $stmt->execute();
    return $result = $stmt->fetchAll(PDO::FETCH_OBJ);
}
/**
 * Cette fonction retourne un tableau contenant toute l'information d'un membre
 * 
 * @author  Camilo Puerto - Wilson Reyes - Milton Espitia
 *
 * @version 1.0
 *
 * @param int  $idMembre  Identifiant du membre
 * @return  array  Retourne un objet anonyme contenant l'information du membre 
 */
function getMembre($idMembre){
    global $connexion;
    $requete = "SELECT membres.idMembre, nomMembre, telMembre, adMembre, cpMembre, emailUsager, statusUsager FROM membres, connexions WHERE membres.idMembre=connexions.idMembre AND membres.idMembre=?";
    $stmt = $connexion->prepare($requete);
    $stmt->execute(array($idMembre));
    return $result = $stmt->fetch(PDO::FETCH_OBJ);
}