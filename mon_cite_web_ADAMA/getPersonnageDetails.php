<?php
require_once "inc/functions.inc.php"; // Inclure vos fonctions et la connexion à la base de données

// Vérifier si un ID de personnage est passé dans l'URL
if (isset($_GET['id_personnage']) && is_numeric($_GET['id_personnage'])) {
    $idPersonnage = (int) $_GET['id_personnage'];

    // Utiliser la fonction pour récupérer les détails du personnage par son ID
    $personnage = showPersonnageViaId($idPersonnage);

    // Si le personnage est trouvé
    if ($personnage) {
        echo "<h2>" . htmlspecialchars($personnage['nom_francais']) . "</h2>";
        echo "<p><strong>Prime :</strong> " . htmlspecialchars($personnage['prime'] ?? 'Non renseignée') . "</p>";
        echo "<p><strong>Anniversaire :</strong> " . htmlspecialchars($personnage['anniversaire'] ?? 'Non renseigné') . "</p>";
        echo "<p><strong>Épithète :</strong> " . htmlspecialchars($personnage['epithet'] ?? 'Non renseigné') . "</p>";
        echo "<p><strong>Âge :</strong> " . htmlspecialchars($personnage['age'] ?? 'Non renseigné') . "</p>";
        echo "<p><strong>Taille :</strong> " . htmlspecialchars($personnage['taille'] ?? 'Non renseignée') . " cm</p>";
        echo "<p><strong>Lieu :</strong> " . htmlspecialchars($personnage['lieux'] ?? 'Non renseigné') . "</p>";
        echo "<p><strong>Voix Japonaise :</strong> " . htmlspecialchars($personnage['voix_japonaise'] ?? 'Non renseignée') . "</p>";
        echo "<p><strong>Voix Française :</strong> " . htmlspecialchars($personnage['voix_francaise'] ?? 'Non renseignée') . "</p>";
    } else {
        // Si aucun personnage n'est trouvé avec cet ID
        echo "Personnage introuvable.";
    }
} else {
    // Si aucun ID valide n'est passé dans l'URL
    echo "Aucun personnage sélectionné.";
}
?>
