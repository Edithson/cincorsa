<?php

use Livewire\Volt\Component;
use App\Models\Contact;
use App\Models\Setting;
use App\Mail\ContactRequestMail;
use Illuminate\Support\Facades\Mail;

new class extends Component {
    // Initialisation propre des propriétés
    public $name = '';
    public $company = '';
    public $email = '';
    public $service = 'Archivage Manuel';
    public $message = '';

    protected $rules = [
        'name' => 'required|min:3',
        'email' => 'required|email',
        'service' => 'required',
        'message' => 'required|min:10',
    ];

    protected $messages = [
        'name.required' => 'Le nom est obligatoire.',
        'name.min' => 'Le nom doit contenir au moins 3 caractères.',
        'email.required' => 'L\'adresse email est requise.',
        'email.email' => 'Format d\'email invalide.',
        'message.required' => 'Veuillez saisir votre message.',
        'message.min' => 'Votre message est trop court (min. 10 caractères).',
    ];

    public function send()
    {
        // Validation explicite
        $validated = $this->validate();

        try {
            // 1. Sauvegarde en BDD
            Contact::create([
                'name' => $this->name,
                'company' => $this->company,
                'email' => $this->email,
                'service' => $this->service,
                'message' => $this->message,
            ]);

            // 2. Récupération de l'email admin (via cache performant)
            $settings = Setting::getCachedSettings();
            $adminEmail = $settings->email ?? 'contact@cinvcorsa.com';

            // 3. Envoi du Mail avec le design Markdown
            Mail::to($adminEmail)->send(new ContactRequestMail($validated));

            $this->reset(['name', 'company', 'email', 'message']);

            // Dispatch pour le Toast SweetAlert2
            $this->dispatch('contact-sent', [
                'type' => 'success',
                'message' => 'Votre demande a été transmise avec succès !'
            ]);

        } catch (\Exception $e) {
            \Log::error("Erreur Contact: " . $e->getMessage());
            $this->dispatch('contact-sent', [
                'type' => 'error',
                'message' => 'Une erreur est survenue lors de l\'envoi.'
            ]);
        }
    }
}; ?>

<div>
    {{-- On utilise wire:submit.prevent pour bloquer le rechargement navigateur --}}
    <form wire:submit.prevent="send" class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="md:col-span-1">
            <label class="block text-sm font-semibold text-gray-700 mb-2">Nom Complet</label>
            <input type="text" wire:model.blur="name" class="w-full px-4 py-3 rounded-xl border @error('name') border-red-500 @else border-gray-200 @enderror outline-none focus:border-emerald-500 transition-all">
            @error('name') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
        </div>

        <div class="md:col-span-1">
            <label class="block text-sm font-semibold text-gray-700 mb-2">Entreprise</label>
            <input type="text" wire:model.blur="company" class="w-full px-4 py-3 rounded-xl border border-gray-200 outline-none">
        </div>

        <div class="md:col-span-1">
            <label class="block text-sm font-semibold text-gray-700 mb-2">Email Professionnel</label>
            <input type="email" wire:model.blur="email" class="w-full px-4 py-3 rounded-xl border @error('email') border-red-500 @else border-gray-200 @enderror outline-none transition-all">
            @error('email') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
        </div>

        <div class="md:col-span-1">
            <label class="block text-sm font-semibold text-gray-700 mb-2">Service d'intérêt</label>
            <select wire:model.change="service" class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-white outline-none">
                <option value="Archivage Manuel">Archivage Manuel</option>
                <option value="Archivage Électronique (SAE)">Archivage Électronique (SAE)</option>
                <option value="GEIDE / Dématérialisation">GEIDE / Dématérialisation</option>
                <option value="Audit & Conseil">Audit & Conseil</option>
                <option value="Autre">Autre</option>
            </select>
        </div>

        <div class="md:col-span-2">
            <label class="block text-sm font-semibold text-gray-700 mb-2">Votre Message</label>
            <textarea wire:model.blur="message" rows="4" class="w-full px-4 py-3 rounded-xl border @error('message') border-red-500 @else border-gray-200 @enderror outline-none transition-all"></textarea>
            @error('message') <span class="text-red-500 text-xs mt-1">{{ $message }}</span> @enderror
        </div>

        <div class="md:col-span-2">
            {{-- Désactivation automatique pendant le chargement --}}
            <button type="submit"
                    wire:loading.attr="disabled"
                    wire:target="send"
                    class="w-full bg-slate-900 text-white font-bold py-4 rounded-xl hover:bg-emerald-600 disabled:opacity-50 disabled:cursor-not-allowed transition-all shadow-lg flex items-center justify-center space-x-2">

                <span wire:loading.remove wire:target="send">Envoyer la demande</span>
                <span wire:loading wire:target="send" class="flex items-center gap-2">
                    <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    Traitement en cours...
                </span>

                <svg wire:loading.remove wire:target="send" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                </svg>
            </button>
        </div>
    </form>
</div>

<script>
    document.addEventListener('livewire:init', () => {
        Livewire.on('contact-sent', (event) => {
            const data = event[0];
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 4000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
            });

            Toast.fire({
                icon: data.type,
                title: data.message,
                background: data.type === 'success' ? '#ecfdf5' : '#fef2f2',
                color: data.type === 'success' ? '#065f46' : '#991b1b',
            });
        });
    });
</script>
