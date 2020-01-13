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



Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

// Resource TheatrikiParagwgi

Route::get('/TheatrikiParagwgi/create', 'Api\TheatrikiParagwgi@create')
    ->name('TheatrikiParagwgi.create');

Route::get('/TheatrikiParagwgi/own', 'Api\TheatrikiParagwgi@index_own')
    ->name('TheatrikiParagwgi.index_own');

Route::get('/TheatrikiParagwgi/{id}', 'Api\TheatrikiParagwgi@show')
    ->name('TheatrikiParagwgi.show');

// Resource Sintelestis

Route::get('/Sintelestis/{id}', 'Sintelestis@show')
    ->name('Sintelestis.show');

// Resource Theatro

Route::get('/Theatro/{id}', 'Theatro@show')
    ->name('Theatro.show');


// Resource Parastasi

Route::get('/TheatrikiParagwgi/{paragwgi_id}/Parastasi/create', 'Parastasi@create')
    ->name('Parastasi.create');

Route::get('/Parastasi/{id}', 'Parastasi@show')
    ->name('Parastasi.show');

// Resource Eisitirio

Route::post('/Parastasi/{parastasi_id}/Eisitirio/store', 'Eisitirio@store')
    ->name('Eisitirio.checkin');

// Resource Theatis

Route::get('/Theatis/{id}', 'Theatis@show')
    ->name('Theatis.show');

Route::post('/Theatis/{id}/update', 'Theatis@update')
    ->name('Theatis.update');

Route::get('TheatrikiParagwgi/{id}/Axiologisi/new', 'Axiologisi@create')
    ->name('Axiologisi.create');

Route::post('TheatrikiParagwgi/{id}/Axiologisi/new', 'Axiologisi@store')
    ->name('Axiologisi.store');

Route::get('TheatrikiParagwgi/{id}/Sintelestes/new', 'Api\TheatrikiParagwgi@addSintelestisForm')
    ->name('TheatrikiParagwgi.addSintelestisForm');

Route::post('TheatrikiParagwgi/{id}/Sintelestes/new', 'Api\TheatrikiParagwgi@addSintelestis')
    ->name('TheatrikiParagwgi.addSintelestis');

Route::post('TheatrikiParagwgi/{id}/Sintelestes/{sintelestis_id}/remove', 'Api\TheatrikiParagwgi@removeSintelestis')
    ->name('TheatrikiParagwgi.removeSintelestis');
