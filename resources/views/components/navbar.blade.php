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
        <div class="hidden md:flex space-x-8 items-center">
            
            <a href="{{ route('home') }}" class="text-gray-300 hover:text-white transition font-medium">Home</a>
            <a href="{{ route('about') }}" class="text-gray-300 hover:text-white transition font-medium">About</a>
            <a href="{{ route('skills') }}" class="text-gray-300 hover:text-white transition font-medium">Skills</a>
            <a href="{{ route('projects') }}" class="text-gray-300 hover:text-white transition font-medium">Projects</a>
            <a href="{{ route('certificates') }}" class="text-gray-300 hover:text-white transition font-medium">Sertifikat</a>
            <a href="{{ route('contact') }}" class="text-gray-300 hover:text-white transition font-medium">Contact</a>

            {{-- LOGIKA TOMBOL LOGIN / DASHBOARD --}}
            @if (Route::has('login'))
                @auth
                    {{-- Kalau Sudah Login: Muncul Tombol Dashboard --}}
                    <a href="{{ url('/dashboard') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-lg font-bold transition shadow-md hover:shadow-lg">
                        Dashboard
                    </a>
                @else
                    {{-- Kalau Belum Login: Muncul Tombol Login --}}
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
{{-- MENU MOBILE OVERLAY (Muncul saat diklik hamburger) --}}
{{-- ==================================================== --}}
<div id="mobile-menu" class="hidden fixed inset-0 bg-[#0B0F19] z-40 flex flex-col items-center justify-center space-y-8 transition-opacity duration-300">
    
    {{-- Tombol Close (Optional, klik link juga nutup) --}}
    <button id="close-menu-button" class="absolute top-6 right-6 text-gray-400 hover:text-white md:hidden">
        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
        </svg>
    </button>

    <a href="{{ route('home') }}" class="text-2xl text-gray-200 hover:text-cyan-400 font-semibold transition">Home</a>
    <a href="{{ route('about') }}" class="text-2xl text-gray-200 hover:text-cyan-400 font-semibold transition">About</a>
    <a href="{{ route('skills') }}" class="text-2xl text-gray-200 hover:text-cyan-400 font-semibold transition">Skills</a>
    <a href="{{ route('projects') }}" class="text-2xl text-gray-200 hover:text-cyan-400 font-semibold transition">Projects</a>
    <a href="{{ route('certificates') }}" class="text-2xl text-gray-200 hover:text-cyan-400 font-semibold transition">Sertifikat</a>
    <a href="{{ route('contact') }}" class="text-2xl text-gray-200 hover:text-cyan-400 font-semibold transition">Contact</a>

    {{-- LOGIN UNTUK MOBILE --}}
    <div class="pt-4 border-t border-gray-800 w-full flex justify-center">
        @if (Route::has('login'))
            @auth
                <a href="{{ url('/dashboard') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-lg font-bold text-xl transition">
                    Dashboard
                </a>
            @else
                <a href="{{ route('login') }}" class="text-cyan-400 hover:text-white border border-cyan-400 px-8 py-3 rounded-lg font-bold text-xl transition hover:bg-cyan-400/10">
                    Log in
                </a>
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

        // Fungsi Buka/Tutup Menu
        function toggleMenu() {
            menu.classList.toggle('hidden');
        }

        button.addEventListener('click', toggleMenu);
        
        if(closeButton) {
            closeButton.addEventListener('click', toggleMenu);
        }

        // Tutup menu saat salah satu link diklik
        menu.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', () => {
                menu.classList.add('hidden');
            });
        });
    });
</script>