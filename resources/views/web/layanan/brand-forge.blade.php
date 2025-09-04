@extends('layouts.web')

@section('content')
    {{-- Hero Section --}}
    <section class="relative w-full h-[80vh] flex items-end bg-cover bg-center"
        style="background-image: url('{{ asset('assets/img/forge-hero.png') }}')">
        <div class="container mx-auto px-6 md:px-12 lg:px-32 pb-20">
            <div class="max-w-xl text-left">
                <h1 class="text-4xl md:text-5xl font-light tracking-[0.5em] text-black font-poppins leading-snug">
                    B R A N D <br> F O R G E
                </h1>
                <h2 class="mt-6 text-lg md:text-xl font-bold font-rubik text-black">
                    Forge Your Brand’s Identity and Destiny
                </h2>
                <p class="mt-4 text-sm md:text-base text-gray-800 font-rubik leading-relaxed">
                    We go beyond aesthetics to build and align your brand’s core quality, value, and trust.
                    Our comprehensive approach ensures a powerful consistent presence that resonates with your audience in
                    Asia.
                </p>
            </div>
        </div>
    </section>

    {{-- Gallery Section --}}
    <section class="w-full">
        <img src="{{ asset('assets/img/gallery1.png') }}" alt="Gallery" class="w-full h-auto object-cover">
    </section>

    {{-- Strategy Section --}}
    <section class="w-full py-24">
        <div class="max-w-7xl mx-auto px-20 space-y-24">
            {{-- 👆 Samain px-20 atau sesuai padding navbar kamu --}}

            {{-- Row 1 --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                <div class="text-left">
                    <h2 class="text-2xl md:text-3xl font-light font-poppins tracking-[0.5em] uppercase">
                        Insight-Driven<br>Strategy
                    </h2>
                    <p class="mt-6 text-gray-700 font-rubik leading-relaxed text-sm md:text-base">
                        Every powerful brand is built on a foundation of deep understanding.
                        Our process begins with comprehensive analysis, where we dive into your market, competitive
                        landscape, and audience behavior.
                        This strategic thinking ensures your brand’s positioning is not only unique but also precisely
                        aligned with your business objectives for maximum effectiveness.
                    </p>
                </div>
                <div class="flex justify-center">
                    <img src="{{ asset('assets/img/dummy/dummy1.png') }}" alt="Insight Driven Strategy"
                        class="rounded-xl w-full max-w-md object-cover">
                </div>
            </div>

            {{-- Row 2 --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                <div class="order-2 md:order-1 flex justify-center">
                    <img src="{{ asset('assets/img/dummy/dummy2.png') }}" alt="Bold Creative Ideas"
                        class="rounded-xl w-full max-w-md object-cover">
                </div>
                <div class="order-1 md:order-2 text-left">
                    <h2 class="text-2xl md:text-3xl font-light font-poppins tracking-[0.5em] uppercase">
                        Bold Creative<br>Ideas
                    </h2>
                    <p class="mt-6 text-gray-700 font-rubik leading-relaxed text-sm md:text-base">
                        Strategy provides the direction, creativity makes the journey unforgettable.
                        We translate strategic insights into bold ideas and out-of-the-box concepts with creative and
                        different thinking.
                        This is where we craft the unique personality and compelling narrative that gives your brand a
                        distinctive voice.
                    </p>
                </div>
            </div>

            {{-- Row 3 --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                <div class="text-left">
                    <h2 class="text-2xl md:text-3xl font-light font-poppins tracking-[0.5em] uppercase">
                        Impactful<br>Visual Identity
                    </h2>
                    <p class="mt-6 text-gray-700 font-rubik leading-relaxed text-sm md:text-base">
                        We bring your brand’s story to life through strong visuals that command attention and ensure
                        consistency.
                        From a striking logo and color palette to a complete “Corporate Brand Guideline”, our design
                        expertise ensures your visual identity is not only beautiful but also cohesive and impactful across
                        every single touchpoint.
                    </p>
                </div>
                <div class="flex justify-center">
                    <img src="{{ asset('assets/img/dummy/dummy3.png') }}" alt="Impactful Visual Identity"
                        class="rounded-xl w-full max-w-md object-cover">
                </div>
            </div>

        </div>
    </section>

    {{-- Services Grid Section --}}
    <section class="w-full py-20 bg-white">
        <div class="max-w-7xl mx-auto px-20 text-center">

            {{-- Top description --}}
            <p class="text-gray-700 font-rubik text-base leading-relaxed max-w-3xl mx-auto">
                Communic 8's Brand Development service shapes every facet of your identity from
                foundational research to brand design and activation.
            </p>
            <p class="mt-4 font-rubik font-semibold text-gray-900">
                Let us help you build a resilient brand that will stand through the test of time.
            </p>

            {{-- Grid 6 --}}
            <div class="mt-16 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-12">

                {{-- Item 1 --}}
                <div class="flex flex-col items-center">
                    <img src="{{ asset('assets/img/dummy/dummy1.png') }}" alt="Brand Platform"
                        class="rounded-xl w-full max-w-[250px] object-cover">
                    <p class="mt-4 text-gray-700 font-rubik">Brand Platform</p>
                </div>

                {{-- Item 2 --}}
                <div class="flex flex-col items-center">
                    <img src="{{ asset('assets/img/dummy/dummy2.png') }}" alt="Brand Identity"
                        class="rounded-xl w-full max-w-[250px] object-cover">
                    <p class="mt-4 text-gray-700 font-rubik">Brand Identity</p>
                </div>

                {{-- Item 3 --}}
                <div class="flex flex-col items-center">
                    <img src="{{ asset('assets/img/dummy/dummy3.png') }}" alt="Brand System"
                        class="rounded-xl w-full max-w-[250px] object-cover">
                    <p class="mt-4 text-gray-700 font-rubik">Brand System</p>
                </div>

                {{-- Item 4 --}}
                <div class="flex flex-col items-center">
                    <img src="{{ asset('assets/img/dummy/dummy1.png') }}" alt="Brand Activation"
                        class="rounded-xl w-full max-w-[250px] object-cover">
                    <p class="mt-4 text-gray-700 font-rubik">Brand Activation</p>
                </div>

                {{-- Item 5 --}}
                <div class="flex flex-col items-center">
                    <img src="{{ asset('assets/img/dummy/dummy2.png') }}" alt="Creative Design"
                        class="rounded-xl w-full max-w-[250px] object-cover">
                    <p class="mt-4 text-gray-700 font-rubik">Creative Design</p>
                </div>

                {{-- Item 6 --}}
                <div class="flex flex-col items-center">
                    <img src="{{ asset('assets/img/dummy/dummy3.png') }}" alt="Corporate Brand Guideline"
                        class="rounded-xl w-full max-w-[250px] object-cover">
                    <p class="mt-4 text-gray-700 font-rubik">Corporate Brand Guideline</p>
                </div>

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
