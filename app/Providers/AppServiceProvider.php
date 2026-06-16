<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
<<<<<<< HEAD
        Schema::defaultStringLength(191);
=======
    Schema::defaultStringLength(191);
>>>>>>> f03d61c (membuat dashboard login admin)
    }
}