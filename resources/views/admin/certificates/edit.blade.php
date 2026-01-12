<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-cyan-400 leading-tight">
            {{ __('Edit Sertifikat') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 border border-gray-700 overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                {{-- Form Edit --}}
                <form action="{{ route('certificates.update', $certificate->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT') {{-- Wajib untuk Update Data --}}

                    {{-- Judul --}}
                    <div class="mb-6">
                        <label class="block text-gray-300 text-sm font-bold mb-2">Judul Sertifikat</label>
                        <input type="text" name="title" value="{{ $certificate->title }}"
                            class="w-full px-4 py-2 bg-gray-900 border border-gray-600 rounded-lg text-white focus:outline-none focus:border-cyan-400" required>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        {{-- Penyelenggara --}}
                        <div>
                            <label class="block text-gray-300 text-sm font-bold mb-2">Penyelenggara (Issuer)</label>
                            <input type="text" name="issuer" value="{{ $certificate->issuer }}"
                                class="w-full px-4 py-2 bg-gray-900 border border-gray-600 rounded-lg text-white focus:outline-none focus:border-cyan-400" required>
                        </div>
                        
                        {{-- Tanggal --}}
                        <div>
                            <label class="block text-gray-300 text-sm font-bold mb-2">Tanggal / Periode</label>
                            <input type="text" name="issued_at" value="{{ $certificate->issued_at }}"
                                class="w-full px-4 py-2 bg-gray-900 border border-gray-600 rounded-lg text-white focus:outline-none focus:border-cyan-400" required>
                        </div>
                    </div>

                    {{-- Deskripsi --}}
                    <div class="mb-6">
                        <label class="block text-gray-300 text-sm font-bold mb-2">Deskripsi Singkat</label>
                        <textarea name="description" rows="3" 
                            class="w-full px-4 py-2 bg-gray-900 border border-gray-600 rounded-lg text-white focus:outline-none focus:border-cyan-400" required>{{ $certificate->description }}</textarea>
                    </div>

                    {{-- Gambar --}}
                    <div class="mb-6">
                        <label class="block text-gray-300 text-sm font-bold mb-2">Ganti Gambar (Opsional)</label>
                        
                        {{-- Preview Gambar Lama --}}
                        <div class="mb-3">
                            <p class="text-xs text-gray-500 mb-1">Gambar saat ini:</p>
                            <img src="{{ asset('storage/' . $certificate->image) }}" class="w-32 h-auto rounded border border-gray-600">
                        </div>

                        <input type="file" name="image" 
                            class="w-full px-4 py-2 bg-gray-900 border border-gray-600 rounded-lg text-gray-300 focus:outline-none focus:border-cyan-400 file:bg-cyan-500 file:text-gray-900 file:font-bold file:border-0 file:rounded hover:file:bg-cyan-600">
                        <p class="text-gray-500 text-xs mt-1">*Biarkan kosong jika tidak ingin mengubah gambar.</p>
                    </div>

                    {{-- Tombol --}}
                    <div class="flex items-center gap-4">
                        <button type="submit" class="bg-yellow-500 hover:bg-yellow-600 text-gray-900 font-bold py-2 px-6 rounded shadow-lg transition transform hover:scale-105">
                            Update Sertifikat
                        </button>
                        <a href="{{ route('certificates.index') }}" class="text-gray-400 hover:text-white">Batal</a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>