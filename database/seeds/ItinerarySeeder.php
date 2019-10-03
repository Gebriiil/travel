<?php


use App\Models\Itinerary;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

/**
 * Created by PhpStorm.
 * User: Mahmoud
 * Date: 4/4/2019
 * Time: 10:58 AM
 */
class ItinerarySeeder extends Seeder
{

    public function run()
    {
        $faker = Faker::create();
        foreach (range(1, 600) as $index) {
            $data['title'] = $faker->name;
            $data['tour_id'] = rand(1, 50);
            $data['desc'] = $faker->text;

            Itinerary::create($data);
        }
    }

}
