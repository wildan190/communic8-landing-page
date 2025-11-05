<header class="w-full fixed inset-x-0 top-0 z-50 pt-5">
    <div
        class="w-full md:max-w-7xl mx-auto flex justify-between items-center py-4 px-4 sm:px-6 bg-white/90 backdrop-blur-md rounded-full shadow min-w-0 overflow-visible">

        {{-- Logo --}}
        <div class="flex items-center">
            <a href="{{ url('/') }}">
                <img src="{{ asset('assets/img/logo.png') }}" alt="Logo" class="h-8">
            </a>
        </div>

        {{-- Desktop Menu --}}
        <nav class="hidden md:flex items-center space-x-8 text-gray-700 font-medium relative">
            <a href="{{ url('/') }}" class="hover:text-orange-500 {{ request()->is('/') ? 'text-orange-500' : '' }}">
                {{ __('navbar.home') }}
            </a>
            <a href="{{ route('about.index') }}" class="hover:text-orange-500 {{ request()->routeIs('about.index') ? 'text-orange-500' : '' }}">
                {{ __('navbar.about') }}
            </a>

            {{-- Dropdown Services --}}
            <div class="relative group">
                <button class="hover:text-orange-500 flex items-center gap-1 {{ request()->routeIs('layanan.*') ? 'text-orange-500' : '' }}">
                    {{ __('navbar.services') }}
                    <svg class="w-4 h-4 transition-transform group-hover:rotate-180" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>

                <div class="absolute left-0 mt-2 w-48 bg-white rounded-lg shadow-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200">
                    <a href="{{ route('layanan.brand-land') }}" class="block px-4 py-2 hover:bg-orange-50 hover:text-orange-500">{{ __('navbar.brand_land') }}</a>
                    <a href="{{ route('layanan.digital-stand') }}" class="block px-4 py-2 hover:bg-orange-50 hover:text-orange-500">{{ __('navbar.digital_stand') }}</a>
                    <a href="{{ route('layanan.code-band') }}" class="block px-4 py-2 hover:bg-orange-50 hover:text-orange-500">{{ __('navbar.code_band') }}</a>
                    <a href="{{ route('layanan.public-space-media') }}" class="block px-4 py-2 hover:bg-orange-50 hover:text-orange-500">{{ __('navbar.public_space_media') }}</a>
                    <a href="{{ route('layanan.ott-advertising') }}" class="block px-4 py-2 hover:bg-orange-50 hover:text-orange-500">{{ __('navbar.ott_advertising') }}</a>
                </div>
            </div>

            <a href="{{ route('portofolio.index') }}" class="hover:text-orange-500 {{ request()->routeIs('portofolio.index') ? 'text-orange-500' : '' }}">
                {{ __('navbar.portfolio') }}
            </a>
            <a href="{{ route('insight.index') }}" class="hover:text-orange-500 {{ request()->routeIs('insight.index') ? 'text-orange-500' : '' }}">
                {{ __('navbar.insight') }}
            </a>
            <a href="{{ route('contact.index') }}" class="btn-contact bg-gray-800 text-white px-5 py-2 rounded-full hover:bg-gray-700">
                {{ __('navbar.contact') }}
            </a>

            {{-- Language Switcher --}}
            <div class="relative group">
                <button class="flex items-center gap-2 bg-white text-gray-700 font-semibold px-4 py-2 rounded-full shadow hover:bg-orange-500 hover:text-white transition">
                    🌐 {{ strtoupper(app()->getLocale()) }}
                </button>

                <div class="absolute right-0 mt-2 w-32 bg-white rounded-lg shadow-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200">
                    <a href="{{ route('lang.switch','en') }}" class="block px-4 py-2 hover:bg-orange-50 hover:text-orange-500">🇬🇧 English</a>
                    <a href="{{ route('lang.switch','id') }}" class="block px-4 py-2 hover:bg-orange-50 hover:text-orange-500">🇮🇩 Bahasa</a>
                </div>
            </div>
        </nav>

        {{-- Mobile Hamburger --}}
        <button onclick="toggleSidebar()" class="md:hidden text-gray-700 focus:outline-none">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>
    </div>
</header>
