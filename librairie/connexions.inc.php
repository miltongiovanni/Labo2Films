<?php
/**
  * Cette fonction ajoute un usager dans la table connexions 
  *
  * @author  Camilo Puerto - Wilson Reyes - Milton Espitia
  *
  * @version 1.0
  *
  * @param array $connexions  Array avec tous les paramétres de la requête
  * @return int Retourne le dernier identifiant de connexions ajouté
  */
 function putconnexions($connexions){
     global $connexion;
     $requete = "INSERT INTO connexions VALUES (?, ?, ?, ?, ?)";
     $stmt = $connexion->prepare($requete);
     $stmt->execute($connexions);
     return $connexion->lastInsertId();
     }
/**
  * Cette fonction retourne l'identifiant avec le courriel emailUsager
  *
  * @author  Camilo Puerto - Wilson Reyes - Milton Espitia
  *
  * @version 1.0
  *
  * @param string  $emailUsager  Courriel de l'usager
  * @return object Retourne un objet anonyme avec l'identifiant de l'usager 
  */
 function getconnexion_email($emailUsager){
    global $connexion;
    $requete = "SELECT idMembre FROM connexions WHERE emailUsager=?";
    $stmt = $connexion->prepare($requete);
    $stmt->execute(array($emailUsager));
    $result = $stmt->fetch(PDO::FETCH_OBJ);
    return $result;
    }
/**
  * Cette fonction retourne le mot de passe chiffré et le status d l'usager 
  *
  * @author  Camilo Puerto - Wilson Reyes - Milton Espitia
  *
  * @version 1.0
  *
  * @param string $emailPassword  Courriel de l'usager à chercher 
  * @return object Retourne un objet anonyme avec le mot de passe chiffré et le status de l'usager 
  */   
function getconnexion_emailpass($emailPassword){
    global $connexion;
    $requete = "SELECT pwdUsager, statusUsager FROM connexions WHERE emailUsager=?";
    $stmt = $connexion->prepare($requete);
    $stmt->execute(array($emailPassword));
    $result = $stmt->fetch(PDO::FETCH_OBJ);
    return $result;
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
function updateEtatUsager($idMembre, $etatMembre){
    global $connexion;
    $requete = "UPDATE connexions SET statusUsager=? WHERE idMembre=?";
    $stmt = $connexion->prepare($requete);
    $stmt->execute(array($etatMembre, $idMembre ));
    }
/**
  * Cette fonction fait la mise à jour des données de connexion d'un membre 
  *
  * @author  Camilo Puerto - Wilson Reyes - Milton Espitia
  *
  * @version 1.0
  *
  * @param array $etatMembre  Array avec tous les paramétres de la requête
  * @return void
  */
    function putupdconnexion($etatMembre){
      global $connexion;
      $requete = "UPDATE connexions SET statusUsager = ? , pwdUsager = ? , profilUsager = ? , emailUsager = ? WHERE idMembre = ?";
      $stmt = $connexion->prepare($requete);
      $stmt->execute($etatMembre);
  }