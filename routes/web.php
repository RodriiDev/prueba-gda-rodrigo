<?php

use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegistrarController;
use App\Http\Controllers\LoginController;

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

Route::get('/', HomeController::class)->name('home');

Route::get('/registrar', [RegistrarController::class, 'index'])->name('registrar');
Route::post('/registrar', [RegistrarController::class, 'store'])->middleware('validate.user')->name('registrar');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store'])->middleware('validate.login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/registrarCustomer', [CustomerController::class, 'create'])->name('customer.create');
Route::post('/registrarCustomer', [CustomerController::class, 'store'])->middleware('validate.customer')->name('customer.store');

Route::get('/consultaCustomer', [CustomerController::class, 'index'])->name('customer.index');
Route::get('/destroy/{dni}', [CustomerController::class, 'destroy'])->name('customer.destroy');

Route::post('/search', [CustomerController::class, 'search'])->name('customer.search');



