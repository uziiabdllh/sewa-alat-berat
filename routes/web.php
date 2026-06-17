<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\EquipmentController;
use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\Admin\ReportController;

use App\Http\Controllers\CustomerController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Halaman Awal
Route::get('/', function () {
    return view('welcome');
});

// Dashboard Frontend
Route::get('/dashboard', function () {
    return view('dashboard');
});

// Route Admin
Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->group(function () {

        Route::get('/dashboard', [DashboardController::class, 'index'])
            ->name('admin.dashboard');

        Route::resource('categories', AdminCategoryController::class);

        Route::resource('equipments', EquipmentController::class);

        Route::resource('customers', CustomerController::class);

        Route::resource('bookings', BookingController::class);

        Route::resource('payments', PaymentController::class);

        Route::get(
            'reports/bookings',
            [ReportController::class, 'bookings']
        )->name('reports.bookings');

        Route::get(
            'reports/payments',
            [ReportController::class, 'payments']
        )->name('reports.payments');
    });

// Route Profile
Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

    Route::resource('categories', CategoryController::class);
});

// Export PDF
Route::get(
    'reports/bookings/pdf',
    [ReportController::class, 'bookingPdf']
)->name('reports.bookings.pdf');

Route::get(
    'reports/payments/pdf',
    [ReportController::class, 'paymentPdf']
)->name('reports.payments.pdf');

// Frontend Customer
Route::get('/detail-alat', function () {
    return view('customer.detail');
});

Route::get('/booking', function () {
    return view('customer.booking');
});

Route::get('/riwayat', function () {
    return view('customer.riwayat');
});

require __DIR__.'/auth.php';