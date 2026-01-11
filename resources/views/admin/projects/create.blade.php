<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tambah Project Baru') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                {{-- Form Upload (Wajib ada enctype="multipart/form-data") --}}
                <form action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    {{-- Judul --}}
                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Judul Project</label>
                        <input type="text" name="title" class="w-full px-3 py-2 border rounded-lg text-gray-700 dark:bg-gray-700 dark:text-white focus:outline-none" placeholder="Contoh: Website Toko Online" required>
                    </div>

                    {{-- Gambar --}}
                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Gambar Project</label>
                        <input type="file" name="image" class="w-full px-3 py-2 border rounded-lg text-gray-700 dark:bg-gray-700 dark:text-white focus:outline-none" required>
                    </div>

                    {{-- Deskripsi --}}
                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Deskripsi</label>
                        <textarea name="description" rows="4" class="w-full px-3 py-2 border rounded-lg text-gray-700 dark:bg-gray-700 dark:text-white focus:outline-none" placeholder="Jelaskan fitur project ini..." required></textarea>
                    </div>

                    {{-- Link --}}
                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Link Github / Demo</label>
                        <input type="url" name="link" class="w-full px-3 py-2 border rounded-lg text-gray-700 dark:bg-gray-700 dark:text-white focus:outline-none" placeholder="https://github.com/...">
                    </div>

                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Simpan Project
                    </button>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>