var verification_mot_de_passe = function(e){
	var mot_de_passe = document.forms['formulaire_inscription']['mot_de_passe'].value;
	var mot_de_passe2 = document.forms['formulaire_inscription']['mot_de_passe2'].value;
	if (mot_de_passe != mot_de_passe2){
		alert('Le mot de passe et la confirmation du mot de passe doivent être identiques.');
		e.preventDefault();
	}
}

var verification_telephone = function(e){
	var telephone = document.forms['formulaire_inscription']['telephone1'].value;
    var valide = /^0[1-6]\d{8}$/;
    if(!(valide.test(telephone))){
		alert('Le format du numéro de téléphone entré est incorrect.');
		e.preventDefault();
	}
}

var verification_mail = function(e){  
	var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
	inputText = document.forms['formulaire_inscription']['adresse_mail'];
	if(inputText.value.match(mailformat)){  
	document.formulaire_inscription.adresse_mail.focus();  
	return true;  
	}  
	else{  
	alert("You have entered an invalid email address!");  
	document.formulaire_inscription.adresse_mail.focus();  
	return false;  
	}  
}

var verification_nom_prenom = function(e){
	var nom = document.forms['formulaire_inscription']['nom'].value;
	var prenom = document.forms['formulaire_inscription']['prénom'].value;
	var format = /^[a-zA-Z]+$/;
	if(!(format.test(prenom))){
		alert('Le format du prenom entré est incorrect.');
		e.preventDefault();
	}
	if(!(format.test(nom))){
		alert('Le format du nom entré est incorrect.');
		e.preventDefault();
	}
} 

var formulaire = document.getElementById('corps');

formulaire.addEventListener('submit', verification_mot_de_passe);

formulaire.addEventListener('submit', verification_telephone);

formulaire.addEventListener('submit', verification_mail);

formulaire.addEventListener('submit', verification_nom_prenom);
