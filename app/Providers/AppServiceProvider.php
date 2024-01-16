<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\Account\AccountService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
        $this->app->bind('account', function ($app) {
            return new AccountService();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
