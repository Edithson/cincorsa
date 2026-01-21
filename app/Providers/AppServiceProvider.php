<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Sentry\State\Scope;
use function Sentry\configureScope;

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
        if (app()->bound('sentry')) {
            configureScope(function (Scope $scope): void {
                if (auth()->check()) {
                    $scope->setTag('user_permission', auth()->user()->permissions['articles'] ?? 'none');
                }
            });
        }
    }
}
