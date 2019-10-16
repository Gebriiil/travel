<?php

//  categories routes
//  
Route::group(['prefix' => 'reservation'], function () {
    // show all data an data table
    Route::get('/all', 'ReservationController@index')->middleware(['reversation'])->name('get.reservation.index');
    // delete data of specific item
    Route::get('/delete/{id}', 'ReservationController@delete')->middleware(['reversation'])->name('get.reservation.delete')->where('id', '[0-9]+');
    // delete multi  item
    Route::post('/delete/multi', 'ReservationController@deleteMulti')->middleware(['reversation'])->name('post.reservation.deleteMulti');
});
