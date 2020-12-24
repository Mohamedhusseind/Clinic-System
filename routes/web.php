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

############################ login routes ##################
        /************doctor.blade.php**************/
Route::get('/doctor/login', [DoctorController::class, 'doctor_login'])->name('doctor_login');
Route::post('/doctor/dashboard', [DoctorController::class, 'doctor_check'])->name('doctor_dashboard');

        /************Receptionist**************/

Route::get('/receptionist/login', [App\Http\Controllers\ReceptionistController::class, 'receptionist_login'])->name('receptionist_login');
Route::post('/receptionist/dashboard', [App\Http\Controllers\ReceptionistController::class, 'receptionist_check'])->name('receptionist_dashboard');
Route::get('/add/receptionist', [App\Http\Controllers\ReceptionistController::class, 'add_receptionist'])->name('add_receptionist');
Route::post('/receptionist/store', [App\Http\Controllers\ReceptionistController::class, 'store'])->name('receptionist_store');

        /************Patient**************/

Route::get('/add/patient', [App\Http\Controllers\ReceptionistController::class, 'add_patient'])->name('add_patient');
Route::post('/patient/stores', [App\Http\Controllers\ReceptionistController::class, 'store_patient'])->name('store_patient');
Route::get('/patient/List', [App\Http\Controllers\ReceptionistController::class, 'list_patient'])->name('show_patient');
Route::get('/patient/show', [App\Http\Controllers\ReceptionistController::class, 'list_patients'])->name('list_patients');

        /************Appointments**************/

Route::get('/add/appointment', [App\Http\Controllers\DoctorController::class, 'add_appointment'])->name('add_appointment');
Route::post('/store/appointment', [App\Http\Controllers\DoctorController::class, 'store_appointment'])->name('store_appointment');

        /************Invoice**************/

Route::get('/add/invoice', [App\Http\Controllers\ReceptionistController::class, 'add_invoice'])->name('add_invoice');
Route::post('/invoice/store', [App\Http\Controllers\ReceptionistController::class, 'store_invoice'])->name('store_invoice');

Route::get('/invoices/List', [App\Http\Controllers\ReceptionistController::class, 'show_invoices'])->name('show_invoices');
