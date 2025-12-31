@extends('dashboard.index')

@section('content')
<div class="p-6">
    <div class="flex justify-between items-center mb-8">
        <div>
            <h1 class="text-3xl font-extrabold text-slate-900">Articles</h1>
            <p class="text-slate-500">Gérez le contenu éditorial de CINV-CORSA</p>
        </div>
        <a href="{{ route('articles.create') }}" class="bg-emerald-600 hover:bg-emerald-700 text-white px-6 py-3 rounded-xl font-bold transition-all shadow-lg shadow-emerald-500/20">
            Nouvel Article
        </a>
    </div>

    <livewire:pages.admin.article-list />
</div>
@endsection
