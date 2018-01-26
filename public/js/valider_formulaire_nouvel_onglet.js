var changement_nom_onglet = function(e){
	var nom_onglet = document.getElementById('nom_onglet');
	nom_onglet.setAttribute('value', type_onglet.value);
};

var type_onglet = document.getElementById('type_onglet');
type_onglet.addEventListener('change', changement_nom_onglet);