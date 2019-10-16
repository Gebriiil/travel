<?php 

//  Country routes
//  
Route::group(['prefix'=>'review'],function()
{
	
	// show all data an data table 
	Route::get('/all','ReviewController@index')->middleware(['review:read'])->name('get.review.index'); 
	// view form for adding new item 
	Route::get('/add','ReviewController@add')->middleware(['review:add'])->name('get.review.add');  
	// store data of item 
	Route::post('/store','ReviewController@store')->middleware(['review:add'])->name('post.review.store'); 
	// view data of specific item  
	Route::get('/edit/{id}','ReviewController@edit')->middleware(['review:edit'])->name('get.review.edit'); 
	// update data of specific item BrandRoutes.php
	Route::put('/update','ReviewController@update')->middleware(['review:edit'])->name('put.review.update'); 
	// delete data of specific item
	Route::get('/delete/{id}','ReviewController@delete')->middleware(['review:delete'])->name('get.review.delete'); 
	// delete multi  item
	Route::post('/delete/multi','ReviewController@deleteMulti')->middleware(['review:delete'])->name('post.review.deleteMulti'); 

	// sort elements
	Route::post('/sort','ReviewController@sort')->middleware(['review:read'])->name('post.review.sort'); 
	// make this item visibile or not  
	Route::get('/visibility/{id}','ReviewController@visibility')->middleware(['review:read'])->name('get.review.visibility'); 



	// view data of seo
	Route::get('/seo/{id}','ReviewController@seo')->middleware(['review:read'])->name('get.review.seo')->where('id', '[0-9]+');
	// update data of seo
	Route::post('/seo/update','ReviewController@updateSeo')->middleware(['review:read'])->name('post.review.updateSeo');

	

});
