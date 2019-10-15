<?php

//  categories routes
//  
Route::group(['prefix' => 'tour'], function () {

    // show all data an data table
    Route::get('/all', 'TourController@index')->middleware(['permission:read tours'])->name('get.tour.index');
    // view form for adding new item
    Route::get('/add', 'TourController@add')->middleware(['permission:add tours'])->name('get.tour.add');
    // store data of item
    Route::post('/store', 'TourController@store')->middleware(['permission:add tours'])->name('post.tour.store');
    // view data of specific item
    Route::get('/edit/{id}', 'TourController@edit')->middleware(['permission:edit tours'])->name('get.tour.edit')->where('id', '[0-9]+');
    // update data of specific item
    Route::put('/update', 'TourController@update')->middleware(['permission:edit tours'])->name('put.tour.update');
    // delete data of specific item
    Route::get('/delete/{id}', 'TourController@delete')->middleware(['permission:delete tours'])->name('get.tour.delete')->where('id', '[0-9]+');
    // delete multi  item
    Route::post('/delete/multi', 'TourController@deleteMulti')->middleware(['permission:delete tours'])->name('post.tour.deleteMulti');
    // sort elements
    Route::post('/sort', 'TourController@sort')->middleware(['permission:read tours'])->name('post.tour.sort');
    // make this item visibile or not
    Route::get('/visibility/{id}', 'TourController@visibility')->middleware(['permission:read tours'])->name('get.tour.visibility')->where('id', '[0-9]+');
    // view data of seo
    Route::get('/seo/{id}', 'TourController@seo')->middleware(['permission:read tours'])->name('get.tour.seo')->where('id', '[0-9]+');
    // update data of seo
    Route::post('/seo/update', 'TourController@updateSeo')->middleware(['permission:read tours'])->name('post.tour.updateSeo');


    Route::get('/show-in-offers/{id}','TourController@showInOffers')->middleware(['permission:read tours'])->name('get.tour.showInOffers')->where('id', '[0-9]+');
    Route::get('/hide-from-offers/{id}','TourController@hideFromOffers')->middleware(['permission:read tours'])->name('get.tour.hideFromOffers')->where('id', '[0-9]+');




    //tour gallary
    Route::get('/tour-gallary/{id}', 'TourGallaryController@addImages')->middleware(['permission:read tours'])->name('get.tour.image.addImages')->where('id', '[0-9]+');
    Route::post('/add-images', 'TourGallaryController@moreImages')->middleware(['permission:read tours'])->name('post.tour.image.moreImages');
    Route::get('/delete-tour-gallary-image/{id}', 'TourGallaryController@deleteImage')->middleware(['permission:read tours'])->name('get.tour.image.delete')->where('id', '[0-9]+');
    Route::get('/edit-gallary-image/{id}', 'TourGallaryController@editGallaryImage')->middleware(['permission:read tours'])->name('get.tour.image.edit')->where('id', '[0-9]+');
    Route::put('/update-gallary-image', 'TourGallaryController@updateGallaryImage')->middleware(['permission:read tours'])->name('put.tour.image.update');


    //tour itinerary
    Route::get('/tour-itinerary/{id}', 'ItineraryController@addItineraries')->middleware(['permission:read tours'])->name('get.tour.itinerary.addItineraries')->where('id', '[0-9]+');
    Route::post('/add-itinerary', 'ItineraryController@moreItineraries')->middleware(['permission:read tours'])->name('post.tour.itinerary.moreItineraries');
    Route::get('/delete-tour-itinerary/{id}', 'ItineraryController@deleteItinerary')->middleware(['permission:read tours'])->name('get.tour.itinerary.delete')->where('id', '[0-9]+');
    Route::get('/edit-tour-itinerary/{id}', 'ItineraryController@editItinerary')->middleware(['permission:read tours'])->name('get.tour.itinerary.edit')->where('id', '[0-9]+');
    Route::put('/update-tour-itinerary-test', 'ItineraryController@updateItinerary')->middleware(['permission:read tours'])->name('put.tour.itinerary.update');


    //tour daily pricig
    Route::get('/tour-daily-pricing/{id}', 'DailyPricingController@allDailyPricing')->middleware(['permission:read tours'])->name('get.tour.dailyPricing.addDailyPricing')->where('id', '[0-9]+');
    Route::post('/add-daily-pricing', 'DailyPricingController@storeDailyPricing')->middleware(['permission:read tours'])->name('post.tour.dailyPricing.storeDailyPricing');
    Route::get('/delete-tour-daily-pricing/{id}', 'DailyPricingController@deleteDailyPricing')->middleware(['permission:read tours'])->name('get.tour.dailyPricing.delete')->where('id', '[0-9]+');
    Route::get('/delete-tour-daily-pricing-hotel/{id}', 'DailyPricingController@deleteDailyPricingHotel')->middleware(['permission:read tours'])->name('get.tour.dailyPricing.deleteHotel')->where('id', '[0-9]+');
    Route::get('/edit-tour-daily-pricing/{id}', 'DailyPricingController@editDailyPricing')->middleware(['permission:read tours'])->name('get.tour.dailyPricing.edit')->where('id', '[0-9]+');
    Route::put('/update-tour-daily-pricing', 'DailyPricingController@updateDailyPricing')->middleware(['permission:read tours'])->name('put.tour.dailyPricing.update');

    //tour package pricing
    Route::get('/tour-package-pricing/{id}', 'PackagePricingController@allPackagePricing')->middleware(['permission:read tours'])->name('get.tour.packagePricing.addPackagePricing')->where('id', '[0-9]+');
    Route::post('/add-package-pricing', 'PackagePricingController@storePackagePricing')->middleware(['permission:read tours'])->name('post.tour.packagePricing.storePackagePricing');
    Route::get('/delete-tour-package-pricing/{id}', 'PackagePricingController@deletePackagePricing')->middleware(['permission:read tours'])->name('get.tour.packagePricing.delete')->where('id', '[0-9]+');
    Route::get('/delete-tour-package-pricing-hotel/{id}', 'PackagePricingController@deletePackagePricingHotel')->middleware(['permission:read tours'])->name('get.tour.packagePricing.deleteHotel')->where('id', '[0-9]+');
    Route::get('/edit-tour-package-pricing/{id}', 'PackagePricingController@editPackagePricing')->middleware(['permission:read tours'])->name('get.tour.packagePricing.edit')->where('id', '[0-9]+');
    Route::put('/update-tour-package-pricing', 'PackagePricingController@updatePackagePricing')->middleware(['permission:read tours'])->name('put.tour.packagePricing.update');


});
