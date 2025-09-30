<?php
// db.php - Connexion à la base de données via PDO

$host = 'localhost';
$dbname = 'moduleconnexion'; // nom de ta base
$username = 'root';          // à adapter selon ton serveur
$password = '';              // souvent vide en local (XAMPP, MAMP)

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}
/* echo "[Test db.php : connexion réussie à la base de données.]";
*/
