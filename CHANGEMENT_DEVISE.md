# 💰 Changement de Devise - FCFA

## ✅ Modifications Effectuées

La devise de l'application a été changée de **Euro (€)** vers **Franc CFA (FCFA)**.

### 📝 Changements Appliqués

#### 1. Modèle Gift (`app/Models/Gift.php`)
- **Formatage du prix** : `number_format($this->price, 0, ',', ' ') . ' FCFA'`
- **Cast du prix** : `'price' => 'integer'` (au lieu de decimal)
- Les prix sont maintenant des entiers (pas de centimes)

#### 2. Migration (`database/migrations/2024_01_01_000001_create_gifts_table.php`)
- **Type de colonne** : `decimal(12, 0)` au lieu de `decimal(10, 2)`
- Permet de stocker des montants jusqu'à 999 999 999 999 FCFA
- Pas de décimales (0 après la virgule)

#### 3. Validation (`app/Http/Controllers/GiftController.php`)
- **Validation store** : `max:999999999` au lieu de `max:999999.99`
- **Validation update** : `max:999999999` au lieu de `max:999999.99`
- Accepte des montants entiers jusqu'à 999 millions FCFA

#### 4. Formulaires

**Création (`resources/views/admin/gifts/create.blade.php`)** :
- Label : "Prix (FCFA)" au lieu de "Prix (€)"
- Input : `step="1"` au lieu de `step="0.01"`
- Accepte uniquement des nombres entiers

**Édition (`resources/views/admin/gifts/edit.blade.php`)** :
- Label : "Prix (FCFA)" au lieu de "Prix (€)"
- Input : `step="1"` au lieu de `step="0.01"`
- Accepte uniquement des nombres entiers

### 💡 Exemples de Prix

**Avant (Euro)** :
- 29,99 €
- 149,50 €
- 1 234,56 €

**Après (FCFA)** :
- 20 000 FCFA
- 100 000 FCFA
- 1 000 000 FCFA

### 🔄 Migration de la Base de Données

La base de données a été recréée avec la nouvelle structure :

```bash
php artisan migrate:fresh --seed
```

**Important** : Cette commande supprime toutes les données existantes et recrée les tables.

### 📊 Structure de la Table `gifts`

```sql
CREATE TABLE gifts (
    id BIGINT UNSIGNED PRIMARY KEY,
    name VARCHAR(255),
    price DECIMAL(12, 0),  -- Changé de DECIMAL(10, 2)
    image VARCHAR(255),
    description TEXT,
    purchase_link VARCHAR(500),
    created_at TIMESTAMP,
    updated_at TIMESTAMP
);
```

### 🎯 Affichage des Prix

**Dans les vues** :
- `{{ $gift->formatted_price }}` affiche : "20 000 FCFA"
- Format : Espace comme séparateur de milliers, pas de décimales

**Exemples d'affichage** :
- 5000 → "5 000 FCFA"
- 50000 → "50 000 FCFA"
- 500000 → "500 000 FCFA"
- 5000000 → "5 000 000 FCFA"

### ✅ Vérifications

**Formulaire d'ajout** :
- [ ] Le label affiche "Prix (FCFA)"
- [ ] Le champ accepte uniquement des entiers
- [ ] Exemple : 25000 (pas 25000.50)

**Formulaire d'édition** :
- [ ] Le label affiche "Prix (FCFA)"
- [ ] Le champ affiche le prix sans décimales
- [ ] Exemple : 25000 (pas 25000.00)

**Affichage public** :
- [ ] Les prix s'affichent avec "FCFA"
- [ ] Format : "25 000 FCFA"
- [ ] Pas de décimales

**Affichage admin** :
- [ ] Les prix s'affichent avec "FCFA"
- [ ] Format : "25 000 FCFA"
- [ ] Pas de décimales

### 🔧 Pour Ajouter un Cadeau

**Exemple de prix valides** :
- 5000
- 25000
- 100000
- 500000
- 1000000

**Prix invalides** :
- 5000.50 (décimales non acceptées)
- 5,000 (virgule non acceptée dans le champ)

### 📝 Notes Importantes

1. **Pas de décimales** : Le FCFA n'utilise généralement pas de centimes
2. **Nombres entiers** : Tous les prix doivent être des entiers
3. **Affichage** : Les espaces sont ajoutés automatiquement pour la lisibilité
4. **Validation** : Le système refuse les prix avec décimales

### 🎉 Résultat

L'application utilise maintenant le Franc CFA (FCFA) comme devise principale, adapté aux pays d'Afrique de l'Ouest et Centrale.
