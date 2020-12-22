<?php

use App\Http\Controllers\DoctorController;
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
        /************Doctor**************/
Route::get('/doctor/login', [DoctorController::class, 'doctor_login'])->name('doctor_login');
Route::post('/doctor/dashboard', [DoctorController::class, 'doctor_check'])->name('doctor_dashboard');

        /************Receptionist**************/
Route::get('/receptionist/login', [App\Http\Controllers\ReceptionistController::class, 'receptionist_login'])->name('receptionist_login');
Route::get('/receptionist/reg   ister', [App\Http\Controllers\ReceptionistController::class, 'receptionist_register'])->name('receptionist_register');
Route::post('/receptionist/store', [App\Http\Controllers\ReceptionistController::class, 'receptionist_store'])->name('receptionist_store');
