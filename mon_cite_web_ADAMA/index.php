<?php
// Inclusion du fichier de fonctions nécessaires pour le site
require_once "inc/functions.inc.php";

// Inclusion du fichier de header qui contient probablement la barre de navigation et le début du document HTML
require_once "inc/header.inc.php";
?>


<!-- Fin du header -->
<!-- Début de la page principale -->

<main class="main-content"> <!-- Début de la section principale du contenu -->
    <div class="dark-container"> <!-- Conteneur avec un fond sombre pour styliser la section -->
        
        <!-- Section du héros, la bannière principale de la page -->
        <section class="heros-section">
            <div class="hero-text"> <!-- Conteneur du texte principal dans la section du héros -->
                <!-- Titre principal avec un style de texte en blanc -->
                <h1 style="color: white;">Luffy : Le roi des Pirates</h1>
                
                <!-- Paragraphe de description sous le titre avec le texte en blanc -->
                <p style="color: white;">Rejoignez Luffy dans sa quête pour devenir le roi des pirates.</p>
            </div>
            
            <!-- Image affichée à côté du texte du héros, avec une description alternative pour l'accessibilité -->
            <img src="img/a9d6b72240fd8ee5b856fa7a56e38ab7.jpg" alt="bateau luffy">
        </section>

        <!-- Début de la nouvelle section des personnages -->
        <section class="characters-section">
            
            <!-- Titre de la section des personnages avec du texte centré et un espacement en bas -->
            <h2 style="color: white; text-align: center; margin-bottom: 20px;">Les personnages</h2>
            
            <!-- Grille pour afficher les personnages sous forme de cartes -->
            <div class="characters-grid">
                <?php
                // Exemple d'un tableau de personnages récupéré (cela pourrait aussi venir d'une base de données)
                $personnages = [
                    ['id' => 1, 'nom' => 'Luffy', 'image' => 'img/luffy.jpg'], // Premier personnage
                    ['id' => 2, 'nom' => 'Zoro', 'image' => 'img/zoro.jpg'],   // Deuxième personnage
                    ['id' => 3, 'nom' => 'Nami', 'image' => 'img/nami.jpg'],   // Troisième personnage
                    ['id' => 4, 'nom' => 'Sanji', 'image' => 'img/sanji.jpg'], // Quatrième personnage
                    // Ajoutez ici d'autres personnages sous le même format si nécessaire
                ];

                // Boucle qui parcourt chaque personnage du tableau pour les afficher sur la page
                foreach ($personnages as $perso) {
                    // Affichage de la carte du personnage avec un lien vers sa page individuelle
                    echo "
                    <div class='character-card'> <!-- Carte d'un personnage -->
                        <a href='personnage.php?id={$perso['id']}'> <!-- Lien vers la page du personnage avec son ID dans l'URL -->
                            <img src='{$perso['image']}' alt='{$perso['nom']}'> <!-- Image du personnage avec une description alternative -->
                            <p>{$perso['nom']}</p> <!-- Affichage du nom du personnage sous l'image -->
                        </a>
                    </div>";
                }
                ?>
            </div>
        </section>
        <!-- Fin de la section des personnages -->
    </div>
</main>

<!-- Fin de la page principale -->


<!-- Début du footer (inclus avec require_once, il contient souvent des informations sur les droits d'auteur et des liens supplémentaires) -->
<?php
require_once "inc/footer.inc.php";
?>
