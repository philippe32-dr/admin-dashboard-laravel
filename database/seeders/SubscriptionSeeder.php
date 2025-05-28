<?php

namespace Database\Seeders;

use App\Models\Subscription;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubscriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Cru00e9er 3 abonnements fictifs
        $subscriptions = [
            [
                'client_id' => 1,
                'type' => 'Premium',
                'status' => 'active',
                'expiry_date' => Carbon::now()->addYear()
            ],
            [
                'client_id' => 2,
                'type' => 'Standard',
                'status' => 'active',
                'expiry_date' => Carbon::now()->addMonths(6)
            ],
            [
                'client_id' => 3,
                'type' => 'Basic',
                'status' => 'suspended',
                'expiry_date' => Carbon::now()->addMonths(3)
            ]
        ];

        foreach ($subscriptions as $subscription) {
            Subscription::create($subscription);
        }
    }
}
