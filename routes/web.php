<?php

use Illuminate\Support\Facades\Route;

// General Auth Controller
use App\Http\Controllers\AuthController;

// Admin Controllers
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\TenantController;
use App\Http\Controllers\Admin\RoomController;
use App\Http\Controllers\Admin\BillController;
use App\Http\Controllers\Admin\PaymentController as AdminPaymentController;
use App\Http\Controllers\Admin\ComplaintAdminController;
use App\Http\Controllers\Admin\AnnouncementController;
use App\Http\Controllers\Admin\ReportController;

// User Controllers
use App\Http\Controllers\User\ComplaintController;
use App\Http\Controllers\User\PaymentController;

// Halaman utama
Route::get('/', function () {
    return redirect()->route('login');
});


// ====== LOGIN & REGISTER UNTUK USER (PENGHUNI) ======
Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'registerForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);


// ====== LOGIN SAJA UNTUK ADMIN (TIDAK ADA REGISTER) ======
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('tenants', \App\Http\Controllers\Admin\TenantController::class);
});

Route::prefix('admin')->name('admin.')->middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('komplain', App\Http\Controllers\Admin\ComplaintAdminController::class)->only(['index', 'edit', 'update']);
});

Route::prefix('admin')->middleware(['auth', 'role:admin'])->name('admin.')->group(function () {
    Route::resource('bills', \App\Http\Controllers\Admin\BillController::class)->only(['index']);
});

// ====== RUTE ADMIN ======
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('/tenants', TenantController::class);
    Route::resource('/rooms', RoomController::class);
    Route::resource('/bills', BillController::class);
    Route::resource('/payments', AdminPaymentController::class)->only(['index', 'show']);
    Route::resource('/complaints', ComplaintAdminController::class);
    Route::resource('/announcements', AnnouncementController::class);

    Route::get('/reports/income', [ReportController::class, 'income'])->name('reports.income');
});


// ====== RUTE USER (PENGHUNI KOST) ======
Route::middleware(['auth', 'role:user'])->prefix('user')->name('user.')->group(function () {
    Route::get('/dashboard', function () {
        return view('user.dashboard');
    })->name('dashboard');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::resource('/complaints', ComplaintController::class);
    Route::resource('/payments', PaymentController::class);

    Route::fallback(function () {
        return response()->view('errors.404', [], 404);
    });
});
