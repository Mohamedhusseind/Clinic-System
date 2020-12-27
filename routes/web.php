<?php

use App\Http\Controllers\DoctorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReceptionistController;
use App\Http\Controllers\RecipeController;
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
        /************Doctor**************/
Route::get('/doctor/login', [DoctorController::class, 'doctor_login'])->name('doctor_login');
Route::get('/add/doctor', [DoctorController::class, 'add_doctor'])->name('add_doctor');
Route::post('/doctor/store', [DoctorController::class, 'store_doctor'])->name('store_doctor');
Route::post('/doctor/dashboard', [DoctorController::class, 'doctor_check'])->name('doctor_dashboard');
Route::get('/doctor/list', [DoctorController::class, 'list_doctors'])->name('list_doctors');

############################ Get logout route ##################
Route::get('/logout',[HomeController::class,'getLogout'])->name('logout');
        /************Receptionist**************/

Route::get('/receptionist/login', [App\Http\Controllers\ReceptionistController::class, 'receptionist_login'])->name('receptionist_login');
Route::post('/receptionist/dashboard', [App\Http\Controllers\ReceptionistController::class, 'receptionist_check'])->name('receptionist_dashboard');
Route::get('/add/receptionist', [App\Http\Controllers\ReceptionistController::class, 'add_receptionist'])->name('add_receptionist');
Route::post('/receptionist/store', [App\Http\Controllers\ReceptionistController::class, 'store'])->name('receptionist_store');
Route::get('/receptionist/list', [App\Http\Controllers\ReceptionistController::class, 'list_receptionists'])->name('list_receptionists');

        /************Patient**************/

Route::get('/add/patient', [App\Http\Controllers\ReceptionistController::class, 'add_patient'])->name('add_patient');
Route::post('/patient/stores', [App\Http\Controllers\ReceptionistController::class, 'store_patient'])->name('store_patient');
Route::get('/patient/List', [App\Http\Controllers\ReceptionistController::class, 'list_patient'])->name('show_patient');
Route::get('/patient/show', [App\Http\Controllers\ReceptionistController::class, 'list_patients'])->name('list_patient');
Route::get('/patient/list', [DoctorController::class, 'list_patients'])->name('list_patients');

        /************Appointments**************/

Route::get('/add/appointment', [DoctorController::class, 'add_appointment'])->name('add_appointment');
Route::post('/store/appointment', [DoctorController::class, 'store_appointment'])->name('store_appointment');
Route::get('/appointment/list', [DoctorController::class, 'list_appointments'])->name('list_appointments');

        /************Invoice**************/

Route::get('/add/invoice', [ReceptionistController::class, 'add_invoice'])->name('add_invoice');
Route::post('/invoice/store', [ReceptionistController::class, 'store_invoice'])->name('store_invoice');

Route::get('/invoices/List', [ReceptionistController::class, 'show_invoices'])->name('show_invoices');

        /************Product**************/

Route::get('/add/product', [ProductController::class, 'add_product'])->name('add_product');
Route::post('/product/store', [ProductController::class, 'store_product'])->name('store_product');
Route::get('/product/List', [ProductController::class, 'list_products'])->name('list_products');

        /********** Recipe ****************/

Route::get('add/recipe',[RecipeController::class,'add_recipe'])->name('add_recipe');
Route::post('store/recipe',[RecipeController::class,'store_recipe'])->name('store_recipe');
Route::get('recipe/list',[RecipeController::class,'list_recipes'])->name('list_recipes');
