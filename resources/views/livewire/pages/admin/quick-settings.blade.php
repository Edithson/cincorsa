<?php

use Livewire\Volt\Component;
use App\Models\Setting;

new class extends Component {
    public string $name = '';
    public string $slogan = '';
    public string $email = '';

    public function mount()
    {
        $settings = Setting::getCachedSettings();
        $this->name = $settings->name ?? 'CINV-CORSA';
        $this->slogan = $settings->slogan ?? '';
        $this->email = $settings->email ?? 'contact@cinvcorsa.com';
    }

    public function save()
    {
        $this->authorize('create', Setting::class);

        $this->validate([
            'name' => 'required|string|max:255',
            'slogan' => 'nullable|string|max:255',
            'email' => 'required|email|max:255',
        ]);

        Setting::updateOrCreate(
            ['id' => 1],
            [
                'name' => $this->name,
                'slogan' => $this->slogan,
                'email' => $this->email,
            ]
        );

        Setting::clearCache();

        session()->flash('status', 'quick-settings-saved');
        $this->dispatch('quick-settings-saved');
    }
}; ?>

<div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
    <div class="flex items-center justify-between mb-4">
        <h3 class="text-lg font-bold text-slate-800">Paramètres Rapides du Site</h3>
        @can('viewAny', App\Models\Setting::class)
            <a href="{{ route('settings.index') }}" class="text-xs font-bold text-emerald-600 hover:underline">Tous les réglages →</a>
        @endcan
    </div>

    <form wire:submit="save" class="space-y-4">
        <div>
            <label class="text-xs font-bold text-gray-500 uppercase">Nom du site</label>
            <input wire:model="name" type="text"
                class="w-full mt-1 px-4 py-2 bg-gray-50 border border-gray-200 rounded-lg text-sm focus:ring-4 focus:ring-emerald-500/10 focus:border-emerald-500 outline-none transition-all">
            @error('name') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="text-xs font-bold text-gray-500 uppercase">Slogan</label>
            <input wire:model="slogan" type="text" placeholder="Ex: Solutions Documentaires"
                class="w-full mt-1 px-4 py-2 bg-gray-50 border border-gray-200 rounded-lg text-sm focus:ring-4 focus:ring-emerald-500/10 focus:border-emerald-500 outline-none transition-all">
            @error('slogan') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="text-xs font-bold text-gray-500 uppercase">Email de contact</label>
            <input wire:model="email" type="email"
                class="w-full mt-1 px-4 py-2 bg-gray-50 border border-gray-200 rounded-lg text-sm focus:ring-4 focus:ring-emerald-500/10 focus:border-emerald-500 outline-none transition-all">
            @error('email') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
        </div>

        @can('create', App\Models\Setting::class)
            <div class="pt-2">
                <button type="submit"
                    wire:loading.attr="disabled"
                    class="w-full bg-slate-900 text-white py-2.5 rounded-lg font-bold text-sm hover:bg-emerald-600 transition-all shadow-md active:scale-95 disabled:opacity-50">
                    <span wire:loading.remove wire:target="save">Sauvegarder les modifications</span>
                    <span wire:loading wire:target="save" class="inline-flex items-center gap-2">
                        <svg class="animate-spin h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                        <span>Enregistrement...</span>
                    </span>
                </button>
            </div>
        @endcan

        @if (session('status') === 'quick-settings-saved')
            <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)" class="text-xs text-emerald-600 font-bold text-center mt-2 flex items-center justify-center gap-1">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                <span>Paramètres enregistrés avec succès !</span>
            </div>
        @endif
    </form>
</div>
