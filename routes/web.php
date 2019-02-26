<?php
// User Belum Login
Route::get('/', 'HomeController@index');



// User sudah Login

Route::group(['middleware' => 'auth'],function(){
   Route::get('/profile', 'UserController@profile');
   Route::resource('/tes','test');

});




// Kuhusus admin
Route::group(['prefix' => 'admin','middleware' => 'admin'],function(){
   Route::get('/', 'AdminController@index')->name('admin');
   Route::resource('/tes','test');
   Route::get('/transportasi/pesawat','transportasiController@pesawat');
   Route::get('/transportasi/kereta','transportasiController@kereta');
   Route::resource('/transportasi','transportasiController');
   Route::resource('/rute','RuteController');
   Route::resource('/users','UserController');




});

// Kuhusus Petugas
Route::group(['prefix' => 'petugas','middleware' => 'Petugas'],function(){
  Route::get('/', 'PetugasController@index')->name('petugas');
});
Auth::routes();


Route::get('/redirect', 'FacebookLoginController@redirect');
Route::get('/callback', 'FacebookLoginController@callback');
