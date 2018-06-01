<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::prefix('manage')->middleware('role:doctor|nurse')->group(function (){
	Route::get('/', 'ManageController@index');
	Route::get('/dashboard', 'ManageController@dashboard')->name('manage.dashboard');
	Route::resource('/users', 'UserController');
	Route::resource('/patients', 'PatientController');
	Route::resource('/appointments', 'AppointmentController');
	Route::resource('/permissions', 'PermissionController');
	Route::resource('/roles', 'RoleController');
	Route::resource('/profile', 'ProfileController');
});

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');
