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

Route::prefix('v1')->group(function() {

    Route::put('colors/{color}/display', 'ColorController@display');
    Route::put('colors/{color}/hide', 'ColorController@hide');

    Route::apiResource('colors', 'ColorController');

    Route::apiResource('pets', 'PetController');
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
