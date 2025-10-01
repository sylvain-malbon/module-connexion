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
    <header class="header">
        <div class="logo-section">
            <div class="logo">M</div>
        </div>
        <nav class="nav">
            <a href="../index.php">Accueil</a>
            <a href="connexion.php">Connexion</a>
            <a href="inscription.php">Inscription</a>
            <a href="profil.php">Profil</a>
            <a href="admin.php" class="active">Admin</a>
        </nav>
    </header>

    <!-- Main -->
    <main class="main">
        <h1 class="title">Espace Administrateur</h1>
        <p class="description">Bienvenue, <?php echo htmlspecialchars($_SESSION['login']); ?>. Vous avez accès aux fonctions d’administration.</p>
    </main>

    <!-- Footer -->
    <footer class="footer">
        <a href="../index.php">Accueil</a>
        <a href="connexion.php">Connexion</a>
        <a href="inscription.php">Inscription</a>
        <a href="profil.php">Profil</a>
        <a href="admin.php">Admin</a>
    </footer>
</body>

</html>