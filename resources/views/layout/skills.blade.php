<x-layout :title="$title ?? 'Skills'">
    <section class="py-20 bg-[#0B0F19]">
        <div class="container mx-auto px-6 max-w-6xl">
            <h2 class="text-4xl font-bold text-center mb-4 text-cyan-400">Keahlian Teknis</h2>
            <h3 class="text-xl sm:text-2xl font-semibold text-center mb-12 text-gray-300">Teknologi dan Tools</h3>
            
            @if($skills->isEmpty())
                <p class="text-center text-gray-500">Belum ada skill yang ditambahkan.</p>
            @else
                <div class="grid grid-cols-3 sm:grid-cols-4 lg:grid-cols-6 gap-4 sm:gap-8 justify-items-center">
                    @foreach ($skills as $skill)
                        {{-- Menggunakan style border-color dinamis dari database --}}
                        <div class="bg-[#141822] p-4 sm:p-6 rounded-xl text-center flex flex-col items-center justify-center border-2 w-full h-28 sm:h-32 transition-transform duration-300 hover:scale-105 hover:shadow-lg hover:shadow-cyan-500/20"
                             style="border-color: {{ $skill->color }};">
                            
                            {{-- LOGO DARI STORAGE --}}
                            @if($skill->image)
                                <img src="{{ asset('storage/' . $skill->image) }}" alt="{{ $skill->name }}" class="h-8 w-8 sm:h-10 sm:w-10 mb-2 object-contain">
                            @endif
                            
                            <span class="text-xs sm:text-sm font-medium text-gray-200">{{ $skill->name }}</span>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>
</x-layout>