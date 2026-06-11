# 🎓 Universite - Système de Gestion Universitaire

Un système complet de gestion universitaire développé avec **Laravel 11**, incluant une **partie publique** (site informatif) et un **portail d'accès** (authentifié) pour étudiants, professeurs et administrateurs.

## 📋 Fonctionnalités principales

### 🌐 Partie Publique
- ✅ Accueil attrayant avec hero section
- ✅ Présentation des programmes/filières
- ✅ Blog d'actualités
- ✅ Calendrier académique
- ✅ Formulaire de contact
- ✅ FAQ
- ✅ Formulaire d'admission

### 🔐 Partie Portail (Authentifiée)

#### 👤 Espace Étudiant
- Dashboard personnel avec statistiques
- Mes cours et inscriptions
- Emploi du temps
- Relevé de notes détaillé
- Télécharger certificats
- Gestion du profil

#### 👨‍🏫 Espace Professeur
- Dashboard avec statistiques des classes
- Mes classes et étudiants
- Gestion des notes
- Contrôle de présence
- Ressources pédagogiques

#### ⚙️ Espace Administrateur
- Gestion complète des utilisateurs
- Gestion des cours et programmes
- Gestion des inscriptions
- Rapports et statistiques
- Configuration système

## 🛠️ Stack Technologique

- **Backend** : Laravel 11
- **Base de données** : MySQL 5.7+ / MariaDB 10.3+
- **Frontend** : Blade Templates + TailwindCSS
- **Authentification** : Laravel Auth
- **Contrôle d'accès** : Middleware de rôles (admin, professeur, étudiant)

## 📋 Modèles de données

- **User** - Utilisateurs (admin, professeur, étudiant)
- **Student** - Données étudiants avec matricule et niveau
- **Teacher** - Données professeurs avec spécialité
- **Course** - Cours avec code, crédit, semestre
- **Filiere** - Filières/Programmes d'études
- **Departement** - Départements académiques
- **Enrollment** - Inscriptions étudiant-cours
- **Grade** - Notes des étudiants
- **News** - Actualités de l'université

## 📦 Installation rapide

### Prérequis
- PHP 8.2+
- Composer
- MySQL 5.7+ ou MariaDB
- Node.js & npm
- Git

### Étapes d'installation

```bash
# 1. Cloner le dépôt
git clone https://github.com/abdrhmn-mmadi/Universite.git
cd Universite

# 2. Installer les dépendances
composer install
npm install

# 3. Configuration de l'environnement
cp .env.example .env
php artisan key:generate

# 4. Créer la base de données
mysql -u root -p
CREATE DATABASE universite;
EXIT;

# 5. Exécuter les migrations
php artisan migrate

# 6. Charger les données de test (optionnel)
php artisan db:seed

# 7. Compiler les assets
npm run dev

# 8. Démarrer le serveur
php artisan serve
```

L'application sera accessible à **http://localhost:8000**

## 🚀 Accès à l'application

- **Site public** : http://localhost:8000/
- **Page de connexion** : http://localhost:8000/login
- **Portail** : http://localhost:8000/portal (après connexion)

## 👥 Comptes de test

Après le seed, connectez-vous avec :

| Rôle | Email | Mot de passe |
|------|-------|--------------|
| 🔐 Admin | admin@universite.com | password |
| 👨‍🏫 Professeur | prof@universite.com | password |
| 👤 Étudiant | etudiant@universite.com | password |

## 📁 Structure du projet

