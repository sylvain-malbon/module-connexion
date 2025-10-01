<?php
// connexion.php - Page de connexion au module
session_start();
require_once('../assets/includes/db.php'); // Fichier de connexion PDO

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = trim($_POST['login'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($login && $password) {
        $stmt = $pdo->prepare("SELECT * FROM utilisateurs WHERE login = ?");
        $stmt->execute([$login]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['id'] = $user['id'];
            $_SESSION['login'] = $user['login'];

            // Redirection selon le rôle
            if ($user['login'] === 'admin') {
                header('Location: admin.php');
            } else {
                header('Location: profil.php');
            }
            exit;
        } else {
            $error = "Identifiants incorrects.";
        }
    } else {
        $error = "Veuillez remplir tous les champs.";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <link rel="stylesheet" href="../assets/css/style.css">

</head>

<body>
    <!-- Header -->
    <header class="header">
        <div class="logo-section">
            <div class="logo">M</div>
        </div>
        <nav class="nav">
            <a href="../index.php" class="active">Accueil</a>
            <a href="pages/connexion.php">Connexion</a>
            <a href="pages/inscription.php">Inscription</a>
            <a href="pages/profil.php">Profil</a>
        </nav>
    </header>

    <!-- Main Content -->
    <main class="main">
        <h1 class="title">Connexion</h1>

        <!-- Condition PHP -->
        <?php if ($error): ?>
            <p class="error"><?php echo htmlspecialchars($error); ?></p>
        <?php endif; ?>

        <p>
        <form method="POST" action="connexion.php" class="description">
            <label for="login">Nom d'utilisateur</label>
            <input type="text" name="login" id="login" required>
            </p>

            <p class="description">
                <label for="password">Mot de passe</label>
                <input type="password" name="password" id="password" required>
            </p>

            <p>
                <button class="btn-primary" onclick="window.location.href='connexion.php'">
                    Se connecter
                </button>
            </p>

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