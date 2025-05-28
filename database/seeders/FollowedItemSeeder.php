<?php

namespace Database\Seeders;

use App\Models\FollowedItem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FollowedItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Créer 5 éléments suivis fictifs
        $followedItems = [
            [
                'client_id' => 1,
                'item_name' => 'Cible 1'
            ],
            [
                'client_id' => 1,
                'item_name' => 'Cible 2'
            ],
            [
                'client_id' => 2,
                'item_name' => 'Cible 3'
            ],
            [
                'client_id' => 3,
                'item_name' => 'Cible 4'
            ],
            [
                'client_id' => 3,
                'item_name' => 'Cible 5'
            ]
        ];

        foreach ($followedItems as $item) {
            FollowedItem::create($item);
        }
    }
}
