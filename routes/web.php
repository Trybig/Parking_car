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

Route::get('/', 'ClientController@get_all')->name('home');

Route::get('/add', function () {
    return view('add');
})->name('add');

Route::get('/at_parking','ClientController@at_parking')->name('at_parking');

Route::post('/add/submit','ClientController@submit')->name('form-control');

Route::get('/{id}/delete', 'ClientController@delete_client')->name('delete-client');

Route::get('/{id}/update', 'ClientController@update_client')->name('update-client');

Route::post('/{id}/update', 'ClientController@upd_submit')->name('update-submit');

Route::get('/at_parking/{id}/delete_from_parking','ClientController@delete_from_parking')->name('delete_from_parking');

Route::get('/{id}/add_to_park','ClientController@add_to_park')->name('add_to_park');
