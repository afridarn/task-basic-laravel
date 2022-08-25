<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class StoreSeeder extends Seeder
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
            DB::table('stores')->insert([
                'name'    => Str::ucfirst($faker->asciify('**** store')),
                'user_id' => $faker->numberBetween(1, 10),
                'created_at' => $created_at = now()->subDays(rand(1, 100)),
                'updated_at' => $created_at
            ]);
        }
    }
}
