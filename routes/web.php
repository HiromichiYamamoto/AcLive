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

//Route::get('/', function () {return view('ac/top/index');});

Route::any('/', 'TopController@index')->name('top');

Auth::routes();
Route::any('register', 'Auth\RegisterController@index')->name('register');
Route::any('register/entry', 'Auth\RegisterController@entry')->name('register.entry');
Route::post('register/confirm', 'Auth\RegisterController@confirm')->name('register.input');
Route::post('register/confirm', 'Auth\RegisterController@confirm')->name('register.input');

Route::get('/login/{provider}', 'Auth\SocialAccountController@redirectToProvider');
Route::get('/entry/{provider}/callback', 'Auth\SocialAccountController@handleProviderCallback');
