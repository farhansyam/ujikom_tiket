<?php


// Route::get('train/ajax/{id}','AdminController@trainAjax');
// Route::get('station/ajax/{id}','AdminController@stationAjax');
// User Belum Login
Route::get('/', 'HomeController@index');

Route::get('/test','HomeController@test');


// User sudah Login

Route::group(['middleware' => 'auth'],function(){
  Route::get('/profile', 'UserController@profile');

});


Route::group(['prefix' => 'admin','middleware' => 'admin'],function(){
  Route::get('plane/ajax/{id}','PlaneController@planeAjax');
  Route::get('airport/ajax/{id}','AirportController@airportAjax');
   Route::get('/', 'AdminController@index')->name('admin');

   // Jadwal Penerbangan
   Route::resource('schedule_plane', 'PlaneScheduleController');
   //  Bandara
   Route::resource('airport', 'AirportController');
   // Pesawat
   Route::resource('plane', 'PlaneController');

   // Kereta
   Route::resource('train', 'TrainController');

   Route::resource('/tes','test');


Route::get('/user/view', 'UserController@index');
Route::get('/user/search', 'UserController@search');
Route::get('/user/{id}/konfirmasi', 'UserController@konfirmasiUser');
Route::resource('user','UserController');
Route::resource('station', 'TrainStationController');

  //  Route::resource('/users','UserController');




});

// Kuhusus Petugas
Route::group(['prefix' => 'petugas','middleware' => 'Petugas'],function(){
  Route::get('/', 'PetugasController@index')->name('petugas');
});
Auth::routes();


Route::get('/redirect', 'FacebookLoginController@redirect');
Route::get('/callback', 'FacebookLoginController@callback');
