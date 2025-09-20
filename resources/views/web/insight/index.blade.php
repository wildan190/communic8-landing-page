<!-- resources/views/insight.blade.php -->
@extends('layouts.web')

@section('content')
    <!-- Hero Section -->
    <section class="relative pt-48 pb-20 bg-cover bg-center"
        style="background-image: url('{{ asset('assets/img/insightbg.png') }}');">

        <!-- Overlay supaya background lebih soft -->
        <div class="absolute inset-0 bg-white/70"></div>

        <!-- Overlay supaya background lebih soft -->
        <div class="absolute inset-0 bg-white/70"></div>

        <!-- Content -->
        <div class="relative z-10 max-w-5xl mx-auto px-6 text-center">
            <h1 class="font-poppins text-4xl md:text-5xl tracking-[0.3em] text-gray-800">
                <span class="font-light">FUEL YOUR </span>
                <span class="font-bold">CURIOSITY</span>
            </h1>
            <p class="mt-6 text-gray-600">
                Find emerging trends, and fresh perspectives to keep you ahead.
            </p>

            <!-- Categories -->
            <div class="flex flex-wrap justify-center gap-4 mt-10">
                <a href="{{ route('insight.index') }}"
                    class="px-6 py-2 border border-gray-400 rounded-full 
                  {{ !$category ? 'bg-gray-800 text-white' : 'text-gray-700 hover:bg-gray-100' }}
                  transition">
                    All categories
                </a>

                @foreach ($categories as $cat)
                    <a href="{{ route('insight.index', ['category' => $cat]) }}"
                        class="px-6 py-2 border border-gray-400 rounded-full 
                      {{ $category === $cat ? 'bg-gray-800 text-white' : 'text-gray-700 hover:bg-gray-100' }}
                      transition">
                        {{ $cat }}
                    </a>
                @endforeach
            </div>
        </div>

    </section>

    <!-- Masonry Grid Section -->
    <section class="py-20 bg-white relative z-10">
        <div class="max-w-7xl mx-auto px-6">

            <!-- Masonry Layout -->
            <div class="columns-1 md:columns-3 gap-6 space-y-6">

                @foreach ($blogs as $blog)
                    <div class="break-inside-avoid bg-white rounded-2xl shadow-sm p-5 border border-gray-200 space-y-4">
                        <p class="text-sm text-gray-500">{{ $blog->category }}</p>
                        <a href="{{ route('insight.show', $blog->slug) }}">
                            <h3 class="text-lg font-medium text-gray-800 hover:text-gray-600 transition">
                                {{ $blog->title }}
                            </h3>
                        </a>
                        @if ($blog->headline_img)
                            <img src="{{ asset('storage/' . $blog->headline_img) }}"
                                alt="{{ $blog->headline_img_alt ?? $blog->title }}" class="w-full rounded-xl object-cover">
                        @else
                            <img src="{{ asset('assets/img/blog1.png') }}" alt="Default Image"
                                class="w-full rounded-xl object-cover">
                        @endif
                    </div>
                @endforeach

            </div>

            <!-- Read More Button -->
            <div class="text-center mt-12">
                {{ $blogs->links() }}
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
        <div class="max-w-7xl mx-auto px-6">

            <!-- Section Title -->
            <div class="text-center mb-16">
                <h2 class="text-2xl sm:text-3xl md:text-4xl tracking-[0.3em] text-gray-700 mb-6">
                    I N S I G H T S &nbsp; F O R <br /> S T A T E G I C &nbsp; M I N D
                </h2>
            </div>

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
                            <a href="{{ route('insight.show', $blog->slug) }}" class="block flex-grow">
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
