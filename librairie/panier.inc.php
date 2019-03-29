<?php
/**
 * Cette fonction ajoute une nouvelle location
 *
 * @author  Camilo Puerto - Wilson Reyes - Milton Espitia
 *
 * @version 1.0
 *
 * @param array    $panier  Tableau avec tous les paramétres de la requête pour insérer la location
 * @return void
 */
function putTetePanier($panier){
    global $connexion;
    $requete = "INSERT INTO locations VALUES (0, ?, current_date())";
    $stmt = $connexion->prepare($requete);
    $stmt->execute($panier);
    return $connexion->lastInsertId();
}
/**
 * Cette fonction ajoute un nouveau détail de la location
 *
 * @author  Camilo Puerto - Wilson Reyes - Milton Espitia
 *
 * @version 1.0
 *
 * @param array    $panier  Tableau avec tous les paramétres de la requête pour insérer le détail de la location
 * @return void
 */
function putdetailPanier($panier){
    global $connexion;
    $requete = "INSERT INTO det_locations VALUES (?, ?, ?, ?, ?)";
    $stmt = $connexion->prepare($requete);
    $stmt->execute($panier);
}
/**
 * Cette fonction fait l'enregistrement de la location dans la comptabilité
 *
 * @author  Camilo Puerto - Wilson Reyes - Milton Espitia
 *
 * @version 1.0
 *
 * @param array    $panier  Tableau avec tous les paramétres de la requête pour insérer le détail de la location
 * @return void
 */             
function putContabilite($teteconta){
    global $connexion;
    $requete = "INSERT INTO comptabilite (idLocation,totalLocation,numReference) VALUES (?, ?, ?)";
    $stmt = $connexion->prepare($requete);
    $stmt->execute($teteconta);
}
/**
 * Cette fonction efface les détails d'une location
 *
 * @author  Camilo Puerto - Wilson Reyes - Milton Espitia
 *
 * @version 1.0
 *
 * @param array  $panierdet  Tableau avec tous les paramétres de la requête pour effacer le détail de la location
 * @return void
 */
function deletedetailPanierfilm($panierdet){
    global $connexion;
    $requete = "DELETE FROM det_locations WHERE idlocation =? and idFilm = ?";
    $stmt = $connexion->prepare($requete);
    $stmt->execute($panierdet);
}
/**
 * Cette fonction efface une location
 *
 * @author  Camilo Puerto - Wilson Reyes - Milton Espitia
 *
 * @version 1.0
 *
 * @param array  $panier  Tableau avec tous les paramétres de la requête pour effacer la location
 * @return void
 */
function deletedetailPanier($panier){
    global $connexion;
    $requete = "DELETE FROM det_locations WHERE idlocation =?";
    $stmt = $connexion->prepare($requete);
    $stmt->execute(array($panier));
}
/**
  * Cette fonction retourne l'identifiant et l'état du membre avec le courriel emailUsager
  *
  * @author  Camilo Puerto - Wilson Reyes - Milton Espitia
  *
  * @version 1.0
  *
  * @param string  $emailUsager  Courriel de l'usager
  * @return object Retourne un objet anonyme avec l'identifiant et l'état de l'usager 
  */
function getStatusUsager($emailUsager){
    global $connexion;
    $requete = "SELECT idMembre,  statusUsager  FROM connexions WHERE( emailUsager=?)";
    $stmt = $connexion->prepare($requete);
    $stmt->execute(array($emailUsager));
    $result = $stmt->fetch(PDO::FETCH_OBJ);
    return $result;
}
/**
  * Cette fonction retourne l'identifiant de la location 
  *
  * @author  Camilo Puerto - Wilson Reyes - Milton Espitia
  *
  * @version 1.0
  *
  * @param array  $idLoc_ref  Tableau avec l'identifiant du membre et le numêro de réference 
  * @return object Retourne un objet anonyme avec l'identifiant de la location
  */
function getidLocation($idLoc_ref){
        global $connexion;
        $requete = "SELECT a.idlocation FROM locations a INNER JOIN comptabilite b ON a.idLocation = b.idLocation
        WHERE a.idMembre = ? AND b.numreference = ?";
        $stmt = $connexion->prepare($requete);
        $stmt->execute($idLoc_ref);
        $result = $stmt->fetch(PDO::FETCH_OBJ);
        return $result;
    }

/**
  * Cette fonction retourne l'identifiant et la pochette des films disponibles pour un membre
  *
  * @author  Camilo Puerto - Wilson Reyes - Milton Espitia
  *
  * @version 1.0
  *
  * @param int $idMembre  Identifiant du membre
  * @return object Retourne un objet anonyme avec l'identifiant et la pochette des films
  */
function getFilmsAct($idMembre){
        global $connexion;
        $requete = "SELECT det_locations.idFilm, films.pochetteFilm FROM det_locations 
        INNER JOIN locations ON det_locations.idLocation = locations.idLocation 
        INNER JOIN films ON det_locations.idFilm = films.idFilm 
        WHERE dateEcheance >= current_date() AND locations.idMembre = ?";
        $stmt = $connexion->prepare($requete);
        $stmt->execute(array($idMembre));
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $result;
}
/**
  * Cette fonction retourne l'identifiant du film qui est dans le détail de location
  *
  * @author  Camilo Puerto - Wilson Reyes - Milton Espitia
  *
  * @version 1.0
  *
  * @param array $idloc_Film  Tableau avec l'identifiant de la location et l'idenfiant du film
  * @return object Retourne un objet anonyme avec l'identifiant du film
  */
