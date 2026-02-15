# 🚀 Lancement Rapide - Birthday Wishlist

## ✅ Configuration MySQL avec XAMPP

Votre projet est maintenant configuré pour utiliser MySQL via XAMPP.

## 📋 Prérequis

1. **XAMPP installé et lancé**
   - Démarrez Apache
   - Démarrez MySQL

2. **Base de données créée**
   - Nom : `wishlist`
   - Créée via phpMyAdmin ou ligne de commande

## 🎯 Commandes de Lancement

```bash
# 1. Vérifier que les migrations sont appliquées
php artisan migrate:status

# 2. Si besoin, recréer la base
php artisan migrate:fresh --seed

# 3. Lancer le serveur
php artisan serve
```

## 🌐 Accès à l'Application

### Page Publique
- URL : http://localhost:8000
- Affichage de la wishlist

### Administration
- URL : http://localhost:8000/login
- Email : `admin@wishlist.com`
- Mot de passe : `password`

## 🔧 Configuration Actuelle

Votre fichier `.env` est configuré avec :

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=wishlist
DB_USERNAME=root
DB_PASSWORD=
```

## ✨ Fonctionnalités Disponibles

### Visiteurs (Page Publique)
- ✅ Voir tous les cadeaux
- ✅ Voir les détails (nom, prix, description, image)
- ✅ Cliquer sur le lien d'achat
- ❌ Pas de modification possible

### Admin (Après connexion)
- ✅ Ajouter un cadeau
- ✅ Modifier un cadeau
- ✅ Supprimer un cadeau
- ✅ Upload d'images
- ✅ Gestion complète

## 🆘 Dépannage

### Erreur de connexion MySQL
```bash
# Vérifier que MySQL est démarré dans XAMPP
# Vérifier que la base "wishlist" existe dans phpMyAdmin
```

### Recréer la base de données
```bash
php artisan migrate:fresh --seed
```

### Vider le cache
```bash
php artisan config:clear
php artisan cache:clear
```

## 📊 Vérifier la Base de Données

Via phpMyAdmin (http://localhost/phpmyadmin) :
- Base : `wishlist`
- Tables : `users`, `gifts`, `migrations`, `sessions`, `password_reset_tokens`

## 🎉 C'est Prêt !

Votre application est maintenant fonctionnelle avec MySQL.

Lancez simplement :
```bash
php artisan serve
```

Et accédez à http://localhost:8000
