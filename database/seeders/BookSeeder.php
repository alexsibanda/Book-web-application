<?php

// database/seeders/BookSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Book;

class BookSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 100000; $i++) {
            Book::create([
                'title' => $faker->sentence,
                'author_id' => $faker->numberBetween(1, 1000),
                'category_id' => $faker->numberBetween(1, 3000),
            ]);
        }
    }
}
