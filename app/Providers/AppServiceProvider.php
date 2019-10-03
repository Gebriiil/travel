<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Setting;
use App\Models\Review;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {



        Schema::defaultStringLength(191);

        $lang = current_lang();
        $settings = Setting::where('language_id', $lang->id)
            ->first();


        // site content 
        $site_content = json_decode($settings->site_content);

        $categories = Category::where('language_id', $lang->id)
            ->where('deleted_at', null)
            ->orderBy('sort', 'asc')
            ->get();


        $reviews = Review::where('language_id',  $lang->id)
            ->orderBy('sort')
            ->take(4)
            ->get();


        View::share(['categories' => $categories, 'settings' => $settings, 'site_content' => $site_content, 'lang' => $lang, 'reviews' => $reviews]);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
