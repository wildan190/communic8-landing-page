{{-- resources/views/about/index.blade.php --}}
@extends('layouts.web')

@section('content')
    <div class="relative">

        {{-- Hero Section --}}
        <section
            class="relative bg-cover bg-center flex flex-col items-center text-center px-6 min-h-[100vh] md:min-h-[125vh]"
            style="background-image: url('{{ asset('assets/img/sectionhero.png') }}');">

            {{-- Overlay --}}
            <div class="absolute inset-0 bg-white/20"></div>

            <br class="hidden sm:block" />
            <br class="hidden sm:block" />

            {{-- Hero Title --}}
            <div class="relative z-10 pt-32 md:pt-40">
                <h1
                    class="font-poppins font-bold text-[#000000] leading-snug mb-4 sm:mb-6 text-xl sm:text-3xl md:text-4xl {{ app()->getLocale() == 'en' ? 'tracking-normal sm:tracking-[0.35em]' : 'tracking-normal' }}">
                    {!! __('about/hero.headline') !!}
                </h1>
            </div>

            {{-- Hero Content Wrapper --}}
            <div class="relative z-10 w-full flex justify-center items-center mt-20 md:mt-32">
                <div class="relative flex items-center justify-center w-[700px] md:w-[950px]">

                    {{-- Transparent Grey Box --}}
                    <div
                        class="relative z-10 bg-gray-400/70 text-white text-left w-[320px] h-[220px] md:w-[460px] md:h-[280px] flex items-center px-8 md:px-10 translate-x-[10%]">
                        <h2
                            class="font-poppins font-normal text-lg sm:text-2xl md:text-3xl tracking-[0.25em] leading-snug uppercase">
                            {!! __('about/hero.strategic_text') !!}
                        </h2>
                    </div>

                    {{-- Main Image --}}
                    <div
                        class="relative z-20 w-[340px] h-[340px] md:w-[500px] md:h-[500px] -translate-x-[10%] flex items-center justify-center overflow-visible">
                        <img src="{{ $heroAbout && $heroAbout->box_img ? asset($heroAbout->box_img) : asset('assets/img/dummy/dummy3.png') }}"
                            alt="Creative Visual" class="w-full h-auto object-contain rounded-lg" />
                    </div>

                </div>
            </div>

            {{-- About Us Section --}}
            <div class="relative z-10 max-w-3xl pb-12 md:pb-20 mt-8 md:mt-16">
                <h2
                    class="font-poppins font-normal uppercase tracking-[0.4em] text-[32px] md:text-[40px] text-[#666666] text-center">
                    ABOUT US
                </h2>

                <p class="text-gray-700 leading-relaxed text-sm md:text-base">
                    {!! __('about/hero.about_us_text') !!}
                </p>
            </div>
        </section>


        {{-- PHILOSOPHY IN ACTION --}}
        <section
            class="relative overflow-visible z-10 bg-gradient-to-r from-gray-400 to-gray-600 py-16 md:py-20 transition-colors duration-500 hover:from-orange-500 hover:to-orange-600 group">

            {{-- Container utama --}}
            <div class="w-full flex justify-center relative">

                {{-- Grid --}}
                <div
                    class="flex items-center gap-x-8 ml-12
            max-md:flex-col max-md:ml-0 max-md:text-center max-md:gap-y-8">

                    {{-- Left: Lamp (HIDE ON MOBILE) --}}
                    <div class="relative justify-center md:justify-end hidden md:flex">
                        <div class="relative w-[360px] sm:w-[400px] md:w-[440px] lg:w-[480px] -translate-y-[300px]">

                            {{-- Gambar dasar --}}
                            <img src="{{ asset('assets/img/lamp.png') }}" alt="Lamp"
                                class="w-full h-auto object-contain drop-shadow-2xl absolute top-[-200%] left-0 -mb-8
                        transition-all duration-500 group-hover:opacity-0" />

                            {{-- Gambar hover --}}
                            <img src="{{ asset('assets/img/lamphover.png') }}" alt="Lamp Hover"
                                class="w-full h-auto object-contain drop-shadow-2xl absolute top-[-200%] left-0 -mb-8 opacity-0
                        transition-all duration-500 group-hover:opacity-100" />
                        </div>
                    </div>

                    {{-- Right: Text --}}
                    <div
                        class="text-white transition-colors duration-500 text-center md:text-left w-full md:w-[100%] max-w-[720px] px-0 relative z-10 max-md:px-4">

                        {{-- Title --}}
                        <h2 class="font-poppins font-normal text-xl sm:text-2xl md:text-3xl mb-3"
                            style="letter-spacing: 0.3em; line-height: 1.2;">
                            {!! __('about/philosophy.title') !!}
                        </h2>

                        {{-- Paragraphs --}}
                        <div
                            class="space-y-2 leading-relaxed opacity-95 text-[14px] sm:text-[15px] md:text-[16px] tracking-normal font-rubik">
                            @foreach (explode("\n\n", __('about/philosophy.text')) as $paragraph)
                                <p>{{ $paragraph }}</p>
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>
        </section>

        {{-- WHY OUR PARTNER CHOOSE US --}}
        <section class="relative pt-24 sm:pt-32 md:pt-40 pb-16 sm:pb-20 md:pb-24 bg-white">
            <div class="container max-w-6xl mx-auto px-4 sm:px-6 md:px-12">

                {{-- Title --}}
                <div class="text-center mb-16">
                    <h2
                        class="font-poppins text-xl sm:text-3xl md:text-4xl font-normal mb-4 
                text-[#666666] tracking-normal sm:tracking-[0.35em] leading-snug">
                        {!! __('about/why_choose_us.title_line1') !!} <br />
                        {!! __('about/why_choose_us.title_line2') !!}
                    </h2>

                    <p class="text-gray-600 max-w-2xl sm:max-w-3xl mx-auto text-sm sm:text-base leading-relaxed">
                        {{ __('about/why_choose_us.subtitle') }}
                    </p>
                </div>

                {{-- ✅ Dynamic About Section dari Database --}}
                @if (isset($abouts) && $abouts->count() > 0)
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                        @foreach ($abouts as $about)
                            <div class="bg-white rounded-2xl transition-shadow duration-300 overflow-hidden flex flex-col">

                                {{-- Gambar --}}
                                @if ($about->img)
                                    <div class="w-full bg-gray-100 flex items-center justify-center">
                                        <img src="{{ asset('uploads/about/' . $about->img) }}" alt="{{ $about->title }}"
                                            class="w-full h-auto object-contain">
                                    </div>
                                @endif

                                {{-- Konten --}}
                                <div class="p-6 text-center flex-1 flex flex-col">
                                    <h3 class="font-semibold text-lg sm:text-xl mb-3">{{ $about->title }}</h3>
                                    <p class="text-gray-600 text-sm sm:text-base leading-relaxed flex-1">
                                        {{ $about->description }}
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-center text-gray-500">{{ __('No data available at the moment.') }}</p>
                @endif

            </div>
        </section>

        {{-- GALLERY (4 slides + gap + panah PNG custom) --}}
        <section class="relative bg-white py-10">
            <div class="swiper mySwiper w-full relative overflow-visible">
                <div class="swiper-wrapper">
                    @if ($galleries->count() > 0)
                        @for ($i = 0; $i < 8; $i++)
                            @php $gallery = $galleries[$i % $galleries->count()]; @endphp
                            <div class="swiper-slide">
                                <img src="{{ asset('storage/' . $gallery->upload_picture) }}" alt="Gallery"
                                    class="gallery-img w-full h-[320px] object-cover filter grayscale hover:grayscale-0 transition duration-500">
                            </div>
                        @endfor
                    @else
                        {{-- fallback kalau database kosong --}}
                        @php $fallbacks = ['gallery1.png','gallery2.png','gallery3.png']; @endphp
                        @for ($i = 0; $i < 8; $i++)
                            <div class="swiper-slide">
                                <img src="{{ asset('assets/img/' . $fallbacks[$i % count($fallbacks)]) }}" alt="Gallery"
                                    class="gallery-img w-full h-[320px] object-cover filter grayscale hover:grayscale-0 transition duration-500">
                            </div>
                        @endfor
                    @endif
                </div>

                {{-- Pakai PNG custom, tanpa chevron default --}}
                <div class="swiper-button-prev custom-nav" aria-label="Previous">
                    <img src="{{ asset('assets/img/arrow-left.png') }}" alt="Prev">
                </div>
                <div class="swiper-button-next custom-nav" aria-label="Next">
                    <img src="{{ asset('assets/img/arrow-right.png') }}" alt="Next">
                </div>
            </div>
        </section>

        <script>
            // Untuk mobile: tap -> hilangkan grayscale
            document.querySelectorAll('.gallery-img').forEach(img => {
                img.addEventListener('touchstart', () => {
                    img.classList.remove('grayscale');
                });
                img.addEventListener('touchend', () => {
                    // setelah lepas jari, balik lagi ke grayscale
                    setTimeout(() => img.classList.add('grayscale'), 1500);
                });
            });
        </script>

        {{-- SwiperJS --}}
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

        <style>
            /* MATIKAN chevron biru default */
            .mySwiper .swiper-button-prev::after,
            .mySwiper .swiper-button-next::after {
                display: none !important;
            }

            .mySwiper .swiper-button-prev,
            .mySwiper .swiper-button-next {
                width: auto !important;
                height: auto !important;
                position: absolute !important;
                top: 55% !important;
                transform: translateY(-50%) !important;
                z-index: 30 !important;
            }

            .mySwiper .swiper-button-prev {
                left: 16px !important;
            }

            .mySwiper .swiper-button-next {
                right: 16px !important;
            }

            .mySwiper .swiper-button-prev img,
            .mySwiper .swiper-button-next img {
                display: block;
                width: 72px;
                height: auto;
            }
        </style>

        <script>
            new Swiper(".mySwiper", {
                slidesPerView: 4,
                spaceBetween: 24, // GAP antar gambar
                loop: true,
                navigation: {
                    nextEl: ".mySwiper .swiper-button-next",
                    prevEl: ".mySwiper .swiper-button-prev",
                },
                autoplay: {
                    delay: 3000,
                    disableOnInteraction: false,
                },
                breakpoints: {
                    320: {
                        slidesPerView: 1,
                        spaceBetween: 12
                    },
                    640: {
                        slidesPerView: 2,
                        spaceBetween: 16
                    },
                    1024: {
                        slidesPerView: 3,
                        spaceBetween: 20
                    },
                    1280: {
                        slidesPerView: 4,
                        spaceBetween: 24
                    },
                }
            });
        </script>

        {{-- Brands We Empower Section --}}
        {{-- <section class="relative bg-white py-24">
            <div class="container max-w-7xl mx-auto px-6 text-center">

                <h2
                    class="font-poppins text-xl sm:text-3xl md:text-4xl font-normal mb-4 sm:mb-6
            text-[#666666] tracking-[0.35em] leading-snug uppercase">
                    {!! __('about/trusted_by_many_section.title') !!}
                </h2>

                <p
                    class="font-poppins text-base sm:text-lg md:text-xl text-gray-600 max-w-3xl mx-auto mb-12 sm:mb-16 leading-relaxed">
                    {{ __('about/trusted_by_many_section.subtitle') }}
                </p>


                @for ($i = 1; $i <= 3; $i++)
                    @php $sliderClients = $clients->where('category', $i); @endphp

                    <div class="relative mb-10">

                        <div id="logos-row-{{ $i }}"
                            class="flex gap-8 md:gap-12 items-center py-4 px-2 md:px-4 overflow-x-auto scrollbar-hide scroll-smooth">

                            @forelse ($sliderClients as $client)
                                <div class="flex-shrink-0 flex justify-center items-center w-2/5 sm:w-1/3 md:w-[16%]">
                                    <img src="{{ asset('storage/' . $client->logo) }}" alt="{{ $client->company_name }}"
                                        class="h-12 md:h-16 w-auto object-contain grayscale hover:grayscale-0 transition duration-300" />
                                </div>
                            @empty
                                <div class="text-gray-400 text-sm italic">
                                    No client in category {{ $i }}
                                </div>
                            @endforelse
                        </div>

                        <button id="prev-logos-{{ $i }}"
                            class="absolute left-[-40px] top-1/2 -translate-y-1/2 p-2 hidden lg:flex items-center justify-center z-20">
                            <img src="{{ asset('assets/img/blog-slider-left.png') }}" class="w-6 h-6 invert"
                                alt="Prev">
                        </button>

                        <button id="next-logos-{{ $i }}"
                            class="absolute right-[-40px] top-1/2 -translate-y-1/2 p-2 hidden lg:flex items-center justify-center z-20">
                            <img src="{{ asset('assets/img/blog-slider-right.png') }}" class="w-6 h-6 invert"
                                alt="Next">
                        </button>

                    </div>
                @endfor
            </div>
        </section>
        <script>
            for (let i = 1; i <= 3; i++) {
                const row = document.getElementById(`logos-row-${i}`);
                const prev = document.getElementById(`prev-logos-${i}`);
                const next = document.getElementById(`next-logos-${i}`);

                if (!row) continue;

                const scrollAmount = 200;

                prev?.addEventListener("click", () => {
                    row.scrollBy({
                        left: -scrollAmount,
                        behavior: "smooth"
                    });
                });

                next?.addEventListener("click", () => {
                    row.scrollBy({
                        left: scrollAmount,
                        behavior: "smooth"
                    });
                });
            }
        </script> --}}

        <!-- Our Partners Section -->
        <section class="py-20 bg-white">
            <div class="container mx-auto px-4 md:px-20 text-center">

                <!-- Title -->
                <div class="relative z-10 mb-12 sm:mb-16">
                    <h1
                        class="font-poppins text-xl sm:text-3xl md:text-4xl font-normal 
                text-[#666666] tracking-normal sm:tracking-[0.35em] leading-snug mb-4 sm:mb-6">
                        O U R &nbsp; P A R T N E R S
                    </h1>
                    <p class="text-gray-500 text-base sm:text-lg">
                        We collaborate with top-tier partners in the industry to deliver comprehensive and integrated
                        solutions.
                    </p>
                </div>

                <!-- Partner Logos -->
                <div class="flex flex-wrap justify-center items-center gap-10 sm:gap-16">
                    @foreach (['partner1.png', 'partner2.png', 'partner3.png', 'partner4.png'] as $partner)
                        <div
                            class="w-40 h-24 sm:w-48 sm:h-28 bg-transparent 
                    flex items-center justify-center overflow-hidden rounded-xl">
                            <img src="{{ asset('assets/img/partner/' . $partner) }}" alt="Partner Logo"
                                class="w-3/4 h-3/4 object-contain">
                        </div>
                    @endforeach
                </div>

            </div>
        </section>

        <!-- Last Activity Section -->
        <section class="py-20 bg-white">
            <div class="container mx-auto px-4 md:px-20 text-center">

                <!-- Title -->
                <div class="relative z-10 mb-12 sm:mb-16">
                    <h1
                        class="font-poppins text-xl sm:text-3xl md:text-4xl font-normal 
                text-[#666666] tracking-normal sm:tracking-[0.35em] leading-snug mb-4 sm:mb-6">
                        {!! app()->getLocale() == 'en'
                            ? 'S T A Y &nbsp; C O N N E C T E D &nbsp; W I T H'
                            : __('about/activity.title_line1') !!}
                    </h1>
                    <h1
                        class="font-poppins text-xl sm:text-3xl md:text-4xl font-normal 
                text-[#666666] tracking-normal sm:tracking-[0.35em] leading-snug">
                        {!! app()->getLocale() == 'en'
                            ? 'O U R &nbsp; L A T E S T &nbsp; A C T I V I T Y'
                            : __('about/activity.title_line2') !!}
                    </h1>
                </div>

                <!-- Grid Images -->
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 mb-12">
                    @foreach ($activities as $activity)
                        <div>
                            <img src="{{ asset('storage/' . $activity->file_img) }}"
                                alt="{{ $activity->caption ?? 'Last Activity' }}" class="w-full h-full object-cover">
                        </div>
                    @endforeach
                </div>

                <!-- Instagram Button -->
                <a href="https://www.instagram.com" target="_blank"
                    class="inline-flex items-center gap-2 bg-gray-900 text-white px-6 py-3 rounded-full text-sm font-medium hover:bg-gray-700 transition">
                    <i class="fab fa-instagram text-lg"></i>
                    {{ app()->getLocale() == 'en' ? 'Visit our Instagram' : __('about/activity.button_instagram') }}
                </a>

            </div>
        </section>

        {{-- CTA Section --}}
        <section class="relative bg-cover bg-center text-white font-poppins" style="background-image: url('/assets/img/cta-bg.png');">
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
                        class="inline-block bg-white text-gray-900 px-6 py-3 rounded-full font-medium hover:bg-white-200 transition">
                        {{ __('home/cta.button') }}
                    </a>
                </div>
            </div>
        </section>

        <!-- Blog Slider Section -->
        <section class="py-20 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6">

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

                <!-- Wrapper for Desktop (with arrows) -->
                <div class="hidden sm:flex items-center space-x-6">
                    <!-- Prev Button -->
                    <button id="prevBtn" class="shrink-0">
                        <img src="{{ asset('assets/img/blog-slider-left.png') }}" alt="Prev" class="w-10 h-10">
                    </button>

                    <!-- Slider Container -->
                    <div id="blog-slider"
                        class="flex overflow-x-auto space-x-6 scrollbar-hide snap-x snap-mandatory scroll-smooth w-full">
                        @foreach ($sliderBlogs as $blog)
                            <div
                                class="snap-center min-w-[280px] sm:min-w-[320px] md:min-w-[360px] bg-white rounded-2xl shadow-sm p-5 border border-gray-200 flex flex-col">
                                <p class="text-sm text-gray-500">{{ $blog->category->name }}</p>
                                <a href="{{ route('insight.show', $blog->slug) }}" class="block flex-grow">
                                    <h3 class="text-lg font-medium text-[#666666] hover:text-[#666666] transition">
                                        <strong>{{ app()->getLocale() == 'id' ? $blog->title_id : $blog->title }}</strong>
                                    </h3>
                                </a>
                                @if ($blog->headline_img)
                                    <img src="{{ asset('storage/' . $blog->headline_img) }}"
                                        alt="{{ $blog->headline_img_alt ?? $blog->title }}"
                                        class="w-full h-48 object-cover rounded-xl">
                                @else
                                    <img src="{{ asset('assets/img/blog1.png') }}" alt="Default Image"
                                        class="w-full h-48 object-cover rounded-xl">
                                @endif
                            </div>
                        @endforeach
                    </div>

                    <!-- Next Button -->
                    <button id="nextBtn" class="shrink-0">
                        <img src="{{ asset('assets/img/blog-slider-right.png') }}" alt="Next" class="w-10 h-10">
                    </button>
                </div>

                <!-- Mobile: Slider full width, arrows below -->
                <div class="sm:hidden">
                    <div id="blog-slider-mobile"
                        class="flex overflow-x-auto space-x-4 scrollbar-hide snap-x snap-mandatory scroll-smooth">
                        @foreach ($sliderBlogs as $blog)
                            <div
                                class="snap-center min-w-[260px] bg-white rounded-2xl shadow-sm p-4 border border-gray-200 flex flex-col">
                                <p class="text-xs text-gray-500">{{ $blog->category->name }}</p>
                                <a href="{{ route('insight.show', $blog->slug) }}" class="block flex-grow">
                                    <h3
                                        class="text-base font-medium text-gray-800 hover:text-gray-600 transition line-clamp-3 min-h-[60px] mb-3">
                                        {{ $blog->title }}
                                    </h3>
                                </a>
                                @if ($blog->headline_img)
                                    <img src="{{ asset('storage/' . $blog->headline_img) }}"
                                        alt="{{ $blog->headline_img_alt ?? $blog->title }}"
                                        class="w-full h-40 object-cover rounded-xl">
                                @else
                                    <img src="{{ asset('assets/img/blog1.png') }}" alt="Default Image"
                                        class="w-full h-40 object-cover rounded-xl">
                                @endif
                            </div>
                        @endforeach
                    </div>

                    <!-- Arrows below slider -->
                    <div class="flex justify-center space-x-6 mt-6">
                        <button id="prevBtnMobile">
                            <img src="{{ asset('assets/img/blog-slider-left.png') }}" alt="Prev" class="w-8 h-8">
                        </button>
                        <button id="nextBtnMobile">
                            <img src="{{ asset('assets/img/blog-slider-right.png') }}" alt="Next" class="w-8 h-8">
                        </button>
                    </div>
                </div>

                <!-- Read More Button -->
                <div class="text-center mt-12">
                    <a href="{{ route('insight.index') }}"
                        class="inline-block bg-gray-800 text-white px-6 py-3 rounded-full hover:bg-gray-700 transition">
                        Read More
                    </a>
                </div>

            </div>
        </section>

        <!-- JS for slider scroll -->
        <script>
            // Desktop
            const slider = document.getElementById('blog-slider');
            document.getElementById('prevBtn').addEventListener('click', () => {
                slider.scrollBy({
                    left: -400,
                    behavior: 'smooth'
                });
            });
            document.getElementById('nextBtn').addEventListener('click', () => {
                slider.scrollBy({
                    left: 400,
                    behavior: 'smooth'
                });
            });

            // Mobile
            const sliderMobile = document.getElementById('blog-slider-mobile');
            document.getElementById('prevBtnMobile').addEventListener('click', () => {
                sliderMobile.scrollBy({
                    left: -300,
                    behavior: 'smooth'
                });
            });
            document.getElementById('nextBtnMobile').addEventListener('click', () => {
                sliderMobile.scrollBy({
                    left: 300,
                    behavior: 'smooth'
                });
            });
        </script>

    </div>
@endsection
