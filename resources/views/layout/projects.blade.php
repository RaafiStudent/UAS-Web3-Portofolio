<x-layout :title="$title ?? 'Proyek'">
    <section class="py-20 bg-[#0F131D]">
        <div class="container mx-auto px-6 max-w-6xl">
            <h2 class="text-4xl font-bold text-center mb-12 text-cyan-400">Proyek Saya</h2>
            
            {{-- Cek jika data kosong --}}
            @if($projects->isEmpty())
                <p class="text-center text-gray-500">Belum ada project yang ditambahkan.</p>
            @else
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach ($projects as $project)
                    <div class="bg-[#141822] rounded-lg shadow-lg overflow-hidden transform hover:scale-[1.02] transition-transform duration-300 border border-gray-700">
                        
                        {{-- GAMBAR DARI STORAGE --}}
                        <div class="w-full h-48 overflow-hidden border-b-2 border-cyan-700 cursor-pointer project-thumbnail" 
                             data-src="{{ asset('storage/' . $project->image) }}">
                            <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}" class="w-full h-full object-cover">
                        </div>
                        
                        <div class="p-6">
                            {{-- TANGGAL --}}
                            <p class="text-sm text-cyan-400 mb-2">{{ $project->date }}</p>
                            
                            {{-- JUDUL --}}
                            <h3 class="text-xl font-semibold mb-2 text-gray-100">{{ $project->title }}</h3>
                            
                            {{-- DESKRIPSI (Limit kata biar rapi) --}}
                            <p class="text-sm text-gray-400 mb-4">{{ Str::limit($project->description, 100) }}</p>
                            
                            {{-- TEKNOLOGI --}}
                            @if($project->technologies)
                                <span class="text-xs font-medium text-purple-400 border border-purple-400 px-2 py-0.5 rounded-full">
                                    {{ $project->technologies }}
                                </span>
                            @endif
                            
                            {{-- LINK (Opsional) --}}
                            @if($project->link)
                                <div class="mt-4">
                                    <a href="{{ $project->link }}" target="_blank" class="text-cyan-400 hover:underline text-sm">Lihat Project &rarr;</a>
                                </div>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>

    {{-- MODAL/LIGHTBOX --}}
    <div id="projectModal" class="fixed inset-0 bg-black bg-opacity-80 flex items-center justify-center z-50 hidden p-4">
        <div class="relative max-w-5xl max-h-full bg-white rounded-lg overflow-hidden shadow-lg">
            <button id="projectCloseModal" class="absolute top-2 right-2 text-white text-3xl font-bold bg-gray-700 rounded-full w-10 h-10 flex items-center justify-center leading-none z-10">&times;</button>
            <img id="projectModalImage" src="" alt="Gambar Proyek Besar" class="w-full h-full object-contain max-h-[90vh]">
        </div>
    </div>

    {{-- JAVASCRIPT --}}
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