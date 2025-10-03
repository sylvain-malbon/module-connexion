<?php
session_start();
if (!isset($_SESSION['login'])) {
    header('Location: connexion.php');
    exit;
}

// Connexion à la base de données avec PDO
try {
    $pdo = new PDO('mysql:host=localhost;dbname=moduleconnexion;charset=utf8', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Erreur de connexion : ' . $e->getMessage());
}

// Récupération des infos utilisateur
$login = $_SESSION['login'];
$stmt = $pdo->prepare("SELECT * FROM utilisateurs WHERE login = :login");
$stmt->execute(['login' => $login]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

// Mise à jour des infos si formulaire soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $prenom = htmlspecialchars($_POST['prenom']);
    $nom = htmlspecialchars($_POST['nom']);
    $newLogin = htmlspecialchars($_POST['login']);
    $password = $_POST['password'];

    // Construction de la requête SQL
    if (!empty($password)) {
        $hashed = password_hash($password, PASSWORD_DEFAULT);
        $sql = "UPDATE utilisateurs SET prenom = :prenom, nom = :nom, login = :newLogin, password = :password WHERE login = :login";
        $params = [
            'prenom' => $prenom,
            'nom' => $nom,
            'newLogin' => $newLogin,
            'password' => $hashed,
            'login' => $login
        ];
    } else {
        $sql = "UPDATE utilisateurs SET prenom = :prenom, nom = :nom, login = :newLogin WHERE login = :login";
        $params = [
            'prenom' => $prenom,
            'nom' => $nom,
            'newLogin' => $newLogin,
            'login' => $login
        ];
    }

    $stmt = $pdo->prepare($sql);
    if ($stmt->execute($params)) {
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>

    <!-- Header -->
    <?php
    $basePath = '..';
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