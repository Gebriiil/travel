<?php 

//  language routes
//  
Route::group(['prefix'=>'admin'],function()
{
	// show all data an data table 
	Route::get('/all','AdminController@index')->name('get.admin.index'); 
	// view form for adding new item 
	Route::get('/add','AdminController@add')->name('get.admin.add');  
	// store data of item 
	Route::post('/store','AdminController@store')->name('post.admin.store'); 
	// view data of specific item  
	Route::get('/edit/{id}','AdminController@edit')->name('get.admin.edit'); 
	// update data of specific item 
	Route::put('/update','AdminController@update')->name('put.admin.update'); 
	// delete data of specific item
	Route::get('/delete/{id}','AdminController@delete')->name('get.admin.delete'); 
});
