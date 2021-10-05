<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\Authenticate;
use App\Http\Middleware\RedirectIfAuthenticated;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TaskController;
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


Route::middleware([Authenticate::class])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'showDashboard'])->name('dashboard.get');
	Route::get('/', [DashboardController::class, 'showDashboard'])->name('dashboard.get.main');
    Route::post('/tasks/post', [TaskController::class, 'post'])->name('tasks.post');
    Route::get('/tasks/get-report', [TaskController::class, 'getReport'])->name('tasks.getReport');
    Route::get('/tasks/get-table', [TaskController::class, 'taskTable'])->name('tasks.taskTable');
});

Route::middleware([RedirectIfAuthenticated::class])->group(function () {
	Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
	Route::post('/login', [AuthController::class, 'login'])->name('login.post'); 
	Route::get('/register', [AuthController::class, 'showRegister'])->name('register.get');
	Route::post('/register', [AuthController::class, 'register'])->name('register.post'); 
});
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');