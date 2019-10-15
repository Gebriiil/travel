<?php 

//  categories routes
//  
Route::group(['prefix'=>'category'],function()
{
	
	// show all data an data table 
	Route::get('/all','CategoryController@index')->middleware(['permission:read categories'])->name('get.category.index'); 
	// view form for adding new item 
	Route::get('/add','CategoryController@add')->middleware(['permission:add categories'])->name('get.category.add');  
	// store data of item 
	Route::post('/store','CategoryController@store')->middleware(['permission:add categories'])->name('post.category.store'); 
	// view data of specific item  
	Route::get('/edit/{id}','CategoryController@edit')->middleware(['permission:edit categories'])->name('get.category.edit')->where('id', '[0-9]+'); 
	// update data of specific item 
	Route::put('/update','CategoryController@update')->middleware(['permission:edit categories'])->name('put.category.update'); 
	// delete data of specific item
	Route::get('/delete/{id}','CategoryController@delete')->middleware(['permission:delete categories'])->name('get.category.delete')->where('id', '[0-9]+');
	// delete multi  item
	Route::post('/delete/multi','CategoryController@deleteMulti')->middleware(['permission:delete categories'])->name('post.category.deleteMulti'); 

	// sort elements
	Route::post('/sort','CategoryController@sort')->middleware(['permission:read categories'])->name('post.category.sort'); 
	// make this item visibile or not  
	Route::get('/visibility/{id}','CategoryController@visibility')->middleware(['permission:read categories'])->name('get.category.visibility')->where('id', '[0-9]+');

    Route::get('/show-in-footer/{id}','CategoryController@showInFooter')->middleware(['permission:read categories'])->name('get.category.showInFooter')->where('id', '[0-9]+');
    Route::get('/hide-from-footer/{id}','CategoryController@hideFromFooter')->middleware(['permission:read categories'])->name('get.category.hideFromFooter')->where('id', '[0-9]+');

    Route::get('/show-in-home/{id}','CategoryController@showInHome')->middleware(['permission:read categories'])->name('get.category.showInHome')->where('id', '[0-9]+');
    Route::get('/hide-from-home/{id}','CategoryController@hideFromHome')->middleware(['permission:read categories'])->name('get.category.hideFromHome')->where('id', '[0-9]+');



	// view data of seo
	Route::get('/seo/{id}','CategoryController@seo')->middleware(['permission:read categories'])->name('get.category.seo')->where('id', '[0-9]+');
	// update data of seo
	Route::post('/seo/update','CategoryController@updateSeo')->middleware(['permission:read categories'])->name('post.category.updateSeo');

    Route::get('/sub-categories', 'CategoryController@childs')->middleware(['permission:read categories'])->name('ajax.get.category.sub');

});
