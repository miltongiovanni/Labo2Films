/**
 * valider: //Valide que le formulaire soit rempli 
 *  tous les élements du formulaire soient remplis
 * @param {form} input nom de formulaire
 * @param {alerte} input nom de ID de message
 * @returns {boolean} 
 */
function valider(form, alerte) {
	for (i = 0; i < form.elements.length; i++) {

		if (form.elements[i].type == "text") {
			if (form.elements[i].value == "") {
				if (form.elements[i].type == "text") {
					montrerAlerte(alerte.id)
					form.elements[i].focus();
					return false;
				} else {
					montrerAlerte(alerte.id);
					form.elements[i].focus();
					return false;
				}
			}
		}
	}
	// définir des validations spécifiques pour chaque formulaire
	switch (form.id) {
		case "formMembre":
			var passe1 = "X",
				passe2 = "Y",
				passid = "";
			for (i = 0; i < form.elements.length; i++) {
				if (form.elements[i].id == "pwdUsager1") {
					passe1 = form.elements[i].value;
					passid = i;
				} else if (form.elements[i].id == "pwdUsager2") {
					passe2 = form.elements[i].value;
				}
			}
			if (passe1 != passe2) {
				montrerAlerte(alerte.id, "Mot de passe est invalide");
				form.elements[passid].focus();
				return false;
			}
			break;
		case "formConnexion":
			for (i = 0; i < form.elements.length; i++) {
				if ((form.elements[i].id == "emailUsager") && (form.elements[i].value == "")) {
					return false;
				} else if ((form.elements[i].id == "pwdUsager") && (form.elements[i].value == "")) {
					return false;
				}
			}
			break;
	}
	return true;
}

/**
 * montrerAlerte: Active le message d'erreur pendant 2 secondes lorsque le 
 * formulaire contient une erreur entrée par l'utilisateur..
 * @param {alerte} input nom de ID de message
 * @param {changer_message} input message
 * @returns {void}
 */
function montrerAlerte(alerte, changer_message) {
	if (alerte.id == "alerte") {
		document.getElementById("changer01").innerHTML = changer_message;
	}
	document.getElementById(alerte).style.display = "block";
	// Cache l'alerte au bout de 2 secondes
	setTimeout(function () {
		document.getElementById(alerte).style.display = 'none';
	}, 2000);
}

/**
 * arreterVideo Arrete la video du preview
 * @param {object} input film
 * @returns {void}
 */
function arreterVideo(m) {
	document.getElementById(m.id).innerHTML = "";
	location.reload();
}

/**
 *  montrerElem:Activer les boutons du menu de navigation lorsque l'utilisateur établit une connexion
 * @param {void}
 * @returns {void}
 */
function montrerElem() {
	document.getElementById('btnConnexion').style.display = 'none';
	document.getElementById('btnDevmembre').className = 'd-none';
	document.getElementById('btnDesconnexion').style.display = 'inline-block';
	document.getElementById('btnPanier').style.display = 'inline-block';
}

/**
 *  ActiverModification: Cette fonction active les boutons de formulaire
 *  pour effectuer des modifications
 * @param {Objet} Numéro d'identification du film pour activer les modifications
 * @returns void.
 */
function ActiverModification(Objet) {
	document.getElementById('Modification' + Objet).style.display = 'none'; // Ocultar
	document.getElementById('Enregistrer' + Objet).style.display = 'block'; // activar
	document.getElementById('supprimer' + Objet).style.display = 'none'; // Ocultar
	document.getElementById('annuler' + Objet).style.display = 'block'; // activar
	document.getElementById('quantite' + Objet).style.display = 'none'; // Ocultar
	document.getElementById('quantite1' + Objet).style.display = 'block'; // activar
	document.getElementById('payer').style.display = 'none'; // Ocultar
}

/**
 * DesActiverModification: Cette fonction désactive les boutons pour effectuer 
 * des modifications et faire l'appel des formulaires pour exécuter les options 
 * pour effacer, enregistrer, éditer le document et effectuer le paiement.
 * @param {Objet} input ID de film
 * @param {transaction} input Type d'opération (Save, Delete, Effacer, PayPal)
 * @returns {void} 
 */
function DesActiverModification(Objet, transaction) {
	if ((transaction == 'Save') || (transaction == 'Cancel')) {
		document.getElementById('Modification' + Objet).style.display = 'block'; // Ocultar
		document.getElementById('Enregistrer' + Objet).style.display = 'none'; // activar
		document.getElementById('supprimer' + Objet).style.display = 'block'; // Ocultar
		document.getElementById('annuler' + Objet).style.display = 'none'; // activar
		document.getElementById('quantite' + Objet).style.display = 'block'; // Ocultar
		document.getElementById('quantite1' + Objet).style.display = 'none'; // activar
		document.getElementById('payer').style.display = 'block'; // Ocultar
	}
	switch (transaction) {
		case 'Save':
			document.getElementById('Panier' + Objet).submit();
			break;
		case 'Delete':
			document.getElementById('PanierE' + Objet).submit();
			break;
		case 'effacer':
			document.getElementById('effacer_panier').submit();
			break;
		case 'PayPal':
			document.getElementById('payerfrm').submit();
			break;
	}
}