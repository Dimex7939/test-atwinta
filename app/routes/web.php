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

Route::get('/', 'PostController@index')->name('form-add');

Route::post('/add', 'PostController@add');

Route::get('/link/{link}', 'PostController@link');

Route::get('/paste/{paste}', 'PostController@show');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/login/vk', 'VKController@vk')->name('social');

Route::get('/login/vk/redirect', 'VKController@vkRedirect');
