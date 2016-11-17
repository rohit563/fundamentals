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
Route::get('/add', 'AddController@index');
Route::get('/profile', 'usercontroller@index');
Route::put('/profile','usercontroller@update');
Route::resource('users','usercontroller');
// Route::resource('users','AuthController');
Route::resource('/elections','ElectionsController');
Route::get('/elections','ElectionsController@index');
Route::post('/elections','ElectionsController@show');
// Route::get('/elections', array('uses' => 'ElectionsController@index', 'as' => 'elections'));
// Route::get('protected', ['middleware' => ['auth', 'manager'], function() {
//     return "this page requires that you be logged in and a Manager";
// }]);


Route::get('/user/activation/{token}', 'Auth\AuthController@activateUser')->name('user.activate');
