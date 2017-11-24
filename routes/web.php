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

use Illuminate\Http\Request;

Route::get('/menu', 'MenuController@index')->name('menu');
Auth::routes();
Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index')->name('home');

Route::get('admin', 'AdminController@admin');

Route::get('user/profile/{id}', ['as' => 'user.profile', 'uses' => 'UserController@profile', 'middleware' => 'auth']);

Route::post('user/edit/avatar', 'UserController@updateAvatar')->name('user.update.avatar');

Route::post('user/editProfile', 'UserController@editProfile')->name('user.edit.profile');

Route::get('product/{id}', 'ProductController@detail')->name('product.detail');
// login facebook
Route::get('login/facebook', 'Auth\LoginController@redirectToProvider')->name('facebook');
Route::get('login/facebook/callback', 'Auth\LoginController@handleProviderCallback');

//API
Route::group(['prefix' => 'api/v1'], function () {
    Route::get('foods', 'ProductController@getdata_food');
    Route::get('drinks', 'ProductController@getdata_drink');
    Route::get('all_foods', 'ProductController@all_food');
    Route::get('all_drinks', 'ProductController@all_drink');
    // food
    Route::get('delete_food/{id}','ProductController@delete_food');
    Route::post('update_food/{id}','ProductController@update_food');
    Route::post('create_food','ProductController@create_food');
    // drink
});
// Admin
Route::group(['prefix' => 'admin'], function () {
    Route::get('home', 'AdminController@home')->name('admin_home');
    Route::get('manage_food', 'AdminController@manage_food')->name('manage_food');
    Route::get('manage_drink', 'AdminController@manage_drink')->name('manage_drink');
    Route::get('manage_customer', 'AdminController@manage_customer');
});

