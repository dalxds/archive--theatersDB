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


Route::middleware('auth')->group(function() {
    Route::get('/EtairiaParagwgis/{id}', 'Api\EtairiaParagwgis@show');

    Route::post('/TheatrikiParagwgi/store', 'Api\TheatrikiParagwgi@store');

    Route::post('/TheatrikiParagwgi/{paragwgi_id}/Parastasi/store', 'Api\Parastasi@store');
});
