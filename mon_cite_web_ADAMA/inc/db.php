<?php
// Informations de connexion à la base de données
$host = 'localhost';  // Nom de l'hôte (serveur de base de données)
$dbname = 'adama';  // Nom de ta base de données (d'après l'image, ta base s'appelle 'adama')
$username = 'root';  // Nom d'utilisateur (en local, souvent 'root')
$password = '';  // Mot de passe vide en local

// Connexion à la base de données avec PDO
try {
    // Créer une nouvelle instance de PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);

    // Configurer PDO pour afficher les erreurs sous forme d'exceptions
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Optionnel : Configurer PDO pour utiliser des requêtes préparées (meilleure sécurité)
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

    // Afficher un message si la connexion réussit (à supprimer en production)
    // echo "Connexion réussie à la base de données !";
} catch (PDOException $e) {
    // En cas d'erreur de connexion, afficher un message et arrêter le script
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}
