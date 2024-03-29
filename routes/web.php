<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\ServantController;
use App\Http\Controllers\TableController;
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

Route::get('/',[HomeController::class,'home'])->name('homepage');

Route::resource('clients', ClientController::class);
Route::resource('categories', CategoryController::class);
Route::resource('tables', TableController::class);
Route::resource('servants',ServantController::class);
Route::resource('menus',MenuController::class);
Route::resource('sales',SalesController::class);

//payments
Route::get('payments',[PaymentController::class,'index'])->name('payments');

//reports

Route::get('/reports',[ReportController::class,'index'])->name('reports.index');
Route::post('/reports',[ReportController::class,'generate'])->name('reports.generate');
Route::post('/reports/export',[ReportController::class,'export'])->name('reports.export');





Route::get('/login',[LoginController::class,'show'])->name('login.show');
Route::post('/login',[LoginController::class,'login'])->name('login');
Route::get('/logout',[LoginController::class,'logout'])->name('logout');


