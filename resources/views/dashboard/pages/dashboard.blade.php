@extends('dashboard.index')

@section('content')
    @include('dashboard.sections.header')

    <div class="p-4 lg:p-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                <p class="text-sm text-gray-500 font-medium">Articles publiés</p>
                <h3 class="text-3xl font-black text-slate-800 mt-1">24</h3>
                <span class="text-xs text-emerald-600 font-bold">+2 ce mois</span>
            </div>
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                <p class="text-sm text-gray-500 font-medium">Inscrits Newsletter</p>
                <h3 class="text-3xl font-black text-slate-800 mt-1">1,240</h3>
                <span class="text-xs text-blue-600 font-bold">Taux de croissance 12%</span>
            </div>
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                <p class="text-sm text-gray-500 font-medium">Demandes d'Audit</p>
                <h3 class="text-3xl font-black text-slate-800 mt-1">08</h3>
                <span class="text-xs text-orange-600 font-bold">4 en attente</span>
            </div>
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                <p class="text-sm text-gray-500 font-medium">Santé du Site</p>
                <h3 class="text-3xl font-black text-emerald-500 mt-1">98%</h3>
                <span class="text-xs text-gray-400">Optimisé</span>
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div
                class="p-6 border-b border-gray-100 flex flex-col sm:flex-row justify-between items-center gap-4">
                <h3 class="text-xl font-bold text-slate-800">Derniers Articles du Blog</h3>
                <button
                    class="bg-emerald-600 text-white px-4 py-2 rounded-lg text-sm font-bold hover:bg-emerald-700 transition-colors">
                    + Nouvel Article
                </button>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead class="bg-gray-50 text-slate-500 text-xs uppercase font-bold">
                        <tr>
                            <th class="px-6 py-4">Titre de l'article</th>
                            <th class="px-6 py-4">Catégorie</th>
                            <th class="px-6 py-4">Date</th>
                            <th class="px-6 py-4">Statut</th>
                            <th class="px-6 py-4">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 text-sm">
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4 font-semibold text-slate-700">L'importance du SAE en 2024</td>
                            <td class="px-6 py-4 text-slate-500">Ingénierie</td>
                            <td class="px-6 py-4 text-slate-500">12 Déc 2025</td>
                            <td class="px-6 py-4">
                                <span
                                    class="bg-emerald-100 text-emerald-700 px-3 py-1 rounded-full text-xs font-bold">Publié</span>
                            </td>
                            <td class="px-6 py-4 space-x-2">
                                <button class="text-blue-600 hover:underline">Editer</button>
                                <button class="text-red-600 hover:underline">Supprimer</button>
                            </td>
                        </tr>
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4 font-semibold text-slate-700">Réforme de l'archivage au
                                Cameroun</td>
                            <td class="px-6 py-4 text-slate-500">Réglementation</td>
                            <td class="px-6 py-4 text-slate-500">05 Déc 2025</td>
                            <td class="px-6 py-4">
                                <span
                                    class="bg-orange-100 text-orange-700 px-3 py-1 rounded-full text-xs font-bold">Brouillon</span>
                            </td>
                            <td class="px-6 py-4 space-x-2">
                                <button class="text-blue-600 hover:underline">Editer</button>
                                <button class="text-red-600 hover:underline">Supprimer</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="mt-8 grid lg:grid-cols-2 gap-8">
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                <h3 class="text-lg font-bold text-slate-800 mb-4">Paramètres Généraux</h3>
                <div class="space-y-4">
                    <div>
                        <label class="text-xs font-bold text-gray-500 uppercase">Nom du site</label>
                        <input type="text" value="CINV-COR S.A"
                            class="w-full mt-1 px-4 py-2 bg-gray-50 border border-gray-200 rounded-lg text-sm">
                    </div>
                    <div>
                        <label class="text-xs font-bold text-gray-500 uppercase">Email de contact</label>
                        <input type="email" value="contact@cinvcorsa.com"
                            class="w-full mt-1 px-4 py-2 bg-gray-50 border border-gray-200 rounded-lg text-sm">
                    </div>
                    <button class="w-full bg-slate-900 text-white py-2 rounded-lg font-bold text-sm">Sauvegarder
                        les modifications</button>
                </div>
            </div>

            <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                <h3 class="text-lg font-bold text-slate-800 mb-4">Dernières Inscriptions Newsletter</h3>
                <div class="space-y-4">
                    <div class="flex items-center justify-between p-3 bg-gray-50 rounded-xl">
                        <span class="text-sm font-medium">test@client.cm</span>
                        <span class="text-xs text-gray-400">Il y a 2h</span>
                    </div>
                    <div class="flex items-center justify-between p-3 bg-gray-50 rounded-xl">
                        <span class="text-sm font-medium">manager@entreprise.fr</span>
                        <span class="text-xs text-gray-400">Il y a 5h</span>
                    </div>
                    <button
                        class="w-full border-2 border-gray-100 text-slate-600 py-2 rounded-lg font-bold text-sm hover:bg-gray-50">Voir
                        toute la liste</button>
                </div>
            </div>
        </div>

    </div>

@endsection
