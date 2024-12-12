<?php
session_start();
require_once "inc/db.php";  // Inclusion du fichier de connexion à la base de données
require_once "inc/functions.inc.php";  // Connexion à la base de données
require_once "inc/header.inc.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $email = trim($_POST['email']);
    $nom = trim($_POST['nom']);
    $prenom = trim($_POST['prenom']);
    $message = trim($_POST['message']);

    // Validation des champs (s'assurer que tous les champs sont remplis)
    if (!empty($email) && !empty($nom) && !empty($prenom) && !empty($message)) {
        // Insérer les données dans la base de données
        $sql = "INSERT INTO contact (email, nom, prenom, message) VALUES (:email, :nom, :prenom, :message)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':email' => $email,
            ':nom' => $nom,
            ':prenom' => $prenom,
            ':message' => $message
        ]);

        // Confirmation de l'envoi
        $success = "Votre message a bien été envoyé !";
    } else {
        // Afficher un message d'erreur si les champs sont vides
        $error = "Tous les champs sont obligatoires.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact - Luffy le roi des pirates</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>
<body>

<!-- Début du formulaire -->
<section class="container mt-5">
    <h1 class="Formulaire text-center mb-4">Formulaire de contact</h1>

    <!-- Affichage des messages de succès ou d'erreur -->
    <?php if (isset($success)) : ?>
        <div class="alert alert-success"><?= $success; ?></div>
    <?php endif; ?>

    <?php if (isset($error)) : ?>
        <div class="alert alert-danger"><?= $error; ?></div>
    <?php endif; ?>

    <form class="form" method="POST" action="contact.php">
        <div class="form-group">
            <label for="email">Adresse mail</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Entrez votre email" required>
        </div>
        <div class="form-group">
            <label for="nom">Nom</label>
            <input type="text" class="form-control" id="nom" name="nom" placeholder="Entrez votre nom" required>
        </div>
        <div class="form-group">
            <label for="prenom">Prénom</label>
            <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Entrez votre prénom" required>
        </div>
        <div class="form-group">
            <label for="message">Message</label>
            <textarea class="form-control" id="message" name="message" rows="4" placeholder="Votre message" required></textarea>
        </div>
        <button type="submit" class="btn btn-success btn-block">Envoyer</button>
    </form>
</section>
<!-- Fin du formulaire -->

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6vrXTR6e3e6pG6MzNpKDhfnq5Kc5a50IY0sD2T1GA2xjxArV2" crossorigin="anonymous"></script>
<?php
require_once "inc/footer.inc.php";
?>
</body>
</html>
