<?php

Route::get('/', function () {
    return view('welcome');
})->middleware('guest');

// Administrator Sections
Route::group(['prefix'=>'admin','as'=>'admin.','middleware'=>'administrator'], function(){

	Route::get('/',[
		'as'	=>	'dashboard',
		'uses'	=>	'Admin\AdministratorController@index'
	]);

	Route::resource('role', 'Admin\RoleController');

	Route::resource('user', 'UserController');

	Route::resource('rumah', 'RumahController');

	Route::resource('type-rumah', 'RumahTypeController');

	Route::resource('perumahan', 'PerumahanController');

	Route::get('/application-menus',[
		'as'	=>	'app.menu',
		'uses'	=>	'Admin\MenuController@index'
	]);
});

Route::group(['prefix'=>'user','as'=>'user.'], function(){

	Route::get('/',[
		'as'	=>	'dashboard',
		'uses'	=>	'Customer\CustomerController@index'
	]);

});

Route::get('/rumah', 'RumahController@index')->name('rumah.index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
