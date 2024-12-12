<?php
require_once "../inc/function.inc.php";


class Vehicule{

    /**
     * Marque du véhicule
     *
     * @var string
     */
    public string $brand; // propriété public



    /**
     * Couleur du véhicule
     *
     * @var string
     */
    private string $color; // propriété privée
}

$vehicule_1 = new Vehicule();
$vehicule_1->brand = "BMW";
echo $vehicule_1->brand . "<br>";


//$vehicule_1->color = "Rouge";
//echo $vehicule->color . "<br>"; // ca affiche une errer : on peut accéder à une propriété privéé


?>