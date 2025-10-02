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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

</head>

<body>

    <!-- Header -->
    <?php
    $basePath = '..'; // inscription.php est dans /pages
    include '../assets/includes/header.php';
    ?>

    <!-- Main Content -->
    <main class="main">
        <h2 class="subtitle">Connexion</h2>
        <p class="description">
            Connectez-vous pour accéder à votre profil.
        </p>

        <!-- Condition PHP -->
        <?php if ($error): ?>
            <p class="error"><?php echo htmlspecialchars($error); ?></p>
        <?php endif; ?>

        <form method="POST" action="connexion.php" class="form">
            <div class="form-group">
                <label for="login">Identifiant</label>
                <input type="text" name="login" id="login" required>
            </div>

            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input type="password" name="password" id="password" required autocomplete="off">
            </div>

            <button class="btn-primary" type="submit">
                Se connecter
            </button>
            <p class="description">
                <a href="inscription.php" class="link">Pas encore inscrit ? Inscrivez-vous.</a>
        </form>
        </p>
    </main>

    <!-- Footer -->
    <?php include('../assets/includes/footer.php'); ?>

</body>

</html>