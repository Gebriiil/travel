<?php 

//  Country routes
//  
Route::group(['prefix'=>'review'],function()
{
	
	// show all data an data table 
	Route::get('/all','ReviewController@index')->middleware(['permission:read reviews'])->name('get.review.index'); 
	// view form for adding new item 
	Route::get('/add','ReviewController@add')->middleware(['permission:add reviews'])->name('get.review.add');  
	// store data of item 
	Route::post('/store','ReviewController@store')->middleware(['permission:add reviews'])->name('post.review.store'); 
	// view data of specific item  
	Route::get('/edit/{id}','ReviewController@edit')->middleware(['permission:edit reviews'])->name('get.review.edit'); 
	// update data of specific item BrandRoutes.php
	Route::put('/update','ReviewController@update')->middleware(['permission:edit reviews'])->name('put.review.update'); 
	// delete data of specific item
	Route::get('/delete/{id}','ReviewController@delete')->middleware(['permission:delete reviews'])->name('get.review.delete'); 
	// delete multi  item
	Route::post('/delete/multi','ReviewController@deleteMulti')->middleware(['permission:delete reviews'])->name('post.review.deleteMulti'); 

	// sort elements
	Route::post('/sort','ReviewController@sort')->middleware(['permission:read reviews'])->name('post.review.sort'); 
	// make this item visibile or not  
	Route::get('/visibility/{id}','ReviewController@visibility')->middleware(['permission:read reviews'])->name('get.review.visibility'); 



	// view data of seo
	Route::get('/seo/{id}','ReviewController@seo')->middleware(['permission:read reviews'])->name('get.review.seo')->where('id', '[0-9]+');
	// update data of seo
	Route::post('/seo/update','ReviewController@updateSeo')->middleware(['permission:read reviews'])->name('post.review.updateSeo');

	

});
