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

Route::post('pay', '\App\Http\Controllers\FatoorahController@payOrder');

Route::get('callback','\App\Http\Controllers\FatoorahController@callback')->name('pay.success');

Route::get('error', function () {
    return 'payment failed';
})->name('pay.error');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
