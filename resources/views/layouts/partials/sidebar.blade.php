<div id="mobileMenu"
    class="fixed top-0 right-0 w-64 h-full bg-white shadow-lg transform translate-x-full transition-transform duration-300 z-50">
    <div class="flex justify-between items-center px-6 py-4 border-b">
        <img src="{{ asset('assets/img/logo.png') }}" alt="Logo" class="h-8">
        <button onclick="toggleSidebar()" class="text-gray-700">✕</button>
    </div>

    <nav class="flex flex-col space-y-4 p-6 text-gray-700 font-medium">
        <a href="{{ url('/') }}" class="hover:text-orange-500">{{ __('navbar.home') }}</a>
        <a href="{{ route('about.index') }}" class="hover:text-orange-500">{{ __('navbar.about') }}</a>

        {{-- Mobile Dropdown Services --}}
        <div>
            <button onclick="toggleMobileDropdown()"
                class="w-full flex justify-between items-center hover:text-orange-500">
                {{ __('navbar.services') }}
                <svg id="dropdownIcon" class="w-5 h-5 transform transition-transform duration-200" fill="none"
                    stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                </svg>
            </button>

            <div id="mobileDropdown" class="hidden flex-col ml-4 mt-2 space-y-2 text-gray-600">
                <a href="{{ route('layanan.brand-land') }}" class="hover:text-orange-500">{{ __('navbar.brand_land') }}</a>
                <a href="{{ route('layanan.digital-stand') }}" class="hover:text-orange-500">{{ __('navbar.digital_stand') }}</a>
                <a href="{{ route('layanan.code-band') }}" class="hover:text-orange-500">{{ __('navbar.code_band') }}</a>
                <a href="{{ route('layanan.public-space-media') }}" class="hover:text-orange-500">{{ __('navbar.public_space_media') }}</a>
                <a href="{{ route('layanan.ott-advertising') }}" class="hover:text-orange-500">{{ __('navbar.ott_advertising') }}</a>
            </div>
        </div>

        <a href="{{ route('portofolio.index') }}" class="hover:text-orange-500">{{ __('navbar.portfolio') }}</a>
        <a href="{{ route('insight.index') }}" class="hover:text-orange-500">{{ __('navbar.insight') }}</a>
        <a href="{{ route('contact.index') }}"
            class="bg-gray-800 text-white px-5 py-2 rounded-full hover:bg-gray-700 text-center">{{ __('navbar.contact') }}</a>

        {{-- 🌐 Language Switcher --}}
        <div class="border-t pt-4 mt-6">
            <p class="text-gray-500 text-sm mb-2">{{ __('navbar.language') }}</p>
            <div class="flex gap-3">
                <a href="{{ route('lang.switch', 'en') }}"
                    class="flex items-center gap-2 px-3 py-2 rounded-md border {{ app()->getLocale() == 'en' ? 'bg-gray-800 text-white' : 'text-gray-700 hover:bg-gray-100' }}">
                    🇬🇧 English
                </a>
                <a href="{{ route('lang.switch', 'id') }}"
                    class="flex items-center gap-2 px-3 py-2 rounded-md border {{ app()->getLocale() == 'id' ? 'bg-gray-800 text-white' : 'text-gray-700 hover:bg-gray-100' }}">
                    🇮🇩 Indonesia
                </a>
            </div>
        </div>
    </nav>
</div>

<script>
    function toggleSidebar() {
        const sidebar = document.getElementById('mobileMenu');
        sidebar.classList.toggle('translate-x-full');
    }

    function toggleMobileDropdown() {
        const dropdown = document.getElementById('mobileDropdown');
        const icon = document.getElementById('dropdownIcon');
        dropdown.classList.toggle('hidden');
        icon.classList.toggle('rotate-180');
    }
</script>
