@extends('layouts.web')

@section('content')
{{-- Hero Section --}}
<section class="relative w-full h-[80vh] flex items-end bg-cover bg-center"
    style="background-image: url('{{ asset('assets/img/digicompass.png') }}')">
    <div class="container mx-auto px-6 md:px-12 lg:px-32 pb-20">
        <div class="max-w-xl text-left">
            <h1 class="text-4xl md:text-4xl font-light tracking-[0.5em] text-black font-poppins leading-snug">
                D I G I T A L <br> S T A N D
            </h1>
            <h2 class="mt-6 text-lg md:text-xl font-bold font-rubik text-black">
                Precision. Performance. Growth.
            </h2>
        </div>
    </div>
</section>

{{-- Explanation Section --}}
<section class="w-full bg-white py-16">
    <div class="container mx-auto px-6 md:px-12 lg:px-32">
        <div class="max-w-4xl mx-auto text-gray-800 font-rubik leading-relaxed space-y-6 text-center">
            <p>
                In the digital era, visibility alone is not enough — brands need precision, performance, and adaptability. That’s where Communic 8 comes in. Our digital marketing solutions are designed to not only put your brand in front of the right audiences, but also to ensure every interaction delivers measurable value.
            </p>

            <p class="font-semibold text-lg mt-4">We provide a full suite of services, including:</p>
            <ul class="list-disc list-inside text-left mx-auto max-w-lg space-y-2">
                <li>Website & Landing Page Optimization – turning visits into conversions.</li>
                <li>Ads Performance Optimization (PPC & Paid Social) – maximizing every ad dollar.</li>
                <li>Content & SEO Optimization – making your brand discoverable and relevant.</li>
                <li>Automation & Tooling – ensuring efficiency and scalability.</li>
                <li>Social Media Optimization & Retargeting – engaging the right audience at the right time.</li>
                <li>Campaign Real-Time Monitoring & Adjustment – keeping strategies agile and performance-driven.</li>
            </ul>

            <p>
                The goal is clear: to help brands achieve sustainable growth through data-driven, ROI-focused digital strategies. For us, the best digital marketing is not about doing more, but about doing what works — combining creative storytelling, smart targeting, and continuous optimization to deliver impact that lasts.
            </p>

            <p>
                With Communic 8, digital marketing isn’t just about reach — it’s about results that matter.
            </p>
        </div>
    </div>
</section>

{{-- Gallery Section --}}
<section class="w-full py-12 bg-gray-50">
    <div class="container mx-auto px-6 md:px-12 flex justify-center">
        <div class="max-w-4xl w-full rounded-2xl overflow-hidden shadow-lg">
            @if ($digitalCompassContent && $digitalCompassContent->head_img)
                <img src="{{ Storage::url($digitalCompassContent->head_img) }}" alt="Gallery"
                    class="w-full h-auto object-cover">
            @else
                <img src="{{ asset('assets/img/gallery1.png') }}" alt="Gallery"
                    class="w-full h-auto object-cover">
            @endif
        </div>
    </div>
</section>

    {{-- Section 1 --}}
    <section class="w-full py-20 bg-white">
        <div class="max-w-7xl mx-auto px-20 grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">

            {{-- ✅ Left Image dinamis --}}
            <div>
                @if ($digitalCompassContent && $digitalCompassContent->img_services)
                    <img src="{{ Storage::url($digitalCompassContent->img_services) }}" alt="Digital Compass"
                        class="rounded-xl w-full object-cover">
                @else
                    <img src="{{ asset('assets/img/dummy/dummy2.png') }}" alt="Digital Compass"
                        class="rounded-xl w-full object-cover">
                @endif
            </div>

            {{-- ✅ Right Text (title dan value dari DB) --}}
            <div class="space-y-6 font-rubik">
                @for ($i = 1; $i <= 4; $i++)
                    @php
                        $title = $digitalCompassContent->{'title' . $i} ?? null;
                        $value = $digitalCompassContent->{'value_title' . $i} ?? null;
                    @endphp

                    <div>
                        <h3 class="text-lg font-semibold text-gray-900">
                            {{ $title ??
                                match ($i) {
                                    1 => 'REACH',
                                    2 => 'ACT',
                                    3 => 'CONVERT',
                                    4 => 'ENGAGE',
                                } }}
                        </h3>
                        <p class="text-gray-600 text-base leading-relaxed">
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

{{-- Section 2: Digital Compass --}}
<section class="w-full py-8 bg-white">
    <div class="max-w-6xl mx-auto px-4 text-center">

        {{-- Grid dynamic --}}
        <div class="mt-6 grid grid-cols-2 md:grid-cols-3 gap-6">
            @forelse($digitalCompassSubservices as $subservice)
                <div class="text-center p-1 relative group">
                    <div class="rounded-[28px] overflow-hidden w-full relative">
                        
                        {{-- Gambar asli, ukuran tetap --}}
                        <img src="{{ $subservice->picture_upload ? Storage::url($subservice->picture_upload) : asset('assets/img/dummy/dummy1.png') }}"
                            alt="{{ $subservice->name }}" class="w-full h-full object-cover block">

                        {{-- Overlay detail saat hover --}}
                        <div class="absolute inset-0 bg-black bg-opacity-70 opacity-0 group-hover:opacity-100 transition-opacity duration-500 flex flex-col justify-center items-center text-white px-4 text-center">
                            <h3 class="text-sm md:text-base font-semibold mb-2">{{ $subservice->name }}</h3>
                            @if ($subservice->description)
                                <p class="text-xs md:text-sm leading-snug">{{ Str::limit($subservice->description, 120) }}</p>
                            @else
                                <p class="text-xs md:text-sm italic opacity-80">No additional details available.</p>
                            @endif
                        </div>
                    </div>

                    {{-- Nama tetap muncul di bawah gambar --}}
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
        <div class="max-w-7xl mx-auto px-4 sm:px-6">

            <!-- Section Title -->
            <div class="text-center mb-12 sm:mb-16">
                <h2
                    class="font-poppins text-xl sm:text-3xl md:text-4xl font-normal 
               text-[#666666] tracking-normal sm:tracking-[0.35em] leading-snug mb-4 sm:mb-6">
                    I N S I G H T S &nbsp; F O R &nbsp;
                    <span class="hidden sm:inline"><br /></span>
                    S T R A T E G I C &nbsp; M I N D
                </h2>
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
