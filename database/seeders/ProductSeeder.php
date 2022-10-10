<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    public function run()
    {
        DB::table('products')->insert([
            [
                'name' => 'Beyerdynamic dt770',
                'type' => 'Headphones',
                'quantity' => '25',
                'price' => '9000'
            ], [
                'name' => 'iPhone 14 Pro Max 256GB',
                'type' => 'Phones',
                'quantity' => '10',
                'price' => '158900'
            ], [
                'name' => 'Logitech G Pro X Superlight',
                'type' => 'Mice',
                'quantity' => '40',
                'price' => '14000'
            ],
        ]);
    }
}
