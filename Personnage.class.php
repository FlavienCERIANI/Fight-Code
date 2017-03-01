<?php
/**
 * Created by PhpStorm.
 * User: antoine_narboux
 * Date: 15/02/17
 * Time: 14:14
 */

class Personnage
{
    public $_nom;
    private $_sante=100;
    private $_bouclier;
    private $_potion=50;
    private $_attaque;
    private $_defense;

    public function __construct($nom)
    {
        $this->_nom = $nom;

        if ($nom == "Rondoudou") {
            $this->_attaque = 12;
            $this->_defense = 10;
        }
        else if ($nom == "Dracofeu") {
            $this->_attaque = 16;
            $this->_defense = 17;
        }
        else {
            return false;
        }

    }

    public function getSante(){
        return $this->_sante;
    }

    public function potion(){
        return $this->_sante+=$this->_potion;
    }

    public function degat($degat){
        return $degat*$this->_attaque;
    }

    public function subit_attaque($degat){
        return $this->_sante-=$degat-$this->_defense;
    }

    public function mort(){
       return $this->_sante <= 0 ;


    }
}