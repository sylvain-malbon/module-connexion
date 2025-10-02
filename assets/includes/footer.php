<?php
// footer.php - Pied de page du module
// $activePage et navActive() sont déjà définis dans header.php
// $basePath doit être défini dans la page appelante
?>

<footer class="footer">
    <div class="footer-top">
        <nav class="footer-nav">
            <a href="<?= $basePath ?>/index.php" class="<?php echo navActive('index.php'); ?>">Accueil</a>

            <?php if (!isset($_SESSION['id'])): ?>
                <a href="<?= $basePath ?>/pages/connexion.php" class="<?php echo navActive('connexion.php'); ?>">Connexion</a>
                <a href="<?= $basePath ?>/pages/inscription.php" class="<?php echo navActive('inscription.php'); ?>">Inscription</a>
            <?php else: ?>
                <a href="<?= $basePath ?>/pages/profil.php" class="<?php echo navActive('profil.php'); ?>">Profil</a>
                <?php if ($_SESSION['login'] === 'admin'): ?>
                    <a href="<?= $basePath ?>/pages/admin.php" class="<?php echo navActive('admin.php'); ?>">Admin</a>
                <?php endif; ?>
                <a href="<?= $basePath ?>/assets/includes/deconnexion.php" class="logout">Déconnexion</a>
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