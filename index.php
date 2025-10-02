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
    // Détection de la page active
    $activePage = basename($_SERVER['PHP_SELF']);

    // Fonction pour activer le lien courant
    if (!function_exists('navActive')) {
        function navActive($page)
        {
            global $activePage;
            return ($activePage === $page) ? 'active' : '';
        }
    }

    // Démarrer la session si elle n'est pas déjà active
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    ?>

    <header class="header">
        <div class="logo-section">
            <div class="logo">M</div>
            <h1 class="title">Module Connexion</h1>
        </div>
        <nav class="nav">
            <a href="index.php" class="<?php echo navActive('index.php'); ?>">🏠 Accueil</a>

            <?php if (!isset($_SESSION['id'])): ?>
                <a href="pages/connexion.php" class="<?php echo navActive('connexion.php'); ?>">🔐 Connexion</a>
                <a href="pages/inscription.php" class="<?php echo navActive('inscription.php'); ?>">📝 Inscription</a>
            <?php else: ?>
                <a href="pages/profil.php" class="<?php echo navActive('profil.php'); ?>">👤 Profil</a>
                <?php if ($_SESSION['login'] === 'admin'): ?>
                    <a href="pages/admin.php" class="<?php echo navActive('admin.php'); ?>">🛠️ Admin</a>
                <?php endif; ?>
                <a href="assets/includes/deconnexion.php" class="logout">🔓 Déconnexion</a>
            <?php endif; ?>
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
    <?php
    // footer.php - Pied de page du module
    // $activePage et navActive() sont déjà définis dans header.php donc présentes via include dans les pages
    ?>

    <?php
    // footer.php - Pied de page du module
    // $activePage et navActive() sont déjà définis dans header.php donc présentes via include dans les pages
    ?>

    <footer class="footer">
        <div class="footer-top">
            <nav class="footer-nav">
                <a href="index.php" class="<?php echo navActive('index.php'); ?>">Accueil</a>

                <?php if (!isset($_SESSION['id'])): ?>
                    <a href="pages/connexion.php" class="<?php echo navActive('connexion.php'); ?>">Connexion</a>
                    <a href="pages/inscription.php" class="<?php echo navActive('inscription.php'); ?>">Inscription</a>
                <?php else: ?>
                    <a href="pages/profil.php" class="<?php echo navActive('profil.php'); ?>">Profil</a>
                    <?php if ($_SESSION['login'] === 'admin'): ?>
                        <a href="pages/admin.php" class="<?php echo navActive('admin.php'); ?>">Admin</a>
                    <?php endif; ?>
                    <a href="/assets/includes/deconnexion.php" class="logout">Déconnexion</a>
                <?php endif; ?>
            </nav>

            <a href="https://github.com/sylvain-malbon/module-connexion" class="github-link" target="_blank" rel="noopener noreferrer">
                <i class="fab fa-github"></i>
                Voir le projet sur GitHub
            </a>
        </div>

        <div class="footer-bottom">
            <p>&copy; <?= date('Y') ?> Sylvain Malbon - Tous droits réservés.</p>
        </div>
    </footer>
</body>

</html>