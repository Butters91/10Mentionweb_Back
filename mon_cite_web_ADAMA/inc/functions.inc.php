<?php
// Déclaration du lancement de la session.
// session_start(); 


 define("RACINE_SITE","http://10mentionweb_back.local/mon_cite_web_ADAMA/");



 // constante du serveur => localhost
 define("DBHOST", "localhost");

 // constante de l'utlisateur de la BDD du serveur en local => root

 define("DBUSER", "root");

 // contante pour le mot de pase de serveur en local => pas de mot de passe
 define("DBPASS", "");

 // constante pour le nom de la BDD

 define("DBNAME", "adama");


 function connexionBdd() {

    //DSN (Data Source Name)
    // $dsn = mysql:host=localhost;dbname=cinema;charset=utf8;
    $dsn = "mysql:host=".DBHOST.";dbname=".DBNAME.";charset=utf8";

    //Grâce à PDO on peut lever une exception (une erreur) si la connexion à la BDD ne se réalise pas(exp: suite à une faute au niveau du nom de la BDD) et par la suite si  cette erreur est capté on lui demande d'afficher une erreur

    try {// dans le try on vas instancier PDO, c'est créer un objet de la classe PDO (un élment de PDO)
        // avec la variable dsn et les constantes d'environnement

        $pdo = new PDO($dsn, DBUSER, DBPASS);
       // echo "je suis connectée";

        //On définit le mode d'erreur de PDO sur Exception
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);


    } catch (PDOException $e) {  // PDOException est une classe qui représente une erreur émise par PDO et $e c'est l'objetde la clase en question qui vas stocker cette erreur

        die("Erreur : " . $e->getMessage()); // die permet d'arrêter le PHP et d'afficher une erreur en utilisant la méthode getMessage de l'objet $e
    }

    //le catch sera exécuter dès lors on aura un problème da le try

    return $pdo;  //ici on utilise un return car on récupère l'objet de la fonction que l'on vas appelé  dans plusieurs autre fonctions

}

function logOut(){

    if(isset($_GET['action']) && $_GET['action'] == "deconnexion" ){

        unset($_SESSION['utilisateur']);
        header('location:index.php');
    }
}

logOut();

// Inscription

function inscriptionUsers(string $username, string $email,  string $password, string $phone) : void{

    /* Les requêtes préparer sont préconisées si vous exécutez plusieurs fois la même requête. Ainsi vous évitez au SGBD de répéter toutes les phases analyse/ interpretation / exécution de la requête (gain de performance). Les requêtes préparées sont aussi utilisées pour nettoyer les données et se prémunir des injections de type SQL.

            1- On prépare la requête
            2- On lie le marqueur à la requête
            3- On exécute la requête

    */

    // Créer un tableau associatif avec les noms des colonnes comme clés
    // Les noms des clés du tableau $data correspondent aux noms des colonnes dans la base de données.

$data = [
'username' => $username,
'email' => $email,
'password' => $password,
'phone' => $phone,
];


// échapper les données et les traiter contre les failles JS (XSS)
foreach($data as $key => $value) {

}



    $cnx = connexionBdd();

    // on prépare la requête
    $sql = "INSERT INTO users
    (username, email, password, phone) VALUES (:username, :email, :password, :phone)";

    $request = $cnx->prepare($sql); //prepare() est une méthode qui permet de préparer la requête sans l'exécuter. Elle contient un marqueur :firstName qui est vide et attend une valeur.
    // $requet est à cette ligne  encore un objet PDOstatement .
    $request->execute(array(
       ':username' => $data['username'],
        ':email' => $data['email'],
        ':password' => $data['password'],
        ':phone' => $data['phone'],
        
    )); // execute() permet d'exécuter toute la requête préparée avec prepare().

}




// tableau image 

