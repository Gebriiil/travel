<?php

use App\Models\SubCategory;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

/**
 * Created by PhpStorm.
 * User: Mahmoud
 * Date: 4/4/2019
 * Time: 10:58 AM
 */
class SubCategorySeeder extends Seeder
{

    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 50) as $index) {
            $data['name'] = $faker->name;
            $data['language_id'] = rand(1, 4);
            $data['category_id'] = rand(1, 30);
            $data['img'] = $faker->imageUrl(500,500,'nature');
            $data['small_desc'] = $faker->text;
            $data['desc'] = $faker->text;
            $data['slug'] = str_slug($data['name']);

            SubCategory::create($data);
        }
    }

}
