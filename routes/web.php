<?php
// User Belum Login
Route::get('/', 'HomeController@index');



// User sudah Login






// Kuhusus admin
Route::group(['prefix' => 'admin','middleware' => 'admin'],function(){
   Route::get('/', 'AdminController@index')->name('admin');
   Route::resource('/tes','test');

});

// Kuhusus Petugas
Route::group(['prefix' => 'petugas','middleware' => 'Petugas'],function(){
  Route::get('/', 'PetugasController@index')->name('petugas');
});
Auth::routes();
