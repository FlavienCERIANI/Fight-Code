<?php
session_start();
header("Set-Cookie: PHPSESSID=".$_GET['id_session']);
include('Personnage.class.php');

$player1 = unserialize($_SESSION['player1']);
$player2 = unserialize($_SESSION['player2']);
unserialize($_SESSION['compteur']);
$_SESSION['compteur']++;

$line .= " " . "<br>";
$line .= "ROUND " . $_SESSION['compteur'] . " <br> ";

$line .= "<br>";
$line .= $player1->getNom() . " a " . $player1->getSante() . " point de vie<br>";
$line .= $player2->getNom() . " a " . $player2->getSante() . " point de vie<br>";

$_SESSION['player1']=serialize($player1);
$_SESSION['player2']=serialize($player2);
serialize($_SESSION['compteur']);

echo $line;
