<?php

use Livewire\Volt\Component;
use Livewire\WithPagination;
use App\Models\Contact;

new class extends Component {
    use WithPagination;

    public $search = '';
    public $serviceFilter = '';

    // Réinitialiser la page quand on recherche ou filtre
    public function updatingSearch() { $this->resetPage(); }
    public function updatingServiceFilter() { $this->resetPage(); }

    public function delete($id)
    {
        Contact::findOrFail($id)->delete();
        $this->dispatch('swal:success', ['message' => 'Contact supprimé.']);
    }

    public function with()
    {
        return [
            'contacts' => Contact::query()
                ->when($this->search, function($query) {
                    $query->where('name', 'like', '%' . $this->search . '%')
                          ->orWhere('email', 'like', '%' . $this->search . '%')
                          ->orWhere('company', 'like', '%' . $this->search . '%');
                })
                ->when($this->serviceFilter, function($query) {
                    $query->where('service', $this->serviceFilter);
                })
                ->latest()
                ->paginate(10),
        ];
    }
}; ?>

<div class="p-6 bg-white rounded-xl shadow-sm">
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-6">
        <h2 class="text-2xl font-bold text-slate-800">Messages de Contact</h2>

        <div class="flex flex-wrap gap-3">
            <input wire:model.live.debounce.300ms="search" type="text" placeholder="Rechercher..."
                   class="px-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-emerald-500 outline-none">

            <select wire:model.live="serviceFilter" class="px-4 py-2 border border-gray-200 rounded-lg outline-none">
                <option value="">Tous les services</option>
                <option value="Archivage Manuel">Archivage Manuel</option>
                <option value="Archivage Électronique (SAE)">Archivage Électronique (SAE)</option>
                <option value="GEIDE / Dématérialisation">GEIDE / Dématérialisation</option>
                <option value="Audit & Conseil">Audit & Conseil</option>
            </select>
        </div>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-slate-50 border-b border-gray-100">
                    <th class="p-4 font-semibold text-slate-600">Date</th>
                    <th class="p-4 font-semibold text-slate-600">Nom & Entreprise</th>
                    <th class="p-4 font-semibold text-slate-600">Service</th>
                    <th class="p-4 font-semibold text-slate-600">Message</th>
                    <th class="p-4 font-semibold text-slate-600 text-right">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($contacts as $contact)
                    <tr class="border-b border-gray-50 hover:bg-slate-50/50 transition-colors">
                        <td class="p-4 text-sm text-slate-500">{{ $contact->created_at->format('d/m/Y H:i') }}</td>
                        <td class="p-4">
                            <div class="font-medium text-slate-900">{{ $contact->name }}</div>
                            <div class="text-xs text-slate-500">{{ $contact->email }} @if($contact->company) | {{ $contact->company }} @endif</div>
                        </td>
                        <td class="p-4">
                            <span class="px-3 py-1 text-xs font-medium rounded-full bg-emerald-100 text-emerald-700">
                                {{ $contact->service }}
                            </span>
                        </td>
                        <td class="p-4 text-sm text-slate-600">
                            {{ Str::limit($contact->message, 50) }}
                        </td>
                        <td class="p-4 text-right">
                            <button wire:click="delete({{ $contact->id }})"
                                    wire:confirm="Supprimer ce message ?"
                                    class="p-2 text-red-400 hover:text-red-600 transition-colors">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        {{ $contacts->links() }}
    </div>
</div>
