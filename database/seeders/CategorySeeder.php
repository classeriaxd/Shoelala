<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['category' => 'Running'],
            ['category' => 'Basketball'],
            ['category' => 'Sneakers'],
            ['category' => 'Chuck Taylor'],
            ['category' => 'Lifestyle'],
            ['category' => 'Casual'],
            ['category' => 'Sportswear'],
        ];
        DB::table('categories')->insert($data);
    }
}
