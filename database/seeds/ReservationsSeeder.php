<?php


use App\Models\Reservation;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

/**
 * Created by PhpStorm.
 * User: Mahmoud
 * Date: 4/4/2019
 * Time: 10:58 AM
 */
class ReservationsSeeder extends Seeder
{

    public function run()
    {
        $faker = Faker::create();
        foreach (range(1, 10) as $index) {

            $data['name'] = $faker->name;
            $data['email'] = $faker->safeEmail;
            $data['phone'] = $faker->phoneNumber;
            $data['nationality'] = $faker->country;
            $data['arrival_date'] = $faker->date();
            $data['departure_date'] = $faker->date();
            $data['adult_number'] = rand(1,5);
            $data['children_number'] = rand(1,5);
            $data['children_age'] = rand(1,12);
            $data['message'] = $faker->text;
            Reservation::create($data);
        }
    }

}