```
Universite/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── AuthController.php
│   │   │   ├── Public/
│   │   │   │   ├── HomeController.php
│   │   │   │   ├── NewsController.php
│   │   │   │   ├── CoursesController.php
│   │   │   │   └── ContactController.php
│   │   │   └── Portal/
│   │   │       ├── StudentController.php
│   │   │       ├── TeacherController.php
│   │   │       └── AdminController.php
│   │   └── Middleware/
│   │       └── RoleMiddleware.php
│   └── Models/
│       ├── User.php
│       ├── Student.php
│       ├── Teacher.php
│       ├── Course.php
│       ├── Grade.php
│       ├── Enrollment.php
│       ├── Filiere.php
│       ├── Departement.php
│       └── News.php
├── database/
│   ├── migrations/
│   └── seeders/
│       └── DatabaseSeeder.php
├── resources/views/
│   ├── auth/
│   │   └── login.blade.php
│   ├── public/
│   │   ├── home.blade.php
│   │   ├── courses.blade.php
│   │   ├── news.blade.php
│   │   ├── contact.blade.php
│   │   ├── faq.blade.php
│   │   └── calendar.blade.php
│   ├── portal/
│   │   ├── student/
│   │   ├── teacher/
│   │   └── admin/
│   ├── layouts/
│   │   └── app.blade.php
│   └── components/
│       ├── navbar.blade.php
│       └── footer.blade.php
├── routes/
│   └── web.php
└── config/
    └── app.php
```

## 🛣️ Routes principales

### Partie Publique
- `GET /` - Accueil
- `GET /programmes` - Liste des filières
- `GET /programme/{id}` - Détail d'une filière
- `GET /actualites` - Actualités
- `GET /actualite/{id}` - Détail d'une actualité
- `GET /contact` - Page contact
- `POST /contact` - Soumission formulaire contact
- `GET /faq` - FAQ
- `GET /calendrier` - Calendrier académique

### Authentification
- `GET /login` - Page de connexion
- `POST /login` - Traitement connexion
- `POST /logout` - Déconnexion

### Portail (Authentifié)
- `GET /portal/dashboard` - Tableau de bord (selon le rôle)
- `/portal/student/*` - Routes espace étudiant
- `/portal/teacher/*` - Routes espace professeur
- `/portal/admin/*` - Routes espace administrateur

## 🔐 Sécurité

- ✅ Authentification sécurisée avec hachage bcrypt
- ✅ Middleware de vérification des rôles
- ✅ Protection CSRF sur tous les formulaires
- ✅ Validation des entrées côté serveur
- ✅ Eloquent ORM pour prévenir les injections SQL
- ✅ Gestion des permissions par rôle

## 💾 Commandes utiles

```bash
# Lister les routes
php artisan route:list

# Créer une migration
php artisan make:migration create_table_name

# Créer un modèle
php artisan make:model ModelName

# Créer un contrôleur
php artisan make:controller ControllerName

# Vider les caches
php artisan cache:clear
php artisan config:clear
php artisan route:clear

# Regénérer la clé
php artisan key:generate
```

## 📖 Documentation supplémentaire

Voir le fichier **INSTALLATION.md** pour des instructions plus détaillées et la résolution des problèmes courants.

## 🐛 Problèmes courants

### Erreur de permissions sur les dossiers
```bash
chmod -R 775 storage/
chmod -R 775 bootstrap/cache/
```

### Erreur "APP_KEY not set"
```bash
php artisan key:generate
```

### Base de données non trouvée
Vérifier la configuration `.env` et que MySQL est en cours d'exécution.

## 🤝 Contribution

Les contributions sont les bienvenues ! N'hésitez pas à :
- Signaler des bugs via les issues
- Proposer des améliorations
- Envoyer des pull requests

## 📝 Licence

MIT License - Libre d'utilisation et de modification.

## 👨‍💻 Auteur

**Abdrhmn Mmadi**

- 📧 Email: [abdrhmn.mmadi@gmail.com](mailto:abdrhmn.mmadi@gmail.com)
- 🔗 GitHub: [@abdrhmn-mmadi](https://github.com/abdrhmn-mmadi)

---

**Statut** : En développement 🔨

**Version** : 1.0.0

**Dernière mise à jour** : Juin 2024

**Merci d'avoir choisi Universite!** 🎓✨
