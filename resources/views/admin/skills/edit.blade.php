<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-cyan-400 leading-tight">
            {{ __('Edit Skill') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 border border-gray-700 overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <form action="{{ route('skills.update', $skill->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    {{-- Nama Skill --}}
                    <div class="mb-6">
                        <label class="block text-gray-300 text-sm font-bold mb-2">Nama Skill</label>
                        <input type="text" name="name" value="{{ $skill->name }}" class="w-full px-4 py-2 bg-gray-900 border border-gray-600 rounded-lg text-white focus:outline-none focus:border-cyan-400" required>
                    </div>

                    {{-- Warna Badge --}}
                    <div class="mb-6">
                        <label class="block text-gray-300 text-sm font-bold mb-2">Warna</label>
                        <input type="text" name="color" value="{{ $skill->color }}" class="w-full px-4 py-2 bg-gray-900 border border-gray-600 rounded-lg text-white focus:outline-none focus:border-cyan-400" required>
                        <p class="text-xs text-gray-500 mt-1">Preview: <span class="px-2 border rounded" style="color: {{ $skill->color }}; border-color: {{ $skill->color }};">{{ $skill->name }}</span></p>
                    </div>

                    {{-- Logo Skill --}}
                    <div class="mb-6">
                        <label class="block text-gray-300 text-sm font-bold mb-2">Ganti Logo (Opsional)</label>
                        <div class="mb-3">
                            <p class="text-xs text-gray-500 mb-1">Logo saat ini:</p>
                            @if($skill->image)
                                <img src="{{ asset('storage/' . $skill->image) }}" class="w-16 h-16 object-contain bg-gray-700 rounded p-1">
                            @endif
                        </div>
                        <input type="file" name="image" class="w-full px-4 py-2 bg-gray-900 border border-gray-600 rounded-lg text-gray-300 focus:outline-none focus:border-cyan-400 file:bg-cyan-500 file:text-gray-900 file:font-bold file:border-0 file:rounded hover:file:bg-cyan-600">
                    </div>

                    {{-- Tombol --}}
                    <div class="flex items-center gap-4">
                        <button type="submit" class="bg-yellow-500 hover:bg-yellow-600 text-gray-900 font-bold py-2 px-6 rounded shadow-lg transition transform hover:scale-105">
                            Update Skill
                        </button>
                        <a href="{{ route('skills.index') }}" class="text-gray-400 hover:text-white">Batal</a>
                    </div>
                </form>

            </div>
        </div>
        
    </div>
</x-app-layout>