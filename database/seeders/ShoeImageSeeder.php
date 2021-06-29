<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShoeImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['shoe_id' => '1', 'image' => 'seeds/shoeimages/NIKE-CORTEZ BASIC PRM-F.jpg', 'image_angle_id' => '1',],
            ['shoe_id' => '1', 'image' => 'seeds/shoeimages/NIKE-CORTEZ BASIC PRM-L.jpg', 'image_angle_id' => '4',],
            ['shoe_id' => '1', 'image' => 'seeds/shoeimages/NIKE-CORTEZ BASIC PRM-R.jpg', 'image_angle_id' => '3',],

            ['shoe_id' => '2', 'image' => 'seeds/shoeimages/NIKE-Kd Trey 5 Vii Ep-F.jpg', 'image_angle_id' => '1',],
            ['shoe_id' => '2', 'image' => 'seeds/shoeimages/NIKE-Kd Trey 5 Vii Ep-L.jpg', 'image_angle_id' => '4',],
            ['shoe_id' => '2', 'image' => 'seeds/shoeimages/NIKE-Kd Trey 5 Vii Ep-R.jpg', 'image_angle_id' => '3',],

            ['shoe_id' => '3', 'image' => 'seeds/shoeimages/NIKE-Lebron Witness Iv Ep-F.jpg', 'image_angle_id' => '1',],
            ['shoe_id' => '3', 'image' => 'seeds/shoeimages/NIKE-Lebron Witness Iv Ep-L.jpg', 'image_angle_id' => '4',],
            ['shoe_id' => '3', 'image' => 'seeds/shoeimages/NIKE-Lebron Witness Iv Ep-R.jpg', 'image_angle_id' => '3',],

            ['shoe_id' => '4', 'image' => 'seeds/shoeimages/PUMA-Capri Black-F.jpg', 'image_angle_id' => '1',],
            ['shoe_id' => '4', 'image' => 'seeds/shoeimages/PUMA-Capri Black-L.jpg', 'image_angle_id' => '4',],
            ['shoe_id' => '4', 'image' => 'seeds/shoeimages/PUMA-Capri Black-R.jpg', 'image_angle_id' => '3',],

            ['shoe_id' => '5', 'image' => 'seeds/shoeimages/PUMA-Overcast-Heather-F.jpg', 'image_angle_id' => '1',],
            ['shoe_id' => '5', 'image' => 'seeds/shoeimages/PUMA-Overcast-Heather-L.jpg', 'image_angle_id' => '4',],
            ['shoe_id' => '5', 'image' => 'seeds/shoeimages/PUMA-Overcast-Heather-R.jpg', 'image_angle_id' => '3',],

            ['shoe_id' => '6', 'image' => 'seeds/shoeimages/PUMA-RS-X Tracks-F.jpg', 'image_angle_id' => '1',],
            ['shoe_id' => '6', 'image' => 'seeds/shoeimages/PUMA-RS-X Tracks-L.jpg', 'image_angle_id' => '4',],
            ['shoe_id' => '6', 'image' => 'seeds/shoeimages/PUMA-RS-X Tracks-R.jpg', 'image_angle_id' => '3',],

            ['shoe_id' => '7', 'image' => 'seeds/shoeimages/VANS-Old Skool Navy-F.jpg', 'image_angle_id' => '1',],
            ['shoe_id' => '7', 'image' => 'seeds/shoeimages/VANS-Old Skool Navy-L.jpg', 'image_angle_id' => '4',],
            ['shoe_id' => '7', 'image' => 'seeds/shoeimages/VANS-Old Skool Navy-R.jpg', 'image_angle_id' => '3',],

            ['shoe_id' => '8', 'image' => 'seeds/shoeimages/VANS-Anaheim Factory Sid DX OG RED-F.jpg', 'image_angle_id' => '1',],
            ['shoe_id' => '8', 'image' => 'seeds/shoeimages/VANS-Anaheim Factory Sid DX OG RED-L.jpg', 'image_angle_id' => '4',],
            ['shoe_id' => '8', 'image' => 'seeds/shoeimages/VANS-Anaheim Factory Sid DX OG RED-R.jpg', 'image_angle_id' => '3',],

            ['shoe_id' => '9', 'image' => 'seeds/shoeimages/VANS-Anaheim Factory Sid DX WHITE-F.jpg', 'image_angle_id' => '1',],
            ['shoe_id' => '9', 'image' => 'seeds/shoeimages/VANS-Anaheim Factory Sid DX WHITE-L.jpg', 'image_angle_id' => '4',],
            ['shoe_id' => '9', 'image' => 'seeds/shoeimages/VANS-Anaheim Factory Sid DX WHITE-R.jpg', 'image_angle_id' => '3',],
        ];
            
        DB::table('shoe_images')->insert($data);    
    }
}
