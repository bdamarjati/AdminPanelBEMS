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

Route::get('/', function () {
    return redirect()->to('login');
})->name('login');
Route::get('login','LoginController@index')->name('login');

Route::middleware('superadminRole')->group(function(){
    // Dashboard Route
    Route::get('dashboard','AdminController@index')->name('dashboard/admin');
    // Admin Route
    Route::get('changeAdminPassword','AdminController@changePassword')->name('changeAdminPassword');
    Route::post('updateAdminPassword','AdminController@updatePassword')->name('updateAdminPassword');
    // Users Route
	Route::get('users','UserController@index');
	Route::post('user/add','UserController@store')->name('storeUser');
	Route::post('user/update/{id}','UserController@update')->name('EditUser');
	Route::get('user/reset/{id}','UserController@reset')->name('ResetUser');
	Route::get('user/delete/{id}','UserController@delete')->name('DeleteUser');
    // Fakultas Route
	Route::get('fakultas','FakultasController@index');
	Route::post('fakultas/add','FakultasController@store')->name('storeFakultas');
	Route::post('fakultas/update/{id}','FakultasController@update')->name('EditFakultas');
    Route::get('fakultas/delete/{id}','FakultasController@delete')->name('DeleteFakultas');
    // Gedung Route
	Route::get('gedung','BuildingController@index');
	Route::post('gedung/add','BuildingController@store')->name('storeGedung');
	Route::post('gedung/update/{id}','BuildingController@update')->name('EditGedung');
    Route::get('gedung/delete/{id}','BuildingController@delete')->name('DeleteGedung');
    // Lantai Route
	Route::get('lantai','LantaiController@index');
	Route::post('lantai/add','LantaiController@store')->name('storeLantai');
	Route::post('lantai/update/{id}','LantaiController@update')->name('EditLantai');
    Route::get('lantai/delete/{id}','LantaiController@delete')->name('DeleteLantai');
    // Ruang Route
	Route::get('ruang','RuangController@index');
	Route::post('ruang/add','RuangController@store')->name('storeRuang');
	Route::post('ruang/update/{id}','RuangController@update')->name('EditRuang');
    Route::get('ruang/delete/{id}','RuangController@delete')->name('DeleteRuang');
    // Devices Route
	Route::get('devices','DeviceController@index');
	Route::post('device/add','DeviceController@store')->name('storeDevice');
	Route::post('device/update/{id}','DeviceController@update')->name('EditDevice');
    Route::get('device/delete/{id}','DeviceController@delete')->name('DeleteDevice');
    // Data Relations Route
	Route::get('relation','RelationController@index');
});
/*
Route::middleware('adminRole')->group(function(){
    // Dashboard Route
    Route::get('dashboard','AdminController@index')->name('dashboard/user');
    // Admin Route
    Route::get('changeAdminPassword','AdminController@changePassword')->name('changeAdminPassword');
    Route::post('updateAdminPassword','AdminController@updatePassword')->name('updateAdminPassword');
    // Users Route
	Route::get('users','UserController@index');
    // Fakultas Route
	Route::get('fakultas','FakultasController@index');
    // Gedung Route
	Route::get('gedung','BuildingController@index');
    // Lantai Route
	Route::get('lantai','LantaiController@index');
    // Ruang Route
	Route::get('ruang','RuangController@index');
    // Devices Route
	Route::get('devices','DeviceController@index');
    // Data Relations Route
	Route::get('relation','RelationController@index');
});*/

Route::post('loginData','LoginController@login')->name('loginData');
Route::get('logout','LoginController@logout')->name('logout');
