<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portofolio Boss Raafi</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">

    {{-- NAVBAR --}}
    <nav class="bg-white shadow p-4 flex justify-between items-center">
        <h1 class="text-xl font-bold text-blue-600">Raafi.dev</h1>
        <div>
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}" class="text-gray-700 hover:text-blue-500 font-bold">Dashboard Admin</a>
                @else
                    <a href="{{ route('login') }}" class="text-gray-700 hover:text-blue-500 font-bold mr-4">Login</a>
                    <a href="{{ route('register') }}" class="text-gray-700 hover:text-blue-500 font-bold">Register</a>
                @endauth
            @endif
        </div>
    </nav>

    {{-- HEADER --}}
    <header class="bg-blue-600 text-white text-center py-20">
        <h1 class="text-4xl font-bold">Selamat Datang di Portofolio Saya</h1>
        <p class="mt-2 text-lg">Web Developer & IoT Enthusiast</p>
    </header>

    {{-- PROJECTS SECTION (DARI DATABASE) --}}
    <div class="container mx-auto px-4 py-10">
        <h2 class="text-2xl font-bold mb-6 text-center border-b pb-2">Project Saya</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @forelse($projects as $project)
                <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                    @if($project->image)
                        <img src="{{ asset('storage/' . $project->image) }}" class="w-full h-48 object-cover">
                    @else
                        <div class="w-full h-48 bg-gray-200 flex items-center justify-center text-gray-500">No Image</div>
                    @endif
                    <div class="p-4">
                        <h3 class="font-bold text-xl">{{ $project->title }}</h3>
                        <p class="text-gray-600 mt-2 text-sm">{{ Str::limit($project->description, 100) }}</p>
                        <a href="{{ $project->link }}" class="text-blue-500 hover:underline mt-4 block">Lihat Detail &rarr;</a>
                    </div>
                </div>
            @empty
                <p class="text-center w-full col-span-3 text-gray-500">Belum ada project yang diupload.</p>
            @endforelse
        </div>
    </div>

</body>
</html>