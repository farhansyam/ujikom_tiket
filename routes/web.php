<?php


// User Belum Login
Route::get('/', 'HomeController@index');
Route::get('/airport','AirportController@cek');
Route::get('/plane','BookingController@plane');
Route::get('/train','BookingController@train');
Route::get('/paymentVerify','BookingController@verify');
Route::post('/kirim','BookingController@kirim')->name('kirim');
Route::post('/cekBC','BookingController@check')->name('cekBC');
Route::post('/search','BookingController@search')->name('search');
Route::get('/order',function()
{
    return redirect('/');
});
Route::post('/order','BookingController@order')->name('order');
// User sudah Login

Route::group(['middleware' => ['auth','verified']],function(){
  Route::get('/profile', 'UserController@profile');
  Route::get('/my_order/{id}', 'UserController@myOrder');
  Route::post('/booking/fixOrder','BookingController@fixOrder');

});

// Admin
Route::group(['prefix' => 'admin','middleware' => 'admin'],function(){
  Route::get('/', 'AdminController@index')->name('admin');
  // Ajax
  Route::get('plane/ajax/{id}','PlaneController@planeAjax');
  Route::get('airport/ajax/{id}','AirportController@airportAjax');
  Route::get('train/ajax/{id}','TrainController@trainAjax');
  Route::get('station/ajax/{id}','TrainStationController@stationAjax');

  // Master DATA
       // Pesawat
       Route::resource('plane', 'PlaneController');
       //  Bandara
       Route::resource('airport', 'AirportController');
       // Jadwal Penerbangan
       Route::resource('schedule_plane', 'PlaneScheduleController');

       // Kereta
       Route::resource('train', 'TrainController');
       // Statisun
       Route::resource('station', 'TrainStationController');
       // Jadwal Kereta
       Route::resource('schedule_train', 'TrainScheduleController');

       // ATM
       Route::resource('atm', 'AtmController');

      Route::get('laporan','laporanController@index')->name('laporan');
      Route::get('laporan/laporanExcel','laporanController@laporanExel')->name('laporan');
      Route::get('laporan/laporanPDF','laporanController@laporanPDF')->name('laporan');

      Route::get('schedule','PlaneScheduleController@index')->name('jadwal');
      //  Data Booking
        Route::resource('booking','BookingController');

        // Test tiket
        Route::get('detail/{id}','BookingController@detail');
        // Kirim Tiket
        Route::get('booking/{id}/{email}/{vehicle}/tiket','BookingController@tiket');

        Route::get('petugas','UserController@petugas')->name('petugas');
      // Partner
       Route::resource('partner', 'PartnerController');
      
// Ujicoba

});





// Kuhusus Petugas
Route::group(['prefix' => 'petugas','middleware' => 'Petugas'],function(){
  Route::get('/', 'PetugasController@index')->name('petugas');
  Route::resource('booking','BookingController');
  Route::get('booking/{id}/{email}/{vehicle}/tiket','BookingController@tiket');
      Route::get('laporan','laporanController@index')->name('laporan');
      Route::get('laporan/laporanExcel','laporanController@laporanExel')->name('laporan');
      Route::get('laporan/laporanPDF','laporanController@laporanPDF')->name('laporan');

});

Auth::routes(['verify' => true]);

// Login Facebook
Route::get('/redirect', 'FacebookLoginController@redirect');
Route::get('/callback', 'FacebookLoginController@callback');
