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
Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard')->middleware('auth');
Route::get('/chart', [ChartController::class, 'chart'])->name('chart');

// Authentication
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/action-login', [AuthController::class, 'actionLogin'])->name('actionLogin');

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/action-register', [AuthController::class, 'actionRegister'])->name('actionRegister');

Route::get('/action-logout', [AuthController::class, 'actionLogout'])->name('actionLogout');

// Transaction
Route::get('/payment', [TransactionController::class, 'payment'])->name('payment');

// Verification
Route::get('/request-verification-page', [VerificationUser::class, 'requestVerificationPage'])->name('requestVerificationPage');
Route::post('/request-verification', [VerificationUser::class, 'requestVerificationAction'])->name('requestVerificationAction');

// Form Request User
Route::get('/form-request', [FormRequestController::class, 'formRequest'])->name('formRequest');
