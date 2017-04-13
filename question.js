var tab=[
  "<p>"+"Qu'appelle t-on une url (Uniform Resource Locator)? "+"</p><label>"
  +"<input type=\"radio\" name=\"reponse\" value=\"non\" id=\"oui\" required /><label for=\"oui\">L'extension des fichiers contacts d'une boite Mail</label>"
  +"<input type=\"radio\" name=\"reponse\" value=\"oui\" id=\"oui\" required /><label for=\"oui\">L'adresse web d'un site ou d'un fichier (image, vidéo, mp3...)</label>"
  +"<input type=\"radio\" name=\"reponse\" value=\"non\" id=\"oui\" required /><label for=\"oui\">C'est le nom donné à l'union des réseaux en ligne</label>",
  "<p>"+"Quelle est l'année d'apparition de facebook ?"+"</p><label>"
  +"<input type=\"radio\" name=\"reponse\" value=\"non\" id=\"oui\" required /><label for=\"oui\">1994</label>"
  +"<input type=\"radio\" name=\"reponse\" value=\"non\" id=\"oui\" required /><label for=\"oui\">2000</label>"
  +"<input type=\"radio\" name=\"reponse\" value=\"oui\" id=\"oui\" required /><label for=\"oui\">2004</label>",
  "<p>"+"Qu'est ce que Gravatar ?"+"</p><label>"
  +"<input type=\"radio\" name=\"reponse\" value=\"non\" id=\"oui\" required /><label for=\"oui\">Un site pour créer des avatars monstrueux</label>"
  +"<input type=\"radio\" name=\"reponse\" value=\"non\" id=\"oui\" required /><label for=\"oui\">Une application pour détruire les avatars des autres utilisateurs de Facebook</label>"
  +"<input type=\"radio\" name=\"reponse\" value=\"oui\" id=\"oui\" required /><label for=\"oui\">Un service web de centralisation d'avatars</label>",
  "<p>"+"Qu'appelle-t-on le code HTML ?"+"</p><label>"
  +"<input type=\"radio\" name=\"reponse\" value=\"non\" id=\"oui\" required /><label for=\"oui\">C'est le code d'une carte bancaire virtuelle</label>"
  +"<input type=\"radio\" name=\"reponse\" value=\"non\" id=\"oui\" required /><label for=\"oui\">C'est un code pour programmer des logiciels</label>"
  +"<input type=\"radio\" name=\"reponse\" value=\"oui\" id=\"oui\" required /><label for=\"oui\">C'est le code utiliser pour créer des pages Web</label>",
  "<p>"+"Voici la deuxieme question ?"+"</p><label>"
  +"<input type=\"radio\" name=\"reponse\" value=\"non\" id=\"oui\" required /><label for=\"oui\">Oui</label>"
  +"<input type=\"radio\" name=\"reponse\" value=\"non\" id=\"oui\" required /><label for=\"oui\">Oui</label>"
  +"<input type=\"radio\" name=\"reponse\" value=\"non\" id=\"oui\" required /><label for=\"oui\">Oui</label>",
  "<p>"+"Voici la troisieme question ?"+"</p><label>"
  +"<input type=\"radio\" name=\"reponse\" value=\"non\" id=\"oui\" required /><label for=\"oui\">Oui</label>"
  +"<input type=\"radio\" name=\"reponse\" value=\"non\" id=\"oui\" required /><label for=\"oui\">Oui</label>"
  +"<input type=\"radio\" name=\"reponse\" value=\"non\" id=\"oui\" required /><label for=\"oui\">Oui</label>",
  "<p>"+"Voici la premiere question ?"+"</p><label>"
  +"<input type=\"radio\" name=\"reponse\" value=\"non\" id=\"oui\" required /><label for=\"oui\">Oui</label>"
  +"<input type=\"radio\" name=\"reponse\" value=\"non\" id=\"oui\" required /><label for=\"oui\">Oui</label>"
  +"<input type=\"radio\" name=\"reponse\" value=\"non\" id=\"oui\" required /><label for=\"oui\">Oui</label>",
  "<p>"+"Voici la deuxieme question ?"+"</p><label>"
  +"<input type=\"radio\" name=\"reponse\" value=\"non\" id=\"oui\" required /><label for=\"oui\">Oui</label>"
  +"<input type=\"radio\" name=\"reponse\" value=\"non\" id=\"oui\" required /><label for=\"oui\">Oui</label>"
  +"<input type=\"radio\" name=\"reponse\" value=\"non\" id=\"oui\" required /><label for=\"oui\">Oui</label>",
  "<p>"+"Voici la troisieme question ?"+"</p><label>"
  +"<input type=\"radio\" name=\"reponse\" value=\"non\" id=\"oui\" required /><label for=\"oui\">Oui</label>"
  +"<input type=\"radio\" name=\"reponse\" value=\"non\" id=\"oui\" required /><label for=\"oui\">Oui</label>"
  +"<input type=\"radio\" name=\"reponse\" value=\"non\" id=\"oui\" required /><label for=\"oui\">Oui</label>"
]

//////Produit un nombre aléatoire entre 0 et N//////
function aleatoire(N) {
  return (Math.floor((N)*Math.random()));
}

var num = aleatoire(tab.length);
$("#question").append(tab[num]);
