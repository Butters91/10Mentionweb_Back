<?php
require_once "../inc/function.inc.php";

// GETTER et SETTER

/**
 * Une classe représentant un humain avec des propriétés privées pour le prénom le nom 
 * Les propriétés sont accédées et modifiées via des méthodes publique appelées getter et setter
 */

 class Humain {

    /**
     * Le prénom de l'humain
     * 
     * @var string
     */
    private string $prenom;



      /**
     * Le nom de l'humain
     * 
     * @var string
     */
    private string $nom;

    /*
    Les propriétés étant 'private', il est nécessaire de passer par des méthodes 'publiques' pour pouvoir lire et écrire ces propriétés.
    On parle de Getter (lire / récupérer) et de Setter (écrire / définir) : ce sont des méthodes qui vont faire la médiation (l'intermédiaire) entre l'extérieur de la classe et ses attributs.
    $this désigne l'objet courant à l'intérieur de la classe.
    */

    /**
     * Définit le prénom de l'humain 
     *
     * @param string $p
     * @return void
     */
    public function setPrenom(string $p) : void { // par convention, on appel la fonction avec le mot-clé 'set'

        if (is_string($p)) { // si c'est une chaine de caractére je rentre dans la condition


            // mot clef $this est une "pseudo-variable" , elle va être remplacée par l'objet courrament utilisé. 
            // $this  est créer automatiquement et qui représente l'insctance courante
            $this->prenom = $p; // assigne la valeur de $p à la propriété $prenom
        }

    }

    /**
     * Undocumented function
     *
     * @return string
     */
    public function getPrenom() : string { // par convention, on appel la fonction avec le mot-clé 'get'

        return $this->prenom;
    }

    /**
     * Définit le nom de l'humain 
     *
     * @param string $p
     * @return void
     */
    public function setNom(string $p) : void { // par convention, on appel la fonction avec le mot-clé 'set'

        if (is_string($p)) { // si c'est une chaine de caractére je rentre dans la condition


            // mot clef $this est une "pseudo-variable" , elle va être remplacée par l'objet courrament utilisé. 
            // $this  est créer automatiquement et qui représente l'insctance courante
            $this->nom = $p; // assigne la valeur de $p à la propriété $prenom
        }

    }

    /**
     * Undocumented function
     *
     * @return string
     */
    public function getNom() : string { // par convention, on appel la fonction avec le mot-clé 'get'

        return $this->nom;
    }
    

 }




 $personne_1 = new Humain();


//$personne_1->prenom = "Adama";
// echo $personne_1->prenom; // accés directe aux propriétés privées nom autorisé

// Utilisateion de la méthode setPrenom() pour définir le prénom de l'humain
$personne_1->setPrenom("Adama");

// Utilisateur de la méthode getPrenom() pour récupérer et afficher le prénom de l'humain
echo $personne_1->getPrenom();

// Utilisateion de la méthode setPrenom() pour définir le prénom de l'humain
//$personne_1->setNon("CISSOKO");

// Utilisateur de la méthode getPrenom() pour récupérer et afficher le prénom de l'humain
//echo $personne_1->getNon();
    