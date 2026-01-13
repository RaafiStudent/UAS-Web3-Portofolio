<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-cyan-400 leading-tight">
            {{ __('Edit Sertifikat') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 border border-gray-700 overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <form method="POST" action="{{ route('certificates.update', $certificate->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    {{-- Nama Sertifikat --}}
                    <div class="mb-6">
                        <label class="block text-gray-300 text-sm font-bold mb-2">Nama Sertifikat</label>
                        <input type="text" name="title" value="{{ old('title', $certificate->title) }}" class="w-full px-4 py-2 bg-gray-900 border border-gray-600 rounded-lg text-white focus:outline-none focus:border-cyan-400" required>
                    </div>

                    {{-- Tanggal Terbit --}}
                    <div class="mb-6">
                        <label class="block text-gray-300 text-sm font-bold mb-2">Tanggal Terbit</label>
                        <input type="date" name="date" value="{{ old('date', $certificate->date) }}" class="w-full px-4 py-2 bg-gray-900 border border-gray-600 rounded-lg text-white focus:outline-none focus:border-cyan-400" required>
                    </div>

                    {{-- Penerbit --}}
                    <div class="mb-6">
                        <label class="block text-gray-300 text-sm font-bold mb-2">Penerbit (Issuer)</label>
                        <input type="text" name="issuer" value="{{ old('issuer', $certificate->issuer) }}" class="w-full px-4 py-2 bg-gray-900 border border-gray-600 rounded-lg text-white focus:outline-none focus:border-cyan-400">
                    </div>

                    {{-- Gambar --}}
                    <div class="mb-6">
                        <label class="block text-gray-300 text-sm font-bold mb-2">Gambar (Kosongkan jika tidak ingin ganti)</label>
                        <input type="file" name="image" class="w-full px-4 py-2 bg-gray-900 border border-gray-600 rounded-lg text-gray-300 focus:outline-none focus:border-cyan-400 file:bg-cyan-500 file:text-gray-900 file:font-bold file:border-0 file:rounded hover:file:bg-cyan-600">
                        @if($certificate->image)
                            <div class="mt-3">
                                <p class="text-sm text-gray-500 mb-1">Gambar Saat Ini:</p>
                                <img src="{{ asset('storage/' . $certificate->image) }}" alt="Current Image" class="h-24 w-auto rounded border border-gray-600 object-cover">
                            </div>
                        @endif
                    </div>

                    {{-- Link --}}
                    <div class="mb-6">
                        <label class="block text-gray-300 text-sm font-bold mb-2">Link Kredensial</label>
                        <input type="url" name="link" value="{{ old('link', $certificate->link) }}" class="w-full px-4 py-2 bg-gray-900 border border-gray-600 rounded-lg text-white focus:outline-none focus:border-cyan-400">
                    </div>

                    {{-- Deskripsi --}}
                    <div class="mb-6">
                        <label class="block text-gray-300 text-sm font-bold mb-2">Deskripsi</label>
                        <textarea name="description" rows="4" class="w-full px-4 py-2 bg-gray-900 border border-gray-600 rounded-lg text-white focus:outline-none focus:border-cyan-400" required>{{ old('description', $certificate->description) }}</textarea>
                    </div>

                    {{-- Tombol --}}
                    <div class="flex items-center gap-4">
                        <button type="submit" class="bg-cyan-500 hover:bg-cyan-600 text-gray-900 font-bold py-2 px-6 rounded shadow-lg transition transform hover:scale-105">
                            Update Sertifikat
                        </button>
                        <a href="{{ route('certificates.index') }}" class="text-gray-400 hover:text-white transition">Batal</a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>