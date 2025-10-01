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
?>

<header class="header">
    <div class="logo-section">
        <div class="logo">M</div>
        <h1 class="title">Module Connexion</h1>
    </div>
    <nav class="nav">
        <a href="../index.php" class="<?php echo navActive('index.php'); ?>">Accueil</a>
        <a href="connexion.php" class="<?php echo navActive('connexion.php'); ?>">Connexion</a>
        <a href="inscription.php" class="<?php echo navActive('inscription.php'); ?>">Inscription</a>
        <a href="profil.php" class="<?php echo navActive('profil.php'); ?>">Profil</a>
        <a href="admin.php" class="<?php echo navActive('admin.php'); ?>">Admin</a>
    </nav>
</header>