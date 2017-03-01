<?php
/**
 * Created by PhpStorm.
 * User: antoine_narboux
 * Date: 15/02/17
 * Time: 14:15
 */
echo "Début du combat<br>";

include('Personnage.class.php');
include('De.class.php');


$de = new De();

$player1= new Personnage("Rondoudou");
var_dump($player1);


$player2= new Personnage("Dracofeu");
var_dump($player2);

while ((!$player1->mort()) && (!$player2->mort())) {
    ?>
    <script> var rep = prompt("Que voulez-vous faire ?");
        alert(rep);
    </script>
<?php
////Preparation attaque///
    $degat1 = $player1->degat($de->lanceDe());
    $degat2 = $player2->degat($de->lanceDe());

////Degat reçu////
    $player2->subit_attaque($degat1);
    $player1->subit_attaque($degat2);

    var_dump($player2);
    var_dump($player1);

    if($player1->mort()){
        echo $player1->_nom." est mort";
    }
    if($player2->mort()){
        echo $player2->_nom." est mort";
    }
}

