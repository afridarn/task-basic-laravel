<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = \Faker\Factory::create();
        for ($i = 0; $i < 10; $i++) {
            DB::table('products')->insert([
                'name'    => Str::ucfirst($faker->word()),
                'slug'      => $faker->unique()->slug(),
                'price'       => $faker->randomFloat(2, 1000, 100000),
                'description' => Str::ucfirst($faker->paragraph()),
                'photo'       => $faker->imageUrl(),
                'store_id'    => $faker->numberBetween(1, 10),
                'created_at' => $created_at = now()->subDays(rand(1, 100)),
                'updated_at' => $created_at
            ]);
        }
    }
}
