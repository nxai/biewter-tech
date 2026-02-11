<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
// 1. ເພີ່ມການນຳໃຊ້ Schema ຢູ່ບ່ອນນີ້
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // 2. ເພີ່ມບັນທັດນີ້ເຂົ້າໄປໃນ function boot
        Schema::defaultStringLength(191);
    }
}