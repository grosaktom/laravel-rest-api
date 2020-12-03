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



// Route::group(['middleware' => ['cors']], function () {

// });

Route::middleware('auth:api')->group(function () {
	Route::post('/logout', 'App\Http\Controllers\Auth\ApiAuthController@logout')->name('api.logout');
});
Route::group(['middleware' => 'auth.basic'], function () {
   
});


Route::get('contacts', 'App\Http\Controllers\ContactController@index');
Route::get('contacts/{id}', 'App\Http\Controllers\ContactController@show');
Route::post('contacts', 'App\Http\Controllers\ContactController@store');
Route::put('contacts/{id}', 'App\Http\Controllers\ContactController@update');
Route::delete('contacts/{id}', 'App\Http\Controllers\ContactController@destroy');




Route::post('/login', 'App\Http\Controllers\Auth\ApiAuthController@login')->name('api.login');
Route::post('/register', 'App\Http\Controllers\Auth\ApiAuthController@register')->name('api.register');



Route::post('/', 'App\Http\Controllers\Api@index')->name('api');
Route::get('/', 'App\Http\Controllers\Api@index')->name('api');
Route::put('/', 'App\Http\Controllers\Api@index')->name('api');
Route::delete('/', 'App\Http\Controllers\Api@index')->name('api');
