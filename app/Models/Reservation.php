<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Modèle Reservation - Représente la réservation d'un cadeau par un visiteur
 * 
 * @property int $id
 * @property int $gift_id
 * @property string $visitor_name
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 */
class Reservation extends Model
{
    use HasFactory;

    /**
     * Attributs assignables en masse
     */
    protected $fillable = [
        'gift_id',
        'visitor_name',
    ];

    /**
     * Attributs castés
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Relation : Une réservation appartient à un cadeau
     */
    public function gift()
    {
        return $this->belongsTo(Gift::class);
    }
}
