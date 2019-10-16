<?php 

//  Country routes
//  
Route::group(['prefix'=>'slider'],function()
{
	
	// show all data an data table 
	Route::get('/all','SliderController@index')->middleware(['slider:read'])->name('get.slider.index'); 
	// view form for adding new item 
	Route::get('/add','SliderController@add')->middleware(['slider:add'])->name('get.slider.add');  
	// store data of item 
	Route::post('/store','SliderController@store')->middleware(['slider:add'])->name('post.slider.store'); 
	// view data of specific item  
	Route::get('/edit/{id}','SliderController@edit')->middleware(['slider:edit'])->name('get.slider.edit'); 
	// update data of specific item BrandRoutes.php
	Route::put('/update','SliderController@update')->middleware(['slider:edit'])->name('put.slider.update'); 
	// delete data of specific item
	Route::get('/delete/{id}','SliderController@delete')->middleware(['slider:delete'])->name('get.slider.delete'); 
	// delete multi  item
	Route::post('/delete/multi','SliderController@deleteMulti')->middleware(['slider:delete'])->name('post.slider.deleteMulti'); 

	// sort elements
	Route::post('/sort','SliderController@sort')->middleware(['slider:read'])->name('post.slider.sort'); 
	// make this item visibile or not  
	Route::get('/visibility/{id}','SliderController@visibility')->middleware(['slider:read'])->name('get.slider.visibility'); 



	// view data of seo
	Route::get('/seo/{id}','SliderController@seo')->middleware(['slider:read'])->name('get.slider.seo')->where('id', '[0-9]+');
	// update data of seo
	Route::post('/seo/update','SliderController@updateSeo')->middleware(['slider:read'])->name('post.slider.updateSeo');

	

});
