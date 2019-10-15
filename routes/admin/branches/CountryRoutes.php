<?php 

//  categories routes
//  
Route::group(['prefix'=>'country'],function()
{
	
	// show all data an data table 
	Route::get('/all','CountryController@index')->middleware(['permission:read countries'])->name('get.country.index'); 
	// view form for adding new item 
	Route::get('/add','CountryController@add')->middleware(['permission:add countries'])->name('get.country.add');  
	// store data of item 
	Route::post('/store','CountryController@store')->middleware(['permission:add countries'])->name('post.country.store'); 
	// view data of specific item  
	Route::get('/edit/{id}','CountryController@edit')->middleware(['permission:edit countries'])->name('get.country.edit')->where('id', '[0-9]+'); 
	// update data of specific item 
	Route::put('/update','CountryController@update')->middleware(['permission:edit countries'])->name('put.country.update'); 
	// delete data of specific item
	Route::get('/delete/{id}','CountryController@delete')->middleware(['permission:delete countries'])->name('get.country.delete')->where('id', '[0-9]+');
	// delete multi  item
	Route::post('/delete/multi','CountryController@deleteMulti')->middleware(['permission:delete countries'])->name('post.country.deleteMulti'); 

	// sort elements
	Route::post('/sort','CountryController@sort')->middleware(['permission:read countries'])->name('post.country.sort'); 
	// make this item visibile or not  
	Route::get('/visibility/{id}','CountryController@visibility')->middleware(['permission:read countries'])->name('get.country.visibility')->where('id', '[0-9]+'); 




	// view data of seo
	Route::get('/seo/{id}','CountryController@seo')->middleware(['permission:read countries'])->name('get.country.seo')->where('id', '[0-9]+');
	// update data of seo
	Route::post('/seo/update','CountryController@updateSeo')->middleware(['permission:read countries'])->name('post.country.updateSeo'); 
	

});
