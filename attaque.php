<?php
session_start();
header("Set-Cookie: PHPSESSID=".$_GET['id_session']);
include('Personnage.class.php');

$player1 = unserialize($_SESSION['player1']);
$player2 = unserialize($_SESSION['player2']);
unserialize($_SESSION['compteur']);

$valeur_de_joueur=$_GET['de_joueur'];
$valeur_de_ia=$_GET['de_ia'];
$player2->defense($valeur_de_ia);
$player1->attaque($valeur_de_joueur);

//Si le compteur vaut 0/null alors on ajoute 1 pour round 1
// if($_SESSION['compteur']==""){
//   $line .= "<br>"."ROUND " . $_SESSION['compteur'] ."1". " <br> ";
//   $_SESSION['compteur']++;
// }
// else {
//   $line .= "<br>"."ROUND " . $_SESSION['compteur'] . " <br> ";
// }


$line .= "<br>"."Phase Attaque" . "<br>"."<br>";

$line .= $player1->getNom() . " a " . $player1->getAttaque() . " en attaque<br>";
$line .= $player2->getNom() . " a " . $player2->getDefense() . " en défense<br>";
$player2->subit_attaque($player1->getAttaque(), $player2->getDefense());
$line .= $player2->getNom() . " reçoit " . $player2->getDegat();


$line .= "<br>";
$line .= $player1->getNom() . " a " . $player1->getSante() . " point de vie<br>";
$line .= $player2->getNom() . " a " . $player2->getSante() . " point de vie<br>";


$_SESSION['player1']=serialize($player1);
$_SESSION['player2']=serialize($player2);
serialize($_SESSION['compteur']);

echo $line;
 ?>
