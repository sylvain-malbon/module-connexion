<?php
// index.php - Page d'accueil du module de connexion
session_start();

// Configuration
$page_title = "Module Connexion";
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page_title; ?></title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <!-- Header -->
    <header class="header">
        <div class="logo-section">
            <div class="logo">M</div>
            <h1 class="title">Module Connexion</h1>
        </div>
        <nav class="nav">
            <a href="index.php" class="active">Accueil</a>
            <a href="pages/connexion.php">Connexion</a>
            <a href="pages/inscription.php">Inscription</a>
            <a href="pages/profil.php">Profil</a>
        </nav>
    </header>

    <!-- Main Content -->
    <main class="main">
        <h2 class="subtitle">Accueil</h2>
        <p class="description">
            Bienvenue sur le Module Connexion. Vous pouvez vous connecter ou créer un compte pour accéder à votre profil.
        </p>
        <button class="btn-primary" onclick="window.location.href='pages/connexion.php'">
            Connexion
        </button>
        <a href="inscription.php" class="link">Pas encore inscrit ? Inscrivez-vous.</a>
    </main>

    <!-- Footer -->
    <footer class="footer">
        <a href="index.php">Accueil</a>
        <a href="pages/connexion.php">Connexion</a>
        <a href="pages/inscription.php">Inscription</a>
        <a href="pages/profil.php">Profil</a>
        <a href="pages/admin.php">Admin</a>
    </footer>
</body>

</html>