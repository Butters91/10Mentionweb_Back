<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Luffy le roi des pirates</title>
</head>
<body>
<!-- Début du header -->

<section class="top-page">
<header class="header">
   <!-- Header centré avec côtés noirs -->
<div class="dark-container">
    <section class="top-page">
        <header class="header">
            <div class="logo-nav-container">
                <div class="logo-container">
                    <img src="img/logo.png" alt="logo" class="logo-image">
                </div>
                <nav class="nav">
                    <ul>
                        <li><a href="index.php">Accueil</a></li>
                        <li><a href="personnage.php">Personnages</a></li>       
                        <li><a href="contact.php">Contact</a></li>
                        <?php if (isset($_SESSION['utilisateur']) && $_SESSION['utilisateur']['role'] === 'admin') : ?>
                            <li><a href="ajouter_personnage.php">Backoffice</a></li>
                        <?php endif; ?>
                        <?php if (!isset($_SESSION['utilisateur'])) : ?>
                            <li><a href="connexion.php">Connexion</a></li>
                            <li><a href="register.php">Inscription</a></li>
                        <?php else : ?>
                            <li><a href="profile.php">Profil</a></li>
                            <li><a href="?action=deconnexion">Déconnexion</a></li>
                        <?php endif; ?>
                    </ul>
                </nav>
            </div>
        </header>
    </section>
</div>

</header>
</section>
