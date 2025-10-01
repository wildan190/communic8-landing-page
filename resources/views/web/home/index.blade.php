@extends('layouts.web')

@section('content')
    <section class="relative w-full min-h-[85vh] bg-cover bg-center"
        style="background-image: url('{{ asset('assets/img/sectionhero.png') }}')">

        <div
            class="container max-w-7xl mx-auto px-4 sm:px-6 flex flex-col items-center justify-between min-h-[85vh] py-20 md:py-24 space-y-8">

            {{-- Hero Title --}}
            <div class="relative z-10 pt-20 text-center">
                <h1
                    class="font-poppins font-bold text-lg sm:text-2xl md:text-3xl 
       text-[#000000] tracking-normal sm:tracking-[0.3em] leading-snug mb-3 sm:mb-5">
                    {!! __('home/hero.title_line1') !!}
                </h1>
                <h1
                    class="font-poppins font-bold text-lg sm:text-2xl md:text-3xl 
       text-[#000000] tracking-normal sm:tracking-[0.3em] leading-snug">
                    {!! __('home/hero.title_line2') !!}
                </h1>
            </div>

            {{-- Lampu --}}
            <div class="flex justify-center relative mt-8">
                <img src="{{ asset('assets/img/lamp.png') }}" alt="Lamp"
                    class="w-auto h-auto max-w-[180px] sm:max-w-[200px] md:max-w-[240px] lg:max-w-[260px] relative z-10"
                    onmouseover="this.src='{{ asset('assets/img/lamphover.png') }}'"
                    onmouseout="this.src='{{ asset('assets/img/lamp.png') }}'">
            </div>

            {{-- Bottom Row --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-10 w-full items-start text-center md:text-left mt-6">
                {{-- Left Content --}}
                <div class="space-y-6">
                    <p class="text-gray-600 text-base sm:text-lg leading-relaxed max-w-md mx-auto md:mx-0">
                        {{ __('home/hero.description') }}
                    </p>
                    <button class="bg-gray-800 text-white px-6 py-3 rounded-full hover:bg-gray-700">
                        {{ __('home/hero.button') }}
                    </button>
                </div>
            </div>
        </div>
    </section>

    {{-- Section Quotes --}}
    <section class="relative w-full bg-cover bg-center"
        style="background-image: url('{{ asset('assets/img/quotes.png') }}')">
        <div
            class="w-full h-full bg-black bg-opacity-40 flex items-center justify-center text-center py-20 sm:py-24 md:py-32">
            <div class="text-white px-4 sm:px-6">
                <h2
                    class="text-xl sm:text-2xl md:text-3xl lg:text-4xl font-light tracking-[0.2em] sm:tracking-[0.3em] uppercase leading-tight">
                    Creativity is intelligence<br>having fun
                </h2>
                <p class="mt-3 sm:mt-4 text-xs sm:text-sm md:text-base italic">Albert Einstein</p>
            </div>
        </div>
    </section>

    {{-- Wrapper halaman --}}
    <div class="relative">

        {{-- Section At a Glance --}}
        <section class="relative bg-gray-100 pt-8 sm:pt-12 md:pt-16 pb-12 sm:pb-14 md:pb-16 z-10">
            <div class="container max-w-7xl mx-auto px-4 sm:px-6 md:px-12 relative">

                {{-- Mobile Layout --}}
                <div class="md:hidden">
                    {{-- Text Content First on Mobile --}}
                    <div class="text-center mb-8">
                        <h2
                            class="text-xl sm:text-2xl text-gray-700 mb-4 sm:mb-6 leading-tight px-2
                           {{ app()->getLocale() == 'en' ? 'tracking-[0.2em] sm:tracking-[0.3em]' : 'tracking-normal' }}">
                            {!! __('home/glance.title') !!}
                        </h2>
                        <p class="text-gray-600 leading-relaxed text-sm sm:text-base px-2">
                            {{ __('home/glance.paragraph1') }}
                        </p>
                        <p class="mt-3 sm:mt-4 text-gray-600 leading-relaxed text-sm sm:text-base px-2">
                            {{ __('home/glance.paragraph2') }}
                        </p>
                    </div>

                    {{-- Images Stack for Mobile --}}
                    <div class="flex justify-center space-x-2 sm:space-x-4">
                        <img src="{{ asset('assets/img/imgstack1.png') }}" alt="Stack 1"
                            class="w-36 sm:w-44 h-40 sm:h-48 object-cover rounded-lg shadow-lg 
                    grayscale hover:grayscale-0 hover:saturate-150 transition duration-500">

                        <img src="{{ asset('assets/img/imgstack2.png') }}" alt="Stack 2"
                            class="w-36 sm:w-44 h-40 sm:h-48 object-cover rounded-lg shadow-lg mt-4 sm:mt-6
                    grayscale hover:grayscale-0 hover:saturate-150 transition duration-500">
                    </div>
                </div>

                {{-- Desktop Layout --}}
                <div class="hidden md:grid grid-cols-2 gap-12 items-start">
                    {{-- Floating Images --}}
                    <div class="relative w-full h-full">
                        <img src="{{ asset('assets/img/imgstack1.png') }}" alt="Stack 1"
                            class="absolute -top-32 left-0 w-64 sm:w-72 md:w-80 rounded-lg shadow-lg z-30 
                    grayscale hover:grayscale-0 hover:saturate-150 transition duration-500 pointer-events-auto">

                        <img src="{{ asset('assets/img/imgstack2.png') }}" alt="Stack 2"
                            class="absolute top-20 left-12 w-64 sm:w-72 md:w-80 rounded-lg shadow-lg z-20 
                    grayscale hover:grayscale-0 hover:saturate-150 transition duration-500 pointer-events-auto">
                    </div>

                    {{-- Text --}}
                    <div class="text-left flex flex-col justify-center">
                        <h2
                            class="text-2xl sm:text-3xl md:text-4xl text-gray-700 mb-6 leading-tight
                           {{ app()->getLocale() == 'en' ? 'tracking-[0.3em]' : 'tracking-normal' }}">
                            {!! __('home/glance.title') !!}
                        </h2>
                        <p class="text-gray-600 leading-relaxed break-words">
                            {{ __('home/glance.paragraph1') }}
                        </p>
                        <p class="mt-4 text-gray-600 leading-relaxed break-words">
                            {{ __('home/glance.paragraph2') }}
                        </p>
                    </div>
                </div>

            </div>
        </section>

    </div>

    {{-- Section Values / Achievements --}}
    <section class="bg-gray-200 py-24 font-rubik">
        <div class="container mx-auto px-4 sm:px-6 md:px-12">

            <br /><br />

            {{-- Title --}}
            <div class="text-center mb-16">
                <h2 class="text-xl sm:text-2xl md:text-3xl font-semibold text-gray-700 leading-relaxed">
                    {!! __('home/values.title') !!}
                </h2>
            </div>

            {{-- Stats Row --}}
            <div class="flex flex-col md:flex-row justify-center items-center text-center gap-12 md:gap-20 mb-16">

                {{-- Item 1 --}}
                <div class="flex flex-col items-center gap-4">
                    <div
                        class="bg-red-600 text-white w-20 h-20 flex items-center justify-center rounded-[16px] text-3xl">
                        <i class="fas fa-briefcase"></i>
                    </div>
                    <div>
                        <div class="text-3xl font-bold text-orange-500">{{ now()->year - 2005 }}+</div>
                        <div class="text-gray-700 font-semibold text-sm">{{ __('home/values.years_experience') }}</div>
                    </div>
                </div>

                {{-- Item 2 --}}
                <div class="flex flex-col items-center text-center gap-4">
                    <div
                        class="bg-red-600 text-white w-20 h-20 flex items-center justify-center rounded-[16px] text-3xl">
                        <i class="fas fa-layer-group"></i>
                    </div>
                    <div>
                        <div class="text-3xl font-bold text-orange-500">300+</div>
                        <div class="text-gray-700 font-semibold text-sm">{{ __('home/values.brands_handled') }}</div>
                    </div>
                </div>

                {{-- Item 3 --}}
                <div class="flex flex-col items-center text-center gap-4">
                    <div
                        class="bg-red-600 text-white w-20 h-20 flex items-center justify-center rounded-[16px] text-3xl">
                        <i class="fas fa-handshake"></i>
                    </div>
                    <div>
                        <div class="text-3xl font-bold text-orange-500">8/10</div>
                        <div class="text-gray-700 font-semibold text-sm">{{ __('home/values.clients_return') }}</div>
                    </div>
                </div>

            </div>

            {{-- Bottom Text --}}
            <div class="text-center max-w-3xl mx-auto text-gray-600 text-sm leading-relaxed">
                {{ __('home/values.bottom_text') }}
            </div>

        </div>
    </section>

    {{-- Section WHAT WE CAN DO FOR YOU --}}
    <section class="relative bg-white pt-16 sm:pt-20 md:pt-32 pb-16 sm:pb-20 md:pb-24">
        <div class="container max-w-7xl mx-auto px-4 sm:px-6 md:px-12">

            {{-- Title Section --}}
            <div class="text-center mb-16">
                <h2
                    class="text-2xl sm:text-3xl md:text-4xl text-gray-700 mb-6
                          {{ app()->getLocale() == 'en' ? 'tracking-[0.3em]' : 'tracking-normal' }}
                          leading-tight">
                    {!! __('home/what_we_do.title') !!}
                </h2>
            </div>

            @php
                $cards = __('home/what_we_do.cards');
                $routes = [
                    'layanan.brand-forge',
                    'layanan.digital-compass',
                    'layanan.digital-architecture',
                    'layanan.public-presence',
                ];
            @endphp

            {{-- Mobile: Single Column Stack --}}
            <div class="md:hidden space-y-6">
                @foreach ($cards as $card)
                    <div class="bg-white border border-gray-300 rounded-[16px] flex flex-col mx-auto max-w-sm p-4">
                        <img src="{{ asset('assets/img/' . $card['img']) }}" alt="{{ $card['title'] }}"
                            class="w-full h-48 sm:h-60 object-cover rounded-[12px] mb-4 filter grayscale hover:grayscale-0 transition duration-500">

                        <div class="flex flex-col items-center text-center w-full flex-1 pb-4">
                            <h3
                                class="font-bold text-gray-700 mb-3 break-words px-1
                               {{ app()->getLocale() == 'en' ? 'text-lg sm:text-xl' : 'text-base sm:text-lg' }}">
                                {{ $card['title'] }}
                            </h3>
                            <p
                                class="text-gray-600 leading-relaxed px-1 mb-6 flex-1 break-words hyphens-auto
                              {{ app()->getLocale() == 'en' ? 'text-sm' : 'text-xs sm:text-sm' }}">
                                {{ $card['desc'] }}
                            </p>

                            {{-- Button dengan route dinamis --}}
                            <a href="{{ route($routes[$loop->index]) }}"
                                class="bg-gray-800 text-white px-5 py-2 text-sm rounded-full hover:bg-gray-700 transition-colors inline-block text-center whitespace-nowrap">
                                {{ $card['btn'] }}
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Desktop: 2x2 Grid Layout --}}
            <div class="hidden md:block">
                @php
                    $rows = array_chunk($cards, 2);
                @endphp

                @foreach ($rows as $row)
                    <div class="flex flex-wrap justify-center gap-6 mb-6">
                        @foreach ($row as $card)
                            <div
                                class="bg-white border border-gray-300 rounded-[16px] flex flex-col w-72 p-4 min-h-[520px]">
                                <img src="{{ asset('assets/img/' . $card['img']) }}" alt="{{ $card['title'] }}"
                                    class="w-full h-60 object-cover rounded-[12px] mb-4 filter grayscale hover:grayscale-0 transition duration-500">

                                <div class="flex flex-col items-center text-center w-full flex-1">
                                    <h3 class="text-xl font-bold text-gray-700 mb-3">{{ $card['title'] }}</h3>
                                    <p class="text-gray-600 text-sm mb-4 flex-1">{{ $card['desc'] }}</p>

                                    {{-- Button dengan route dinamis (desktop) --}}
                                    <a href="{{ route($routes[$loop->parent->index * 2 + $loop->index]) }}"
                                        class="bg-gray-800 text-white px-5 py-2 rounded-full hover:bg-gray-700 mt-auto transition-colors inline-block text-center">
                                        {{ $card['btn'] }}
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div>

        </div>
    </section>

    {{-- Section TRUSTED BY --}}
    <section class="relative bg-white py-20">
        <div class="container max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- Title Section --}}
            <div class="text-center mb-16">
                <h2 class="text-2xl sm:text-3xl md:text-4xl tracking-[0.3em] text-gray-700 mb-6">
                    {!! __('home/trusted_by.title') !!}
                </h2>
                <p class="text-gray-600">
                    {{ __('home/trusted_by.subtitle') }}
                </p>
            </div>

            {{-- Grid Projects --}}
            <div class="grid grid-cols-6 gap-6" id="trusted-projects">
                @php
                    // Ambil 2 project highlight untuk kotak besar
                    $highlightedProjects = $trustedProjects->where('is_highlighted', true)->take(2)->values();

                    // Ambil project lain untuk kotak kecil (total 3)
                    $remainingProjects = $trustedProjects
                        ->whereNotIn('id', $highlightedProjects->pluck('id'))
                        ->take(3)
                        ->values();

                    // Gabungkan untuk 5 project awal
                    $initialProjects = $highlightedProjects->concat($remainingProjects);

                    // Sisanya hidden untuk See More / See Less
                    $moreProjects = $trustedProjects->whereNotIn('id', $initialProjects->pluck('id'));
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
                                <a href="{{ $project->project_url }}" target="_blank"
                                    class="text-gray-400 hover:text-gray-600">
                                    <img src="/assets/img/icon/iconlink.png" alt="External Link" class="w-5 h-5">
                                </a>
                            @endif
                        </div>
                        <h3 class="font-semibold text-gray-700 mb-3">{{ $project->name }}</h3>
                        <div class="rounded-xl overflow-hidden">
                            @if ($project->project_img)
                                <img src="{{ asset('storage/' . $project->project_img) }}" alt="{{ $project->name }}"
                                    class="w-full object-cover">
                            @else
                                <img src="{{ asset('assets/img/dummy/dummy1.png') }}" alt="No Image"
                                    class="w-full object-cover">
                            @endif
                        </div>
                    </div>
                @endforeach

                {{-- Tampilkan project lebih (hidden awalnya) --}}
                @foreach ($moreProjects as $project)
                    <div
                        class="col-span-6 md:col-span-2 border border-gray-200 rounded-2xl p-4 flex flex-col hidden more-project">
                        <div class="flex justify-between items-center mb-2">
                            <p class="text-xs text-gray-500">{{ $project->client ?? 'Unknown Client' }}</p>
                            @if ($project->project_url)
                                <a href="{{ $project->project_url }}" target="_blank"
                                    class="text-gray-400 hover:text-gray-600">
                                    <img src="/assets/img/icon/iconlink.png" alt="External Link" class="w-5 h-5">
                                </a>
                            @endif
                        </div>
                        <h3 class="font-semibold text-gray-700 mb-3">{{ $project->name }}</h3>
                        <div class="rounded-xl overflow-hidden">
                            @if ($project->project_img)
                                <img src="{{ asset('storage/' . $project->project_img) }}" alt="{{ $project->name }}"
                                    class="w-full object-cover">
                            @else
                                <img src="{{ asset('assets/img/dummy/dummy1.png') }}" alt="No Image"
                                    class="w-full object-cover">
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Button --}}
            <div class="flex justify-center mt-12">
                <button id="toggle-projects"
                    class="bg-gray-800 text-white px-6 py-3 rounded-full hover:bg-gray-700 transition-colors"
                    data-more="{{ __('home/trusted_by.button_more') }}"
                    data-less="{{ __('home/trusted_by.button_less') }}">
                    {{ __('home/trusted_by.button_more') }}
                </button>
            </div>

            {{-- Clients Section --}}
            <section class="bg-white py-16 font-rubik">
                <div class="container mx-auto px-4 sm:px-6 md:px-12">

                    {{-- Clients Logo Slider --}}
                    <div class="swiper clientSwiper">
                        <div class="swiper-wrapper items-center">
                            @foreach ($clients as $client)
                                <div class="swiper-slide flex justify-center items-center">
                                    <img src="{{ asset('storage/' . $client->logo) }}" alt="{{ $client->company_name }}"
                                        class="h-12 object-contain transition duration-300" />
                                </div>
                            @endforeach
                        </div>
                    </div>

                    {{-- Bottom Text --}}
                    <div class="text-center mt-10">
                        <h3 class="text-lg sm:text-xl md:text-2xl font-semibold text-gray-700">
                            {!! __('home/trusted_by.bottom_text') !!}
                        </h3>
                    </div>

                </div>
            </section>
        </div>
    </section>

    {{-- SwiperJS CDN --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    {{-- Swiper Init + Toggle Projects --}}
    <script>
        const swiper = new Swiper(".clientSwiper", {
            slidesPerView: 2,
            spaceBetween: 30,
            loop: true,
            autoplay: {
                delay: 2000,
                disableOnInteraction: false
            },
            breakpoints: {
                640: {
                    slidesPerView: 3
                },
                768: {
                    slidesPerView: 4
                },
                1024: {
                    slidesPerView: 6
                }
            },
        });

        const toggleBtn = document.getElementById("toggle-projects");
        const moreProjects = document.querySelectorAll(".more-project");
        const textMore = toggleBtn.dataset.more;
        const textLess = toggleBtn.dataset.less;
        let expanded = false;

        toggleBtn.addEventListener("click", () => {
            expanded = !expanded;
            moreProjects.forEach(el => el.classList.toggle("hidden"));
            toggleBtn.textContent = expanded ? textLess : textMore;
        });
    </script>

    <section class="w-full bg-gray-100 relative min-h-[520px] flex items-center justify-center">
        <!-- Overlay gelap -->
        <div class="absolute inset-0 bg-black/30 z-[5] pointer-events-none"></div>

        <!-- Tombol kiri (di luar container) -->
        <button id="prev"
            class="absolute left-[2cm] top-1/2 -translate-y-1/2 z-30 w-14 h-14 flex items-center justify-center">
            <img src="{{ asset('assets/img/arrow-left.png') }}" alt="Prev"
                class="w-12 h-12 opacity-80 hover:opacity-100">
        </button>

        <!-- Container utama -->
        <div class="max-w-7xl mx-auto relative flex items-stretch min-h-[520px] overflow-hidden z-10">
            <!-- Container slider -->
            <div id="testimonial-container" class="flex w-full transition-transform duration-500 ease-in-out">
                @foreach ($testimonis as $testimoni)
                    <!-- satu item slider -->
                    <div class="flex-shrink-0 w-full flex relative items-stretch">
                        <!-- CARD TESTIMONI (KIRI di desktop, overlay di mobile) -->
                        <div
                            class="w-full md:w-[48%] flex items-center justify-center relative z-20 
           px-4 md:px-0 md:-mr-[6%]">
                            <div
                                class="bg-white rounded-xl p-6 md:p-8 shadow-lg w-full max-w-md md:max-w-none 
               relative flex flex-col items-center">
                                <!-- Avatar -->
                                <div
                                    class="absolute -top-12 left-1/2 -translate-x-1/2 
                   w-24 h-24 md:w-28 md:h-28 rounded-full overflow-hidden 
                   border-4 border-white shadow-md">
                                    <img src="{{ Storage::url($testimoni->photo) }}" alt="{{ $testimoni->name }}"
                                        class="w-full h-full object-cover">
                                </div>
                                <!-- Isi card -->
                                <div class="mt-16 text-center px-2 md:px-4">
                                    <h3 class="font-semibold text-lg">{{ $testimoni->name }}</h3>
                                    <p class="text-gray-500 text-sm">{{ $testimoni->title }} at {{ $testimoni->company }}
                                    </p>
                                    <p class="mt-4 text-gray-600 text-sm italic">{{ $testimoni->message }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- FOTO COVER (KANAN di desktop, background penuh di mobile) -->
                        <div class="hidden md:block md:w-[52%] relative overflow-hidden z-10">
                            @if ($testimoni->photo_cover)
                                <img src="{{ Storage::url($testimoni->photo_cover) }}" alt="Cover"
                                    class="absolute inset-0 w-full h-full object-cover">
                            @endif
                        </div>

                        <!-- MOBILE COVER -->
                        @if ($testimoni->photo_cover)
                            <img src="{{ Storage::url($testimoni->photo_cover) }}" alt="Cover"
                                class="md:hidden absolute inset-0 w-full h-full object-cover z-0">
                        @endif
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Tombol kanan (di luar container) -->
        <button id="next"
            class="absolute right-[2cm] top-1/2 -translate-y-1/2 z-30 w-14 h-14 flex items-center justify-center">
            <img src="{{ asset('assets/img/arrow-right.png') }}" alt="Next"
                class="w-12 h-12 opacity-80 hover:opacity-100">
        </button>
    </section>

    <script>
        const container = document.getElementById('testimonial-container');
        const items = container.children;
        let current = 0;

        function showItem(index) {
            container.style.transform = `translateX(-${index * 100}%)`;
        }

        showItem(current);

        // Tombol klik
        document.getElementById('prev').addEventListener('click', () => {
            current = (current === 0) ? items.length - 1 : current - 1;
            showItem(current);
        });

        document.getElementById('next').addEventListener('click', () => {
            current = (current === items.length - 1) ? 0 : current + 1;
            showItem(current);
        });

        // Swipe support (mobile)
        let startX = 0;
        let endX = 0;

        container.addEventListener('touchstart', (e) => {
            startX = e.touches[0].clientX;
        });

        container.addEventListener('touchmove', (e) => {
            endX = e.touches[0].clientX;
        });

        container.addEventListener('touchend', () => {
            let diff = startX - endX;

            if (Math.abs(diff) > 50) { // threshold supaya tidak terlalu sensitif
                if (diff > 0) {
                    // swipe left -> next
                    current = (current === items.length - 1) ? 0 : current + 1;
                } else {
                    // swipe right -> prev
                    current = (current === 0) ? items.length - 1 : current - 1;
                }
                showItem(current);
            }
        });
    </script>

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

    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-6">

            <!-- Section Title -->
            <div class="text-center mb-12 sm:mb-16">
                <h2
                    class="font-poppins text-xl sm:text-3xl md:text-4xl font-normal 
               text-[#666666] tracking-normal sm:tracking-[0.35em] leading-snug mb-4 sm:mb-6">
                    {!! __('home/insights.title') !!}
                </h2>
            </div>

            <!-- Masonry Layout -->
            <div class="columns-1 md:columns-3 gap-6 space-y-6">
                @foreach ($blogs as $blog)
                    <div class="break-inside-avoid bg-white rounded-2xl shadow-sm p-5 border border-gray-200 space-y-4">
                        <p class="text-sm text-gray-500">{{ $blog->category }}</p>
                        <a href="{{ route('insight.show', $blog->slug) }}" class="block">
                            <h3 class="text-lg font-medium text-gray-800 hover:text-gray-600 transition">
                                {{ $blog->title }}
                            </h3>
                        </a>
                        @if ($blog->headline_img)
                            <img src="{{ asset('storage/' . $blog->headline_img) }}"
                                alt="{{ $blog->headline_img_alt ?? $blog->title }}"
                                class="w-full rounded-xl object-cover">
                        @else
                            <img src="{{ asset('assets/img/blog1.png') }}" alt="Default Blog Image"
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
@endsection
