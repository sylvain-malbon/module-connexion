<?php
session_start();
$erreurs = [];
$success = "";

// Inclusion de la connexion PDO centralisée
require_once '../assets/includes/db.php';

// Traitement du formulaire
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Nettoyage des données
    $prenom = trim($_POST['prenom']);
    $nom = trim($_POST['nom']);
    $login = trim($_POST['login']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Validation des champs
    if (empty($prenom) || empty($nom) || empty($login) || empty($password) || empty($confirm_password)) {
        $erreurs[] = "Tous les champs sont obligatoires.";
    }

    if ($password !== $confirm_password) {
        $erreurs[] = "Les mots de passe ne correspondent pas.";
    }

    if (strlen($login) < 4 || strlen($login) > 20) {
        $erreurs[] = "L'identifiant doit contenir entre 4 et 20 caractères.";
    }

    if (!preg_match('/^[a-zA-Z0-9_]+$/', $login)) {
        $erreurs[] = "L'identifiant ne doit contenir que des lettres, chiffres et underscores (_).";
    }

    if (strlen($password) < 6 || strlen($password) > 30) {
        $erreurs[] = "Le mot de passe doit contenir entre 6 et 30 caractères.";
    }

    if (!preg_match('/[A-Z]/', $password) || !preg_match('/[a-z]/', $password) || !preg_match('/[0-9]/', $password)) {
        $erreurs[] = "Le mot de passe doit contenir au moins une majuscule, une minuscule et un chiffre.";
    }

    // Si aucune erreur, on peut insérer
    if (empty($erreurs)) {
        $stmt = $bdd->prepare("SELECT id FROM utilisateurs WHERE login = :login");
        $stmt->execute(['login' => $login]);
        if ($stmt->fetch()) {
            $erreurs[] = "Ce login est déjà utilisé.";
        } else {
            $stmt = $bdd->prepare("INSERT INTO utilisateurs (prenom, nom, login, password) VALUES (:prenom, :nom, :login, :password)");
            $stmt->execute([
                'prenom' => $prenom,
                'nom' => $nom,
                'login' => $login,
                'password' => password_hash($password, PASSWORD_DEFAULT)
            ]);
            $success = "Inscription réussie ! Vous pouvez maintenant vous connecter.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
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
        <h2 class="subtitle">Inscription</h2>

        <?php if (!empty($erreurs)): ?>
            <div class="error">
                <?php foreach ($erreurs as $erreur): ?>
                    <p><?= htmlspecialchars($erreur) ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <?php if ($success): ?>
            <div class="success">
                <p><?= htmlspecialchars($success) ?></p>
            </div>
        <?php endif; ?>

        <p class="description">
            Créez un compte pour accéder à votre profil et aux fonctionnalités du Module Connexion.
        </p>

        <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST" class="form">
            <div class="form-group">
                <label for="prenom">Prénom</label>
                <input type="text" id="prenom" name="prenom" value="<?= htmlspecialchars($prenom ?? '') ?>" required>
            </div>

            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" id="nom" name="nom" value="<?= htmlspecialchars($nom ?? '') ?>" required>
            </div>

            <div class="form-group">
                <label for="login">Identifiant</label>
                <input type="text" id="login" name="login" value="<?= htmlspecialchars($login ?? '') ?>" required>
            </div>

            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password" required>
            </div>

            <div class="form-group">
                <label for="confirm_password">Confirmation du mot de passe</label>
                <input type="password" id="confirm_password" name="confirm_password" required>
            </div>

            <button type="submit" class="btn-primary">S'inscrire</button>

            <div class="link-wrapper">
                <p>
                    <a href="connexion.php" class="link">Déjà inscrit ? Connectez-vous.</a>
                </p>
            </div>
        </form>

    </main>

    <?php include_once('../assets/includes/footer.php'); ?>
</body>

</html>