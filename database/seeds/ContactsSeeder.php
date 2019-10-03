<?php


use App\Models\Contact;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

/**
 * Created by PhpStorm.
 * User: Mahmoud
 * Date: 4/4/2019
 * Time: 10:58 AM
 */
class ContactsSeeder extends Seeder
{

    public function run()
    {
        $faker = Faker::create();
        foreach (range(1, 10) as $index) {
            $data['name'] = $faker->name;
            $data['email'] = $faker->safeEmail;
            $data['phone'] = $faker->phoneNumber;
            $data['country'] = $faker->country;
            $data['msg_title'] = $faker->name;
            $data['msg_body'] = $faker->text;

            Contact::create($data);
        }
    }

}
