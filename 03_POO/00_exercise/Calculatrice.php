<?php
require_once "../inc/function.inc.php";


class calculatrice {


    /**
     * Additionner deux nombre 
     *
     * @param integer $nb1
     * @param integer $nb2
     * @return integer la somme des deux nombre
     */
    public function additionner( int $nb1 , int $nb2 ) :int {

        return $nb1 + $nb2;

     


    }

   public function diviser( float $nb1, float $nb2) :mixed{

        if ($nb2 == 0) {
            $result = false;
            return "false";
        }
        return $result = $nb1 / $nb2 ;
   }
}

$calcul = new calculatrice();

$addition = $calcul->additionner(10,2);
echo $addition . "<br>";

$division = $calcul->diviser(10,0);
echo $division



?>