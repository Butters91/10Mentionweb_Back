<?php
require_once "../inc/function.inc.php";

class JeuVideo {

    /**
     * Le nom du jeu
     *
     * @var string
     */
    private string $nomDuJeu;

    /**
     * Le modéle de la console
     *
     * @var string
     */
    private string $console;

    /**
     * Le prix du jeu 
     *
     * @var string
     */
    private float $prix;

    




    /**
     * Le constructeur de la classe
     * 
     *  Le constructeur est une méthode spéciale dans une classe, définie avec le nom __construct().
     * Elle est utilisée pour initialiser les propriétés de l'objet lors de sa création.
     * En PHP, il s'agit d'une méthode magique, ce qui signifie qu'elle est automatiquement appelée lors de l'instanciation de la classe.
     * Il est important de noter qu'une classe ne peut avoir qu'un seul constructeur en PHP.
     *
     * @param string $n le non du jeu
     * @param string $c le modéle de la console
     * @param float $p le prix du jeux
     */




    public function __construct(string $n, string $c, float $p){

        // Initialisation des propriétés de l'objet avec les valeurs fournies lors de l'instanciation
        $this->nomDuJeu = $n;
        $this->console = $c;
        $this->prix = $p;



    }



    /**
     * Méthode pour obtenir le nom du jeu vidéo
     *
     * @return string
     */
    public function getNomDuJeu() : string{

        return $this->nomDuJeu;
    }

     /**
     * Méthode pour obtenir la consoledu jeu vidéo
     *
     * @return string
     */
    public function getConsole() : string{

        return $this->console;
    }


     /**
     * Méthode pour obtenir le nom du jeu vidéo
     *
     * @return float
     */
    public function getPrix() : float{

        return $this->prix;
    }


    /**
     *  Méthode pour afficher les details du jeu vidéo
     *
     * @return string
     */
    public function afficheDetails(){
        return "<p>Jeux : {$this->nomDuJeu}, console : {$this->console}, prix : {$this->prix}€ </p>";
    }



}

// Instaniation de la classe JeuVideo avec arguments pour initailiser les propriétés
$jeu_1 = new JeuVideo('Street figther 6', 'PS4', 96.99);
debug($jeu_1);


// Instaniation de la classe JeuVideo avec arguments pour initailiser les propriétés
$jeu_2 = new JeuVideo('Diablo IV', 'PS5', 79.99);
debug($jeu_2);

echo $jeu_1->afficheDetails();
echo $jeu_2->afficheDetails();