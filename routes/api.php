<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->prefix('v1')->group(function () {
    Route::get('/admin', function (Request $request) {
        return $request->user();
    });
    Route::delete('room/{room}', 'RoomController@destroy');
});

Route::prefix('v1')->group(function () {
    Route::get('rooms', 'RoomController@index');
    Route::get('room/{room}', 'RoomController@show');
});

Route::get('/about', 'CompanyController@index');
