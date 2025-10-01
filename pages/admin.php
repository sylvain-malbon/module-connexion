<?php
// admin.php - Espace réservé à l'administrateur
session_start();
if (!isset($_SESSION['login']) || $_SESSION['login'] !== 'admin') {
    header('Location: connexion.php');
    exit;
}

// Connexion à la base de données
$bdd = mysqli_connect('localhost', 'root', '', 'moduleconnexion');
if (!$bdd) {
    die('Erreur de connexion : ' . mysqli_connect_error());
}

// Requête pour récupérer tous les utilisateurs
$requete = mysqli_query($bdd, "SELECT id, login, prenom, nom FROM utilisateurs");
$users = mysqli_fetch_all($requete, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Admin</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>

    <!-- Header -->
    <?php include('../assets/includes/header.php'); ?>

    <!-- Main -->
    <main class="main">
        <h2 class="title">Administration</h2>
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