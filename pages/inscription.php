<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
    <!-- Header -->
    <?php include('../assets/includes/header.php'); ?>

    <main class="main">
        <h2 class="subtitle">Inscription</h2>
        <p class="description">
            Créez un compte pour accéder à votre profil et aux fonctionnalités du Module Connexion.
        </p>

        <form action="traitement_inscription.php" method="POST" class="form">
            <div class="form-group">
                <label for="prenom">Prénom</label>
                <input type="text" id="prenom" name="prenom" required>
            </div>

            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" id="nom" name="nom" required>
            </div>


            <div class="form-group">
                <label for="login">Identifiant</label>
                <input type="text" id="login" name="login" required>
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
        </form>
    </main>

    <!-- Footer -->
    <?php include_once('../assets/includes/footer.php'); ?>
</body>

</html>