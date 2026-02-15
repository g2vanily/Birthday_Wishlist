# 🧪 Guide de Test - Nouvelles Fonctionnalités

## 🚀 Lancement de l'Application

```bash
# Assurez-vous que XAMPP est lancé (Apache + MySQL)
php artisan serve
```

Accédez à : http://localhost:8000

## ✅ Tests à Effectuer

### 1. 🏠 Test de la Page d'Accueil

**URL :** http://localhost:8000

**Vérifications :**
- [ ] La page affiche "Bienvenue sur Birthday Wishlist"
- [ ] Deux cartes sont visibles : "Je suis Visiteur" et "Je suis Admin"
- [ ] Le bouton "Voir la Wishlist" redirige vers `/wishlist`
- [ ] Le bouton "Se Connecter" redirige vers `/login`

---

### 2. 👤 Test du Parcours Visiteur

#### Étape 1 : Accès à la Wishlist
**URL :** http://localhost:8000/wishlist

**Vérifications :**
- [ ] La liste des cadeaux s'affiche
- [ ] Chaque cadeau a un bouton "Réserver ce cadeau" (vert)
- [ ] Chaque cadeau a un bouton "Voir le produit" (rose)

#### Étape 2 : Réservation d'un Cadeau
1. Cliquez sur "Réserver ce cadeau" pour un cadeau
2. Vous êtes redirigé vers `/gifts/{id}/reserve`

**Vérifications :**
- [ ] Le formulaire de réservation s'affiche
- [ ] L'aperçu du cadeau est visible (image, nom, prix)
- [ ] Un champ "Votre Pseudo" est présent
- [ ] Un message d'avertissement est affiché

3. Entrez un pseudo (ex: "Marie")
4. Cliquez sur "Confirmer la Réservation"

**Vérifications :**
- [ ] Redirection vers `/wishlist`
- [ ] Message de succès : "Merci Marie ! Vous avez réservé {nom du cadeau}"
- [ ] Le cadeau réservé affiche maintenant :
  - [ ] Badge rouge "Réservé par Marie"
  - [ ] Image en noir et blanc
  - [ ] Bouton gris "Déjà réservé" (désactivé)

#### Étape 3 : Tentative de Double Réservation
1. Essayez de réserver le même cadeau à nouveau

**Vérifications :**
- [ ] Redirection vers `/wishlist`
- [ ] Message d'erreur : "Ce cadeau a déjà été réservé"

---

### 3. 🔐 Test du Parcours Admin

#### Étape 1 : Connexion
**URL :** http://localhost:8000/login

**Identifiants :**
- Email : `admin@wishlist.com`
- Mot de passe : `password`

**Vérifications :**
- [ ] Le formulaire de connexion s'affiche
- [ ] Après connexion, redirection vers `/admin/gifts`

#### Étape 2 : Visualisation des Réservations
**URL :** http://localhost:8000/admin/gifts

**Vérifications :**
- [ ] La liste des cadeaux s'affiche
- [ ] Les cadeaux réservés affichent :
  - [ ] Badge vert "Réservé par {pseudo}"
  - [ ] Bouton "Annuler la réservation"
- [ ] Les cadeaux disponibles affichent :
  - [ ] Badge gris "Disponible"

#### Étape 3 : Annulation d'une Réservation
1. Cliquez sur "Annuler la réservation" pour un cadeau réservé
2. Confirmez l'annulation dans la popup

**Vérifications :**
- [ ] Message de succès : "La réservation de {cadeau} a été annulée"
- [ ] Le cadeau affiche maintenant "Disponible"
- [ ] Le cadeau redevient disponible pour les visiteurs

#### Étape 4 : Gestion des Cadeaux
**Vérifications :**
- [ ] Bouton "Ajouter un cadeau" fonctionne
- [ ] Bouton "Modifier" fonctionne
- [ ] Bouton "Supprimer" fonctionne
- [ ] Si un cadeau réservé est supprimé, la réservation est aussi supprimée

---

### 4. 🔄 Test du Flux Complet

#### Scénario : Réservation → Annulation → Nouvelle Réservation

1. **En tant que Visiteur :**
   - Réservez un cadeau avec le pseudo "Alice"
   - Vérifiez que le cadeau est marqué "Réservé par Alice"

2. **En tant qu'Admin :**
   - Connectez-vous
   - Annulez la réservation d'Alice
   - Vérifiez que le cadeau est "Disponible"

3. **En tant que Visiteur :**
   - Retournez sur `/wishlist`
   - Vérifiez que le cadeau est à nouveau disponible
   - Réservez-le avec le pseudo "Bob"
   - Vérifiez que le cadeau est maintenant "Réservé par Bob"

---

### 5. 🛡️ Tests de Sécurité

#### Test 1 : Validation du Pseudo
1. Essayez de réserver avec un pseudo vide
   - [ ] Message d'erreur : "Votre pseudo est obligatoire"

2. Essayez de réserver avec un pseudo d'1 caractère
   - [ ] Message d'erreur : "Le pseudo doit contenir au moins 2 caractères"

#### Test 2 : Protection des Routes Admin
1. Déconnectez-vous
2. Essayez d'accéder à `/admin/gifts`
   - [ ] Redirection vers `/login`

#### Test 3 : Contrainte Unique
1. Tentez de créer deux réservations pour le même cadeau via des requêtes simultanées
   - [ ] Une seule réservation doit être créée

---

### 6. 📱 Tests Responsive

**Vérifications sur Mobile :**
- [ ] La page d'accueil s'affiche correctement
- [ ] Les cartes de cadeaux s'empilent verticalement
- [ ] Les boutons sont cliquables
- [ ] Le formulaire de réservation est utilisable

---

### 7. 🎨 Tests Visuels

**Vérifications :**
- [ ] Les cadeaux réservés ont une opacité réduite
- [ ] Les images des cadeaux réservés sont en noir et blanc
- [ ] Les badges de statut sont bien visibles
- [ ] Les couleurs sont cohérentes (rose, vert, rouge, gris)
- [ ] Les icônes Font Awesome s'affichent correctement

---

## 🐛 Problèmes Connus et Solutions

### Problème : "Ce cadeau a déjà été réservé"
**Solution :** Annulez la réservation en tant qu'admin

### Problème : Images non affichées
**Solution :**
```bash
php artisan storage:link
```

### Problème : Erreur 404 sur les routes
**Solution :**
```bash
php artisan route:clear
php artisan config:clear
```

---

## ✅ Checklist Finale

- [ ] Page d'accueil fonctionnelle
- [ ] Réservation de cadeaux fonctionnelle
- [ ] Affichage des réservations pour l'admin
- [ ] Annulation des réservations fonctionnelle
- [ ] Validation des formulaires
- [ ] Messages flash affichés
- [ ] Design responsive
- [ ] Sécurité des routes

---

## 📊 Base de Données

**Vérification dans phpMyAdmin :**

1. Accédez à http://localhost/phpmyadmin
2. Sélectionnez la base `wishlist`
3. Vérifiez les tables :
   - [ ] `users` : Contient l'admin
   - [ ] `gifts` : Contient les cadeaux
   - [ ] `reservations` : Contient les réservations

**Requête SQL pour voir les réservations :**
```sql
SELECT 
    g.name as cadeau,
    r.visitor_name as reserve_par,
    r.created_at as date_reservation
FROM gifts g
LEFT JOIN reservations r ON g.id = r.gift_id;
```

---

## 🎉 Félicitations !

Si tous les tests passent, votre application est complètement fonctionnelle !
