<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-cyan-400 leading-tight">
            {{ __('Kelola Skill') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 border border-gray-700 overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <a href="{{ route('skills.create') }}" class="bg-cyan-500 hover:bg-cyan-600 text-gray-900 font-bold py-2 px-4 rounded mb-6 inline-block transition">
                    + Tambah Skill
                </a>

                @if(session('success'))
                    <div class="bg-green-900 border border-green-500 text-green-100 px-4 py-3 rounded relative mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-400">
                        <thead class="text-xs text-gray-200 uppercase bg-gray-700">
                            <tr>
                                <th class="px-6 py-3">Nama Skill</th>
                                <th class="px-6 py-3">Warna Badge</th>
                                <th class="px-6 py-3">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($skills as $skill)
                            <tr class="bg-gray-800 border-b border-gray-700 hover:bg-gray-700">
                                <td class="px-6 py-4 font-medium text-white">{{ $skill->name }}</td>
                                <td class="px-6 py-4">
                                    <span class="px-3 py-1 rounded text-white font-bold" style="background-color: {{ $skill->color }};">
                                        {{ $skill->color }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 flex gap-3">
                                    <a href="{{ route('skills.edit', $skill->id) }}" class="text-yellow-400 hover:text-yellow-300">Edit</a>
                                    <form action="{{ route('skills.destroy', $skill->id) }}" method="POST" onsubmit="return confirm('Hapus skill ini?');">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-400">Hapus</button>
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