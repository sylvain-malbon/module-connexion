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

// Définir le chemin de base (à adapter selon le niveau du fichier appelant)
if (!isset($basePath)) {
    $basePath = '.'; // Valeur par défaut si non définie
}
?>

<header class="header">
    <a href="<?= $basePath ?>/index.php" class="logo-section">
        <div class="logo">M</div>
        <h1 class="title">Module Connexion</h1>
    </a>

    <nav class="nav">
        <a href="<?= $basePath ?>/index.php" class="<?php echo navActive('index.php'); ?>">🏠 Accueil</a>

        <?php if (!isset($_SESSION['id'])): ?>
            <a href="<?= $basePath ?>/pages/connexion.php" class="<?php echo navActive('connexion.php'); ?>">🔐 Connexion</a>
            <a href="<?= $basePath ?>/pages/inscription.php" class="<?php echo navActive('inscription.php'); ?>">📝 Inscription</a>
        <?php else: ?>
            <a href="<?= $basePath ?>/pages/profil.php" class="<?php echo navActive('profil.php'); ?>">👤 Profil</a>

            <?php if ($_SESSION['login'] === 'admin'): ?>
                <a href="<?= $basePath ?>/pages/admin.php" class="<?php echo navActive('admin.php'); ?>">🛠️ Admin</a>
            <?php endif; ?>

            <a href="<?= $basePath ?>/../assets/includes/deconnexion.php" class="logout">🔓 Déconnexion</a>

        <?php endif; ?>
    </nav>
</header>