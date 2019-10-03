<?php 

//  language routes
//  
use Illuminate\Support\Facades\Route;

Route::group(['prefix'=>'language'],function()
{
	
	// show all data an data table 
	Route::get('/all','LanguageController@index')->name('get.language.index'); 
	// view form for adding new item 
	Route::get('/add','LanguageController@add')->name('get.language.add');  
	// store data of item 
	Route::post('/store','LanguageController@store')->name('post.language.store'); 
	// view data of specific item  
	Route::get('/edit/{id}','LanguageController@edit')->name('get.language.edit'); 
	// update data of specific item 
	Route::put('/update','LanguageController@update')->name('put.language.update'); 
	// delete data of specific item
	Route::get('/delete/{id}','LanguageController@delete')->name('get.language.delete'); 
	// delete multi  item
	Route::post('/delete/multi','LanguageController@deleteMulti')->name('post.language.deleteMulti'); 

	// sort elements
	Route::post('/sort','LanguageController@sort')->name('post.language.sort'); 
	// make this item visibile or not  
	Route::get('/visibility/{id}','LanguageController@visibility')->name('get.language.visibility'); 
	

});
