<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['type' => 'Men'],
            ['type' => 'Women'],
            ['type' => 'Kid'],
        ];
        DB::table('types')->insert($data);
    }
}
