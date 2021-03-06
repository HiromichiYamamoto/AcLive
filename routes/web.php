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

Route::any('/', 'TopController@index')->name('top');

Auth::routes();
Route::any('register', 'Auth\RegisterController@index')->name('register');
//Route::any('register/entry', 'Auth\RegisterController@entry')->name('register.entry');
Route::post('register/confirm', 'Auth\RegisterController@confirm')->name('register.input');
Route::post('register/confirm', 'Auth\RegisterController@confirm')->name('register.input');

//Line
Route::get('login/line', 'Auth\SocialController@getLineAuth');
Route::get('entry/line', 'Auth\SocialController@getLineAuthCallback');
//facebook
//Route::get('/login/facebook', 'Auth\SocialController@getFacebookAuth');
//Route::get('/login/facebook/callback', 'Auth\SocialController@getFacebookAuthCallback');
//logout
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

//profile
Route::any('mypage', 'MypageController@index')->name('mypage');
Route::any('mypage/input', 'MypageController@input')->name('mypage.input');
Route::post('mypage/complete', 'MypageController@complete')->name('mypage/complete');
Route::get('/upload/photo/user/{id}/avatar/{fileName}',          'PhotoController@userAvatar')->name('photo.userAvatar')->where('id', '[0-9]+');
Route::post('profile/changeAvatar','ProfileController@changeAvatar')->name('profile/changeAvatar');

Route::get('/local/user/{id}/avatar/{fileName}', 'PhotoController@userAvatar')->name('userAvatar')->where('id', '[0-9]+');

// json
Route::post('image/upload','ImageController@upload')->name('image/upload');
