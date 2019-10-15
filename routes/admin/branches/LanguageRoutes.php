<?php 

//  language routes
//  
use Illuminate\Support\Facades\Route;

Route::group(['prefix'=>'language'],function()
{
	
	// show all data an data table 
	Route::get('/all','LanguageController@index')->middleware(['permission:read languages'])->name('get.language.index'); 
	// view form for adding new item 
	Route::get('/add','LanguageController@add')->middleware(['permission:add languages'])->name('get.language.add');  
	// store data of item 
	Route::post('/store','LanguageController@store')->middleware(['permission:add languages'])->name('post.language.store'); 
	// view data of specific item  
	Route::get('/edit/{id}','LanguageController@edit')->middleware(['permission:edit languages'])->name('get.language.edit'); 
	// update data of specific item 
	Route::put('/update','LanguageController@update')->middleware(['permission:edit languages'])->name('put.language.update'); 
	// delete data of specific item
	Route::get('/delete/{id}','LanguageController@delete')->middleware(['permission:delete languages'])->name('get.language.delete'); 
	// delete multi  item
	Route::post('/delete/multi','LanguageController@deleteMulti')->middleware(['permission:delete languages'])->name('post.language.deleteMulti'); 

	// sort elements
	Route::post('/sort','LanguageController@sort')->middleware(['permission:read languages'])->name('post.language.sort'); 
	// make this item visibile or not  
	Route::get('/visibility/{id}','LanguageController@visibility')->middleware(['permission:read languages'])->name('get.language.visibility'); 
	

});
