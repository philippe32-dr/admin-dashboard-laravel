<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Créer un utilisateur administrateur par défaut
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
        ]);
        
        // Appeler nos seeders dans l'ordre pour respecter les contraintes de clés étrangères
        $this->call([
            ClientSeeder::class,
            SubscriptionSeeder::class,
            FollowedItemSeeder::class,
        ]);
    }
}
