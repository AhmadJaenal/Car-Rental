<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\MobilController;
use App\Http\Controllers\VerificationUser;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PricingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FormRequestController;
use App\Http\Controllers\TransactionController;


// Landing Page
Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/about', [AboutController::class, 'about'])->name('about');
Route::get('/car', [CarController::class, 'car'])->name('car');
Route::get('/pricing', [PricingController::class, 'pricing'])->name('pricing');
Route::get('/services', [ServicesController::class, 'services'])->name('services');
Route::get('/contact', [ContactController::class, 'contact'])->name('contact');
Route::get('/about', [AboutController::class, 'about'])->name('about');

// Dasboard
Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard')->middleware('auth:webadmin');
Route::get('/chart', [ChartController::class, 'chart'])->name('chart');

// Authentication
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/action-login', [AuthController::class, 'actionLogin'])->name('actionLogin');

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/action-register', [AuthController::class, 'actionRegister'])->name('actionRegister');

Route::get('/action-logout', [AuthController::class, 'actionLogout'])->name('actionLogout');

// Transaction
Route::get('/payment', [TransactionController::class, 'payment'])->name('payment');
Route::post('/transaction/{id_mobil}/{jenis_sewa}', [TransactionController::class, 'transaction'])->name('transaction');
Route::get('/transaction-admin-day{id_mobil}', [TransactionController::class, 'transactionAdminDay'])->name('transactionAdminDay');
Route::get('/transaction-admin-hour{id_mobil}', [TransactionController::class, 'transactionAdminHour'])->name('transactionAdminHour');
Route::get('/invoice{id}', [TransactionController::class, 'invoice'])->name('printInvoice');
Route::get('/form-transaction-day', [TransactionController::class, 'formTransactionDay'])->name('formTransactionDay');
Route::get('/form-transaction-hour', [TransactionController::class, 'formTransactionHour'])->name('formTransactionHour');
Route::get('/payment-accept{id}', [TransactionController::class, 'acceptPayment'])->name('acceptPayment');
Route::get('/payment-reject{id}', [TransactionController::class, 'rejectPayment'])->name('rejectPayment');

Route::get('/status-sewa-accept{id}', [TransactionController::class, 'acceptSewa'])->name('acceptSewa');
Route::get('/status-sewa-reject{id}', [TransactionController::class, 'rejectSewa'])->name('rejectSewa');
Route::get('/status-pengembalian-accept{id}', [TransactionController::class, 'acceptPengembalian'])->name('acceptPengembalian');
Route::get('/status-pengembalian-reject{id}', [TransactionController::class, 'rejectPengembalian'])->name('rejectPengembalian');


// Verification User
Route::get('/request-verification-page', [VerificationUser::class, 'requestVerificationPage'])->name('requestVerificationPage');
Route::get('/accept{id}', [VerificationUser::class, 'acceptDataRequest'])->name('acceptDataRequest');
Route::get('/reject{id}', [VerificationUser::class, 'rejectDataRequest'])->name('rejectDataRequest');


// Form Request User
Route::get('/form-request', [FormRequestController::class, 'formRequest'])->name('formRequest');
Route::post('/request-verification', [FormRequestController::class, 'requestVerificationAction'])->name('requestVerificationAction');

// History Transaction
Route::get('/history-transaction', [TransactionController::class, 'historyTransactions'])->name('historyTransactions');










// Setting Profile
Route::get('/profile', [ProfileController::class, 'profile'])->name('profile');
Route::post('/editprofileuser{id_peminjam}', [ProfileController::class, 'editprofileuser'])->name('editprofileuser');
Route::post('/editprofileadmin{id_admin}', [ProfileController::class, 'editprofileadmin'])->name('editprofileadmin');

// Mobil
Route::get('/tampilmobil', [MobilController::class, 'tampilmobil'])->name('tampilmobil');
Route::get('/tambahmobil', [MobilController::class, 'tambahmobil'])->name('tambahmobil');
Route::get('/tampilusermobil', [MobilController::class, 'tampilusermobil'])->name('tampilusermobil');


Route::post('/tambahdatamobil', [MobilController::class, 'tambahdatamobil'])->name('tambahdatamobil');
Route::get('/hapusmobil{id_mobil}', [MobilController::class, 'hapusmobil'])->name('hapusmobil');
Route::get('/editmobil{id_mobil}', [MobilController::class, 'editmobil'])->name('editmobil');
Route::post('/editdatamobil{id_mobil}', [MobilController::class, 'editdatamobil'])->name('editdatamobil');

Route::get('/pdf', [MobilController::class, 'pdf'])->name('pdf');
