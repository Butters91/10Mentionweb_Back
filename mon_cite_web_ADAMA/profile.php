<?php
session_start(); // Démarre la session

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['utilisateur'])) {
    header("Location: authentification.php"); // Redirige vers la page de connexion si non connecté
    exit;
}

// Débogage : vérifier le contenu de la session
// Supprimez cette ligne en production
// var_dump($_SESSION['utilisateur']);

$user = $_SESSION['utilisateur']; // Récupérer les informations utilisateur stockées dans la session

require_once 'inc/header.inc.php'; // Inclure le header
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Utilisateur</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Bienvenue, <?= htmlspecialchars($user['username']); ?>!</h2>
        
        <p>Email : <?= htmlspecialchars($user['email']); ?></p> 
        <!-- Le mot de passe ne devrait pas être affiché pour des raisons de sécurité -->
        <p>Téléphone : <?= htmlspecialchars($user['phone']); ?></p>
        <!-- Autres informations personnelles si nécessaire -->
        <a href="authentification.php?action=deconnexion">Se déconnecter</a>
    </div>

    <table class="table">
        <tr>
            <th scope="row" class="fw-bold">Nom d'utilisateur</th>
            <td><?= htmlspecialchars($user['username']); ?></td>
        </tr>
        <tr>
            <th scope="row" class="fw-bold">Email</th>
            <td><?= htmlspecialchars($user['email']); ?></td>                   
        </tr>
        <tr>
            <th scope="row" class="fw-bold">Téléphone</th>
            <td><?= htmlspecialchars($user['phone']); ?></td>
        </tr>
    </table>
</body>
</html>

<?php
require_once 'inc/footer.inc.php'; // Inclure le footer
?>
