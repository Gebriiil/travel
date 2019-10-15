<?php 

//  categories routes
//  
Route::group(['prefix'=>'hotel'],function()
{
	
	// show all data an data table 
	Route::get('/all','HotelController@index')->middleware(['permission:read hotels'])->name('get.hotel.index'); 
	// view form for adding new item 
	Route::get('/add','HotelController@add')->middleware(['permission:add hotels'])->name('get.hotel.add');  
	// store data of item 
	Route::post('/store','HotelController@store')->middleware(['permission:add hotels'])->name('post.hotel.store'); 
	// view data of specific item  
	Route::get('/edit/{id}','HotelController@edit')->middleware(['permission:edit hotels'])->name('get.hotel.edit')->where('id', '[0-9]+'); 
	// update data of specific item 
	Route::put('/update','HotelController@update')->middleware(['permission:edit hotels'])->name('put.hotel.update'); 
	// delete data of specific item
	Route::get('/delete/{id}','HotelController@delete')->middleware(['permission:delete hotels'])->name('get.hotel.delete')->where('id', '[0-9]+');
	// delete multi  item
	Route::post('/delete/multi','HotelController@deleteMulti')->middleware(['permission:delete hotels'])->name('post.hotel.deleteMulti'); 

	// sort elements
	Route::post('/sort','HotelController@sort')->middleware(['permission:read hotels'])->name('post.hotel.sort'); 
	// make this item visibile or not  
	Route::get('/visibility/{id}','HotelController@visibility')->middleware(['permission:read hotels'])->name('get.hotel.visibility')->where('id', '[0-9]+'); 


	// view data of seo
	Route::get('/seo/{id}','HotelController@seo')->middleware(['permission:read hotels'])->name('get.hotel.seo')->where('id', '[0-9]+');
	// update data of seo
	Route::post('/seo/update','HotelController@updateSeo')->middleware(['permission:read hotels'])->name('post.hotel.updateSeo');



    // more images  for Projects
    Route::get('/add-images/{id}','HotelGallaryController@addImages')->middleware(['permission:read hotels'])->name('get.hotel.image.addImages')->where('id', '[0-9]+');
    Route::post('/add-images','HotelGallaryController@moreImages')->middleware(['permission:read hotels'])->name('post.hotel.image.moreImages');
    Route::get('/delete-image/{id}','HotelGallaryController@deleteImage')->middleware(['permission:read hotels'])->name('get.hotel.image.delete')->where('id', '[0-9]+');

    Route::get('/city-hotels', 'HotelController@cityHotels')->middleware(['permission:read hotels'])->name('ajax.get.city.hotels');


});
