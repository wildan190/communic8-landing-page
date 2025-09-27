@extends('layouts.web')

@section('content')
   <!-- Portfolio Section -->
<section class="relative pt-56 pb-20">
    <!-- Background image flipped -->
    <div class="absolute inset-0 top-0">
        <img src="{{ asset('assets/img/heroporto.png') }}" alt="Hero Background"
            class="w-full h-[70vh] md:h-[80vh] object-cover transform scale-x-[-1] opacity-30">
    </div>
    <div class="relative z-10 max-w-7xl mx-auto px-6">
        <!-- Title -->
        <div class="text-center mb-16">
            <h1 class="font-poppins text-2xl md:text-4xl lg:text-5xl tracking-[0.3em] text-gray-800">
                <span class="font-light">PARTNERED</span>
                <span class="font-bold">FOR THE BETTER</span>
            </h1>
            <p class="mt-6 text-gray-600 max-w-2xl mx-auto">
                Dive into our portfolio and see the energy we bring to every project.
            </p>
        </div>

        {{-- Grid Projects --}}
        <div class="grid grid-cols-6 gap-6" id="trusted-projects">
            @php
                // Ambil 2 project highlight untuk kotak besar
                $highlightedProjects = $projects->where('is_highlighted', true)->take(2)->values();

                // Ambil project lain untuk kotak kecil (total 3)
                $remainingProjects = $projects->whereNotIn('id', $highlightedProjects->pluck('id'))->take(3)->values();

                // Gabungkan 5 project awal
                $initialProjects = $highlightedProjects->concat($remainingProjects);

                // Sisanya hidden untuk Explore more / See less
                $moreProjects = $projects->whereNotIn('id', $initialProjects->pluck('id'));
            @endphp

            {{-- Tampilkan 5 project awal --}}
            @foreach ($initialProjects as $key => $project)
                @php
                    $colClass = $key < 2 ? 'col-span-6 md:col-span-3' : 'col-span-6 md:col-span-2';
                @endphp
                <div class="{{ $colClass }} border border-gray-200 rounded-2xl p-4 flex flex-col">
                    <div class="flex justify-between items-center mb-2">
                        <p class="text-xs text-gray-500">{{ $project->client ?? 'Unknown Client' }}</p>
                        @if ($project->project_url)
                            <a href="{{ $project->project_url }}" target="_blank" class="text-gray-400 hover:text-gray-600">
                                <img src="/assets/img/icon/iconlink.png" alt="External Link" class="w-5 h-5">
                            </a>
                        @endif
                    </div>
                    <h3 class="font-semibold text-gray-700 mb-3">{{ $project->name }}</h3>
                    <div class="rounded-xl overflow-hidden">
                        @if ($project->project_img)
                            <img src="{{ asset('storage/' . $project->project_img) }}" alt="{{ $project->name }}" class="w-full object-cover">
                        @else
                            <img src="{{ asset('assets/img/dummy/dummy1.png') }}" alt="No Image" class="w-full object-cover">
                        @endif
                    </div>
                </div>
            @endforeach

            {{-- Tampilkan project lebih (hidden awalnya) --}}
            @foreach ($moreProjects as $project)
                <div class="col-span-6 md:col-span-2 border border-gray-200 rounded-2xl p-4 flex flex-col hidden more-project">
                    <div class="flex justify-between items-center mb-2">
                        <p class="text-xs text-gray-500">{{ $project->client ?? 'Unknown Client' }}</p>
                        @if ($project->project_url)
                            <a href="{{ $project->project_url }}" target="_blank" class="text-gray-400 hover:text-gray-600">
                                <img src="/assets/img/icon/iconlink.png" alt="External Link" class="w-5 h-5">
                            </a>
                        @endif
                    </div>
                    <h3 class="font-semibold text-gray-700 mb-3">{{ $project->name }}</h3>
                    <div class="rounded-xl overflow-hidden">
                        @if ($project->project_img)
                            <img src="{{ asset('storage/' . $project->project_img) }}" alt="{{ $project->name }}" class="w-full object-cover">
                        @else
                            <img src="{{ asset('assets/img/dummy/dummy1.png') }}" alt="No Image" class="w-full object-cover">
                        @endif
                    </div>
                </div>
            @endforeach
        </div>

        {{-- Button --}}
        <div class="flex justify-center mt-12">
            <button id="toggle-projects"
                class="bg-gray-800 text-white px-6 py-3 rounded-full hover:bg-gray-700 transition-colors">
                Explore more
            </button>
        </div>
    </div>

    <script>
        // Toggle Projects
        const toggleBtn = document.getElementById("toggle-projects");
        const moreProjects = document.querySelectorAll(".more-project");
        let expanded = false;

        toggleBtn.addEventListener("click", () => {
            expanded = !expanded;
            moreProjects.forEach(el => el.classList.toggle("hidden"));
            toggleBtn.textContent = expanded ? "See less" : "Explore more";
        });
    </script>
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
                    I N S I G H T S &nbsp; F O R
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
                            <a href="{{ route('blogs.show', $blog->slug) }}" class="block flex-grow">
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
                            <a href="{{ route('blogs.show', $blog->slug) }}" class="block flex-grow">
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
