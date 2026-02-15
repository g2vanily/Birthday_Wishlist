# 🎁 Birthday Wishlist - Guide d'Installation

## 📋 Prérequis

- PHP 8.2+
- Composer
- SQLite (inclus avec PHP)
- Node.js & NPM (pour Tailwind)

## 🚀 Installation Locale

### 1. Configuration initiale

```bash
# Copier le fichier d'environnement
copy .env.example .env

# Configurer la base de données MySQL dans .env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=wishlist
DB_USERNAME=root
DB_PASSWORD=

# Générer la clé d'application
php artisan key:generate

# Créer le lien symbolique pour le storage
php artisan storage:link
```

### 2. Base de données

**Prérequis :** Assurez-vous que XAMPP est lancé et que MySQL est démarré.

```bash
# Créer la base de données (via phpMyAdmin ou ligne de commande)
# Ou créer manuellement dans phpMyAdmin : base "wishlist"

# Exécuter les migrations
php artisan migrate

# Créer l'utilisateur admin
php artisan db:seed --class=AdminSeeder
```

**Identifiants admin par défaut :**
- Email: `admin@wishlist.com`
- Mot de passe: `password`

⚠️ **IMPORTANT** : Changez ces identifiants en production !

### 3. Lancer le serveur

```bash
php artisan serve
```

Accédez à : `http://localhost:8000`

## 🌐 Déploiement en Production

### Option 1 : Hébergement Mutualisé

#### Étape 1 : Préparer les fichiers

```bash
# Optimiser l'application
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Installer les dépendances de production
composer install --optimize-autoloader --no-dev
```

#### Étape 2 : Configuration .env

```env
APP_NAME="Birthday Wishlist"
APP_ENV=production
APP_DEBUG=false
APP_URL=https://votre-domaine.com

DB_CONNECTION=sqlite

SESSION_DRIVER=database
FILESYSTEM_DISK=public
```

#### Étape 3 : Upload via FTP

1. Uploadez tous les fichiers sauf `node_modules` et `vendor`
2. Sur le serveur, exécutez :
```bash
composer install --optimize-autoloader --no-dev
php artisan key:generate
php artisan storage:link
php artisan migrate --force
php artisan db:seed --class=AdminSeeder --force
```

#### Étape 4 : Configuration Apache

Créez un fichier `.htaccess` dans le dossier `public` :

```apache
<IfModule mod_rewrite.c>
    RewriteEngine On
    RewriteRule ^(.*)$ public/$1 [L]
</IfModule>
```

### Option 2 : VPS (Ubuntu/Debian)

#### Étape 1 : Installation des dépendances

```bash
# Mise à jour du système
sudo apt update && sudo apt upgrade -y

# Installation PHP et extensions
sudo apt install php8.2 php8.2-cli php8.2-fpm php8.2-sqlite3 php8.2-mbstring php8.2-xml php8.2-curl php8.2-zip -y

# Installation Composer
curl -sS https://getcomposer.org/installer | php
sudo mv composer.phar /usr/local/bin/composer

# Installation Nginx
sudo apt install nginx -y
```

#### Étape 2 : Configuration Nginx

Créez `/etc/nginx/sites-available/wishlist` :

```nginx
server {
    listen 80;
    server_name votre-domaine.com;
    root /var/www/wishlist/public;

    add_header X-Frame-Options "SAMEORIGIN";
    add_header X-Content-Type-Options "nosniff";

    index index.php;

    charset utf-8;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location = /favicon.ico { access_log off; log_not_found off; }
    location = /robots.txt  { access_log off; log_not_found off; }

    error_page 404 /index.php;

    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php8.2-fpm.sock;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
    }

    location ~ /\.(?!well-known).* {
        deny all;
    }
}
```

Activez le site :

```bash
sudo ln -s /etc/nginx/sites-available/wishlist /etc/nginx/sites-enabled/
sudo nginx -t
sudo systemctl restart nginx
```

#### Étape 3 : Déploiement de l'application

```bash
# Cloner ou copier le projet
cd /var/www
sudo mkdir wishlist
sudo chown $USER:$USER wishlist
cd wishlist

# Copier vos fichiers ici

# Installation
composer install --optimize-autoloader --no-dev
php artisan key:generate
php artisan storage:link
php artisan migrate --force
php artisan db:seed --class=AdminSeeder --force

# Permissions
sudo chown -R www-data:www-data /var/www/wishlist
sudo chmod -R 755 /var/www/wishlist
sudo chmod -R 775 /var/www/wishlist/storage
sudo chmod -R 775 /var/www/wishlist/bootstrap/cache
```

#### Étape 4 : SSL avec Let's Encrypt

```bash
sudo apt install certbot python3-certbot-nginx -y
sudo certbot --nginx -d votre-domaine.com
```

## 🔒 Sécurité en Production

### 1. Changer les identifiants admin

Connectez-vous et modifiez immédiatement :
- L'email admin
- Le mot de passe admin

### 2. Permissions des fichiers

```bash
# Permissions strictes
chmod 644 .env
chmod -R 755 storage bootstrap/cache
```

### 3. Configuration .env

```env
APP_DEBUG=false
APP_ENV=production
```

## 📊 Maintenance

### Vider le cache

```bash
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear
```

### Backup de la base de données

```bash
# Copier le fichier SQLite
copy database\database.sqlite database\backup_$(date +%Y%m%d).sqlite
```

## 🆘 Dépannage

### Erreur 500

1. Vérifiez les logs : `storage/logs/laravel.log`
2. Vérifiez les permissions : `storage` et `bootstrap/cache`
3. Vérifiez que `.env` existe et contient `APP_KEY`

### Images non affichées

```bash
php artisan storage:link
```

### Erreur de base de données

```bash
# Recréer la base
php artisan migrate:fresh
php artisan db:seed --class=AdminSeeder
```

## ✅ Checklist de Déploiement

- [ ] `.env` configuré avec `APP_ENV=production` et `APP_DEBUG=false`
- [ ] `APP_KEY` généré
- [ ] Migrations exécutées
- [ ] Admin créé et mot de passe changé
- [ ] `storage:link` créé
- [ ] Permissions correctes sur `storage` et `bootstrap/cache`
- [ ] Cache optimisé (config, route, view)
- [ ] SSL configuré (HTTPS)
- [ ] Backup configuré

## 📞 Support

Pour toute question, consultez la documentation Laravel : https://laravel.com/docs
