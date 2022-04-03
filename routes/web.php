<?php


Auth::routes();

//Simpan Route nya dibawah yang sudah dikasih komentar biar rapih hehe
//Route pertama aplikasi dijalankan

Route::get('/', 'ContentController@welcome');

Route::get('/error', function () {
    return view('error');
});




// DAFTAR ROLE
// id 1 = Admin
//    2 = Siswa
//    3 = Guru

//Semua user bisa mengakses halaman home/dashboard
Route::group(['middleware' => ['auth']], function(){
    //Route Home
     Route::get('/home', 'HomeController@index')->name('home');

});

//Hanya bisa diakses Oleh Admin
Route::group(['middleware' => ['auth', 'role: 1']], function(){

    //Route User
    Route::resource('users', UserController::class);

    //Route Mapel
    Route::resource('mapels', MapelController::class);

    //Route Jadwal

    //Route Kelas
    Route::resource('kelas', KelasController::class);

    //Route Siswa
    Route::resource('siswas', SiswaController::class);

    //Route Guru
    Route::resource('gurus', GuruController::class);

    //Route Untuk merubah content
    Route::resource('content', ContentController::class);
});

//Hanya bisa diakses oleh Admin dan Siswa
Route::group(['middleware' => ['auth', 'role: 1, 2']], function(){

    //Profile Siswa
    Route::resource('profileSiswa', ProfileSiswaController::class);

    //Cetak PDF Tabel Siswas\
    Route::get('/cetak_siswa','CetakPdfController@cetakSiswa');

    //Ubah Password

});


//Hanya bisa diakses oleh Admin dan Guru
Route::group(['middleware' => ['auth','role: 1,3']], function(){
    //Profile Guru
    Route::resource('profileGuru', ProfileGuruController::class);

    //Cetak PDF Tabel Guru
    Route::get('/cetak_guru','CetakPdfController@cetakGuru');
});