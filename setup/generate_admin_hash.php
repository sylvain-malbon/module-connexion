<?php
// generate_admin_hash.php
// Génère un mot de passe haché pour initialiser le compte admin dans la base.
echo password_hash("admin", PASSWORD_DEFAULT);
