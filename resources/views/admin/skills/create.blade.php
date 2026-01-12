<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-cyan-400 leading-tight">
            {{ __('Tambah Skill Baru') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 border border-gray-700 overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                {{-- Form wajib pakai enctype untuk upload logo --}}
                <form action="{{ route('skills.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    {{-- Nama Skill --}}
                    <div class="mb-6">
                        <label class="block text-gray-300 text-sm font-bold mb-2">Nama Skill</label>
                        <input type="text" name="name" class="w-full px-4 py-2 bg-gray-900 border border-gray-600 rounded-lg text-white focus:outline-none focus:border-cyan-400" placeholder="Contoh: Laravel" required>
                    </div>

                    {{-- Warna Badge --}}
                    <div class="mb-6">
                        <label class="block text-gray-300 text-sm font-bold mb-2">Warna Border/Text</label>
                        <input type="text" name="color" class="w-full px-4 py-2 bg-gray-900 border border-gray-600 rounded-lg text-white focus:outline-none focus:border-cyan-400" placeholder="Contoh: #FF2D20 atau red" required>
                    </div>

                    {{-- Logo Skill (BARU) --}}
                    <div class="mb-6">
                        <label class="block text-gray-300 text-sm font-bold mb-2">Logo Skill (Gambar/SVG)</label>
                        <input type="file" name="image" class="w-full px-4 py-2 bg-gray-900 border border-gray-600 rounded-lg text-gray-300 focus:outline-none focus:border-cyan-400 file:bg-cyan-500 file:text-gray-900 file:font-bold file:border-0 file:rounded hover:file:bg-cyan-600" required>
                    </div>

                    {{-- Tombol --}}
                    <div class="flex items-center gap-4">
                        <button type="submit" class="bg-cyan-500 hover:bg-cyan-600 text-gray-900 font-bold py-2 px-6 rounded shadow-lg transition transform hover:scale-105">
                            Simpan Skill
                        </button>
                        <a href="{{ route('skills.index') }}" class="text-gray-400 hover:text-white">Batal</a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>