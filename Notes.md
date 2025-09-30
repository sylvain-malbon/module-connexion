# 🗂️ Module Connexion – Notes de projet

TP PHP avec PDO : module d’inscription, connexion, profil, admin

---

## ✅ 1. Création du repository GitHub

- **Nom** : `module-connexion`
- **Description** : TP PHP avec PDO : module d’inscription, connexion, profil, admin
- Initialisé avec un fichier `README.md` (pour consignes ou plan)
- Pas de `.gitignore` ajouté (optionnel pour PHP)

👉 *Pourquoi en premier ?* Tout le reste (issues, commits, branches) va s’y rattacher.

---

## ✅ 1bis. Création du fichier `Notes.md` – mon journal de bord

📝 Étapes pour créer le fichier `Notes.md` dans GitHub :

1. Aller sur le dépôt `module-connexion`
2. Cliquer sur **"Add file"** (bouton vert en haut à droite)
3. Sélectionner **"Create new file"**
4. Nommer le fichier : `Notes.md`
5. Coller le contenu du journal de bord converti en Markdown
6. En bas, dans **Commit new file** :
   - Message : `docs: création du fichier Notes.md`
   - Description : `Ajout du fichier Notes.md pour documenter le projet`
   - Option : cocher "Commit directly to the main branch"
7. Cliquer sur **"Commit changes"**

---

## 🧩 2. Création des issues GitHub

- Une issue par fonctionnalité ou page
- Tagging : `frontend`, `backend`, `admin`, etc.
- Priorisation : `P0` (critique), `P1` (importante), `P2` (amélioration)

| Titre de l’issue | Description |
|------------------|-------------|
| 🧰 Préparer l’environnement local | Vérifier que Git, GitHub Desktop, VS Code, et XAMPP sont installés |
| 🧲 Cloner le repository en local | Utiliser GitHub Desktop pour récupérer le projet |
| 💻 Ouvrir le projet dans VS Code | Ouvrir le dossier cloné dans Visual Studio Code |
| 🏗️ Initialiser la structure du projet | Créer les dossiers (`css/`, `js/`, `includes/`, etc.) et les fichiers de base |
| 🔧 Créer la base de données `moduleconnexion.sql` | Créer la table `utilisateurs` avec les champs requis |
| 🧮 Créer les wireframes du projet | Ébauche visuelle avec Figma ou papier pour guider le design |
| 🏠 Développer la page `index.php` | Page d’accueil avec navigation |
| ⚙️ Développer le fichier `db.php` | Connexion PDO centralisée |
| 📝 Développer la page `inscription.php` | Formulaire d’inscription avec validation |
| 🔐 Développer la page `connexion.php` | Formulaire de connexion avec gestion des sessions |
| 🔓 Développer la page logout.php    Détruire la session et rediriger l’utilisateur après déconnexion |
| 👤 Développer la page `profil.php` | Formulaire pré-rempli pour modifier les informations utilisateur |
| 🛠️ Développer la page `admin.php` | Liste des utilisateurs, accès restreint à l’admin |
| 🎨 Créer le design CSS | Thème personnalisé et responsive |
| 🔄 Gérer les redirections | Après inscription, connexion ou modification |
| 🧪 Tester les fonctionnalités | Vérifier l’inscription, la connexion, la modification et l’accès admin |

---

## 🧩 2bis–2ter : Importation des issues dans GitHub Projects

1. Aller dans l’onglet **Projects** du dépôt `module-connexion`
2. Cliquer sur **New Project** → choisir **Kanban** → **Create project**
3. Cliquer sur **Add item** → taper `#` → sélectionner les issues → **Add selected items**
4. Éditer chaque issue :
   - Cliquer sur **Assign yourself**
   - Définir la **Priority** : `P0`, `P1`, `P2`

---

## 🏗️ 3. Structure du projet en local

- Dossiers : `css/`, `js/`, `includes/`, `pages/`
- Fichiers : `index.php`, `db.php`, etc.
- Premier commit : `init: structure du projet`

👉 *Pourquoi ici ?* Pour poser les fondations avant de coder les fonctionnalités.

---

## 🧪 4. Base de données

- Nom : `moduleconnexion`
- Table : `utilisateurs`
- Test de la connexion PDO via `db.php`

👉 *Pourquoi maintenant ?* Pour que les pages puissent interagir avec la base dès le début.

---

## 🛠️ 5. Développement des fonctionnalités

- Suivi des issues une par une
- Commits pédagogiques : `feat: formulaire d’inscription avec validation`
- Branches possibles : `feature/inscription`, etc.

👉 *Pourquoi ici ?* Pour avancer de façon modulaire et testable.

---

## 🎨 6. Wireframes / Maquettes

- Réalisés dans Figma ou sur papier
- Intégrés dans le README ou conservés à part

👉 *Pourquoi maintenant ?* Pour guider le design CSS et anticiper les besoins visuels.

---

## 📦 7. Finalisation et documentation

- Vérification des redirections, sessions, accès admin
- Ajout de commentaires pédagogiques
- Mise à jour du README avec les consignes, les pages, les accès

👉 *Pourquoi en dernier ?* Pour livrer un projet propre, compréhensible et prêt à être évalué.
