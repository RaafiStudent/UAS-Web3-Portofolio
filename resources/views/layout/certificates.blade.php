<x-layout :title="$title ?? 'Sertifikat'">
    <section class="py-20 bg-[#0F131D]">
        <div class="container mx-auto px-6 max-w-6xl">
            <h2 class="text-4xl font-bold text-center mb-12 text-cyan-400">Sertifikat & Riwayat Kerja</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                
                @php
                    $certificates = [
                        [
                            'title' => 'Introduction to HTML',
                            'issuer' => 'Sololearn',
                            'date' => '12 November 2024',
                            'desc' => 'Menyelesaikan kursus dasar-dasar HTML untuk pengembangan web.',
                            'image' => 'images/sertifikat2.jpeg'
                        ],
                        [
                            'title' => 'Introduction to C#',
                            'issuer' => 'Sololearn',
                            'date' => '30 Desember 2024',
                            'desc' => 'Menyelesaikan kursus dasar-dasar bahasa pemrograman C#.',
                            'image' => 'images/sertifikat7.jpeg'
                        ],
                        [
                            'title' => 'Information Representation and Data Organization',
                            'issuer' => 'Huawei Talent (CRA Training Program)',
                            'date' => '31 Maret 2025',
                            'desc' => 'Sertifikat penyelesaian program pelatihan representasi dan organisasi data.',
                            'image' => 'images/sertifikat3.jpeg'
                        ],
                        [
                            'title' => 'Pemrogram Yunior (Junior Programmer)',
                            'issuer' => 'BNSP / LSP Telematika',
                            'date' => '25 Juni 2025',
                            'desc' => 'Kompetensi di bidang Pemrograman & Pengembangan Piranti Lunak.',
                            'image' => 'images/sertifikat1.jpeg'
                        ],
                        [
                            'title' => 'Surat Keterangan Kerja (Packing Weekend)',
                            'issuer' => 'PT. Mutiara Cahaya Tegal',
                            'date' => '10 Juli 2025 (Periode: 27 Jul 2024 - 4 Mei 2025)',
                            'desc' => 'Menerangkan pengalaman kerja sebagai Pekerja Harian Lepas di Departemen Operasional.',
                            'image' => 'images/sertifikat5.jpeg'
                        ],
                        [
                            'title' => 'Pengembang Web Pratama (Junior Web Developer)',
                            'issuer' => 'BNSP / LSP Informatika',
                            'date' => '2 September 2025',
                            'desc' => 'Kompetensi di bidang Pengembangan Perangkat Lunak dan Pemrograman Web.',
                            'image' => 'images/sertifikat8.jpeg'
                        ],
                        [
                            'title' => 'Teknisi Jaringan (Network Technician)',
                            'issuer' => 'BNSP / LSP Telematika',
                            'date' => '29 September 2025',
                            'desc' => 'Kompetensi di bidang Jaringan & Infrastruktur (Network Technician).',
                            'image' => 'images/sertifikat4.jpeg'
                        ],
                        [
                            'title' => 'Artificial Intelligence and Applications',
                            'issuer' => 'Huawei ICT Academy',
                            'date' => '31 Oktober 2025',
                            'desc' => 'Sertifikat penyelesaian pelatihan mengenai dasar-dasar Kecerdasan Buatan dan aplikasinya.',
                            'image' => 'images/sertifikat6.jpeg'
                        ]
                    ];
                @endphp
    
                @foreach ($certificates as $cert)
                <div class="bg-[#141822] rounded-lg shadow-lg overflow-hidden transform hover:scale-[1.02] transition-transform duration-300 border border-gray-700">
                    {{-- HEADER GAMBAR (TANPA PADDING & WARNA HIJAU) --}}
                    {{-- Tambahkan cursor-pointer dan data-src untuk modal --}}
                    <div class="w-full h-48 flex justify-center items-center overflow-hidden border-b-4 border-cyan-500 cursor-pointer certificate-thumbnail" data-src="{{ asset($cert['image']) }}">
                        <img src="{{ asset($cert['image']) }}" alt="Sertifikat {{ $cert['title'] }}" class="w-full h-full object-cover">
                    </div>
                    
                    <div class="p-4">
                        <p class="text-xs text-yellow-400 mb-1">{{ $cert['date'] }}</p>
                        <h3 class="text-base font-semibold mb-2 text-gray-100">{{ $cert['title'] }}</h3>
                        <p class="text-xs text-gray-400 mb-3">{{ $cert['desc'] }}</p>
                        <span class="text-xs font-medium text-purple-400 border border-purple-400 px-2 py-0.5 rounded-full">{{ $cert['issuer'] }}</span>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- MODAL/LIGHTBOX UNTUK MENAMPILKAN SERTIFIKAT FULL --}}
    <div id="certificateModal" class="fixed inset-0 bg-black bg-opacity-80 flex items-center justify-center z-50 hidden p-4">
        <div class="relative max-w-3xl max-h-full bg-white rounded-lg overflow-hidden shadow-lg">
            <button id="closeModal" class="absolute top-2 right-2 text-white text-3xl font-bold bg-gray-700 rounded-full w-10 h-10 flex items-center justify-center leading-none">&times;</button>
            <img id="modalImage" src="" alt="Sertifikat Besar" class="w-full h-full object-contain max-h-[90vh]">
        </div>
    </div>

    {{-- JavaScript untuk Fungsionalitas Modal --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const thumbnails = document.querySelectorAll('.certificate-thumbnail');
            const modal = document.getElementById('certificateModal');
            const modalImage = document.getElementById('modalImage');
            const closeModalBtn = document.getElementById('closeModal');

            thumbnails.forEach(thumbnail => {
                thumbnail.addEventListener('click', function() {
                    const imageUrl = this.dataset.src; // Ambil URL dari data-src
                    modalImage.src = imageUrl; // Set src gambar modal
                    modal.classList.remove('hidden'); // Tampilkan modal
                    document.body.style.overflow = 'hidden'; // Nonaktifkan scroll body
                });
            });

            closeModalBtn.addEventListener('click', function() {
                modal.classList.add('hidden'); // Sembunyikan modal
                document.body.style.overflow = ''; // Aktifkan kembali scroll body
            });

            // Menutup modal jika klik di luar area gambar
            modal.addEventListener('click', function(e) {
                if (e.target === modal) { // Hanya jika target klik adalah overlay modal itu sendiri
                    modal.classList.add('hidden');
                    document.body.style.overflow = '';
                }
            });

            // Menutup modal dengan tombol ESC
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape' && !modal.classList.contains('hidden')) {
                    modal.classList.add('hidden');
                    document.body.style.overflow = '';
                }
            });
        });
    </script>
</x-layout>