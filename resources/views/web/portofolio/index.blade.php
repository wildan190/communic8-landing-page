@extends('layouts.web')

@section('content')
    <!-- Portfolio Section -->
    <section class="relative pt-56 pb-20">
        <!-- Background image flipped -->
        <div class="absolute inset-0 top-0">
            <img src="{{ asset('assets/img/heroporto.png') }}" alt="Hero Background"
                class="w-full h-[70vh] md:h-[80vh] object-cover transform scale-x-[-1] opacity-30">
        </div>

        <div class="relative z-10 max-w-7xl mx-auto px-6">
            <!-- Title -->
            <div class="text-center mb-16">
                <h1 class="font-poppins font-regular text-2xl md:text-4xl lg:text-5xl tracking-[0.3em] text-gray-700">
                    {!! app()->getLocale() == 'en'
                        ? 'B R A N D S &nbsp; W E &nbsp; E M P O W E R'
                        : __('portofolio/portofolio.title') !!}
                </h1>
                <p class="mt-6 text-gray-600 max-w-2xl mx-auto">
                    {{ app()->getLocale() == 'en'
                        ? 'From local pioneers to global leaders, we’ve been trusted to bring visions to life, creating impact on both local and global scales.'
                        : __('portofolio/portofolio.subtitle') }}
                </p>
            </div>

            @php
                $highlightedProjects = $projects->where('is_highlighted', true)->values();
                $nonHighlightedProjects = $projects->where('is_highlighted', false)->values();
            @endphp

            {{-- Highlighted Projects --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-10">
                @foreach ($highlightedProjects as $project)
                    <div class="relative group overflow-hidden rounded-2xl aspect-square">
                        <img src="{{ $project->project_img ? asset('storage/' . $project->project_img) : asset('assets/img/dummy/dummy1.png') }}"
                            alt="{{ $project->name }}"
                            class="w-full h-full object-cover transition duration-500 group-hover:scale-105 rounded-2xl">

                        {{-- Hover overlay --}}
                        <div
                            class="absolute inset-0 bg-black bg-opacity-70 opacity-0 group-hover:opacity-100 transition-opacity duration-500 flex flex-col justify-center items-center text-white px-6 text-center rounded-2xl">
                            <h3 class="text-lg md:text-xl font-semibold mb-2">{{ $project->name }}</h3>
                            <p class="text-xs md:text-sm leading-snug line-clamp-3">
                                {{ $project->description ?? '' }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Normal Projects --}}
            <div id="portfolio-grid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($nonHighlightedProjects->take(3) as $project)
                    <div class="relative group overflow-hidden rounded-2xl aspect-square">
                        <img src="{{ $project->project_img ? asset('storage/' . $project->project_img) : asset('assets/img/dummy/dummy1.png') }}"
                            alt="{{ $project->name }}"
                            class="w-full h-full object-cover transition duration-500 group-hover:scale-105 rounded-2xl">

                        {{-- Hover overlay --}}
                        <div
                            class="absolute inset-0 bg-black bg-opacity-70 opacity-0 group-hover:opacity-100 transition-opacity duration-500 flex flex-col justify-center items-center text-white px-4 text-center rounded-2xl">
                            <h3 class="text-sm md:text-base font-semibold mb-2">{{ $project->name }}</h3>
                            <p class="text-xs md:text-sm leading-snug line-clamp-3">
                                {{ $project->description ?? '' }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Hidden Extra Projects --}}
            <div id="more-projects" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 mt-8 hidden">
                @foreach ($nonHighlightedProjects->slice(3) as $project)
                    <div class="relative group overflow-hidden rounded-2xl aspect-square">
                        <img src="{{ $project->project_img ? asset('storage/' . $project->project_img) : asset('assets/img/dummy/dummy1.png') }}"
                            alt="{{ $project->name }}"
                            class="w-full h-full object-cover transition duration-500 group-hover:scale-105 rounded-2xl">

                        {{-- Hover overlay --}}
                        <div
                            class="absolute inset-0 bg-black bg-opacity-70 opacity-0 group-hover:opacity-100 transition-opacity duration-500 flex flex-col justify-center items-center text-white px-4 text-center rounded-2xl">
                            <h3 class="text-sm md:text-base font-semibold mb-2">{{ $project->name }}</h3>
                            <p class="text-xs md:text-sm leading-snug line-clamp-3">
                                {{ $project->description ?? '' }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Explore More Button --}}
            <div class="text-center mt-10">
                <button id="exploreMoreBtn"
                    class="inline-block px-8 py-3 text-sm md:text-base font-semibold text-white bg-black rounded-full
                   transition-all duration-300 hover:bg-gradient-to-r hover:from-orange-500 hover:to-yellow-400 hover:text-black hover:scale-105">
                    {{ app()->getLocale() == 'en' ? 'Explore More' : __('portofolio.button_explore') }}
                </button>
            </div>
        </div>
    </section>


    {{-- JS: Toggle More Projects --}}
    <script>
        document.getElementById('exploreMoreBtn').addEventListener('click', function() {
            const moreSection = document.getElementById('more-projects');
            moreSection.classList.toggle('hidden');
            this.textContent = moreSection.classList.contains('hidden') ? 'Explore More' : 'Show Less';
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
@endsection
