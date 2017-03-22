<?php
/**
 * Created by PhpStorm.
 * User: antoine_narboux
 * Date: 15/02/17
 * Time: 14:15
 */

 include('Personnage.class.php');
 include('De.class.php');

session_start();
echo "Début du combat";


?>



<?php
// $_SESSION['compteur']=1;
$de = new De();
// var_dump($_SESSION['player1']);
// var_dump($_SESSION['player2']);
$player1 = $_SESSION['player1'];
//var_dump($player1);
$player2 = $_SESSION['player2'];

// $player1= new Personnage("Rondoudou");
// //var_dump($player1);
//
// $player2= new Personnage("Dracofeu");
//var_dump($player2);
//
// while ((!$player1->mort()) && (!$player2->mort())) {

?>
    <form id="form1" name="form" method="post" action="test_index.php?choix_attaque=attaque" >
        <input type="submit" class="button" value="Attaquer">
    </form>
    <form id="form1" name="form" method="post" action="test_index.php?choix_attaque=potion" >
        <input type="submit" class="button" value="Potion">
    </form>

<?php

//PREPARATION ATTAQUE ET DEFENSE////
$player1->attaque($de->lanceDe());
$player2->defense($de->lanceDe());
$player2->attaque($de->lanceDe());
$player1->defense($de->lanceDe());


echo " " . "<br>";
echo "ROUND " . $_SESSION['compteur'] . " <br> ";

if (!empty(@$_GET['choix_attaque'])){

    if ($_GET['choix_attaque'] == "attaque") {
        $_SESSION['compteur']++;

        ////////////////////////////Phase attaque//////////////////////
        echo "Phase Attaque" . "<br>";

        echo $player1->getNom() . " a " . $player1->getAttaque() . " en attaque<br>";
        echo $player2->getNom() . " a " . $player2->getDefense() . " en défense<br>";
        $player2->subit_attaque($player1->getAttaque(), $player2->getDefense());
        echo $player2->getNom() . " reçoit " . $player2->getDegat();


        /////////Verification que l'adversaire soit toujours en vie//////
        if ($player2->mort()) {
          ?>
          <script type="text/javascript">
            alert("L'adversaire est K.O !");
          </script>
          <?php
            echo $player2->_nom . " est K.O<br>";
            $_SESSION = array();
        //On détruit la session
        session_destroy();
        header('location:index.php');
        }
        header('Refresh: 2; url=test_index.php?choix_attaque=defense');
        ob_flush();
      }

        // echo $player1->getNom() . " a " . $player1->getSante() . " point de vie<br>";
        // echo $player2->getNom() . " a " . $player2->getSante() . " point de vie<br>";

        else if ($_GET['choix_attaque'] == "defense") {
        ///////////////////////////Phase defense/////////////////////
        echo "Phase Defense" . "<br>";

        echo $player2->getNom() . " a " . $player2->getAttaque() . " en attaque<br>";
        echo $player1->getNom() . " a " . $player1->getDefense() . " en défense<br>";
        $player1->subit_attaque($player2->getAttaque(), $player1->getDefense());
        echo $player1->getNom() . " reçoit " . $player1->getDegat();

        /////////Verification que l'adversaire soit toujours en vie//////
        if ($player1->mort()) {
          ?>
          <script type="text/javascript">
            alert("Votre personnage est K.O !");
          </script>
          <?php
            echo $player1->_nom . " est K.O<br>";
            $_SESSION = array();
        // On détruit la session
        session_destroy();
        header('location:index.php');
        }
        header('Refresh: 5; url=test_index.php');
        ob_flush();
    }
 else if ($_GET['choix_attaque'] == "potion") {
      $_SESSION['compteur']++;
    ///////Mettre en place potion//////
      echo "<br>Utilisation Potion !<br>";
      if($player1->UsePotion($_SESSION['potion_joueur'])){
        $_SESSION['potion_joueur'] -=1;
      }
      else {
        echo "plus de potion<br>";
      }

      header('Refresh: 2; url=test_index.php?choix_attaque=defense');
      ob_flush();
      // ///////////////////////////Phase defense/////////////////////
      // echo "Phase Defense" . "<br>";
      //
      // echo $player2->getNom() . " a " . $player2->getAttaque() . " en attaque<br>";
      // echo $player1->getNom() . " a " . $player1->getDefense() . " en défense<br>";
      // $player1->subit_attaque($player2->getAttaque(), $player1->getDefense());
      // echo $player1->getNom() . " reçoit " . $player1->getDegat();
      //
      // /////////Verification que l'adversaire soit toujours en vie//////
      // if ($player1->mort()) {
      //   $text = addslashes($player1->_nom . " est K.O<br>");
      //   echo "<script>alert($text)</script>";
      //     echo $player1->_nom . " est K.O<br>";
      // //     $_SESSION = array();
      // // // On détruit la session
      // // session_destroy();
      // // header('location:index.php');
      // }
      // header('Refresh: 5; url=test_index.php');
      // ob_flush();
}
    else {

    }

} //boucle if Empty

// echo $player1->getNom() . " a reçu " . $player1->getDegat() ;
// echo $player2->getNom() . " a reçu " . $player2->getDegat() ;
echo "<br>";
echo $player1->getNom() . " a " . $player1->getSante() . " point de vie<br>";
echo $player2->getNom() . " a " . $player2->getSante() . " point de vie<br>";

//echo "Combat Terminé !!";
