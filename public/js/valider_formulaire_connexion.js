var parametre = parseQueryString();
var action = parametre["action"];//On récupère le parametre action dans l'url et on le met dans une variable JS 
if (typeof action != "undefined") {//si la variable JS action est définie et non vide
	paragraphe = document.getElementById('message_d_erreur');//On récupère l'élement paragraphe grace à son id
	if (action == 'mot_de_passe_incorrect'){
		paragraphe.innerHTML='Le mot de passe entré est incorrect';//On remplace le contenu de paragraphe par 'mot de passe incorrect'
	} else if (action == 'adresse_mail_inconnue'){
		paragraphe.innerHTML='L\'adresse mail entrée ne correspond à aucun compte';
	}
}