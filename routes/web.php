<?php


// User Belum Login
Route::get('/', 'HomeController@index');

Route::get('/test','HomeController@test');

Route::get('/airport','AirportController@cek');
Route::get('/airport','AirportController@cek');
Route::get('/plane','BookingController@plane');
Route::post('/search','BookingController@search')->name('search');
Route::post('/order','BookingController@order')->name('order');
// User sudah Login

Route::group(['middleware' => 'auth'],function(){
  Route::get('/profile', 'UserController@profile');

});

// Admin
Route::group(['prefix' => 'admin','middleware' => 'admin'],function(){
  // Ajax
  Route::get('plane/ajax/{id}','PlaneController@planeAjax');
  Route::get('airport/ajax/{id}','AirportController@airportAjax');
  Route::get('train/ajax/{id}','TrainController@trainAjax');
  Route::get('station/ajax/{id}','TrainStationController@stationAjax');

       Route::get('/', 'AdminController@index')->name('admin');
       // Pesawat
       Route::resource('plane', 'PlaneController');
       // Jadwal Penerbangan
       Route::resource('airport', 'AirportController');
       //  Bandara
       Route::resource('schedule_plane', 'PlaneScheduleController');

       // Kereta
       Route::resource('train', 'TrainController');
       // Statisun
       Route::resource('station', 'TrainStationController');
       // Jadwal Kereta
       Route::resource('schedule_train', 'TrainScheduleController');

       Route::resource('/tes','test');

      //  Data Booking
        Route::get('booking','BookingController@index');

// Ujicoba
Route::get('/user/view', 'UserController@index');
Route::get('/user/search', 'UserController@search');
Route::get('/user/{id}/konfirmasi', 'UserController@konfirmasiUser');
Route::resource('user','UserController');

  //  Route::resource('/users','UserController');




});

// Kuhusus Petugas
Route::group(['prefix' => 'petugas','middleware' => 'Petugas'],function(){
  Route::get('/', 'PetugasController@index')->name('petugas');
});
Auth::routes();


Route::get('/redirect', 'FacebookLoginController@redirect');
Route::get('/callback', 'FacebookLoginController@callback');
