<?php

//  categories routes
//  
Route::group(['prefix' => 'subscriber'], function () {
    // show all data an data table
    Route::get('/all', 'SubscriberController@index')->name('get.subscriber.index');
    // delete data of specific item
    Route::get('/delete/{id}', 'SubscriberController@delete')->name('get.subscriber.delete')->where('id', '[0-9]+');
    // delete multi  item
    Route::post('/delete/multi', 'SubscriberController@deleteMulti')->name('post.subscriber.deleteMulti');
});
