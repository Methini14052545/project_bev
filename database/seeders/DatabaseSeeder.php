<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Beverage;
use App\Models\Store;
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
        ]);

        Beverage::create([
            'item_code' => '214-33W',
            'item_name' => 'WHITE WINE-THAILAND, Colombard, MONSOON VALLEY COLOMBARD (10-WBG)',
            'country' => 'THAILAND',
            'uom' => 'BTL',
            'commodity' => 'WINE',
            'type' => 'WHITE WINE',
            'inv_cost' => '452.80',
            'status' => 'AVAILABLE',
        ]);

        Beverage::create([
            'item_code' => '214-38W',
            'item_name' => 'ROSE WINE-THAILAND, Blended Rose, Monsoon Valley Rose 75 Cl (12-WBG)',
            'country' => 'THAILAND',
            'uom' => 'BTL',
            'commodity' => 'WINE',
            'type' => 'ROSE WINE',
            'inv_cost' => '410.70',
            'status' => 'AVAILABLE',
        ]);

        Beverage::create([
            'item_code' => '230200501',
            'item_name' => 'WHITE WINE-Viognier Terre Siciliane (11-WBG)',
            'country' => 'ITALY',
            'uom' => 'BTL',
            'commodity' => 'WINE',
            'type' => 'WHITE WINE',
            'inv_cost' => '756',
            'status' => 'AVAILABLE',
        ]);

        Beverage::create([
            'item_code' => '214-43R1',
            'item_name' => 'RED WINE-THAILAND, Shiraz, MONSOON VALLEY SHIRAZ (05-WBG)',
            'country' => 'THAILAND',
            'uom' => 'BTL',
            'commodity' => 'WINE',
            'type' => 'RED WINE',
            'inv_cost' => '501.26',
            'status' => 'AVAILABLE',
        ]);

        Beverage::create([
            'item_code' => '230-WCBR-001',
            'item_name' => 'WINE CHAMPAGNE - Champagne Barons de Rothschild Brut (03-C)',
            'country' => 'FRANCE',
            'uom' => 'BTL',
            'commodity' => 'WINE',
            'type' => 'CHAMPAGNE WINE',
            'inv_cost' => '2349.6',
            'status' => 'AVAILABLE',
        ]);

        Beverage::create([
            'item_code' => '230-JCEBN',
            'item_name' => 'WINE CHAMPAGNE-FRANCE, Jacquesson, Cuvee 744, Extra Brut, NV (08-C)',
            'country' => 'FRANCE',
            'uom' => 'BTL',
            'commodity' => 'WINE',
            'type' => 'CHAMPAGNE WINE',
            'inv_cost' => '2490',
            'status' => 'AVAILABLE',
        ]);

        Beverage::create([
            'item_code' => '244-539',
            'item_name' => 'LIQUOR-Benedictine D.O.M. 70cl (09-L)',
            'country' => '',
            'uom' => 'BTL',
            'commodity' => 'LIQUOR',
            'type' => 'LIQUOR',
            'inv_cost' => '1443.93',
            'status' => 'AVAILABLE',
        ]);

        Beverage::create([
            'item_code' => '244-554',
            'item_name' => 'LIQUOR-Grand Marnier 70cl (29-L)',
            'country' => '',
            'uom' => 'BTL',
            'commodity' => 'LIQUOR',
            'type' => 'LIQUOR',
            'inv_cost' => '1803.74',
            'status' => 'AVAILABLE',
        ]);

        

        
    }
}
