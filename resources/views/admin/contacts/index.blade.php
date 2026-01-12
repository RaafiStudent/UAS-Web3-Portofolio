<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-cyan-400 leading-tight">
            {{ __('Pesan Masuk') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 border border-gray-700 overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                @if(session('success'))
                    <div class="mb-4 bg-green-500 text-white p-3 rounded">
                        {{ session('success') }}
                    </div>
                @endif

                @if($contacts->isEmpty())
                    <p class="text-gray-400 text-center">Belum ada pesan masuk.</p>
                @else
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-300">
                            <thead class="text-xs text-gray-900 uppercase bg-cyan-500">
                                <tr>
                                    <th scope="col" class="px-6 py-3">Tanggal</th>
                                    <th scope="col" class="px-6 py-3">Pengirim</th>
                                    <th scope="col" class="px-6 py-3">Pesan</th>
                                    <th scope="col" class="px-6 py-3">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($contacts as $contact)
                                    <tr class="bg-gray-900 border-b border-gray-700 hover:bg-gray-700">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ $contact->created_at->format('d M Y, H:i') }}
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="font-bold text-white">{{ $contact->name }}</div>
                                            <div class="text-xs text-gray-500">{{ $contact->email }}</div>
                                        </td>
                                        <td class="px-6 py-4">
                                            {{Str::limit($contact->message, 100)}}
                                            <div class="mt-1 text-xs text-cyan-400">{{ $contact->message }}</div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <form action="{{ route('admin.contacts.destroy', $contact->id) }}" method="POST" onsubmit="return confirm('Hapus pesan ini?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-400 hover:text-red-600 font-bold">
                                                    Hapus
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                    <div class="mt-4">
                        {{ $contacts->links() }}
                    </div>
                @endif

            </div>
        </div>
    </div>
</x-app-layout>