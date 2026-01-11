<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-cyan-400 leading-tight">
            {{ __('Kelola Project') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            {{-- CONTAINER UTAMA --}}
            <div class="bg-gray-800 border border-gray-700 overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                {{-- TOMBOL TAMBAH --}}
                <a href="{{ route('projects.create') }}" class="bg-cyan-500 hover:bg-cyan-600 text-gray-900 font-bold py-2 px-4 rounded mb-6 inline-block transition">
                    + Tambah Project
                </a>

                {{-- PESAN SUKSES --}}
                @if(session('success'))
                    <div class="bg-green-900 border border-green-500 text-green-100 px-4 py-3 rounded relative mb-4" role="alert">
                        <span class="block sm:inline">{{ session('success') }}</span>
                    </div>
                @endif

                {{-- TABEL --}}
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-400">
                        <thead class="text-xs text-gray-200 uppercase bg-gray-700">
                            <tr>
                                <th scope="col" class="px-6 py-3">Gambar</th>
                                <th scope="col" class="px-6 py-3">Judul</th>
                                <th scope="col" class="px-6 py-3">Link</th>
                                <th scope="col" class="px-6 py-3">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($projects as $project)
                            <tr class="bg-gray-800 border-b border-gray-700 hover:bg-gray-700 transition">
                                <td class="px-6 py-4">
                                    @if($project->image)
                                        <img src="{{ asset('storage/' . $project->image) }}" class="w-16 h-16 object-cover rounded border border-gray-600">
                                    @else
                                        <span class="text-red-400">No Image</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 font-medium text-white whitespace-nowrap">
                                    {{ $project->title }}
                                </td>
                                <td class="px-6 py-4">
                                    <a href="{{ $project->link }}" target="_blank" class="text-cyan-400 hover:text-cyan-300 hover:underline">Lihat</a>
                                </td>
                                <td class="px-6 py-4 flex gap-3">
                                    <a href="#" class="text-yellow-400 hover:text-yellow-300 font-medium">Edit</a>
                                    <form action="#" method="POST" onsubmit="return confirm('Yakin hapus?');">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-400 font-medium">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>