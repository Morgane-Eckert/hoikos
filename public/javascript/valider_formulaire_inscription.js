function verification_mot_de_passe1(f){
	var valide = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).{8,}$/;
	var mot_de_passe = document.forms['formulaire_inscription']['mot_de_passe'].value;
	var mot_de_passe2 = document.forms['formulaire_inscription']['mot_de_passe2'].value;
	if(!(valide.test(mot_de_passe))){
		
		return false;
	} 
	return true;
}

function verification_mot_de_passe2(f){
	var mot_de_passe = document.forms['formulaire_inscription']['mot_de_passe'].value;
	var mot_de_passe2 = document.forms['formulaire_inscription']['mot_de_passe2'].value; 
	if (mot_de_passe != mot_de_passe2){
		
		e.preventDefault();
		return false;
	}
	return true;
}

function verification_telephone(f){
	var telephone = document.forms['formulaire_inscription']['telephone1'].value;
    var valide = /^0[1-9]\d{8}$/;
    if(!(valide.test(telephone))){
		
		e.preventDefault();
		return false;
	}
	return true;
}

function verification_mail(f){  

	var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
	inputText = document.forms['formulaire_inscription']['adresse_mail'].value;
	if(inputText.match(mailformat)){
	document.formulaire_inscription.adresse_mail.focus();  
	return true;  
	}  
	else{  
	  
	document.formulaire_inscription.adresse_mail.focus();  
	return false;  
	}  
}

function verification_nom_prenom(f){
	var nom = document.forms['formulaire_inscription']['nom'].value;
	var prenom = document.forms['formulaire_inscription']['prenom'].value;
	var format = /^[a-zA-Z]+$/;
	if(!(format.test(prenom))){
		
		e.preventDefault();
		return false;
	}
	if(!(format.test(nom))){
		
		e.preventDefault();
		return false;
	}
	return true;
}

function verifForm(f){

   var mdp1Ok = verification_mot_de_passe1(this);
   var mdp2Ok = verification_mot_de_passe2(this);
   var telOk = verification_telephone(this);
   var mailOk = verification_mail(this);
   var nom_prenomOk = verification_nom_prenom(this);
   
   if(mdp1Ok && mdp2Ok && mailOk && telOk && nom_prenomOk){
      return true;
   }	
   else
   {
      if(mdp1Ok==false){
      	alert('Le mot de passe doit contenir au moins une majuscule, une minuscule, un chiffre et un caractère spécial.');
      }
      if(mdp2Ok==false){
      	alert('Le mot de passe et la confirmation du mot de passe doivent être identiques.');
      }
      if(mailOk==false){
      	alert("You have entered an invalid email address!");
      }
      if(telOk==false){
      	alert('Le format du numéro de téléphone entré est incorrect.');
      }
      if(nom_prenomOk==false){
      	alert('Le format du prenom ou du nom entré est incorrect.');
      }
      return false;
   }
}