<?php

use Illuminate\Support\Facades\Route;
use App\Controllers\VacunasController;
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
    return view('welcome');
});
//Route::get('vacunas', 'VacunasController@index');
Route::resource('vacunas','VacunasController');

//Route::get('/vacunas/create', 'VacunasController@create')->name('vacunas.create');
//Route::post('/vacunas/store', 'VacunasController@store')->name('vacunas.store');

//Route::get('/vacunas/store/{id_vacuna}', 'VacunasController@edit')->name('vacunas.edit');
//Route::post('/vacunas/update/{id_vacuna}', 'VacunasController@update')->name('vacunas.update');

Route::post('/vacunas/eliminar_ajax/{id_vacuna}', 'VacunasController@destroy_ajax')->name('vacunas.eliminar_ajax');


//Route::get('/vacunas', 'App\Http\Controllers\VacunasController@index');
//Route::get('/vacunas', [VacunasController::class,'index']);
