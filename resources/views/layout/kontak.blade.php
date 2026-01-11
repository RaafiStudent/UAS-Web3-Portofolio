<x-layout :title="$title ?? 'Hubungi Saya'">
    <section class="py-20 bg-[#0B0F19]">
        <div class="container mx-auto px-6 max-w-6xl">
            
            <div class="grid md:grid-cols-2 gap-12 bg-[#0F131D] p-8 md:p-12 rounded-xl border border-gray-800 shadow-2xl">
                
                {{-- Contact Information --}}
                <div>
                    <h2 class="text-2xl font-bold mb-8 text-cyan-400">Informasi Kontak</h2>
                    
                    {{-- ================================================== --}}
                    {{-- ============ KATA-KATA BARU DITAMBAHKAN ============ --}}
                    {{-- ================================================== --}}
                    <p class="text-gray-400 mb-8 text-base leading-relaxed">
                        Saya selalu terbuka untuk berdiskusi tentang proyek baru, peluang kolaborasi, atau sekadar menyapa. Jangan ragu untuk menghubungi saya melalui detail di bawah ini.
                    </p>
                    {{-- ================================================== --}}
                    
                    <div class="space-y-6">
                        <div class="p-4 rounded-lg bg-[#141822] border border-gray-700 flex items-start gap-4">
                            <div class="w-10 h-10 rounded-full bg-blue-500/20 flex items-center justify-center">
                                <svg class="w-5 h-5 text-blue-400" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/></svg>
                            </div>
                            <div>
                                <p class="text-gray-400 text-sm">Lokasi</p>
                                <p class="text-gray-100 font-medium">Tegal, Indonesia</p>
                            </div>
                        </div>
    
                        <div class="p-4 rounded-lg bg-[#141822] border border-gray-700 flex items-start gap-4">
                            <div class="w-10 h-10 rounded-full bg-teal-500/20 flex items-center justify-center">
                                <svg class="w-5 h-5 text-teal-400" fill="currentColor" viewBox="0 0 24 24"><path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/></svg>
                            </div>
                            <div>
                                <p class="text-gray-400 text-sm">Email</p>
                                <p class="text-gray-100 font-medium">raafistudent@gmail.com</p>
                            </div>
                        </div>
    
                        <div class="p-4 rounded-lg bg-[#141822] border border-gray-700 flex items-start gap-4">
                            <div class="w-10 h-10 rounded-full bg-purple-500/20 flex items-center justify-center">
                                <svg class="w-5 h-5 text-purple-400" fill="currentColor" viewBox="0 0 24 24"><path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/></svg>
                            </div>
                            <div>
                                <p class="text-gray-400 text-sm">Telepon</p>
                                <p class="text-gray-100 font-medium">+62 895-6064-01728</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                {{-- Send Me a Message (Form) --}}
                <div>
                    <h2 class="text-2xl font-bold mb-8 text-cyan-400">Kirim Saya Pesan</h2>

                    {{-- ================================================== --}}
                    {{-- ============ KATA-KATA BARU DITAMBAHKAN ============ --}}
                    {{-- ================================================== --}}
                    <p class="text-gray-400 mb-8 text-base leading-relaxed">
                        Punya pertanyaan atau proyek yang ingin Anda diskusikan? Isi formulir di bawah ini dan saya akan segera membalasnya.
                    </p>
                    {{-- ================================================== --}}
                    
                    <form action="#" method="POST" class="space-y-6">
                        <div>
                            <input type="text" placeholder="Nama Anda" class="w-full px-5 py-3 bg-[#141822] border border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-400 text-gray-100" required>
                        </div>
                        <div>
                            <input type="email" placeholder="Email Anda" class="w-full px-5 py-3 bg-[#141822] border border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-400 text-gray-100" required>
                        </div>
                        <div>
                            <input type="text" placeholder="Subjek" class="w-full px-5 py-3 bg-[#141822] border border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-400 text-gray-100" required>
                        </div>
                        <div>
                            <textarea placeholder="Pesan Anda" rows="6" class="w-full px-5 py-3 bg-[#141822] border border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-400 text-gray-100" required></textarea>
                        </div>
                        <div>
                            <button type="submit" class="bg-gradient-send text-white w-full px-6 py-3 rounded-lg font-semibold flex items-center justify-center gap-2 transition-transform duration-300 hover:scale-[1.01] shadow-xl shadow-pink-500/30">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path></svg>
                                Kirim Pesan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</x-layout>