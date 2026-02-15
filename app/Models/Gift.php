<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Modèle Gift - Représente un cadeau dans la wishlist
 * 
 * @property int $id
 * @property string $name
 * @property float $price
 * @property string $image
 * @property string|null $description
 * @property string $purchase_link
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 */
class Gift extends Model
{
    use HasFactory;

    /**
     * Attributs assignables en masse
     */
    protected $fillable = [
        'name',
        'price',
        'image',
        'description',
        'purchase_link',
    ];

    /**
     * Attributs castés
     */
    protected $casts = [
        'price' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Retourne l'URL complète de l'image
     */
    public function getImageUrlAttribute(): string
    {
        return asset('storage/' . $this->image);
    }

    /**
     * Formate le prix avec le symbole FCFA
     */
    public function getFormattedPriceAttribute(): string
    {
        return number_format($this->price, 0, ',', ' ') . ' FCFA';
    }

    /**
     * Relation : Un cadeau peut avoir une réservation
     */
    public function reservation()
    {
        return $this->hasOne(Reservation::class);
    }

    /**
     * Vérifie si le cadeau est réservé
     */
    public function isReserved(): bool
    {
        return $this->reservation()->exists();
    }

    /**
     * Retourne le nom du visiteur qui a réservé le cadeau
     */
    public function getReservedByAttribute(): ?string
    {
        return $this->reservation?->visitor_name;
    }
}
