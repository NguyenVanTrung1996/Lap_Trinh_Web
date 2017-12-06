<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
    
Route::group(['prefix' => 'api/v1'], function () {
Route::get('foods','ProductController@getdata_food');
Route::get('drinks','ProductController@getdata_drink');
// Route::get('delete_customer/{id}',function($id){
// 	return App\Customer::destroy($id);
// });
// Route::get('delete_food/{id}',function($id){
// 	return App\Product::destroy($id);
// });
// Route::get('delete_drink/{id}',function($id){
// 	return App\Product::destroy($id);
// });
});

});
