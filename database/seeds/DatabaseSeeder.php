<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */

    /*
     * facker image categories
     *    'abstract', 'animals', 'business', 'cats', 'city', 'food', 'nightlife',
        'fashion', 'people', 'nature', 'sports', 'technics', 'transport'
     *
     *  */

    public function run()
    {
        $this->call(LanguageSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(CountrySeeder::class);
        $this->call(CitySeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(SubCategorySeeder::class);
        $this->call(HotelSeeder::class);
        $this->call(TourSeeder::class);
        $this->call(ItinerarySeeder::class);
        $this->call(TourGallarySeeder::class);
        $this->call(HotelGallarySeeder::class);
        $this->call(ContactsSeeder::class);
        $this->call(P2psSeeder::class);
        $this->call(PartnersSeeder::class);
        $this->call(ReviewsSeeder::class);
        $this->call(SliderSeeder::class);
        $this->call(SubscribersSeeder::class);
        $this->call(TransfersSeeder::class);

    }
}
