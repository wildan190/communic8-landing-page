@extends('layouts.web')

@section('title', $project->name ?? 'Project Detail')

@section('content')
    @if ($portfolioDetail)
        {{-- =======================
            HERO SECTION
        ======================== --}}
        <section class="relative w-full h-[70vh] flex items-center justify-center overflow-hidden">
            @if ($portfolioDetail->bg_hero)
                <img src="{{ asset('storage/' . $portfolioDetail->bg_hero) }}" alt="{{ $portfolioDetail->hero_title }}"
                    class="absolute inset-0 w-full h-full object-cover">
            @endif
            <div class="absolute inset-0 bg-black/30"></div>

            <h1 class="relative z-10 text-white text-5xl md:text-6xl font-light tracking-[0.4em] text-center uppercase">
                {{ $portfolioDetail->hero_title }}
            </h1>
        </section>

        {{-- =======================
            CLIENT & DESCRIPTION
        ======================== --}}
        <section class="max-w-6xl mx-auto py-16 px-6 md:px-0 grid md:grid-cols-2 gap-12 items-start">
            <div>
                {{-- CLIENT LOGO --}}
                @if ($portfolioDetail->client && $portfolioDetail->client->logo)
                    <div class="mb-6">
                        <img src="{{ asset('storage/' . $portfolioDetail->client->logo) }}"
                            alt="{{ $portfolioDetail->client->company_name }}" class="h-16 object-contain">
                    </div>
                @endif

                {{-- DESCRIPTION --}}
                <div class="text-gray-700 leading-relaxed">
                    {!! nl2br(e($portfolioDetail->description)) !!}
                </div>
            </div>

            {{-- DELIVERY LIST --}}
            <div>
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Communic8 Deliverables:</h3>
                @if ($portfolioDetail->delivery)
                    @php
                        $deliverables = array_map('trim', explode(',', $portfolioDetail->delivery));
                    @endphp
                    <div class="flex flex-wrap gap-3">
                        @foreach ($deliverables as $item)
                            <span class="bg-black text-white px-4 py-2 rounded-full text-sm font-medium">
                                {{ $item }}
                            </span>
                        @endforeach
                    </div>
                @endif
            </div>
        </section>

        {{-- =======================
            MAIN IMAGE SECTION
        ======================== --}}
        @if ($portfolioDetail->img)
            <section class="w-full py-20 px-4">
                <div class="max-w-6xl mx-auto">
                    <div class="w-full bg-red-300 rounded-2xl overflow-hidden shadow-md">
                        <img src="{{ asset('storage/' . $portfolioDetail->img) }}" alt="Project Image"
                            class="w-full h-[400px] md:h-[500px] object-cover">
                    </div>
                </div>
            </section>
        @endif
    @else
        <section class="py-20">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center">
                    <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">
                        Project details not found
                    </h2>
                    <p class="mt-4 text-lg text-gray-500">
                        The details for this project are not available at the moment.
                    </p>
                </div>
            </div>
        </section>
    @endif

    {{-- =======================
    PROJECT ANALYSIS & CHALLENGES (ZIG-ZAG)
======================== --}}
    <section class="w-full py-24 px-6 md:px-0 max-w-6xl mx-auto">

        {{-- PROJECT ANALYSIS --}}
        <div class="grid md:grid-cols-2 gap-10 items-center mb-24">

            {{-- Text --}}
            <div>
                <h2 class="tracking-[0.4em] uppercase text-gray-900 text-xl mb-4">
                    Project Analysis
                </h2>
                <p class="text-gray-700 leading-relaxed">
                    {!! nl2br(e($portfolioDetail->project_analysis ?? '')) !!}
                </p>
            </div>

            {{-- Image (Square, No Crop) --}}
            @if ($portfolioDetail->img_project_analysis)
                <div class="w-full flex items-center justify-center">
                    <div
                        class="w-full max-w-sm aspect-square bg-gray-100 rounded-xl flex items-center justify-center overflow-hidden">
                        <img src="{{ asset('storage/' . $portfolioDetail->img_project_analysis) }}"
                            class="w-full h-full object-contain">
                    </div>
                </div>
            @endif
        </div>

        {{-- CHALLENGES & INSIGHT --}}
        <div class="grid md:grid-cols-2 gap-10 items-center">

            {{-- Image (Square, No Crop) --}}
            @if ($portfolioDetail->img_challenges_and_insight)
                <div class="w-full flex items-center justify-center order-last md:order-first">
                    <div
                        class="w-full max-w-sm aspect-square bg-gray-100 rounded-xl flex items-center justify-center overflow-hidden">
                        <img src="{{ asset('storage/' . $portfolioDetail->img_challenges_and_insight) }}"
                            class="w-full h-full object-contain">
                    </div>
                </div>
            @endif

            {{-- Text --}}
            <div class="order-first md:order-last">
                <h2 class="tracking-[0.4em] uppercase text-gray-900 text-xl mb-4">
                    Challenges and Insight
                </h2>
                <p class="text-gray-700 leading-relaxed">
                    {!! nl2br(e($portfolioDetail->challenges_and_insight ?? '')) !!}
                </p>
            </div>

        </div>

    </section>
    {{-- =======================
    PROJECT RESULT
======================== --}}
    @if ($projectResults->count() > 0)
        <section class="w-full py-24 px-6 md:px-0 max-w-7xl mx-auto">

            <h2 class="tracking-[0.4em] uppercase text-center text-gray-900 text-xl mb-6">
                Project Result
            </h2>

            <p class="text-center text-gray-600 max-w-2xl mx-auto mb-12">
                Communic8 Brand Development Services shaped every aspect of the identity.
                <strong>Here are the results of the work we did.</strong>
            </p>

            <div class="grid md:grid-cols-3 gap-8">

                @foreach ($projectResults as $result)
                    <div class="relative group">

                        {{-- WRAPPER SQUARE --}}
                        <div
                            class="aspect-square w-full bg-gray-100 rounded-2xl overflow-hidden flex items-center justify-center">

                            {{-- SQUARE IMAGE - NO CROP --}}
                            <img src="{{ asset('storage/' . $result->result_img) }}"
                                class="w-full h-full object-contain transition-transform duration-500 group-hover:scale-105">
                        </div>

                        {{-- HOVER OVERLAY --}}
                        <div
                            class="absolute inset-0 rounded-2xl bg-black/70 opacity-0 group-hover:opacity-100 
                            transition-all duration-500 flex flex-col items-center justify-center text-white p-6 text-center">

                            <h3 class="text-lg font-semibold mb-2">
                                {{ $result->name }}
                            </h3>

                            <p class="text-sm leading-relaxed">
                                {{ $result->description }}
                            </p>
                        </div>

                    </div>
                @endforeach

            </div>

        </section>
    @endif

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

@endsection
