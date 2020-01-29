<?php

use Illuminate\Http\Request;

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

//rotas de autenicação.
Route::post('/register', 'AuthController@register');
Route::post('/login', 'AuthController@login');
Route::post('/logout', 'AuthController@logout');

Route::group(['prefix' => 'users'], function () {
   Route::get('/', 'UserController@index')->name('user.index')->middleware('checkAdmGeneral'); 
});

Route::group(['prefix' => 'students'], function() {
    Route::post('/', 'StudentController@store')->name('student.store');
});

Route::group(['prefix' => 'institutions'], function() {
    Route::get('/', 'InstitutionController@index')->name('institution.index')->middleware('checkAdmGeneral');
    Route::post('/', 'InstitutionController@store')->name('institution.store')->middleware('checkAdmGeneral');
    Route::get('/show/{institution}', 'InstitutionController@show')->name('institution.show')->middleware('checkAdmInstitution');
    Route::put('/update/{institution}', 'InstitutionController@update')->name('institution.update')->middleware('checkAdmInstitution');
    Route::delete('/destroy/{institution}', 'InstitutionController@destroy')->name('institution.destroy')->middleware('checkAdmGeneral');
    Route::get('/search/', 'InstitutionController@search')->name('institution.search')->middleware('checkAdmGeneral');
});

Route::group(['prefix' => 'coordinators'], function(){
    Route::get('/', 'CoordinatorController@index')->name('coordinator.index');
    Route::post('/', 'CoordinatorController@store')->name('coordinator.store');
    Route::get('/show/{coordinator}', 'CoordinatorController@show')->name('coordinator.show');
    Route::put('/update/{coordinator}', 'CoordinatorController@update')->name('coordinator.update');
    Route::delete('/destroy/{coordinator}', 'CoordinatorController@destroy')->name('coordinator.destroy');
});



