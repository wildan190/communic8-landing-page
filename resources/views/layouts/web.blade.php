<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Communic8 Asia</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

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
        <div class="max-w-7xl mx-auto flex justify-between items-center py-4 px-6 bg-white/90 backdrop-blur-md rounded-full mt-4 shadow">
            
            {{-- Logo --}}
            <div class="flex items-center">
                <img src="{{ asset('assets/img/logo.png') }}" alt="Logo" class="h-8">
            </div>

            {{-- Desktop Navigation --}}
            <nav class="hidden md:flex items-center space-x-8 text-gray-700 font-medium">
                <a href="#" class="hover:text-orange-500">Home</a>
                <a href="#" class="hover:text-orange-500">About</a>
                <a href="#" class="hover:text-orange-500">Services</a>
                <a href="#" class="hover:text-orange-500">Portfolio</a>
                <a href="#" class="hover:text-orange-500">Insight</a>
                <a href="#" class="bg-gray-800 text-white px-5 py-2 rounded-full hover:bg-gray-700">Contact</a>
            </nav>

            {{-- Mobile Hamburger --}}
            <button onclick="toggleSidebar()" class="md:hidden text-gray-700 focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" 
                     viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                          d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>
        </div>
    </header>

    {{-- Sidebar Mobile --}}
    <div id="mobileMenu" class="fixed top-0 right-0 w-64 h-full bg-white shadow-lg transform translate-x-full transition-transform duration-300 z-50">
        <div class="flex justify-between items-center px-6 py-4 border-b">
            <img src="{{ asset('assets/img/logo.png') }}" alt="Logo" class="h-8">
            <button onclick="toggleSidebar()" class="text-gray-700">
                ✕
            </button>
        </div>
        <nav class="flex flex-col space-y-6 p-6 text-gray-700 font-medium">
            <a href="#" class="hover:text-orange-500">Home</a>
            <a href="#" class="hover:text-orange-500">About</a>
            <a href="#" class="hover:text-orange-500">Services</a>
            <a href="#" class="hover:text-orange-500">Portfolio</a>
            <a href="#" class="hover:text-orange-500">Insight</a>
            <a href="#" class="bg-gray-800 text-white px-5 py-2 rounded-full hover:bg-gray-700 text-center">Contact</a>
        </nav>
    </div>

    {{-- Content --}}
    <main class="relative">
        @yield('content')
    </main>
</body>
</html>