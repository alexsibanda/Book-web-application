<?php

// database/seeders/AuthorSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Author;

class AuthorSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 1000; $i++) {
            Author::create([
                'name' => $faker->name,
                'bio' => $faker->paragraph,
            ]);
        }
    }
}
