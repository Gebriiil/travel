<?php

//  categories routes
//  
use Illuminate\Support\Facades\Route;

	Route::group(['prefix' => 'contact'], function () {
    // show all data an data table
    Route::get('/all', 'ContactController@index')->middleware(['contact'])->name('get.contact.index');
    // delete data of specific item
    Route::get('/delete/{id}', 'ContactController@delete')->middleware(['contact'])->name('get.contact.delete')->where('id', '[0-9]+');
    // delete multi  item
    Route::post('/delete/multi', 'ContactController@deleteMulti')->middleware(['contact'])->name('post.contact.deleteMulti');
});
