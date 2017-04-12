<?php
$player1="dragon";
// $player1=$player1.".ogg";
echo $player1;

echo ' '

echo '<video class="dragogg" width="100%" height="100%" controls="controls">';
 // echo '<source src='.$player1.'.ogg type="video/ogg" />';
 echo '<source src='.$player1->getNom().'_attaque_'.$player2->getNom().'.ogg type="video/ogg" />';
 
