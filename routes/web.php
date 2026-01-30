<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MainController;
use App\http\Controllers\UserController;
use App\Http\Controllers\JejaController;
use App\Http\Controllers\UKTController;

Route::get('/', function () {
    return view('login');
});

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login',[AuthController::class, 'authenticate']);
Route::post('/logout',[AuthController::class, 'logout'])->name('logout');
Route::get('/dashboard',[MainController::class, 'dashboard'])->middleware('auth');
Route::resource('/users',UserController::class);
Route::resource('/jeja',JejaController::class);
Route::resource('/ukt',UKTController::class);
Route::get('/eventUKT',[UKTController::class, 'eventUKT'])->name('eventUKT');
Route::get('/daftarUKT/{id_event}',[UKTController::class, 'daftarUKT'])->name('daftarUKT');
Route::post('/registUKT',[UKTController::class,'registUKT'])->name('registUKT');