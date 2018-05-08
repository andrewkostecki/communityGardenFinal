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

Route::get('/about', function () {
    return view('about');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/users', 'UsersController@index')->name('users.index');
Route::get('/users/create', 'UsersController@create')->name('users.create');
Route::get('/users/edit/{id}', 'UsersController@edit')->name('users.edit');
Route::post('/users/store', 'UsersController@store')->name('users.store');
Route::post('/users/{id}', 'UsersController@update')->name('users.update');
Route::get('/users/destroy/{id}', 'UsersController@destroy')->name('users.destroy');

Route::get('/rooms', 'RoomsController@index')->name('rooms.index');
Route::get('/rooms/create', 'RoomsController@create')->name('rooms.create');
Route::get('/rooms/edit/{id}', 'RoomsController@edit')->name('rooms.edit');
Route::post('/rooms/store', 'RoomsController@store')->name('rooms.store');
Route::post('/rooms/{id}', 'RoomsController@update')->name('rooms.update');
Route::get('/rooms/destroy/{id}', 'RoomsController@destroy')->name('rooms.destroy');

Route::get('/planttypes', 'PlantTypesController@index')->name('planttypes.index');
Route::get('/planttypes/create', 'PlantTypesController@create')->name('planttypes.create');
Route::get('/planttypes/edit/{id}', 'PlantTypesController@edit')->name('planttypes.edit');
Route::post('/planttypes/store', 'PlantTypesController@store')->name('planttypes.store');
Route::post('/planttypes/{id}', 'PlantTypesController@update')->name('planttypes.update');
Route::get('/planttypes/destroy/{id}', 'PlantTypesController@destroy')->name('planttypes.destroy');

Route::get('/plants', 'PlantsController@index')->name('plants.index');
Route::get('/plants/create', 'PlantsController@create')->name('plants.create');
Route::get('/plants/edit/{id}', 'PlantsController@edit')->name('plants.edit');
Route::post('/plants/store', 'PlantsController@store')->name('plants.store');
Route::post('/plants/{id}', 'PlantsController@update')->name('plants.update');
Route::get('/plants/destroy/{id}', 'PlantsController@destroy')->name('plants.destroy');

Route::get('/systems/edit/{id}', 'SystemsController@edit')->name('systems.edit');
Route::post('/systems/{id}', 'SystemsController@update')->name('systems.update');

Route::get('/notes/{entity}/{entityID}', 'NotesController@index')->name('notes.index');
Route::get('/notes/{entity}/{entityID}/create', 'NotesController@create')->name('notes.create');
Route::get('/note/edit/{id}', 'NotesController@edit')->name('note.edit'); // needed to call this note not notes - notes causes an issue
Route::post('/notes/store', 'NotesController@store')->name('notes.store');
Route::post('/notes/{id}', 'NotesController@update')->name('notes.update');
Route::get('/note/{entity}/{entityID}/destroy/{id}', 'NotesController@destroy')->name('note.destroy');

Route::get('/community', 'CommunityController@index')->name('community.index');

Route::get('/planters', 'PlantersController@index')->name('planters.index');
Route::get('/planters/create', 'PlantersController@create')->name('planters.create');
Route::get('/planters/edit/{id}', 'PlantersController@edit')->name('planters.edit');
Route::post('/planters/store', 'PlantersController@store')->name('planters.store');
Route::post('/planters/{id}', 'PlantersController@update')->name('planters.update');
Route::get('/planters/destroy/{id}', 'PlantersController@destroy')->name('planters.destroy');

Route::get('/soiltypes', 'SoilTypesController@index')->name('soiltypes.index');
Route::get('/soiltypes/create', 'SoilTypesController@create')->name('soiltypes.create');
Route::get('/soiltypes/edit/{id}', 'SoilTypesController@edit')->name('soiltypes.edit');
Route::post('/soiltypes/store', 'SoilTypesController@store')->name('soiltypes.store');
Route::post('/soiltypes/{id}', 'SoilTypesController@update')->name('soiltypes.update');
Route::get('/soiltypes/destroy/{id}', 'SoilTypesController@destroy')->name('soiltypes.destroy');