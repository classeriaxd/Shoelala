<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImageAngleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['angle' => 'Front'],
            ['angle' => 'Back'],
            ['angle' => 'Right'],
            ['angle' => 'Left'],
            ['angle' => 'Insole'],
            ['angle' => 'Outsole'],
        ];
        DB::table('image_angles')->insert($data);
    }
}
