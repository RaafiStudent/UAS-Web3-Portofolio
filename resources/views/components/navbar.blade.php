{{-- HEADER/NAVIGASI UTAMA (RESPONSIF) --}}
<header class="bg-[#0B0F19] shadow-lg fixed w-full z-50 transition-all duration-300">
    <nav class="container mx-auto px-6 py-4 flex justify-between items-center">
        
        {{-- LOGO --}}
        <a href="{{ route('home') }}" class="text-2xl font-bold text-cyan-400 hover:text-cyan-300 transition">
            Raafi.dev
        </a>

        {{-- ==================================================== --}}
        {{-- MENU DESKTOP (Layar Besar) --}}
        {{-- ==================================================== --}}
        <div class="hidden md:flex space-x-4 items-center">
            
            {{-- Menu Home --}}
            <a href="{{ route('home') }}" 
               class="{{ request()->routeIs('home') ? 'bg-cyan-500 text-gray-900' : 'text-gray-300 hover:text-white hover:bg-gray-800' }} px-4 py-2 rounded-md transition font-medium">
               Home
            </a>

            {{-- Menu About --}}
            <a href="{{ route('about') }}" 
               class="{{ request()->routeIs('about') ? 'bg-cyan-500 text-gray-900' : 'text-gray-300 hover:text-white hover:bg-gray-800' }} px-4 py-2 rounded-md transition font-medium">
               About
            </a>

            {{-- Menu Skills --}}
            <a href="{{ route('skills') }}" 
               class="{{ request()->routeIs('skills') ? 'bg-cyan-500 text-gray-900' : 'text-gray-300 hover:text-white hover:bg-gray-800' }} px-4 py-2 rounded-md transition font-medium">
               Skills
            </a>

            {{-- Menu Projects --}}
            <a href="{{ route('projects') }}" 
               class="{{ request()->routeIs('projects') ? 'bg-cyan-500 text-gray-900' : 'text-gray-300 hover:text-white hover:bg-gray-800' }} px-4 py-2 rounded-md transition font-medium">
               Projects
            </a>

            {{-- Menu Sertifikat --}}
            <a href="{{ route('certificates') }}" 
               class="{{ request()->routeIs('certificates') ? 'bg-cyan-500 text-gray-900' : 'text-gray-300 hover:text-white hover:bg-gray-800' }} px-4 py-2 rounded-md transition font-medium">
               Sertifikat
            </a>

            {{-- Menu Contact --}}
            <a href="{{ route('contact') }}" 
               class="{{ request()->routeIs('contact') ? 'bg-cyan-500 text-gray-900' : 'text-gray-300 hover:text-white hover:bg-gray-800' }} px-4 py-2 rounded-md transition font-medium">
               Contact
            </a>

            {{-- JARAK PEMISAH --}}
            <div class="h-6 w-[1px] bg-gray-700 mx-2"></div>

            {{-- LOGIKA TOMBOL LOGIN / DASHBOARD --}}
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-lg font-bold transition shadow-md">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}" class="text-gray-300 hover:text-white font-bold transition border border-gray-600 px-5 py-2 rounded-lg hover:border-cyan-400 hover:text-cyan-400">
                        Log in
                    </a>
                @endauth
            @endif
        </div>

        {{-- ==================================================== --}}
        {{-- TOMBOL HAMBURGER (Layar HP) --}}
        {{-- ==================================================== --}}
        <div class="flex items-center md:hidden">
            <button id="mobile-menu-button" class="text-cyan-400 hover:text-white focus:outline-none transition">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                </svg>
            </button>
        </div>

    </nav>
</header>

{{-- ==================================================== --}}
{{-- MENU MOBILE OVERLAY --}}
{{-- ==================================================== --}}
<div id="mobile-menu" class="hidden fixed inset-0 bg-[#0B0F19] z-40 flex flex-col items-center justify-center space-y-6 transition-opacity duration-300">
    
    <button id="close-menu-button" class="absolute top-6 right-6 text-gray-400 hover:text-white md:hidden">
        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
        </svg>
    </button>

    <a href="{{ route('home') }}" class="text-2xl {{ request()->routeIs('home') ? 'text-cyan-400' : 'text-gray-200' }} font-semibold transition">Home</a>
    <a href="{{ route('about') }}" class="text-2xl {{ request()->routeIs('about') ? 'text-cyan-400' : 'text-gray-200' }} font-semibold transition">About</a>
    <a href="{{ route('skills') }}" class="text-2xl {{ request()->routeIs('skills') ? 'text-cyan-400' : 'text-gray-200' }} font-semibold transition">Skills</a>
    <a href="{{ route('projects') }}" class="text-2xl {{ request()->routeIs('projects') ? 'text-cyan-400' : 'text-gray-200' }} font-semibold transition">Projects</a>
    <a href="{{ route('certificates') }}" class="text-2xl {{ request()->routeIs('certificates') ? 'text-cyan-400' : 'text-gray-200' }} font-semibold transition">Sertifikat</a>
    <a href="{{ route('contact') }}" class="text-2xl {{ request()->routeIs('contact') ? 'text-cyan-400' : 'text-gray-200' }} font-semibold transition">Contact</a>

    <div class="pt-6 border-t border-gray-800 w-2/3 flex justify-center">
        @if (Route::has('login'))
            @auth
                <a href="{{ url('/dashboard') }}" class="bg-blue-600 text-white px-8 py-3 rounded-lg font-bold text-xl w-full text-center">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="text-cyan-400 border border-cyan-400 px-8 py-3 rounded-lg font-bold text-xl w-full text-center">Log in</a>
            @endauth
        @endif
    </div>
</div>

{{-- JAVASCRIPT --}}
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const button = document.getElementById('mobile-menu-button');
        const closeButton = document.getElementById('close-menu-button');
        const menu = document.getElementById('mobile-menu');

        function toggleMenu() {
            menu.classList.toggle('hidden');
        }

        button.addEventListener('click', toggleMenu);
        if(closeButton) closeButton.addEventListener('click', toggleMenu);

        menu.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', () => menu.classList.add('hidden'));
        });
    });
</script>