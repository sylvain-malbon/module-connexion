<?php
// admin.php - Espace réservé à l'administrateur
session_start();
if (!isset($_SESSION['login']) || $_SESSION['login'] !== 'admin') {
    header('Location: connexion.php');
    exit;
}
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
        <p class="description">Bienvenue, <?php echo htmlspecialchars($_SESSION['login']); ?>. Vous avez accès aux fonctions d’administration.</p>
    </main>

    <!-- Footer -->
    <?php include('../assets/includes/footer.php'); ?>

</body>

</html>