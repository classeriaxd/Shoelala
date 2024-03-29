<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

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
            'slug' => 'CORTEZ-BASIC-PRM-CQ6663-001',
            'created_at'=> Carbon::now(),
            'updated_at' => Carbon::now()],

            ['name' => 'Kd Trey 5 Vii Ep', 
            'category_id' => '2', 
            'brand_id' => '1', 
            'type_id' => '1', 
            'sku' => 'AT1198-004', 
            'price' => '3400', 
            'description' => 'Kevin Durant likes a shoe that feels broken-in straight away but still provides containment and support. The KD Trey 5 VII EP hits the ground running with a combination of bouncy cushioning with a precise, supportive fit that\'s ready to go right out of the box.', 
            'slug' => 'Kd-Trey-5-Vii-Ep-AT1198-004',
            'created_at'=> Carbon::now(),
            'updated_at' => Carbon::now()],

            ['name' => 'Lebron Witness Iv Ep', 
            'category_id' => '2', 
            'brand_id' => '1', 
            'type_id' => '1', 
            'sku' => 'CD0188-102', 
            'price' => '3800', 
            'description' => 'Be a force on the court in the LeBron Witness 4: a great fit for powerful players who want good ankle support from a shoe that still feels light. Durably built for playing on outdoor courts, its sculpted, padded collar and exterior heel counter provide a stable fit, while visible cushioning units under the forefoot return energy with every step.', 
            'slug' => 'Lebron-Witness-Iv-Ep-CD0188-102',
            'created_at'=> Carbon::now(),
            'updated_at' => Carbon::now()],

            ['name' => 'Capri Black', 
            'category_id' => '6', 
            'brand_id' => '2', 
            'type_id' => '1', 
            'sku' => '369246-01', 
            'price' => '2400', 
            'description' => 'The PUMA Capri \'Black\' sneaker blends 80s tennis-inspired style with modern engineering.', 
            'slug' => 'Capri-Black-369246-01',
            'created_at'=> Carbon::now(),
            'updated_at' => Carbon::now()],

            ['name' => 'Overcast-Heather', 
            'category_id' => '7', 
            'brand_id' => '2', 
            'type_id' => '1', 
            'sku' => '369798-05', 
            'price' => '4000', 
            'description' => 'The PUMA Storm Street Trainers feature a silhouette and lines that throw back to running styles from at least two decades ago.', 
            'slug' => 'Overcast-Heather-369798-05',
            'created_at'=> Carbon::now(),
            'updated_at' => Carbon::now()],

            ['name' => 'RS-X Tracks', 
            'category_id' => '7', 
            'brand_id' => '2', 
            'type_id' => '1', 
            'sku' => '369332-01', 
            'price' => '5100', 
            'description' => 'The PUMA RS series is back from the \'80s archives and better than ever.', 
            'slug' => 'RS-X-Tracks-369332-01',
            'created_at'=> Carbon::now(),
            'updated_at' => Carbon::now()],

            ['name' => 'Old Skool Navy', 
            'category_id' => '7', 
            'brand_id' => '3', 
            'type_id' => '1', 
            'sku' => 'VN000D3HNVY', 
            'price' => '4000', 
            'description' => 'The Vans Old Skool is a classic sneaker with a low-profile silhouette, seen here in a \'Navy\' colorway. A canvas denim upper gets treated with navy suede on the toe cap, heel and eyestays. Custom leather jazz stripes detail the sides, while a lightly padded collar is trimmed with a leather interior. A double stitch technique utilized throughout offers improved durability. Iconic branding is found on the footbed and heel license plate. The signature vulcanized construction and Waffle tread sole round out this iconic skate silhouette.', 
            'slug' => 'Old-Skool-Navy-VN000D3HNVY',
            'created_at'=> Carbon::now(),
            'updated_at' => Carbon::now()],

            ['name' => 'Anaheim Factory Sid DX OG RED', 
            'category_id' => '7', 
            'brand_id' => '3', 
            'type_id' => '1', 
            'sku' => 'VN0A4BTXVTM', 
            'price' => '3800', 
            'description' => 'New to the Anaheim Factory pack, the SID DX features high-gloss, heritage-inspired color palettes, our iconic flying-V logo, and sturdy suede uppers for a unique look, feel, and construction. Paying tribute to our first Vans factory in Anaheim, California, it also includes throwback details, cotton laces, striped sidewalls, and the modernized comfort of upgraded OrthoLite sockliners.', 
            'slug' => 'Anaheim-Factory-Sid-DX-OG-RED-VN0A4BTXVTM',
            'created_at'=> Carbon::now(),
            'updated_at' => Carbon::now()],

            ['name' => 'Anaheim Factory Sid DX WHITE', 
            'category_id' => '7', 
            'brand_id' => '3', 
            'type_id' => '1', 
            'sku' => 'VN0A4BTXUL4', 
            'price' => '3800', 
            'description' => 'New to the Anaheim Factory pack, the SID DX features high-gloss, heritage-inspired color palettes, our iconic flying-V logo, and sturdy suede uppers for a unique look, feel, and construction. Paying tribute to our first Vans factory in Anaheim, California, it also includes throwback details, cotton laces, striped sidewalls, and the modernized comfort of upgraded OrthoLite sockliners.', 
            'slug' => 'Anaheim-Factory-Sid-DX-WHITE-VN0A4BTXUL4',
            'created_at'=> Carbon::now(),
            'updated_at' => Carbon::now()],

            ['name' => 'Air Max 90', 
            'category_id' => '1', 
            'brand_id' => '1', 
            'type_id' => '1', 
            'sku' => 'DC9845-100', 
            'price' => '6495', 
            'description' => 'COMFORT, HERITAGE AND NOTHING BETTER. Nothing as fly, nothing as comfortable, nothing as proven—the Nike Air Max 90 stays true to its roots with the iconic Waffle sole, stitched overlays and classic TPU accents. Fresh colors give a modern look while Max Air cushioning adds comfort to your journey. Originally designed for performance running, the Max Air unit in the heel adds unbelievable cushioning. The low-top design combines with a padded collar for a sleek look that feels soft and comfortable. The rubber Waffle sole adds a heritage look, traction and durability. The stitched overlays and TPU accents add durability, comfort and the iconic \'90s look you love.', 
            'slug' => 'Air-Max-90-DC9845-100',
            'created_at'=> Carbon::now(),
            'updated_at' => Carbon::now()],

            ['name' => 'RYZ 365 2', 
            'category_id' => '1', 
            'brand_id' => '1', 
            'type_id' => '2', 
            'sku' => 'CU4874-100', 
            'price' => '4295', 
            'description' => 'The Nike RYZ 365 2 brings you a futuristic take to classic \'90s sneakers. The eye-catching midsole with stylized cutouts modernizes the chunky style with an airy aesthetic. A rich mixture of materials on the upper adds texture and style versatility. To top it off, the DIY lacing lets you personalize your style—wrap under the midsole or through webbing on the side and heel for a delicate touch to your bold look.', 
            'slug' => 'RYZ-365-2-CU4874-100',
            'created_at'=> Carbon::now(),
            'updated_at' => Carbon::now()],

            ['name' => 'ZX 2K BOOST', 
            'category_id' => '1', 
            'brand_id' => '5', 
            'type_id' => '3', 
            'sku' => 'GY2689', 
            'price' => '4500', 
            'description' => 'The adidas ZX 2K Florine Shoes are for the ladies. The progressive, fashion-forward ladies, that is. The tech-savvy and digitally minded. Those who appreciate vintage style, yet are inspired by modern aesthetics.', 
            'slug' => 'ZX-2K-BOOST-GY2689',
            'created_at'=> Carbon::now(),
            'updated_at' => Carbon::now()],

            ['name' => 'Suede Heart Galaxy Black', 
            'category_id' => '5', 
            'brand_id' => '2', 
            'type_id' => '2', 
            'sku' => '369232-03-4', 
            'price' => '3450', 
            'description' => 'A feminine update to the classic Suede, the Suede Heart features a large satin bow lacing. Inspired by the shimmer of stars in the galaxy, this version features a full suede upper with a shimmer suede accent on the heel cap and satin bow lacing with metallic trim.', 
            'slug' => 'Suede-Heart-Galaxy-Black-369232-03-4',
            'created_at'=> Carbon::now(),
            'updated_at' => Carbon::now()],

            ['name' => 'ULTRABOOST DNA', 
            'category_id' => '1', 
            'brand_id' => '5', 
            'type_id' => '3', 
            'sku' => 'GW4924', 
            'price' => '5340', 
            'description' => 'Run to move your body. Run to clear your head. The adidas Ultraboost DNA Shoes give you endless energy over the miles. The sleek silhouette makes them a favourite beyond the world of running. An adidas Primeknit upper brings comfort to your everyday wandering too. This product is made with Primeblue, a high-performance recycled material made in part with Parley Ocean Plastic.', 
            'slug' => 'Ultraboost-DNA-GW4924',
            'created_at'=> Carbon::now(),
            'updated_at' => Carbon::now()],

            ['name' => 'Falcon', 
            'category_id' => '7', 
            'brand_id' => '5', 
            'type_id' => '2', 
            'sku' => 'F37016', 
            'price' => '7000', 
            'description' => 'heritage design and cutting-edge technology. With the latest collection of adidas Falcon shoes, the retro-inspired design is available in more styles than ever before. If you prefer a pared-back and minimalist style, all-white or all-black pairs are perfect additions to your wardrobe.', 
            'slug' => 'Falcon-F37016',
            'created_at'=> Carbon::now(),
            'updated_at' => Carbon::now()],
        ];
        DB::table('shoes')->insert($data);
    }
}
