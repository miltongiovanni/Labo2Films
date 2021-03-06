<?php
/**
 * Cette fonction ajoute un nouveau film
 *
 * @author  Camilo Puerto - Wilson Reyes - Milton Espitia
 *
 * @version 1.0
 *
 * @param array    $film  Tableau avec tous les paramétres de la requête pour insérer le film
 * @return void
 */
function insertFilm($film){
    global $connexion;
    $requete = "INSERT INTO films VALUES (0, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $connexion->prepare($requete);
    $stmt->execute($film);
}
/**
 * Cette fonction efface un film
 *
 * @author  Camilo Puerto - Wilson Reyes - Milton Espitia
 *
 * @version 1.0
 *
 * @param int  $idFilm  Identifiant du film
 * @return void
 */
function deleteFilm($idFilm){
    global $connexion;
    $requete = "DELETE FROM films WHERE idFilm=?";
    $stmt = $connexion->prepare($requete);
    $stmt->execute(array($idFilm));
}
/**
 * Cette fonction retourne un tableau contenant tous les films avec leur catégorie ou les 8 films après le film avec l'index initial
 * Si la valeur initial est égal -1 retourne tous les films autrement les 8 films après l'index
 * 
 * @author  Camilo Puerto - Wilson Reyes - Milton Espitia
 *
 * @version 1.0
 *
 * @param int  $initial  Limite inférieur  de la requête Identifiant du film
 * @return  array  Retourne un tableau d'objets anonymes contenant les films consultés 
 */
function getFilms($initial){
    global $connexion;
    if($initial==-1){
        $requete = "SELECT idFilm, titreFilm, films.idCatFilm, CatFilm, resFilm, pochetteFilm, dureeFilm, prixFilm, urlFilm, pubFilm, descFilm 
        FROM films, catfilms WHERE films.idCatFilm=catfilms.idCatFilm ORDER BY idFilm";
    }else{
        $requete = "SELECT idFilm, titreFilm, films.idCatFilm, CatFilm, resFilm, pochetteFilm, dureeFilm, prixFilm, urlFilm, pubFilm, descFilm 
        FROM films, catfilms WHERE films.idCatFilm=catfilms.idCatFilm ORDER BY idFilm LIMIT $initial, 8 ";
    }
    
    $stmt = $connexion->prepare($requete);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_OBJ);
    return $result;
}
/**
 * Cette fonction retourne l'information du film identifiée par idFilm
 *
 * @author  Camilo Puerto - Wilson Reyes - Milton Espitia
 *
 * @version 1.0
 *
 * @param int $idFilm  Identifiant du film
 * @return object Retourne un objet anonyme contenant toute l'information du film identifiée par idFilm
 */
function getFilm($idFilm){
     global $connexion;
     $requete = "SELECT idFilm, titreFilm, films.idCatFilm, CatFilm, resFilm, pochetteFilm, dureeFilm, prixFilm, urlFilm, pubFilm, descFilm 
     FROM films, catfilms WHERE films.idCatFilm=catfilms.idCatFilm AND idFilm=?";
     $stmt = $connexion->prepare($requete);
     $stmt->execute(array($idFilm));
     return $stmt->fetch(PDO::FETCH_OBJ);
 }
/**
 * Cette fonction fait la mise à jour de l'information de la catégorie de film identifie par idCatFilm
 *
 * @author Camilo Puerto - Wilson Reyes - Milton Espitia
 *
 * @version 1.0
 *
 * @param array   $film  Tableau avec tous les paramétres de la requête pour la mise à jour du film
 * @return void
 */
function updateFilm($film){
    global $connexion;
    $requete = "UPDATE films SET titreFilm=?, idCatFilm=?, resFilm=?, pochetteFilm=?, dureeFilm=?, prixFilm=?, urlFilm=?, pubFilm=?, descFilm=? WHERE idFilm=?";
    $stmt = $connexion->prepare($requete);
    $stmt->execute($film);
}
/**
 * Cette fonction retourne un tableau contenant tous les films qui appartiennent à la catégorie identifiée avec idCatFilm
 *
 * @author  Camilo Puerto - Wilson Reyes - Milton Espitia
 *
 * @version 1.0
 *
 * @param int $idCatFilm  Identifiant de la catégorie de film
 * @return  array  Retourne un tableau d'objets anonymes contenant les films filtrés par catégorie
 */
function getFilms2($idCatFilm){
    global $connexion;
    $requete = "SELECT idFilm, titreFilm, films.idCatFilm, CatFilm, resFilm, pochetteFilm, dureeFilm, prixFilm, urlFilm, pubFilm, descFilm 
        FROM films, catfilms WHERE films.idCatFilm=catfilms.idCatFilm AND films.idCatFilm=? ORDER BY idFilm";
    $stmt = $connexion->prepare($requete);
    $stmt->execute(array($idCatFilm));
    $result = $stmt->fetchAll(PDO::FETCH_OBJ);
    return $result;
}
/**
 * Cette fonction retourne le nombre total de films
 *
 * @author  Camilo Puerto - Wilson Reyes - Milton Espitia
 *
 * @version 1.0
 *
 * @return  int  Retourne le nombre total de films enregistrés
 */
function countFilms(){
    global $connexion;
    $requete = "SELECT COUNT(*) totalFilms FROM films, catfilms WHERE films.idCatFilm=catfilms.idCatFilm";
    $stmt = $connexion->prepare($requete);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_OBJ);
    return $result->totalFilms;
}
/**
 * Cette fonction retourne le nombre total de films par catégorie
 *
 * @author  Camilo Puerto - Wilson Reyes - Milton Espitia
 *
 * @version 1.0
 *
 * @param int $idCatFilm  Identifiant de la catégorie de film
 * @return  int  Retourne le nombre de films enregistrés par catégorie
 */
function countFilms2($idCatFilm){
    global $connexion;
    $requete = "SELECT COUNT(*) totalFilms FROM films, catfilms WHERE films.idCatFilm=catfilms.idCatFilm AND films.idCatFilm=?";
    $stmt = $connexion->prepare($requete);
    $stmt->execute(array($idCatFilm));
    $result = $stmt->fetch(PDO::FETCH_OBJ);
    return $result->totalFilms;
}