<?php 

//  Country routes
//  
Route::group(['prefix'=>'brand'],function()
{
	
	// show all data an data table 
	Route::get('/all','BrandController@index')->name('get.brand.index'); 
	// view form for adding new item 
	Route::get('/add','BrandController@add')->name('get.brand.add');  
	// store data of item 
	Route::post('/store','BrandController@store')->name('post.brand.store'); 
	// view data of specific item  
	Route::get('/edit/{id}','BrandController@edit')->name('get.brand.edit'); 
	// update data of specific item 
	Route::put('/update','BrandController@update')->name('put.brand.update'); 
	// delete data of specific item
	Route::get('/delete/{id}','BrandController@delete')->name('get.brand.delete'); 
	// delete multi  item
	Route::post('/delete/multi','BrandController@deleteMulti')->name('post.brand.deleteMulti'); 

	// sort elements
	Route::post('/sort','BrandController@sort')->name('post.brand.sort'); 
	// make this item visibile or not  
	Route::get('/visibility/{id}','BrandController@visibility')->name('get.brand.visibility'); 


	// view data of seo
	Route::get('/seo/{id}','BrandController@seo')->name('get.brand.seo')->where('id', '[0-9]+');
	// update data of seo
	Route::post('/seo/update','BrandController@updateSeo')->name('post.brand.updateSeo'); 
	

});