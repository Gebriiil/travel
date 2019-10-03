<?php

use App\Models\Category;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

/**
 * Created by PhpStorm.
 * User: Mahmoud
 * Date: 4/4/2019
 * Time: 10:58 AM
 */
class CategorySeeder extends Seeder
{

    public function run()
    {
        $faker = Faker::create();
        $options = ["yes", "no"];

        foreach (range(1, 30) as $index) {
            $data['name'] = $faker->name;
            $data['language_id'] = rand(1, 4);
            $data['country_id'] = rand(1, 10);
            $data['img'] = $faker->imageUrl(500,500,'nature');
            $data['small_desc'] = $faker->text;
            $data['desc'] = $faker->text;
            $data['slug'] = str_slug($data['name']);
            $data['featured'] = $options[array_rand($options, 2)[0]];
            $data['show_in_footer'] = $options[array_rand($options, 2)[0]];

            Category::create($data);
        }
    }

}
