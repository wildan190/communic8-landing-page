@extends('layouts.web')

@section('content')
    {{-- Hero Section --}}
    <section class="relative w-full h-[80vh] flex items-end bg-cover bg-center"
        style="background-image: url('{{ asset('assets/img/ott-hero.png') }}')">

        <div class="w-full pb-20">
            <div class="max-w-7xl mx-auto px-6 md:px-12 lg:px-24">
                <div class="max-w-2xl text-left">
                    <div class="max-w-2xl text-left space-y-6">
                        <h1
                            class="text-4xl md:text-5xl font-light tracking-widest md:tracking-[0.5em] text-black font-poppins leading-snug">
                            OVER-THE-TOP<br>ADVERTISING
                        </h1>

                        <p class="text-gray-800 text-lg md:text-xl font-bold font-poppins leading-relaxed">
                            Reach Your Audience Everywhere They Stream
                        </p>

                        <p class="text-gray-800 text-base md:text-lg font-rubik leading-relaxed">
                            From the largest screen in the living room to the smartphone in their hands, our OTT Advertising
                            solutions place your brand at the center of modern media consumption.
                            *This service is currently only available in Indonesia
                        </p>
                        <i>*This service is currently only available in Indonesia</i>
                    </div>

                </div>
            </div>
        </div>

    </section>

    {{-- Landing Page Frontend --}}
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-6 md:px-12 lg:px-20 grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">

            {{-- Text Section --}}
            <div class="space-y-6 font-rubik text-[#666666]">
                <h3 class="text-lg md:text-xl font-semibold">The Media Landscape Has Changed. Has Your Strategy?</h3>
                <p class="text-base md:text-lg leading-relaxed">
                    Viewers now curate their own entertainment, consuming over 3.5 billion hours of OTT content every month
                    across Southeast Asia.
                </p>
                <p class="text-base md:text-lg leading-relaxed">
                    A majority now prefer streaming services to watch their favorite shows. This isn’t just a trend, it’s a
                    fundamental shift in media behavior. To win in this new era, your brand must be present and relevant in
                    the streaming world.
                </p>
            </div>

            {{-- Image Section --}}
            <div class="flex justify-center lg:justify-end">
                <div class="w-full max-w-md rounded-xl overflow-hidden shadow-lg">
                    @if ($landing && $landing->img_1)
                        <img src="{{ asset($landing->img_1) }}" alt="Image 1" class="w-full h-auto object-cover">
                    @else
                        <div class="w-full h-64 bg-red-300"></div>
                    @endif
                </div>
            </div>
        </div>
    </section>

    {{-- Section 2 --}}
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-6 md:px-12 lg:px-20 grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">

            {{-- Image Section --}}
            <div class="flex justify-center lg:justify-start order-2 lg:order-1">
                <div class="w-full max-w-md rounded-xl overflow-hidden shadow-lg">
                    @if ($landing && $landing->img_2)
                        <img src="{{ asset($landing->img_2) }}" alt="Image 2" class="w-full h-auto object-cover">
                    @else
                        <div class="w-full h-64 bg-red-300"></div>
                    @endif
                </div>
            </div>

            {{-- Text Section --}}
            <div class="space-y-6 font-rubik text-[#666666] order-1 lg:order-2">
                <h3 class="text-lg md:text-xl font-semibold">Our OTT Advertising Solutions</h3>
                <p class="text-base md:text-lg leading-relaxed">
                    The media landscape has fundamentally shifted. Audiences have moved from traditional broadcast
                    television
                    to on-demand streaming services, creating a powerful new arena for brands to make a meaningful impact.
                    Over-the-Top (OTT) advertising allows you to connect with these highly engaged viewers directly on their
                    favorite platforms, placing your brand message in a premium, non-skippable environment.
                </p>
                <p class="text-base md:text-lg leading-relaxed">
                    Unlike traditional advertising, OTT provides unparalleled precision. We can reach specific households
                    based on their interests, viewing habits, and demographics, ensuring your message is not only seen but
                    also relevant. From the biggest screen in the living room to the mobile devices they carry everywhere,
                    our solutions are designed to capture attention where it matters most.
                </p>
            </div>

        </div>
    </section>

    {{-- Section 3 --}}
    <section class="py-20 bg-white font-rubik text-[#666666]">
        <div class="max-w-7xl mx-auto px-6 md:px-12 lg:px-20 text-center">

            {{-- <div class="flex flex-wrap justify-center gap-10 mb-12">
                <div class="flex items-start space-x-3 max-w-xs text-left">
                    <div class="w-10 h-10 flex items-center justify-center rounded bg-red-300 flex-shrink-0">
                        <i class="fas fa-tv text-white text-lg"></i>
                    </div>
                    <div>
                        <p class="font-semibold">Connected TV</p>
                        <p class="text-sm leading-snug">The premium, high impact living room experience.</p>
                    </div>
                </div>

                <div class="flex items-start space-x-3 max-w-xs text-left">
                    <div class="w-10 h-10 flex items-center justify-center rounded bg-red-300 flex-shrink-0">
                        <i class="fas fa-mobile-alt text-white text-lg"></i>
                    </div>
                    <div>
                        <p class="font-semibold">Mobile & Tablet</p>
                        <p class="text-sm leading-snug">Reach viewers on the go.</p>
                    </div>
                </div>

                <div class="flex items-start space-x-3 max-w-xs text-left">
                    <div class="w-10 h-10 flex items-center justify-center rounded bg-red-300 flex-shrink-0">
                        <i class="fas fa-desktop text-white text-lg"></i>
                    </div>
                    <div>
                        <p class="font-semibold">Desktop & Web</p>
                        <p class="text-sm leading-snug">Engage audiences wherever they work and play.</p>
                    </div>
                </div>
            </div> --}}

            <div class="mb-16">
                @if ($landing && $landing->img)
                    <img src="{{ asset($landing->img) }}" alt="Main Image"
                        class="w-full h-auto rounded-xl shadow-md object-cover">
                @else
                    <div class="w-full h-64 bg-red-300 rounded-xl"></div>
                @endif
            </div>

            {{-- Title --}}
            <div class="text-center mb-10">
                <h3
                    class="text-2xl sm:text-3xl md:text-4xl text-[#666666] font-poppins font-normal mb-2
                {{ app()->getLocale() == 'en' ? 'tracking-normal md:tracking-[0.3em]' : 'tracking-normal' }}
                leading-tight uppercase">
                    E N G I N E E R E D &nbsp; F O R<br>M E A S U R A B L E &nbsp; R E S U L T S
                </h3>
            </div>

            <br />

            {{-- Three Images / Features --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-16 text-left">
                <div class="space-y-4">
                    @if ($landing && $landing->img_3)
                        <img src="{{ asset($landing->img_3) }}" alt="Image 3"
                            class="w-full h-56 rounded-xl object-cover bg-red-300">
                    @else
                        <div class="w-full h-56 bg-red-300 rounded-xl"></div>
                    @endif
                    <h3 class="text-xl font-semibold mb-4">{{ $landing->title_text1 ?? 'High Impact Formats' }}</h3>
                    <p class="leading-relaxed">
                        {{ $landing->description1 ?? 'Capture attention with unskippable, full screen video ads and interactive formats that invite viewer engagement.' }}
                    </p>
                </div>

                <div class="space-y-4">
                    @if ($landing && $landing->img_4)
                        <img src="{{ asset($landing->img_4) }}" alt="Image 4"
                            class="w-full h-56 rounded-xl object-cover bg-red-300">
                    @else
                        <div class="w-full h-56 bg-red-300 rounded-xl"></div>
                    @endif
                    <h3 class="text-xl font-semibold mb-4">
                        {{ $landing->title_text2 ?? 'Multi Device Retargeting' }}</h3>
                    <p class="leading-relaxed">
                        {{ $landing->description2 ?? 'Engage a viewer on their Smart TV and follow up with a personalized ad on their mobile device to drive action.' }}
                    </p>
                </div>

                <div class="space-y-4">
                    @if ($landing && $landing->img_5)
                        <img src="{{ asset($landing->img_5) }}" alt="Image 5"
                            class="w-full h-56 rounded-xl object-cover bg-red-300">
                    @else
                        <div class="w-full h-56 bg-red-300 rounded-xl"></div>
                    @endif
                    <h3 class="text-xl font-semibold mb-4">
                        {{ $landing->title_text3 ?? 'Advanced Audience Targeting' }}</h3>
                    <p class="leading-relaxed">
                        {{ $landing->description3 ?? 'Move beyond basic demographics with over 78 distinct data segments to find your perfect audience.' }}
                    </p>
                </div>
            </div>

            {{-- Footer Text --}}
            {{-- <div class="text-center mb-4">
                <h4
                    class="text-2xl sm:text-3xl md:text-4xl text-[#666666] font-poppins font-normal
                {{ app()->getLocale() == 'en' ? 'tracking-normal md:tracking-[0.3em]' : 'tracking-normal' }}
                leading-tight uppercase">
                    Ready To Dominate In<br>This New Era?
                </h4>
            </div>

            <p class="text-base text-[#666666]">
                Let’s build a strategy that places your brand on the screens that matter most.
            </p> --}}

        </div>
    </section>
    
    {{-- Services Grid Section: OTT Advertising --}}
    <section class="w-full py-8 bg-white relative z-10 text-[#666666]">
        <div class="max-w-6xl mx-auto px-4 text-center">

            {{-- Title --}}
            <h2 class="text-2xl md:text-3xl font-light font-poppins tracking-[0.5em] uppercase text-[#666666]">
                OUR SERVICES
            </h2>

            <div class="relative mt-10">
                <div id="ott-slider"
                    class="flex overflow-x-auto space-x-4 scrollbar-hide snap-x snap-mandatory scroll-smooth px-4">

                    @forelse ($ottAdvertisingSubservices as $subservice)
                        <div class="snap-center relative group overflow-hidden rounded-2xl flex-shrink-0"
                            style="min-width: 200px; width: calc(70vw - 1rem); max-width: 300px;">

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
                                        {{ Str::limit($subservice->description, 120) }}
                                    </p>
                                @else
                                    <p class="text-xs md:text-sm italic opacity-80">No additional details available.</p>
                                @endif
                            </div>
                        </div>
                    @empty
                        <p class="text-center text-[#666666] w-full">No OTT Advertising subservices found.</p>
                    @endforelse
                </div>

                {{-- Slider Buttons --}}
                <button id="prevOtt"
                    class="absolute -left-4 md:-left-12 top-1/2 -translate-y-1/2 z-20 hidden md:flex hover:scale-110 transition">
                    <img src="{{ asset('assets/img/blog-slider-left.png') }}" alt="Previous"
                        class="w-8 h-8 object-contain">
                </button>
                <button id="nextOtt"
                    class="absolute -right-4 md:-right-12 top-1/2 -translate-y-1/2 z-20 hidden md:flex hover:scale-110 transition">
                    <img src="{{ asset('assets/img/blog-slider-right.png') }}" alt="Next"
                        class="w-8 h-8 object-contain">
                </button>
            </div>
        </div>
    </section>

    {{-- JS for OTT Slider --}}
    <script>
        const ottSlider = document.getElementById('ott-slider');
        const prevOtt = document.getElementById('prevOtt');
        const nextOtt = document.getElementById('nextOtt');

        const getSlideWidthOtt = () => {
            const first = ottSlider.querySelector('.snap-center');
            return first ? first.offsetWidth + 16 : 300; // 16 = spacing (gap)
        };

        prevOtt?.addEventListener('click', () => {
            ottSlider.scrollBy({
                left: -getSlideWidthOtt(),
                behavior: 'smooth'
            });
        });

        nextOtt?.addEventListener('click', () => {
            ottSlider.scrollBy({
                left: getSlideWidthOtt(),
                behavior: 'smooth'
            });
        });

        const checkOttSlider = () => {
            if (ottSlider.scrollWidth > ottSlider.clientWidth) {
                prevOtt?.classList.remove('hidden');
                nextOtt?.classList.remove('hidden');
            } else {
                prevOtt?.classList.add('hidden');
                nextOtt?.classList.add('hidden');
            }
        };

        window.addEventListener('resize', checkOttSlider);
        window.addEventListener('load', checkOttSlider);
    </script>


    {{-- CTA Section --}}
    <section class="relative bg-cover bg-center text-white font-poppins"
        style="background-image: url('/assets/img/cta-bg.png');">
        <div class="absolute inset-0 bg-black/40"></div> {{-- Overlay biar teks jelas --}}

        <div
            class="relative max-w-screen-xl mx-auto px-6 py-20 flex flex-col md:flex-row items-center md:items-start justify-between">

            {{-- Left Big Text --}}
            <div class="mb-12 md:mb-0 text-center md:text-left">
                <h2 class="text-4xl md:text-6xl leading-relaxed tracking-widest md:tracking-[0.5em]">
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
                    {{ __('home/insights.title') }}
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
