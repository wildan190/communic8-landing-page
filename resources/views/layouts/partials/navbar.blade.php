<header class="w-full fixed top-5 left-0 z-50">
    <div
        class="max-w-7xl mx-auto flex justify-between items-center py-6 px-6 bg-white/90 backdrop-blur-md rounded-full mt-4 shadow">

        {{-- Logo --}}
        <div class="flex items-center">
            <a href="{{ url('/') }}">
                <img src="{{ asset('assets/img/logo.png') }}" alt="Logo" class="h-8">
            </a>
        </div>

        {{-- Desktop Menu --}}
        <nav class="hidden md:flex items-center space-x-8 text-gray-700 font-medium relative">
            <a href="{{ url('/') }}" class="hover:text-orange-500 {{ request()->is('/') ? 'text-orange-500' : '' }}">Home</a>
            <a href="{{ route('about.index') }}" class="hover:text-orange-500 {{ request()->routeIs('about.index') ? 'text-orange-500' : '' }}">About</a>

            {{-- Dropdown Services --}}
            <div class="relative group">
                <button class="hover:text-orange-500 flex items-center gap-1 {{ request()->routeIs('layanan.*') ? 'text-orange-500' : '' }}">
                    Services
                </button>

                <div
                    class="absolute left-0 mt-2 w-48 bg-white rounded-lg shadow-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200">
                    <a href="{{ route('layanan.brand-land') }}" class="block px-4 py-2 hover:bg-orange-50 hover:text-orange-500">Brand Land</a>
                    <a href="{{ route('layanan.digital-stand') }}" class="block px-4 py-2 hover:bg-orange-50 hover:text-orange-500">Digital Stand</a>
                    <a href="{{ route('layanan.code-band') }}" class="block px-4 py-2 hover:bg-orange-50 hover:text-orange-500">Code Band</a>
                    <a href="{{ route('layanan.public-space-media') }}" class="block px-4 py-2 hover:bg-orange-50 hover:text-orange-500">Public Space Media</a>
                    <a href="{{ route('layanan.ott-advertising') }}" class="block px-4 py-2 hover:bg-orange-50 hover:text-orange-500">OTT Advertising</a>
                </div>
            </div>

            <a href="{{ route('portofolio.index') }}" class="hover:text-orange-500 {{ request()->routeIs('portofolio.index') ? 'text-orange-500' : '' }}">Portfolio</a>
            <a href="{{ route('insight.index') }}" class="hover:text-orange-500 {{ request()->routeIs('insight.index') ? 'text-orange-500' : '' }}">Insight</a>
            <a href="{{ route('contact.index') }}" class="btn-contact bg-gray-800 text-white px-5 py-2 rounded-full">Contact</a>

            {{-- Language Switcher --}}
            <div class="relative group">
                <button class="flex items-center gap-2 bg-white text-gray-700 font-semibold px-4 py-2 rounded-full shadow hover:bg-orange-500 hover:text-white transition">
                    🌐 {{ strtoupper(app()->getLocale()) }}
                </button>

                <div class="absolute right-0 mt-2 w-32 bg-white rounded-lg shadow-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200">
                    <a href="{{ route('lang.switch', ['locale' => 'en']) }}" class="block px-4 py-2 hover:bg-orange-50 hover:text-orange-500">🇬🇧 English</a>
                    <a href="{{ route('lang.switch', ['locale' => 'id']) }}" class="block px-4 py-2 hover:bg-orange-50 hover:text-orange-500">🇮🇩 Bahasa</a>
                </div>
            </div>
        </nav>

        {{-- Mobile Hamburger --}}
        <button onclick="toggleSidebar()" class="md:hidden text-gray-700 focus:outline-none">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>
    </div>
</header>

{{-- Mobile Sidebar --}}
<div id="mobileSidebar" class="fixed inset-0 z-40 bg-black bg-opacity-50 backdrop-blur-sm hidden">
    <div class="fixed right-0 top-0 h-full w-72 bg-white shadow-xl overflow-y-auto">
        {{-- Close Button --}}
        <div class="flex justify-end p-4">
            <button onclick="toggleSidebar()" class="text-gray-700 focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        {{-- Menu Items --}}
        <nav class="flex flex-col space-y-4 px-6 pb-8 text-gray-700 font-medium">
            <a href="{{ url('/') }}" class="{{ request()->is('/') ? 'text-orange-500' : '' }}">Home</a>
            <a href="{{ route('about.index') }}" class="{{ request()->routeIs('about.index') ? 'text-orange-500' : '' }}">About</a>

            {{-- Dropdown Services --}}
            <div x-data="{ open: false }" class="flex flex-col">
                <button @click="open = !open" class="flex items-center justify-between w-full">
                    Services
                    <span x-text="open ? '▲' : '▼'"></span>
                </button>
                <div x-show="open" class="flex flex-col pl-4 mt-2 space-y-2">
                    <a href="{{ route('layanan.brand-land') }}" class="hover:text-orange-500">Brand Land</a>
                    <a href="{{ route('layanan.digital-stand') }}" class="hover:text-orange-500">Digital Stand</a>
                    <a href="{{ route('layanan.code-band') }}" class="hover:text-orange-500">Code Band</a>
                    <a href="{{ route('layanan.public-space-media') }}" class="hover:text-orange-500">Public Space Media</a>
                    <a href="{{ route('layanan.ott-advertising') }}" class="hover:text-orange-500">OTT Advertising</a>
                </div>
            </div>

            <a href="{{ route('portofolio.index') }}" class="{{ request()->routeIs('portofolio.index') ? 'text-orange-500' : '' }}">Portfolio</a>
            <a href="{{ route('insight.index') }}" class="{{ request()->routeIs('insight.index') ? 'text-orange-500' : '' }}">Insight</a>
            <a href="{{ route('contact.index') }}" class="bg-gray-800 text-white px-5 py-2 rounded-full text-center">Contact</a>

            {{-- Language Switcher --}}
            <div x-data="{ openLang: false }" class="flex flex-col mt-4">
                <button @click="openLang = !openLang" class="flex items-center gap-2 px-4 py-2 rounded-full border border-gray-300">
                    🌐 {{ strtoupper(app()->getLocale()) }}
                    <span x-text="openLang ? '▲' : '▼'"></span>
                </button>
                <div x-show="openLang" class="flex flex-col pl-4 mt-2 space-y-2">
                    <a href="{{ route('lang.switch', ['locale' => 'en']) }}">🇬🇧 English</a>
                    <a href="{{ route('lang.switch', ['locale' => 'id']) }}">🇮🇩 Bahasa</a>
                </div>
            </div>
        </nav>
    </div>
</div>

{{-- Toggle Sidebar Script --}}
<script>
    function toggleSidebar() {
        const sidebar = document.getElementById('mobileSidebar');
        sidebar.classList.toggle('hidden');
    }
</script>
