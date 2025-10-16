@extends('layouts.web')

@section('content')
    {{-- Hero Section --}}
    <section class="relative w-full h-[80vh] flex items-end bg-cover bg-center"
        style="background-image: url('{{ asset('assets/img/archihero.png') }}')">
        <div class="container mx-auto px-6 md:px-12 lg:px-32 pb-20">
            <div class="max-w-xl text-left">
                <h1 class="text-2xl md:text-2xl font-light tracking-[0.5em] text-black font-poppins leading-snug">
                    C O D E <br /> B A N D
                </h1>
                <h2 class="mt-6 text-lg md:text-xl font-bold font-rubik text-black">
                    Building Meaningful, Scalable, Future-Ready Platforms
                </h2>
            </div>
        </div>
    </section>

    {{-- Explanation Section --}}
    <section class="w-full bg-white py-16">
        <div class="container mx-auto px-6 md:px-12 lg:px-32">
            <div class="max-w-4xl mx-auto text-gray-800 font-rubik leading-relaxed space-y-6 text-left">
                <p>
                    In the digital-first era, your brand’s online presence is more than a touchpoint — it’s the foundation
                    of how audiences experience and connect with you. That’s why at Communic 8, our Digital Development
                    solutions are designed not just to build digital assets, but to create experiences that are meaningful,
                    scalable, and future-ready.
                </p>
                <p>
                    Our process begins with strategic planning and research, ensuring every solution is grounded in business
                    objectives and market insights. We then move into UX research and information architecture, structuring
                    intuitive user journeys that make every interaction seamless. From there, our team designs elegant and
                    functional UI/UX interfaces before translating them into reliable, high-performing platforms through
                    application development and coding. Each product undergoes rigorous testing and quality assurance to
                    guarantee stability and usability, followed by precise deployment and launch to ensure readiness for the
                    market.
                </p>
                <p>
                    The goal is clear: to help brands create digital ecosystems that strengthen identity, improve
                    engagement, and accelerate growth. For us, the best digital development goes beyond coding and design.
                    It’s about aligning technology with brand strategy, ensuring every platform is not only functional but
                    also truly impactful.
                </p>
            </div>
        </div>
    </section>

    {{-- Full-width Gallery Section --}}
    @if ($digitalArchitectureContent)
        <section class="w-full py-12 bg-gray-50">
            <div class="w-full">
                <img src="{{ $digitalArchitectureContent->head_img
                    ? Storage::url($digitalArchitectureContent->head_img)
                    : asset('assets/img/gallery1.png') }}"
                    alt="Gallery" class="w-full h-auto object-cover">
            </div>
        </section>
    @endif

    {{-- Section 1 --}}
    <section class="w-full py-20 bg-white">
        <div class="max-w-7xl mx-auto px-6 lg:px-20 grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">

            {{-- Left Image --}}
            <div>
                <img src="{{ $digitalArchitectureContent && $digitalArchitectureContent->img_services
                    ? Storage::url($digitalArchitectureContent->img_services)
                    : asset('assets/img/dummy/dummy2.png') }}"
                    alt="Code Band" class="rounded-xl w-full object-cover shadow-lg">
            </div>

            {{-- Right Text --}}
            <div class="space-y-6 font-rubik">
                @foreach (['1', '2', '3', '4'] as $i)
                    @php
                        $title = $digitalArchitectureContent ? $digitalArchitectureContent->{'title' . $i} : null;
                        $value = $digitalArchitectureContent ? $digitalArchitectureContent->{'value_title' . $i} : null;
                    @endphp
                    @if ($title || $value)
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900">{{ $title ?? 'Title ' . $i }}</h3>
                            <p class="text-gray-600 text-base leading-relaxed">
                                {{ $value ?? 'Description for ' . $title }}
                            </p>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>

    {{-- Section 2: Digital Architecture (Horizontal Grid Slider Style) --}}
    <section class="w-full py-20 bg-white">
        <div class="max-w-6xl mx-auto px-4 text-center">

            <h2 class="text-2xl md:text-3xl font-light font-poppins tracking-[0.5em] uppercase mb-6">
                Digital Architecture
            </h2>

            @php
                $digitalArchitectureSubservices = \App\Models\SubService::with('service')
                    ->whereHas('service', fn($q) => $q->where('name', 'Digital Architecture'))
                    ->latest()
                    ->get();
            @endphp

            <div class="relative mt-10">
                <div id="digital-architecture-slider"
                    class="flex overflow-x-auto space-x-4 scrollbar-hide snap-x snap-mandatory scroll-smooth">

                    @forelse ($digitalArchitectureSubservices as $subservice)
                        <div class="snap-start border border-gray-200 rounded-2xl p-4 flex flex-col relative group"
                            style="flex: 0 0 calc(33.333% - 1rem); min-width: 260px;">

                            {{-- Subservice Name --}}
                            <h3 class="font-semibold text-gray-700 mb-3 text-sm md:text-base">{{ $subservice->name }}</h3>

                            {{-- Image --}}
                            <div class="rounded-xl overflow-hidden relative">
                                <img src="{{ $subservice->picture_upload
                                    ? asset('storage/' . $subservice->picture_upload)
                                    : asset('assets/img/dummy/dummy1.png') }}"
                                    alt="{{ $subservice->name }}"
                                    class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">

                                {{-- Hover Overlay --}}
                                <div
                                    class="absolute inset-0 bg-black bg-opacity-70 opacity-0 group-hover:opacity-100 transition-opacity duration-500 flex flex-col justify-center items-center text-white px-4 text-center">
                                    <h3 class="text-sm md:text-base font-semibold mb-2">{{ $subservice->name }}</h3>
                                    @if ($subservice->description)
                                        <p class="text-xs md:text-sm leading-snug">
                                            {{ Str::limit($subservice->description, 120) }}
                                        </p>
                                    @else
                                        <p class="text-xs md:text-sm italic opacity-80">No additional details available.</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @empty
                        <p class="text-center text-gray-500 w-full">No Digital Architecture subservices found.</p>
                    @endforelse
                </div>

                {{-- Slider Buttons --}}
                <button id="prevDigitalArchitecture"
                    class="absolute left-0 top-1/2 -translate-y-1/2 bg-white shadow-md rounded-full p-2 hover:bg-gray-100 z-10 hidden md:flex">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </button>
                <button id="nextDigitalArchitecture"
                    class="absolute right-0 top-1/2 -translate-y-1/2 bg-white shadow-md rounded-full p-2 hover:bg-gray-100 z-10 hidden md:flex">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
            </div>
        </div>
    </section>

    <script>
        // Digital Architecture Horizontal Scroll
        const daSlider = document.getElementById('digital-architecture-slider');
        const prevDA = document.getElementById('prevDigitalArchitecture');
        const nextDA = document.getElementById('nextDigitalArchitecture');

        const getDASlideWidth = () => {
            const first = daSlider.querySelector('.snap-start');
            return first ? first.offsetWidth + 16 : 300; // tambahkan margin antar item
        };

        prevDA?.addEventListener('click', () => {
            daSlider.scrollBy({
                left: -getDASlideWidth(),
                behavior: 'smooth'
            });
        });

        nextDA?.addEventListener('click', () => {
            daSlider.scrollBy({
                left: getDASlideWidth(),
                behavior: 'smooth'
            });
        });

        const checkDASlider = () => {
            if (daSlider.scrollWidth > daSlider.clientWidth) {
                prevDA?.classList.remove('hidden');
                nextDA?.classList.remove('hidden');
            } else {
                prevDA?.classList.add('hidden');
                nextDA?.classList.add('hidden');
            }
        };

        window.addEventListener('resize', checkDASlider);
        window.addEventListener('load', checkDASlider);
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
@endsection
