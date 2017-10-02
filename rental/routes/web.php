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

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/opportunities', 'OpportunityController@index');
Route::get('/opportunities/{id}/edit', 'OpportunityController@edit');
Route::get('/opportunities/create', 'OpportunityController@create');
Route::post('/opportunities/create', 'OpportunityController@store');
Route::get('/transports', 'TransportController@index');
Route::get('/transports/{id}/edit', 'TransportController@edit');