<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-cyan-400 leading-tight">
            {{ __('Edit Project') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="bg-gray-800 border border-gray-700 overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                {{-- Form Edit (Perhatikan route update dan method PUT) --}}
                <form action="{{ route('projects.update', $project->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT') 

                    {{-- Judul --}}
                    <div class="mb-6">
                        <label class="block text-gray-300 text-sm font-bold mb-2">Judul Project</label>
                        <input type="text" name="title" value="{{ $project->title }}"
                            class="w-full px-4 py-2 border border-gray-600 rounded-lg bg-gray-900 text-white focus:outline-none focus:border-cyan-400 focus:ring-1 focus:ring-cyan-400" required>
                    </div>

                    {{-- Gambar --}}
                    <div class="mb-6">
                        <label class="block text-gray-300 text-sm font-bold mb-2">Ganti Gambar (Opsional)</label>
                        {{-- Preview Gambar Lama --}}
                        @if($project->image)
                            <div class="mb-2">
                                <img src="{{ asset('storage/' . $project->image) }}" class="w-32 h-32 object-cover rounded border border-gray-600">
                                <p class="text-xs text-gray-500 mt-1">Gambar saat ini</p>
                            </div>
                        @endif
                        <input type="file" name="image" 
                            class="w-full px-4 py-2 border border-gray-600 rounded-lg bg-gray-900 text-gray-300 focus:outline-none focus:border-cyan-400 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-cyan-500 file:text-gray-900 hover:file:bg-cyan-600 cursor-pointer">
                    </div>

                    {{-- Deskripsi --}}
                    <div class="mb-6">
                        <label class="block text-gray-300 text-sm font-bold mb-2">Deskripsi</label>
                        <textarea name="description" rows="5" 
                            class="w-full px-4 py-2 border border-gray-600 rounded-lg bg-gray-900 text-white focus:outline-none focus:border-cyan-400 focus:ring-1 focus:ring-cyan-400" required>{{ $project->description }}</textarea>
                    </div>

                    {{-- Link --}}
                    <div class="mb-6">
                        <label class="block text-gray-300 text-sm font-bold mb-2">Link Github / Demo</label>
                        <input type="url" name="link" value="{{ $project->link }}"
                            class="w-full px-4 py-2 border border-gray-600 rounded-lg bg-gray-900 text-white focus:outline-none focus:border-cyan-400 focus:ring-1 focus:ring-cyan-400">
                    </div>

                    {{-- Tombol Aksi --}}
                    <div class="flex items-center gap-4">
                        <button type="submit" class="bg-yellow-500 hover:bg-yellow-600 text-gray-900 font-bold py-2 px-6 rounded shadow-lg transition transform hover:scale-105">
                            Update Project
                        </button>
                        
                        <a href="{{ route('projects.index') }}" class="text-gray-400 hover:text-white font-medium transition">
                            Batal
                        </a>
                    </div>

                </form>

            </div>
        </div>
    </div>
</x-app-layout>