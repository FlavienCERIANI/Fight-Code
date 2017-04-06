var tab=[
  "<p>"+"Voici la premiere question ?"+"</p><label>"
  +"<input type=\"radio\" name=\"reponse\" value=\"oui\" id=\"oui\" required /><label for=\"oui\">Oui</label>"
  +"<input type=\"radio\" name=\"reponse\" value=\"non\" id=\"oui\" required /><label for=\"oui\">Oui</label>"
  +"<input type=\"radio\" name=\"reponse\" value=\"non\" id=\"oui\" required /><label for=\"oui\">Oui</label>",
  "<p>"+"Voici la deuxieme question ?"+"</p><label>"
  +"<input type=\"radio\" name=\"reponse\" value=\"oui\" id=\"oui\" required /><label for=\"oui\">Oui</label>"
  +"<input type=\"radio\" name=\"reponse\" value=\"non\" id=\"oui\" required /><label for=\"oui\">Oui</label>"
  +"<input type=\"radio\" name=\"reponse\" value=\"non\" id=\"oui\" required /><label for=\"oui\">Oui</label>",
  "<p>"+"Voici la troisieme question ?"+"</p><label>"
  +"<input type=\"radio\" name=\"reponse\" value=\"oui\" id=\"oui\" required /><label for=\"oui\">Oui</label>"
  +"<input type=\"radio\" name=\"reponse\" value=\"non\" id=\"oui\" required /><label for=\"oui\">Oui</label>"
  +"<input type=\"radio\" name=\"reponse\" value=\"non\" id=\"oui\" required /><label for=\"oui\">Oui</label>"
]

//////Produit un nombre aléatoire entre 0 et N//////
function aleatoire(N) {
  return (Math.floor((N)*Math.random()));
}

var num = aleatoire(tab.length);
$("#question").append(tab[num]);
