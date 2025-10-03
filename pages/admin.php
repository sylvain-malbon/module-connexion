<?php
// admin.php - Espace réservé à l'administrateur
session_start();
if (!isset($_SESSION['login']) || $_SESSION['login'] !== 'admin') {
    header('Location: connexion.php');
    exit;
}

// Connexion à la base de données avec PDO
require_once '../assets/includes/db.php';

// Requête préparée pour récupérer tous les utilisateurs
$sql = "SELECT id, login, prenom, nom FROM utilisateurs";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Admin</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

</head>

<body>

    <!-- Header -->
    <!-- Header -->
    <?php
    $basePath = '..'; // inscription.php est dans /pages
    include '../assets/includes/header.php';
    ?>

    <!-- Main -->
    <main class="main">
        <h2 class="subtitle">Administration</h2>
        <p class="description">Bienvenue, <?= htmlspecialchars($_SESSION['login']) ?>. Vous avez accès aux fonctions d’administration.</p>

        <h3 class="subtitle">Liste des utilisateurs</h3>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Login</th>
                    <th>Prénom</th>
                    <th>Nom</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?= htmlspecialchars($user['id']) ?></td>
                        <td><?= htmlspecialchars($user['login']) ?></td>
                        <td><?= htmlspecialchars($user['prenom']) ?></td>
                        <td><?= htmlspecialchars($user['nom']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>

    <!-- Footer -->
    <?php include('../assets/includes/footer.php'); ?>

</body>

</html>