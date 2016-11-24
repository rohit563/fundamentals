<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('/manager', 'ManagerController@index');
Route::get('/admin', 'AdminController@index');
Route::get('/add', 'AddController@index');
Route::get('/profile', 'usercontroller@index');
Route::put('/profile','usercontroller@update');
Route::resource('users','usercontroller');
Route::get('/user', 'usercontroller@view');
// Route::resource('users','AuthController');

Route::get('/election','ElectionsController@index');
Route::post('/election','ElectionsController@store');
Route::post('/election','ElectionsController@create');
Route::get('/election/{id}','ElectionsController@show');
Route::put('/election/{id}','ElectionsController@update');
Route::resource('election','ElectionsController');
Route::resource('candidate','ElectionsController');
Route::resource('election','ManagerController');


Route::get('/user/activation/{token}', 'Auth\AuthController@activateUser')->name('user.activate');