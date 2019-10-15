<?php

//  categories routes
//  
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'contact','middleware' => ['permission:manage contacts']], function () {
    // show all data an data table
    Route::get('/all', 'ContactController@index')->name('get.contact.index');
    // delete data of specific item
    Route::get('/delete/{id}', 'ContactController@delete')->name('get.contact.delete')->where('id', '[0-9]+');
    // delete multi  item
    Route::post('/delete/multi', 'ContactController@deleteMulti')->name('post.contact.deleteMulti');
});
