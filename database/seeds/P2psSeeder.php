<?php


use App\Models\Contact;
use App\Models\P2p;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

/**
 * Created by PhpStorm.
 * User: Mahmoud
 * Date: 4/4/2019
 * Time: 10:58 AM
 */
class P2psSeeder extends Seeder
{

    public function run()
    {
        $faker = Faker::create();
        foreach (range(1, 10) as $index) {
            $data['name'] = $faker->name;
            $data['agent_name'] = $faker->name;
            $data['responsible_name'] = $faker->name;
            $data['country'] = $faker->country;
            $data['email'] = $faker->safeEmail;
            $data['phone'] = $faker->phoneNumber;
            $data['msg_title'] = $faker->name;
            $data['msg_body'] = $faker->text;

            P2p::create($data);
        }
    }

}
