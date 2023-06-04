<?php

use App\Http\Controllers\Api\TransportTypeController;
use App\Http\Controllers\Api\VehicleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::group(['middleware' => ['api','throttle:60,1'],'prefix' => 'v1/auth'], function () {

    Route::controller(AuthController::class)->group(function(){
        Route::post('login',  'login');
        Route::post('refresh','refresh');
        Route::post('register','register');
        Route::post('logout', 'logout');
    });

   
});

Route::group(['prefix' => 'v1','middleware' => ['jwt.auth', 'throttle:60,1']], function () {
    Route::resource('type', TransportTypeController::class);
    Route::post('type', [TransportTypeController::class, 'update']);

    Route::controller(VehicleController::class)->group(function(){
        Route::get('vehicle',  'index');
        Route::post('vehicle','store');
        Route::post('vehicle/update','update');
    });

});
