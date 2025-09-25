{{-- resources/views/about/index.blade.php --}}
@extends('layouts.web')

@section('content')
    <div class="relative">

        {{-- Hero Section --}}
        <section class="relative bg-cover bg-center min-h-[125vh] flex flex-col items-center justify-start text-center px-6"
            style="background-image: url('{{ asset('assets/img/sectionhero.png') }}');">
            <div class="absolute inset-0 bg-white/20"></div>

            <br class="hidden sm:block" />
            <br class="hidden sm:block" />

            {{-- Hero Title --}}
            <div class="relative z-10 pt-40">
                <h1
                    class="font-poppins text-xl sm:text-3xl md:text-4xl font-bold 
            text-[#000000] tracking-normal sm:tracking-[0.35em] leading-snug mb-4 sm:mb-6">
                    {{ __('about/hero.headline_1') }}
                </h1>
                <h1
                    class="font-poppins text-xl sm:text-3xl md:text-4xl font-bold 
            text-[#000000] tracking-normal sm:tracking-[0.35em] leading-snug">
                    {{ __('about/hero.headline_2') }}
                </h1>
            </div>

            {{-- Red Box PNG --}}
            <div class="absolute top-1/3 left-1/2 -translate-x-1/2 z-20">
                <img src="{{ asset('assets/img/redbox.png') }}" alt="Red Box" class="w-[420px] md:w-[520px] lg:w-[640px]">
            </div>

            {{-- About Us --}}
            <div class="relative z-10 mt-[36rem] md:mt-[40rem] lg:mt-[44rem] max-w-3xl pb-20">
                <h2 class="text-lg tracking-[0.3em] font-medium mb-6">
                    {{ __('about/hero.about_us_title') }}
                </h2>
                <p class="text-gray-700 leading-relaxed">
                    {!! __('about/hero.about_us_text') !!}
                </p>
            </div>
        </section>

        {{-- THE PHILOSOPHY --}}
        <section
            class="relative overflow-visible z-10 bg-gradient-to-r from-gray-300 via-gray-200 to-gray-600 py-20 md:py-24 -mb-20">
            <div class="container max-w-7xl mx-auto px-4 sm:px-6 md:px-12 relative">

                {{-- Lamp (left) – big & overlapping top/bottom --}}
                <img src="{{ asset('assets/img/lamp.png') }}" alt="Lamp"
                    class="hidden md:block absolute -top-40 left-0 w-[380px] lg:w-[500px] xl:w-[560px] drop-shadow-2xl z-40 pointer-events-none" />

                {{-- Mobile lamp (smaller, inline flow) --}}
                <div class="md:hidden mb-6 -mt-20 flex justify-center">
                    <img src="{{ asset('assets/img/lamp.png') }}" alt="Lamp" class="w-64 drop-shadow-2xl">
                </div>

                {{-- Grid: spacer kiri untuk lamp, teks di kanan --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-10 md:gap-12 items-center">
                    {{-- Spacer kolom lamp --}}
                    <div class="hidden md:block"></div>

                    {{-- Text Right --}}
                    <div class="text-left text-white md:pl-6">
                        <h2 class="font-poppins text-2xl sm:text-3xl md:text-4xl tracking-[0.35em] font-semibold mb-6">
                            {{ __('about/philosophy.title') }}
                        </h2>
                        <p class="leading-relaxed opacity-95">
                            {{ __('about/philosophy.paragraph_1') }}
                        </p>
                        <p class="leading-relaxed mt-4 opacity-95">
                            {{ __('about/philosophy.paragraph_2') }}
                        </p>
                        <p class="leading-relaxed mt-4 opacity-95">
                            {{ __('about/philosophy.paragraph_3') }}
                        </p>
                    </div>
                </div>
            </div>
        </section>

        {{-- WHY OUR PARTNER CHOOSE US --}}
        <section class="relative pt-32 sm:pt-40 md:pt-56 pb-16 sm:pb-20 md:pb-24 bg-white">
            <div class="container max-w-6xl mx-auto px-4 sm:px-6 md:px-12">

                {{-- Title --}}
                <div class="text-center mb-12 sm:mb-20">
                    <h2
                        class="font-poppins text-xl sm:text-3xl md:text-4xl font-normal mb-4 sm:mb-6 
           text-[#666666] tracking-normal sm:tracking-[0.35em] leading-snug">
                        {!! __('about/why_choose_us.title_line1') !!} <br />
                        {!! __('about/why_choose_us.title_line2') !!}
                    </h2>

                    <p class="text-gray-600 max-w-2xl sm:max-w-3xl mx-auto text-sm sm:text-base leading-relaxed">
                        {{ __('about/why_choose_us.subtitle') }}
                    </p>
                </div>

                {{-- List Items --}}
                <div class="space-y-12 sm:space-y-16">

                    {{-- Item 1 --}}
                    <div class="flex flex-col sm:flex-row items-center sm:items-start gap-6 sm:gap-10">
                        <img src="{{ asset('assets/img/dummy/dummy3.png') }}"
                            alt="{{ __('about/why_choose_us.item1.alt') }}"
                            class="w-32 h-32 sm:w-48 sm:h-48 object-cover rounded-lg shadow-xl flex-shrink-0 mb-4 sm:mb-0">
                        <div class="text-center sm:text-left">
                            <h3 class="font-semibold text-lg sm:text-2xl mb-2 sm:mb-3">
                                {{ __('about/why_choose_us.item1.title') }}
                            </h3>
                            <p class="text-gray-600 text-sm sm:text-base leading-relaxed">
                                {{ __('about/why_choose_us.item1.text') }}
                            </p>
                        </div>
                    </div>

                    {{-- Item 2 --}}
                    <div class="flex flex-col sm:flex-row items-center sm:items-start gap-6 sm:gap-10">
                        <img src="{{ asset('assets/img/dummy/dummy3.png') }}"
                            alt="{{ __('about/why_choose_us.item2.alt') }}"
                            class="w-32 h-32 sm:w-48 sm:h-48 object-cover rounded-lg shadow-xl flex-shrink-0 mb-4 sm:mb-0">
                        <div class="text-center sm:text-left">
                            <h3 class="font-semibold text-lg sm:text-2xl mb-2 sm:mb-3">
                                {{ __('about/why_choose_us.item2.title') }}
                            </h3>
                            <p class="text-gray-600 text-sm sm:text-base leading-relaxed">
                                {{ __('about/why_choose_us.item2.text') }}
                            </p>
                        </div>
                    </div>

                    {{-- Item 3 --}}
                    <div class="flex flex-col sm:flex-row items-center sm:items-start gap-6 sm:gap-10">
                        <img src="{{ asset('assets/img/dummy/dummy3.png') }}"
                            alt="{{ __('about/why_choose_us.item3.alt') }}"
                            class="w-32 h-32 sm:w-48 sm:h-48 object-cover rounded-lg shadow-xl flex-shrink-0 mb-4 sm:mb-0">
                        <div class="text-center sm:text-left">
                            <h3 class="font-semibold text-lg sm:text-2xl mb-2 sm:mb-3">
                                {{ __('about/why_choose_us.item3.title') }}
                            </h3>
                            <p class="text-gray-600 text-sm sm:text-base leading-relaxed">
                                {{ __('about/why_choose_us.item3.text') }}
                            </p>
                        </div>
                    </div>
                </div>
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

        {{-- Trusted by Many Section --}}
        <section class="relative bg-white py-24">
            <div class="container max-w-7xl mx-auto px-6 text-center">

                {{-- Title --}}
                <h2
                    class="font-poppins text-xl sm:text-3xl md:text-4xl font-normal mb-4 sm:mb-6 
           text-[#666666] tracking-normal sm:tracking-[0.35em] leading-snug">
                    T R U S T E D &nbsp; B Y &nbsp; M A N Y
                </h2>

                <h2
                    class="font-poppins text-xl sm:text-3xl md:text-4xl font-normal mb-12 sm:mb-16 
           text-[#666666] tracking-normal sm:tracking-[0.35em] leading-snug">
                    C E L E B R A T E D &nbsp; B Y &nbsp; A L L
                </h2>


                {{-- Logos Grid --}}
                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-7 gap-10 items-center justify-center">
                    @foreach ($clients as $client)
                        <img src="{{ $client->logo ? asset('storage/' . $client->logo) : asset('assets/img/default-logo.png') }}"
                            alt="{{ $client->company_name }}" class="max-h-14 mx-auto">
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
                        S T A Y &nbsp; C O N N E C T E D &nbsp; W I T H
                    </h1>
                    <h1
                        class="font-poppins text-xl sm:text-3xl md:text-4xl font-normal 
               text-[#666666] tracking-normal sm:tracking-[0.35em] leading-snug">
                        O U R &nbsp; L A T E S T &nbsp; A C T I V I T Y
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
                    Visit our Instagram
                </a>

            </div>
        </section>

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
                    <a href="#"
                        class="inline-block bg-white text-gray-900 px-6 py-3 rounded-full font-medium hover:bg-gray-200 transition">
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
                        I N S I G H T S &nbsp; F O R &nbsp;
                        <span class="hidden sm:inline"><br /></span>
                        S T R A T E G I C &nbsp; M I N D
                    </h2>
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
                                <p class="text-sm text-gray-500">{{ $blog->category }}</p>
                                <a href="{{ route('blogs.show', $blog->slug) }}" class="block flex-grow">
                                    <h3
                                        class="text-base sm:text-lg font-medium text-gray-800 hover:text-gray-600 transition line-clamp-3 min-h-[72px] mb-4">
                                        {{ $blog->title }}
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
                                <p class="text-xs text-gray-500">{{ $blog->category }}</p>
                                <a href="{{ route('blogs.show', $blog->slug) }}" class="block flex-grow">
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
