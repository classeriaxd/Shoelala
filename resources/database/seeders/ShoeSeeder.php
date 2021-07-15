<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShoeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' => 'CORTEZ BASIC PRM', 
            'category_id' => '5', 
            'brand_id' => '1', 
            'type_id' => '1', 
            'sku' => 'CQ6663-001', 
            'price' => '4150', 
            'description' => 'Inspired by Bill Bowerman\'s first masterpiece, the Nike Cortez Basic Premium pays homage to the iconic running shoe as it celebrates the Earth with a medley of recycled materials. The reclaimed canvas upper has a richly textured appearance while the classic foam midsole keeps the iconic look you love with its wedge of super-soft Crater foam. This product is made from at least 20% recycled materials by weight.', 
            'slug' => 'CORTEZ-BASIC-PRM-CQ6663-001',],

            ['name' => 'Kd Trey 5 Vii Ep', 
            'category_id' => '2', 
            'brand_id' => '1', 
            'type_id' => '1', 
            'sku' => 'AT1198-004', 
            'price' => '3400', 
            'description' => 'Kevin Durant likes a shoe that feels broken-in straight away but still provides containment and support. The KD Trey 5 VII EP hits the ground running with a combination of bouncy cushioning with a precise, supportive fit that\'s ready to go right out of the box.', 
            'slug' => 'Kd-Trey-5-Vii-Ep-AT1198-004',],

            ['name' => 'Lebron Witness Iv Ep', 
            'category_id' => '2', 
            'brand_id' => '1', 
            'type_id' => '1', 
            'sku' => 'CD0188-102', 
            'price' => '3800', 
            'description' => 'Be a force on the court in the LeBron Witness 4: a great fit for powerful players who want good ankle support from a shoe that still feels light. Durably built for playing on outdoor courts, its sculpted, padded collar and exterior heel counter provide a stable fit, while visible cushioning units under the forefoot return energy with every step.', 
            'slug' => 'Lebron-Witness-Iv-Ep-CD0188-102',],

            ['name' => 'Capri Black', 
            'category_id' => '6', 
            'brand_id' => '2', 
            'type_id' => '1', 
            'sku' => '369246-01', 
            'price' => '2400', 
            'description' => 'The PUMA Capri \'Black\' sneaker blends 80s tennis-inspired style with modern engineering.', 
            'slug' => 'Capri-Black-369246-01',],

            ['name' => 'Overcast-Heather', 
            'category_id' => '7', 
            'brand_id' => '2', 
            'type_id' => '1', 
            'sku' => '369798-05', 
            'price' => '4000', 
            'description' => 'The PUMA Storm Street Trainers feature a silhouette and lines that throw back to running styles from at least two decades ago.', 
            'slug' => 'Overcast-Heather-369798-05',],

            ['name' => 'RS-X Tracks', 
            'category_id' => '7', 
            'brand_id' => '2', 
            'type_id' => '1', 
            'sku' => '369332-01', 
            'price' => '5100', 
            'description' => 'The PUMA RS series is back from the \'80s archives and better than ever.', 
            'slug' => 'RS-X-Tracks-369332-01',],

            ['name' => 'Old Skool Navy', 
            'category_id' => '7', 
            'brand_id' => '3', 
            'type_id' => '1', 
            'sku' => 'VN000D3HNVY', 
            'price' => '4000', 
            'description' => 'The Vans Old Skool is a classic sneaker with a low-profile silhouette, seen here in a \'Navy\' colorway. A canvas denim upper gets treated with navy suede on the toe cap, heel and eyestays. Custom leather jazz stripes detail the sides, while a lightly padded collar is trimmed with a leather interior. A double stitch technique utilized throughout offers improved durability. Iconic branding is found on the footbed and heel license plate. The signature vulcanized construction and Waffle tread sole round out this iconic skate silhouette.', 
            'slug' => 'Old-Skool-Navy-VN000D3HNVY',],

            ['name' => 'Anaheim Factory Sid DX OG RED', 
            'category_id' => '7', 
            'brand_id' => '3', 
            'type_id' => '1', 
            'sku' => 'VN0A4BTXVTM', 
            'price' => '3800', 
            'description' => 'New to the Anaheim Factory pack, the SID DX features high-gloss, heritage-inspired color palettes, our iconic flying-V logo, and sturdy suede uppers for a unique look, feel, and construction. Paying tribute to our first Vans factory in Anaheim, California, it also includes throwback details, cotton laces, striped sidewalls, and the modernized comfort of upgraded OrthoLite sockliners.', 
            'slug' => 'Anaheim-Factory-Sid-DX-OG-RED-VN0A4BTXVTM',],

            ['name' => 'Anaheim Factory Sid DX WHITE', 
            'category_id' => '7', 
            'brand_id' => '3', 
            'type_id' => '1', 
            'sku' => 'VN0A4BTXUL4', 
            'price' => '3800', 
            'description' => 'New to the Anaheim Factory pack, the SID DX features high-gloss, heritage-inspired color palettes, our iconic flying-V logo, and sturdy suede uppers for a unique look, feel, and construction. Paying tribute to our first Vans factory in Anaheim, California, it also includes throwback details, cotton laces, striped sidewalls, and the modernized comfort of upgraded OrthoLite sockliners.', 
            'slug' => 'Anaheim-Factory-Sid-DX-WHITE-VN0A4BTXUL4',],
            
        ];
        DB::table('shoes')->insert($data);
    }
}
