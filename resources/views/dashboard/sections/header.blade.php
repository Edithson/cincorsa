<header class="h-16 bg-white border-b border-gray-200 flex items-center justify-between px-4 lg:px-8 pt-1 pb-1 shadow-sm">
    <button id="menu-btn" class="lg:hidden p-2 text-slate-600">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path d="M4 6h16M4 12h16M4 18h16"></path>
        </svg>
    </button>
    <div class="flex items-center space-x-4">
        <div class="text-right hidden sm:block">
            <p class="text-sm font-bold text-slate-800">Admin CINV-COR</p>
            <p class="text-xs text-slate-500">{{ Auth::user()->email }}</p>
        </div>
        <img src="{{ asset('media/img/socials/profil.svg') }}" alt="User Avatar"
            class="w-10 h-10 rounded-full border-2 border-white shadow-sm">
    </div>
</header>
