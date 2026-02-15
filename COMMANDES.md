# 🚀 Commandes Rapides - Birthday Wishlist

## Installation Initiale

```bash
# Configuration
copy .env.example .env
php artisan key:generate
php artisan storage:link

# Base de données
type nul > database\database.sqlite
php artisan migrate
php artisan db:seed --class=AdminSeeder

# Lancement
php artisan serve
```

## Développement

```bash
# Lancer le serveur
php artisan serve

# Vider tous les caches
php artisan optimize:clear

# Recréer la base de données
php artisan migrate:fresh --seed
```

## Production

```bash
# Optimiser l'application
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan optimize

# Installer les dépendances
composer install --optimize-autoloader --no-dev

# Migrations en production
php artisan migrate --force
php artisan db:seed --class=AdminSeeder --force
```

## Maintenance

```bash
# Vider le cache
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear

# Recréer le lien symbolique
php artisan storage:link

# Voir les routes
php artisan route:list
```

## Identifiants Admin par Défaut

- Email: `admin@wishlist.com`
- Mot de passe: `password`

⚠️ **Changez ces identifiants immédiatement en production !**
