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

// Rutas accesibles por todos los usuarios autenticados
/*Route::middleware(['auth'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
});*/

// Rutas específicas para el administrador
Route::middleware(['auth', 'role:admin'])->group(function () {
    //Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'admin'])->name('admin');
});

// Rutas específicas para los usuarios
Route::middleware(['auth', 'role:user'])->group(function () {
    //Route::get('/user', [UserController::class, 'index'])->name('user.dashboard');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