function createTableImage(){
    $cnx = connexionBdd();

    $sql = "CREATE TABLE IF NOT EXISTS images (
        img_id INT NOT NULL AUTO_INCREMENT,
        img_nom VARCHAR(50) NOT NULL,
        img_taille VARCHAR(25) NOT NULL,
        img_type VARCHAR(25) NOT NULL,
        img_desc VARCHAR(100) NOT NULL,
        img_blob BLOB NOT NULL,
        PRIMARY KEY (img_id)
    )";

    // Exécution de la requête pour créer la table
    try {
        $cnx->exec($sql);
        echo "Table 'images' créée avec succès.";
    } catch (PDOException $e) {
        echo "Erreur lors de la création de la table : " . $e->getMessage();
    }
}

function login($username, $password) {
    $cnx = connexionBdd();
    $sql = "SELECT * FROM users WHERE username = :username LIMIT 1";
    $stmt = $cnx->prepare($sql);
    $stmt->execute(['username' => $username]);
    $user = $stmt->fetch();

    // Vérification du mot de passe
    if ($user && password_verify($password, $user['password'])) {
        // Définir la session utilisateur
        $_SESSION['utilisateur'] = $user['username'];
        return true;
    } else {
        return false;
    }
}

// createTableImage();

// creation de la liste des personnage pour la base donnéer

function insertPersonnage($nom_japonais, $nom_romanise, $nom_francais, $premiere_apparition, $occupations, $epithet, $prime, $anniversaire, $age, $taille, $groupe_sanguin, $voix_japonaise, $voix_francaise, $lieux, $combats, $image) {
    // Connexion à la base de données
    $cnx = connexionBdd();

    // Requête SQL d'insertion
    $sql = "INSERT INTO personnage (
        nom_japonais, nom_romanise, nom_francais, premiere_apparition, occupations, epithet, prime, anniversaire, age, taille, lieux, combats, image
    ) VALUES (
        :nom_japonais, :nom_romanise, :nom_francais, :premiere_apparition, :occupations, :epithet, :prime, :anniversaire, :age, :taille, :lieux, :combats, :image
    )";

    // Préparation de la requête
    $stmt = $cnx->prepare($sql);

    // Exécution de la requête avec les paramètres
    try {
        $stmt->execute([
            ':nom_japonais' => $nom_japonais,
            ':nom_francais' => $nom_francais,
            ':premiere_apparition' => $premiere_apparition,
            ':occupations' => $occupations,
            ':epithet' => $epithet,
            ':prime' => $prime,
            ':anniversaire' => $anniversaire,
            ':age' => $age,
            ':taille' => $taille,
            ':lieux' => $lieux,
            ':combats' => $combats,
            ':image' => $image
        ]);
        echo "Personnage ajouté avec succès.<br>";
    } catch (PDOException $e) {
        echo "Erreur lors de l'insertion du personnage : " . $e->getMessage();
    }
}

$personnages = [
    [
        'nom_japonais' => 'モンキー・D・ルフィ',
        'nom_romanise' => 'Monkī Dī Rufi',
        'nom_francais' => 'Monkey D. Luffy',
        'premiere_apparition' => '1999, île des hommes-poisson',
        'occupations' => 'Pirate',
        'epithet' => 'Chapeau de paille',
        'prime' => '1 500 000 000 Berrys',
        'anniversaire' => '1995-05-05',
        'age' => 19,
        'taille' => 174,
        'groupe_sanguin' => 'F',
        'voix_japonaise' => 'Mayumi Tanaka',
        'voix_francaise' => 'Chantal Macé',
        'lieux' => 'East Blue',
        'combats' => 100,
        'image' => 'personnage/luffy01.png'
    ],
    [
        'nom_japonais' => 'ロロノア・ゾロ',
        'nom_romanise' => 'Roronoa Zoro',
        'nom_francais' => 'Roronoa Zoro',
        'premiere_apparition' => '1999, East Blue',
        'occupations' => 'Épéiste',
        'epithet' => 'Chasseur de pirates',
        'prime' => '320 000 000 Berrys',
        'anniversaire' => '1997-11-11',
        'age' => 21,
        'taille' => 181,
        'groupe_sanguin' => 'XF',
        'voix_japonaise' => 'Kazuya Nakai',
        'voix_francaise' => 'David Manet',
        'lieux' => 'East Blue',
        'combats' => 80,
        'image' => 'personnage/zoro01.png'
    ],
    // Ajoutez d'autres personnages ici de la même manière...

    

    

];


