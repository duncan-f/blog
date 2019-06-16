<?php

use App\Post;
use Illuminate\Database\Seeder;

class posts extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $data = [];

        for($i = 1; $i <= 100; $i++) {
            array_push($data, [
                'title' => $faker->sentence,
                'slug' => $faker->slug,
                'body' => $faker->realText(2000),
                'created_at' => $faker->dateTime()
            ]);
        }

        Post::insert($data);
    }
}
