<?php

use App\Models\City;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

/**
 * Created by PhpStorm.
 * User: Mahmoud
 * Date: 4/4/2019
 * Time: 10:58 AM
 */
class CitySeeder extends Seeder
{

    public function run()
    {
        $faker = Faker::create();
        foreach (range(1, 10) as $index)
        {
            $data['name'] = $faker->city;
            $data['language_id'] = rand(1, 4);
            $data['country_id'] = rand(1, 10);
            City::create($data);
        }
    }

}
