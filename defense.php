<?php
session_start();
header("Set-Cookie: PHPSESSID=".$_GET['id_session']);
include('Personnage.class.php');

$player1 = unserialize($_SESSION['player1']);
$player2 = unserialize($_SESSION['player2']);
unserialize($_SESSION['compteur']);

$valeur_de_joueur=$_GET['de_joueur'];
$valeur_de_ia=$_GET['de_ia'];
$player2->attaque($valeur_de_ia);
$player1->defense($valeur_de_joueur);


$line .= " " . "<br>";
// $line .= "ROUND " . $_SESSION['compteur'] . " <br> ";

$line .= "Phase Defense" . "<br>". "<br>";

$line .= $player2->getNom() . " a " . $player2->getAttaque() . " en attaque<br>";
$line .= $player1->getNom() . " a " . $player1->getDefense() . " en défense<br>";
$player1->subit_attaque($player2->getAttaque(), $player1->getDefense());
$line .= $player1->getNom() . " reçoit " . $player1->getDegat();

$line .= "<br>";
$line .= $player1->getNom() . " a " . $player1->getSante() . " point de vie<br>";
$line .= $player2->getNom() . " a " . $player2->getSante() . " point de vie<br>";


$_SESSION['player1']=serialize($player1);
$_SESSION['player2']=serialize($player2);
serialize($_SESSION['compteur']);

echo $line;
 ?>
