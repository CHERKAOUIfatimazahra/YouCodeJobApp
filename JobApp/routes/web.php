<?php

use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\AuthController;
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
Route::get('homeAnnoune',[HomeController::class, 'announce']);
Route::get('homeCompany',[HomeController::class, 'company']);

Route::get('/login', [AuthController::class,'loginForm'])->name('login')->middleware('guest');
Route::get('/register', [AuthController::class,'index'])->name('register')->middleware('guest');
Route::post('/login', [AuthController::class,'login'])->name('authenticate')->middleware('guest');
Route::post('/register', [AuthController::class,'register'])->name('auth.register')->middleware('guest');
Route::post('/logout', [AuthController::class,'logout'])->name('logout')->middleware('auth');
// Route::get('/test',[TestController::class, 'dashboard']);
// Route::get('/companies',[CompanyController::class,'index'])->name('companies.index');

Route::resource('companies', CompanyController::class);
Route::resource('announcements', AnnouncementController::class);
// Route::resource('auto',AuthController::class);
// Route::post('/companies',[CompanyController::class,'store'])->name('companies.store');




