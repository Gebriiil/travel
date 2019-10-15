<?php

//  categories routes
//  
Route::group(['prefix' => 'reservation','middleware' => ['permission:manage reservations']], function () {
    // show all data an data table
    Route::get('/all', 'ReservationController@index')->name('get.reservation.index');
    // delete data of specific item
    Route::get('/delete/{id}', 'ReservationController@delete')->name('get.reservation.delete')->where('id', '[0-9]+');
    // delete multi  item
    Route::post('/delete/multi', 'ReservationController@deleteMulti')->name('post.reservation.deleteMulti');
});
