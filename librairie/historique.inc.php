<?php
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
function getRangeesHistorique(){
    global $connexion;
    $requete = "SELECT count(idlocation) as idLocation FROM historique";
    $stmt = $connexion->prepare($requete);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_OBJ);
    return $result;
}

/**
  * Cette fonction ajoute toute l'information de la location dans l'historique 
  *
  * @author  Camilo Puerto - Wilson Reyes - Milton Espitia
  *
  * @version 1.0
  *
  * @param array $rangeHistorique  Array avec tous les paramétres de la requête
  * @return void
  */

function putLocation_historique($rangeHistorique){
    global $connexion;
    $requete = "INSERT INTO historique (idlocation,idFilm,idMembre,dateLocation, joursLocation) values (?,?,?,?,?)";
    $stmt = $connexion->prepare($requete);
    $stmt->execute($rangeHistorique);
    }

/**
  * Cette fonction retourne toute l'information de la location d'une date donnée 
  *
  * @author  Camilo Puerto - Wilson Reyes - Milton Espitia
  *
  * @version 1.0
  *
  * @param string  $DateEchean Date d'échéance 
  * @return array  Retourne un tableau d'objets anonymes contenant l'information des locations
  */
function getLocation_dateEcheance($DateEchean){
    global $connexion;
    $requete = "SELECT a.idlocation,  b.idFilm, a.idMembre, b.dateEcheance, b.joursLocation 
    FROM locations a INNER JOIN  det_locations b ON a.idlocation = b.idlocation WHERE b.dateEcheance = ? ";
    $stmt = $connexion->prepare($requete);
    $stmt->execute(array($DateEchean));
    $result = $stmt->fetchAll(PDO::FETCH_OBJ);
    return $result;
    }


  /**
  * Cette fonction efface toute l'information du détail de location dont la date est égal à la date d'échéance
  *
  * @author  Camilo Puerto - Wilson Reyes - Milton Espitia
  *
  * @version 1.0
  *
  * @param array $rangeedetail  Array avec la date d'échéance 
  * @return void
  */  
function deletedetLocation($rangeedetail){
    global $connexion;
    $requete = "DELETE FROM det_locations  WHERE dateEcheance = ?";
    $stmt = $connexion->prepare($requete);
    $stmt->execute(array($rangeedetail));
    }

/**
  * Cette fonction retourne les identifiants de location qui n'ont pas détail 
  *
  * @author  Camilo Puerto - Wilson Reyes - Milton Espitia
  *
  * @version 1.0
  *
  * @return array  Retourne un tableau d'objets anonymes contenant les locations 
  */
function getLocation_sans_enfants(){
    global $connexion;
    $requete = " SELECT locations.idLocation  FROM locations LEFT JOIN det_locations ON locations.idlocation = det_locations.idlocation
       WHERE det_locations.idfilm IS NULL AND det_locations.dateEcheance <> '0000-00-00' ";
    $stmt = $connexion->prepare($requete);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_OBJ);
    return $result;
}          
/**
  * Cette fonction efface une location qui n'a pas détail 
  *
  * @author  Camilo Puerto - Wilson Reyes - Milton Espitia
  *
  * @version 1.0
  *
  * @param string  $Location Identifiant de la location à effacer 
  * @return void
  */
function deleteLocation_sans_enfants($Location){
    global $connexion;
    $requete = "DELETE FROM Locations WHERE idLocation = ? ";
    $stmt = $connexion->prepare($requete);
    $stmt->execute(array($Location));
    }

/**
  * Cette fonction retourne le nombre des films dans une location  
  *
  * @author  Camilo Puerto - Wilson Reyes - Milton Espitia
  *
  * @version 1.0
  *
  * @return array  Retourne un tableau d'objets anonymes contenant la date d'échéanche et le nombre de films d'une location
  */
function getRangeesCount(){
    global $connexion;
    $requete = "SELECT dateEcheance, count(*) AS nroranges FROM det_locations 
    WHERE dateEcheance < CURDATE() AND DateEcheance <> '0000-00-00' GROUP BY  dateEcheance";
    $stmt = $connexion->prepare($requete);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_OBJ);
    return $result;
}
