<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Crée un utilisateur admin par défaut
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@wishlist.com',
            'password' => Hash::make('password'),
        ]);
    }
}
