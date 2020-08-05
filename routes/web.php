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



Auth::routes();
Route::group(['middleware' => ['auth']], function(){
Route::get('/', function () {
    return view('dashboard');
});
Route::get('iotmasuk/datatable','IotMasukController@datatable')->name('table.iotmasuk');
Route::get('iotselesai/datatable','IotSelesaiController@datatable')->name('table.iotselesai');
Route::get('iotkeluar/datatable','IotKeluarController@datatable')->name('table.iotkeluar');
Route::get('srsmasuk/datatable','SrsMasukController@datatable')->name('table.srsmasuk');
Route::get('srsselesai/datatable','SrsSelesaiController@datatable')->name('table.srsselesai');
Route::get('srskeluar/datatable','SrsKeluarController@datatable')->name('table.srskeluar');
Route::get('workcenter/datatable','WorkcenterController@datatable')->name('table.workcenter');
Route::get('plant/datatable','PlantController@datatable')->name('table.plant');
Route::get('deptiot/datatable','DeptIotController@datatable')->name('table.deptiot');
Route::get('deptsrs/datatable','DeptSrsController@datatable')->name('table.deptsrs');
Route::get('jenishasiliot/datatable','JenisHasilIotController@datatable')->name('table.jenis_hasil_iot');
Route::get('jenishasilsrs/datatable','JenisHasilSrsController@datatable')->name('table.jenis_hasil_srs');
Route::get('tujuaniot/datatable','TujuanIotController@datatable')->name('table.tujuan_iot');
Route::get('tujuansrs/datatable','TujuanSrsController@datatable')->name('table.tujuan_srs');
Route::get('transaksi/caribarang','TransaksiController@caribarang')->name('caribarang');
Route::post('transaksi/pilihbarang','TransaksiController@pilihbarang')->name('pilihbarang');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('perbulan','TransaksiController@perbulan')->name('perbulan');
Route::get('pertahun','TransaksiController@pertahun')->name('pertahun');
Route::get('highbarang','TransaksiController@highbarang')->name('highbarang');
Route::resource('iotmasuk','IotMasukController');
Route::resource('iotkeluar','IotKeluarController');
Route::resource('iotselesai','IotSelesaiController');
Route::resource('srsmasuk','SrsMasukController');
Route::resource('srsselesai','SrsSelesaiController');
Route::resource('srskeluar','SrsKeluarController');
Route::resource('workcenter','WorkcenterController');
Route::resource('plant','PlantController');
Route::resource('deptiot','DeptIotController');
/* Route::resource('deptsrs','DeptSrsController'); */
Route::resource('jenishasiliot','JenisHasilIotController');
/* Route::resource('jenishasilsrs','JenisHasilSrsController'); */
Route::resource('tujuaniot','TujuanIotController');
Route::resource('transaksi','TransaksiController');
/* Route::resource('tujuansrs','TujuanSrsController'); */
Route::resource('keranjang','KeranjangController');
Route::post('keranjang/updateqty', 'KeranjangController@updateqty')->name('updateqty');
Route::post('keranjang/hapus','KeranjangController@hapus')->name('keranjang.hapus');
Route::post('keranjang/cekqty','KeranjangController@cekqty')->name('keranjang.cekqty');
Route::post('transaksi/selesai','TransaksiController@selesai')->name('keranjang.selesai');

});