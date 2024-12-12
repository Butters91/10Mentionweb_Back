<?php
session_start(); // Démarrer la session

// Inclure la connexion à la base de données
require_once 'inc/functions.inc.php';

$error = ''; // Initialisation du message d'erreur

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Récupérer les champs avec protection
    $username = trim(htmlentities($_POST['username']));
    $password = trim(htmlentities($_POST['password']));

    // Connexion à la base de données
    $cnx = connexionBdd();

    // Vérifier si l'utilisateur existe
    $sql = "SELECT * FROM users WHERE username = :username LIMIT 1";
    $stmt = $cnx->prepare($sql);
    $stmt->execute(['username' => $username]);

    $user = $stmt->fetch();

    // Si l'utilisateur existe et que le mot de passe correspond
    if ($user && password_verify($password, $user['password'])) {
        // Enregistrer toutes les informations pertinentes de l'utilisateur dans la session
        $_SESSION['utilisateur'] = [
            'id' => $user['id'],
            'username' => $user['username'],
            'email' => $user['email'],
            'phone' => $user['phone']
        ];

        // Redirection vers la page d'accueil ou une autre page
        header("Location: index.php");
        exit;
    } else {
        $error = "Nom d'utilisateur ou mot de passe incorrect.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authentification</title>
    <link rel="stylesheet" href="style.css"> <!-- Ajoutez ici votre feuille de style -->
</head>
<body>
    <h2>Connexion</h2>

    <?php if (!empty($error)): ?>
        <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <form action="authentification.php" method="post">
        <div>
            <label for="username">Nom d'utilisateur :</label>
            <input type="text" name="username" id="username" required>
        </div>

        <div>
            <label for="password">Mot de passe :</label>
            <input type="password" name="password" id="password" required>
        </div>

        <div>
            <button type="submit">Se connecter</button>
        </div>
    </form>
</body>
</html>
