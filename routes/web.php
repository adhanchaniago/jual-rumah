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

	Route::resource('angsuran','Admin\AngsuranController');

	Route::post('upload-photo','UploadPhotoController@upload')->name('upload.photo');

	Route::resource('order', 'OrderController');

	Route::post('verify-payment', 'Admin\VerifyPaymentController@verify')->name('verify.payment');

	Route::post('reject-payment', 'Admin\VerifyPaymentController@reject')->name('reject.payment');

	Route::get('laporan-confirmed', 'Admin\ReportController@orderConfirmed')->name('report.confirmed');

	Route::get('laporan-notconfirmed', 'Admin\ReportController@notConfirmed')->name('report.notConfirmed');

	Route::get('/application-menus',[
		'as'	=>	'app.menu',
		'uses'	=>	'Admin\MenuController@index'
	]);
});

Route::group(['prefix'=>'user','as'=>'user.','midleware'=>'auth'], function(){

	Route::get('/',[
		'as'	=>	'dashboard',
		'uses'	=>	'Customer\CustomerController@index'
	]);
	
	Route::get('order','Customer\OrderController@index')->name('order.index');

	Route::get('order/{code}','Customer\OrderController@show')->name('order.show');

	Route::post('order','Customer\OrderController@store')->name('order.store');

	Route::get('order/rumah/{id}','Customer\OrderController@create')->name('order.create');

	// Route::get('angsuran/{$order_id}','Customer\AngsuranController@show')->name('angsuran.show');

	Route::resource('angsuran','Customer\AngsuranController')->except(['index']);

	Route::get('angsuran/{kode}/upload', 'Customer\AngsuranController@create')->name('angsuran.create');

});

Route::get('/rumah', 'Customer\RumahController@index')->name('rumah.index');

Route::get('rumah/terjual','Customer\RumahController@sold')->name('rumah.sold');

Route::get('rumah/{id}','Customer\RumahController@show')->name('rumah.show');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
