<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CashFlowSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->truncate();
        DB::table('users')->insert([
            [
                'name' => 'sport cart Admin',
                'email' => 'cptadmin@ah.com',
                'password' => Hash::make('12345678'),
                'user_type' => 'ADM',
                'created_by' => 1
            ],
            [
                'name' => 'CPT Admin',
                'email' => 'scUser@ah.com',
                'user_type' => Hash::make('12345678'),
                'user_type' => 'USR',
                'created_by' => 1
            ],
            [
                'name' => 'CPT Admin',
                'email' => 'scabid@ah.com',
                'user_type' => Hash::make('12345678'),
                'user_type' => 'USR',
                'created_by' => 1
            ]
        ]);
    }
}
