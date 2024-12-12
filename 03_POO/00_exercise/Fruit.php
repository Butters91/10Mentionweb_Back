<?php

class Fruits {


    /**
     * Le nom du  fruit
     *
     * @var string
     */
    private string $nom;


    /**
     * La couleur du fruit
     *
     * @var string
     */
    private string $couleur;


    /**
     * Constructure de la classe
     *
     * @param string $n
     * @param string $c
     */
    public function __construct(string $n, string $c){

        $this->nom = $n;
        $this->couleur = $c;



    }


    /**
     * Récupére le nom du fruit
     *
     * @return string
     */
    public function getNomFruit() : string{

        return $this->nom;
    }


    /**
     *Récupère la couleur du fruit
     *
     * @return string
     */
    public function getCouleur() :string{
        return $this->couleur;
    }


    /**
     * Affiche les détails du fruit
     *
     * @return string
     */
    public function afficheDetails() : string{

        return "<p> Nom du fruit : {$this->nom}; Couleur du fruit : {$this->couleur} </p>";
    }

}


// Création  d'une instance de la classe Fruit avec les valeurs "Fraise" et "Rouge"

$fruit_1 = new Fruits("fraise", "Rouge");

// afficher les informations du fruit en utilisant les méthodes getNom() et getCouleur()

echo $fruit_1->afficheDetails();

$fruité_2 = new Fruits("Mangue", "Jaune");

echo $fruit_2->getCouleur() ."<br>";
echo $fruit_2->getNomfruit();