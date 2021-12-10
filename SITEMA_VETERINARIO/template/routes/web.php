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

Route::get('/', function () {
    return view('dashboard');
})->middleware('auth');;
Auth::routes();

// Route::get('/','DashboardController@index');
Route::resource('pet-owners','OwnerController');
//Route::post('pet-owners-delete/{dni_propietario}','OwnerController@destroy')->name('pet-owners.DELETE');
Route::resource('animals','AnimalController');
//Route::post('animals-delete/{idAnimal}','AnimalController@destroy')->name('animals.DELETE');

//rutas para crud de ajax

Route::get('especialidades/tabledit', 'EspecialidadController@index');

Route::post('especialidades/tabledit/action', 'EspecialidadController@action')->name('tabledit.action');

Route::get('/especialidades/tabledit/create','EspecialidadController@create')->name('especialidades.create');
//Route::post('/especialidades','EspecialidadController@store')->name('especialidades.store');

//rutas para subida de archivos
Route::get('/upload-file', 'FileUpload@createForm');
Route::post('/upload-file', 'FileUpload@fileUpload')->name('fileUpload');
Route::get('notifications', function () {
    return view('pages.notifications.index');
});
//Route::post('logout', 'Auth\LoginController@logout');
Route::group(['prefix' => 'user-pages'], function(){
    Route::get('login', function () { return view('pages.user-pages.login'); });
    //Route::get('login-2', function () { return view('pages.user-pages.login-2'); });
    Route::get('multi-step-login', function () { return view('pages.user-pages.multi-step-login'); });
    Route::get('register', function () { return view('pages.user-pages.register'); });
    //Route::get('register-2', function () { return view('pages.user-pages.register-2'); });
    //Route::get('lock-screen', function () { return view('pages.user-pages.lock-screen'); });
});

Route::group(['prefix' => 'error-pages'], function(){
    Route::get('error-404', function () { return view('pages.error-pages.error-404'); });
    Route::get('error-500', function () { return view('pages.error-pages.error-500'); });
});

// For Clear cache
Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});

// 404 for undefined routes
Route::any('/{page?}',function(){
    return View::make('pages.error-pages.error-404');
})->where('page','.*');

