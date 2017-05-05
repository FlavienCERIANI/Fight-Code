var valeur_de_joueur=0;
var valeur_de_ia=0;
var round=1;
var php="<?php";



function effaceDe() {
  var placeholder = document.getElementById('de_joueur');
  placeholder.innerHTML = "";
  var placeholder = document.getElementById('de_ia');
  placeholder.innerHTML = "";
}

//simule une valeur aleatoire et affiche cette derniere
function De(nom) {
  var valeur_de = aleatoire(6);
  var placeholder = document.getElementById(nom);
  placeholder.innerHTML = valeur_de;
  return valeur_de;
}

//////Produit un nombre aléatoire entre 1 et N//////
function aleatoire(N) {
  return (Math.floor((N)*Math.random())+1);
}

// function btnform(){
// if (document.getElementById("form11")) {
//     setTimeout("submitForm()", 1000); // set timout
// }
// }
//
// function submitForm() { // submits form
//         document.getElementById("form11").submit();
//     }
//
// function submitForm2() { // submits form
//     document.getElementById("form12").submit();
// }

function redirection_attaque(){
  Button_able(true);
  $('#terminal').html(
    // "<br>"+
    "<h3>Vous attaquez</h3>"+
    "$player2->defense($valeur_de_ia);<br>"+
    "$player1->attaque($valeur_de_joueur);<br>"+
    "$player1->getNom() . \" a \" . $player1->getAttaque() . \" en attaque\";<br>"+
    "$player2->getNom() . \" a \" . $player2->getDefense() . \" en défense\";<br>"+
    "$player2->subit_attaque($player1->getAttaque(), $player2->getDefense());<br>"+
    "$player2->getNom() . \" reçoit \" . $player2->getDegat();<br>"
  );
  valeur_de_joueur = De('de_joueur');
  valeur_de_ia = De('de_ia');
  setVideo("attaque");
  $.ajax({
      url: "attaque.php",
      method: 'GET',
      data : 'id_session=' + $("#id_session").html() + '&de_joueur=' + valeur_de_joueur+ '&de_ia=' + valeur_de_ia,
      dataType : 'html'
    }).done(function(data){
      console.log(data);
      $(".jeu").html(data);
    });
    testOrdinateurMort();
    setTimeout("redirection_defense()", 7000);
  // window.location.href="arene.php?choix_attaque=defense";
}

function redirection_defense(){
  Button_able(true);
  $('#terminal').html(
    // "<br>"+
    "<h3>Vous vous défendez</h3>"+
    "$player2->attaque($valeur_de_ia);<br>"+
    "$player1->defense($valeur_de_joueur);<br>"+
    "$player2->getNom() . \" a \" . $player2->getAttaque() . \" en attaque\";<br>"+
    "$player1->getNom() . \" a \" . $player1->getDefense() . \" en défense\";<br>"+
    "$player1->subit_attaque($player2->getAttaque(), $player1->getDefense());<br>"+
    "$player1->getNom() . \" reçoit \" . $player1->getDegat();"
  );
  valeur_de_joueur = De('de_joueur');
  valeur_de_ia = De('de_ia');
  setVideo("defense");
  $.ajax({
      url: "defense.php",
      method: 'GET',
      data : 'id_session=' + $("#id_session").html() + '&de_joueur=' + valeur_de_joueur+ '&de_ia=' + valeur_de_ia,
      dataType : 'html'
    }).done(function(data){
      console.log(data);
      $(".jeu").html(data);
    });
    testJoueurMort();
    setTimeout("redirection_arene()", 7000);
  // window.location.href="arene.php?choix_attaque=defense";
}

