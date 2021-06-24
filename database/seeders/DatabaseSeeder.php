<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            ImageAngleSeeder::class,
            TypeSeeder::class,
            CategorySeeder::class,
            SizeSeeder::class,
            BrandSeeder::class,
            ShoeSeeder::class,
            ShoeImageSeeder::class,
        ]);
    }
}
