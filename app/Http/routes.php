<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::group(['middleware'=>['web']],function(){
	// Authentication Route 
Route::get('auth/login',['as' => 'login','uses' => 'Auth\AuthController@getLogin']);
Route::post('auth/login','Auth\AuthController@postLogin');
Route::get('auth/logout',['as' => 'logout','uses' =>'Auth\AuthController@getLogout']);
//end of login //Rgisteration Route 
Route::get('auth/register','Auth\AuthController@getRegister');
Route::post('auth/register','Auth\AuthController@postRegister');
//end of registeration


// Password Reset Route

Route::get('password/reset/{token?}','Auth\PasswordController@showResetForm'); 
Route::post('password/email','Auth\PasswordController@sendResetLinkEmail');
Route::post('password/reset','Auth\PasswordController@reset');

// end of this Route  

//categories , taqs Route
Route::resource('categories','CategoryController',['except'=>['create']]);
Route::resource('taqs','TaqController',['except'=>['create']]);

Route::get('blog/{slug}',['as'=>'blog.single','uses'=>'PagesController@getSingle'])->where('slug','[\w\d\-\_]+');
Route::get('blog/',['uses'=>'PagesController@getIndex','as'=>'blog.index']);
Route::get('/','blogController@home');
Route::get('about','blogController@about');
Route::get('contact','blogController@contact');
Route::resource('/posts','PostController');

});




