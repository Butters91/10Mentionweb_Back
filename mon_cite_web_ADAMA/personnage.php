<?php
require_once "inc/functions.inc.php";
require_once "inc/header.inc.php";

// Vérifier si un ID de personnage est passé dans l'URL
if (isset($_GET['id_personnage']) && is_numeric($_GET['id_personnage'])) {
    // Si un ID de personnage est passé, afficher les détails du personnage
    $idPersonnage = (int) $_GET['id_personnage'];

    // Utiliser la fonction pour récupérer les détails du personnage par son ID
    $personnage = showPersonnageViaId($idPersonnage);

    // Si le personnage est trouvé, afficher les informations
    if ($personnage) {
        ?>
        <div class="container mt-5">
            <h1 class="text-center"><?= htmlspecialchars($personnage['nom_francais']) ?></h1>
            <div class="row">
                <div class="col-md-6">
                    <img src="<?= RACINE_SITE . "img/" . htmlspecialchars($personnage['image']) ?>" class="img-fluid" alt="<?= htmlspecialchars($personnage['nom_francais']) ?>">
                </div>
                <div class="col-md-6">
                    <h3><strong>Prime :</strong> <?= htmlspecialchars($personnage['prime'] ?? 'Non renseignée') ?></h3>
                    <p><strong>Anniversaire :</strong> <?= htmlspecialchars($personnage['anniversaire'] ?? 'Non renseigné') ?></p>
                    <p><strong>Épithète :</strong> <?= htmlspecialchars($personnage['epithet'] ?? 'Non renseigné') ?></p>
                    <p><strong>Âge :</strong> <?= htmlspecialchars($personnage['age'] ?? 'Non renseigné') ?> ans</p>
                    <p><strong>Taille :</strong> <?= htmlspecialchars($personnage['taille'] ?? 'Non renseignée') ?> cm</p>
                    <p><strong>Lieu :</strong> <?= htmlspecialchars($personnage['lieux'] ?? 'Non renseigné') ?></p>
                </div>
            </div>
            <!-- Ajout du bouton de retour à la liste -->
            <a href="personnage.php" class="btn btn-secondary mt-3">Retour à la liste des personnages</a>
        </div>
        <?php
    } else {
        // Si aucun personnage n'est trouvé avec cet ID
        echo "<p>Personnage introuvable.</p>";
    }
} else {
    // Si aucun ID n'est passé, afficher la liste des personnages
    $personnages = getAllPersonnage(); // Fonction pour récupérer tous les personnages
    ?>
    <div class="container">
        <h1>Liste des personnages</h1>
        <div class="row">
            <?php foreach ($personnages as $personnage) { ?>
                <div class="col-md-4">
                    <div class="card mb-4">
                        <img src="<?= RACINE_SITE . "img/" . htmlspecialchars($personnage['image']) ?>" class="card-img-top" alt="<?= htmlspecialchars($personnage['nom_francais']) ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?= htmlspecialchars($personnage['nom_francais']) ?></h5>
                            <a href="personnage.php?id_personnage=<?= htmlspecialchars($personnage['id']) ?>" class="btn btn-primary">Voir les détails</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    <?php
}
require_once "inc/footer.inc.php";
?>
