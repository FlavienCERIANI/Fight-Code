// var dice = {
//   sides: 6,
//   roll: function () {
//     var randomNumber = Math.floor(Math.random() * this.sides) + 1;
//
//     return randomNumber;
//   }
// }



//Prints dice roll to the page

function printNumber(number) {
  var placeholder = document.getElementById('placeholder');
  placeholder.innerHTML = number;
}

var button = document.getElementById('button');

function de() {
  //var result = dice.roll();
   var result = $("#valeur_de").text();
  printNumber(result);
};


function btnform(){
if (document.getElementById("form11")) {
    setTimeout("submitForm()", 1000); // set timout
}
}

function submitForm() { // submits form
        document.getElementById("form11").submit();
    }

function submitForm2() { // submits form
    document.getElementById("form12").submit();
}

function redirection_defense(){
  window.location.href="arene.php?choix_attaque=defense";
}

function redirection_arene(){
  window.location.href="arene.php";
}

function redirection_start(){
  window.location.href="start.php";
}

function redirection_question(){
  window.location.href="question.php";
}

function setVideo(phase){
var phase_concat="_"+phase+"_";
var nom_joueur = $("#nom_joueur").text();
var nom_ia = $("#nom_ia").text();
var nom=nom_joueur+phase_concat+nom_ia;
var elem=$("<video class=\"dragogg\" width=\"100%\" height=\"100%\" controls autoplay>"+
  "<source src="+nom+".ogg type=\"video/ogg\" />"+
    "</video>"
);
console.log(elem);
$("#video").append(elem);
}

// "<video class=\"dragogg\" width=\"100%\" height=\"100%\" controls=\"true\">"+

// (function(){
//   alert();
//         var elt = document.getElementById('attaque');
//         var monTexte = elt.innerText || elt.textContent;
//         alert(monTexte);
//     })();
