@extends('layouts.web')

@section('content')
    {{-- Hero Section --}}
    <section class="relative w-full h-[80vh] flex items-end bg-cover bg-center"
        style="background-image: url('{{ asset('assets/img/archihero.png') }}')">
        <div class="container mx-auto px-6 md:px-12 lg:px-32 pb-20">
            <div class="max-w-xl text-left">
                <h1 class="text-2xl md:text-2xl font-light tracking-[0.5em] text-black font-poppins leading-snug">
                    D I G I T A L<br />A R C H I T E C T U R E
                </h1>
                <h2 class="mt-6 text-lg md:text-xl font-bold font-rubik text-black">
                    Expertly Developed, Flawlessly Delivered
                </h2>
                <p class="mt-4 text-sm md:text-base text-gray-800 font-rubik leading-relaxed">
                    Step into a realm of flawless digital experiences. Communic 8 brings creativity and code together to
                    develop engaging websites, intuitive applications, and powerful platforms designed not just to meet your
                    needs, but to enchant your users.
                </p>
            </div>
        </div>
    </section>
    {{-- Gallery Section / Head Image --}}
    @if ($digitalArchitectureContent)
        <section class="w-full">
            <div class="container mx-auto px-6 md:px-12 py-16 text-center">
                <p class="text-base md:text-base font-rubik text-gray-800 max-w-3xl mx-auto text-center">
                    {{ $digitalArchitectureContent->head_paragraph_1 ??
                        'Digital Development is more than writing codes. It’s about constructing robust digital solutions that serve your business objective and power your digital transformation.' }}
                    <br /><br />
                </p>
                <p class="text-base md:text-base font-rubik text-gray-800 max-w-3xl mx-auto text-center">
                    {{ $digitalArchitectureContent->head_paragraph_2 ??
                        'With collaborative and forward-thinking approach, every development is build with strategic intent.' }}
                </p>
            </div>

            <img src="{{ $digitalArchitectureContent->head_img
                ? Storage::url($digitalArchitectureContent->head_img)
                : asset('assets/img/gallery1.png') }}"
                alt="Gallery" class="w-full h-auto object-cover">

            <div class="container mx-auto px-6 md:px-12 py-16 text-center">
                <p class="text-base md:text-base font-rubik text-gray-800 max-w-3xl mx-auto text-center">
                    {{ $digitalArchitectureContent->head_paragraph_3 ??
                        'Digital Development is more than writing codes. It’s about constructing robust digital solutions that serve your business objective and power your digital transformation.' }}
                    <br /><br />
                </p>
                <p class="text-base md:text-base font-rubik text-gray-800 max-w-3xl mx-auto text-center">
                    {{ $digitalArchitectureContent->head_paragraph_4 ??
                        'With collaborative and forward-thinking approach, every development is build with strategic intent.' }}
                </p>
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
                    alt="Digital Architecture" class="rounded-xl w-full object-cover shadow-lg">
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
                    <div class="text-center p-1">
                        <div class="rounded-[28px] overflow-hidden w-full">
                            <img src="{{ $subservice->picture_upload ? Storage::url($subservice->picture_upload) : asset('assets/img/dummy/dummy1.png') }}"
                                alt="{{ $subservice->name }}" class="w-full h-full object-cover">
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
