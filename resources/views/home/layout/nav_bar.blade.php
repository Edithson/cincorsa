<!-- Navigation -->
<nav class="fixed top-0 left-0 right-0 z-50" id="navbar">
    <div class="container mx-auto px-6 py-4">
        <div class="flex items-center justify-between">
            <!-- Logo -->
            <div class="flex items-center space-x-3">
                <div class="w-12 h-12 rounded-full flex items-center justify-center shadow-lg">
                    <img src="{{ asset('media/img/logo.png') }}" alt="Logo CINV-CORSA">
                </div>
                <div>
                    <h1 class="text-xl font-bold text-gray-800">CINV-CORSA</h1>
                    <p class="text-xs text-gray-500">Solutions Documentaires</p>
                </div>
            </div>

            <!-- Desktop Menu -->
            <div class="hidden lg:flex items-center space-x-8">
                <a href="{{route('home')}}" class="text-gray-700 hover:text-green-600 font-medium transition">Accueil</a>
                <a href="{{route('service')}}" class="text-gray-700 hover:text-green-600 font-medium transition">Services</a>
                <a href="{{route('about')}}" class="text-gray-700 hover:text-green-600 font-medium transition">À propos</a>
                <a href="{{route('contact')}}" class="text-gray-700 hover:text-green-600 font-medium transition">Contact</a>
                <a href="{{route('contact')}}" class="btn-primary text-sm">Demander un devis</a>
            </div>

            <!-- Mobile Menu Button -->
            <button id="mobile-btn" class="lg:hidden text-gray-700 focus:outline-none">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </div>
    </div>
</nav>

<!-- Mobile Menu Overlay -->
<div class="mobile-overlay" id="mobile-overlay"></div>

<!-- Mobile Menu -->
<div class="mobile-menu" id="mobile-menu">
    <button id="close-mobile" class="absolute top-6 right-6 text-gray-700">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
        </svg>
    </button>

    <div class="mt-12 space-y-6">
        <a href="{{route('home')}}" class="block text-lg font-medium text-gray-700 hover:text-green-600">Accueil</a>
        <a href="{{route('service')}}" class="block text-lg font-medium text-gray-700 hover:text-green-600">Services</a>
        <a href="{{route('about')}}" class="block text-lg font-medium text-gray-700 hover:text-green-600">À propos</a>
        <a href="{{route('contact')}}" class="block text-lg font-medium text-gray-700 hover:text-green-600">Contact</a>
        <a href="{{route('contact')}}" class="btn-primary mt-6">Demander un devis</a>
    </div>
</div>
