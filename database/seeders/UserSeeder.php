<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['role_id' => '3', 
            'email' => 'superadmin@email.com', 
            'password' => Hash::make('superadmin@email.com'), 
            'first_name' => 'Super Admin',
            'middle_name' => 'Super Admin',
            'last_name' => 'Super Admin',
            'birth_date' => '2000-01-01',
            'address' => 'Super Admin Address',
            'contact_number' => '+639429755930',
            'email_verified_at' => date('Y-m-d H:i:s'),
            'remember_token' => NULL,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'deleted_at' => NULL,
        ],
            ['role_id' => '2', 
            'email' => 'admin@email.com', 
            'password' => Hash::make('admin@email.com'), 
            'first_name' => 'Admin',
            'middle_name' => 'Admin',
            'last_name' => 'Admin',
            'birth_date' => '2000-01-01',
            'address' => 'Admin Address',
            'contact_number' => '+639429755931',
            'email_verified_at' => date('Y-m-d H:i:s'),
            'remember_token' => NULL,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'deleted_at' => NULL,
        ],
            ['role_id' => '1', 
            'email' => 'user@email.com', 
            'password' => Hash::make('user@email.com'), 
            'first_name' => 'Tucker',
            'middle_name' => 'Black',
            'last_name' => 'Porter',
            'birth_date' => '2000-01-01',
            'address' => 'User Address',
            'contact_number' => '+639429755932',
            'email_verified_at' => date('Y-m-d H:i:s'),
            'remember_token' => NULL,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'deleted_at' => NULL,
        ],
            
        ];
        DB::table('users')->insert($data);
    }
}
