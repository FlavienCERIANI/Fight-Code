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

// (function(){
//   alert();
//         var elt = document.getElementById('attaque');
//         var monTexte = elt.innerText || elt.textContent;
//         alert(monTexte);
//     })();
