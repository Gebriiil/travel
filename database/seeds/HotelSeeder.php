<?php


use App\Models\Hotel;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

/**
 * Created by PhpStorm.
 * User: Mahmoud
 * Date: 4/4/2019
 * Time: 10:58 AM
 */
class HotelSeeder extends Seeder
{

    public function run()
    {
        $faker = Faker::create();
        foreach (range(1, 50) as $index) {
            $data['name'] = $faker->name;
            $data['language_id'] = rand(1, 4);
            $data['city_id'] = rand(1, 10);
            $data['img'] = $faker->imageUrl(500,500);



            Hotel::create($data);
        }
    }

}
