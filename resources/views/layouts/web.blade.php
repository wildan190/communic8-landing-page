<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Jasa Digital Marketing & Brand Development - Communic8 Asia</title>
    <meta name="description"
        content="Communic8 Asia adalah agensi kreatif di Jakarta yang fokus pada digital marketing, brand development, dan digital campaign. Kami bantu bisnis Anda tumbuh di era digital.">
    <meta name="keywords"
        content="digital marketing agency jakarta, jasa digital marketing, brand development, agensi kreatif jakarta, jasa SEO, manajemen media sosial, social media agency, branding, website development">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="https://www.communic8agency.com/">

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

    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "WebSite",
      "name": "Communic8 Asia",
      "url": "https://www.communic8agency.com/",
      "potentialAction": {
        "@type": "SearchAction",
        "target": "https://www.communic8agency.com/?s={search_term_string}",
        "query-input": "required name=search_term_string"
      }
    }
    </script>
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "ProfessionalService",
      "name": "Communic8 Asia",
      "image": "https://www.communic8agency.com/assets/img/logo.png",
      "@id": "https://www.communic8agency.com/",
      "url": "https://www.communic8agency.com/",
      "telephone": "+62211234567",
      "address": {
        "@type": "PostalAddress",
        "streetAddress": "Jl. Sudirman No. 123",
        "addressLocality": "Jakarta",
        "postalCode": "12345",
        "addressCountry": "ID"
      },
      "sameAs": [
        "https://www.facebook.com/communic8asia",
        "https://www.instagram.com/communic8asia",
        "https://www.linkedin.com/company/communic8asia"
      ]
    }
    </script>

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

</body>


</html>
