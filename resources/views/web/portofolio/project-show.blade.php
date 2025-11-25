@extends('layouts.web')

@section('title', $project->name ?? 'Project Detail')

@section('content')
    @if ($portfolioDetail)

        <section class="relative w-full h-[70vh] flex items-center justify-center overflow-hidden">
            @if ($portfolioDetail->bg_hero)
                <img src="{{ asset('storage/' . $portfolioDetail->bg_hero) }}"
                    alt="{{ $portfolioDetail->hero_title ?? 'Hero Image' }}"
                    class="absolute inset-0 w-full h-full object-cover">
            @endif

            <div class="absolute inset-0 bg-black/30"></div>

            <h1 class="relative z-10 text-white text-5xl md:text-6xl font-light tracking-[0.4em] text-center uppercase">
                @if (app()->getLocale() == 'id' && $portfolioDetail->hero_title_id)
                    {{ $portfolioDetail->hero_title_id ?? '' }}
                @else
                    {{ $portfolioDetail->hero_title ?? '' }}
                @endif
            </h1>
        </section>

        <section class="max-w-6xl mx-auto py-16 px-6 md:px-0 grid md:grid-cols-2 gap-12 items-start">

            {{-- LEFT SIDE --}}
            <div>
                {{-- CLIENT LOGO --}}
                @if ($portfolioDetail->client && $portfolioDetail->client->logo)
                    <div class="mb-6">
                        <img src="{{ asset('storage/' . $portfolioDetail->client->logo) }}"
                            alt="{{ $portfolioDetail->client->company_name }}" class="h-16 object-contain">
                    </div>
                @endif

                {{-- DESCRIPTION --}}
                @if (app()->getLocale() == 'id' && $portfolioDetail->description_id)
                    <div class="text-gray-700 leading-relaxed">
                        {!! nl2br(e($portfolioDetail->description_id)) !!}
                    </div>
                @else
                    @if ($portfolioDetail->description)
                        <div class="text-gray-700 leading-relaxed">
                            {!! nl2br(e($portfolioDetail->description)) !!}
                        </div>
                    @endif
                @endif
            </div>

            {{-- RIGHT SIDE --}}
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
                @else
                    <p class="text-gray-500 text-sm">No deliverables listed.</p>
                @endif
            </div>

        </section>

        @if ($portfolioDetail->img)
            <section class="w-full py-20 px-4">
                <div class="max-w-6xl mx-auto">
                    <div class="w-full rounded-2xl overflow-hidden shadow-md">
                        <img src="{{ asset('storage/' . $portfolioDetail->img) }}" alt="Project Image"
                            class="w-full h-[400px] md:h-[500px] object-cover">
                    </div>
                </div>
            </section>
        @endif
    @else
        <section class="py-20">
            <br />
            <br />
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">
                    Project details not found
                </h2>
                <p class="mt-4 text-lg text-gray-500">
                    The details for this project are not available at the moment.
                </p>
            </div>
        </section>
    @endif

    @if ($portfolioDetail && ($portfolioDetail->project_analysis || $portfolioDetail->img_project_analysis))
        <section class="w-full py-24 px-6 md:px-0 max-w-6xl mx-auto">

            <div class="grid md:grid-cols-2 gap-10 items-center mb-24">

                {{-- Text --}}
                <div>
                    @if (app()->getLocale() == 'id' && $portfolioDetail->project_analysis_id)
                        <h2 class="tracking-[0.4em] uppercase text-gray-900 text-xl mb-4">Analisis Proyek</h2>
                        <p class="text-gray-700 leading-relaxed">
                            {!! nl2br(e($portfolioDetail->project_analysis_id)) !!}
                        </p>
                    @else
                        @if ($portfolioDetail->project_analysis)
                            <h2 class="tracking-[0.4em] uppercase text-gray-900 text-xl mb-4">Project Analysis</h2>
                            <p class="text-gray-700 leading-relaxed">
                                {!! nl2br(e($portfolioDetail->project_analysis)) !!}
                            </p>
                        @endif
                    @endif
                </div>

                {{-- Image --}}
                @if ($portfolioDetail->img_project_analysis)
                    <div class="w-full flex items-center justify-center">
                        <div
                            class="w-full max-w-sm aspect-square bg-gray-100 rounded-xl overflow-hidden flex items-center justify-center">
                            <img src="{{ asset('storage/' . $portfolioDetail->img_project_analysis) }}"
                                class="w-full h-full object-contain">
                        </div>
                    </div>
                @endif
            </div>
        </section>
    @endif


    @if ($portfolioDetail && ($portfolioDetail->challenges_and_insight || $portfolioDetail->img_challenges_and_insight))
        <section class="w-full py-24 px-6 md:px-0 max-w-6xl mx-auto">

            <div class="grid md:grid-cols-2 gap-10 items-center">

                {{-- Image --}}
                @if ($portfolioDetail->img_challenges_and_insight)
                    <div class="w-full flex items-center justify-center order-last md:order-first">
                        <div
                            class="w-full max-w-sm aspect-square bg-gray-100 rounded-xl overflow-hidden flex items-center justify-center">
                            <img src="{{ asset('storage/' . $portfolioDetail->img_challenges_and_insight) }}"
                                class="w-full h-full object-contain">
                        </div>
                    </div>
                @endif

                {{-- Text --}}
                <div class="order-first md:order-last">
                    @if (app()->getLocale() == 'id' && $portfolioDetail->challenges_and_insight_id)
                        <h2 class="tracking-[0.4em] uppercase text-gray-900 text-xl mb-4">Tantangan dan Wawasan</h2>
                        <p class="text-gray-700 leading-relaxed">
                            {!! nl2br(e($portfolioDetail->challenges_and_insight_id)) !!}
                        </p>
                    @else
                        @if ($portfolioDetail->challenges_and_insight)
                            <h2 class="tracking-[0.4em] uppercase text-gray-900 text-xl mb-4">Challenges and Insight</h2>
                            <p class="text-gray-700 leading-relaxed">
                                {!! nl2br(e($portfolioDetail->challenges_and_insight)) !!}
                            </p>
                        @endif
                    @endif
                </div>

            </div>

        </section>
    @endif


    @if ($projectResults && $projectResults->count() > 0)
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

                        {{-- IMAGE SQUARE --}}
                        <div
                            class="aspect-square w-full bg-gray-100 rounded-2xl overflow-hidden flex items-center justify-center">
                            <img src="{{ asset('storage/' . $result->result_img) }}"
                                class="w-full h-full object-contain transition-transform duration-500 group-hover:scale-105">
                        </div>

                        {{-- HOVER OVERLAY --}}
                        <div
                            class="absolute inset-0 rounded-2xl bg-black/70 opacity-0 group-hover:opacity-100 
                    transition-all duration-500 flex flex-col items-center justify-center text-white p-6 text-center">

                            <h3 class="text-lg font-semibold mb-2">{{ $result->name }}</h3>
                            <p class="text-sm leading-relaxed">{{ $result->description }}</p>

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
    
    <!-- Ideas Action Slider Section -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6">

            <!-- Section Title -->
            <div class="text-center mb-12 sm:mb-16">
                <h2
                    class="font-poppins text-xl sm:text-3xl md:text-4xl font-normal text-[#666666] tracking-normal sm:tracking-[0.35em] leading-snug mb-4 sm:mb-6">
                    M O R E &nbsp; I D E A S <br> I N &nbsp; A C T I O N
                </h2>
                <p class="text-gray-600 text-base sm:text-lg mt-2 max-w-2xl mx-auto">
                    A showcase of campaigns, stories, and experiences that create real connections
                </p>
            </div>

            <!-- Desktop Slider -->
            <div class="hidden sm:flex items-center space-x-6">

                <!-- Prev -->
                <button id="prevIdeas">
                    <img src="{{ asset('assets/img/blog-slider-left.png') }}" class="w-10 h-10">
                </button>

                <!-- Slider -->
                <div id="ideas-slider"
                    class="flex overflow-x-auto space-x-6 scrollbar-hide snap-x snap-mandatory scroll-smooth w-full">

                    @foreach ($projects as $idea)
                        <a href="{{ route('portofolio.show', ['name' => $idea->name]) }}"
                            class="relative snap-center min-w-[330px] md:min-w-[380px] rounded-2xl overflow-hidden group block">

                            <!-- IMAGE — NO CROP -->
                            <img src="{{ $idea->project_img ? asset('storage/' . $idea->project_img) : asset('assets/img/dummy/dummy1.png') }}"
                                class="w-full h-full object-contain bg-black transition duration-500 group-hover:scale-105">

                            <!-- HOVER OVERLAY -->
                            <div
                                class="absolute inset-0 bg-black bg-opacity-70 opacity-0 group-hover:opacity-100 
                               transition duration-500 flex flex-col justify-center items-center text-white 
                               text-center px-6">

                                <h3 class="text-lg font-semibold mb-2">{{ $idea->name }}</h3>
                                <p class="text-sm leading-snug max-w-xs">{{ $idea->description }}</p>

                            </div>

                        </a>
                    @endforeach

                </div>

                <!-- Next -->
                <button id="nextIdeas">
                    <img src="{{ asset('assets/img/blog-slider-right.png') }}" class="w-10 h-10">
                </button>
            </div>

            <!-- Mobile Slider -->
            <div class="sm:hidden">

                <div id="ideas-slider-mobile"
                    class="flex overflow-x-auto space-x-4 scrollbar-hide snap-x snap-mandatory scroll-smooth">

                    @foreach ($projects as $idea)
                        <a href="{{ route('portofolio.show', ['name' => $idea->name]) }}"
                            class="relative snap-center min-w-[260px] rounded-2xl overflow-hidden group block">

                            <!-- IMAGE -->
                            <img src="{{ $idea->project_img ? asset('storage/' . $idea->project_img) : asset('assets/img/dummy/dummy1.png') }}"
                                class="w-full h-full object-contain bg-black transition duration-500 group-hover:scale-105">

                            <!-- HOVER -->
                            <div
                                class="absolute inset-0 bg-black bg-opacity-70 opacity-0 group-hover:opacity-100 
                               transition duration-500 flex flex-col justify-center items-center text-white px-6 text-center">

                                <h3 class="text-base font-semibold mb-2">{{ $idea->name }}</h3>
                                <p class="text-xs leading-snug">{{ $idea->description }}</p>

                            </div>

                        </a>
                    @endforeach

                </div>

                <!-- Arrows -->
                <div class="flex justify-center space-x-6 mt-6">
                    <button id="prevIdeasMobile">
                        <img src="{{ asset('assets/img/blog-slider-left.png') }}" class="w-8 h-8">
                    </button>
                    <button id="nextIdeasMobile">
                        <img src="{{ asset('assets/img/blog-slider-right.png') }}" class="w-8 h-8">
                    </button>
                </div>
            </div>

            <!-- More Button -->
            <div class="text-center mt-12">
                <a href="{{ route('portofolio.index') }}"
                    class="inline-block bg-gray-800 text-white px-8 py-3 rounded-full hover:bg-gray-700 transition">
                    More
                </a>
            </div>

        </div>
    </section>


    <!-- JS -->
    <script>
        const ideasSlider = document.getElementById('ideas-slider');
        document.getElementById('prevIdeas').addEventListener('click', () =>
            ideasSlider.scrollBy({
                left: -400,
                behavior: 'smooth'
            })
        );
        document.getElementById('nextIdeas').addEventListener('click', () =>
            ideasSlider.scrollBy({
                left: 400,
                behavior: 'smooth'
            })
        );

        const mobile = document.getElementById('ideas-slider-mobile');
        document.getElementById('prevIdeasMobile').addEventListener('click', () =>
            mobile.scrollBy({
                left: -300,
                behavior: 'smooth'
            })
        );
        document.getElementById('nextIdeasMobile').addEventListener('click', () =>
            mobile.scrollBy({
                left: 300,
                behavior: 'smooth'
            })
        );
    </script>

@endsection
