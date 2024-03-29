<?php

use Illuminate\Support\Facades\Route;

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




Auth::routes();

Route::group(
    [ 'middleware' => ['auth']],
    function () {
        Route::get('/home', 'HomeController@index')->name('home');
        Route::get('/admin/user', 'UserController@index');
        Route::get('/admin/user/{id}/edit', 'UserController@edit');
        Route::delete('/admin/user/{id}/delete', 'UserController@destroy');
        Route::post('/admin/user/{id}/update', 'UserController@update');
        Route::get('/admin/profile', 'UserController@editProfile');
        Route::post('/admin/profile', 'UserController@updateProfile');
        Route::delete('/admin/jabatan/{id}/delete', 'JabatanController@destroy');
        Route::delete('/admin/bidang/{id}/delete', 'BidangController@destroy');
        
        Route::get('/admin/bidang', 'BidangController@index');
        Route::post('/admin/bidang/store', 'BidangController@store');
        
        Route::get('/user/profile', 'UserController@editProfileUser');
        Route::post('/user/profile', 'UserController@updateProfileUser');
        
        Route::get('/admin/jabatan', 'JabatanController@index');
        Route::post('/admin/jabatan/store', 'JabatanController@store');
        Route::get('/user/laporan', 'FileController@laporanUser');
        Route::post('/user/file', 'FileController@store');
        Route::get('/user/acclaporan', 'FileController@index');
        Route::get('/user/acclaporan/acc/{id}', 'FileController@accLaporan');
        Route::get('/user/acclaporan/download/{path}', 'FileController@retrieveLaporan');
        Route::post('/user/accLaporan/validasi','FileController@validasiLaporan');
        Route::post('/user/accLaporan/tolak','FileController@tolakLaporan');
        Route::delete('/user/laporan/{id}/delete', 'FileController@destroy');
        Route::get('/admin/adminlaporan', 'FileController@laporanAdmin');
        
        
        
        Route::get('/user/acc-laporan-edit/uploads', 'FileController@download_public');
        
        
        Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
        
        
        
        // Route::get('/admin/jabatan/edit/{id}', 'JabatanController@edit');
        
        Route::resource('jabatan', 'JabatanController   '); 
        Route::resource('file', 'FileController'); 
        Route::get('/', function () {
            return view('dashboard');
        });
    });






Route::get('/admin', function () {
    return view('admin.index');
});
// Route::get('/admin/user', function () {
//     // return view('admin.user');
// });
// Route::get('/admin/user/edit', function () {
//     return view('admin.user-edit');
// });
// Route::get('/admin/jabatan', function () {
//     return view('admin.jabatan');
// });
Route::get('/admin/jabatan/add', function () {
    return view('admin.jabatan-add');
});
// Route::get('/admin/bidang', function () {
//     return view('admin.bidang');
// });
Route::get('/admin/bidang/add', function () {
    return view('admin.bidang-add');
});
// Route::get('/admin/profile', function () {
//     return view('admin.profile');
// });


Route::get('/user', function () {
    return view('user.index');
});
Route::get('/user/file', function () {
    return view('user.file');
});
// Route::get('/user/laporan', function () {
//     return view('user.laporan');
// });
// Route::get('/user/acclaporan', function () {
//     return view('user.acc-laporan');
// });
// Route::get('/user/acclaporan/acc', function () {
//     return view('user.acc-laporan-edit');
// });
Route::get('/user/profile', function () {
    return view('user.profile');
});

// Route::get('/login', function () {
//     return view('login');
// });
// Route::get('/register', function () {
//     return view('register');
// });