<?php 

//  Settings routes
//  
use Illuminate\Support\Facades\Route;

Route::group(['prefix'=>'settings'],function()
{
	
	// view form for editing base settings
	Route::get('/base','SettingsController@base')->middleware(['setting'])->name('get.settings.base');  
	// update settings
	Route::post('/base/update','SettingsController@updateBase')->middleware(['setting'])->name('post.settings.updateBase'); 
	// view data of seo
	Route::get('/seo','SettingsController@seo')->middleware(['setting'])->name('get.settings.seo'); 
	// update data of seo
	Route::post('/seo/update','SettingsController@updateSeo')->middleware(['setting'])->name('post.settings.updateSeo'); 


// view data of about us page
    Route::get('/aboutus','SettingsController@aboutus')->middleware(['setting'])->name('get.settings.aboutus');
    // update data of about us page
    Route::post('/aboutus/update','SettingsController@updateaboutus')->middleware(['setting'])->name('post.settings.updateaboutus');



	Route::get('/site/content','SettingsController@siteContent')->middleware(['setting'])->name('get.settings.siteContent');
    Route::post('/setting/site-content','SettingsController@updateSiteContent')->middleware(['setting'])->name('post.settings.updateSiteContent');




});
