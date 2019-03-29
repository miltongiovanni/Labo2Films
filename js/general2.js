/*window.onload = function () {*/
//Valide que le formulaire soit rempli
function valider(form, alerte) {
	//Valide que tous les élements du formulaire soient remplis
	for (i = 0; i < form.elements.length; i++) {

		if (form.elements[i].type == "text" || form.elements[i].type == "select-one") {
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

	//Montre l'alerte du formulaire
	function montrerAlerte(alerte, changer_message) {
		if (alerte.id = "alerte") {
			document.getElementById("changer01").innerHTML = changer_message;
		}

		document.getElementById(alerte).style.display = "block";
		// Cache l'alerte au bout de 2 secondes
		setTimeout(function () {
			document.getElementById(alerte).style.display = 'none';
		}, 2000);
	}

	function arreterVideo(m) {
		document.getElementById(m.id).innerHTML = "";
	  }

	function AjouterPanier(keyID, pochetteFilm1, titreFilm1, resFilm1, catFilm1, dureeFilm1) {
		alert("Entro");
		if (typeof (localStorage) !== "undefined") {
			var nouveau_record = true;
			var nombre_films = 0;
			for (var i = 0; i < localStorage.length; i++) {
				var clave = localStorage.key(i);
				if (clave.slice(-3) == 'wmc'); {
					nombre_films++;
				}
				if (clave == (keyID + 'wmc')) {
					nouveau_record = false;
				}
			}
			if (nouveau_record) {
				var valor = document.getElementById(pochetteFilm1).value + ';' +
					document.getElementById(titreFilm1).value + ';' +
					document.getElementById(resFilm1).value + ';' +
					document.getElementById(catFilm1).value + ';' +
					document.getElementById(dureeFilm1).value;
				localStorage.setItem(keyID + 'wmc', valor);
				document.getElementById("numpanier").innerHTML = nombre_films;
			}
		}
	}

	// Ajouter 

	function ActivarQuantite(Objet) {
		alert("Entre");
		champs1 = "quantite" + Objet;
		champs2 = "prix" + Objet;
		champs3 = "prix" + Objet + "-" + Objet;
		document.getElementById(champs1).readonly = false;
		document.getElementById(champs2).value = document.getElementById(champs1).value * document.getElementById(champs3).value;
		document.getElementById('Modification').style.display = 'none';
		document.getElementById('Enregistrer').style.display = 'block';
		document.getElementById('supprimer').style.display = 'none';
		document.getElementById('annuler').style.display = 'block';
	}



/*}*/