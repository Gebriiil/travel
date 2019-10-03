<?php

use App\Models\Language;
use Illuminate\Database\Seeder;

/**
 * Created by PhpStorm.
 * User: Mahmoud
 * Date: 4/4/2019
 * Time: 10:58 AM
 */
class LanguageSeeder extends Seeder
{

    public function run()
    {

        $data['name'] = 'Spanish';
        $data['symbol'] = 'es';
        $data['icon'] = '';
        Language::create($data);


        $data['name'] = 'Italian';
        $data['symbol'] = 'it';
        $data['icon'] = '';
        Language::create($data);


        $data['name'] = 'English';
        $data['symbol'] = 'en';
        $data['icon'] = '';
        Language::create($data);


        $data['name'] = 'Portuguese';
        $data['symbol'] = 'pt';
        $data['icon'] = '';
        Language::create($data);
    }

}
