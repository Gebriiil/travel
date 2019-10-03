<?php


use App\Models\Review;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

/**
 *  Created by PhpStorm.
 * User: Mahmoud
 * Date: 4/4/2019
 * Time: 10:58 AM
 */
class ReviewsSeeder extends Seeder
{

    public function run()
    {
        $faker = Faker::create();
        foreach (range(1, 50) as $index) {
            $data['img'] = $faker->imageUrl(500, 500);
            $data['title'] = $faker->name;
            $data['desc'] = $faker->text;
            $data['language_id'] = rand(1, 4);
            Review::create($data);
        }
    }

}
