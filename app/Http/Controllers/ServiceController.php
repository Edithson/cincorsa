<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServiceController extends Controller
{
    //
    public function index ()
    {
        $services = [
            [
                'id'          => 'physique',
                'badge'       => 'Solution Classique',
                'title'       => 'Archivage Physique & Gestion des Stocks',
                'description' => 'L\'archivage papier reste le socle de la preuve juridique. Nous transformons vos salles
                                d\'archives encombrées en systèmes organisés et sécurisés.',
                'intro'       => null,
                'image'       => 'media/img/services/archivage-physique.avif',
                'image_alt'   => 'Archives Physiques',
                'image_class' => 'h-[500px] w-full',
                'points'      => [
                    'Audit et inventaire contradictoire',
                    'Tri, dépoussiérage et reconditionnement',
                    'Destruction confidentielle et sécurisée',
                ],
                'reversed'    => false,
                'bg'          => '',
                'deco'        => 'absolute -top-4 -left-4 w-24 h-24 bg-emerald-100 rounded-full z-0',
            ],
            [
                'id'          => 'electronique',
                'badge'       => null,
                'title'       => 'Archivage Électronique',
                'description' => 'Libérez-vous des contraintes physiques avec notre solution d\'archivage numérique
                                sécurisée, conforme aux normes internationales.',
                'intro'       => null,
                'image'       => 'media/img/services/archivage-electronique.avif',
                'image_alt'   => 'Archives Électroniques',
                'image_class' => 'h-[400px] lg:h-[550px] w-full',
                'points'      => [
                    'Conception et mise en place de systèmes d\'archivage électronique',
                    'Numérisation de documents papier',
                    'Migration de supports physiques vers supports numériques',
                    'Sécurisation des documents numériques',
                ],
                'reversed'    => true,
                'bg'          => 'bg-slate-50/50',
                'deco'        => 'absolute -bottom-4 -right-4 w-24 h-24 bg-blue-100 rounded-full z-0',
            ],
            [
                'id'          => 'logiciel',
                'badge'       => 'Software',
                'title'       => 'Fourniture de Logiciels GEIDE',
                'description' => 'Optimisez la gestion de vos documents avec nos solutions de Gestion Électronique des
                                Informations et Documents d\'Entreprise (GEIDE) adaptées à vos besoins spécifiques.',
                'intro'       => 'La GEIDE permet :',
                'image'       => 'media/img/services/logiciel-ged.jpg',
                'image_alt'   => 'Logiciel GEIDE',
                'image_class' => 'h-[500px] w-full',
                'points'      => [
                    'La centralisation de tous les documents d\'une organisation',
                    'La gestion des documents en cours de modification',
                    'Le contrôle et la maîtrise des flux documentaires',
                    'L\'acquisition, l\'intégration, la transformation, la consolidation,
                    le contrôle et le reporting des informations',
                ],
                'reversed'    => false,
                'bg'          => '',
                'deco'        => 'absolute -top-4 -left-4 w-24 h-24 bg-emerald-100 rounded-full z-0',
            ],
            [
                'id'          => 'dematerialisation',
                'badge'       => null,
                'title'       => 'Dématérialisation',
                'description' => 'Passez au numérique avec notre service de dématérialisation complet, réduisez les coûts
                                et améliorez l\'efficacité opérationnelle.',
                'intro'       => null,
                'image'       => 'media/img/services/dematerialisation.webp',
                'image_alt'   => 'Dématérialisation',
                'image_class' => 'h-[500px] w-full',
                'points'      => [
                    'Transformation des processus papier en processus numériques',
                    'Sécurisation des procédures d\'administration documentaire',
                    'Association de signatures électroniques',
                    'Mise en place de workflows de validation',
                ],
                'reversed'    => true,
                'bg'          => 'bg-slate-50/50',
                'deco'        => 'absolute -top-4 -left-4 w-24 h-24 bg-emerald-100 rounded-full z-0',
            ],
        ];
        return view('home.pages.service', compact('services'));
    }
}
