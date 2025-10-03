<?php
// db.php - Connexion à la base de données distante via PDO (hébergée sur Plesk)

// 🔧 Paramètres de connexion
$host = 'localhost'; // l'hôte est toujours 'localhost' sur Plesk
$dbname = 'sylvain-malbon_module_connexion'; // nom complet de la base générée par Plesk
$username = 'sylvain-malbon_userweb'; // nom complet de l'utilisateur MySQL créé dans Plesk
$password = 'Web2019Kara'; // mot de passe défini pour cet utilisateur (à garder secret)

// 🧩 Connexion PDO avec gestion des erreurs
try {
    // Connexion à la base avec encodage UTF-8
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);

    // Activation du mode exception pour afficher les erreurs SQL
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Affichage d’un message d’erreur en cas d’échec de connexion
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}

// ✅ Test manuel (à activer temporairement pour vérifier la connexion)
/*
echo "[Test db.php : connexion réussie à la base de données.]";
*/
