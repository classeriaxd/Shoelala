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
            ['category' => 'Running Shoes'],
            ['category' => 'Basketball Shoes'],
            ['category' => 'Sneakers'],
            ['category' => 'Old Skool'],
            ['category' => 'Chuck Taylor'],
        ];
        DB::table('categories')->insert($data);
    }
}
