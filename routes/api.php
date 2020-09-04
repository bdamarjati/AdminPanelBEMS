<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// API Route User
Route::get('getUser','UserController@getUser');
Route::get('user/edit/{id}','UserController@edit');
Route::get('user/info/{id}','UserController@info');

// API Route Fakultas
Route::get('getFakultas','FakultasController@getFakultas');
Route::get('fakultas/edit/{id}','FakultasController@edit');

// API Route Gedung
Route::get('getBuilding','BuildingController@getBuilding');
Route::get('gedung/edit/{id}','BuildingController@edit');
Route::get('gedung/info/{id}','BuildingController@info');

// API Route Lantai
Route::get('getLantai','LantaiController@getLantai');
Route::get('lantai/edit/{id}','LantaiController@edit');
Route::get('lantai/info/{id}','LantaiController@info');

// API Route Ruang
Route::get('getRuang','RuangController@getRuang');
Route::get('ruang/edit/{id}','RuangController@edit');
Route::get('ruang/info/{id}','RuangController@info');

//API Route Device
Route::get('getDevice','DeviceController@getDevice');
Route::get('device/edit/{id}','DeviceController@edit');
Route::get('device/info/{id}','DeviceController@info');

// API Route Relation
Route::get('getRelation','RelationController@getRelation');
