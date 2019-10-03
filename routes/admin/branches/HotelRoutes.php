<?php 

//  categories routes
//  
Route::group(['prefix'=>'hotel'],function()
{
	
	// show all data an data table 
	Route::get('/all','HotelController@index')->name('get.hotel.index'); 
	// view form for adding new item 
	Route::get('/add','HotelController@add')->name('get.hotel.add');  
	// store data of item 
	Route::post('/store','HotelController@store')->name('post.hotel.store'); 
	// view data of specific item  
	Route::get('/edit/{id}','HotelController@edit')->name('get.hotel.edit')->where('id', '[0-9]+'); 
	// update data of specific item 
	Route::put('/update','HotelController@update')->name('put.hotel.update'); 
	// delete data of specific item
	Route::get('/delete/{id}','HotelController@delete')->name('get.hotel.delete')->where('id', '[0-9]+');
	// delete multi  item
	Route::post('/delete/multi','HotelController@deleteMulti')->name('post.hotel.deleteMulti'); 

	// sort elements
	Route::post('/sort','HotelController@sort')->name('post.hotel.sort'); 
	// make this item visibile or not  
	Route::get('/visibility/{id}','HotelController@visibility')->name('get.hotel.visibility')->where('id', '[0-9]+'); 


	// view data of seo
	Route::get('/seo/{id}','HotelController@seo')->name('get.hotel.seo')->where('id', '[0-9]+');
	// update data of seo
	Route::post('/seo/update','HotelController@updateSeo')->name('post.hotel.updateSeo');



    // more images  for Projects
    Route::get('/add-images/{id}','HotelGallaryController@addImages')->name('get.hotel.image.addImages')->where('id', '[0-9]+');
    Route::post('/add-images','HotelGallaryController@moreImages')->name('post.hotel.image.moreImages');
    Route::get('/delete-image/{id}','HotelGallaryController@deleteImage')->name('get.hotel.image.delete')->where('id', '[0-9]+');

    Route::get('/city-hotels', 'HotelController@cityHotels')->name('ajax.get.city.hotels');


});
