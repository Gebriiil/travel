<?php 

//  language routes
//  
use Illuminate\Support\Facades\Route;

Route::group(['prefix'=>'language'],function()
{
	
	// show all data an data table 
	Route::get('/all','LanguageController@index')->middleware(['language:read'])->name('get.language.index'); 
	// view form for adding new item 
	Route::get('/add','LanguageController@add')->middleware(['language:add'])->name('get.language.add');  
	// store data of item 
	Route::post('/store','LanguageController@store')->middleware(['language:add'])->name('post.language.store'); 
	// view data of specific item  
	Route::get('/edit/{id}','LanguageController@edit')->middleware(['language:edit'])->name('get.language.edit'); 
	// update data of specific item 
	Route::put('/update','LanguageController@update')->middleware(['language:update'])->name('put.language.update'); 
	// delete data of specific item
	Route::get('/delete/{id}','LanguageController@delete')->middleware(['language:delete'])->name('get.language.delete'); 
	// delete multi  item
	Route::post('/delete/multi','LanguageController@deleteMulti')->middleware(['language:delete'])->name('post.language.deleteMulti'); 

	// sort elements
	Route::post('/sort','LanguageController@sort')->middleware(['language:read'])->name('post.language.sort'); 
	// make this item visibile or not  
	Route::get('/visibility/{id}','LanguageController@visibility')->middleware(['language:read'])->name('get.language.visibility'); 
	

});
