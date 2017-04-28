<?php
session_start();
header("Set-Cookie: PHPSESSID=".$_GET['id_session']);
include('Personnage.class.php');

$player1 = unserialize($_SESSION['player1']);
$player2 = unserialize($_SESSION['player2']);
unserialize($_SESSION['potion_joueur']);


echo "<br>Utilisation Potion !<br>";
if($player1->UsePotion($_SESSION['potion_joueur'])){
  $_SESSION['potion_joueur'] -=1;
  }
else {
    echo "plus de potion<br>";
  }

$_SESSION['player1']=serialize($player1);
$_SESSION['player2']=serialize($player2);
serialize($_SESSION['potion_joueur']);
