<?php
/**
 * Created by PhpStorm.
 * User: antoine_narboux
 * Date: 15/02/17
 * Time: 14:15
 */
echo "Début du combat";

include('Personnage.class.php');
include('De.class.php');
?>



<?php
$compteur=0;
$de = new De();

$player1= new Personnage("Rondoudou");
//var_dump($player1);


$player2= new Personnage("Dracofeu");
//var_dump($player2);

while ((!$player1->mort()) && (!$player2->mort())) {
    $compteur++;
    echo " "."<br>";
    echo "ROUND ". $compteur." <br> ";
    ?>
    <script>// var rep = prompt("Que voulez-vous faire ?");
        //alert(rep);
    </script>
<?php
    ////PREPARATION ATTAQUE ET DEFENSE////
    $player1->attaque($de->lanceDe());
    $player2->defense($de->lanceDe());
    $player2->attaque($de->lanceDe());
    $player1->defense($de->lanceDe());


    ////////////////////////////Phase attaque//////////////////////
    echo "Phase Attaque"."<br>";

     echo $player1->getNom()." a ".$player1->getAttaque()." en attaque<br>";
     echo $player2->getNom(). " a ".$player2->getDefense(). " en défense<br>";
    $player2->subit_attaque($player1->getAttaque(),$player2->getDefense());

    echo $player2->getNom(). " reçoit ".$player2->getDegat();


    /////////Verification que l'adversaire soit toujours en vie//////
    if($player2->mort()){
        echo $player2->_nom." est K.O<br>";
        break;
    }

    echo $player1->getNom(). " a ".$player1->getSante()." point de vie<br>";
    echo $player2->getNom(). " a ".$player2->getSante()." point de vie<br>";

    ///////////////////////////Phase defense/////////////////////
    echo "Phase Defense"."<br>";


    echo $player2->getNom()." a ".$player2->getAttaque()." en attaque<br>";
    echo $player1->getNom(). " a ".$player1->getDefense(). " en défense<br>";
    $player1->subit_attaque($player2->getAttaque(),$player1->getDefense());
    echo $player1->getNom(). " reçoit ".$player1->getDegat();

    /////////Verification que l'adversaire soit toujours en vie//////
    if($player1->mort()){
        echo $player1->_nom." est K.O<br>";
        break;
    }
    echo $player1->getNom(). " a ".$player1->getSante()." point de vie<br>";
    echo $player2->getNom(). " a ".$player2->getSante()." point de vie<br>";
}
echo "Combat Terminé !!";




