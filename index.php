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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>

    <!-- Header -->

    <?php
    $basePath = '.'; // index.php est à la racine
    include 'assets/includes/header.php';
    ?>

    <!-- Main Content -->
    <main class="main">
        <h2 class="subtitle">Accueil</h2>
        <p class="description">
            Bienvenue sur le Module Connexion. Vous pouvez vous connecter ou vous inscrire pour accéder à votre profil.
        </p>
        <button class="btn-primary" onclick="window.location.href='pages/connexion.php'">
            Connexion
        </button>
        <a href="pages/inscription.php" class="link">Pas encore inscrit ? Inscrivez-vous.</a>
    </main>

    <!-- Footer -->
    <?php
    include 'assets/includes/footer.php';
    ?>

</body>

</html>