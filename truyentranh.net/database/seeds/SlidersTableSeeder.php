<?php

use Illuminate\Database\Seeder;
use App\Models\Sliders;

class SlidersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Let's truncate our existing records to start from scratch.
        Sliders::truncate();

        $faker = \Faker\Factory::create();

        // And now, let's create a few articles in our database:
        for ($i = 0; $i < 1; $i++) {
            Sliders::create([
                'image_path' => $faker->imageUrl($width = 640, $height = 480),
                'image_link' => $faker->image($dir = null, $width = 640, $height = 480) ,
                'title'      => $faker->sentence,
                'content'    => $faker->paragraph,
                'url'        => $faker->url,
                'position'   => $faker->numberBetween(1,2),
                'target'     => $faker->numberBetween(1,5),
                'status'     => $faker->numberBetween(1,2),
                'user_id'    => $faker->numberBetween(1,10),
            ]);
        }
    }
}
