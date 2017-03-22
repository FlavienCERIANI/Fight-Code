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
    private $_sante=20;
    private $_bouclier;
    private $_potion=50;
    private $_attaque;
    private $_defense;
    private $_nb_attaque;

    public function __construct($nom)
    {
        $this->_nom = $nom;
    }

    public function getNom(){
        return $this->_nom;
    }

    public function getSante(){
        return $this->_sante;
    }

    public function attaque($atk){
        $this->_attaque=$atk;
    }

    public function getAttaque(){
        return $this->_attaque;
    }

    public function defense($def){
         $this->_defense=$def;
    }

    public function getDefense(){
        return $this->_defense;
    }

    public function subit_attaque($degat,$def){

        $this->_nb_attaque=$degat-$def;
        if($this->_nb_attaque<0){
            $this->_nb_attaque=0;
        }

        $this->_sante-=$this->_nb_attaque;
        return $this->_nb_attaque;
    }

    public function getDegat(){
        return $this->_nb_attaque." de dégat<br>".$this->coupcritique();
    }

    private function coupcritique(){
        if($this->_nb_attaque>15){
            return "coup critique !!!"."<br>";
        }
    }

    public function mort(){
       return $this->_sante <= 0 ;
    }

    public function UsePotion($nb){
      if ($nb >= 1){
        for($i=0;$i<10;$i++){
          if($this->_sante == 50){
            return true ;
          }
          else {
              $this->_sante += 1;
          }
        }
      return true ;
      }
      else {
        return false;
      }
    }
}
