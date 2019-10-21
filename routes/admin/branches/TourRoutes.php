<?php

//  categories routes
//  
Route::group(['prefix' => 'tour'], function () {

    // show all data an data table
    Route::get('/all', 'TourController@index')->name('get.tour.index');
    // view form for adding new item
    Route::get('/add', 'TourController@add')->middleware(['tour:add'])->name('get.tour.add');
    // store data of item
    Route::post('/store', 'TourController@store')->middleware(['tour:add'])->name('post.tour.store');
    // view data of specific item
    Route::get('/edit/{id}', 'TourController@edit')->middleware(['tour:edit'])->name('get.tour.edit')->where('id', '[0-9]+');
    // update data of specific item
    Route::put('/update', 'TourController@update')->middleware(['tour:edit'])->name('put.tour.update');
    // delete data of specific item
    Route::get('/delete/{id}', 'TourController@delete')->middleware(['tour:delete'])->name('get.tour.delete')->where('id', '[0-9]+');
    // delete multi  item
    Route::post('/delete/multi', 'TourController@deleteMulti')->middleware(['tour:delete'])->name('post.tour.deleteMulti');
    // sort elements
    Route::post('/sort', 'TourController@sort')->middleware(['tour:read'])->name('post.tour.sort');
    // make this item visibile or not
    Route::get('/visibility/{id}', 'TourController@visibility')->middleware(['tour:read'])->name('get.tour.visibility')->where('id', '[0-9]+');
    // view data of seo
    Route::get('/seo/{id}', 'TourController@seo')->middleware(['tour:read'])->name('get.tour.seo')->where('id', '[0-9]+');
    // update data of seo
    Route::post('/seo/update', 'TourController@updateSeo')->middleware(['tour:read'])->name('post.tour.updateSeo');


    Route::get('/show-in-offers/{id}','TourController@showInOffers')->middleware(['tour:read'])->name('get.tour.showInOffers')->where('id', '[0-9]+');
    Route::get('/hide-from-offers/{id}','TourController@hideFromOffers')->middleware(['tour:read'])->name('get.tour.hideFromOffers')->where('id', '[0-9]+');




    //tour gallary
    Route::get('/tour-gallary/{id}', 'TourGallaryController@addImages')->middleware(['tour:read'])->name('get.tour.image.addImages')->where('id', '[0-9]+');
    Route::post('/add-images', 'TourGallaryController@moreImages')->middleware(['tour:read'])->name('post.tour.image.moreImages');
    Route::get('/delete-tour-gallary-image/{id}', 'TourGallaryController@deleteImage')->middleware(['tour:read'])->name('get.tour.image.delete')->where('id', '[0-9]+');
    Route::get('/edit-gallary-image/{id}', 'TourGallaryController@editGallaryImage')->middleware(['tour:read'])->name('get.tour.image.edit')->where('id', '[0-9]+');
    Route::put('/update-gallary-image', 'TourGallaryController@updateGallaryImage')->middleware(['tour:read'])->name('put.tour.image.update');


    //tour itinerary
    Route::get('/tour-itinerary/{id}', 'ItineraryController@addItineraries')->middleware(['tour:read'])->name('get.tour.itinerary.addItineraries')->where('id', '[0-9]+');
    Route::post('/add-itinerary', 'ItineraryController@moreItineraries')->middleware(['tour:read'])->name('post.tour.itinerary.moreItineraries');
    Route::get('/delete-tour-itinerary/{id}', 'ItineraryController@deleteItinerary')->middleware(['tour:read'])->name('get.tour.itinerary.delete')->where('id', '[0-9]+');
    Route::get('/edit-tour-itinerary/{id}', 'ItineraryController@editItinerary')->middleware(['tour:read'])->name('get.tour.itinerary.edit')->where('id', '[0-9]+');
    Route::put('/update-tour-itinerary-test', 'ItineraryController@updateItinerary')->middleware(['tour:read'])->name('put.tour.itinerary.update');


    //tour daily pricig
    Route::get('/tour-daily-pricing/{id}', 'DailyPricingController@allDailyPricing')->middleware(['tour:read'])->name('get.tour.dailyPricing.addDailyPricing')->where('id', '[0-9]+');
    Route::post('/add-daily-pricing', 'DailyPricingController@storeDailyPricing')->middleware(['tour:read'])->name('post.tour.dailyPricing.storeDailyPricing');
    Route::get('/delete-tour-daily-pricing/{id}', 'DailyPricingController@deleteDailyPricing')->middleware(['tour:read'])->name('get.tour.dailyPricing.delete')->where('id', '[0-9]+');
    Route::get('/delete-tour-daily-pricing-hotel/{id}', 'DailyPricingController@deleteDailyPricingHotel')->middleware(['tour:read'])->name('get.tour.dailyPricing.deleteHotel')->where('id', '[0-9]+');
    Route::get('/edit-tour-daily-pricing/{id}', 'DailyPricingController@editDailyPricing')->middleware(['tour:read'])->name('get.tour.dailyPricing.edit')->where('id', '[0-9]+');
    Route::put('/update-tour-daily-pricing', 'DailyPricingController@updateDailyPricing')->middleware(['tour:read'])->name('put.tour.dailyPricing.update');

    //tour package pricing
    Route::get('/tour-package-pricing/{id}', 'PackagePricingController@allPackagePricing')->middleware(['tour:read'])->name('get.tour.packagePricing.addPackagePricing')->where('id', '[0-9]+');
    Route::post('/add-package-pricing', 'PackagePricingController@storePackagePricing')->middleware(['tour:read'])->name('post.tour.packagePricing.storePackagePricing');
    Route::get('/delete-tour-package-pricing/{id}', 'PackagePricingController@deletePackagePricing')->middleware(['tour:read'])->name('get.tour.packagePricing.delete')->where('id', '[0-9]+');
    Route::get('/delete-tour-package-pricing-hotel/{id}', 'PackagePricingController@deletePackagePricingHotel')->middleware(['tour:read'])->name('get.tour.packagePricing.deleteHotel')->where('id', '[0-9]+');
    Route::get('/edit-tour-package-pricing/{id}', 'PackagePricingController@editPackagePricing')->middleware(['tour:read'])->name('get.tour.packagePricing.edit')->where('id', '[0-9]+');
    Route::put('/update-tour-package-pricing', 'PackagePricingController@updatePackagePricing')->middleware(['tour:read'])->name('put.tour.packagePricing.update');


});
