<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//
//Route::get('/', function () {
//    return view('front.index');
//});


//  for language (  package laravel macamara )
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath'],
        ['namespace' => 'Supplier']
    ],
    function () {
        /** ADD ALL LOCALIZED ROUTES INSIDE THIS GROUP **/

        Route::name('front.')->namespace('Front')->group(function () 
        {
            Route::get('/search-tours', 'TourController@search')->name('get.tours.search');

            Route::get('/sub-categories', 'CategoryController@childs')->name('ajax.get.subCategories');
            Route::get('/', 'HomeController@index')->name('get.home.index');
            Route::get('/about', 'AboutUsController@index')->name('get.about.index');
            Route::get('/contact', 'ContactUsController@index')->name('get.contact.index');
            Route::get('/search', 'SubCategoryController@searchTours')->name('get.search.tours');
            Route::post('/submit-contact', 'ContactUsController@sendMessage')->name('ajax.post.contact');
            Route::post('/subscribe', 'HomeController@subscribe')->name('ajax.post.subscribe');
            Route::post('/book', 'TourController@book')->name('ajax.post.booking');
            Route::get('/switch-lang/{slug}', 'HomeController@switchLanguage')->name('get.home.switch.language');
            Route::get('/switch-currency/{slug}', 'HomeController@switchCurrency')->name('get.home.switch.currency');
            Route::get('/{categorySlug}', 'CategoryController@index')->name('get.category.index');
            Route::get('/{categorySlug}/{subCategorySlug}', 'SubCategoryController@index')->name('get.subCategory.index');
            Route::get('/{categorySlug}/{subCategorySlug}/filter', 'SubCategoryController@filter')->name('get.subCategory.filter');
            Route::get('/{categorySlug}/{subCategorySlug}/{tourSlug}', 'TourController@index')->name('get.tour.index');
            Route::post('/search-tours', 'SubCategoryController@searchTours');




        });// end our routs


    });

/*

*/
