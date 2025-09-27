@extends('layouts.web')

@section('content')
    {{-- Hero Section --}}
    <section class="relative w-full h-[80vh] flex items-end bg-cover bg-center"
        style="background-image: url('{{ asset('assets/img/archihero.png') }}')">
        <div class="container mx-auto px-6 md:px-12 lg:px-32 pb-20">
            <div class="max-w-xl text-left">
                <h1 class="text-2xl md:text-2xl font-light tracking-[0.5em] text-black font-poppins leading-snug">
                    P U B L I C<br />P R E S E N C E
                </h1>
                <h2 class="mt-6 text-lg md:text-xl font-bold font-rubik text-black">
                    Be Seen Where It Matters Most
                </h2>
                <p class="mt-4 text-sm md:text-base text-gray-800 font-rubik leading-relaxed">
                    Move beyond digital noise. We deliver your brand directly into the daily lives of your target audience
                    through powerful, unmissable real-world displays.
                    <i>*This service is currently only available in Indonesia</i>
                </p>
            </div>
        </div>
    </section>

    {{-- Gallery Section --}}
<section class="w-full">
    <div class="container mx-auto px-6 md:px-12 py-16 text-center">
        <p class="text-base md:text-base font-rubik text-gray-800 max-w-3xl mx-auto text-center">
            <b>Strategic Placement for Maximum Impact</b>
        </p>
        <br>
        <p class="text-base md:text-base font-rubik text-gray-800 max-w-3xl mx-auto text-center">
            We bring the same strategic thinking and creative spirit to the real world that define our digital work. 
            Our approach and methodology to media placement is designed to ensure your brand connects with the right 
            audience in the right place.
        </p>
    </div>

    {{-- ✅ Head Image dari database --}}
    @if($publicPresenceContent && $publicPresenceContent->head_img)
        <img src="{{ Storage::url($publicPresenceContent->head_img) }}" alt="Gallery" class="w-full h-auto object-cover">
    @else
        <img src="{{ asset('assets/img/gallery1.png') }}" alt="Gallery" class="w-full h-auto object-cover">
    @endif
</section>

