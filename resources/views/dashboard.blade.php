<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-cyan-400 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            {{-- WELCOME MESSAGE --}}
            <div class="bg-gray-800 border border-gray-700 overflow-hidden shadow-sm sm:rounded-lg p-6 mb-6">
                <div class="text-gray-100 text-lg">
                    Selamat Datang, <span class="font-bold text-cyan-400">{{ Auth::user()->name }}</span>! 👋
                    <p class="text-sm text-gray-400 mt-1">Ini adalah pusat kendali portofolio Anda.</p>
                </div>
            </div>

            {{-- STATISTIK CARDS --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                
                {{-- Card Project --}}
                <div class="bg-gray-800 border border-gray-700 p-6 rounded-lg shadow-lg flex items-center justify-between">
                    <div>
                        <h3 class="text-gray-400 text-sm font-bold uppercase">Total Project</h3>
                        <p class="text-3xl font-extrabold text-white mt-2">{{ $totalProjects }}</p>
                    </div>
                    <div class="p-3 bg-cyan-900/50 rounded-full text-cyan-400">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                    </div>
                </div>

                {{-- Card Skill --}}
                <div class="bg-gray-800 border border-gray-700 p-6 rounded-lg shadow-lg flex items-center justify-between">
                    <div>
                        <h3 class="text-gray-400 text-sm font-bold uppercase">Total Skill</h3>
                        <p class="text-3xl font-extrabold text-white mt-2">{{ $totalSkills }}</p>
                    </div>
                    <div class="p-3 bg-purple-900/50 rounded-full text-purple-400">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                    </div>
                </div>

                {{-- Card Sertifikat --}}
                <div class="bg-gray-800 border border-gray-700 p-6 rounded-lg shadow-lg flex items-center justify-between">
                    <div>
                        <h3 class="text-gray-400 text-sm font-bold uppercase">Total Sertifikat</h3>
                        <p class="text-3xl font-extrabold text-white mt-2">{{ $totalCertificates }}</p>
                    </div>
                    <div class="p-3 bg-yellow-900/50 rounded-full text-yellow-400">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>