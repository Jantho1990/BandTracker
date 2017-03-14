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

Route::get('/', 'BandController@index');

Route::get('albums', 'AlbumController@index')->name('albums.all');
Route::get('albums/create', 'AlbumController@create');
Route::post('albums', 'AlbumController@store');
Route::put('albums/{id}/edit', 'AlbumController@edit');
Route::delete('albums/{id}', 'AlbumController@delete');
Route::resource('bands/{band?}/albums', 'AlbumController', [
  'except' => ['store', 'edit', 'delete']
]);

// Albums
//Route::get('bands/{band_id?}/albums')->name('albums.index');

Route::resource('bands', 'BandController');
