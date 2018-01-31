  var nom = document.getElementById('nom1');
  var missNom = document.getElementById('missNom');
  var nomValid = /^[a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+([-'\s][a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+)?$/;
  var prenom = document.getElementById('prenom');
  var missPrenom = document.getElementById('missPrenom');
  var prenomValid = /^[a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+([-'\s][a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+)?$/;
  var tel = document.getElementById('telephone1');
  var missTel = document.getElementById('missTel');
  var telValid = /^0[1-9][0-9]{8}$/;
  var mail = document.getElementById('adresse_mail');
  var missMail = document.getElementById('missMail');
  var mailValid = /^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/;


function verification(){

  //On reset les champs span
  missNom.textContent = '';
  missPrenom.textContent = '';
  missTel.textContent = '';
  missMail.textContent = '';

      if (nom.validity.valueMissing){
          event.preventDefault();
          missNom.textContent = 'Nom manquant';
          missNom.style.color = 'red';}
      else if (nomValid.test(nom.value) == false){
          event.preventDefault();
          missNom.textContent = 'Format incorrect';
          missNom.style.color = 'orange';
          }
     if (prenom.validity.valueMissing) {
        event.preventDefault();
        missPrenom.textContent = 'Prénom manquant';
        missPrenom.style.color = 'red';
      }
      else if (prenomValid.test(prenom.value) == false){
          event.preventDefault();
          missPrenom.textContent = 'Format incorrect';
          missPrenom.style.color = 'orange';
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
      if (mail.validity.valueMissing) {
        event.preventDefault();
        missMail.textContent = 'Adresse mail manquante';
        missMail.style.color = 'red';
      }
      else if (mailValid.test(mail.value) == false){
          event.preventDefault();
          missMail.textContent = 'Format incorrect';
          missMail.style.color = 'orange';
          }

    }
