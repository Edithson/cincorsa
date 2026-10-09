@extends('home.index')

@section('content')

    <style>
        /* États de départ pour l'animation */
        .reveal-left {
            opacity: 0;
            transform: translateX(-50px);
            transition: all 0.8s ease-out;
        }

        .reveal-right {
            opacity: 0;
            transform: translateX(50px);
            transition: all 0.8s ease-out;
        }

        /* État final quand l'élément est visible */
        .reveal.active .reveal-left,
        .reveal.active .reveal-right {
            opacity: 1;
            transform: translateX(0);
        }
    </style>

    <section>
        <section class="relative pt-52 pb-40 bg-slate-900 text-white overflow-hidden">
            <div class="absolute top-0 right-0 w-1/2 h-full bg-emerald-500/10 skew-x-12 translate-x-32"></div>
            <div class="container mx-auto px-6 relative z-10">
                <div class="max-w-3xl">
                    <h1 class="text-5xl md:text-6xl font-black mb-6">Expertise Complète en <span
                            class="text-emerald-400">Archivage Manuel</span></h1>
                    <p class="text-xl text-gray-300 leading-relaxed">
                        De l'audit initial à la mise en place d'un coffre-fort numérique, nous accompagnons les
                        organisations dans la maîtrise et l'exploitation de leur patrimoine informationnel.
                    </p>
                </div>
            </div>
            <div class="w-1/3 h-90 absolute top-32 right-2 rounded-xl overflow-hidden shadow-lg hidden lg:block animate-float">
                <img
                    id="hero-slider"
                    src="/media/img/slides/photo1.png"
                    class="w-full h-full object-cover transition-opacity duration-1000 opacity-100 mt-12"
                    alt="CINV-CORSA Slideshow"
                >
            </div>
        </section>

        <div class="space-y-12 lg:space-y-0">
            @foreach ($services as $service)
                @php
                    $flexDir       = $service['reversed'] ? 'lg:flex-row-reverse' : 'lg:flex-row';
                    $imgReveal     = $service['reversed'] ? 'reveal-right'        : 'reveal-left';
                    $contentReveal = $service['reversed'] ? 'reveal-left'         : 'reveal-right';
                @endphp

                <section id="{{ $service['id'] }}"
                        class="reveal py-16 lg:py-24 overflow-hidden {{ $service['bg'] }}">
                    <div class="container mx-auto px-6">
                        <div class="flex flex-col {{ $flexDir }} items-center gap-12 lg:gap-20">

                            {{-- Visual --}}
                            <div class="w-full lg:w-1/2 {{ $imgReveal }}">
                                <div class="relative">
                                    <div class="{{ $service['deco'] }}"></div>
                                    <img src="{{ asset($service['image']) }}"
                                        alt="{{ $service['image_alt'] }}"
                                        class="rounded-3xl shadow-2xl relative z-10 object-cover {{ $service['image_class'] }}">
                                </div>
                            </div>

                            {{-- Content --}}
                            <div class="w-full lg:w-1/2 {{ $contentReveal }}">
                                @if ($service['badge'])
                                    <span class="text-emerald-600 font-bold tracking-widest uppercase text-sm">
                                        {{ $service['badge'] }}
                                    </span>
                                @endif
                                <h2 class="text-4xl font-extrabold mt-4 mb-6">{{ $service['title'] }}</h2>
                                <p class="text-gray-600 mb-8 text-lg">{{ $service['description'] }}</p>

                                @if ($service['intro'])
                                    <p class="mb-2">{{ $service['intro'] }}</p>
                                @endif

                                <ul class="space-y-4">
                                    @foreach ($service['points'] as $point)
                                        <li class="flex items-center space-x-3">
                                            <div class="bg-emerald-100 p-1 rounded-full shrink-0">
                                                <svg class="w-5 h-5 text-emerald-600" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M5 13l4 4L19 7"/>
                                                </svg>
                                            </div>
                                            <span class="font-medium text-slate-700">{{ $point }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>

                        </div>
                    </div>
                </section>
            @endforeach
        </div>

        <section id="numerique" class="py-24 bg-slate-900 text-white">
            <div class="container mx-auto px-6">
                <div class="text-center mb-16">
                    <h2 class="text-4xl font-bold">Transformation Digitale & <span class="text-blue-400">SAE</span></h2>
                    <p class="text-gray-400 mt-4 max-w-2xl mx-auto">Mise en place de Systèmes d'Archivage Électronique (SAE)
                        à valeur probante.</p>
                </div>

                <div class="grid md:grid-cols-3 gap-8">
                    <div
                        class="bg-slate-800 p-8 rounded-3xl border border-slate-700 hover:border-blue-500 transition-all duration-300">
                        <div
                            class="w-14 h-14 bg-blue-500/20 text-blue-400 rounded-2xl flex items-center justify-center mb-6">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                </path>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold mb-4">GEIDE</h3>
                        <p class="text-gray-400 leading-relaxed">
                            Gestion électronique de vos informations pour une recherche instantanée et un partage
                            collaboratif sécurisé.
                        </p>
                    </div>

                    <div
                        class="bg-slate-800 p-8 rounded-3xl border border-slate-700 hover:border-emerald-500 transition-all duration-300">
                        <div
                            class="w-14 h-14 bg-emerald-500/20 text-emerald-400 rounded-2xl flex items-center justify-center mb-6">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm12 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z">
                                </path>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold mb-4">Numérisation</h3>
                        <p class="text-gray-400 leading-relaxed">
                            Capture haute définition de vos flux (factures, dossiers RH, courriers) avec reconnaissance
                            optique de caractères (OCR).
                        </p>
                    </div>

                    <div
                        class="bg-slate-800 p-8 rounded-3xl border border-slate-700 hover:border-purple-500 transition-all duration-300">
                        <div
                            class="w-14 h-14 bg-purple-500/20 text-purple-400 rounded-2xl flex items-center justify-center mb-6">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold mb-4">Interconnexion SI</h3>
                        <p class="text-gray-400 leading-relaxed">
                            Liaison native entre vos archives et vos outils métiers : ERP, CRM, GMAO ou plateformes de
                            messagerie.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <section id="conseil" class="py-24 bg-gray-50">
            <div class="container mx-auto px-6">
                <div class="flex flex-col lg:flex-row gap-12 items-center">
                    <div class="lg:w-1/2">
                        <h2 class="text-4xl font-extrabold mb-6">Accompagnement, Audit & <span
                                class="text-emerald-600">Conseil</span></h2>
                        <p class="text-gray-600 mb-6 text-lg">
                            Parce qu'un projet d'archivage est avant tout une transformation humaine et organisationnelle.
                        </p>
                        <div class="space-y-6">
                            <div class="flex p-4 bg-white rounded-2xl shadow-sm border-l-4 border-emerald-500">
                                <div class="ml-4">
                                    <h4 class="font-bold">Ingénierie documentaire</h4>
                                    <p class="text-sm text-gray-500">Élaboration de tableaux de gestion et de calendriers de
                                        conservation.</p>
                                </div>
                            </div>
                            <div class="flex p-4 bg-white rounded-2xl shadow-sm border-l-4 border-blue-500">
                                <div class="ml-4">
                                    <h4 class="font-bold">Formation & Renforcement</h4>
                                    <p class="text-sm text-gray-500">Transfert de compétences vers vos équipes pour une
                                        gestion autonome.</p>
                                </div>
                            </div>
                            <div class="flex p-4 bg-white rounded-2xl shadow-sm border-l-4 border-purple-500">
                                <div class="ml-4">
                                    <h4 class="font-bold">Audit de conformité</h4>
                                    <p class="text-sm text-gray-500">Évaluation de vos risques documentaires et
                                        réglementaires.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="lg:w-1/2 grid grid-cols-2 gap-4">
                        <div
                            class="bg-emerald-600 h-64 rounded-3xl flex flex-col items-center justify-center text-white p-6 text-center">
                            <span class="text-4xl font-black mb-2">25+</span>
                            <span class="text-sm font-medium uppercase tracking-widest">Ans d'Expertise</span>
                        </div>
                        <div
                            class="bg-slate-800 h-64 rounded-3xl flex flex-col items-center justify-center text-white p-6 text-center mt-8">
                            <span class="text-4xl font-black mb-2">20+</span>
                            <span class="text-sm font-medium uppercase tracking-widest">Audits Réalisés</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-24">
            <div class="container mx-auto px-6 text-center">
                <h2 class="text-3xl font-bold mb-12">Nos Fournitures Spécialisées</h2>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                    <div class="group cursor-pointer">
                        <div
                            class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-emerald-500 group-hover:text-white transition-all">
                            📦
                        </div>
                        <h4 class="font-bold">Boîtes d'archives</h4>
                    </div>
                    <div class="group cursor-pointer">
                        <div
                            class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-emerald-500 group-hover:text-white transition-all">
                            🏗️
                        </div>
                        <h4 class="font-bold">Rayonnages</h4>
                    </div>
                    <div class="group cursor-pointer">
                        <div
                            class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-emerald-500 group-hover:text-white transition-all">
                            💾
                        </div>
                        <h4 class="font-bold">Logiciels SAE</h4>
                    </div>
                    <div class="group cursor-pointer">
                        <div
                            class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-emerald-500 group-hover:text-white transition-all">
                            📂
                        </div>
                        <h4 class="font-bold">Chemises & Dossiers</h4>
                    </div>
                </div>
            </div>
        </section>

        @include('home.sections.cta_service')
    </section>

    <script src="{{ asset('js/home/slide_service.js') }}"></script>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
        const observerOptions = {
            threshold: 0.15 // Se déclenche quand 15% de la section est visible
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('active');
                    // Optionnel : on arrête d'observer une fois l'animation faite
                    // observer.unobserve(entry.target);
                }
            });
        }, observerOptions);

        // On observe toutes les sections avec la classe .reveal
        document.querySelectorAll('.reveal').forEach(section => {
            observer.observe(section);
        });
    });
    </script>

@endsection