function redirection_potion(){
  Button_able(true);
  $('#terminal').html(
    // "<br>"+
    "<h3>Vous utilisez une potion</h3>"+
    "if($player1->UsePotion($_SESSION['potion_joueur'])){<br>"+
      "$_SESSION['potion_joueur'] -=1;<br>"+
      "}<br>"+
    "else {<br>"+
        "echo \"Mais...plus de potion<br>\";<br>"+
      "}<br>"
    );
  setVideo("potion");
  $.ajax({
      url: "potion.php",
      method: 'GET',
      data : 'id_session=' + $("#id_session").html(),
      dataType : 'html'
    }).done(function(data){
      console.log(data);
      $(".jeu").html(data);
    });
    $('#boutpotion').hide(); //cache le bouton potion
    setTimeout("redirection_defense()", 4000);
  // window.location.href="arene.php?choix_attaque=defense";
}

function redirection_arene(){
  //incrementation du numéro de round
  round++;
  $("#round").html("ROUND "+round);
  //Met une image
  setVideoFixe("attaque");
  // active les boutons
  Button_able(false);
  //efface le contenu du terminal
  $('#terminal').empty();
  //efface la valeur du jet de de précédent
  effaceDe();
  $.ajax({
      url: "arene_standart.php",
      method: 'GET',
      data : 'id_session=' + $("#id_session").html(),
      dataType : 'html'
    }).done(function(data){
      console.log(data);
      $(".jeu").html(data);
    });
  // window.location.href="arene.php";
}

function redirection_start(){
   window.location.href="start2.php";
}

function redirection_question(){
  $.ajax({
      url: "question2.php",
      method: 'POST',
      data : 'reponse=' + $( "input:checked" ).val(),
      dataType : 'html'
    }).done(function(data){
      $('#myModal').hide(); //on cache la modale au joueur une fois que le joueur a validé
    if (data=="OUI"){
      $(".jeu").html("C'est la bonne réponse");
      setTimeout("redirection_attaque()", 3000);
    }
    else {
      $(".jeu").html("C'est la mauvaise réponse");
      setTimeout("redirection_defense()", 3000);
    }
    });
}

function testJoueurMort(){
  $.ajax({
      url: "joueur_mort.php",
      method: 'GET',
      data : 'id_session=' + $("#id_session").html(),
      dataType : 'html'
    }).done(function(data){
     if (data=="mort"){
       alert("Votre personnage est K.O !");
       redirection_start();
     }
    });
}

function testOrdinateurMort(){
  $.ajax({
      url: "ordinateur_mort.php",
      method: 'GET',
      data : 'id_session=' + $("#id_session").html(),
      dataType : 'html'
    }).done(function(data){
      if (data=="mort"){
       alert("L'adversaire est K.O !");
       redirection_start();
     }
    });
}


////ACTIVE OU DESACTIVE LES BOUTONS ATTAQUE ET POTION PENDANT LES DIFFERENTES PHASES
function Button_able(str){
  $("#boutatak").prop("disabled",str);
  $("#boutatak2").prop("disabled",str);
  $("#boutpotion").prop("disabled",str);
}

///Lance la video adequate avec la bonne phase
function setVideo(phase){
var phase_concat="_"+phase+"_";
var nom_joueur = $("#nom_joueur").text();
var nom_ia = $("#nom_ia").text();
var chemin= "video/";
var nom=chemin+nom_joueur+phase_concat+nom_ia;
console.log(nom);
var elem=$("<video class=\"dragogg\" width=\"100%\" height=\"100%\" controls autoplay>"+
  "<source src="+nom+".ogg type=\"video/ogg\" />"+
    "</video>"
);
console.log(elem);
$("#video").html(elem);
}

function setVideoFixe(phase){
var phase_concat="_"+phase+"_";
var nom_joueur = $("#nom_joueur").text();
var nom_ia = $("#nom_ia").text();
var chemin= "video/";
var nom=chemin+nom_joueur+phase_concat+nom_ia;
console.log(nom);
var elem=$("<video class=\"dragogg\" width=\"100%\" height=\"100%\">"+
  "<source src="+nom+".ogg type=\"video/ogg\" />"+
    "</video>"
);
console.log(elem);
$("#video").html(elem);
}
