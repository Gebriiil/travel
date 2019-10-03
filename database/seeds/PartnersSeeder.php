<?php

use App\Models\City;
use App\Models\Partner;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

/**
 * Created by PhpStorm.
 * User: Mahmoud
 * Date: 4/4/2019
 * Time: 10:58 AM
 */
class PartnersSeeder extends Seeder
{

    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            $data['img'] = $faker->imageUrl(150,150,'business');

            Partner::create($data);
        }
    }

}
