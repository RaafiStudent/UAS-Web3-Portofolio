<x-layout :title="$title ?? 'Proyek'">
    <section class="py-20 bg-[#0F131D]">
        <div class="container mx-auto px-6 max-w-6xl">
            <h2 class="text-4xl font-bold text-center mb-12 text-cyan-400">Proyek Saya</h2>
            
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                
                @php
                    $projects = [
                        [
                            'title' => 'BOAT ADVENTURE – Greenfoot Game',
                            'tech' => 'Greenfoot (Java)',
                            'desc' => 'Game edukatif bertema petualangan kapal di mana pemain harus menghindari rintangan dan mengumpulkan koin. Game ini dibuat menggunakan Greenfoot sebagai bagian dari tugas mata kuliah Pemrograman Berorientasi Objek.',
                            'image' => 'images/boat1.png',
                            'date' => '15 April 2025'
                        ],
                        [
                            'title' => 'Web Perpustakaan – CodeIgniter',
                            'tech' => 'CodeIgniter (PHP), MySQL',
                            'desc' => 'Aplikasi web yang digunakan untuk mengelola data peminjaman dan pengembalian buku. Sistem mendukung login dengan dua role, yaitu admin dan anggota, serta memungkinkan pengelolaan data buku dan transaksi peminjaman.',
                            'image' => 'images/perpus.png',
                            'date' => '14 April 2025'
                        ],
                        [
                            'title' => 'Traffic Light Controller – Arduino & Visual Studio',
                            'tech' => 'Arduino, Visual Studio',
                            'desc' => 'Simulasi lampu lalu lintas yang berfungsi seperti lampu sebenarnya. Arduino digunakan sebagai pengendali LED dan Visual Studio sebagai antarmuka monitoring.',
                            'image' => 'images/lampu.png',
                            'date' => '12 Mei 2025'
                        ],
                        [
                            'title' => 'Aplikasi Penjualan Ikan Hias – Java (NetBeans)',
                            'tech' => 'Java, NetBeans, MySQL',
                            'desc' => 'Aplikasi desktop untuk mencatat hasil penjualan ikan hias agar lebih terstruktur dan efisien. Fitur meliputi input data ikan, transaksi penjualan, serta pengelolaan data menggunakan database.',
                            'image' => 'images/laut.png',
                            'date' => '8 Januari 2025'
                        ],
                        [
                            'title' => 'Website Pembelian & Kasir Tiket Konser Ambafest',
                            'tech' => 'HTML, CSS, PHP, MySQL',
                            'desc' => 'Website yang menyediakan fitur pembelian tiket konser Ambafest. Pengguna dapat melakukan pendaftaran akun, memilih tiket, melakukan transaksi, dan admin dapat mengelola data pemesanan melalui dashboard.',
                            'image' => 'images/ambafest.png',
                            'date' => '16 Mei 2025'
                        ],
                        [
                            'title' => 'Kotak Amal Otomatis – Arduino Project',
                            'tech' => 'Arduino, Sensor Ultrasonik',
                            'desc' => 'Kotak amal otomatis yang dapat membuka pintu secara otomatis ketika tangan terdeteksi oleh sensor ultrasonik. Sistem menyimpan waktu donasi menggunakan RTC dan menampilkan informasi pada layar LCD.',
                            'image' => 'images/kotakamal.png',
                            'date' => '23 Mei 2025'
                        ],
                    ];
                @endphp

                @foreach ($projects as $project)
                <div class="bg-[#141822] rounded-lg shadow-lg overflow-hidden transform hover:scale-[1.02] transition-transform duration-300 border border-gray-700">
                    
                    <div class="w-full h-48 overflow-hidden border-b-2 border-cyan-700 cursor-pointer project-thumbnail" data-src="{{ asset($project['image']) }}">
                        <img src="{{ asset($project['image']) }}" alt="{{ $project['title'] }}" class="w-full h-full object-cover">
                    </div>
                    
                    <div class="p-6">
                        <p class="text-sm text-cyan-400 mb-2">{{ $project['date'] }}</p>
                        <h3 class="text-xl font-semibold mb-2 text-gray-100">{{ $project['title'] }}</h3>
                        <p class="text-sm text-gray-400 mb-4">{{ $project['desc'] }}</p>
                        <span class="text-xs font-medium text-purple-400 border border-purple-400 px-2 py-0.5 rounded-full">{{ $project['tech'] }}</span>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- MODAL/LIGHTBOX DENGAN UKURAN YANG DIPERBAIKI (max-w-5xl) --}}
    <div id="projectModal" class="fixed inset-0 bg-black bg-opacity-80 flex items-center justify-center z-50 hidden p-4">
        {{-- DIUBAH DARI max-w-6xl MENJADI max-w-5xl (UKURAN YANG PAS) --}}
        <div class="relative max-w-5xl max-h-full bg-white rounded-lg overflow-hidden shadow-lg">
            <button id="projectCloseModal" class="absolute top-2 right-2 text-white text-3xl font-bold bg-gray-700 rounded-full w-10 h-10 flex items-center justify-center leading-none z-10">&times;</button>
            <img id="projectModalImage" src="" alt="Gambar Proyek Besar" class="w-full h-full object-contain max-h-[90vh]">
        </div>
    </div>

    {{-- JavaScript DENGAN ID UNIK (Tidak ada konflik) --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const thumbnails = document.querySelectorAll('.project-thumbnail');
            const modal = document.getElementById('projectModal');
            const modalImage = document.getElementById('projectModalImage');
            const closeModalBtn = document.getElementById('projectCloseModal');

            thumbnails.forEach(thumbnail => {
                thumbnail.addEventListener('click', function() {
                    modalImage.src = this.dataset.src;
                    modal.classList.remove('hidden');
                    document.body.style.overflow = 'hidden';
                });
            });

            closeModalBtn.addEventListener('click', function() {
                modal.classList.add('hidden');
                document.body.style.overflow = '';
            });

            modal.addEventListener('click', function(e) {
                if (e.target === modal) {
                    modal.classList.add('hidden');
                    document.body.style.overflow = '';
                }
            });

            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape' && !modal.classList.contains('hidden')) {
                    modal.classList.add('hidden');
                    document.body.style.overflow = '';
                }
            });
        });
    </script>
</x-layout>