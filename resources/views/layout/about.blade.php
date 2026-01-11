<x-layout :title="$title ?? 'About Me'">
    <section class="py-20 bg-[#0F131D]">
        <div class="container mx-auto px-6 max-w-6xl">
            <h2 class="text-4xl font-bold text-center mb-12 text-cyan-400">Tentang Saya</h2>
            
            <div class="flex flex-col md:flex-row items-center gap-12">
                
                <div class="w-full md:w-1/3 flex justify-center">
                    <img src="{{ asset('images/foto-about.jpg') }}" alt="Foto Profil Muhammad Raafi Juliyanto" class="w-64 h-64 sm:w-72 sm:h-72 rounded-full object-cover shadow-2xl border-4 border-cyan-400 transform transition-transform duration-500 hover:scale-105" style="box-shadow: 0 0 50px rgba(0, 188, 212, 0.4);">
                </div>

                <div class="w-full md:w-2/3">
                    <h3 class="text-xl sm:text-3xl font-semibold mb-4">
                        Saya <span class="text-cyan-400">Muhammad Raafi Juliyanto</span>, Mahasiswa Teknik Komputer
                    </h3>
                    <p class="text-gray-400 mb-8 text-justify">
                        Mahasiswa aktif dengan ketertarikan besar di bidang pengembangan perangkat lunak, khususnya pembuatan dan pengembangan website. Saya memiliki dasar akademik yang kuat dan semangat belajar tinggi. Siap belajar hal baru dan berkontribusi secara positif.
                    </p>
                    
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-8">
                        <div class="p-4 bg-[#141822] rounded-lg border border-gray-700 flex items-start gap-3">
                            <svg class="w-5 h-5 text-blue-400 flex-shrink-0 mt-1" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/></svg>
                            <div>
                                <p class="text-gray-400 text-sm">Lokasi</p>
                                <p class="text-gray-100 font-medium">Tegal, Indonesia</p>
                            </div>
                        </div>
                        <div class="p-4 bg-[#141822] rounded-lg border border-gray-700 flex items-start gap-3">
                            <svg class="w-5 h-5 text-teal-400 flex-shrink-0 mt-1" fill="currentColor" viewBox="0 0 24 24"><path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/></svg>
                            <div>
                                <p class="text-gray-400 text-sm">Email</p>
                                <p class="text-gray-100 font-medium">raafistudent@gmail.com</p>
                            </div>
                        </div>
                        <div class="p-4 bg-[#141822] rounded-lg border border-gray-700 flex items-start gap-3">
                            <svg class="w-5 h-5 text-purple-400 flex-shrink-0 mt-1" fill="currentColor" viewBox="0 0 24 24"><path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/></svg>
                            <div>
                                <p class="text-gray-400 text-sm">Telepon</p>
                                <p class="text-gray-100 font-medium">+62 895-6064-01728</p>
                            </div>
                        </div>
                        <div class="p-4 bg-[#141822] rounded-lg border border-gray-700 flex items-start gap-3">
                            <svg class="w-5 h-5 text-yellow-400 flex-shrink-0 mt-1" fill="currentColor" viewBox="0 0 24 24"><path d="M12 3L1 12h3v8h14v-8h3L12 3zm0 13c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/></svg>
                            <div>
                                <p class="text-gray-400 text-sm">Pendidikan</p>
                                <p class="text-gray-100 font-medium">DIII Teknik Komputer, Politeknik Harapan Bersama</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="flex flex-col sm:flex-row gap-4">
                        
                        {{-- ============================================= --}}
                        {{-- ============ PERUBAHAN DI SINI ================ --}}
                        {{-- ============================================= --}}

                        {{-- Mengubah <button> menjadi <a> dengan atribut href dan download --}}
                        <a href="{{ asset('images/cv_raafi.pdf') }}" 
                           download="cv_raafi.pdf"
                           class="bg-gradient-custom text-white px-6 py-3 rounded-lg font-semibold transition-transform duration-300 hover:scale-105 shadow-md text-center">
                            Download CV
                        </a>
                        
                        {{-- ============================================= --}}
                        
                        <a href="/contact" class="border border-cyan-400 text-cyan-400 px-6 py-3 rounded-lg font-semibold transition-colors duration-300 hover:bg-cyan-400 hover:text-[#0F131D] text-center">
                            Hubungi Saya
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layout>