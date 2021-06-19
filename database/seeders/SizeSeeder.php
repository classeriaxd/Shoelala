<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['type_id' => '1', 'us' => '6',     'eur' => '38.5',    'uk' => '5.5',  'cm' => '24',],
            ['type_id' => '1', 'us' => '6.5',   'eur' => '39',      'uk' => '6',    'cm' => '24.5',],
            ['type_id' => '1', 'us' => '7',     'eur' => '40',      'uk' => '6.5',  'cm' => '25',],
            ['type_id' => '1', 'us' => '7.5',   'eur' => '42',      'uk' => '7',    'cm' => '25.5',],
            ['type_id' => '1', 'us' => '8',     'eur' => '42.5',    'uk' => '7.5',  'cm' => '26',],
            ['type_id' => '1', 'us' => '8.5',   'eur' => '43',      'uk' => '8',    'cm' => '26.5',],
            ['type_id' => '1', 'us' => '9',     'eur' => '43.5',    'uk' => '8.5',  'cm' => '27',],
            ['type_id' => '1', 'us' => '9.5',   'eur' => '44',      'uk' => '9',    'cm' => '27.5',],
            ['type_id' => '1', 'us' => '10',    'eur' => '44.5',    'uk' => '9.5',  'cm' => '28',],
            ['type_id' => '1', 'us' => '10.5',  'eur' => '45',      'uk' => '10',   'cm' => '28.5',],
            ['type_id' => '1', 'us' => '11',    'eur' => '45.5',    'uk' => '10.5', 'cm' => '29',],
            ['type_id' => '1', 'us' => '11.5',  'eur' => '46',      'uk' => '11',   'cm' => '29.5',],
            ['type_id' => '1', 'us' => '12',    'eur' => '46.5',    'uk' => '11.5', 'cm' => '30',],
            ['type_id' => '1', 'us' => '12.5',  'eur' => '47',      'uk' => '12',   'cm' => '30.5',],
            ['type_id' => '1', 'us' => '13',    'eur' => '47.5',    'uk' => '12.5', 'cm' => '31',],

            ['type_id' => '2', 'us' => '4.5',   'eur' => '38.5',    'uk' => '5.5',  'cm' => '24',],
            ['type_id' => '2', 'us' => '5',     'eur' => '39',      'uk' => '6',    'cm' => '24.5',],
            ['type_id' => '2', 'us' => '5.5',   'eur' => '40',      'uk' => '6.5',  'cm' => '25',],
            ['type_id' => '2', 'us' => '6',     'eur' => '42',      'uk' => '7',    'cm' => '25.5',],
            ['type_id' => '2', 'us' => '6.5',   'eur' => '42.5',    'uk' => '7.5',  'cm' => '26',],
            ['type_id' => '2', 'us' => '7',     'eur' => '43',      'uk' => '8',    'cm' => '26.5',],
            ['type_id' => '2', 'us' => '7.5',   'eur' => '43.5',    'uk' => '8.5',  'cm' => '27',],
            ['type_id' => '2', 'us' => '8',     'eur' => '44',      'uk' => '9',    'cm' => '27.5',],
            ['type_id' => '2', 'us' => '8.5',   'eur' => '44.5',    'uk' => '9.5',  'cm' => '28',],
            ['type_id' => '2', 'us' => '9',     'eur' => '45',      'uk' => '10',   'cm' => '28.5',],
            ['type_id' => '2', 'us' => '9.5',   'eur' => '45.5',    'uk' => '10.5', 'cm' => '29',],
            ['type_id' => '2', 'us' => '10',    'eur' => '46',      'uk' => '11',   'cm' => '29.5',],
            ['type_id' => '2', 'us' => '10.5',  'eur' => '46.5',    'uk' => '11.5', 'cm' => '30',],
            ['type_id' => '2', 'us' => '11',    'eur' => '47',      'uk' => '12',   'cm' => '30.5',],
            ['type_id' => '2', 'us' => '11.5',  'eur' => '47.5',    'uk' => '12.5', 'cm' => '31',],

            ['type_id' => '3', 'us' => '3.5',   'eur' => '35.5',    'uk' => '3',    'cm' => '22.5',],
            ['type_id' => '3', 'us' => '4',     'eur' => '36',      'uk' => '3.5',  'cm' => '23',],
            ['type_id' => '3', 'us' => '4.5',   'eur' => '36.5',    'uk' => '4',    'cm' => '23.5',],
            ['type_id' => '3', 'us' => '5',     'eur' => '37.5',    'uk' => '4.5',  'cm' => '23.5',],
            ['type_id' => '3', 'us' => '5.5',   'eur' => '38',      'uk' => '5',    'cm' => '24',],
            ['type_id' => '3', 'us' => '6',     'eur' => '38.5',    'uk' => '5.5',  'cm' => '24',],
            ['type_id' => '3', 'us' => '6.5',   'eur' => '39',      'uk' => '6',    'cm' => '24.5',],
            ['type_id' => '3', 'us' => '7',     'eur' => '40',      'uk' => '6.5',  'cm' => '25',],

            
        ];
        DB::table('sizes')->insert($data);
    }
}