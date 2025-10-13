<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Jasa Digital Marketing & Brand Development - Communic8 Asia</title>
    <meta name="description"
        content="Communic8 Asia adalah agensi kreatif di Jakarta yang fokus pada digital marketing, brand development, dan digital campaign. Kami bantu bisnis Anda tumbuh di era digital.">
    <meta name="keywords" content="{{ $webInformation->meta_keywords ?? '' }}">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="{{ url()->current() }}" />

    <meta property="og:title" content="Jasa Digital Marketing & Brand Development - Communic8 Asia">
    <meta property="og:description"
        content="Communic8 Asia, agensi kreatif di Jakarta. Kami menyediakan layanan digital marketing, brand development, dan web development untuk membantu bisnis Anda berkembang.">
    <meta property="og:image" content="https://www.communic8agency.com/assets/img/og-image.jpg">
    <meta property="og:url" content="https://www.communic8agency.com/">
    <meta property="og:type" content="website">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Jasa Digital Marketing & Brand Development - Communic8 Asia">
    <meta name="twitter:description"
        content="Kami adalah agensi digital kreatif di Jakarta yang menawarkan solusi lengkap untuk digital marketing dan branding.">
    <meta name="twitter:image" content="https://www.communic8agency.com/assets/img/twitter-image.jpg">

    @if ($webInformation && $webInformation->schema_markup)
        {!! $webInformation->schema_markup !!}
    @endif

    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
    {{-- vite --}}
    @vite('resources/css/app.css')
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
    @include('layouts.partials.navbar')

    {{-- Sidebar Mobile --}}
    @include('layouts.partials.sidebar')

    {{-- Content --}}
    <main class="relative">
        @yield('content')
    </main>

    {{-- Footer --}}
    @include('layouts.partials.footer')

    <!-- Floating WhatsApp Button -->
    <a href="https://wa.me/6281774156280" target="_blank"
        class="fixed bottom-6 right-6 z-50 bg-green-500 hover:bg-green-600 text-white w-14 h-14 flex items-center justify-center rounded-full shadow-lg transition-all duration-300"
        title="Chat with us on WhatsApp">
        <i class="fab fa-whatsapp fa-lg"></i>
    </a>

    <!-- Cookie Consent Banner -->
    <div id="cookie-consent-banner"
        style="display: none; position: fixed; bottom: 0; left: 0; width: 100%; background-color: #2d3748; color: white; padding: 1rem; text-align: center; z-index: 1000;">
        <p style="margin: 0; font-size: 0.9rem;">
            We use cookies to enhance your experience. By continuing to visit this site you agree to our use of cookies.
            <a href="#" id="cookie-consent-button"
                style="background-color: #4a5568; color: white; padding: 0.5rem 1rem; border-radius: 0.25rem; text-decoration: none; margin-left: 1rem;">
                Accept
            </a>
        </p>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Check if the cookie consent has already been accepted
            if (!document.cookie.split(';').some((item) => item.trim().startsWith('cookie_consent_accepted='))) {
                document.getElementById('cookie-consent-banner').style.display = 'block';
            }

            // Add event listener to the accept button
            document.getElementById('cookie-consent-button').addEventListener('click', function(e) {
                e.preventDefault();

                // Set a cookie to remember that the user has accepted, expiring in 1 year
                let expiryDate = new Date();
                expiryDate.setFullYear(expiryDate.getFullYear() + 1);
                document.cookie = 'cookie_consent_accepted=true; expires=' + expiryDate.toUTCString() +
                    '; path=/; SameSite=Lax';

                // Hide the banner
                document.getElementById('cookie-consent-banner').style.display = 'none';
            });
        });
    </script>

</body>


</html>
