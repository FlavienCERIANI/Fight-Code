var dice = {
  sides: 6,
  roll: function () {
    var randomNumber = Math.floor(Math.random() * this.sides) + 1;
    return randomNumber;
  }
}



//Prints dice roll to the page

function printNumber(number) {
  var placeholder = document.getElementById('placeholder');
  placeholder.innerHTML = number;
}

var button = document.getElementById('button');

function de() {
  var result = dice.roll();
  printNumber(result);
};

//window.onload= de();

function btnform(){
if (document.getElementById("form11")) {
    setTimeout("submitForm()", 1000); // set timout
}
}

function submitForm() { // submits form
        document.getElementById("form11").submit();
    }

// (function(){
//   alert();
//         var elt = document.getElementById('attaque');
//         var monTexte = elt.innerText || elt.textContent;
//         alert(monTexte);
//     })();
