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
            'email' => 'floredossou936@gmail.com',
            'password' => Hash::make('Floflo2006'),
        ]);
    }
}
