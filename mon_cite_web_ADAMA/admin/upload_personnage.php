<?php
require_once "inc/functions.inc.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupération des données du formulaire
    $nom_francais = $_POST['nom_francais'];
    $nom_japonais = $_POST['nom_japonais'];
    $prime = $_POST['prime'];
    $epithet = $_POST['epithet'];

    // Gestion du téléchargement de l'image
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $imageTmpPath = $_FILES['image']['tmp_name'];
        $imageName = basename($_FILES['image']['name']);
        $imageType = $_FILES['image']['type'];

        // Définir le chemin où stocker l'image
        $uploadDir = 'img/personnage/';
        $destPath = $uploadDir . $imageName;

        // Vérifier que le fichier est une image valide
        $allowedMimeTypes = ['image/jpeg', 'image/png', 'image/gif'];
        if (in_array($imageType, $allowedMimeTypes)) {
            // Déplacer l'image vers le répertoire de destination
            if (move_uploaded_file($imageTmpPath, $destPath)) {
                // Insérer les informations dans la base de données
                $cnx = connexionBdd();
                $sql = "INSERT INTO personnage (nom_francais, nom_japonais, prime, epithet, image) 
                        VALUES (:nom_francais, :nom_japonais, :prime, :epithet, :image)";
                $stmt = $cnx->prepare($sql);

                // Exécution de la requête
                $stmt->execute([
                    ':nom_francais' => $nom_francais,
                    ':nom_japonais' => $nom_japonais,
                    ':prime' => $prime,
                    ':epithet' => $epithet,
                    ':image' => $imageName // Stocker le nom du fichier dans la base de données
                ]);

                echo "Le personnage a été ajouté avec succès.";
            } else {
                echo "Erreur lors du téléchargement de l'image.";
            }
        } else {
            echo "Format d'image non valide. Veuillez télécharger une image JPEG, PNG ou GIF.";
        }
    } else {
        echo "Erreur lors du téléchargement de l'image.";
    }
}
?>