function getFilmPanier($idloc_Film){
    global $connexion;
    $requete = "SELECT idFilm  FROM det_locations  WHERE idlocation=? AND idFilm=?";
    $stmt = $connexion->prepare($requete);
    $stmt->execute($idloc_Film);
    $result =  $stmt->fetch(PDO::FETCH_OBJ);
    return $result;
}
/**
 * Cette fonction retourne le nombre total de films par location
 *
 * @author  Camilo Puerto - Wilson Reyes - Milton Espitia
 *
 * @version 1.0
 *
 * @param int $idloc  Identifiant de la location
 * @return  object  Retourne un objet anonyme avec le nombre de films par location
 */
function getcountFilmdet($idloc){
    global $connexion;
    $requete = "SELECT COUNT(idFilm) AS kfilms  FROM det_locations  WHERE idlocation=?";
    $stmt = $connexion->prepare($requete);
    $stmt->execute(array($idloc));
    return $stmt->fetch(PDO::FETCH_OBJ);
}

/**
 * Cette fonction retourne le prix d'un film
 *
 * @author  Camilo Puerto - Wilson Reyes - Milton Espitia
 *
 * @version 1.0
 *
 * @param int $idFilm  Identifiant du film
 * @return  object  Retourne un objet anonyme avec le prix de film
 */
function getFilmprix($idFilm){
    global $connexion;
    $requete = "SELECT prixFilm  FROM films  WHERE idfilm = ?";
    $stmt = $connexion->prepare($requete);
    $stmt->execute(array($idFilm));
    return $stmt->fetch(PDO::FETCH_OBJ);
}
/**
 * Cette fonction fait la mise à jour de le prix du détail de la location
 *
 * @author Camilo Puerto - Wilson Reyes - Milton Espitia
 *
 * @version 1.0
 *
 * @param array   $panier  Tableau avec tous les paramétres de la requête pour la mise à jour le prix du détail de la location
 * @return void
 */
function putjourprix($panier)
{    global $connexion;
    $requete = "UPDATE det_locations SET JoursLocation = ?, prixLocation = ?  WHERE idLocation = ? and idFilm = ?";
    $stmt = $connexion->prepare($requete);
    $stmt->execute($panier);
}

/**
 * Cette fonction retourne un tableau contenant toute l'information du détail d'une location
 * 
 * @author  Camilo Puerto - Wilson Reyes - Milton Espitia
 *
 * @version 1.0
 *
 * @param int  $panierReg  Identifiant de la location
 * @return array  Retourne un tableau d'objets anonymes contenant toute l'information du détail de la location 
 */
function getfilmsPanier($panierReg){
    global $connexion;
     $requete = "SELECT det_locations.idFilm, det_locations.joursLocation, det_locations.prixLocation, films.pochetteFilm, films.titreFilm  FROM det_locations  INNER JOIN films ON det_locations.idFilm = films.idFilm  WHERE idLocation = ?";
     $stmt = $connexion->prepare($requete);
     $stmt->execute(array($panierReg));
     $result = $stmt->fetchAll(PDO::FETCH_OBJ);
     return $result;
}
/**
 * Cette fonction fait la mise à jour des jours de location du détail de la location
 *
 * @author Camilo Puerto - Wilson Reyes - Milton Espitia
 *
 * @version 1.0
 *
 * @param array   $panier  Tableau avec tous les paramétres de la requête pour la mise à jour des jours de location du détail de la location
 * @return void
 */
function putjourPanier($panier)
{   global $connexion;
    $requete = "UPDATE det_locations SET joursLocation = ? WHERE  idLocation = ? AND idFilm = ?";
    $stmt = $connexion->prepare($requete);
    $stmt->execute($panier);
}
/**
 * Cette fonction fait la mise à jour du prix de location du détail de la location
 *
 * @author Camilo Puerto - Wilson Reyes - Milton Espitia
 *
 * @version 1.0
 *
 * @param array   $panier  Tableau avec tous les paramétres de la requête pour la mise à jour des jours de location du détail de la location
 * @return void
 */
function putprixPanier($panier)
{    global $connexion;
    $requete = "UPDATE det_locations INNER JOIN films ON det_locations.idFilm = films.idFilm 
    SET det_locations.prixLocation = det_locations.joursLocation * films.prixFilm WHERE idLocation = ? AND films.idFilm = ?";
    $stmt = $connexion->prepare($requete);
    $stmt->execute($panier);
}

/**
 * Cette fonction fait la mise à jour du total de location dans la comptabilité
 *
 * @author Camilo Puerto - Wilson Reyes - Milton Espitia
 *
 * @version 1.0
 *
 * @param array   $panierComptabilite  Tableau avec tous les paramétres de la requête pour la mise à jour du total de location
 * @return void
 */
function putpaiement($panierComptabilite)
{    global $connexion;
    $requete = "UPDATE comptabilite SET totalLocation = (SELECT SUM(prixLocation) FROM det_locations  
    WHERE det_locations.idLocation = ?), dateLocation = CURDATE(), numReference = 1000000+ROUND(RAND()*10000) WHERE   comptabilite.idlocation = ?";
    $stmt = $connexion->prepare($requete);
    $stmt->execute($panierComptabilite);
}
/**
 * Cette fonction fait la mise à jour de la date d'écheance du total de location dans le détail de location
 *
 * @author Camilo Puerto - Wilson Reyes - Milton Espitia
 *
 * @version 1.0
 *
 * @param array   $panierEcheance  Tableau avec tous les paramétres de la requête pour la mise à jour de la date d'écheance du total de location dans le détail de location
 * @return void
 */
function putfilmActiver($panierEcheance)
{    global $connexion;
    $requete = "UPDATE det_locations SET dateEcheance = ADDDATE(CURDATE(), INTERVAL joursLocation DAY) WHERE idLocation = ?";
    $stmt = $connexion->prepare($requete);
    $stmt->execute(array($panierEcheance));
}