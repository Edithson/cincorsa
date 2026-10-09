<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        // Static memoization to avoid redundant cache retrievals across partial views
        View::composer('*', function ($view) {
            static $settings = null;
            if ($settings === null) {
                $settings = Setting::getCachedSettings();
            }

            $view->with('siteName', $settings->name ?? 'CINV-CORSA');
            $view->with('siteLogo', $settings->logo ?? 'default-logo.png');
            $view->with('siteSlogan', $settings->slogan ?? '');
            $view->with('siteSocials', $settings->socials ?? []);
        });
    }
}
