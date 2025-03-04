<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ImageUploadController;
use App\Http\Controllers\ProductoController;
use App\Http\Middleware\AuthMiddleware;

Route::middleware(AuthMiddleware::class)->group(function () {
    Route::get('/dashboard', function () { return view('dashboard');});
    Route::get('/admin', [DashboardController::class, 'admin']);
    Route::get('/user', [DashboardController::class, 'user']);
    Route::get('/products', [ProductoController::class, 'index']);
});
Route::get('/', function () { return view('home');});

Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::get('/upload', [ImageUploadController::class, 'showForm'])->name('image.form');
Route::post('/upload', [ImageUploadController::class, 'upload'])->name('image.upload');