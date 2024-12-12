

<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
        <meta name="description" content="Premier site en PHP : site cinema">
        <meta name="author" content="Kaïss BADI">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@200..800&family=Lora:ital,wght@0,400..700;1,400..700&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

        <link rel="stylesheet" href="../assets/css/style.css">
        <title></title>
    </head>

    <body>
        <header>
            <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Navbar</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Dropdown
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link disabled" aria-disabled="true">Disabled</a>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
                </div>
            </div>
            </nav>
        </header>
,24 juin, 16:35,
mardi 2 juil.
Kaiss BADI - EVRY 2024
,
2 juil., 12:36
,
<?php
                        if (empty($_SESSION['user'])){
                    ?>              
                        <li class="nav-item">
                            <a class="nav-link" href="register.php">Inscription</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="authentification.php">Connexion</a>
                        </li>

                    <?php
                        }else{
                    ?>

                    <li class="nav-item">
                        <a class="nav-link" href="profil.php">Compte</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?action=deconnexion">Déconnexion</a>
                    </li>

                    <?php
                        if ($_SESSION['user']['role'] == "ROLE_ADMIN") {
                    ?>
                            
                            <li class="nav-item">
                                <a class="nav-link" href="#">Backoffice</a>
                            </li>
                    
                    <?php
                        }}
                    ?>
,2 juil., 12:36,
Kaiss BADI - EVRY 2024
,
2 juil., 15:04
,
https://sharemycode.fr/06L
,2 juil., 15:04,
jeudi 11 juil.
Kaiss BADI - EVRY 2024
,
11 juil., 15:33
,
!preg_match('/.*\/.*/', $actors)
,11 juil., 15:33,
vendredi 12 juil.
Kaiss BADI - EVRY 2024
,
12 juil., 16:09
,
function updateFilm(int $id_film,int $category_id,string $title,string $director,string $actors,string $ageLimit,string $duration,string $synopsis,string $date,string $image,float $price,int $stock):void{
    $film = [
      'id_film'=> $id_film,
      'category_id'=>$category_id,
      'title' => $title,
      'director' => $director,
      'actors' => $actors,
      'ageLimit' => $ageLimit,
      'duration' => $duration,
      'synopsis' => $synopsis,
      'date' => $date,
      'image' => $image,
      'price' => $price,
      'stock' => $stock
  ];
  foreach($film as $key => $value){
      $film[$key] = htmlentities($value,ENT_QUOTES,'UTF-8');
  }
    $cnx=connextionBdd();
    $sql = "UPDATE films SET category_id = :category_id,title = :title,director = :director,actors = :actors,ageLimit = :ageLimit, duration =:duration,synopsis =:synopsis,date = :date, image = :image,price = :price, stock = :stock WHERE id_film = :id_film";
    $request = $cnx->prepare($sql);
    $request ->execute(array(
                                ":id_film" => $film['id_film'],
                                ":category_id" => $film['category_id'],
                                ":title"=> $film['title'], 
                                ":director"=>$film['director'], 
                                ":actors"=>$film['actors'], 
                                ":ageLimit"=>$film['ageLimit'],
                                ":duration"=>$film['duration'],
                                ":synopsis"=>$film['synopsis'],
                                ":date"=>$film['date'],
                                ":image"=>$film['image'],
                                ":price"=>$film['price'],
                                ":stock"=>$film['stock']

    ));
  }
,12 juil., 16:09,
mardi 16 juil.
Kaiss BADI - EVRY 2024
,
16 juil., 09:54
,
if (isset($_GET) && isset($_GET['action']) && isset($_GET['id_film'])) {
    
        if ($_GET['action']=='delete' && !empty($_GET['id_film'])) {
            $idfilm = htmlentities($_GET['id_film']);
            deletfilm($idfilm);
            header("location:".RACINE_SITE."admin/films.php");
        }
    }
,16 juil., 09:54,
Vous
,
16 juil., 16:34
,
if (isset($_GET) && !empty($_GET)) {

    if (isset($_GET['id_category']) && !empty($_GET['id_category'])) {
      

        $idCategory = htmlentities($_GET['id_category']);

    if (is_numeric($idCategory)) {
       

        $films = filmsByCategory($idCategory);

    }else {

       header('location:index.php');
    }

 }elseif(isset($_GET['action']) && $_GET['action'] == 'voirPlus' ) {

    $films = allFilms();
 }

    

}else {

    $films = filmBydate();
}



