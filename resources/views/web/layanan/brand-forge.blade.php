@extends('layouts.web')

@section('content')
    {{-- Hero Section --}}
    <section class="relative w-full h-[80vh] flex items-end bg-cover bg-center"
        style="background-image: url('{{ asset('assets/img/forge-hero.png') }}')">

        <div class="w-full pb-20">
            <div class="max-w-7xl mx-auto px-6 md:px-12 lg:px-24">
                <div class="max-w-xl text-left">
                    {{-- Title --}}
                    <h1 class="text-4xl md:text-5xl font-light tracking-[0.5em] text-black font-poppins leading-snug">
                        B R A N D <br> L A N D
                    </h1>

                    {{-- Subtitle --}}
                    <p class="mt-3 text-black text-base md:text-lg font-rubik font-bold tracking-[0.1em]">
                        Crafting Identity with Creativity
                    </p>

                    {{-- Description --}}
                    <p class="mt-4 text-black text-base md:text-lg font-rubik font-normal leading-relaxed">
                        We go beyond aesthetics to build and align your brand’s core quality, value, and trust.
                        Our comprehensive approach ensures a powerful consistent presence that resonates with your audience
                        in Asia.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- Explanation + Gallery Section --}}
    <section class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-10 lg:px-20">
            <div class="grid grid-cols-1 md:grid-cols-[3fr_2fr] gap-16 lg:gap-24 items-center">

                {{-- 📝 Text Section --}}
                <div class="text-[#666666] font-rubik leading-relaxed space-y-6 max-w-3xl">
                    <p>
                        At Communic 8, we specialize in helping brands unlock their full potential. Our services span the
                        entire brand journey — from building a strong identity, to amplifying it through creative campaigns,
                        endorsements, and other impactful executions.
                    </p>

                    <p>
                        What sets us apart is our ability to combine a global mindset with a local touch. For brands looking
                        to expand into Indonesia, this is our strongest advantage: we help you build solid brand equity by
                        understanding global standards while staying deeply connected to local culture, values, and consumer
                        behavior.
                    </p>

                    <p>
                        A brand is more than just a name, logo, or visual identity — it is a promise of consistent quality
                        and values. True brand strength comes from continuously aligning what we do, what we deliver, and
                        what we stand for with the principles that define the brand. This alignment is what earns trust,
                        builds credibility, and sustains long-term relationships with stakeholders.
                    </p>

                    <p>
                        In essence, building a brand means building a system of trust:
                    </p>

                    <ul class="list-decimal list-inside space-y-2 ml-2">
                        <li>Consistently delivering quality in every interaction.</li>
                        <li>Staying true to core values, even as markets evolve.</li>
                        <li>Fostering meaningful connections that extend beyond transactions.</li>
                    </ul>

                    <p>
                        A brand that achieves this does more than stand out in the market — it becomes a lasting force that
                        inspires confidence, loyalty, and meaningful engagement from all who experience it.
                    </p>
                </div>

                {{-- 🖼️ Gallery --}}
                <div class="flex justify-center md:justify-end">
                    <div class="aspect-square w-full max-w-[500px] rounded-2xl overflow-hidden bg-[#EE9A96] lg:ml-auto">
                        @if ($brandForgeContent && $brandForgeContent->head_img)
                            <img src="{{ asset('storage/' . $brandForgeContent->head_img) }}" alt="Brand Image"
                                class="w-full h-full object-cover">
                        @else
                            <img src="{{ asset('assets/img/gallery1.png') }}" alt="Brand Image"
                                class="w-full h-full object-cover opacity-0">
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- Framework Section --}}
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-6 md:px-12 lg:px-24">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">

                {{-- Left Image --}}
                <div>
                    @if ($brandForgeContent && $brandForgeContent->img_framework)
                        <img src="{{ asset('storage/' . $brandForgeContent->img_framework) }}" alt="Framework Image"
                            class="w-full h-auto rounded-[32px] object-cover">
                    @else
                        <div class="w-full h-[400px] rounded-[32px] bg-[#EF9A9A]"></div>
                    @endif
                </div>

                {{-- Right Text --}}
                <div class="text-[#0000000] font-rubik leading-relaxed space-y-6">
                    <h2 class="text-2xl md:text-3xl font-semibold font-poppins text-[#000000]">
                        Framework for Enduring Brand Value
                    </h2>

                    <div class="space-y-6">
                        @if ($brandForgeContent && $brandForgeContent->align_strategic_foundation)
                            <p>{!! $brandForgeContent->align_strategic_foundation !!}</p>
                        @endif

                        @if ($brandForgeContent && $brandForgeContent->build_constructing_the_brand_world)
                            <p>{!! $brandForgeContent->build_constructing_the_brand_world !!}</p>
                        @endif

                        @if ($brandForgeContent && $brandForgeContent->maintain_ensuring_lasting_relevance)
                            <p>{!! $brandForgeContent->maintain_ensuring_lasting_relevance !!}</p>
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- Strategy Section --}}
    <section class="w-full py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-10 lg:px-20 space-y-16 md:space-y-24 text-[#666666]">

            {{-- Row 1 --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                <div class="text-left">
                    <h2 class="text-2xl md:text-3xl font-light font-poppins tracking-[0.5em] uppercase text-[#666666]">
                        {!! $brandForgeContent->insight_strategy_driven ?? 'Insight-Driven<br>Strategy' !!}
                    </h2>
                    <p class="mt-6 font-rubik leading-relaxed text-sm md:text-base text-[#666666]">
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
                    <h2 class="text-2xl md:text-3xl font-light font-poppins tracking-[0.5em] uppercase text-[#666666]">
                        {!! $brandForgeContent->bold_creative_ideas ?? 'Bold Creative<br>Ideas' !!}
                    </h2>
                    <p class="mt-6 font-rubik leading-relaxed text-sm md:text-base text-[#666666]">
                        {!! $brandForgeContent->desc_bold_creative_ideas ??
                            'Strategy provides the direction, creativity makes the journey unforgettable...' !!}
                    </p>
                </div>
            </div>

            {{-- Row 3 --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                <div class="text-left">
                    <h2 class="text-2xl md:text-3xl font-light font-poppins tracking-[0.5em] uppercase text-[#666666]">
                        {!! $brandForgeContent->impactful_visual_identity ?? 'Impactful<br>Visual Identity' !!}
                    </h2>
                    <p class="mt-6 font-rubik leading-relaxed text-sm md:text-base text-[#666666]">
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

    {{-- Services Grid Section --}}
    <section class="w-full py-8 bg-white relative z-10 text-[#666666]">
        <div class="max-w-6xl mx-auto px-4 text-center">

            <p class="font-rubik text-sm leading-snug max-w-xl mx-auto">
                Communic 8's Brand Development service shapes every facet of your identity from
                foundational research to brand design and activation.
            </p>
            <p class="mt-1 font-rubik font-semibold text-sm">
                Let us help you build a resilient brand that will stand through the test of time.
            </p>

            {{-- Grid Projects --}}
            @php
                $brandForgeSubservices = \App\Models\SubService::with('service')
                    ->whereHas('service', fn($q) => $q->where('name', 'Brand Forge'))
                    ->latest()
                    ->get();
            @endphp

            <div class="relative mt-10">

                {{-- Slider Container --}}
                <div id="brandforge-slider"
                    class="flex overflow-x-auto space-x-4 scrollbar-hide snap-x snap-mandatory scroll-smooth">
                    @forelse ($brandForgeSubservices as $subservice)
                        <div class="snap-start relative group overflow-hidden rounded-2xl"
                            style="flex: 0 0 calc(33.333% - 1rem); min-width: 260px;">

                            {{-- Image --}}
                            <img src="{{ $subservice->picture_upload ? asset('storage/' . $subservice->picture_upload) : asset('assets/img/dummy/dummy1.png') }}"
                                alt="{{ $subservice->name }}"
                                class="w-full h-full object-cover rounded-2xl transition duration-500 group-hover:scale-105">

                            {{-- Hover overlay --}}
                            <div
                                class="absolute inset-0 bg-black bg-opacity-70 opacity-0 group-hover:opacity-100 transition-opacity duration-500 flex flex-col justify-center items-center text-white px-4 text-center rounded-2xl">
                                <h3 class="text-sm md:text-base font-semibold mb-2">{{ $subservice->name }}</h3>
                                @if ($subservice->description)
                                    <p class="text-xs md:text-sm leading-snug">
                                        {{ Str::limit($subservice->description, 120) }}</p>
                                @else
                                    <p class="text-xs md:text-sm italic opacity-80">No additional details available.</p>
                                @endif
                            </div>
                        </div>
                    @empty
                        <p class="text-center text-[#666666] w-full">No Brand Forge subservices found.</p>
                    @endforelse
                </div>

                {{-- Slider Buttons --}}
                <button id="prevBrandForge"
                    class="absolute -left-20 top-1/2 -translate-y-1/2 z-20 hidden md:flex hover:scale-110 transition">
                    <img src="{{ asset('assets/img/blog-slider-left.png') }}" alt="Previous"
                        class="w-8 h-8 object-contain">
                </button>

                <button id="nextBrandForge"
                    class="absolute -right-20 top-1/2 -translate-y-1/2 z-20 hidden md:flex hover:scale-110 transition">
                    <img src="{{ asset('assets/img/blog-slider-right.png') }}" alt="Next"
                        class="w-8 h-8 object-contain">
                </button>
            </div>
        </div>
    </section>


    {{-- JS for Brand Forge Slider --}}
    <script>
        const brandforgeSlider = document.getElementById('brandforge-slider');
        const prevBrandForge = document.getElementById('prevBrandForge');
        const nextBrandForge = document.getElementById('nextBrandForge');

        const getSlideWidth = () => {
            const first = brandforgeSlider.querySelector('.snap-start');
            return first ? first.offsetWidth + 16 : 300;
        };

        prevBrandForge?.addEventListener('click', () => {
            brandforgeSlider.scrollBy({
                left: -getSlideWidth(),
                behavior: 'smooth'
            });
        });

        nextBrandForge?.addEventListener('click', () => {
            brandforgeSlider.scrollBy({
                left: getSlideWidth(),
                behavior: 'smooth'
            });
        });

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
