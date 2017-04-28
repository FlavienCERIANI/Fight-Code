var valeur_de=0;

//affiche la valeur du de dans le de
function printNumber(number) {
  var placeholder = document.getElementById('placeholder');
  placeholder.innerHTML = number;
}

// var button = document.getElementById('button');

function de() {
  //var result = dice.roll();
  //  var result = $("#valeur_de").text();
  valeur_de= aleatoire(6);
  printNumber(valeur_de);
};

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
  de();
  setVideo("attaque");
  $.ajax({
      url: "attaque.php",
      method: 'GET',
      data : 'id_session=' + $("#id_session").html() + '&de=' + valeur_de,
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
  de();
  setVideo("defense");
  $.ajax({
      url: "defense.php",
      method: 'GET',
      data : 'id_session=' + $("#id_session").html() + '&de=' + valeur_de,
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
    setTimeout("redirection_defense()", 4000);
  // window.location.href="arene.php?choix_attaque=defense";
}

function redirection_arene(){
  // active les boutons
  Button_able(false);
  //efface la valeur du jet de de précédent
  placeholder.innerHTML="";
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
  window.location.href="question.php";
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

function Button_able(str){
  $("#boutatak").prop("disabled",str);
  $("#boutpotion").prop("disabled",str);
}

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
$("#video").append(elem);
}



// (function(){
//   alert();
//         var elt = document.getElementById('attaque');
//         var monTexte = elt.innerText || elt.textContent;
//         alert(monTexte);
//     })();
