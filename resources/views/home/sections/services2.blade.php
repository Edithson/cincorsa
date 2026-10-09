<style>
    /* Utilitaires pour l'effet 3D non présents par défaut dans Tailwind */
    .perspective {
        perspective: 1000px;
    }
    .preserve-3d {
        transform-style: preserve-3d;
    }
    .backface-hidden {
        backface-visibility: hidden;
        -webkit-backface-visibility: hidden;
    }
    .rotate-y-180 {
        transform: rotateY(180deg);
    }
    /* Classe activée par JS sur mobile */
    .is-flipped {
        transform: rotateY(180deg);
    }
</style>

<section class="py-20 bg-slate-50" id="home_services">
    <div class="container mx-auto px-6">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-black text-slate-900 mb-4">Nos Domaines d'Expertise</h2>
            <p class="text-slate-500 max-w-2xl mx-auto">Découvrez comment {{ $siteName }} accompagne votre transformation documentaire.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">

            <div class="flip-card h-96 w-full perspective group cursor-pointer">
                <div class="flip-card-inner relative w-full h-full transition-transform duration-700 preserve-3d group-hover:rotate-y-180">

                    <div class="absolute inset-0 w-full h-full backface-hidden rounded-3xl overflow-hidden shadow-lg">
                        <img src="/media/img/services/image2.png" class="w-full h-full object-cover" loading="lazy" decoding="async">
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-slate-900/20 to-transparent flex items-end p-8">
                            <h3 class="text-xl font-bold text-white uppercase tracking-wider">Archivage Physique</h3>
                        </div>
                    </div>

                    <div class="absolute inset-0 w-full h-full backface-hidden rotate-y-180 rounded-3xl bg-slate-900 flex flex-col items-center justify-center p-8 text-center text-white shadow-xl">
                        <div class="mb-4 text-4xl">📦</div>
                        <h3 class="text-xl font-bold mb-4">Gestion des Stocks</h3>
                        <p class="text-sm text-emerald-50 leading-relaxed mb-6">
                            Tri, dépoussiérage, inventaire et conservation sécurisée de vos archives papier selon les normes internationales.
                        </p>
                        <a href="{{ route('service') }}#physique" class="bg-emerald-500 text-white px-6 py-2 rounded-full font-bold text-sm hover:bg-emerald-400 transition-colors">En savoir plus</a>
                    </div>

                </div>
            </div>

            <div class="flip-card h-96 w-full perspective group cursor-pointer">
                <div class="flip-card-inner relative w-full h-full transition-transform duration-700 preserve-3d group-hover:rotate-y-180">
                    <div class="absolute inset-0 w-full h-full backface-hidden rounded-3xl overflow-hidden shadow-lg">
                        <img src="/media/img/services/archivage-numerique.png" class="w-full h-full object-cover bg-center" loading="lazy" decoding="async">
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-slate-900/20 to-transparent flex items-end p-8">
                            <h3 class="text-xl font-bold text-white uppercase tracking-wider">Numérisation</h3>
                        </div>
                    </div>
                    <div class="absolute inset-0 w-full h-full backface-hidden rotate-y-180 rounded-3xl bg-slate-900 flex flex-col items-center justify-center p-8 text-center text-white shadow-xl">
                        <div class="mb-4 text-4xl">🚀</div>
                        <h3 class="text-xl font-bold mb-4">Zéro Papier</h3>
                        <p class="text-sm text-slate-300 leading-relaxed mb-6">
                            Capture haute définition et reconnaissance optique (OCR) pour transformer vos flux papier en données exploitables.
                        </p>
                        <a href="{{ route('service') }}#electronique" class="bg-emerald-500 text-white px-6 py-2 rounded-full font-bold text-sm hover:bg-emerald-400 transition-colors">En savoir plus</a>
                    </div>
                </div>
            </div>

            <div class="flip-card h-96 w-full perspective group cursor-pointer">
                <div class="flip-card-inner relative w-full h-full transition-transform duration-700 preserve-3d group-hover:rotate-y-180">
                    <div class="absolute inset-0 w-full h-full backface-hidden rounded-3xl overflow-hidden shadow-lg">
                        <img src="/media/img/services/solution-ged.jpg" class="w-full h-full object-cover" loading="lazy" decoding="async">
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-slate-900/20 to-transparent flex items-end p-8">
                            <h3 class="text-xl font-bold text-white uppercase tracking-wider">GEIDE</h3>
                        </div>
                    </div>
                    <div class="absolute inset-0 w-full h-full backface-hidden rotate-y-180 rounded-3xl bg-slate-900 flex flex-col items-center justify-center p-8 text-center text-white shadow-xl">
                        <div class="mb-4 text-4xl">📋</div>
                        <h3 class="text-xl font-bold mb-4">GEIDE</h3>
                        <p class="text-sm text-blue-50 leading-relaxed mb-6">
                            Logiciels de Gestion Électronique des Informations et Documents d'Entreprise adaptés à vos besoins.
                        </p>
                        <a href="{{route('service')}}#logiciel" class="bg-emerald-500 text-white px-6 py-2 rounded-full font-bold text-sm hover:bg-emerald-400 transition-colors">En savoir plus</a>
                    </div>
                </div>
            </div>

            <div class="flip-card h-96 w-full perspective group cursor-pointer">
                <div class="flip-card-inner relative w-full h-full transition-transform duration-700 preserve-3d group-hover:rotate-y-180">
                    <div class="absolute inset-0 w-full h-full backface-hidden rounded-3xl overflow-hidden shadow-lg">
                        <img src="/media/img/services/solution-sae.jpeg" class="w-full h-full object-cover" loading="lazy" decoding="async">
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-slate-900/20 to-transparent flex items-end p-8">
                            <h3 class="text-xl font-bold text-white uppercase tracking-wider">Dématerialisation</h3>
                        </div>
                    </div>
                    <div class="absolute inset-0 w-full h-full backface-hidden rotate-y-180 rounded-3xl bg-slate-900 flex flex-col items-center justify-center p-8 text-center text-white shadow-xl">
                        <div class="mb-4 text-4xl">🛡️</div>
                        <h3 class="text-xl font-bold mb-4">Dématerialisation</h3>
                        <p class="text-sm text-purple-50 leading-relaxed mb-6">
                            Passez au numérique avec notre service de dématérialisation complet, réduisez les coûts et améliorez l'efficacité opérationnelle.
                        </p>
                        <a href="{{ route('service') }}#dematerialisation" class="bg-emerald-500 text-white px-6 py-2 rounded-full font-bold text-sm hover:bg-emerald-400 transition-colors">En savoir plus</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<script>
    // Script pour gérer le flip au clic sur mobile (tactile)
    document.querySelectorAll('.flip-card').forEach(card => {
        card.addEventListener('click', function() {
            // On vérifie si on est sur un écran mobile/tablette
            if (window.innerWidth < 1024) {
                const inner = this.querySelector('.flip-card-inner');
                inner.classList.toggle('is-flipped');
            }
        });
    });
</script>
