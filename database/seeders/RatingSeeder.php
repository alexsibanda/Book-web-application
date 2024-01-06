<?php
// database/seeders/RatingSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Rating;

class RatingSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 500000; $i++) {
            Rating::create([
                'book_id' => $faker->numberBetween(1, 100000),
                'user_id' => $faker->numberBetween(1, 1000),
                'rating' => $faker->numberBetween(1, 10),
            ]);
        }
    }
}
