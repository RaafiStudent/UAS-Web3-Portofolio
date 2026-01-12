<x-layout :title="$title ?? 'Sertifikat'">
    <section class="py-20 bg-[#0F131D]">
        <div class="container mx-auto px-6 max-w-6xl">
            <h2 class="text-4xl font-bold text-center mb-12 text-cyan-400">Sertifikat & Riwayat Kerja</h2>
            
            @if($certificates->isEmpty())
                <p class="text-center text-gray-500">Belum ada sertifikat yang ditambahkan.</p>
            @else
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                    @foreach ($certificates as $cert)
                    <div class="bg-[#141822] rounded-lg shadow-lg overflow-hidden transform hover:scale-[1.02] transition-transform duration-300 border border-gray-700">
                        
                        {{-- GAMBAR DARI STORAGE --}}
                        <div class="w-full h-48 flex justify-center items-center overflow-hidden border-b-4 border-cyan-500 cursor-pointer certificate-thumbnail" 
                             data-src="{{ asset('storage/' . $cert->image) }}">
                            <img src="{{ asset('storage/' . $cert->image) }}" alt="Sertifikat {{ $cert->title }}" class="w-full h-full object-cover">
                        </div>
                        
                        <div class="p-4">
                            {{-- TANGGAL --}}
                            <p class="text-xs text-yellow-400 mb-1">{{ $cert->issued_at }}</p>
                            
                            {{-- JUDUL --}}
                            <h3 class="text-base font-semibold mb-2 text-gray-100">{{ $cert->title }}</h3>
                            
                            {{-- DESKRIPSI --}}
                            <p class="text-xs text-gray-400 mb-3">{{ Str::limit($cert->description, 80) }}</p>
                            
                            {{-- PENYELENGGARA --}}
                            <span class="text-xs font-medium text-purple-400 border border-purple-400 px-2 py-0.5 rounded-full">
                                {{ $cert->issuer }}
                            </span>
                        </div>
                    </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>

    {{-- MODAL/LIGHTBOX --}}
    <div id="certificateModal" class="fixed inset-0 bg-black bg-opacity-80 flex items-center justify-center z-50 hidden p-4">
        <div class="relative max-w-3xl max-h-full bg-white rounded-lg overflow-hidden shadow-lg">
            <button id="closeModal" class="absolute top-2 right-2 text-white text-3xl font-bold bg-gray-700 rounded-full w-10 h-10 flex items-center justify-center leading-none">&times;</button>
            <img id="modalImage" src="" alt="Sertifikat Besar" class="w-full h-full object-contain max-h-[90vh]">
        </div>
    </div>

    {{-- JavaScript --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const thumbnails = document.querySelectorAll('.certificate-thumbnail');
            const modal = document.getElementById('certificateModal');
            const modalImage = document.getElementById('modalImage');
            const closeModalBtn = document.getElementById('closeModal');

            thumbnails.forEach(thumbnail => {
                thumbnail.addEventListener('click', function() {
                    const imageUrl = this.dataset.src;
                    modalImage.src = imageUrl;
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