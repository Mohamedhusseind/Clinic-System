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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

############### login routes ##################
Route::get('/doctor/login', [App\Http\Controllers\HomeController::class, 'doctor_login'])->name('doctor_login');
Route::post('/doctor/check', [App\Http\Controllers\HomeController::class, 'doctor_check'])->name('doctor_check');

Route::get('/receptionist/login', [App\Http\Controllers\HomeController::class, 'receptionist_login'])->name('receptionist_login');
Route::get('/receptionist/register', [App\Http\Controllers\HomeController::class, 'receptionist_register'])->name('receptionist_register');
Route::post('/receptionist/check', [App\Http\Controllers\HomeController::class, 'receptionist_check'])->name('receptionist_check');
