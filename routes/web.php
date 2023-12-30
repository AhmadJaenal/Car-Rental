<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FormRequestController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PricingController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\VerificationUser;
use Illuminate\Support\Facades\Route;


// Landing Page
Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/about', [AboutController::class, 'about'])->name('about');
Route::get('/car', [CarController::class, 'car'])->name('car');
Route::get('/pricing', [PricingController::class, 'pricing'])->name('pricing');
Route::get('/services', [ServicesController::class, 'services'])->name('services');
Route::get('/contact', [ContactController::class, 'contact'])->name('contact');
Route::get('/about', [AboutController::class, 'about'])->name('about');

// Dasboard
Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
Route::get('/chart', [ChartController::class, 'chart'])->name('chart');

// Authentication
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'register'])->name('register');

// Transaction
Route::get('/payment', [TransactionController::class, 'payment'])->name('payment');

// Verification
Route::get('/request-verification', [VerificationUser::class, 'requestVerification'])->name('requestVerification');

// Form Request User
Route::get('/form-request', [FormRequestController::class, 'formRequest'])->name('formRequest');
