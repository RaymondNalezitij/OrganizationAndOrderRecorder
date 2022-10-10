<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrganizationProductSeeder extends Seeder
{
    public function run()
    {
        DB::table('organizations_products')->insert([
            [
                'organization_id' => '2',
                'product_id' => '3',
                'quantity' => '10',
                'date_provided' => '2022-10-06'
            ], [
                'organization_id' => '1',
                'product_id' => '1',
                'quantity' => '5',
                'date_provided' => '2022-10-07'
            ]
        ]);
    }
}
