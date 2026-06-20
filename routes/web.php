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
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\EquipmentController as FrontendEquipmentController;
use App\Http\Controllers\Frontend\BookingController1;
use App\Http\Controllers\Frontend\PaymentController1;
use App\Http\Controllers\Frontend\HistoryController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// ==============================
// Landing Page
// ==============================

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// ==============================
// Frontend Customer
// ==============================

Route::get('/home', [HomeController::class, 'index'])
    ->name('home');

Route::get('/katalog-alat', [FrontendEquipmentController::class, 'index'])
    ->name('customer.katalog');

Route::get('/detail-alat/{id}', [FrontendEquipmentController::class, 'show'])
    ->name('customer.detail');

Route::view('/booking', 'customer.booking')
    ->name('customer.booking');

Route::post('/booking', [BookingController1::class, 'store'])
    ->name('customer.booking.store');

Route::view('/riwayat', 'customer.riwayat')
    ->name('customer.riwayat');

Route::get('/payment/{booking}', function ($bookingId) {

    $booking = \App\Models\Booking::findOrFail($bookingId);

    return view('customer.payment', compact('booking'));

})->name('customer.payment');

Route::post('/upload-pembayaran',
    [PaymentController1::class, 'store'])
    ->name('customer.payment.store');

Route::view('/upload-pembayaran', 'customer.upload')
    ->name('customer.upload');

Route::view('/success', 'customer.success')
    ->name('customer.success');

Route::get('/history',
    [HistoryController::class, 'index'])
    ->name('customer.history');


// ==============================
// Route Admin
// ==============================

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


// ==============================
// Profile
// ==============================

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

    Route::resource('categories', CategoryController::class);
});


// ==============================
// Export PDF
// ==============================

Route::get(
    'reports/bookings/pdf',
    [ReportController::class, 'bookingPdf']
)->name('reports.bookings.pdf');

Route::get(
    'reports/payments/pdf',
    [ReportController::class, 'paymentPdf']
)->name('reports.payments.pdf');


require __DIR__.'/auth.php';