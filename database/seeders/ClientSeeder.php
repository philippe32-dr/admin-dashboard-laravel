<?php

namespace Database\Seeders;

use App\Models\Client;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Cru00e9er 5 clients fictifs
        $clients = [
            [
                'name' => 'Jean Dupont',
                'email' => 'jean.dupont@example.com',
                'status' => 'active'
            ],
            [
                'name' => 'Marie Martin',
                'email' => 'marie.martin@example.com',
                'status' => 'active'
            ],
            [
                'name' => 'Pierre Durand',
                'email' => 'pierre.durand@example.com',
                'status' => 'active'
            ],
            [
                'name' => 'Sophie Lefebvre',
                'email' => 'sophie.lefebvre@example.com',
                'status' => 'inactive'
            ],
            [
                'name' => 'Thomas Bernard',
                'email' => 'thomas.bernard@example.com',
                'status' => 'active'
            ]
        ];

        foreach ($clients as $client) {
            Client::create($client);
        }
    }
}
