# 📁 Structure du Projet Birthday Wishlist

## Architecture Complète

```
birthday-wishlist/
│
├── 📂 app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Auth/
│   │   │   │   └── LoginController.php      # Authentification admin
│   │   │   ├── GiftController.php           # CRUD cadeaux (Admin)
│   │   │   └── WishlistController.php       # Page publique
│   │   └── Middleware/
│   │       └── AdminMiddleware.php          # Protection routes admin
│   ├── Models/
│   │   ├── Gift.php                         # Modèle cadeau
│   │   └── User.php                         # Modèle utilisateur
│   └── Providers/
│       └── AppServiceProvider.php           # Configuration app
│
├── 📂 bootstrap/
│   ├── app.php                              # Bootstrap Laravel
│   └── cache/                               # Cache de bootstrap
│
├── 📂 config/
│   ├── app.php                              # Configuration application
│   ├── auth.php                             # Configuration authentification
│   ├── database.php                         # Configuration base de données
│   ├── filesystems.php                      # Configuration stockage
│   └── session.php                          # Configuration sessions
│
├── 📂 database/
│   ├── migrations/
│   │   ├── 2024_01_01_000000_create_users_table.php
│   │   └── 2024_01_01_000001_create_gifts_table.php
│   ├── seeders/
│   │   ├── AdminSeeder.php                  # Création admin
│   │   └── DatabaseSeeder.php               # Seeder principal
│   └── database.sqlite                      # Base de données SQLite
│
├── 📂 public/
│   ├── index.php                            # Point d'entrée
│   └── storage/                             # Lien symbolique vers storage
│
├── 📂 resources/
│   └── views/
│       ├── admin/
│       │   └── gifts/
│       │       ├── index.blade.php          # Liste admin
│       │       ├── create.blade.php         # Formulaire création
│       │       └── edit.blade.php           # Formulaire édition
│       ├── auth/
│       │   └── login.blade.php              # Page de connexion
│       ├── layouts/
│       │   └── app.blade.php                # Layout principal
│       └── landing.blade.php                # Page publique wishlist
│
├── 📂 routes/
│   ├── web.php                              # Routes web
│   └── console.php                          # Commandes Artisan
│
├── 📂 storage/
│   ├── app/
│   │   └── public/
│   │       └── gifts/                       # Images des cadeaux
│   ├── framework/
│   │   ├── cache/
│   │   ├── sessions/
│   │   └── views/                           # Vues compilées
│   └── logs/
│       └── laravel.log                      # Logs application
│
├── 📄 .env                                  # Configuration environnement
├── 📄 .env.example                          # Exemple configuration
├── 📄 .gitignore                            # Fichiers ignorés par Git
├── 📄 artisan                               # CLI Laravel
├── 📄 composer.json                         # Dépendances PHP
├── 📄 COMMANDES.md                          # Commandes rapides
├── 📄 INSTALLATION.md                       # Guide d'installation
├── 📄 README.md                             # Documentation principale
└── 📄 STRUCTURE.md                          # Ce fichier
```

## 🎯 Fichiers Clés

### Controllers
- **LoginController.php** : Gestion connexion/déconnexion admin
- **GiftController.php** : CRUD complet des cadeaux (Resource Controller)
- **WishlistController.php** : Affichage public de la wishlist

### Models
- **Gift.php** : Modèle avec accesseurs (image_url, formatted_price)
- **User.php** : Modèle utilisateur avec authentification

### Views
- **layouts/app.blade.php** : Layout avec navigation, messages flash, footer
- **landing.blade.php** : Grille de cadeaux responsive
- **admin/gifts/*** : Interface d'administration complète

### Configuration
- **routes/web.php** : Routes publiques + admin protégées
- **config/*** : Configurations auth, database, filesystems, session

### Migrations
- **create_users_table** : Table users avec authentification
- **create_gifts_table** : Table gifts avec tous les champs

## 🔐 Sécurité

- Middleware AdminMiddleware sur toutes les routes admin
- Validation stricte dans GiftController
- Protection CSRF sur tous les formulaires
- Upload d'images sécurisé (types, taille)
- Échappement automatique Blade

## 📊 Base de Données

### Table `gifts`
```sql
id              BIGINT UNSIGNED PRIMARY KEY
name            VARCHAR(255)
price           DECIMAL(10,2)
image           VARCHAR(255)
description     TEXT NULLABLE
purchase_link   VARCHAR(500)
created_at      TIMESTAMP
updated_at      TIMESTAMP
```

### Table `users`
```sql
id              BIGINT UNSIGNED PRIMARY KEY
name            VARCHAR(255)
email           VARCHAR(255) UNIQUE
password        VARCHAR(255)
remember_token  VARCHAR(100) NULLABLE
created_at      TIMESTAMP
updated_at      TIMESTAMP
```

## 🎨 Design

- Tailwind CSS via CDN
- Font Awesome pour les icônes
- Palette : Rose (#EC4899) + Gris
- Responsive mobile-first
- Animations et transitions

## 📝 Routes

```
GET  /                      → WishlistController@index
GET  /login                 → LoginController@showLoginForm
POST /login                 → LoginController@login
POST /logout                → LoginController@logout

Groupe admin (auth + admin middleware):
GET    /admin/gifts         → GiftController@index
GET    /admin/gifts/create  → GiftController@create
POST   /admin/gifts         → GiftController@store
GET    /admin/gifts/{id}/edit → GiftController@edit
PUT    /admin/gifts/{id}    → GiftController@update
DELETE /admin/gifts/{id}    → GiftController@destroy
```
