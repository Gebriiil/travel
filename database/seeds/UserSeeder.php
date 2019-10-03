<?php

use App\Models\Admin;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

/**
 * Created by PhpStorm.
 * User: Mahmoud
 * Date: 4/4/2019
 * Time: 10:58 AM
 */
class UserSeeder extends Seeder
{

    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            $data['name']=$faker->name;
            $data['email']=$faker->safeEmail;
            $data['language_id'] = rand(1, 4);
            $data['password']=bcrypt('secret');

             Admin::create($data);
        }
    }

}
