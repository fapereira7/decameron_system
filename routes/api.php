<?php

use App\Http\Controllers\HabitacionController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\RoomController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(HotelController::class)->group(function (){
    Route::get('/hoteles', 'index');
    Route::post('/hoteles', 'store');
    Route::get('/hoteles/{id}', 'show');
    Route::put('/hoteles/{id}', 'update');
    Route::delete('/hoteles/{id}', 'destroy');
});

Route::controller(RoomController::class)->group(function (){
    Route::get('/habitaciones', 'index');
    Route::post('/habitaciones', 'store');
    Route::get('/habitaciones/{id}', 'show');
    Route::put('/habitaciones/{id}', 'update');
    Route::delete('/habitaciones/{id}', 'destroy');
});