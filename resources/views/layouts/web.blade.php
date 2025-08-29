<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Communic8 Asia</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- Import Font Rubik --}}
    <style>
        @font-face {
            font-family: 'Rubik';
            src: url('{{ asset('assets/font/rubik.ttf') }}') format('truetype');
            font-weight: normal;
            font-style: normal;
        }

        body {
            font-family: 'Rubik', sans-serif;
        }
    </style>

    <script>
        function toggleSidebar() {
            document.getElementById('mobileMenu').classList.toggle('translate-x-0');
        }
    </script>
</head>

<body class="antialiased bg-gray-50">

    {{-- Navbar --}}
    <header class="w-full fixed top-5 left-0 z-50">
        <div
            class="max-w-7xl mx-auto flex justify-between items-center py-4 px-6 bg-white/90 backdrop-blur-md rounded-full mt-4 shadow">

            {{-- Logo --}}
            <div class="flex items-center">
                <a href="{{ url('/') }}">
                    <img src="{{ asset('assets/img/logo.png') }}" alt="Logo" class="h-8">
                </a>
            </div>

            <nav class="hidden md:flex items-center space-x-8 text-gray-700 font-medium relative">
                <a href="{{ url('/') }}" class="hover:text-orange-500">Home</a>
                <a href="{{ route('about.index') }}" class="hover:text-orange-500">About</a>

                {{-- Dropdown Services --}}
                <div class="relative group">
                    <button class="hover:text-orange-500 flex items-center gap-1">
                        Services
                        <svg class="w-4 h-4 mt-1" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>

                    <div
                        class="absolute left-0 mt-2 w-48 bg-white rounded-lg shadow-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200">
                        <a href="{{ route('layanan.brand-forge')}}" class="block px-4 py-2 hover:bg-orange-50 hover:text-orange-500">Brand
                            Forge</a>
                        <a href="{{ route('layanan.digital-compass')}}" class="block px-4 py-2 hover:bg-orange-50 hover:text-orange-500">Digital
                            Compass</a>
                        <a href="{{ route('layanan.digital-architecture')}}" class="block px-4 py-2 hover:bg-orange-50 hover:text-orange-500">Digital
                            Architecture</a>
                        <a href="{{ route('layanan.public-presence')}}" class="block px-4 py-2 hover:bg-orange-50 hover:text-orange-500">Digital
                            Presence</a>
                    </div>
                </div>

                <a href="{{ route('portofolio.index') }}" class="hover:text-orange-500">Portfolio</a>
                <a href="{{ route('insight.index') }}" class="hover:text-orange-500">Insight</a>
                <a href="{{ route('contact.index') }}"
                    class="bg-gray-800 text-white px-5 py-2 rounded-full hover:bg-gray-700">Contact</a>
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

    {{-- Sidebar Mobile --}}
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
                    <a href="{{ route('layanan.brand-forge')}}" class="hover:text-orange-500">Brand Forge</a>
                    <a href="{{ route('layanan.digital-compass')}}" class="hover:text-orange-500">Digital Compass</a>
                    <a href="{{ route('layanan.digital-architecture')}}" class="hover:text-orange-500">Digital Architecture</a>
                    <a href="{{ route('layanan.public-presence')}}" class="hover:text-orange-500">Digital Presence</a>
                </div>
            </div>

            <a href="{{ route('portofolio.index') }}" class="hover:text-orange-500">Portfolio</a>
            <a href="{{ route('insight.index') }}" class="hover:text-orange-500">Insight</a>
            <a href="{{ route('contact.index') }}"
                class="bg-gray-800 text-white px-5 py-2 rounded-full hover:bg-gray-700 text-center">Contact</a>
        </nav>
    </div>

    <script>
        function toggleMobileDropdown() {
            const dropdown = document.getElementById('mobileDropdown');
            const icon = document.getElementById('dropdownIcon');
            dropdown.classList.toggle('hidden');
            icon.classList.toggle('rotate-180'); // animasi panah
        }
    </script>

    {{-- Content --}}
    <main class="relative">
        @yield('content')
    </main>

    <footer class="bg-white">
        <!-- Top Footer -->
        <div class="bg-cover bg-center" style="background-image: url('{{ asset('assets/img/cta-bg.png') }}');">
            <div class="max-w-7xl mx-auto px-6 flex justify-between items-center py-6">
                <!-- Logo & Copyright -->
                <div class="flex items-center space-x-4">
                    <a href="{{ url('/') }}">
                        <img src="{{ asset('assets/img/logo-white.png') }}" alt="Logo" class="h-10">
                    </a>
                    <span class="text-white text-sm">
                        © 2025 Communic8 Asia – All Right Reserved.
                    </span>
                </div>

                <!-- Social Icons -->
                <div class="flex space-x-4">
                    <a href="#" class="group">
                        <img src="{{ asset('assets/img/social/fb.png') }}" alt="Facebook"
                            class="h-8 w-8 group-hover:hidden">
                        <img src="{{ asset('assets/img/social/colored/fb.png') }}" alt="Facebook Colored"
                            class="h-8 w-8 hidden group-hover:block">
                    </a>
                    <a href="#" class="group">
                        <img src="{{ asset('assets/img/social/ig.png') }}" alt="Instagram"
                            class="h-8 w-8 group-hover:hidden">
                        <img src="{{ asset('assets/img/social/colored/ig.png') }}" alt="Instagram Colored"
                            class="h-8 w-8 hidden group-hover:block">
                    </a>
                    <a href="#" class="group">
                        <img src="{{ asset('assets/img/social/tiktok.png') }}" alt="TikTok"
                            class="h-8 w-8 group-hover:hidden">
                        <img src="{{ asset('assets/img/social/colored/tiktok.png') }}" alt="TikTok Colored"
                            class="h-8 w-8 hidden group-hover:block">
                    </a>
                </div>
            </div>
        </div>

        <!-- Bottom Footer -->
        <div class="max-w-7xl mx-auto px-6 py-12 grid grid-cols-1 md:grid-cols-4 gap-8 text-gray-700">

            <!-- Column 1-3 grouped -->
            <div class="col-span-2 grid grid-cols-3 gap-6">
                <!-- Get to know -->
                <div>
                    <h4 class="font-semibold mb-4">Get to know</h4>
                    <ul class="space-y-2 text-sm">
                        <li><a href="#" class="hover:text-gray-500">Home</a></li>
                        <li><a href="#" class="hover:text-gray-500">About</a></li>
                        <li><a href="{{ route('portofolio.index') }}" class="hover:text-gray-500">Portfolio</a></li>
                    </ul>
                </div>

                <!-- Scope of works -->
                <div>
                    <h4 class="font-semibold mb-4">Scope of works</h4>
                    <ul class="space-y-2 text-sm">
                        <li><a href="#" class="hover:text-gray-500">Brand Development</a></li>
                        <li><a href="#" class="hover:text-gray-500">Digital Marketing</a></li>
                        <li><a href="#" class="hover:text-gray-500">Digital Development</a></li>
                        <li><a href="#" class="hover:text-gray-500">Event Management</a></li>
                    </ul>
                </div>

                <!-- Insights -->
                <div>
                    <h4 class="font-semibold mb-4">Insights</h4>
                    <ul class="space-y-2 text-sm">
                        <li><a href="#" class="hover:text-gray-500">Blog Category</a></li>
                        <li><a href="#" class="hover:text-gray-500">Blog Category</a></li>
                        <li><a href="#" class="hover:text-gray-500">Blog Category</a></li>
                        <li><a href="#" class="hover:text-gray-500">Blog Category</a></li>
                        <li><a href="#" class="hover:text-gray-500">Blog Category</a></li>
                    </ul>
                </div>
            </div>

            <!-- Column 4 Jakarta & Malaysia -->
            <div class="space-y-6 border-l pl-6">
                <div>
                    <h4 class="font-semibold mb-2">Jakarta Office</h4>
                    <p class="text-sm text-gray-600">
                        Jl. Tebet Timur Dalam Raya No. 65, Tebet <br>
                        Jakarta Selatan – DKI Jakarta 12820 <br>
                        <span class="block mt-1">Phone number: +62 817-7415-6280</span>
                    </p>
                </div>
                <div>
                    <h4 class="font-semibold mb-2">Malaysia Office</h4>
                    <p class="text-sm text-gray-600">
                        Persiaran Bayan Indah, Bayan Bay, <br>
                        Bayan Lepas – Pulau Pinang 11900 <br>
                        <span class="block mt-1">Phone number: +60 6761-0661</span>
                    </p>
                </div>
            </div>

            <!-- Column 5 Singapore & China -->
            <div class="space-y-6">
                <div>
                    <h4 class="font-semibold mb-2">Singapore Office</h4>
                    <p class="text-sm text-gray-600">
                        St. 280A Sims Avenue, Singapore 387515 <br>
                        <span class="block mt-1">Phone number: +65 6842-6837</span>
                    </p>
                </div>
                <div>
                    <h4 class="font-semibold mb-2">China Office</h4>
                    <p class="text-sm text-gray-600">
                        St. San Li He Lu Jiu Hao Jian <br>
                        Haidian District – Beijing 2106 <br>
                        <span class="block mt-1">Phone number: +86 1307-3399-412</span>
                    </p>
                </div>
            </div>
        </div>

    </footer>

</body>

</html>
