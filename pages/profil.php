<?php
session_start();
if (!isset($_SESSION['login'])) {
    header('Location: connexion.php');
    exit;
}

// Connexion à la base de données
$bdd = mysqli_connect('localhost', 'root', '', 'moduleconnexion');
if (!$bdd) {
    die('Erreur de connexion : ' . mysqli_connect_error());
}

// Récupération des infos utilisateur
$login = $_SESSION['login'];
$requete = mysqli_query($bdd, "SELECT * FROM utilisateurs WHERE login = '$login'");
$user = mysqli_fetch_assoc($requete);

// Mise à jour des infos si formulaire soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $prenom = mysqli_real_escape_string($bdd, $_POST['prenom']);
    $nom = mysqli_real_escape_string($bdd, $_POST['nom']);
    $newLogin = mysqli_real_escape_string($bdd, $_POST['login']);
    $password = $_POST['password'];

    // Mise à jour avec ou sans nouveau mot de passe
    if (!empty($password)) {
        $hashed = password_hash($password, PASSWORD_DEFAULT);
        $update = mysqli_query($bdd, "UPDATE utilisateurs SET prenom='$prenom', nom='$nom', login='$newLogin', password='$hashed' WHERE login='$login'");
    } else {
        $update = mysqli_query($bdd, "UPDATE utilisateurs SET prenom='$prenom', nom='$nom', login='$newLogin' WHERE login='$login'");
    }

    if ($update) {
        $_SESSION['login'] = $newLogin;
        header('Location: profil.php');
        exit;
    } else {
        echo "<p class='error'>Erreur lors de la mise à jour.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Profil</title>
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
        <h2 class="subtitle">Profil</h2>
        <p class="description">
            Bienvenue sur votre profil utilisateur.<br>
            Vous pouvez consulter ou modifier vos informations ici.
        </p>

        <form method="POST">
            <div class="form-group">
                <label for="prenom">Prénom :</label>
                <input type="text" name="prenom" value="<?= htmlspecialchars($user['prenom']) ?>" required>
            </div>

            <div class="form-group">
                <label for="nom">Nom :</label>
                <input type="text" name="nom" value="<?= htmlspecialchars($user['nom']) ?>" required>
            </div>

            <div class="form-group">
                <label for="login">Identifiant :</label>
                <input type="text" name="login" value="<?= htmlspecialchars($user['login']) ?>" required>
            </div>

            <div class="form-group">
                <label for="password">Nouveau mot de passe :</label>
                <input type="password" name="password">
            </div>

            <button type="submit" class="btn-primary">Mettre à jour</button>
        </form>
    </main>

    <!-- Footer -->
    <?php include_once('../assets/includes/footer.php'); ?>
</body>

</html>