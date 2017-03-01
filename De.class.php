<?php
/**
 * Created by PhpStorm.
 * User: antoine_narboux
 * Date: 15/02/17
 * Time: 14:40
 */

class De{
    // Constructeur de ma classe dé
    public function __construct(){
    }
    // Permet de lancer le dé et de récupérer une valeur entre 1 et 6
    public function lanceDe(){
        $nbDe=rand(1,6);
        return $nbDe;
    }
}
?>