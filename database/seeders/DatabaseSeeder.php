<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Beverage;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'email' => 'test@email.com',
            'name' => 'Tester',
            'password' => bcrypt('1234'),
        ]);

        Beverage::create([
            'item_code' => '230-LRBN',
            'item_name' => 'WINE CHAMPAGNE - Louis Roederer Brut Nature Vintage (01-C)',
            'country' => 'FRANCE',
            'uom' => 'BTL',
            'commodity' => 'WINE',
            'type' => 'CHAMPANGE',
            'inv_cost' => '2656.58',
            'status' => 'AVAILABLE',
        ]);

        Beverage::create([
            'item_code' => '215-THBS',
            'item_name' => 'RED WINE-Trinity Hill Hawkes Bay Syrah (07-WBG)',
            'country' => 'NEW ZEALAND',
            'uom' => 'BTL',
            'commodity' => 'WINE',
            'type' => 'RED WINE',
            'inv_cost' => '720',
            'status' => 'AVAILABLE',
        ])
    }
}
