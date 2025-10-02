<?php
// deconnexion.php - Déconnexion de l'utilisateur
session_start();
session_unset();
session_destroy();
// fonction php qui redirige vers le dossier racine grâce au /
header('Location: /index.php');
exit;
