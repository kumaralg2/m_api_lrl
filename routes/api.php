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
});
//Simple Routes:
// Route::get('country','Country\CountryController@country');
// Route::get('country/{id}','Country\CountryController@countryByID');
// Route::post('country','Country\CountryController@countrySave');
// Route::put('country/{country}','Country\CountryController@countryUpdate');
// Route::delete('country/{country}','Country\CountryController@countryDelete');
//Validation Rules
/*
Route::get('country','Country\CountryController@country');
Route::get('country/{id}','Country\CountryController@countryByID');
Route::post('country','Country\CountryController@countrySave');
Route::put('country/{id}','Country\CountryController@countryUpdate');
Route::delete('country/{id}','Country\CountryController@countryDelete');
*/
Route::apiResource('country','Country\Country');

Route::prefix('v1')->group(function(){
    Route::post('login', 'Api\AuthController@login');
    Route::post('register', 'Api\AuthController@register');
    Route::group(['middleware' => 'auth:api'], function() {
        Route::get('getUser', 'Api\AuthController@getUser');
        Route::apiResource('country','Country\Country');
    });
});
