<?php 

//  Country routes
//  
Route::group(['prefix'=>'review'],function()
{
	
	// show all data an data table 
	Route::get('/all','ReviewController@index')->name('get.review.index'); 
	// view form for adding new item 
	Route::get('/add','ReviewController@add')->name('get.review.add');  
	// store data of item 
	Route::post('/store','ReviewController@store')->name('post.review.store'); 
	// view data of specific item  
	Route::get('/edit/{id}','ReviewController@edit')->name('get.review.edit'); 
	// update data of specific item BrandRoutes.php
	Route::put('/update','ReviewController@update')->name('put.review.update'); 
	// delete data of specific item
	Route::get('/delete/{id}','ReviewController@delete')->name('get.review.delete'); 
	// delete multi  item
	Route::post('/delete/multi','ReviewController@deleteMulti')->name('post.review.deleteMulti'); 

	// sort elements
	Route::post('/sort','ReviewController@sort')->name('post.review.sort'); 
	// make this item visibile or not  
	Route::get('/visibility/{id}','ReviewController@visibility')->name('get.review.visibility'); 



	// view data of seo
	Route::get('/seo/{id}','ReviewController@seo')->name('get.review.seo')->where('id', '[0-9]+');
	// update data of seo
	Route::post('/seo/update','ReviewController@updateSeo')->name('post.review.updateSeo');

	

});
