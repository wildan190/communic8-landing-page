@extends('layouts.web')

@section('content')
{{-- Hero Section --}}
<section class="relative w-full h-[80vh] flex items-end bg-cover bg-center"
    style="background-image: url('{{ asset('assets/img/archihero.png') }}')">
    <div class="container mx-auto px-6 md:px-12 lg:px-32 pb-20">
        <div class="max-w-xl text-left">
            <h1 class="text-2xl md:text-2xl font-light tracking-[0.5em] text-black font-poppins leading-snug">
                P U B L I C <br /> S P A C E &nbsp; M E D I A
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
        <div class="max-w-4xl mx-auto text-gray-800 font-rubik leading-relaxed space-y-6 text-center">
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

{{-- Gallery Section / Head Image --}}
@if ($digitalArchitectureContent)
    <section class="w-full py-12 bg-gray-50">
        <div class="container mx-auto px-6 md:px-12 flex justify-center">
            {{-- ✅ gambar tidak full --}}
            <div class="max-w-4xl w-full rounded-2xl overflow-hidden shadow-lg">
                <img src="{{ $digitalArchitectureContent->head_img
                    ? Storage::url($digitalArchitectureContent->head_img)
                    : asset('assets/img/gallery1.png') }}"
                    alt="Gallery" class="w-full h-auto object-cover">
            </div>
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
                alt="Public Space Media" class="rounded-xl w-full object-cover shadow-lg">
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


{{-- Section 2: Digital Architecture --}}
<section class="w-full py-20 bg-white">
    <div class="max-w-6xl mx-auto px-4 text-center">

        {{-- Grid dynamic --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mt-6">
            @forelse($digitalArchitectureSubservices as $subservice)
                <div class="text-center p-1 relative group">
                    <div class="rounded-[28px] overflow-hidden w-full relative">

                        {{-- ✅ Gambar tetap original ukuran tetap, hanya diberi efek zoom halus saat hover --}}
                        <img src="{{ $subservice->picture_upload ? Storage::url($subservice->picture_upload) : asset('assets/img/dummy/dummy1.png') }}"
                            alt="{{ $subservice->name }}"
                            class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">

                        {{-- ✨ Overlay detail muncul saat hover --}}
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

                    {{-- Nama tetap tampil di bawah gambar --}}
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
            <div class="mb-12 md:mb-0">
                <h2 class="text-4xl md:text-6xl leading-relaxed tracking-[0.5em]">
                    <span class="font-thin block">DREAM</span>
                    <span class="font-bold block">BOLDER</span>
                    <span class="font-thin block">ACHIEVE</span>
                    <span class="font-bold block">BIGGER</span>
                </h2>
            </div>

            {{-- Right Content --}}
            <div class="max-w-lg">
                <h3 class="text-2xl md:text-3xl font-semibold mb-4">Let’s ignite your growth!</h3>
                <p class="text-base md:text-lg mb-6 leading-relaxed">
                    Partner with Communic8's 20 years of creative strategic expertise.
                    We're dedicated to understanding your unique goals and crafting innovative digital solutions
                    that deliver exceptional results across Southeast Asia.
                </p>
                <a href="#"
                    class="inline-block bg-white text-gray-900 px-6 py-3 rounded-full font-medium hover:bg-gray-200 transition">
                    Begin Your Ascent
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
