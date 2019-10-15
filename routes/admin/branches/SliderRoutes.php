<?php 

//  Country routes
//  
Route::group(['prefix'=>'slider'],function()
{
	
	// show all data an data table 
	Route::get('/all','SliderController@index')->middleware(['permission:read slider'])->name('get.slider.index'); 
	// view form for adding new item 
	Route::get('/add','SliderController@add')->middleware(['permission:add slider'])->name('get.slider.add');  
	// store data of item 
	Route::post('/store','SliderController@store')->middleware(['permission:add slider'])->name('post.slider.store'); 
	// view data of specific item  
	Route::get('/edit/{id}','SliderController@edit')->middleware(['permission:edit slider'])->name('get.slider.edit'); 
	// update data of specific item BrandRoutes.php
	Route::put('/update','SliderController@update')->middleware(['permission:edit slider'])->name('put.slider.update'); 
	// delete data of specific item
	Route::get('/delete/{id}','SliderController@delete')->middleware(['permission:delete slider'])->name('get.slider.delete'); 
	// delete multi  item
	Route::post('/delete/multi','SliderController@deleteMulti')->middleware(['permission:delete slider'])->name('post.slider.deleteMulti'); 

	// sort elements
	Route::post('/sort','SliderController@sort')->middleware(['permission:read slider'])->name('post.slider.sort'); 
	// make this item visibile or not  
	Route::get('/visibility/{id}','SliderController@visibility')->middleware(['permission:read slider'])->name('get.slider.visibility'); 



	// view data of seo
	Route::get('/seo/{id}','SliderController@seo')->middleware(['permission:read slider'])->name('get.slider.seo')->where('id', '[0-9]+');
	// update data of seo
	Route::post('/seo/update','SliderController@updateSeo')->middleware(['permission:read slider'])->name('post.slider.updateSeo');

	

});
