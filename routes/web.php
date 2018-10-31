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

Route::get('/', function () {
    return redirect(route('login'));
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/user-profile', 'UserProfileController@index')->name('userprofile');


/*Route::get('user-profile/id/{id}', function($id)
{
    return 'User '.$id;
});*/

Route::get('/user-profile/id/{id}', 'UserProfileController@edit')->name('editprofile');

Route::post('/user-profile/update/{id}', 'UserProfileController@update')->name('updateprofile');
