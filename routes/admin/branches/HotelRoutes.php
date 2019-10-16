<?php 

//  categories routes
//  
Route::group(['prefix'=>'hotel'],function()
{
	
	// show all data an data table 
	Route::get('/all','HotelController@index')->middleware(['hotel:read'])->name('get.hotel.index'); 
	// view form for adding new item 
	Route::get('/add','HotelController@add')->middleware(['hotel:add'])->name('get.hotel.add');  
	// store data of item 
	Route::post('/store','HotelController@store')->middleware(['hotel:add'])->name('post.hotel.store'); 
	// view data of specific item  
	Route::get('/edit/{id}','HotelController@edit')->middleware(['hotel:edit'])->name('get.hotel.edit')->where('id', '[0-9]+'); 
	// update data of specific item 
	Route::put('/update','HotelController@update')->middleware(['hotel:edit'])->name('put.hotel.update'); 
	// delete data of specific item
	Route::get('/delete/{id}','HotelController@delete')->middleware(['hotel:delete'])->name('get.hotel.delete')->where('id', '[0-9]+');
	// delete multi  item
	Route::post('/delete/multi','HotelController@deleteMulti')->middleware(['hotel:delete'])->name('post.hotel.deleteMulti'); 

	// sort elements
	Route::post('/sort','HotelController@sort')->middleware(['hotel:read'])->name('post.hotel.sort'); 
	// make this item visibile or not  
	Route::get('/visibility/{id}','HotelController@visibility')->middleware(['hotel:read'])->name('get.hotel.visibility')->where('id', '[0-9]+'); 


	// view data of seo
	Route::get('/seo/{id}','HotelController@seo')->middleware(['hotel:read'])->name('get.hotel.seo')->where('id', '[0-9]+');
	// update data of seo
	Route::post('/seo/update','HotelController@updateSeo')->middleware(['hotel:read'])->name('post.hotel.updateSeo');



    // more images  for Projects
    Route::get('/add-images/{id}','HotelGallaryController@addImages')->middleware(['hotel:read'])->name('get.hotel.image.addImages')->where('id', '[0-9]+');
    Route::post('/add-images','HotelGallaryController@moreImages')->middleware(['hotel:read'])->name('post.hotel.image.moreImages');
    Route::get('/delete-image/{id}','HotelGallaryController@deleteImage')->middleware(['hotel:read'])->name('get.hotel.image.delete')->where('id', '[0-9]+');

    Route::get('/city-hotels', 'HotelController@cityHotels')->middleware(['hotel:read'])->name('ajax.get.city.hotels');


});
