<?php 
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



/*
*
*   route name (1,2,3,4)
* *
* *
* 1 => name of front  (admin or front)
* 2 => type of method  ( get or post or put or ... )
* 3 => name of controller 
* 4 => name of method 
* 
*/


//  for language (  package laravel macamara )
Route::group(
[
	'prefix' => LaravelLocalization::setLocale(),
	'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
],
function()
{
	/** ADD ALL LOCALIZED ROUTES INSIDE THIS GROUP **/

	//  prefix tgat show at url is (adminPnel)
	Route::prefix('adminPanel')->name('admin.')->group(function()
	{
		// authunication ( login or admin )
		Route::get('/login','AuthAdminController@login')->name('get.authadmin.login');
		Route::post('/login','AuthAdminController@do_login')->name('post.authadmin.do_login');

		// logout
		Route::get('/logout','AuthAdminController@logout')->name('get.authadmin.logout');
		// 


		//  admin is auth  ( function adminAuth() => this function return object of admin if he is authunicated ) 
		Route::group(['middleware'=>'admin:admin'],function()
		{
			//  base route after login
			Route::get('/','HomeController@index')->name('get.home.index');

			// get all routs from branches folder 
			foreach (File::allFiles(base_path('routes/admin/branches/')) as $file) 
			{
				// admin. is a first part of any route name 
		        require($file->getPathname());
		    }
			



		});


        Route::group(['prefix'=>'subCategory'],function()
        {

            // show all data an data table
            Route::get('/all','SubCategoryController@index')->name('get.subCategory.index');

            // show all data according parent category
            Route::get('/slice/{id}','SubCategoryController@showSlice')->name('get.subCategory.showSlice');

            // view form for adding new item
            Route::get('/add','SubCategoryController@add')->name('get.subCategory.add');
            // store data of item
            Route::post('/store','SubCategoryController@store')->name('post.subCategory.store');
            // view data of specific item
            Route::get('/edit/{id}','SubCategoryController@edit')->name('get.subCategory.edit');
            // update data of specific item
            Route::put('/update','SubCategoryController@update')->name('put.subCategory.update');
            // delete data of specific item
            Route::get('/delete/{id}','SubCategoryController@delete')->name('get.subCategory.delete');
            // delete multi  item
            Route::post('/delete/multi','SubCategoryController@deleteMulti')->name('post.subCategory.deleteMulti');

            // sort elements
            Route::post('/sort','SubCategoryController@sort')->name('post.subCategory.sort');
            // make this item visibile or not
            Route::get('/visibility/{id}','SubCategoryController@visibility')->name('get.subCategory.visibility');



            // view data of seo
            Route::get('/seo/{id}','SubCategoryController@seo')->name('get.subCategory.seo')->where('id', '[0-9]+');
            // update data of seo
            Route::post('/seo/update','SubCategoryController@updateSeo')->name('post.subCategory.updateSeo');
            Route::get('/add-tags','SubCategoryController@add_tags')->name('post.subcategory.addtag');
            Route::post('/add/tag','SubCategoryController@store_tags')->name('post.subcategory.tag');
            Route::get('/tags','SubCategoryController@tags')->name('post.subcategory.tags');
            Route::get('/edit/tags/{id}','SubCategoryController@edit_tag')->name('get.subcategory.tags.edit');
            Route::post('/update/tags/{id}','SubCategoryController@update_tag')->name('post.subcategory.tags.update');
            Route::get('/delete/tags/{id}','SubCategoryController@delete_tag')->name('get.subcategory.tags.delete');
            Route::post('/delete/tags','SubCategoryController@deleteMultiTags')->name('post.subcategory.tag.deleteMulti');


        });




	});// end our routs 


});





