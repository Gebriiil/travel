<?php

use App\Models\Country;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

/**
 * Created by PhpStorm.
 * User: Mahmoud
 * Date: 4/4/2019
 * Time: 10:58 AM
 */
class CountrySeeder extends Seeder
{

    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            $data['name'] = $faker->country;
            $data['language_id'] = rand(1, 4);
            Country::create($data);
        }
    }

}
