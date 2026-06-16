<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AboutController extends Controller
{
    //
    public function index()
    {
        $settings = Setting::getCachedSettings();
        $siteName = $settings->site_name ?? 'CINV-COR SA';

        $timeline = [
            [
                'year'        => '2001',
                'title'       => "Création de {$siteName}",
                'description' => 'Lancement de nos activités d\'archivage manuel à Yaoundé, avec une vision claire :
                                devenir le leader de la gestion documentaire en Afrique francophone.',
            ],
            [
                'year'        => '2012',
                'title'       => 'Expansion vers le numérique',
                'description' => 'Introduction de nos premières solutions d\'archivage électronique et de numérisation
                                professionnelle. Plus de 50 clients nous font confiance.',
            ],
            [
                'year'        => '2015',
                'title'       => 'Lancement des solutions GEIDE',
                'description' => 'Développement et déploiement de nos logiciels propriétaires de Gestion Électronique
                                des Informations et Documents d\'Entreprise.',
            ],
            [
                'year'        => '2018',
                'title'       => 'Certification et Expansion régionale',
                'description' => 'Obtention des certifications ISO et expansion de nos services dans 5 pays d\'Afrique
                                francophone. Plus de 150 clients actifs.',
            ],
            [
                'year'        => '2023',
                'title'       => 'Leader reconnu du marché',
                'description' => "{$siteName} s'impose comme le leader incontesté de l'ingénierie documentaire en Afrique
                                francophone avec plus de 200 clients et 50K+ documents gérés.",
            ],
            [
                'year'        => '2025',
                'title'       => 'Innovation et Futur',
                'description' => 'Intégration de l\'Intelligence Artificielle dans nos solutions, lancement de services
                                cloud et vision d\'expansion panafricaine.',
            ],
        ];

        return view('home.pages.about', compact('timeline', 'siteName'));
    }
}
