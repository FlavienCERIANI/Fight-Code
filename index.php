<?php
/**
 * Created by PhpStorm.
 * User: antoine_narboux
 * Date: 22/03/17
 * Time: 08:58
 */
include('Personnage.class.php');

 session_start();
$_SESSION['player1'] = new Personnage("Rondoudou");
$_SESSION['player2'] = new Personnage("Dracofeu");
$_SESSION['potion_joueur'] = 1;
$_SESSION['potion_IA'] = 1;

?>
Choissisez votre mode de jeu :

 <!-- <form id="form1" name="form" method="post" action="test_index.php" >
     <input type="submit" class="button" value="Commencer">
 </form> -->

 <form id="form1" name="form" method="post" action="test_index.php" >
     <input type="submit" class="button" name="facile" value="Facile">
 </form>

 <form id="form2" name="form" method="post" action="test_index.php" >
     <input type="submit" class="button" name="difficile" value="Difficile">
 </form>
