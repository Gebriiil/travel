<?php


use App\Models\Subscriber;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

/**
 * Created by PhpStorm.
 * User: Mahmoud
 * Date: 4/4/2019
 * Time: 10:58 AM
 */
class SubscribersSeeder extends Seeder
{

    public function run()
    {
        $faker = Faker::create();
        foreach (range(1, 10) as $index) {
            $data['email'] = $faker->safeEmail;
            Subscriber::create($data);
        }
    }

}
