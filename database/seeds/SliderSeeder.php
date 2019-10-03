<?php


use App\Models\HotelGallary;
use App\Models\Slider;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

/**
 * Created by PhpStorm.
 * User: Mahmoud
 * Date: 4/4/2019
 * Time: 10:58 AM
 */
class SliderSeeder extends Seeder
{

    public function run()
    {
        $faker = Faker::create();
        foreach (range(1, 50) as $index) {
            $data['img'] = $faker->imageUrl(1000,500,'nature');
            $data['title'] = $faker->name;
            $data['desc'] = $faker->text;
            $data['link'] = $faker->domainName;
            $data['image_title'] = $faker->name;
            $data['image_alt'] = $faker->name;
            $data['language_id'] = rand(1, 4);
            Slider::create($data);
        }
    }

}
