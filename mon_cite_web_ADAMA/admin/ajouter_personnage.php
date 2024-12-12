<?php
require_once "inc/functions.inc.php";
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un personnage</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h2>Ajouter un nouveau personnage</h2>

<?php if(isset($_SESSION['message'])): ?>
    <div class="alert alert-info">
        <?= $_SESSION['message']; ?>
        <?php unset($_SESSION['message']); ?>
    </div>
<?php endif; ?>

<form action="upload_personnage.php" method="post" enctype="multipart/form-data">
    <label for="nom_francais">Nom Français :</label>
    <input type="text" name="nom_francais" id="nom_francais" required><br>

    <label for="nom_japonais">Nom Japonais :</label>
    <input type="text" name="nom_japonais" id="nom_japonais" required><br>

    <label for="prime">Prime :</label>
    <input type="text" name="prime" id="prime" required><br>

    <label for="epithet">Épithète :</label>
    <input type="text" name="epithet" id="epithet" required><br>

    <!-- Autres champs pour les informations du personnage -->
    <label for="premiere_apparition">Première Apparition :</label>
    <input type="text" name="premiere_apparition" id="premiere_apparition"><br>

    <label for="occupations">Occupations :</label>
    <input type="text" name="occupations" id="occupations"><br>

    <label for="anniversaire">Anniversaire :</label>
    <input type="date" name="anniversaire" id="anniversaire"><br>

    <label for="age">Âge :</label>
    <input type="number" name="age" id="age"><br>

    <label for="taille">Taille :</label>
    <input type="number" name="taille" id="taille"><br>

    <label for="groupe_sanguin">Groupe Sanguin :</label>
    <input type="text" name="groupe_sanguin" id="groupe_sanguin"><br>

    <label for="voix_japonaise">Voix Japonaise :</label>
    <input type="text" name="voix_japonaise" id="voix_japonaise"><br>

    <label for="voix_francaise">Voix Française :</label>
    <input type="text" name="voix_francaise" id="voix_francaise"><br>

    <label for="lieux">Lieux :</label>
    <input type="text" name="lieux" id="lieux"><br>

    <label for="combats">Nombre de combats :</label>
    <input type="number" name="combats" id="combats"><br>

    <label for="image">Sélectionner une image :</label>
    <input type="file" name="image" id="image" accept="image/*" required><br><br>

    <input type="submit" name="submit" value="Ajouter le personnage">
</form>

</body>
</html>
