<?php
/**
 * Cette fonction enlève un fichier qui est dans un dossier
 *
 * @author Antonio Tavares
 *
 * @version 1.0
 *
 * @param string  $dossier  Nom du dossier contenant leFichier
 * @param string  $leFichier  Nom du fichier à enlever
 * @return void
 */
function enleverFichier($dossier,$leFichier){
	$tabFichiers = glob($dossier.'*');
	$rmFic=$dossier.$leFichier;
	// parcourir les fichier
	foreach($tabFichiers as $fichier){
	  if(is_file($fichier) && $fichier==trim($rmFic)) {
		// enlever le fichier
		unlink($fichier);
		break;
	  }
	}
}
/**
 * Cette fonction déplace une pochette téléchargée par HTTP POST dans un dossier donné
 *
 * @author Antonio Tavares
 *
 * @version 1.0
 *
 * @param string  $inputName  Identifiant de l'input du formulaire
 * @param string  $dossier  Nom du dossier destin de la pochette 
 * @param string  $nomPochette  Nom de la pochette
 * @return string Retourne le nom de la pochette téléversée
 */
function deposerFichier($inputName,$dossier,$nomPochette){
	$tmp = $_FILES[$inputName]['tmp_name'];
	$fichier= $_FILES[$inputName]['name'];
	$extension=strrchr($fichier,'.');
	@move_uploaded_file($tmp,$dossier.$nomPochette.$extension);
	// Enlever le fichier temporaire chargé
	@unlink($tmp); //effacer le fichier temporaire
	$pochette=$nomPochette.$extension;
	return $pochette;
}
?>