<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
// 1. Tambahkan import untuk Paginator di sini
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        Schema::defaultStringLength(191);

        // 2. Tambahkan baris ini agar paginasi menggunakan style Bootstrap
        Paginator::useBootstrapFive();
    }
}