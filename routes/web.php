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
Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', [
	'as' => 'index',
	'uses' => 'HomeController@index'
]);


Auth::routes();

Route::get('/home', 'HomeController@index');


//Route::resource('categories', 'CategoryController');

//Route::resource('users', 'UserController');


Route::resource('users', 'UserController');

Route::resource('categories', 'CategoryController');

Route::resource('articles', 'ArticleController');

Route::resource('keywords', 'KeywordController');











Route::resource('newsletters', 'NewsletterController');