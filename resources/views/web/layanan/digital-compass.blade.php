@extends('layouts.web')

@section('content')
    {{-- Hero Section --}}
    <section class="relative w-full h-[80vh] flex items-end bg-cover bg-center"
        style="background-image: url('{{ asset('assets/img/digicompass.png') }}')">

        <div class="w-full pb-20">
            <div class="max-w-7xl mx-auto px-6 md:px-12 lg:px-24 flex justify-start">
                <div class="max-w-xl text-left">
                    <h1 class="text-4xl md:text-5xl font-light tracking-widest md:tracking-[0.5em] text-black font-poppins leading-snug">
                        D I G I T A L <br> S T A N D
                    </h1>
                    <h2 class="mt-6 text-lg md:text-xl font-bold font-rubik text-black">
                        Amplify Your Reach, Accelerate Your Growth
                    </h2>
                    <p class="mt-4 text-gray-700 text-base md:text-lg font-rubik leading-relaxed max-w-md">
                        Communic 8 delivers targeted digital marketing that cuts through the noise.
                        We guide your brand to effectively reach and engage your audience across Asia,
                        transforming digital complexity into measurable results.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- Explanation + Gallery Section --}}
    <section class="py-24 bg-white text-[#666666]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-10 lg:px-20">
            {{-- Grid 2 kolom: text + gambar --}}
            <div class="grid grid-cols-1 md:grid-cols-[1.5fr_1fr] gap-20 items-stretch">

                {{-- 📝 Text Section (kiri) --}}
                <div class="font-rubik leading-relaxed space-y-6 flex flex-col justify-between">
                    <div>
                        <p>
                            In the digital era, visibility alone is not enough — brands need precision, performance, and
                            adaptability.
                            That’s where Communic 8 comes in. Our digital marketing solutions are designed to not only put
                            your brand
                            in front of the right audiences, but also to ensure every interaction delivers measurable value.
                        </p>

                        <p class="font-semibold text-lg mt-4">We provide a full suite of services, including:</p>
                        <ul class="list-disc list-inside space-y-2">
                            <li>Website & Landing Page Optimization – turning visits into conversions.</li>
                            <li>Ads Performance Optimization (PPC & Paid Social) – maximizing every ad dollar.</li>
                            <li>Content & SEO Optimization – making your brand discoverable and relevant.</li>
                            <li>Automation & Tooling – ensuring efficiency and scalability.</li>
                            <li>Social Media Optimization & Retargeting – engaging the right audience at the right time.
                            </li>
                            <li>Campaign Real-Time Monitoring & Adjustment – keeping strategies agile and
                                performance-driven.</li>
                        </ul>

                        <p>
                            The goal is clear: to help brands achieve sustainable growth through data-driven, ROI-focused
                            digital
                            strategies. For us, the best digital marketing is not about doing more, but about doing what
                            works —
                            combining creative storytelling, smart targeting, and continuous optimization to deliver impact
                            that lasts.
                        </p>

                        <p>
                            With Communic 8, digital marketing isn’t just about reach — it’s about results that matter.
                        </p>
                    </div>
                </div>

                {{-- 🖼️ Gallery Section (kanan) --}}
                <div class="flex justify-center md:justify-end">
                    <div class="w-full relative max-w-none">
                        {{-- Wrapper persegi --}}
                        <div class="w-full relative"
                            style="padding-top:100%; border-radius:1rem; overflow:hidden; background-color:#EE9A96;">
                            @if ($digitalCompassContent && $digitalCompassContent->head_img)
                                <img src="{{ Storage::url($digitalCompassContent->head_img) }}" alt="Gallery"
                                    class="absolute top-0 left-0 w-full h-full object-cover">
                            @else
                                <img src="{{ asset('assets/img/gallery1.png') }}" alt="Gallery"
                                    class="absolute top-0 left-0 w-full h-full object-cover opacity-0">
                            @endif
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- 📌 Full Width Aligned With Other Sections --}}
    <section class="w-full py-20 bg-white text-[#666666]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="w-full flex justify-center">
                <div class="aspect-[16/9] w-full max-w-[1200px] rounded-2xl overflow-hidden bg-[#EE9A96]">
                    @if ($digitalCompassContent && $digitalCompassContent->img_photo)
                        <img src="{{ Storage::url($digitalCompassContent->img_photo) }}" alt="Digital Compass"
                            class="w-full h-full object-cover">
                    @else
                        <img src="{{ asset('assets/img/gallery1.png') }}" alt="Digital Compass"
                            class="w-full h-full object-cover opacity-0">
                    @endif
                </div>
            </div>

        </div>
    </section>

    {{-- Section 1 --}}
    <section class="w-full py-20 bg-white text-[#666666]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">

            {{-- Left Image --}}
            <div>
                @if ($digitalCompassContent && $digitalCompassContent->img_services)
                    <img src="{{ Storage::url($digitalCompassContent->img_services) }}" alt="Digital Compass"
                        class="rounded-xl w-full object-cover">
                @else
                    <img src="{{ asset('assets/img/dummy/dummy2.png') }}" alt="Digital Compass"
                        class="rounded-xl w-full object-cover">
                @endif
            </div>

            {{-- Right Text --}}
            <div class="space-y-6 font-rubik">
                @for ($i = 1; $i <= 4; $i++)
                    @php
                        $title = $digitalCompassContent->{'title' . $i} ?? null;
                        $value = $digitalCompassContent->{'value_title' . $i} ?? null;
                    @endphp

                    <div>
                        <h3 class="text-lg font-semibold text-[#666666]">
                            {{ $title ??
                                match ($i) {
                                    1 => 'REACH',
                                    2 => 'ACT',
                                    3 => 'CONVERT',
                                    4 => 'ENGAGE',
                                } }}
                        </h3>
                        <p class="text-[#666666] text-base leading-relaxed">
                            {{ $value ??
                                match ($i) {
                                    1
                                        => 'We expand your visibility, ensuring your brand connects with the right “Prospect & Customer” across relevant digital channels.',
                                    2 => 'We inspire and encourage your audience to interact meaningfully with your content and offerings.',
                                    3 => 'We drive tangible outcomes, turning your prospects into leads.',
                                    4 => 'We build lasting relationships, fostering loyalty and advocacy over time with your customer base.',
                                } }}
                        </p>
                    </div>
                @endfor
            </div>
        </div>
    </section>

    {{-- Section 2: Digital Stand (Horizontal Scroll Grid Style) --}}
    <section class="w-full py-8 bg-white text-[#666666]">
        <div class="max-w-6xl mx-auto px-4 text-center relative">

            {{-- Title --}}
            <h2 class="text-2xl md:text-3xl font-light font-poppins tracking-[0.5em] uppercase text-[#666666]">
                OUR SERVICES
            </h2>

            @php
                $digitalCompassSubservices = \App\Models\SubService::with('service')
                    ->whereHas('service', fn($q) => $q->where('name', 'Digital Stand'))
                    ->latest()
                    ->get();
            @endphp

            <div class="relative mt-10">
                {{-- Slider --}}
                <div id="digital-stand-slider"
                    class="flex overflow-x-auto space-x-4 scrollbar-hide snap-x snap-mandatory scroll-smooth">

                    @forelse ($digitalCompassSubservices as $subservice)
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
                        <p class="text-center w-full">No Digital Stand subservices found.</p>
                    @endforelse
                </div>

                {{-- Tombol Navigasi --}}
                <div class="hidden md:block">
                    <button id="prevDigitalStand"
                        class="absolute -left-20 top-1/2 -translate-y-1/2 z-20 flex hover:scale-110 transition">
                        <img src="{{ asset('assets/img/blog-slider-left.png') }}" alt="Previous"
                            class="w-8 h-8 object-contain">
                    </button>

                    <button id="nextDigitalStand"
                        class="absolute -right-20 top-1/2 -translate-y-1/2 z-20 flex hover:scale-110 transition">
                        <img src="{{ asset('assets/img/blog-slider-right.png') }}" alt="Next"
                            class="w-8 h-8 object-contain">
                    </button>
                </div>
            </div>
        </div>
    </section>

    <script>
        // Digital Stand Horizontal Scroll
        const dsSlider = document.getElementById('digital-stand-slider');
        const prevDS = document.getElementById('prevDigitalStand');
        const nextDS = document.getElementById('nextDigitalStand');

        const getDSSlideWidth = () => {
            const first = dsSlider.querySelector('.snap-start');
            return first ? first.offsetWidth + 16 : 300;
        };

        prevDS?.addEventListener('click', () => {
            dsSlider.scrollBy({
                left: -getDSSlideWidth(),
                behavior: 'smooth'
            });
        });

        nextDS?.addEventListener('click', () => {
            dsSlider.scrollBy({
                left: getDSSlideWidth(),
                behavior: 'smooth'
            });
        });

        const checkDSSlider = () => {
            if (dsSlider.scrollWidth > dsSlider.clientWidth) {
                prevDS?.classList.remove('hidden');
                nextDS?.classList.remove('hidden');
            } else {
                prevDS?.classList.add('hidden');
                nextDS?.classList.add('hidden');
            }
        };

        window.addEventListener('resize', checkDSSlider);
        window.addEventListener('load', checkDSSlider);
    </script>

    <br />

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
