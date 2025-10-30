@extends('layouts.web')

@section('content')
    {{-- Hero Section --}}
    <section class="relative w-full h-[80vh] flex items-end bg-cover bg-center"
        style="background-image: url('{{ asset('assets/img/ott-hero.png') }}')">

        <div class="w-full pb-20">
            <div class="max-w-7xl mx-auto px-6 md:px-12 lg:px-24">
                <div class="max-w-xl text-left">
                    <h1 class="text-2xl md:text-2xl font-light tracking-[0.5em] text-black font-poppins leading-snug">
                        P U B L I C<br />S P A C E &nbsp; M E D I A
                    </h1>
                    <h2 class="mt-6 text-lg md:text-xl font-bold font-rubik text-black">
                        Be Seen Where It Matters Most
                    </h2>
                    <p class="mt-4 text-sm md:text-base text-gray-800 font-rubik leading-relaxed">
                        Move beyond digital noise. We deliver your brand directly into the daily lives of your target
                        audience
                        through powerful, unmissable real-world displays.
                    </p>
                    <p>
                        <i>*This service is currently only available in Indonesia</i>
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- Gallery Section --}}
    <section class="w-full bg-white py-16">
        <div class="max-w-7xl mx-auto px-6 md:px-20 text-center">
            {{-- Text lebih lebar --}}
            <p class="text-base md:text-base font-rubik text-[#666666] max-w-5xl mx-auto">
                <b>Strategic Placement for Maximum Impact</b>
            </p>
            <br>
            <p class="text-base md:text-base font-rubik text-[#666666] max-w-5xl mx-auto">
                We bring the same strategic thinking and creative spirit to the real world that define our digital work.
                Our approach and methodology to media placement is designed to ensure your brand connects with the right
                audience in the right place.
            </p>

            {{-- ✅ Wrapper gambar lebih besar, tetap segaris --}}
            <div class="mt-12 flex justify-center">
                <div class="w-full bg-white max-w-6xl rounded-2xl overflow-hidden">
                    @if ($publicPresenceContent && $publicPresenceContent->head_img)
                        <img src="{{ Storage::url($publicPresenceContent->head_img) }}" alt="Gallery"
                            class="w-full h-auto object-cover transition-transform duration-500 hover:scale-105 rounded-2xl">
                    @else
                        <img src="{{ asset('assets/img/gallery1.png') }}" alt="Gallery"
                            class="w-full h-auto object-cover transition-transform duration-500 hover:scale-105 rounded-2xl">
                    @endif
                </div>
            </div>
        </div>
    </section>

    {{-- Strategy Section --}}
    <section class="w-full bg-white py-24">
        <div class="max-w-7xl mx-auto px-6 md:px-20 space-y-24">

            <div class="text-center">
                <h2 class="font-poppins text-lg md:text-xl tracking-[1em] uppercase text-[#666666] font-normal">
                    O U R &nbsp; A P P R O A C H
                </h2>
            </div>
            {{-- Row 1 --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                <div class="text-left">
                    <h2 class="text-2xl md:text-3xl font-light font-poppins tracking-[0.5em] uppercase text-[#666666]">
                        {{ $publicPresenceContent->INSIGHT_DRIVEN_STRATEGY ?? 'INSIGHT-DRIVEN STRATEGY' }}
                    </h2>
                    <p class="mt-6 font-rubik leading-relaxed text-sm md:text-base text-[#666666]">
                        {{ $publicPresenceContent->desc_INSIGHT_DRIVEN_STRATEGY ??
                            'Every powerful brand is built on a foundation of deep understanding. Our process begins with comprehensive analysis, where we dive into your market, competitive landscape, and audience behavior. This strategic thinking ensures your brand’s positioning is not only unique but also precisely aligned with your business objectives for maximum effectiveness.' }}
                    </p>
                </div>
                <div class="flex justify-center">
                    @if ($publicPresenceContent && $publicPresenceContent->img_INSIGHT_DRIVEN_STRATEGY)
                        <img src="{{ Storage::url($publicPresenceContent->img_INSIGHT_DRIVEN_STRATEGY) }}"
                            alt="Insight Driven Strategy" class="rounded-xl w-full max-w-md object-cover">
                    @else
                        <img src="{{ asset('assets/img/dummy/dummy1.png') }}" alt="Insight Driven Strategy"
                            class="rounded-xl w-full max-w-md object-cover">
                    @endif
                </div>
            </div>

            {{-- Row 2 --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                <div class="order-2 md:order-1 flex justify-center">
                    @if ($publicPresenceContent && $publicPresenceContent->img_Creative_and_Channel_Synergy)
                        <img src="{{ Storage::url($publicPresenceContent->img_Creative_and_Channel_Synergy) }}"
                            alt="Creative and Channel Synergy" class="rounded-xl w-full max-w-md object-cover">
                    @else
                        <img src="{{ asset('assets/img/dummy/dummy2.png') }}" alt="Creative and Channel Synergy"
                            class="rounded-xl w-full max-w-md object-cover">
                    @endif
                </div>
                <div class="order-1 md:order-2 text-left">
                    <h2 class="text-2xl md:text-3xl font-light font-poppins tracking-[0.5em] uppercase text-[#666666]">
                        {{ $publicPresenceContent->Creative_and_Channel_Synergy ?? 'Creative and Channel Synergy' }}
                    </h2>
                    <p class="mt-6 font-rubik leading-relaxed text-sm md:text-base text-[#666666]">
                        {{ $publicPresenceContent->desc_Creative_and_Channel_Synergy ??
                            'Strategy provides the direction, creativity makes the journey unforgettable. We translate strategic insights into bold ideas and out-of-the-box concepts with creative and different thinking. This is where we craft the unique personality and compelling narrative that gives your brand a distinctive voice.' }}
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- Services Grid Section: Public Presence --}}
    <section class="w-full py-8 bg-white text-[#666666]">
        <div class="max-w-7xl mx-auto px-6 md:px-20 text-center relative">

            {{-- Title --}}
            <h2 class="text-2xl md:text-3xl font-light font-poppins tracking-[0.5em] uppercase text-[#666666]">
                OUR SERVICES
            </h2>

            @php
                $publicPresenceSubservices = \App\Models\SubService::with('service')
                    ->whereHas('service', fn($q) => $q->where('name', 'Public Presence'))
                    ->latest()
                    ->get();
            @endphp

            {{-- Horizontal Scroll Grid --}}
            <div class="relative mt-10">
                <div id="public-presence-slider"
                    class="flex overflow-x-auto space-x-4 scrollbar-hide snap-x snap-mandatory scroll-smooth">

                    @forelse ($publicPresenceSubservices as $subservice)
                        <div class="snap-start relative group overflow-hidden rounded-2xl"
                            style="flex: 0 0 calc(33.333% - 1rem); min-width: 260px;">

                            {{-- Image --}}
                            <img src="{{ $subservice->picture_upload ? asset('storage/' . $subservice->picture_upload) : asset('assets/img/dummy/dummy1.png') }}"
                                alt="{{ $subservice->name }}"
                                class="w-full h-full object-cover rounded-2xl transition-transform duration-500 group-hover:scale-105">

                            {{-- Hover overlay --}}
                            <div
                                class="absolute inset-0 bg-black bg-opacity-70 opacity-0 group-hover:opacity-100 transition-opacity duration-500 flex flex-col justify-center items-center text-white px-4 text-center rounded-2xl">
                                <h3 class="text-sm md:text-base font-semibold mb-2">{{ $subservice->name }}</h3>
                                @if ($subservice->description)
                                    <p class="text-xs md:text-sm leading-snug">
                                        {{ Str::limit($subservice->description, 120) }}
                                    </p>
                                @else
                                    <p class="text-xs md:text-sm italic opacity-80">
                                        No additional details available.
                                    </p>
                                @endif
                            </div>
                        </div>
                    @empty
                        <p class="text-center text-gray-500 w-full">
                            No Public Presence subservices found.
                        </p>
                    @endforelse
                </div>

                {{-- Slider Buttons (nav chevron) --}}
                <button id="prevPublicPresence"
                    class="absolute -left-16 top-1/2 -translate-y-1/2 z-20 hidden md:flex hover:scale-110 transition">
                    <img src="{{ asset('assets/img/blog-slider-left.png') }}" alt="Previous"
                        class="w-8 h-8 object-contain">
                </button>

                <button id="nextPublicPresence"
                    class="absolute -right-16 top-1/2 -translate-y-1/2 z-20 hidden md:flex hover:scale-110 transition">
                    <img src="{{ asset('assets/img/blog-slider-right.png') }}" alt="Next"
                        class="w-8 h-8 object-contain">
                </button>
            </div>
        </div>
    </section>

    <br />
    
    <script>
        // Public Presence Horizontal Scroll
        const ppSlider = document.getElementById('public-presence-slider');
        const prevPP = document.getElementById('prevPublicPresence');
        const nextPP = document.getElementById('nextPublicPresence');

        const getPPSlideWidth = () => {
            const first = ppSlider.querySelector('.snap-start');
            return first ? first.offsetWidth + 16 : 300;
        };

        prevPP?.addEventListener('click', () => {
            ppSlider.scrollBy({
                left: -getPPSlideWidth(),
                behavior: 'smooth'
            });
        });

        nextPP?.addEventListener('click', () => {
            ppSlider.scrollBy({
                left: getPPSlideWidth(),
                behavior: 'smooth'
            });
        });

        const checkPPSlider = () => {
            if (ppSlider.scrollWidth > ppSlider.clientWidth) {
                prevPP?.classList.remove('hidden');
                nextPP?.classList.remove('hidden');
            } else {
                prevPP?.classList.add('hidden');
                nextPP?.classList.add('hidden');
            }
        };

        window.addEventListener('resize', checkPPSlider);
        window.addEventListener('load', checkPPSlider);
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
                            <p class="text-sm text-gray-500">{{ $blog->category }}</p>
                            <a href="{{ route('insight.show', $blog->slug) }}" class="block flex-grow">
                                <h3 class="text-lg font-medium text-[#666666] hover:text-[#666666] transition">
                                    <strong>{{ $blog->title }}</strong>
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
@endsection
