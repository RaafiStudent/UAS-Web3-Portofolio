<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-cyan-400 leading-tight">
            {{ __('Tambah Sertifikat') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 border border-gray-700 overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <form action="{{ route('certificates.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    {{-- Judul --}}
                    <div class="mb-6">
                        <label class="block text-gray-300 text-sm font-bold mb-2">Judul Sertifikat</label>
                        <input type="text" name="title" class="w-full px-4 py-2 bg-gray-900 border border-gray-600 rounded-lg text-white focus:outline-none focus:border-cyan-400" placeholder="Contoh: Introduction to HTML" required>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        {{-- Penyelenggara --}}
                        <div>
                            <label class="block text-gray-300 text-sm font-bold mb-2">Penyelenggara (Issuer)</label>
                            <input type="text" name="issuer" class="w-full px-4 py-2 bg-gray-900 border border-gray-600 rounded-lg text-white focus:outline-none focus:border-cyan-400" placeholder="Contoh: Sololearn, BNSP, Huawei" required>
                        </div>
                        
                        {{-- Tanggal --}}
                        <div>
                            <label class="block text-gray-300 text-sm font-bold mb-2">Tanggal / Periode</label>
                            <input type="text" name="issued_at" class="w-full px-4 py-2 bg-gray-900 border border-gray-600 rounded-lg text-white focus:outline-none focus:border-cyan-400" placeholder="Contoh: 12 November 2024" required>
                        </div>
                    </div>

                    {{-- Deskripsi --}}
                    <div class="mb-6">
                        <label class="block text-gray-300 text-sm font-bold mb-2">Deskripsi Singkat</label>
                        <textarea name="description" rows="3" class="w-full px-4 py-2 bg-gray-900 border border-gray-600 rounded-lg text-white focus:outline-none focus:border-cyan-400" placeholder="Contoh: Menyelesaikan kursus dasar HTML..." required></textarea>
                    </div>

                    {{-- Gambar --}}
                    <div class="mb-6">
                        <label class="block text-gray-300 text-sm font-bold mb-2">File Gambar Sertifikat</label>
                        <input type="file" name="image" class="w-full px-4 py-2 bg-gray-900 border border-gray-600 rounded-lg text-gray-300 focus:outline-none focus:border-cyan-400 file:bg-cyan-500 file:text-gray-900 file:font-bold file:border-0 file:rounded hover:file:bg-cyan-600" required>
                    </div>

                    {{-- Tombol --}}
                    <div class="flex items-center gap-4">
                        <button type="submit" class="bg-cyan-500 hover:bg-cyan-600 text-gray-900 font-bold py-2 px-6 rounded shadow-lg transition transform hover:scale-105">
                            Simpan Sertifikat
                        </button>
                        <a href="{{ route('certificates.index') }}" class="text-gray-400 hover:text-white">Batal</a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>