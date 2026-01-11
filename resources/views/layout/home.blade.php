<x-layout :title="$title ?? 'Home'">
    <section class="min-h-screen flex items-center justify-center text-center px-4" style="background: radial-gradient(circle at center, rgba(0, 188, 212, 0.05) 0%, rgba(11, 15, 25, 1) 70%);">
        <div class="py-20">
            <span class="text-lg text-gray-400">Halo, saya</span>
            <h1 class="text-4xl sm:text-6xl md:text-8xl font-extrabold my-4 text-gradient-home">
                Muhammad Raafi Juliyanto
            </h1>
            <h2 class="text-xl sm:text-2xl md:text-3xl font-semibold text-gray-300 mb-8">
                Mahasiswa Teknik Komputer & Web Developer
            </h2>
            
            <div class="flex flex-col sm:flex-row justify-center gap-4 sm:gap-6">
                <a href="/projects" class="bg-gradient-custom text-white px-8 py-3 rounded-full font-semibold transition-transform duration-300 hover:scale-105 shadow-xl shadow-indigo-500/50 w-full sm:w-auto">
                    Lihat Proyek Saya
                </a>
                <a href="/contact" class="border border-cyan-500 text-cyan-400 px-8 py-3 rounded-full font-semibold transition-colors duration-300 hover:bg-cyan-500 hover:text-white w-full sm:w-auto mt-2 sm:mt-0">
                    Hubungi Saya
                </a>
            </div>
            
            <a href="/about" class="block mt-20 text-gray-500 hover:text-cyan-400 transition-colors duration-500">
                <svg class="w-8 h-8 mx-auto animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
            </a>
        </div>
    </section>
</x-layout>