<?php

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

use App\Http\Controllers\ManagePengeluaranController;
use Illuminate\Support\Facades\Auth;

Auth::routes();

Route::get('/home','HomeController@index');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', function () {
        return redirect(url('/home'));
    });

    //Sumber Pemasukan
    Route::get('/sumber-pemasukan/add', 'SumberPemasukanController@add')->name('sumber.add');

    //Insert
    Route::get('/sumber-pemasukan', 'SumberPemasukanController@index')->name('sumber.pemasukan');
    Route::post('/sumber-pemasukan/add', 'SumberPemasukanController@store')->name('sumber.store');

    //Update Sumber Pemasukan
    Route::get('/sumber-pemasukan/edit/{id}', 'SumberPemasukanController@edit')->name('sumber.edit');
    Route::put('/sumber-pemasukan/edit/{id}', 'SumberPemasukanController@update')->name('sumber.edit');

    //Delete
    Route::delete('/sumber-pemasukan/delete/{id}', 'SumberPemasukanController@delete')->name('sumber.delete');

    //manage pemasukan
    Route::get('/pemasukan', 'ManagePemasukanController@index')->name('manage.pemasukan');
    Route::get('/pemasukan/yajra', 'ManagePemasukanController@yajra')->name('manage.pemasukan.yajra');

    //Insert
    Route::get('/pemasukan/add', 'ManagePemasukanController@add')->name('pemasukan.add');
    Route::post('/pemasukan/add', 'ManagePemasukanController@store')->name('pemasukan.store');

    //Update Pemasukan
    Route::get('/pemasukan/edit/{id}', 'ManagePemasukanController@edit')->name('pemasukan.edit');
    Route::put('/pemasukan/edit/{id}', 'ManagePemasukanController@update')->name('pemasukan.update');
    Route::delete('/pemasukan/delete/{id}', 'ManagePemasukanController@delete')->name('pemasukan.delete');

    //Managemen Pengeluaran
    Route::get('/pengeluaran/', 'ManagePengeluaranController@index')->name('pengeluaran.index');
    Route::get('/pengeluaran/add', 'ManagePengeluaranController@add')->name('pengeluaran.add');

    //Insert
    Route::post('/pengeluaran/add', 'ManagePengeluaranController@store')->name('pengeluaran.store');
    Route::delete('/pengeluaran/delete/{id}','ManagePengeluaranController@delete')->name('pengeluaran.delete');

    //Edit Pengeluaran
    Route::get('/pengeluaran/edit/{id}', 'ManagePengeluaranController@edit')->name('pengeluaran.edit');
    Route::put('/pengeluaran/edit/{id}', 'ManagePengeluaranController@update')->name('pengeluaran.update');

    //Laporan 
    Route::get('/laporan-keuangan/index', 'LaporanController@index')->name('laporan.index');
    Route::get('/laporan-keuangan/cari', 'LaporanController@cari')->name('laporan.cari');
    Route::get('/laporan-keuangan/export-excel/{dari}/{sampai}', 'LaporanController@exportExcel');

    Route::get('/logout', function(){
        \Auth::logout();
        return redirect('login');
    });
});


Route::get('add-user',function(){
    \DB::table('users')->insert([
        'name' => 'Admin',
        'email' => 'admin@gmail.com',
        'password' => bcrypt('admin'),
    ]);
});