<div id="mobileMenu"
    class="fixed top-0 right-0 w-64 h-full bg-white shadow-lg transform translate-x-full transition-transform duration-300 z-50">
    <div class="flex justify-between items-center px-6 py-4 border-b">
        <img src="{{ asset('assets/img/logo.png') }}" alt="Logo" class="h-8">
        <button onclick="toggleSidebar()" class="text-gray-700">✕</button>
    </div>

    <nav class="flex flex-col space-y-4 p-6 text-gray-700 font-medium">
        <a href="{{ url('/') }}" class="hover:text-orange-500">Home</a>
        <a href="{{ route('about.index') }}" class="hover:text-orange-500">About</a>

        {{-- Mobile Dropdown Services --}}
        <div>
            <button onclick="toggleMobileDropdown()"
                class="w-full flex justify-between items-center hover:text-orange-500">
                Services
                <svg id="dropdownIcon" class="w-5 h-5 transform transition-transform duration-200" fill="none"
                    stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                </svg>
            </button>

            <div id="mobileDropdown" class="hidden flex-col ml-4 mt-2 space-y-2 text-gray-600">
                <a href="{{ route('layanan.brand-forge') }}" class="hover:text-orange-500">Brand Forge</a>
                <a href="{{ route('layanan.digital-compass') }}" class="hover:text-orange-500">Digital Compass</a>
                <a href="{{ route('layanan.digital-architecture') }}" class="hover:text-orange-500">Digital Architecture</a>
                <a href="{{ route('layanan.public-presence') }}" class="hover:text-orange-500">Digital Presence</a>
            </div>
        </div>

        <a href="{{ route('portofolio.index') }}" class="hover:text-orange-500">Portfolio</a>
        <a href="{{ route('insight.index') }}" class="hover:text-orange-500">Insight</a>
        <a href="{{ route('contact.index') }}"
            class="bg-gray-800 text-white px-5 py-2 rounded-full hover:bg-gray-700 text-center">Contact</a>
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
