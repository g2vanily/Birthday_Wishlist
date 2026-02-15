<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Exécute la migration - Table des réservations de cadeaux
     */
    public function up(): void
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('gift_id')->constrained()->onDelete('cascade');
            $table->string('visitor_name');
            $table->timestamps();
            
            // Un cadeau ne peut être réservé qu'une seule fois
            $table->unique('gift_id');
            
            // Index pour améliorer les performances
            $table->index('visitor_name');
        });
    }

    /**
     * Annule la migration
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
