<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-cyan-400 leading-tight">
            {{ __('Tambah Project Baru') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 border border-gray-700 overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <form method="POST" action="{{ route('projects.store') }}" enctype="multipart/form-data">
                    @csrf

                    {{-- Judul Project --}}
                    <div class="mb-6">
                        <label class="block text-gray-300 text-sm font-bold mb-2">Judul Project</label>
                        <input type="text" name="title" class="w-full px-4 py-2 bg-gray-900 border border-gray-600 rounded-lg text-white focus:outline-none focus:border-cyan-400" required>
                    </div>

                    {{-- Tanggal --}}
                    <div class="mb-6">
                        <label class="block text-gray-300 text-sm font-bold mb-2">Tanggal Pengerjaan (Untuk Urutan)</label>
                        <input type="date" name="date" class="w-full px-4 py-2 bg-gray-900 border border-gray-600 rounded-lg text-white focus:outline-none focus:border-cyan-400" required>
                        <p class="text-xs text-gray-500 mt-1">Project akan diurutkan berdasarkan tanggal ini.</p>
                    </div>

                    {{-- Teknologi --}}
                    <div class="mb-6">
                        <label class="block text-gray-300 text-sm font-bold mb-2">Teknologi (Contoh: Laravel, Tailwind)</label>
                        <input type="text" name="technologies" class="w-full px-4 py-2 bg-gray-900 border border-gray-600 rounded-lg text-white focus:outline-none focus:border-cyan-400">
                    </div>

                    {{-- Gambar --}}
                    <div class="mb-6">
                        <label class="block text-gray-300 text-sm font-bold mb-2">Gambar Project</label>
                        <input type="file" name="image" class="w-full px-4 py-2 bg-gray-900 border border-gray-600 rounded-lg text-gray-300 focus:outline-none focus:border-cyan-400 file:bg-cyan-500 file:text-gray-900 file:font-bold file:border-0 file:rounded hover:file:bg-cyan-600" required>
                    </div>

                    {{-- Link --}}
                    <div class="mb-6">
                        <label class="block text-gray-300 text-sm font-bold mb-2">Link Project (Opsional)</label>
                        <input type="url" name="link" class="w-full px-4 py-2 bg-gray-900 border border-gray-600 rounded-lg text-white focus:outline-none focus:border-cyan-400" placeholder="https://...">
                    </div>

                    {{-- Deskripsi --}}
                    <div class="mb-6">
                        <label class="block text-gray-300 text-sm font-bold mb-2">Deskripsi</label>
                        <textarea name="description" rows="4" class="w-full px-4 py-2 bg-gray-900 border border-gray-600 rounded-lg text-white focus:outline-none focus:border-cyan-400" required></textarea>
                    </div>

                    {{-- Tombol --}}
                    <div class="flex items-center gap-4">
                        <button type="submit" class="bg-cyan-500 hover:bg-cyan-600 text-gray-900 font-bold py-2 px-6 rounded shadow-lg transition transform hover:scale-105">
                            Simpan Project
                        </button>
                        {{-- Opsi Batal (Opsional) --}}
                        <a href="{{ route('projects.index') }}" class="text-gray-400 hover:text-white transition">Batal</a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>