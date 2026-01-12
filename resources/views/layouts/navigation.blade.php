<nav x-data="{ open: false }" class="bg-[#0B0F19] border-b border-gray-800 sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <h1 class="text-2xl font-bold text-cyan-400 hover:text-cyan-300 transition">Raafi.dev</h1>
                    </a>
                </div>

                <div class="hidden space-x-4 sm:-my-px sm:ms-10 sm:flex items-center">
                    
                    {{-- DASHBOARD LINK --}}
                    <a href="{{ route('dashboard') }}" 
                       class="{{ request()->routeIs('dashboard') 
                           ? 'bg-gray-800 text-cyan-400 border border-gray-700' 
                           : 'text-gray-300 hover:bg-gray-800 hover:text-white' }} 
                           px-4 py-2 rounded-md text-sm font-bold transition duration-150 ease-in-out">
                        {{ __('Dashboard') }}
                    </a>

                    {{-- KELOLA PROJECT LINK --}}
                    <a href="{{ route('projects.index') }}" 
                       class="{{ request()->routeIs('projects.*') 
                           ? 'bg-gray-800 text-cyan-400 border border-gray-700' 
                           : 'text-gray-300 hover:bg-gray-800 hover:text-white' }} 
                           px-4 py-2 rounded-md text-sm font-bold transition duration-150 ease-in-out">
                        {{ __('Kelola Project') }}
                    </a>

                    {{-- KELOLA SKILL LINK (BARU DITAMBAHKAN) --}}
                    <a href="{{ route('skills.index') }}" 
                       class="{{ request()->routeIs('skills.*') 
                           ? 'bg-gray-800 text-cyan-400 border border-gray-700' 
                           : 'text-gray-300 hover:bg-gray-800 hover:text-white' }} 
                           px-4 py-2 rounded-md text-sm font-bold transition duration-150 ease-in-out">
                        {{ __('Kelola Skill') }}
                    </a>

                </div>
            </div>

            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-300 bg-[#0B0F19] hover:text-white focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>
                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <div class="bg-gray-800 text-white"> 
                            <x-dropdown-link :href="route('profile.edit')" class="text-gray-700 hover:bg-gray-100">
                                {{ __('Profile') }}
                            </x-dropdown-link>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault(); this.closest('form').submit();" class="text-gray-700 hover:bg-gray-100">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </div>
                    </x-slot>
                </x-dropdown>
            </div>

            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-800 focus:outline-none transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden bg-[#0B0F19] border-b border-gray-800">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="text-gray-300 hover:bg-gray-800 hover:text-cyan-400">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('projects.index')" :active="request()->routeIs('projects.*')" class="text-gray-300 hover:bg-gray-800 hover:text-cyan-400">
                {{ __('Kelola Project') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('skills.index')" :active="request()->routeIs('skills.*')" class="text-gray-300 hover:bg-gray-800 hover:text-cyan-400">
                {{ __('Kelola Skill') }}
            </x-responsive-nav-link>
        </div>
    </div>
</nav>