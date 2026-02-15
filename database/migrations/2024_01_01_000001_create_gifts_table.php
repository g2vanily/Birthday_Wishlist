<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Exécute la migration
     */
    public function up(): void
    {
        Schema::create('gifts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->decimal('price', 12, 0);
            $table->string('image');
            $table->text('description')->nullable();
            $table->string('purchase_link');
            $table->timestamps();
            
            // Index pour améliorer les performances
            $table->index('created_at');
        });
    }

    /**
     * Annule la migration
     */
    public function down(): void
    {
        Schema::dropIfExists('gifts');
    }
};
