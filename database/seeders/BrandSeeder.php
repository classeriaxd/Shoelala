<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' => 'Nike', 'logo' => '/seeds/brands/NIKE-LOGO.png', 'slug' => 'Nike',],
            ['name' => 'Puma', 'logo' => '/seeds/brands/PUMA-LOGO.png', 'slug' => 'Puma',],
            ['name' => 'Vans', 'logo' => '/seeds/brands/VANS-LOGO.png', 'slug' => 'Vans',],
            
        ];
        DB::table('brands')->insert($data);
    }
}
