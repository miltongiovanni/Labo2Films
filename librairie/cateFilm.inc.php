<?php
/**
 * Cette fonction ajoute une nouvelle catégorie de film
 *
 * @author  Camilo Puerto - Wilson Reyes - Milton Espitia
 *
 * @version 1.0
 *
 * @param string    $catFilm  Description de la catégorie
 * @return void
 */
function insertCatFilm($catFilm){
    global $connexion;
    /*Prepare l'insert' */
    $requete = "INSERT INTO catfilms VALUES (0, ?)";
    $stmt = $connexion->prepare($requete);
    $stmt->execute(array($catFilm));
}
/**
 * Cette fonction efface une catégorie de film
 *
 * @author  Camilo Puerto - Wilson Reyes - Milton Espitia
 *
 * @version 1.0
 *
 * @param int  $idCatFilm  Identifiant de la catégorie
 * @return void
 */
function deleteCatFilm($idCatFilm){
    global $connexion;
    $requete = "DELETE FROM catfilms WHERE idCatFilm=?";
    $stmt = $connexion->prepare($requete);
    $stmt->execute(array($idCatFilm));
}
/**
 * Cette fonction retourne un tableau contenant toutes les catégories de film
 *
 * @author  Camilo Puerto - Wilson Reyes - Milton Espitia
 *
 * @version 1.0
 *
 * @return  array  Retourne un tableau d'objets anonymes contenant toutes les catégories de film enregistrées
 */
function getCatFilms(){
    global $connexion;
    $requete = "SELECT idCatFilm, catFilm FROM catfilms";
    $stmt = $connexion->prepare($requete);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_OBJ);
    return $result;
}
/**
 * Cette fonction retourne l'information de la catégorie de film identifiée par idCatFilm
 *
 * @author  Camilo Puerto - Wilson Reyes - Milton Espitia
 *
 * @version 1.0
 *
 * @param int $idCatFilm  Identifiant de la catégorie
 * @return object Retourne un objet anonyme contenant la catégorie de film identifiée par idCatFilm
 */
function getCatFilm($idCatFilm){
    global $connexion;
    $requete = "SELECT idCatFilm, catFilm FROM catfilms WHERE idCatFilm=?";
    $stmt = $connexion->prepare($requete);
    $stmt->execute(array($idCatFilm));
    return $stmt->fetch(PDO::FETCH_OBJ);
}
/**
 * Cette fonction fait la mise à jour de l'information de la catégorie de film identifie par idCatFilm
 *
 * @author  Camilo Puerto - Wilson Reyes - Milton Espitia
 *
 * @version 1.0
 *
 * @param int    $idCatFilm  Identifiant de la catégorie
 * @param string    $catFilm  Description de la catégorie
 * @return void
 */
function updateCatFilm($idCatFilm, $catFilm){
    global $connexion;
    $requete = "UPDATE catfilms SET catFilm=? WHERE idCatFilm=?";
    $stmt = $connexion->prepare($requete);
    $stmt->execute(array($catFilm, $idCatFilm ));
}
