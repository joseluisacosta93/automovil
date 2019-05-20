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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/selectDeleteClient', 'ClientController@showForDelete');
Route::get('/storeClient', 'ClientController@store');
Route::get('/createClient', 'ClientController@createClient');
Route::get('/updateClient', 'ClientController@update');
Route::post('/create', 'ClientController@create');
Route::post('/editClient', 'ClientController@edit');
Route::post('/deleteClient', 'ClientController@deleteClient');
Route::get('/crearPDF', 'ClientController@crearPDF');
Route::get('/reportsClients', 'ClientController@reports');
Route::get('/findClients', 'ClientController@find');
