<?php

//  categories routes
//  
Route::group(['prefix' => 'p2p'], function () {
    // show all data an data table
    Route::get('/all', 'P2pController@index')->name('get.p2p.index');
    // delete data of specific item
    Route::get('/delete/{id}', 'P2pController@delete')->name('get.p2p.delete')->where('id', '[0-9]+');
    // delete multi  item
    Route::post('/delete/multi', 'P2pController@deleteMulti')->name('post.p2p.deleteMulti');
});
