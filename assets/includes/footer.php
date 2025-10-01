<?php
// footer.php - Pied de page du module
// $activePage et navActive() sont déjà définis dans header.php donc présentes via include dans les pages
?>

<footer class="footer">
    <a href="../index.php" class="<?php echo navActive('index.php'); ?>">Accueil</a>

    <?php if (!isset($_SESSION['id'])): ?>
        <a href="connexion.php" class="<?php echo navActive('connexion.php'); ?>">Connexion</a>
        <a href="inscription.php" class="<?php echo navActive('inscription.php'); ?>">Inscription</a>
    <?php else: ?>
        <a href="profil.php" class="<?php echo navActive('profil.php'); ?>">Profil</a>
        <?php if ($_SESSION['login'] === 'admin'): ?>
            <a href="admin.php" class="<?php echo navActive('admin.php'); ?>">Admin</a>
        <?php endif; ?>
        <a href="deconnexion.php">Déconnexion</a>
    <?php endif; ?>
</footer>