require_once "inc/header.inc.php";
?>
,16 juil., 16:34,
jeudi 18 juil.
Kaiss BADI - EVRY 2024
,
18 juil., 12:25
,
<div class="mx-auto p-2 row flex-column align-items-center">
    <h2 class="text-center mb-5">Bonjour </h2>
    <div class="cardParfum">
        <div class="image">
         <img src="assets/img/avatar_f.png" alt="Image avatar femme">
            <div class="details">
            <div class="center ">
                
                <table class="table">
                          <tr>
                                <th scope="row" class="fw-bold">Nom</th>
                                <td></td>
                               
                            </tr>
                            <tr>
                                <th scope="row" class="fw-bold">Prenom</th>
                                <td></td>
                                
                            </tr>
                            <tr>
                                <th scope="row" class="fw-bold">Pseudo</th>
                                <td colspan="2"></td>
                                
                            </tr>
                            <tr>
                                <th scope="row" class="fw-bold">email</th>
                                <td colspan="2"></td>
                                
                            </tr>
                            <tr>
                                <th scope="row" class="fw-bold">Tel</th>
                                <td colspan="2"></td>
                                
                            </tr>
                            <tr>
                                <th scope="row" class="fw-bold">Adresse</th>
                                <td colspan="2"></td>
                                
                            </tr>

                </table>
                <a href="" class="btn mt-5">Modifier vos informations</a>

            </div>
        </div>

    </div>
,18 juil., 12:25,
lundi 22 juil.
Vous
,
22 juil., 15:49
,
tu as fait comment ?
,22 juil., 15:49,
Kaiss BADI - EVRY 2024
,
22 juil., 15:50
,
if (isset($_GET['vider'])) {
     
     unset($_SESSION['panier']);
     
}
,22 juil., 15:50,
c tout simple
,22 juil., 15:50,
Vous
,
22 juil., 15:51
,
merci je savais que c'etait ca serieux
,22 juil., 15:51,
Vous
,
22 juil., 15:53
,
juste je sais pas ou placer sérieux je bug
,22 juil., 15:53,
Kaiss BADI - EVRY 2024
,
22 juil., 15:53
,
ou tu veux
,22 juil., 15:53,
sauf dans une autre condidtion
,22 juil., 15:53,
Vous
,
22 juil., 15:54
,
ok j'ai mis juste a coté du if user en haut
,22 juil., 15:54,
mardi 23 juil.
Vous
,
23 juil., 12:38
,
https://we.tl/t-64JvL8wEFq
,23 juil., 12:38,
jeudi 25 juil.
Vous
,
25 juil., 15:59
,
<?= (!empty($_SESSION['panier']) && !empty($_SESSION['user']) ) ? count($_SESSION['panier']) : '' ?>
,25 juil., 15:59,
Aujourd'hui
Kaiss BADI - EVRY 2024
,
À l'instant
,
<?php

require_once "../inc/function.inc.php";

/** 
 * En programmation, Une classe permet de regrouper des données (attributs) et des comportements (méthodes).
 * Pour obtenir un objet, il faut demander au langage de le créer et de nous le donner pour qu’on puisse le manipuler. Pour faire ça, on précise au langage le nom de l’élément que l’on veut manipuler, c’est-à-dire la classe.
 * Une classe permet de produire plusieurs objets. Par convention, une classe sera nommée avec la première lettre en MAJUSCULE.
 * La classe représente un modèle de données qui définit la structure commune à tous les objets créés à partir de celle-ci. La classe constitue donc une sorte de moule à travers lequel plusieurs objets du même type et de même structure peuvent être créés.
 * Une classe représente une entité (le modèle qu'elle doit suivre) ; elle a ses services (= méthodes : ce qu'elle propose et ce qu'elle permet de faire) et elle a les attributs (= propriétés : ses spécificités).
 * 
 * Pour en savoir plus : 
 * - https://blog.hubspot.fr/website/programmation-orientee-objet#:~:text=La%20programmation%20orient%C3%A9e%20objet%2C%20ou,des%20instances%20individuelles%20d'objets.
 * 
 * Pour définir et créer une classe, on utilise le mot-clé class suivi du nom de la classe (avec une lettre majuscule au début et à chaque début d'un nouveau mot dans le nom de la classe).
 *////////////////////////////////////

