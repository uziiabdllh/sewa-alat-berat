<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\EquipmentController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\PaymentController;

Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->group(function () {

        Route::get('/dashboard',
            [DashboardController::class, 'index'])
            ->name('admin.dashboard');

        Route::resource(
            'categories',
            CategoryController::class
        );

        Route::resource(
            'equipments',
            EquipmentController::class
        );

        Route::resource(
            'customers',
            CustomerController::class
        );

        Route::resource(
            'bookings',
            BookingController::class
        );
        Route::resource(
            'payments',
            PaymentController::class
        );

    });
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Category CRUD
    Route::resource('categories', CategoryController::class);

});

require __DIR__.'/auth.php';