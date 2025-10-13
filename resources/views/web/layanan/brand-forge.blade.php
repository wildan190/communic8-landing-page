@extends('layouts.web')

@section('content')
    {{-- Hero Section --}}
    <section class="relative w-full h-[80vh] flex items-end bg-cover bg-center"
        style="background-image: url('{{ asset('assets/img/forge-hero.png') }}')">
        <div class="container mx-auto px-6 md:px-12 lg:px-32 pb-20">
            <div class="max-w-xl text-left">
                <h1 class="text-4xl md:text-5xl font-light tracking-[0.5em] text-black font-poppins leading-snug">
                    B R A N D <br> L A N D
                </h1>
                <h2 class="mt-6 text-lg md:text-xl font-bold font-rubik text-black">
                    Wording & Image
                </h2>
                <p class="mt-4 text-gray-800 text-base md:text-lg font-rubik leading-relaxed">
                    At Communic 8, we specialize in helping brands unlock their full potential. Our services span the entire
                    brand journey — from building a strong identity, to amplifying it through creative campaigns,
                    endorsements, and other impactful executions.
                </p>
            </div>
        </div>
    </section>


    {{-- Explanation Section --}}
    <section class="py-16 bg-white">
        <div class="container mx-auto px-6 md:px-12 lg:px-32">
            <div class="max-w-4xl mx-auto text-gray-800 font-rubik leading-relaxed space-y-6">
                <p>
                    At Communic 8, we specialize in helping brands unlock their full potential. Our services span the entire
                    brand journey — from building a strong identity, to amplifying it through creative campaigns,
                    endorsements, and other impactful executions.
                </p>
                <p>
                    What sets us apart is our ability to combine a global mindset with a local touch. For brands looking to
                    expand into Indonesia, this is our strongest advantage: we help you build solid brand equity by
                    understanding global standards while staying deeply connected to local culture, values, and consumer
                    behavior.
                </p>
                <p>
                    A brand is more than just a name, logo, or visual identity — it is a promise of consistent quality and
                    values. True brand strength comes from continuously aligning what we do, what we deliver, and what we
                    stand for with the principles that define the brand. This alignment is what earns trust, builds
                    credibility, and sustains long-term relationships with stakeholders.
                </p>
                <p>
                    In essence, building a brand means building a system of trust:
                </p>
                <ul class="list-disc list-inside space-y-2">
                    <li>Consistently delivering quality in every interaction.</li>
                    <li>Staying true to core values, even as markets evolve.</li>
                    <li>Fostering meaningful connections that extend beyond transactions.</li>
                </ul>
                <p>
                    A brand that achieves this does more than stand out in the market — it becomes a lasting force that
                    inspires confidence, loyalty, and meaningful engagement from all who experience it.
                </p>
            </div>
        </div>
    </section>

    {{-- Gallery Section --}}
    <section class="w-full bg-gray-50">
        @if ($brandForgeContent && $brandForgeContent->head_img)
            <img src="{{ asset('storage/' . $brandForgeContent->head_img) }}" alt="Gallery"
                class="w-full h-auto object-cover">
        @else
            <img src="{{ asset('assets/img/gallery1.png') }}" alt="Gallery" class="w-full h-auto object-cover">
        @endif
    </section>

    {{-- Strategy Section --}}
    <section class="w-full py-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-10 lg:px-20 space-y-16 md:space-y-24">

            {{-- Row 1 --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                <div class="text-left">
                    <h2 class="text-2xl md:text-3xl font-light font-poppins tracking-[0.5em] uppercase">
                        {!! $brandForgeContent->insight_strategy_driven ?? 'Insight-Driven<br>Strategy' !!}
                    </h2>
                    <p class="mt-6 text-gray-700 font-rubik leading-relaxed text-sm md:text-base">
                        {!! $brandForgeContent->desc_insight_strategy_driven ??
                            'Every powerful brand is built on a foundation of deep understanding...' !!}
                    </p>
                </div>
                <div class="flex justify-center">
                    <img src="{{ $brandForgeContent && $brandForgeContent->img_insight_strategy_driven ? asset('storage/' . $brandForgeContent->img_insight_strategy_driven) : asset('assets/img/dummy/dummy1.png') }}"
                        alt="Insight Driven Strategy" class="rounded-xl w-full max-w-md object-cover">
                </div>
            </div>

            {{-- Row 2 --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                <div class="order-2 md:order-1 flex justify-center">
                    <img src="{{ $brandForgeContent && $brandForgeContent->img_bold_creative_ideas ? asset('storage/' . $brandForgeContent->img_bold_creative_ideas) : asset('assets/img/dummy/dummy2.png') }}"
                        alt="Bold Creative Ideas" class="rounded-xl w-full max-w-md object-cover">
                </div>
                <div class="order-1 md:order-2 text-left">
                    <h2 class="text-2xl md:text-3xl font-light font-poppins tracking-[0.5em] uppercase">
                        {!! $brandForgeContent->bold_creative_ideas ?? 'Bold Creative<br>Ideas' !!}
                    </h2>
                    <p class="mt-6 text-gray-700 font-rubik leading-relaxed text-sm md:text-base">
                        {!! $brandForgeContent->desc_bold_creative_ideas ??
                            'Strategy provides the direction, creativity makes the journey unforgettable...' !!}
                    </p>
                </div>
            </div>

            {{-- Row 3 --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                <div class="text-left">
                    <h2 class="text-2xl md:text-3xl font-light font-poppins tracking-[0.5em] uppercase">
                        {!! $brandForgeContent->impactful_visual_identity ?? 'Impactful<br>Visual Identity' !!}
                    </h2>
                    <p class="mt-6 text-gray-700 font-rubik leading-relaxed text-sm md:text-base">
                        {!! $brandForgeContent->desc_impactful_visual_identity ??
                            'We bring your brand’s story to life through strong visuals...' !!}
                    </p>
                </div>
                <div class="flex justify-center">
                    <img src="{{ $brandForgeContent && $brandForgeContent->img_impactful_visual_identity ? asset('storage/' . $brandForgeContent->img_impactful_visual_identity) : asset('assets/img/dummy/dummy3.png') }}"
                        alt="Impactful Visual Identity" class="rounded-xl w-full max-w-md object-cover">
                </div>
            </div>
        </div>
    </section>

    {{-- Services Grid Section with Proper Spacing --}}
    <section class="w-full py-8 bg-white relative z-10">
        <div class="max-w-6xl mx-auto px-4 text-center">

            {{-- Top description --}}
            <p class="text-gray-700 font-rubik text-sm leading-snug max-w-xl mx-auto">
                Communic 8's Brand Development service shapes every facet of your identity from
                foundational research to brand design and activation.
            </p>
            <p class="mt-1 font-rubik font-semibold text-gray-900 text-sm">
                Let us help you build a resilient brand that will stand through the test of time.
            </p>

            {{-- Grid Projects Style for Brand Forge Subservices --}}
            @php
                $brandForgeSubservices = \App\Models\SubService::with('service')
                    ->whereHas('service', fn($q) => $q->where('name', 'Brand Forge'))
                    ->latest()
                    ->get();
            @endphp

            <div class="relative mt-10">
                <div id="brandforge-slider"
                    class="flex overflow-x-auto space-x-4 scrollbar-hide snap-x snap-mandatory scroll-smooth">

                    @forelse ($brandForgeSubservices as $subservice)
                        <div class="snap-start border border-gray-200 rounded-2xl p-4 flex flex-col relative group"
                            style="flex: 0 0 calc(50% - 1rem);">

                            {{-- Subservice Title --}}
                            <h3 class="font-semibold text-gray-700 mb-3 text-sm md:text-base">{{ $subservice->name }}</h3>

                            {{-- Image --}}
                            <div class="rounded-xl overflow-hidden relative">
                                @if ($subservice->picture_upload)
                                    <img src="{{ asset('storage/' . $subservice->picture_upload) }}"
                                        alt="{{ $subservice->name }}" class="w-full object-cover">
                                @else
                                    <img src="{{ asset('assets/img/dummy/dummy1.png') }}" alt="No Image"
                                        class="w-full object-cover">
                                @endif

                                {{-- Hover Overlay --}}
                                <div
                                    class="absolute inset-0 bg-black bg-opacity-70 opacity-0 group-hover:opacity-100 transition-opacity duration-500 flex flex-col justify-center items-center text-white px-4 text-center">
                                    <h3 class="text-sm md:text-base font-semibold mb-2">{{ $subservice->name }}</h3>
                                    @if ($subservice->description)
                                        <p class="text-xs md:text-sm leading-snug">
                                            {{ Str::limit($subservice->description, 120) }}</p>
                                    @else
                                        <p class="text-xs md:text-sm italic opacity-80">No additional details available.</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @empty
                        <p class="text-center text-gray-500 w-full">No Brand Forge subservices found.</p>
                    @endforelse
                </div>

                {{-- Slider Buttons --}}
                <button id="prevBrandForge"
                    class="absolute left-0 top-1/2 -translate-y-1/2 bg-white shadow-md rounded-full p-2 hover:bg-gray-100 z-10 hidden md:flex">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </button>
                <button id="nextBrandForge"
                    class="absolute right-0 top-1/2 -translate-y-1/2 bg-white shadow-md rounded-full p-2 hover:bg-gray-100 z-10 hidden md:flex">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
            </div>
        </div>
    </section>

    {{-- JS for Brand Forge Slider --}}

    <script>
        // Brand Forge Horizontal Scroll
        const brandforgeSlider = document.getElementById('brandforge-slider');
        const prevBrandForge = document.getElementById('prevBrandForge');
        const nextBrandForge = document.getElementById('nextBrandForge');
        const brandforgeSlideWidth = brandforgeSlider.querySelector('div')?.offsetWidth + 16 || 300;

        prevBrandForge?.addEventListener('click', () => brandforgeSlider.scrollBy({
            left: -brandforgeSlideWidth,
            behavior: 'smooth'
        }));
        nextBrandForge?.addEventListener('click', () => brandforgeSlider.scrollBy({
            left: brandforgeSlideWidth,
            behavior: 'smooth'
        }));

        const checkBrandforgeSlider = () => {
            if (brandforgeSlider.scrollWidth > brandforgeSlider.clientWidth) {
                prevBrandForge?.classList.remove('hidden');
                nextBrandForge?.classList.remove('hidden');
            } else {
                prevBrandForge?.classList.add('hidden');
                nextBrandForge?.classList.add('hidden');
            }
        };
        window.addEventListener('resize', checkBrandforgeSlider);
        window.addEventListener('load', checkBrandforgeSlider);
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
