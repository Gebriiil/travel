<?php


use App\Models\Tour;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

/**
 * Created by PhpStorm.
 * User: Mahmoud
 * Date: 4/4/2019
 * Time: 10:58 AM
 */
class TourSeeder extends Seeder
{

    public function run()
    {
        $options = ["yes", "no"];

        $faker = Faker::create();
        foreach (range(1, 250) as $index) {
            $data['name'] = $faker->name;
            $data['language_id'] = rand(1, 4);
            $data['sub_category_id'] = rand(1, 50);
            $data['img'] = $faker->imageUrl(500, 500, 'nature');
            $data['small_desc'] = $faker->text;
            $data['desc'] = $faker->text;
            $data['price_start_from'] = rand(50, 2000);
            $data['inclusion'] = $faker->text;
            $data['exclusion'] = $faker->text;
            $data['slug'] = str_slug($data['name']);
            $data['num_of_stars'] = rand(1, 7);
            $data['show_in_special_offers'] = $options[array_rand($options, 2)[0]];

            Tour::create($data);
        }
    }

}