{{-- Strategy Section --}}
<section class="w-full py-24">
    <div class="max-w-7xl mx-auto px-20 space-y-24">

        {{-- Row 1 - INSIGHT DRIVEN STRATEGY --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
            <div class="text-left">
                <h2 class="text-2xl md:text-3xl font-light font-poppins tracking-[0.5em] uppercase">
                    {{ $publicPresenceContent->INSIGHT_DRIVEN_STRATEGY ?? 'INSIGHT-DRIVEN STRATEGY' }}
                </h2>
                <p class="mt-6 text-gray-700 font-rubik leading-relaxed text-sm md:text-base">
                    {{ $publicPresenceContent->desc_INSIGHT_DRIVEN_STRATEGY ?? 
                    "Every powerful brand is built on a foundation of deep understanding. Our process begins with comprehensive analysis, where we dive into your market, competitive landscape, and audience behavior. This strategic thinking ensures your brand’s positioning is not only unique but also precisely aligned with your business objectives for maximum effectiveness." }}
                </p>
            </div>
            <div class="flex justify-center">
                @if($publicPresenceContent && $publicPresenceContent->img_INSIGHT_DRIVEN_STRATEGY)
                    <img src="{{ Storage::url($publicPresenceContent->img_INSIGHT_DRIVEN_STRATEGY) }}" 
                         alt="Insight Driven Strategy" 
                         class="rounded-xl w-full max-w-md object-cover">
                @else
                    <img src="{{ asset('assets/img/dummy/dummy1.png') }}" alt="Insight Driven Strategy" class="rounded-xl w-full max-w-md object-cover">
                @endif
            </div>
        </div>

        {{-- Row 2 - Creative and Channel Synergy --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
            <div class="order-2 md:order-1 flex justify-center">
                @if($publicPresenceContent && $publicPresenceContent->img_Creative_and_Channel_Synergy)
                    <img src="{{ Storage::url($publicPresenceContent->img_Creative_and_Channel_Synergy) }}" 
                         alt="Creative and Channel Synergy" 
                         class="rounded-xl w-full max-w-md object-cover">
                @else
                    <img src="{{ asset('assets/img/dummy/dummy2.png') }}" alt="Creative and Channel Synergy" class="rounded-xl w-full max-w-md object-cover">
                @endif
            </div>
            <div class="order-1 md:order-2 text-left">
                <h2 class="text-2xl md:text-3xl font-light font-poppins tracking-[0.5em] uppercase">
                    {{ $publicPresenceContent->Creative_and_Channel_Synergy ?? 'Creative and Channel Synergy' }}
                </h2>
                <p class="mt-6 text-gray-700 font-rubik leading-relaxed text-sm md:text-base">
                    {{ $publicPresenceContent->desc_Creative_and_Channel_Synergy ?? 
                    "Strategy provides the direction, creativity makes the journey unforgettable. We translate strategic insights into bold ideas and out-of-the-box concepts with creative and different thinking. This is where we craft the unique personality and compelling narrative that gives your brand a distinctive voice." }}
                </p>
            </div>
        </div>

    </div>
</section>


    {{-- Services Grid Section --}}
    <section class="w-full py-8 bg-white">
        <div class="max-w-6xl mx-auto px-4 text-center">

            {{-- Top description --}}
            <p class="text-gray-700 font-rubik text-sm leading-snug max-w-xl mx-auto">
                Communic 8's Brand Development service shapes every facet of your identity from
                foundational research to brand design and activation.
            </p>
            <p class="mt-1 font-rubik font-semibold text-gray-900 text-sm">
                Let us help you build a resilient brand that will stand through the test of time.
            </p>

            {{-- Grid dynamic --}}
            <div class="mt-6 grid grid-cols-2 md:grid-cols-3 gap-6">
                @forelse($publicPresenceSubservices as $subservice)
                    <div class="text-center p-1">
                        <div class="rounded-[28px] overflow-hidden w-full">
                            <img src="{{ $subservice->picture_upload ? Storage::url($subservice->picture_upload) : asset('assets/img/dummy/dummy1.png') }}"
                                alt="{{ $subservice->name }}" class="w-full h-full object-cover block">
                        </div>
                        <p class="mt-2 text-gray-700 font-rubik text-xs">{{ $subservice->name }}</p>
                    </div>
                @empty
                    <p class="col-span-full text-gray-500 text-sm">No services available at the moment.</p>
                @endforelse
            </div>
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
        <div class="max-w-7xl mx-auto px-6">

            <!-- Section Title -->
            <h2
                class="text-center font-poppins text-2xl md:text-3xl lg:text-4xl font-semibold tracking-[0.3em] text-gray-700 mb-16">
                INSIGHTS FOR <br /> STRATEGIC MIND
            </h2>

            <!-- Wrapper + Buttons -->
            <div class="flex items-center space-x-6">

                <!-- Prev Button -->
                <button id="prevBtn" class="shrink-0">
                    <img src="{{ asset('assets/img/blog-slider-left.png') }}" alt="Prev" class="w-10 h-10">
                </button>

                <!-- Slider Container -->
                <div id="blog-slider"
                    class="flex overflow-x-auto space-x-6 scrollbar-hide snap-x snap-mandatory scroll-smooth">

                    @foreach ($sliderBlogs as $blog)
                        <div
                            class="snap-center min-w-[320px] md:min-w-[360px] bg-white rounded-2xl shadow-sm p-5 border border-gray-200 flex flex-col">
                            <p class="text-sm text-gray-500">{{ $blog->category }}</p>
                            <a href="{{ route('blogs.show', $blog->slug) }}" class="block flex-grow">
                                <h3
                                    class="text-lg font-medium text-gray-800 hover:text-gray-600 transition line-clamp-3 min-h-[72px] mb-4">
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
    </script>
@endsection
