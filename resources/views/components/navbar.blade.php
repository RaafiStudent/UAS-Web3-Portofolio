{{-- HEADER/NAVIGASI UTAMA (RESPONSIF) --}}
<header class="bg-[#0B0F19] shadow-lg fixed w-full z-20">
    <nav class="container mx-auto px-6 py-4 flex justify-between items-center">
        <a href="/" class="text-2xl font-bold text-cyan-400">Raafi.dev</a>
        
        @php
            // Mendefinisikan kelas styling untuk link navigasi
            $activeClasses = 'bg-cyan-500 text-gray-900 font-semibold';
            $inactiveClasses = 'text-gray-100 hover:text-cyan-400';
        @endphp

        {{-- NAVIGASI DESKTOP --}}
        {{-- Mengubah space-x-8 menjadi space-x-4 agar padding muat --}}
        <div class="space-x-4 hidden md:flex items-center">
            
            {{-- Setiap link <a> sekarang memiliki padding (px-3 py-1) dan logika kondisional --}}

            <a href="/home" class="px-3 py-1 rounded-md transition-colors duration-300 {{ (request()->is('home') || request()->is('/')) ? $activeClasses : $inactiveClasses }}">
                Home
            </a>

            <a href="/about" class="px-3 py-1 rounded-md transition-colors duration-300 {{ request()->is('about') ? $activeClasses : $inactiveClasses }}">
                About
            </a>

            <a href="/skills" class="px-3 py-1 rounded-md transition-colors duration-300 {{ request()->is('skills') ? $activeClasses : $inactiveClasses }}">
                Skills
            </a>

            <a href="/projects" class="px-3 py-1 rounded-md transition-colors duration-300 {{ request()->is('projects') ? $activeClasses : $inactiveClasses }}">
                Projects
            </a>

            <a href="/certificates" class="px-3 py-1 rounded-md transition-colors duration-300 {{ request()->is('certificates') ? $activeClasses : $inactiveClasses }}">
                Sertifikat
            </a>

            <a href="/contact" class="px-3 py-1 rounded-md transition-colors duration-300 {{ (request()->is('contact') || request()->is('kontak')) ? $activeClasses : $inactiveClasses }}">
                Contact
            </a>
        </div>

        {{-- TOMBOL HAMBURGER --}}
        <div class="flex items-center md:hidden">
            <button id="mobile-menu-button" class="text-cyan-400 focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                </svg>
            </button>
        </div>
    </nav>
</header>

{{-- MENU MOBILE OVERLAY --}}
<div id="mobile-menu" class="hidden md:hidden fixed top-20 left-0 w-full h-full bg-[#0B0F19] bg-opacity-95 z-40 p-4">
    <div class="flex flex-col items-center space-y-6 py-8">
        <a href="/home" class="text-xl hover:text-cyan-400 transition-colors duration-300">Home</a>
        <a href="/about" class="text-xl hover:text-cyan-400 transition-colors duration-300">About</a>
        <a href="/skills" class="text-xl hover:text-cyan-400 transition-colors duration-300">Skills</a>
        <a href="/projects" class="text-xl hover:text-cyan-400 transition-colors duration-300">Projects</a>
        <a href="/certificates" class="text-xl hover:text-cyan-400 transition-colors duration-300">Sertifikat</a>
        <a href="/contact" class="text-xl hover:text-cyan-400 transition-colors duration-300">Contact</a>
    </div>
</div>

{{-- JAVASCRIPT (Tidak berubah) --}}
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const button = document.getElementById('mobile-menu-button');
        const menu = document.getElementById('mobile-menu');

        button.addEventListener('click', function() {
            menu.classList.toggle('hidden');
        });
        
        menu.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', () => {
                menu.classList.add('hidden');
            });
        });
    });
</script>