function showPersonnageViaId($idPersonnage) {
    $cnx = connexionBdd(); // Connexion à la base de données
    $sql = "SELECT * FROM personnage WHERE id = :id_personnage";
    $stmt = $cnx->prepare($sql); // Préparation de la requête SQL
    $stmt->execute([':id_personnage' => $idPersonnage]); // Exécution de la requête avec l'ID passé en paramètre
    return $stmt->fetch(); // Retourne un tableau avec les informations du personnage ou FALSE si aucun résultat
}



//   function pour alert
function alert(string $contenu, string $class){
    return
        "<div class=\"alert alert-$class alert-dismissible fade show text-center w-50 m-auto mb-5\" role=\"alert\">
                $contenu
            <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
        </div>";





}



function getAllPersonnage() {
    // Obtenez la connexion à la base de données
    $db = connexionBdd(); 

    // Requête SQL pour récupérer les personnages
    $sql = "SELECT id, nom_francais, image FROM personnage"; 

    // Exécution de la requête
    $result = $db->query($sql);

    // Stocker les résultats dans un tableau
    $personnages = [];
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $personnages[] = $row;
    }

    return $personnages; // Retourner le tableau des personnages
}



function checkEmailUsers(string $email) :mixed{

    $cnx = connexionBdd();
    $sql = "SELECT * FROM users WHERE email = :email";
    $request = $cnx ->prepare($sql);
    $request->execute(array(
    ':email' => $email,
    ));
    $result = $request->fetch(PDO::FETCH_ASSOC); //Le paramètre  PDO::FETCH_ASSOC permet de transformer l'objet en un array ASSOCIATIF.On y trouve en indices le nom des champs de la requête SQL.
    /**
     * Pour information, on peut mettre dans les parenthéses de fecth()
     *  PDO::FETCH_NUM pour obtenir un tableau aux indices numèrique
     * PDO::FETCH_OBJ pour obtenir un dernier objet
     * ou encore des () vides pour obtenir un mélange de tableau associatif et indéxé
     */

    return $result;
}


function checkUsers(string $username) : mixed{
    $cnx = connexionBdd();
    $sql = "SELECT * FROM users WHERE username = :username";
    $request = $cnx->prepare($sql);
    $request->execute(array (
        
        ":username" => $username
        

 ));
 $result = $request->fetch();

 return $result;


}


function insertPersonnageAvecImage($nom_japonais, $nom_francais, $image) {
    // Connexion à la base de données
    $cnx = connexionBdd();
    
    // Chemin où sera enregistré le fichier image
    $target = "img/" . basename($image['name']);
    
    // Vérifier si l'image est correctement téléchargée
    if (move_uploaded_file($image['tmp_name'], $target)) {
        // Requête SQL d'insertion du personnage et de l'image
        $sql = "INSERT INTO personnage (nom_japonais, nom_francais, image) 
                VALUES (:nom_japonais, :nom_francais, :image)";
        
        // Préparation de la requête
        $stmt = $cnx->prepare($sql);
        
        // Exécution de la requête avec les paramètres
        try {
            $stmt->execute([
                ':nom_japonais' => $nom_japonais,
                ':nom_francais' => $nom_francais,
                ':image' => $image['name']
            ]);
            echo "Personnage et image ajoutés avec succès.";
        } catch (PDOException $e) {
            echo "Erreur lors de l'insertion du personnage : " . $e->getMessage();
        }
    } else {
        echo "Erreur lors du téléchargement de l'image.";
    }
}



?>