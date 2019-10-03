<?php


use App\Models\HotelGallary;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

/**
 * Created by PhpStorm.
 * User: Mahmoud
 * Date: 4/4/2019
 * Time: 10:58 AM
 */
class HotelGallarySeeder extends Seeder
{

    public function run()
    {
        $faker = Faker::create();
        foreach (range(1, 300) as $index) {
            $data['img'] = $faker->imageUrl(500,500,'nature');
            $data['hotel_id'] = rand(1, 2);

            HotelGallary::create($data);
        }
    }

}
