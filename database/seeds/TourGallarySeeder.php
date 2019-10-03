<?php


use App\Models\TourGallary;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

/**
 * Created by PhpStorm.
 * User: Mahmoud
 * Date: 4/4/2019
 * Time: 10:58 AM
 */
class TourGallarySeeder extends Seeder
{

    public function run()
    {
        $faker = Faker::create();
        foreach (range(1, 600) as $index) {
            $data['img'] = $faker->imageUrl(500,500,'nature');
            $data['tour_id'] = rand(1, 250);

            TourGallary::create($data);
        }
    }

}
