<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrganizationSeeder extends Seeder
{
    public function run()
    {
        DB::table('organizations')->insert([
            [
                'name' => 'M79',
                'address' => 'Rēzeknes iela 5A',
                'contact_number' => '25447101',
                'contact_email' => 'info@m79.lv'
            ], [
                'name' => '1A',
                'address' => 'Kareivių g. 11B',
                'contact_number' => '63588024',
                'contact_email' => 'info@1a.lv'
            ]
        ]);
    }
}
