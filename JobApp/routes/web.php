<?php

use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\ApplyController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CompanyController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\StatiController;
use App\Http\Controllers\UserController;

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

Route::group(['middleware' => ['auth']], function () {
    Route::resource('companies', CompanyController::class);
    Route::resource('announcements', AnnouncementController::class);
    Route::resource('statistic', StatiController::class);
});

Route::group(['middleware' => ['auth']], function () {
    Route::resource('users',UserController::class);
    Route::get('apply/{user}/{announcement}',[ApplyController::class, 'apply'] )->name('apply.btn')->middleware('auth');
});
Route::group(['middleware' => ['auth']], function () {
    Route::get('/profils', [ProfilController::class, 'index'])->name('profils.index');
    Route::get('/profils/{user}/edit', [ProfilController::class, 'edit'])->name('profils.edit');
    Route::put('/profils/{user}', [ProfilController::class, 'update'])->name('profils.update');
});

Route::get('/apply', [ApplyController::class, 'index'])->name('apply.index')->middleware('auth');
 
// Route::resource('auto',AuthController::class);
// Route::post('/companies',[CompanyController::class,'store'])->name('companies.store');




