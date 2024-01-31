<?php

use App\Http\Controllers\CompanyController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\HomeController;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
 
Route::get('/',[HomeController::class, 'index']);
// Route::get('/test',[TestController::class, 'dashboard']);
// Route::get('/companies',[CompanyController::class,'index'])->name('companies.index');

Route::resource('companies', CompanyController::class);
// Route::post('/companies',[CompanyController::class,'store'])->name('companies.store');


