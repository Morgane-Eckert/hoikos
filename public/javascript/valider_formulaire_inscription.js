var verification_mot_de_passe = function(e){
	var mot_de_passe = document.forms['formulaire_inscription']['mot_de_passe'].value;
	var mot_de_passe2 = document.forms['formulaire_inscription']['mot_de_passe2'].value;
	if (mot_de_passe != mot_de_passe2){
		alert('Le mot de passe et la confirmation du mot de passe doivent être identiques.');
		e.preventDefault();
	}
};

var verification_telephone = function(e){
	var telephone = document.forms['formulaire_inscription']['telephone1'].value;
    var valide = /^0[1-6]\d{8}$/;
    if(!(valide.test(telephone))){
		alert('Le format du numéro de téléphone entré est incorrect.');
		e.preventDefault();
	}
};

var formulaire = document.getElementById('corps');
formulaire.addEventListener('submit', verification_mot_de_passe);
formulaire.addEventListener('submit', verification_telephone);
