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

Route::get('/change-password', 'ChangePasswordController@index')->name('changepassword');

Route::patch('/change-password/update/{id}', 'ChangePasswordController@update')->name('changepassword.update');

/*Route::get('user-profile/id/{id}', function($id)
{
    return 'User '.$id;
});*/

// Route for user profile
Route::get('/user-profile', 'UserProfileController@index')->name('userprofile');

Route::get('/user-profile/id/{id}', 'UserProfileController@edit')->name('editprofile.edit');

Route::post('/user-profile/update/{id}', 'UserProfileController@update')->name('updateprofile.update');

// Route for leads

Route::get('/leads', 'LeadController@index')->name('lead');
Route::get('/leads/create', 'LeadController@create')->name('createlead');
Route::post('/leads/store', 'LeadController@store')->name('createlead.store');
Route::get('/leads/edit/id/{id}', 'LeadController@edit')->name('createlead.edit');
Route::patch('/leads/update/{id}', 'LeadController@update')->name('createlead.update');
Route::get('/leads/assign/id/{id}', 'LeadController@assign')->name('assignlead');
Route::patch('/leads/update-assign/{id}', 'LeadController@updateAssign')->name('assignlead.updateAssign');
Route::get('/leads/lead-details/id/{id}', 'LeadController@leadDetails')->name('leaddetails.leadDetails');

Route::get('/leads/add-new-notes/id/{id}', 'LeadController@addNewNotes')->name('addnewnoteslead');
Route::post('/leads/store-notes/id/{id}', 'LeadController@storeNotes')->name('addnewnoteslead.storeNotes');

// Route for clients

Route::get('/clients', 'ClientController@index')->name('client');
Route::get('/clients/create', 'ClientController@create')->name('createclient');
Route::post('/clients/store', 'ClientController@store')->name('createclient.store');
Route::get('/clients/edit/id/{id}', 'ClientController@edit')->name('createclient.edit');
Route::patch('/clients/update/{id}', 'ClientController@update')->name('ceateclient.update');

Route::get('/clients/client-details/id/{id}', 'ClientController@clientDetails')->name('clientdetails.clientDetails');

Route::get('/clients/add-new-notes/id/{id}', 'ClientController@addNewNotes')->name('addnewnotes');
Route::post('/clients/store-notes/id/{id}', 'ClientController@storeNotes')->name('addnewnotes.storeNotes');



// Route for tasks
Route::get('/tasks', 'TaskController@index')->name('task');
Route::get('/tasks/create', 'TaskController@create')->name('createtask');
Route::post('/tasks/store', 'TaskController@store')->name('createtask.store');
Route::get('/tasks/edit/id/{id}', 'TaskController@edit')->name('createtask.edit');
Route::patch('/tasks/update/{id}', 'TaskController@update')->name('createtask.update');
Route::delete('/tasks/delete/{id}', 'TaskController@destroy')->name('createtask.delete');