<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductReviewSeeder extends Seeder
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
            DB::table('product_reviews')->insert([
                'score' => $faker->numberBetween(1, 10),
                'review' => Str::ucfirst($faker->paragraph()),
                'product_id' => $faker->numberBetween(1, 10),
                'user_id' => $faker->numberBetween(1, 10),
                'created_at' => $created_at = now()->subDays(rand(1, 100)),
                'updated_at' => $created_at
            ]);
        }
    }
}
