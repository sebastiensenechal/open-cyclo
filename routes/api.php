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


// URL API JSON : http://localhost/sebastiensenechal/openclassroom/open-cyclo/public/api/flags
Route::group(['as' => 'api.', 'namespace' => 'Api'], function () {
    Route::get('flags', 'FlagController@index')->name('flags.index');
});
