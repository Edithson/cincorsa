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

            $siteName = !empty($settings->name) ? $settings->name : 'CINV-COR SA';
            $siteLogo = !empty($settings->logo) ? $settings->logo : null;
            $siteSlogan = !empty($settings->slogan) ? $settings->slogan : 'Solutions Documentaires';
            $siteEmail = !empty($settings->email) ? $settings->email : 'contact@cinvcorsa.com';
            $sitePhones = (!empty($settings->phones) && is_array($settings->phones) && count($settings->phones) > 0) ? $settings->phones : ['+237 6 96 15 69 81', '+237 6 99 15 69 81'];
            $siteAdresse = !empty($settings->adresse) ? $settings->adresse : 'Carrefour Camp SONEL Essos, Yaoundé, Cameroun';
            $siteBp = !empty($settings->bp) ? $settings->bp : 'BP 5747 Yaoundé';
            $siteHoraire = !empty($settings->horaire) ? $settings->horaire : 'Lundi - Vendredi : 08H30 - 17H00';
            $siteSocials = (!empty($settings->socials) && is_array($settings->socials)) ? $settings->socials : [];

            $view->with([
                'siteSettings' => $settings,
                'siteName' => $siteName,
                'siteLogo' => $siteLogo,
                'siteSlogan' => $siteSlogan,
                'siteEmail' => $siteEmail,
                'sitePhones' => $sitePhones,
                'siteAdresse' => $siteAdresse,
                'siteBp' => $siteBp,
                'siteHoraire' => $siteHoraire,
                'siteSocials' => $siteSocials,
                'developerName' => config('app.developer_name'),
                'developerUrl' => config('app.developer_url'),
            ]);
        });
    }
}
