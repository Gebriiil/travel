<?php

//  categories routes
//  
Route::group(['prefix' => 'transfer'], function () {
    // show all data an data table
    Route::get('/all', 'TransferController@index')->name('get.transfer.index');
    // delete data of specific item
    Route::get('/delete/{id}', 'TransferController@delete')->name('get.transfer.delete')->where('id', '[0-9]+');
    // delete multi  item
    Route::post('/delete/multi', 'TransferController@deleteMulti')->name('post.transfer.deleteMulti');
});
