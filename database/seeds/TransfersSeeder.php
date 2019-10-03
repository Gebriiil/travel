<?php


use App\Models\Transfer;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

/**
 * Created by PhpStorm.
 * User: Mahmoud
 * Date: 4/4/2019
 * Time: 10:58 AM
 */
class TransfersSeeder extends Seeder
{

    public function run()
    {
        $faker = Faker::create();
        foreach (range(1, 10) as $index) {
            $data['from_place'] = $faker->city;
            $data['to_place'] = $faker->city;
            $data['arrival_date'] = $faker->date();
            $data['departure_date'] = $faker->date();
            $data['car_type'] = 'private';
            $data['adult_number'] = rand(1, 10);
            $data['children_number'] = rand(1, 10);
            $data['have_infants'] = 'yes';
            $data['name'] = $faker->name;
            $data['email'] = $faker->safeEmail;
            $data['phone'] = $faker->phoneNumber;
            $data['notes'] = $faker->text;
            Transfer::create($data);
        }
    }

}
