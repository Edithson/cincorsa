<!-- About Section -->
<section id="apropos" class="py-20 bg-white">
    <div class="container mx-auto px-6">
        <div class="grid lg:grid-cols-2 gap-16 items-center">
            <!-- Image -->
            <div class="about-image">
                <div class="about-shape-1"></div>
                <div class="about-shape-2"></div>
                <div class="about-content">
                    <svg viewBox="0 0 400 400" class="w-full h-full">
                        <circle cx="200" cy="200" r="150" fill="#dcfce7"/>
                        <rect x="120" y="140" width="160" height="200" rx="10" fill="white"/>
                        <rect x="140" y="170" width="120" height="8" rx="4" fill="#16a34a"/>
                        <rect x="140" y="200" width="100" height="6" rx="3" fill="#e5e7eb"/>
                        <rect x="140" y="220" width="110" height="6" rx="3" fill="#e5e7eb"/>
                        <rect x="140" y="240" width="90" height="6" rx="3" fill="#e5e7eb"/>
                        {{-- <circle cx="200" cy="290" r="20" fill="#ec4899"/>
                        <path d="M190 290 L197 297 L212 282" stroke="white" stroke-width="3" fill="none" stroke-linecap="round"/> --}}
                        <img class="h-50 w-50" src="/media/img/logo.png" alt="">
                    </svg>
                </div>
            </div>

            <!-- Content -->
            <div>
                <h2 class="text-4xl lg:text-5xl font-bold text-gray-800 mb-6">Qui sommes-nous ?</h2>
                <div class="space-y-5 text-gray-600 text-lg leading-relaxed">
                    <p>
                        <strong class="text-green-600 font-semibold">CINV-CORSA</strong> est le leader incontesté de l'ingénierie documentaire en Afrique noire francophone. Nous proposons une offre intégrée complète incluant l'archivage manuel, l'archivage électronique, des logiciels GEIDE et des solutions de dématérialisation.
                    </p>
                    <p>
                        Notre expertise couvre la gestion globale du cycle de vie des documents : documents entrants, dossiers de soumission, documents internes et externes. Nous maîtrisons parfaitement l'interaction avec les principaux systèmes d'information (ERP, PLM, CRM, GMAO, messagerie, intranet, extranet).
                    </p>
                    <p>
                        Nos Systèmes d'Archivage Électronique (SAE) s'articulent autour de trois piliers essentiels : <strong>50% organisationnel</strong>, <strong>25% réglementaire</strong> et <strong>25% informatique</strong>, garantissant une approche équilibrée et conforme.
                    </p>
                </div>
                <div class="mt-8">
                    <a href="{{route('about')}}" class="btn-primary">En savoir plus</a>
                </div>
            </div>
        </div>
    </div>
</section>
