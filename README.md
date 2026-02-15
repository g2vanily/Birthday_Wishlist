# 🎁 Birthday Wishlist

Application Laravel complète pour gérer une wishlist d'anniversaire avec interface publique et administration sécurisée.

## ✨ Fonctionnalités

### 👀 Partie Publique
- Affichage de la wishlist sous forme de cartes
- Design responsive (mobile + desktop)
- Informations complètes : nom, prix, image, description, lien d'achat
- Pagination automatique
- Aucune modification possible pour les visiteurs

### 🔐 Partie Admin
- Authentification sécurisée
- CRUD complet des cadeaux
- Upload d'images sécurisé
- Validation des formulaires
- Protection CSRF
- Middleware de sécurité

## 🛠️ Technologies

- Laravel 11
- SQLite
- Tailwind CSS (via CDN)
- Font Awesome
- PHP 8.2+

## 📦 Structure

```
birthday-wishlist/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Auth/LoginController.php
│   │   │   ├── GiftController.php
│   │   │   └── WishlistController.php
│   │   └── Middleware/
│   │       └── AdminMiddleware.php
│   └── Models/
│       ├── Gift.php
│       └── User.php
├── database/
│   ├── migrations/
│   │   ├── 2024_01_01_000000_create_users_table.php
│   │   └── 2024_01_01_000001_create_gifts_table.php
│   └── seeders/
│       └── AdminSeeder.php
├── resources/
│   └── views/
│       ├── admin/
│       │   └── gifts/
│       │       ├── index.blade.php
│       │       ├── create.blade.php
│       │       └── edit.blade.php
│       ├── auth/
│       │   └── login.blade.php
│       ├── layouts/
│       │   └── app.blade.php
│       └── landing.blade.php
└── routes/
    └── web.php
```

## 🚀 Installation Rapide

```bash
# 1. Configuration
copy .env.example .env
php artisan key:generate
php artisan storage:link

# 2. Base de données
type nul > database\database.sqlite
php artisan migrate
php artisan db:seed --class=AdminSeeder

# 3. Lancement
php artisan serve
```

**Accès admin :**
- URL : http://localhost:8000/login
- Email : admin@wishlist.com
- Mot de passe : password

## 📖 Documentation Complète

Consultez [INSTALLATION.md](INSTALLATION.md) pour :
- Installation détaillée
- Déploiement en production (mutualisé + VPS)
- Configuration Nginx
- Sécurisation
- Maintenance

## 🔒 Sécurité

- Authentification Laravel native
- Middleware de protection des routes admin
- Validation stricte des formulaires
- Protection CSRF
- Upload d'images sécurisé (types et taille)
- Échappement automatique des données (Blade)
- Configuration production-ready

## 📝 Routes

```php
GET  /                      # Wishlist publique
GET  /login                 # Formulaire de connexion
POST /login                 # Traitement connexion
POST /logout                # Déconnexion
GET  /admin/gifts           # Liste admin
GET  /admin/gifts/create    # Formulaire création
POST /admin/gifts           # Enregistrement
GET  /admin/gifts/{id}/edit # Formulaire édition
PUT  /admin/gifts/{id}      # Mise à jour
DELETE /admin/gifts/{id}    # Suppression
```

## 🎨 Design

- Tailwind CSS pour un design moderne
- Responsive mobile-first
- Palette de couleurs : rose (#EC4899) et gris
- Font Awesome pour les icônes
- Animations et transitions fluides

## 📊 Base de Données

### Table `gifts`
- id
- name (string)
- price (decimal 10,2)
- image (string)
- description (text, nullable)
- purchase_link (string)
- timestamps

### Table `users`
- id
- name
- email (unique)
- password (hashed)
- timestamps

## 🔧 Commandes Utiles

```bash
# Vider le cache
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear

# Optimisation production
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Recréer la base
php artisan migrate:fresh --seed
```

## 📄 Licence

Projet open source - Libre d'utilisation

## 👨‍💻 Auteur

Développé avec ❤️ pour une wishlist d'anniversaire parfaite
