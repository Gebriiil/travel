<?php 

//  categories routes
//  
Route::group(['prefix'=>'city'],function()
{
	
	// show all data an data table 
	Route::get('/all','CityController@index')->middleware(['permission:read cities'])->name('get.city.index'); 
	// view form for adding new item 
	Route::get('/add','CityController@add')->middleware(['permission:add cities'])->name('get.city.add');  
	// store data of item 
	Route::post('/store','CityController@store')->middleware(['permission:add cities'])->name('post.city.store'); 
	// view data of specific item  
	Route::get('/edit/{id}','CityController@edit')->middleware(['permission:edit cities'])->name('get.city.edit')->where('id', '[0-9]+'); 
	// update data of specific item 
	Route::put('/update','CityController@update')->middleware(['permission:edit cities'])->name('put.city.update'); 
	// delete data of specific item
	Route::get('/delete/{id}','CityController@delete')->middleware(['permission:delete cities'])->name('get.city.delete')->where('id', '[0-9]+');
	// delete multi  item
	Route::post('/delete/multi','CityController@deleteMulti')->middleware(['permission:delete cities'])->name('post.city.deleteMulti'); 

	// sort elements
	Route::post('/sort','CityController@sort')->middleware(['permission:read cities'])->name('post.city.sort'); 
	// make this item visibile or not  
	Route::get('/visibility/{id}','CityController@visibility')->middleware(['permission:read cities'])->name('get.city.visibility')->where('id', '[0-9]+'); 


	// view data of seo
	Route::get('/seo/{id}','CityController@seo')->middleware(['permission:read cities'])->name('get.city.seo')->where('id', '[0-9]+');
	// update data of seo
	Route::post('/seo/update','CityController@updateSeo')->middleware(['permission:read cities'])->name('post.city.updateSeo'); 
	

});
