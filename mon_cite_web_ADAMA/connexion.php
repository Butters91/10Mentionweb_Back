<?php
// Affichage des erreurs pour le débogage
ini_set('display_errors', 1);
error_reporting(E_ALL);

echo "Le fichier connexion.php est exécuté.<br>";

require_once "inc/functions.inc.php";
echo "Functions incluses.<br>";

$pdo = connexionBdd();
if ($pdo) {
    echo "Connexion à la base de données réussie.<br>";
} else {
    echo "Échec de la connexion à la base de données.<br>";
    die();
}

$message = ""; // Message qui sera affiché en cas d'erreur ou de succès.

session_start(); // Démarrage de la session

// Vérification des données POST
if (!empty($_POST)) {
    echo "Données POST reçues.<br>";

    // On vérifie si un champ est vide
    $verif = true;
    foreach ($_POST as $key => $value) {
        if (empty(trim($value))) {
            $verif = false;
        }
    }

    if ($verif == false) {
        $message = alert("Veuillez renseigner tous les champs", "danger");
        echo $message;
    } else {
        // Récupération des valeurs saisies
        $username = trim($_POST['username']);
        $password = $_POST['password'];

        echo "Nom d'utilisateur saisi : $username<br>";

        // Vérification si l'utilisateur existe dans la base de données
        $user = checkUsers($username);

        if ($user) {
            echo "Utilisateur trouvé : ";
            var_dump($user);

            // Vérification du mot de passe haché
            if (password_verify($password, $user['password'])) {
                echo "Mot de passe vérifié avec succès.<br>";

                // Création de la session utilisateur
                $_SESSION['utilisateur'] = $user;

                // Redirection vers la page de profil
                // header('location:profile.php');
                // exit(); // Arrête le script après la redirection
            } else {
                $message = alert('Les identifiants sont incorrects', 'danger');
                echo $message;
            }
        } else {
            $message = alert('Les identifiants sont incorrects', 'danger');
            echo $message;
        }
    }
} else {
    echo "Aucune donnée POST reçue.<br>";
}

// Inclusion du header
require_once "inc/header.inc.php";
?>
<!-- Affichage du formulaire -->
<div class="container-form">
    <div class="form-wrapper">
        <h2>Connexion</h2>
        <?= $message ?> <!-- Affiche les messages d'erreur ou succès ici -->
        <form action="connexion.php" method="post">
            <div class="form-group">
                <label for="username">Nom d'utilisateur</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">Se connecter</button>
        </form>
    </div>
</div>
<?php require_once "inc/footer.inc.php"; ?>