// Classe representant un panier d'article

class Panier{


    // une propriété (ou attribut) => une variable appartenant à une classe 
    // une méthode => une fonction appartenant à une classe

    // les annotations sont très utiles pour les outils de développement et les environnements de développement intégré (IDE), elles ne sont pas obligatoires en PHP.
    // En programmation, un docblock ou DocBlock est un commentaire spécialement formaté spécifié dans le code source qui est utilisé pour documenter un segment de code spécifique

    // L'annotation @var est utilisée dans les commentaires de documentation (DocBlock) en PHP pour indiquer le type de donnée associé à une variable. Elle est souvent utilisée pour documenter les propriétés d'une classe, les variables dans des fonctions ou méthodes, ou même des variables dans le code, afin de clarifier le type attendu ou utilisé.

    /**
     *  @var int Nombre de produit dans le panier
     */

public int $nbrProduits; // c'est une propriété dans la classe Panier




    /**
     * @return string
     */
public function ajouterArticle(){
    return "l'article a été ajouté";
}


    /**
     * @return string
     */
    public function suprimerArticle(){
        return "l'article a été retirer";
    }


    
    // On peut déclarer des mèthodes avec des paramètres 
    
    /**
     * Retourne le nombre d'article dans le panier
     * @param int $nbr le nombre d'article à définir (par défaut 10)
     * @return string Un message indique le nombre d'article dans le panier
     */

     // L'annotation @param est utilisée dans les commentaires de documentation (DocBlock) en PHP pour décrire les paramètres d'une fonction ou d'une méthode,  on y trouve : le type, le nom et une brève description (facultatif) du rôle de chaque paramètre attendu par la fonction ou la méthode

    // L'annotation @return est utilisée dans les commentaires de documentation (DocBlock) en PHP pour indiquer le type de valeur qu'une fonction ou une méthode renvoie.

    public function nombreArticle( int $nbr = 10) : string { // nombreArticle()retourne par défaut un message avec 10 articles si aucun paramètre n'est pa passé

        return "Il y a $nbr article(s) dans le panier";
    }
}

$panier_1 = new Panier(); // Instanciation de la classe : on instancie ou on crée une instance de notre classe Panier, on le stock dans un podjet, cela permet de passer d'une classe à l'objet 
// Panier c'est le modèle, $panier_1 est une version concrète de ce modèle
// new : mot-clé permettant d'effectuer une instanciation 
debug($panier_1); // addiche la valeur de la propriété dans l'objet, type(objet), nom de la classe et référence de l'objet

debug(get_class_methods($panier_1)); // Cette méthode permet d'obtenir une liste des méthodes d'une classe donnée. Elle renvoie un tableau contenant les noms de toutes les méthodes publiques de la classe spécifiée, y compris celle héritées de classe parentes

$panier_1->nbrProduits = 5; //on accéde à la propriété $nbrProduits grace à la flèche "->" appelée "opérateur objet" et on lui donne une valeur définie (5)

debug($panier_1);

echo "<p> Il y a {$panier_1->nbrProduits} article(s) dans le panier </p>";
echo $panier_1->ajouterArticle() ."<br>";
echo $panier_1->ajouterArticle() ."<br>";
echo $panier_1->ajouterArticle() ."<br>";

////////////////////////////////

$panier_2 = new Panier();

debug($panier_2);

unset($panier_1); // pour détruire un objet
debug($panier_1); // affiche Undefind variable $panier_1

// on instancie un troisième objet et on le stock dans la variable $panier_3

$panier_3 = new Panier();

debug($panier_3); // Ici le nouvel objet $panier_3 a pris la place dans la mémoire : on voit 1 dan le debug

$panier_4 = new Panier();

debug($panier_4);

/**
 * Une fois créés, les objets sont indépendants et ont chacun leurs propriétés ; ils ont tous accès aux méthodes déclarées dans la classe.
 * Toutes les informations déclarées publiques dans une classe seront accessibles depuis l'extérieur de cette classe.
 */

