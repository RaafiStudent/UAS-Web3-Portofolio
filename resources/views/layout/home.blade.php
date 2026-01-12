<x-layout title="Home">
    {{-- HERO SECTION --}}
    <section class="relative bg-[#0B0F19] text-white py-32 overflow-hidden">
        <div class="absolute top-0 left-0 w-full h-full bg-gradient-to-br from-cyan-900/20 to-purple-900/20"></div>
        <div class="container mx-auto px-6 relative z-10 flex flex-col-reverse md:flex-row items-center">
            <div class="md:w-1/2 text-center md:text-left">
                <h2 class="text-cyan-400 font-bold tracking-wider mb-2">HALO, SAYA</h2>
                <h1 class="text-5xl md:text-7xl font-extrabold mb-6 leading-tight">
                    Muhammad <br> <span class="text-transparent bg-clip-text bg-gradient-to-r from-cyan-400 to-blue-600">Raafi</span> Juliyanto
                </h1>
                <p class="text-gray-400 text-lg mb-8 max-w-lg mx-auto md:mx-0">
                    Mahasiswa D3 Teknik Komputer yang berfokus pada pengembangan web (Laravel) dan IoT (Arduino). Siap menciptakan solusi digital yang inovatif.
                </p>
                <div class="flex gap-4 justify-center md:justify-start">
                    <a href="#projects" class="bg-cyan-500 hover:bg-cyan-600 text-gray-900 font-bold py-3 px-8 rounded-full transition transform hover:scale-105">
                        Lihat Karya
                    </a>
                    <a href="{{ route('contact') }}" class="border border-gray-600 hover:border-cyan-400 hover:text-cyan-400 text-gray-300 font-bold py-3 px-8 rounded-full transition">
                        Hubungi Saya
                    </a>
                </div>
            </div>
            
            {{-- FOTO PROFIL (Ganti src-nya sesuai foto Boss) --}}
            <div class="md:w-1/2 flex justify-center mb-10 md:mb-0">
                <div class="relative w-64 h-64 md:w-80 md:h-80">
                    <div class="absolute inset-0 bg-cyan-500 rounded-full blur-2xl opacity-20 animate-pulse"></div>
                    <img src="{{ asset('images/me.jpg') }}" alt="Profile" class="relative w-full h-full object-cover rounded-full border-4 border-gray-800 shadow-2xl">
                </div>
            </div>
        </div>
    </section>

    {{-- SECTION SKILLS (Preview 6 Skill Teratas) --}}
    <section class="py-20 bg-[#141822]">
        <div class="container mx-auto px-6">
            <div class="flex justify-between items-end mb-12">
                <div>
                    <h2 class="text-3xl font-bold text-white mb-2">Tech Stack</h2>
                    <p class="text-gray-400">Teknologi yang saya gunakan</p>
                </div>
                <a href="{{ route('skills') }}" class="text-cyan-400 hover:text-cyan-300 font-medium hidden md:block">Lihat Semua Skill &rarr;</a>
            </div>

            <div class="grid grid-cols-3 sm:grid-cols-4 lg:grid-cols-6 gap-6">
                @foreach ($skills->take(6) as $skill) 
                {{-- Kita cuma ambil 6 skill buat di Home biar gak kepanjangan --}}
                    <div class="bg-[#0B0F19] p-4 rounded-xl border border-gray-700 flex flex-col items-center justify-center hover:border-cyan-500 transition duration-300 group"
                         style="border-color: {{ $skill->color }}">
                        @if($skill->image)
                            <img src="{{ asset('storage/' . $skill->image) }}" class="h-10 w-10 mb-2 object-contain group-hover:scale-110 transition duration-300">
                        @endif
                        <span class="text-gray-300 font-medium text-sm">{{ $skill->name }}</span>
                    </div>
                @endforeach
            </div>

            <div class="mt-8 text-center md:hidden">
                <a href="{{ route('skills') }}" class="text-cyan-400 font-medium">Lihat Semua Skill &rarr;</a>
            </div>
        </div>
    </section>

    {{-- SECTION PROJECTS (Preview 3 Project Terbaru) --}}
    <section id="projects" class="py-20 bg-[#0B0F19]">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-white mb-4">Project Terbaru</h2>
                <div class="w-20 h-1 bg-cyan-500 mx-auto rounded"></div>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($projects->take(3) as $project)
                {{-- Kita cuma ambil 3 project buat di Home --}}
                    <div class="bg-[#141822] rounded-xl overflow-hidden border border-gray-700 hover:border-cyan-500/50 transition duration-300 group">
                        <div class="h-48 overflow-hidden relative">
                            <img src="{{ asset('storage/' . $project->image) }}" class="w-full h-full object-cover transform group-hover:scale-110 transition duration-500">
                            <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition duration-300 flex items-center justify-center">
                                <a href="{{ route('projects') }}" class="bg-cyan-500 text-black font-bold py-2 px-6 rounded-full transform translate-y-4 group-hover:translate-y-0 transition duration-300">Detail</a>
                            </div>
                        </div>
                        <div class="p-6">
                            <span class="text-xs text-cyan-400 font-bold tracking-wider uppercase">{{ $project->date }}</span>
                            <h3 class="text-xl font-bold text-white mt-2 mb-3 group-hover:text-cyan-400 transition">{{ $project->title }}</h3>
                            <p class="text-gray-400 text-sm line-clamp-2">{{ $project->description }}</p>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-12 text-center">
                <a href="{{ route('projects') }}" class="inline-block border border-gray-600 text-gray-300 hover:bg-cyan-500 hover:text-black hover:border-cyan-500 font-bold py-3 px-8 rounded-full transition duration-300">
                    Lihat Semua Project
                </a>
            </div>
        </div>
    </section>
</x-layout>