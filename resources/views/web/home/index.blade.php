@extends('layouts.web')

@section('content')
    <section class="relative w-full min-h-[85vh] bg-cover bg-center"
        style="background-image: url('{{ asset('assets/img/sectionhero.png') }}')">

        <div
            class="container max-w-7xl mx-auto px-4 sm:px-6 flex flex-col items-center justify-between min-h-[85vh] py-20 md:py-24 space-y-8">

            {{-- Hero Title --}}
            <div class="relative z-10 pt-20 text-center">
                <h1 id="hero-line1"
                    class="font-poppins font-bold text-lg sm:text-2xl md:text-3xl 
                text-[#000000] tracking-normal sm:tracking-[0.3em] leading-snug mb-3 sm:mb-5">
                </h1>
                <h1 id="hero-line2"
                    class="font-poppins font-bold text-lg sm:text-2xl md:text-3xl 
                text-[#000000] tracking-normal sm:tracking-[0.3em] leading-snug">
                </h1>
            </div>

            {{-- Lampu --}}
            <div class="flex justify-center relative mt-8 group">
                <img src="{{ asset('assets/img/lamp.png') }}" alt="Lamp"
                    class="w-auto h-auto max-w-[180px] sm:max-w-[200px] md:max-w-[240px] lg:max-w-[260px] relative z-10 transition-opacity duration-300 group-hover:opacity-0">
                <img src="{{ asset('assets/img/lamphover.png') }}" alt="Lamp Hover"
                    class="w-auto h-auto max-w-[180px] sm:max-w-[200px] md:max-w-[240px] lg:max-w-[260px] absolute z-10 opacity-0 transition-opacity duration-300 group-hover:opacity-100">
            </div>

            {{-- Bottom Row --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-10 w-full items-start text-center md:text-left mt-6">
                <div class="space-y-6">
                    <p class="text-gray-600 text-base sm:text-lg leading-relaxed max-w-md mx-auto md:mx-0">
                        {{ __('home/hero.description') }}
                    </p>
                    <button onclick="window.location='{{ route('about.index') }}'"
                        class="bg-gray-800 text-white px-6 py-3 rounded-full hover:bg-gray-700">
                        {{ __('home/hero.button') }}
                    </button>
                </div>
            </div>

        </div>
    </section>

    {{-- Rotating Text Script --}}
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const phrases = @json(__('home/hero.titles'));
            let index = 0;

            const el1 = document.getElementById("hero-line1");
            const el2 = document.getElementById("hero-line2");

            function showPhrase(i) {
                el1.style.opacity = 0;
                el2.style.opacity = 0;
                setTimeout(() => {
                    el1.innerHTML = phrases[i].line1;
                    el2.innerHTML = phrases[i].line2;
                    el1.style.opacity = 1;
                    el2.style.opacity = 1;
                }, 300);
            }

            showPhrase(index);
            setInterval(() => {
                index = (index + 1) % phrases.length;
                showPhrase(index);
            }, 4000);
        });
    </script>

    {{-- Section Quotes --}}
    <section class="relative w-full bg-cover bg-center"
        style="background-image: url('{{ asset('assets/img/quotes.png') }}')">
        <div
            class="w-full h-full bg-black bg-opacity-40 flex items-center justify-center text-center py-20 sm:py-24 md:py-32">
            <div class="text-white px-4 sm:px-6">
                <h2
                    class="text-xl sm:text-2xl md:text-3xl lg:text-4xl font-light tracking-[0.2em] sm:tracking-[0.3em] uppercase leading-tight">
                    Creativity is the bridge between culture and commerce
                </h2>
                <p class="mt-3 sm:mt-4 text-xs sm:text-sm md:text-base italic">Albert Einstein</p>
            </div>
        </div>
    </section>

    {{-- Wrapper halaman --}}
    <div class="relative">

        {{-- Section At a Glance --}}
        <section class="relative bg-gray-100 pt-8 sm:pt-12 md:pt-16 pb-12 sm:pb-14 md:pb-16 z-10 overflow-visible">
            <div class="container max-w-7xl mx-auto px-4 sm:px-6 md:px-12 relative">

                {{-- Mobile Layout --}}
                <div class="md:hidden">
                    {{-- Text Content First on Mobile --}}
                    <div class="text-center mb-8">
                        <h2
                            class="text-sm sm:text-base text-gray-700 mb-0 sm:mb-0 leading-tight px-0 {{ app()->getLocale() == 'en' ? 'tracking-normal' : 'tracking-normal' }}">
                            BEHIND THE BRAND
                            {!! __('home/glance.title') !!}
                        </h2>
                        <p class="text-gray-600 leading-relaxed text-sm sm:text-base px-2">
                            {{ __('home/glance.paragraph1') }}
                        </p>
                        <p class="mt-3 sm:mt-4 text-gray-600 leading-relaxed text-sm sm:text-base px-2">
                            {{ __('home/glance.paragraph2') }}
                        </p>
                    </div>

                    {{-- Images Stack for Mobile --}}
                    <div class="flex justify-center space-x-2 sm:space-x-4">
                        <img src="{{ asset('assets/img/imgstack1.png') }}" alt="Stack 1"
                            class="w-40 sm:w-48 h-44 sm:h-52 object-cover rounded-lg shadow-lg 
                        grayscale hover:grayscale-0 hover:saturate-150 transition duration-500">

                        <img src="{{ asset('assets/img/imgstack2.png') }}" alt="Stack 2"
                            class="w-40 sm:w-48 h-44 sm:h-52 object-cover rounded-lg shadow-lg mt-6 sm:mt-8
                        grayscale hover:grayscale-0 hover:saturate-150 transition duration-500">
                    </div>
                </div>

                {{-- Desktop Layout --}}
                <div class="hidden md:grid grid-cols-2 gap-12 items-start">
                    {{-- Floating Images --}}
                    <div class="relative w-full h-full">
                        <img src="{{ asset('assets/img/imgstack1.png') }}" alt="Stack 1"
                            class="absolute -top-32 left-0 w-[28rem] sm:w-[30rem] md:w-[32rem] rounded-lg shadow-lg z-30 
                        grayscale hover:grayscale-0 hover:saturate-150 transition duration-500 pointer-events-auto">

                        <img src="{{ asset('assets/img/imgstack2.png') }}" alt="Stack 2"
                            class="absolute top-20 left-12 w-[28rem] sm:w-[30rem] md:w-[32rem] rounded-lg shadow-lg z-20 
                        grayscale hover:grayscale-0 hover:saturate-150 transition duration-500 pointer-events-auto">
                    </div>

                    {{-- Text --}}
                    <div class="text-left flex flex-col justify-center">
                        <h2
                            class="text-2xl sm:text-3xl md:text-4xl text-gray-700 mb-6 leading-tight
                        {{ app()->getLocale() == 'en' ? 'tracking-[0.3em]' : 'tracking-normal' }}">
                            {!! __('home/glance.title') !!}
                        </h2>
                        <p class="text-gray-600 leading-relaxed break-words">
                            {{ __('home/glance.paragraph1') }}
                        </p>
                        <p class="mt-4 text-gray-600 leading-relaxed break-words">
                            {{ __('home/glance.paragraph2') }}
                        </p>
                    </div>
                </div>

            </div>
        </section>

    </div>

    {{-- Section Values / Achievements --}}
    <section class="bg-gray-200 py-24 font-rubik">
        <div class="container mx-auto px-4 sm:px-6 md:px-12">

            <br />
            <br />
            <br />
            <br />


            {{-- Title --}}
            <div class="text-center mb-16">
                <h2 class="text-xl sm:text-2xl md:text-3xl font-semibold text-gray-700 leading-relaxed">
                    {!! __('home/values.title') !!}
                </h2>
            </div>

            {{-- Stats Row --}}
            <div class="flex flex-col md:flex-row justify-center items-center text-center gap-12 md:gap-20 mb-16">

                {{-- Item 1 --}}
                <div class="flex flex-col items-center gap-4">
                    <div class="bg-red-600 text-white w-20 h-20 flex items-center justify-center rounded-[16px] text-3xl">
                        <i class="fas fa-briefcase"></i>
                    </div>
                    <div>
                        <div class="text-3xl font-bold text-orange-500">{{ now()->year - 2005 }}+</div>
                        <div class="text-gray-700 font-semibold text-sm">{{ __('home/values.years_experience') }}</div>
                    </div>
                </div>

                {{-- Item 2 --}}
                <div class="flex flex-col items-center text-center gap-4">
                    <div class="bg-red-600 text-white w-20 h-20 flex items-center justify-center rounded-[16px] text-3xl">
                        <i class="fas fa-layer-group"></i>
                    </div>
                    <div>
                        <div class="text-3xl font-bold text-orange-500">300+</div>
                        <div class="text-gray-700 font-semibold text-sm">{{ __('home/values.brands_handled') }}</div>
                    </div>
                </div>

                {{-- Item 3 --}}
                <div class="flex flex-col items-center text-center gap-4">
                    <div class="bg-red-600 text-white w-20 h-20 flex items-center justify-center rounded-[16px] text-3xl">
                        <i class="fas fa-handshake"></i>
                    </div>
                    <div>
                        <div class="text-3xl font-bold text-orange-500">8/10</div>
                        <div class="text-gray-700 font-semibold text-sm">{{ __('home/values.clients_return') }}</div>
                    </div>
                </div>

            </div>

            {{-- Bottom Text --}}
            <div class="text-center max-w-3xl mx-auto text-gray-600 text-sm leading-relaxed">
                {{ __('home/values.bottom_text') }}
            </div>

        </div>
    </section>

    {{-- Section WHAT WE CAN DO FOR YOU --}}
    <section class="relative bg-white pt-16 sm:pt-20 md:pt-32 pb-16 sm:pb-20 md:pb-24">
        <div class="container max-w-7xl mx-auto px-4 sm:px-6 md:px-12">

            {{-- Title Section --}}
            <div class="text-center mb-16">
                <h2
                    class="text-2xl sm:text-3xl md:text-4xl text-gray-700 mb-2
            {{ app()->getLocale() == 'en' ? 'tracking-[0.3em]' : 'tracking-normal' }}
            leading-tight">
                    {!! __('home/what_we_do.title') !!}
                </h2><br />
                <p class="text-gray-500 text-base sm:text-lg md:text-xl">
                    {!! __('home/what_we_do.subtitle') !!}
                </p>
            </div>

            @php
                $cards = __('home/what_we_do.cards');
                $routes = [
                    'layanan.brand-land',
                    'layanan.public-space-media',
                    'layanan.digital-stand',
                    'layanan.code-band',
                    'layanan.ott-advertising',
                ];

                // Samakan gambar OTT Advertising dengan Digital Stand
                $cards[4]['img'] = $cards[2]['img'];
            @endphp

            {{-- Mobile: Single Column Stack --}}
            <div class="md:hidden space-y-6">
                @foreach ($cards as $index => $card)
                    <div class="bg-white border border-gray-300 rounded-[16px] flex flex-col mx-auto max-w-sm p-4">
                        <img src="{{ asset('assets/img/' . $card['img']) }}" alt="{{ $card['title'] }}"
                            class="w-full h-48 sm:h-60 object-cover rounded-[12px] mb-4 filter grayscale hover:grayscale-0 transition duration-500">

                        <div class="flex flex-col items-center text-center w-full flex-1 pb-4">
                            <h3
                                class="font-bold text-gray-700 mb-3 break-words px-1
                        {{ app()->getLocale() == 'en' ? 'text-lg sm:text-xl' : 'text-base sm:text-lg' }}">
                                {{ $card['title'] }}
                            </h3>
                            <p
                                class="text-gray-600 leading-relaxed px-1 mb-6 flex-1 break-words hyphens-auto
                        {{ app()->getLocale() == 'en' ? 'text-sm' : 'text-xs sm:text-sm' }}">
                                {{ $card['desc'] }}
                            </p>

                            {{-- Button dengan route dinamis --}}
                            <a href="{{ route($routes[$index]) }}"
                                class="bg-gray-800 text-white px-5 py-2 text-sm rounded-full hover:bg-gray-700 transition-colors inline-block text-center whitespace-nowrap">
                                {{ $card['btn'] }}
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Desktop: 2-3 Layout (lebih kecil & proporsional) --}}
            <div class="hidden md:block">
                {{-- Baris 1: 2 cards --}}
                <div class="flex flex-wrap justify-center gap-6 mb-8">
                    @for ($i = 0; $i < 2; $i++)
                        @php $card = $cards[$i]; @endphp
                        <div
                            class="bg-white border border-gray-300 rounded-[16px] flex flex-col w-72 p-4 min-h-[480px] shadow-sm hover:shadow-md hover:-translate-y-1 transition-all duration-300">
                            <img src="{{ asset('assets/img/' . $card['img']) }}" alt="{{ $card['title'] }}"
                                class="w-full h-56 object-cover rounded-[12px] mb-4 filter grayscale hover:grayscale-0 transition duration-500">
                            <div class="flex flex-col items-center text-center w-full flex-1">
                                <h3 class="text-lg font-bold text-gray-700 mb-3">{{ $card['title'] }}</h3>
                                <p class="text-gray-600 text-sm mb-4 flex-1">{{ $card['desc'] }}</p>
                                <a href="{{ route($routes[$i]) }}"
                                    class="bg-gray-800 text-white px-5 py-2 rounded-full hover:bg-gray-700 mt-auto transition-colors inline-block text-center text-sm">
                                    {{ $card['btn'] }}
                                </a>
                            </div>
                        </div>
                    @endfor
                </div>

                {{-- Baris 2: 3 cards --}}
                <div class="flex flex-wrap justify-center gap-6">
                    @for ($i = 2; $i < 5; $i++)
                        @php $card = $cards[$i]; @endphp
                        <div
                            class="bg-white border border-gray-300 rounded-[16px] flex flex-col w-64 p-4 min-h-[480px] shadow-sm hover:shadow-md hover:-translate-y-1 transition-all duration-300">
                            <img src="{{ asset('assets/img/' . $card['img']) }}" alt="{{ $card['title'] }}"
                                class="w-full h-52 object-cover rounded-[12px] mb-4 filter grayscale hover:grayscale-0 transition duration-500">
                            <div class="flex flex-col items-center text-center w-full flex-1">
                                <h3 class="text-base font-bold text-gray-700 mb-3">{{ $card['title'] }}</h3>
                                <p class="text-gray-600 text-sm mb-4 flex-1">{{ $card['desc'] }}</p>
                                <a href="{{ route($routes[$i]) }}"
                                    class="bg-gray-800 text-white px-4 py-2 rounded-full hover:bg-gray-700 mt-auto transition-colors inline-block text-center text-sm">
                                    {{ $card['btn'] }}
                                </a>
                            </div>
                        </div>
                    @endfor
                </div>
            </div>
        </div>
    </section>

    {{-- Section TRUSTED BY --}}
    <section class="relative bg-white py-12 md:py-20">
        <div class="container max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- Title --}}
            <div class="text-center mb-8 md:mb-12">
                <h2
                    class="text-xl sm:text-2xl md:text-3xl lg:text-4xl tracking-[0.2em] md:tracking-[0.3em] text-gray-700 mb-4 md:mb-6">
                    {!! __('home/trusted_by.title') !!}
                </h2>
                <p class="text-sm md:text-base text-gray-600 px-4">{{ __('home/trusted_by.subtitle') }}</p>
            </div>

            {{-- Client Logos Auto Slide --}}
            <div class="relative mb-8 md:mb-12 overflow-hidden">
                <div id="client-logos" class="flex gap-6 md:gap-10 items-center py-4 px-2 md:px-4">
                    @foreach ($clients as $client)
                        <div class="flex-shrink-0 flex justify-center items-center">
                            <img src="{{ asset('storage/' . $client->logo) }}" alt="{{ $client->company_name }}"
                                class="h-12 md:h-16 w-auto object-contain grayscale hover:grayscale-0 transition duration-300" />
                        </div>
                    @endforeach
                </div>
            </div>

            {{-- Bottom Text --}}
            <div class="text-center mt-8 mb-8 md:mt-12 md:mb-12 px-4">
                <h3 class="text-base sm:text-lg md:text-xl lg:text-2xl font-semibold text-gray-700">
                    {!! __('home/trusted_by.bottom_text') !!}
                </h3>
            </div>

            {{-- Projects Carousel --}}
            @php
                $projects = $trustedProjects->where('is_highlighted', false)->values();
            @endphp

            <div class="relative mb-8 md:mb-12 px-0 md:px-0">

                <!-- Slider -->
                <div class="swiper projects-swiper overflow-hidden relative">
                    <div class="swiper-wrapper">
                        @foreach ($projects as $project)
                            <div class="swiper-slide border border-gray-200 rounded-2xl p-4 flex flex-col group">
                                {{-- Client & Project Name --}}
                                <div class="flex justify-between items-center mb-2">
                                    <p class="text-xs text-gray-500">{{ $project->client ?? 'Unknown Client' }}</p>
                                    @if ($project->project_url)
                                        <a href="{{ $project->project_url }}" target="_blank" class="flex-shrink-0">
                                            <img src="/assets/img/icon/iconlink.png" alt="External Link"
                                                class="w-4 h-4 md:w-5 md:h-5">
                                        </a>
                                    @endif
                                </div>
                                <h3 class="font-semibold text-gray-700 mb-3">{{ $project->name }}</h3>
                                {{-- Image --}}
                                <div class="rounded-xl overflow-hidden relative">
                                    <img src="{{ $project->project_img ? asset('storage/' . $project->project_img) : asset('assets/img/dummy/dummy1.png') }}"
                                        class="w-full object-cover">
                                    <div
                                        class="absolute inset-0 bg-black bg-opacity-70 opacity-0 group-hover:opacity-100 transition-opacity duration-500 flex flex-col justify-center items-center text-white px-4 text-center">
                                        <h3 class="text-sm md:text-base font-semibold mb-2">Ideas in Action</h3>
                                        <p class="text-xs md:text-sm leading-snug">
                                            A showcase of campaigns, stories, and experiences that create real connections
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Tombol navigasi - Hide on mobile, show on tablet+ -->
                <button id="my-prev"
                    class="hidden lg:block absolute left-[-50px] top-1/2 transform -translate-y-1/2 bg-gray-800 p-2 rounded-full shadow-md hover:bg-gray-700 z-50 transition-all">
                    <img src="{{ asset('assets/img/arrow-left.png') }}" class="w-10 h-10" alt="Previous">
                </button>
                <button id="my-next"
                    class="hidden lg:block absolute right-[-50px] top-1/2 transform -translate-y-1/2 bg-gray-800 p-2 rounded-full shadow-md hover:bg-gray-700 z-50 transition-all">
                    <img src="{{ asset('assets/img/arrow-right.png') }}" class="w-10 h-10" alt="Next">
                </button>

                <!-- Pagination dots for mobile -->
                <div class="swiper-pagination lg:hidden mt-6"></div>

            </div>

        </div>
    </section>

    <!-- Swiper CSS & JS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

    <script>
        // Inisialisasi Swiper
        const swiper = new Swiper('.projects-swiper', {
            slidesPerView: 1.2,
            spaceBetween: 12,
            centeredSlides: false,
            loop: true,
            autoplay: {
                delay: 4000,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            breakpoints: {
                480: {
                    slidesPerView: 1.5,
                    spaceBetween: 12,
                },
                640: {
                    slidesPerView: 2,
                    spaceBetween: 14,
                },
                768: {
                    slidesPerView: 2.5,
                    spaceBetween: 16,
                },
                1024: {
                    slidesPerView: 3,
                    spaceBetween: 16,
                }
            }
        });

        // Tombol samping mengontrol Swiper (untuk desktop)
        const prevBtn = document.getElementById('my-prev');
        const nextBtn = document.getElementById('my-next');

        if (prevBtn && nextBtn) {
            prevBtn.addEventListener('click', () => swiper.slidePrev());
            nextBtn.addEventListener('click', () => swiper.slideNext());
        }

        // Client logos auto-slide seamless
        const clientLogos = document.getElementById('client-logos');
        if (clientLogos) {
            const logosWidth = clientLogos.scrollWidth / 2; // Divide by 2 because we'll duplicate
            let offset = 0;
            const cloneLogos = clientLogos.innerHTML;
            clientLogos.innerHTML += cloneLogos; // Duplicate for seamless loop

            function slideLogos() {
                offset += 0.5; // Slower speed for mobile
                if (offset >= logosWidth) offset = 0;
                clientLogos.style.transform = `translateX(-${offset}px)`;
                requestAnimationFrame(slideLogos);
            }
            requestAnimationFrame(slideLogos);
        }
    </script>

    <section class="w-full bg-gray-100 relative min-h-[520px] flex items-center justify-center">
        <!-- Overlay gelap -->
        <div class="absolute inset-0 bg-black/30 z-[5] pointer-events-none"></div>

        <!-- Tombol kiri (di luar container) -->
        <button id="prev"
            class="absolute left-[2cm] top-1/2 -translate-y-1/2 z-30 w-14 h-14 flex items-center justify-center">
            <img src="{{ asset('assets/img/arrow-left.png') }}" alt="Prev"
                class="w-12 h-12 opacity-80 hover:opacity-100">
        </button>

        <!-- Container utama -->
        <div class="max-w-7xl mx-auto relative flex items-stretch min-h-[520px] overflow-hidden z-10">
            <!-- Container slider -->
            <div id="testimonial-container" class="flex w-full transition-transform duration-500 ease-in-out">
                @foreach ($testimonis as $testimoni)
                    <!-- satu item slider -->
                    <div class="flex-shrink-0 w-full flex relative items-stretch">
                        <!-- CARD TESTIMONI -->
                        <div
                            class="w-full md:w-[48%] flex items-center justify-center relative z-20 px-4 md:px-0 md:-mr-[6%]">
                            <div
                                class="bg-white rounded-xl p-6 md:p-8 shadow-lg w-full max-w-md md:max-w-none relative flex flex-col items-center">

                                <!-- Avatar -->
                                <div
                                    class="absolute -top-12 left-1/2 -translate-x-1/2 w-24 h-24 md:w-28 md:h-28 rounded-full overflow-hidden border-4 border-white shadow-md">
                                    <img src="{{ $testimoni->photo && file_exists(public_path('storage/' . $testimoni->photo))
                                        ? asset('storage/' . $testimoni->photo)
                                        : asset('assets/img/dummy/avatar.png') }}"
                                        alt="{{ $testimoni->name }}" class="w-full h-full object-cover">
                                </div>

                                <!-- Isi card -->
                                <div class="mt-16 text-center px-2 md:px-4">
                                    <h3 class="font-semibold text-lg">{{ $testimoni->name }}</h3>
                                    <p class="text-gray-500 text-sm">
                                        {{ $testimoni->title }} at {{ $testimoni->company }}
                                    </p>
                                    <p class="mt-4 text-gray-600 text-sm italic">
                                        {{ $testimoni->message }}
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- FOTO COVER (desktop) -->
                        <div class="hidden md:block md:w-[52%] relative overflow-hidden z-10">
                            @if ($testimoni->photo_cover && file_exists(public_path('storage/' . $testimoni->photo_cover)))
                                <img src="{{ asset('storage/' . $testimoni->photo_cover) }}" alt="Cover"
                                    class="absolute inset-0 w-full h-full object-cover">
                            @else
                                <img src="{{ asset('assets/img/dummy/dummy1.png') }}" alt="Cover"
                                    class="absolute inset-0 w-full h-full object-cover">
                            @endif
                        </div>

                        <!-- FOTO COVER (mobile) -->
                        @if ($testimoni->photo_cover && file_exists(public_path('storage/' . $testimoni->photo_cover)))
                            <img src="{{ asset('storage/' . $testimoni->photo_cover) }}" alt="Cover"
                                class="md:hidden absolute inset-0 w-full h-full object-cover z-0">
                        @else
                            <img src="{{ asset('assets/img/dummy/dummy1.png') }}" alt="Cover"
                                class="md:hidden absolute inset-0 w-full h-full object-cover z-0">
                        @endif
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Tombol kanan (di luar container) -->
        <button id="next"
            class="absolute right-[2cm] top-1/2 -translate-y-1/2 z-30 w-14 h-14 flex items-center justify-center">
            <img src="{{ asset('assets/img/arrow-right.png') }}" alt="Next"
                class="w-12 h-12 opacity-80 hover:opacity-100">
        </button>
    </section>

    <script>
        const container = document.getElementById('testimonial-container');
        const items = container.children;
        let current = 0;

        function showItem(index) {
            container.style.transform = `translateX(-${index * 100}%)`;
        }

        showItem(current);

        // Tombol klik
        document.getElementById('prev').addEventListener('click', () => {
            current = (current === 0) ? items.length - 1 : current - 1;
            showItem(current);
        });

        document.getElementById('next').addEventListener('click', () => {
            current = (current === items.length - 1) ? 0 : current + 1;
            showItem(current);
        });

        // Swipe support (mobile)
        let startX = 0;
        let endX = 0;

        container.addEventListener('touchstart', (e) => {
            startX = e.touches[0].clientX;
        });

        container.addEventListener('touchmove', (e) => {
            endX = e.touches[0].clientX;
        });

        container.addEventListener('touchend', () => {
            let diff = startX - endX;

            if (Math.abs(diff) > 50) { // threshold supaya tidak terlalu sensitif
                if (diff > 0) {
                    // swipe left -> next
                    current = (current === items.length - 1) ? 0 : current + 1;
                } else {
                    // swipe right -> prev
                    current = (current === 0) ? items.length - 1 : current - 1;
                }
                showItem(current);
            }
        });
    </script>

    {{-- CTA Section --}}
    <section class="relative bg-cover bg-center text-white font-poppins"
        style="background-image: url('/assets/img/cta-bg.png');">
        <div class="absolute inset-0 bg-black/40"></div> {{-- Overlay biar teks jelas --}}

        <div
            class="relative max-w-screen-xl mx-auto px-6 py-20 flex flex-col md:flex-row items-center md:items-start justify-between">

            {{-- Left Big Text --}}
            <div class="mb-12 md:mb-0 text-center md:text-left">
                <h2 class="text-4xl md:text-6xl leading-relaxed tracking-[0.5em]">
                    <span class="font-thin block">{{ __('home/cta.dream') }}</span>
                    <span class="font-bold block">{{ __('home/cta.bolder') }}</span>
                    <span class="font-thin block">{{ __('home/cta.achieve') }}</span>
                    <span class="font-bold block">{{ __('home/cta.bigger') }}</span>
                </h2>
            </div>

            {{-- Right Content --}}
            <div class="max-w-lg text-center md:text-left">
                <h3 class="text-2xl md:text-3xl font-semibold mb-4">{{ __('home/cta.title') }}</h3>
                <p class="text-base md:text-lg mb-6 leading-relaxed">
                    {{ __('home/cta.description') }}
                </p>
                <a href="{{ route('contact.index') }}"
                    class="inline-block bg-white text-gray-900 px-6 py-3 rounded-full font-medium hover:bg-gray-200 transition">
                    {{ __('home/cta.button') }}
                </a>
            </div>
        </div>
    </section>

    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-6">

            <!-- Section Title -->
            <div class="text-center mb-12 sm:mb-16">
                <h2
                    class="font-poppins text-xl sm:text-3xl md:text-4xl font-normal 
           text-[#666666] tracking-normal sm:tracking-[0.35em] leading-snug mb-4 sm:mb-6">
                    {!! __('home/insights.title') !!}
                </h2>
                <p class="text-gray-600 text-base sm:text-lg mt-2">
                    {{ __('home/insights.description') }}
                </p>
            </div>

            <!-- Masonry Layout -->
            <div class="columns-1 md:columns-3 gap-6 space-y-6">
                @foreach ($blogs as $blog)
                    <div class="break-inside-avoid bg-white rounded-2xl shadow-sm p-5 border border-gray-200 space-y-4">
                        <p class="text-sm text-gray-500">{{ $blog->category }}</p>
                        <a href="{{ route('insight.show', $blog->slug) }}" class="block">
                            <h3 class="text-lg font-medium text-gray-800 hover:text-gray-600 transition">
                                {{ $blog->title }}
                            </h3>
                        </a>
                        @if ($blog->headline_img)
                            <img src="{{ asset('storage/' . $blog->headline_img) }}"
                                alt="{{ $blog->headline_img_alt ?? $blog->title }}"
                                class="w-full rounded-xl object-cover">
                        @else
                            <img src="{{ asset('assets/img/blog1.png') }}" alt="Default Blog Image"
                                class="w-full rounded-xl object-cover">
                        @endif
                    </div>
                @endforeach
            </div>

            <!-- Read More Button -->
            <div class="text-center mt-12">
                {{ $blogs->links() }}
            </div>

        </div>
    </section>
@endsection
