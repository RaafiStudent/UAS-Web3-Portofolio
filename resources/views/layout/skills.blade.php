<x-layout :title="$title ?? 'Skills'">
    <section class="py-20 bg-[#0B0F19]">
        <div class="container mx-auto px-6 max-w-6xl">
            <h2 class="text-4xl font-bold text-center mb-4 text-cyan-400">Keahlian Teknis</h2>
            <h3 class="text-xl sm:text-2xl font-semibold text-center mb-12 text-gray-300">Teknologi dan Tools</h3>
            
            <div class="grid grid-cols-3 sm:grid-cols-4 lg:grid-cols-6 gap-4 sm:gap-8 justify-items-center">
                
                @php
                    $skills = [
                        ['name' => 'Laravel', 'icon' => 'https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/laravel/laravel-original.svg', 'color' => 'border-orange-500/50'],
                        ['name' => 'Tailwind CSS', 'icon' => 'https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/tailwindcss/tailwindcss-original.svg', 'color' => 'border-cyan-500/50'],
                        ['name' => 'PHP', 'icon' => 'https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/php/php-original.svg', 'color' => 'border-indigo-500/50'],
                        ['name' => 'HTML5', 'icon' => 'https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/html5/html5-original.svg', 'color' => 'border-red-500/50'],
                        ['name' => 'CSS3', 'icon' => 'https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/css3/css3-original.svg', 'color' => 'border-blue-500/50'],
                        ['name' => 'JavaScript', 'icon' => 'https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/javascript/javascript-original.svg', 'color' => 'border-yellow-500/50'],
                        ['name' => 'MySQL', 'icon' => 'https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/mysql/mysql-original.svg', 'color' => 'border-green-500/50'],
                        ['name' => 'Arduino', 'icon' => 'https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/arduino/arduino-original.svg', 'color' => 'border-teal-500/50'],
                        ['name' => 'CodeIgniter', 'icon' => 'https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/codeigniter/codeigniter-plain.svg', 'color' => 'border-red-700/50'],
                        ['name' => 'Greenfoot', 'icon' => 'https://www.greenfoot.org/images/greenfoot-logo.png', 'color' => 'border-green-700/50'],
                    ];
                @endphp
    
                @foreach ($skills as $skill)
                    <div class="bg-[#141822] p-4 sm:p-6 rounded-xl text-center flex flex-col items-center justify-center border-2 w-full h-28 sm:h-32 transition-transform duration-300 hover:scale-105 hover:shadow-lg hover:shadow-cyan-500/20 {{ $skill['color'] }}">
                        <img src="{{ $skill['icon'] }}" alt="{{ $skill['name'] }}" class="h-8 w-8 sm:h-10 sm:w-10 mb-2">
                        <span class="text-xs sm:text-sm font-medium text-gray-200">{{ $skill['name'] }}</span>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</x-layout>