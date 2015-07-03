<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::group(array('prefix' => 'backend', 'before' => 'auth'), function(){
    Route::get('dashboard', array('as' => 'dashboard', function(){
	   return View::make('backend.index');
    }));
    
    Route::resource('articles', 'ArticlesController');
    Route::resource('categories', 'CategoriesController');
    Route::resource('blocks', 'BlocksController');
});



Route::get('login', function()
{
    return View::make('login');
});

Route::post('login', 'AuthController@postLogin');
Route::get('logout', array('as' => 'logout', 'uses' => 'AuthController@getLogout'));

