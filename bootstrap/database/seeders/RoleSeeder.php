<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' => 'User', 'description' => 'Shoe Buyer'],
            ['name' => 'Admin', 'description' => 'Cashier'],
            ['name' => 'Super Admin', 'description' => 'Main Admin'],
        ];
        DB::table('roles')->insert($data);
    }
}
