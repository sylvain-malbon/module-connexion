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
    <a href="../index.php" class="logo-section">
        <div class="logo">M</div>
        <h1 class="title">Module Connexion</h1>
    </a>

    <nav class="nav">
        <!-- Lien vers la page d'accueil (racine) -->
        <a href="../index.php" class="<?php echo navActive('index.php'); ?>">🏠 Accueil</a>

        <?php if (!isset($_SESSION['id'])): ?>
            <!-- Liens pour les utilisateurs non connectés -->
            <a href="connexion.php" class="<?php echo navActive('connexion.php'); ?>">🔐 Connexion</a>
            <a href="inscription.php" class="<?php echo navActive('inscription.php'); ?>">📝 Inscription</a>
        <?php else: ?>
            <!-- Liens pour les utilisateurs connectés -->
            <a href="profil.php" class="<?php echo navActive('profil.php'); ?>">👤 Profil</a>

            <?php if ($_SESSION['login'] === 'admin'): ?>
                <a href="admin.php" class="<?php echo navActive('admin.php'); ?>">🛠️ Admin</a>
            <?php endif; ?>

            <!-- Déconnexion : chemin absolu vers le fichier dans assets/includes -->
            <a href="/assets/includes/deconnexion.php" class="logout">🔓 Déconnexion</a>
        <?php endif; ?>
    </nav>
</header>