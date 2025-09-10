@extends('layouts.web')

@section('content')
    <!-- Hero Background -->
    <div class="relative h-72 md:h-96 bg-cover bg-center"
        style="background-image: url('{{ asset('assets/img/insightbg.png') }}')">
    </div>

    <!-- Blog Detail -->
    <div class="max-w-4xl mx-auto px-6 -mt-20 relative z-20">
        <div class="bg-white border rounded-2xl overflow-hidden">

            <!-- Featured Headline Image -->
            <div class="w-full">
                <img src="{{ $blog->headline_img ? asset('storage/' . $blog->headline_img) : asset('assets/img/blog1.png') }}"
                    alt="{{ $blog->title }}" class="w-full object-cover">
            </div>

            <!-- Content Wrapper -->
            <div class="p-8 md:p-12">
                <!-- Category -->
                <p class="text-sm text-gray-500 mb-3 text-center">
                    {{ $blog->category }}
                </p>

                <!-- Title -->
                <h1 class="text-2xl md:text-3xl font-bold text-gray-800 text-center mb-8">
                    {{ $blog->title }}
                </h1>

                <!-- Konten Quill -->
                <div class="prose prose-lg max-w-none text-gray-700 leading-relaxed ql-snow">
                    {!! $blog->content !!}
                </div>
            </div>
        </div>
    </div>

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
                            <img src="{{ asset('assets/img/blog1.png') }}"
                                 alt="Default Image"
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
    

    {{-- Quill CSS --}}
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <style>
        /* Pastikan heading Quill mengikuti typography Tailwind */
        .prose h1 {
            @apply text-3xl md:text-4xl font-bold mt-6 mb-4;
        }

        .prose h2 {
            @apply text-2xl md:text-3xl font-semibold mt-5 mb-3;
        }

        .prose h3 {
            @apply text-xl md:text-2xl font-semibold mt-4 mb-2;
        }

        .prose h4 {
            @apply text-lg font-semibold mt-3 mb-2;
        }

        .prose h5 {
            @apply text-base font-semibold mt-2 mb-1;
        }

        .prose h6 {
            @apply text-sm font-semibold uppercase tracking-wide mt-2 mb-1 text-gray-500;
        }

        /* Pastikan list dari Quill juga ikut */
        .prose ul {
            @apply list-disc pl-6;
        }

        .prose ol {
            @apply list-decimal pl-6;
        }

        .prose li {
            @apply mb-1;
        }

        /* Inline formatting */
        .prose u {
            @apply underline;
        }

        .prose i {
            @apply italic;
        }
    </style>
@endsection
