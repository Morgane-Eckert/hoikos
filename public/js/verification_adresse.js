var cp = document.getElementById('postal_code');
var missCp = document.getElementById('missCp');
var cpValid = /^[0-9]{5}$/||/^2(A||B)[0-9]{3}$/;
var pays = document.getElementById('country');
var missPays = document.getElementById('missPays');
var ville = document.getElementById('locality');
var missVille = document.getElementById('missVille');
var rue = document.getElementById('route');
var missRue = document.getElementById('missRue');
var numerorue = document.getElementById('street_number');
var missNumrue = document.getElementById('missNumrue');
var nomerorueValid = /^[0-9]{1,4}[a-z]{0,1}$/;
var textValid = /^[a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+([-'\s][a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+){0,}$/;
var tel = document.getElementById('telephone_fixe');
var missTel = document.getElementById('missTel');
var telValid = /^0[1-9][0-9]{8}$/;

function validation(){
    //Si le champ est vide
    missCp.textContent = '';
    missVille.textContent = '';
    missTel.textContent = '';
    missRue.textContent = '';
    missNumrue.textContent = '';
    missPays.textContent = '';
    missRue.textContent = '';

    if (cp.validity.valueMissing) {
      event.preventDefault();
      missCp.textContent = 'Code postal manquant';
      missCp.style.color = 'red';
    }
    else if (cpValid.test(cp.value) == false){
        event.preventDefault();
        missCp.textContent = 'Format incorrect';
        missCp.style.color = 'orange';
        }
    if (ville.validity.valueMissing) {
      event.preventDefault();
      missVille.textContent = 'Ville manquante';
      missVille.style.color = 'red';
    }
    else if (textValid.test(ville.value) == false){
        event.preventDefault();
        missVille.textContent = 'Format incorrect';
        missVille.style.color = 'orange';
        }
    if (tel.validity.valueMissing) {
      event.preventDefault();
      missTel.textContent = 'Numéro de téléphone manquant';
      missTel.style.color = 'red';
    }
    else if (telValid.test(tel.value) == false){
        event.preventDefault();
        missTel.textContent = 'Format incorrect';
        missTel.style.color = 'orange';
        }
    if (pays.validity.valueMissing) {
      event.preventDefault();
      missPays.textContent = 'Pays manquant';
      missPays.style.color = 'red';
    } else if (textValid.test(pays.value)==false) {
      event.preventDefault();
      missPays.textContent = 'Format incorrect';
      missPays.style.color = 'orange';
    }
    if (numerorue.validity.valueMissing) {
      event.preventDefault();
      missNumrue.textContent = 'Numéro de rue manquante';
      missNumrue.style.color = 'red';
    } else if (nomerorueValid.test(numerorue.value)==false) {
      event.preventDefault();
      missNumrue.textContent = 'Format incorrect';
      missNumrue.style.color = 'orange';

    }
    if (rue.validity.valueMissing) {
      event.preventDefault();
      missRue.textContent = 'Rue manquante';
      missRue.style.color = 'red';
    } else if (textValid.test(rue.value)==false) {
      event.preventDefault();
      missRue.textContent = 'Format incorrect';
      missRue.style.color = 'orange';

    }


  }
