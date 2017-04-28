<?php
session_start();
header("Set-Cookie: PHPSESSID=".$_GET['id_session']);
include('Personnage.class.php');

$player1 = unserialize($_SESSION['player1']);
$player2 = unserialize($_SESSION['player2']);


/////////Verification que le joueur soit toujours en vie//////
if ($player1->mort()) {
  echo "mort";
    }


$_SESSION['player1']=serialize($player1);
$_SESSION['player2']=serialize($player2);


 ?>
