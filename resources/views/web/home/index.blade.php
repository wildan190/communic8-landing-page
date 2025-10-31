@extends('layouts.web')

@section('content')
    <section class="relative w-full min-h-[85vh] bg-cover bg-center"
        style="background-image: url('{{ asset('assets/img/sectionhero.png') }}')">
        <div
            class="container max-w-7xl mx-auto px-4 sm:px-6 flex flex-col items-center justify-between min-h-[85vh] py-20 md:py-24 space-y-8">

            {{-- Hero Title --}}
            <div class="relative z-10 pt-20 text-center">
                <h1 id="hero-line1"
                    class="font-poppins font-light text-2xl sm:text-3xl md:text-4xl text-[#000000] tracking-[0.3em] leading-snug mb-3 sm:mb-5">
                    CREATIVITY WITH
                </h1>
                <h1 id="hero-line2"
                    class="font-poppins font-light text-2xl sm:text-3xl md:text-4xl text-[#000000] tracking-[0.3em] leading-snug">
                    BUSINESS SENSE
                </h1>
            </div>

            {{-- Lampu --}}
            <div class="flex justify-center relative mt-8 group">
                <img src="{{ asset('assets/img/lamp.png') }}" alt="Lamp"
                    class="w-auto h-auto max-w-[200px] sm:max-w-[240px] md:max-w-[280px] lg:max-w-[320px]
                relative z-10 transition-opacity duration-300 group-hover:opacity-0">
                <img src="{{ asset('assets/img/lamphover.png') }}" alt="Lamp Hover"
                    class="w-auto h-auto max-w-[200px] sm:max-w-[240px] md:max-w-[280px] lg:max-w-[320px]
                absolute z-10 opacity-0 transition-opacity duration-300 group-hover:opacity-100">
            </div>

            {{-- Bottom Row --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-10 w-full items-start text-center md:text-left mt-6">

                {{-- Left Column --}}
                <div class="space-y-6">
                    <p class="text-gray-600 text-base sm:text-lg leading-relaxed max-w-md mx-auto md:mx-0">
                        {{ $hero->description ?? '' }}
                    </p>
                    <button onclick="window.location='{{ route('about.index') }}'"
                        class="px-6 py-3 text-white bg-[#333333] rounded-full font-semibold
   transition-all duration-300 hover:bg-gradient-to-r hover:from-orange-500 hover:to-yellow-400 hover:text-white hover:scale-105">
                        Discover your opportunities
                    </button>
                </div>

                {{-- Right Column: Animated Stats --}}
                <div
                    class="flex flex-col items-center md:items-end text-center md:text-right space-y-2 mt-10 overflow-hidden">
                    <h2 id="stat-text"
                        class="text-6xl sm:text-7xl md:text-8xl font-extrabold text-[#F97316]
                   transition-transform duration-700 ease-out">
                        20+
                    </h2>

                    <div class="text-left md:text-left">
                        <p id="stat-sub"
                            class="text-[#666666] text-base sm:text-lg md:text-xl font-medium leading-snug transition-opacity duration-700">
                            <strong>Years</strong> of Experience
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </section>
 
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const stats = [{
                    main: "20+",
                    sub: "<strong>Years</strong> of Experience"
                },
                {
                    main: "500+",
                    sub: "<strong>Clients</strong>"
                },
                {
                    main: "8/10",
                    sub: "<strong>Clients return for new<br/>projects</strong>"
                }
            ];

            const mainText = document.getElementById("stat-text");
            const subText = document.getElementById("stat-sub");
            let index = 0;
            let spinning = false;

            function slotEffect(newVal, newSub) {
                if (spinning) return;
                spinning = true;

                // Buat efek slot: angka berputar cepat beberapa kali
                let spins = 0;
                const spinInterval = setInterval(() => {
                    mainText.textContent = Math.floor(Math.random() * 999);
                    spins++;
                    if (spins > 10) { // cepat saja, total ±0.8 detik
                        clearInterval(spinInterval);
                        mainText.textContent = newVal;
                        subText.innerHTML = newSub;
                        spinning = false;
                    }
                }, 60);

                // Sedikit animasi naik-turun seperti slot berhenti
                mainText.style.transform = "translateY(-20px)";
                subText.style.opacity = 0;
                setTimeout(() => {
                    mainText.style.transform = "translateY(0)";
                    subText.style.opacity = 1;
                }, 500);
            }

            setInterval(() => {
                index = (index + 1) % stats.length;
                slotEffect(stats[index].main, stats[index].sub);
            }, 4000);
        });
    </script>

    {{-- Rotating Text Script --}}
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const phrases = @json(__('home/hero.titles'));
            let index = 0;

            const el1 = document.getElementById("hero-line1");
            const el2 = document.getElementById("hero-line2");

            function showPhrase(i) {
                el1.style.opacity = 0;
                el2.style.opacity = 0;
                setTimeout(() => {
                    el1.innerHTML = phrases[i].line1;
                    el2.innerHTML = phrases[i].line2;
                    el1.style.opacity = 1;
                    el2.style.opacity = 1;
                }, 300);
            }

            showPhrase(index);
            setInterval(() => {
                index = (index + 1) % phrases.length;
                showPhrase(index);
            }, 4000);
        });
    </script>

    {{-- Section Quotes --}}
    <section class="relative w-full bg-cover bg-center"
        style="background-image: url('{{ asset('assets/img/quotes.png') }}')">
        <div
            class="w-full h-full bg-black bg-opacity-40 flex items-center justify-center text-center py-32 sm:py-40 md:py-52 lg:py-60">
            <div class="text-white px-4 sm:px-6">
                <h2
                    class="text-xl sm:text-2xl md:text-3xl lg:text-4xl font-light tracking-[0.3em] sm:tracking-[0.3em] uppercase leading-tight">
                    “C R E A T I V I T Y &nbsp; I S &nbsp; T H E &nbsp; B R I D G E <br />
                    B E T W E E N &nbsp; C U L T U R E &nbsp; A N D <br />
                    C O M M E R C E“
                </h2>
                <p class="mt-3 sm:mt-4 text-xs sm:text-sm md:text-base italic">Communic 8</p>
            </div>
        </div>
    </section>


    {{-- Wrapper halaman --}}
    <div class="relative">

        {{-- Section At a Glance --}}
<section
    class="bg-white relative bg-white-100 pt-8 sm:pt-12 md:pt-16 pb-12 sm:pb-14 md:pb-16 z-10 overflow-visible">
    <div class="container max-w-7xl mx-auto px-4 sm:px-6 md:px-12 relative">

        {{-- Mobile Layout --}}
        <div class="md:hidden">
            {{-- Text Content First on Mobile --}}
            <div class="text-center mb-8">
                <h2
                    class="font-poppins font-regular text-sm sm:text-2xl md:text-3xl 
                    text-[#666666] tracking-normal sm:tracking-[0.6em] leading-snug mb-3 sm:mb-5 {{ app()->getLocale() == 'en' ? 'tracking-normal' : 'tracking-normal' }}">
                    B E H I N D &nbsp; T H E &nbsp; B R A N D
                </h2>
                <p class="text-[#666666] leading-relaxed text-sm sm:text-base px-2">
                    {!! nl2br(e($about->behind_the_brand ?? '')) !!}
                </p>
            </div>

            {{-- Images Stack for Mobile --}}
            <div class="flex justify-center space-x-8 sm:space-x-10">
                {{-- Gambar urutan ke-1 --}}
                <div class="w-32 sm:w-40 h-36 sm:h-44 rounded-[32px] overflow-hidden shadow-2xl mt-6 sm:mt-8 z-20">
                    <img src="{{ asset('assets/img/imgstack2.png') }}" alt="Stack 2"
                        class="w-full h-full object-cover grayscale hover:grayscale-0 hover:saturate-150 transition duration-500">
                </div>

                {{-- Gambar urutan ke-2 --}}
                <div class="w-32 sm:w-40 h-36 sm:h-44 rounded-[32px] overflow-hidden shadow-2xl z-10 mt-0 sm:mt-0">
                    <img src="{{ asset('assets/img/imgstack1.png') }}" alt="Stack 1"
                        class="w-full h-full object-cover grayscale hover:grayscale-0 hover:saturate-150 transition duration-500">
                </div>
            </div>
        </div>

        {{-- Desktop Layout --}}
        <div class="hidden md:grid grid-cols-2 gap-12 items-start">
            {{-- Floating Images --}}
            <div class="relative w-full h-full">
                {{-- Gambar urutan ke-1 --}}
                <div
                    class="absolute -top-28 -left-16 w-[20rem] sm:w-[21rem] md:w-[22rem] rounded-[40px] overflow-hidden shadow-2xl z-20 pointer-events-auto">
                    <img src="{{ asset('assets/img/imgstack2.png') }}" alt="Stack 2"
                        class="w-full h-full object-cover grayscale hover:grayscale-0 hover:saturate-150 transition duration-500">
                </div>

                {{-- Gambar urutan ke-2 --}}
                <div
                    class="absolute top-32 left-36 w-[20rem] sm:w-[21rem] md:w-[22rem] rounded-[40px] overflow-hidden shadow-2xl z-30 pointer-events-auto">
                    <img src="{{ asset('assets/img/imgstack1.png') }}" alt="Stack 1"
                        class="w-full h-full object-cover grayscale hover:grayscale-0 hover:saturate-150 transition duration-500">
                </div>
            </div>

            {{-- Text --}}
            <div class="text-left flex flex-col justify-center">
                <h2
                    class="text-2xl sm:text-3xl md:text-4xl text-[#666666] mb-6 leading-tight
                    {{ app()->getLocale() == 'en' ? 'tracking-[0.3em]' : 'tracking-normal' }}">
                    BEHIND THE BRAND
                </h2>
                <p class="text-[#666666] leading-relaxed break-words">
                    {!! nl2br(e($about->behind_the_brand ?? '')) !!}
                </p>
            </div>
        </div>

    </div>
</section>


    </div>

    {{-- Section Values / Achievements --}}
    <section class="bg-white py-16 font-rubik">
        <div class="container mx-auto px-4 sm:px-6 md:px-12">

            <br />
            <br />

            {{-- Title --}}
            <div class="text-center mb-16">
                <h2 class="text-xl sm:text-2xl md:text-3xl font-bold text-gray-600 leading-relaxed">
                    {!! __('home/values.title') !!}
                </h2>
            </div>

            {{-- Stats Row --}}
            <div class="flex flex-col md:flex-row justify-center items-center gap-12 md:gap-20 mb-16">

                {{-- Item 1 --}}
                <div class="flex flex-col md:flex-row items-center md:items-start gap-3 md:gap-5 text-center md:text-left">
                    <div
                        class="bg-red-600 text-white w-20 h-20 flex items-center justify-center rounded-[16px] text-4xl flex-shrink-0">
                        <i class="fas fa-briefcase"></i>
                    </div>
                    <div>
                        <div
                            class="text-5xl sm:text-6xl md:text-7xl font-extrabold text-orange-500 tracking-tight mt-3 md:mt-0">
                            <span class="counter" data-target="{{ now()->year - 2005 }}">{{ now()->year - 2005 }}</span>+
                        </div>
                        <div class="text-gray-700 font-semibold text-sm sm:text-base">
                            {{ __('home/values.years_experience') }}
                        </div>
                    </div>
                </div>

                {{-- Item 2 --}}
                <div class="flex flex-col md:flex-row items-center md:items-start gap-3 md:gap-5 text-center md:text-left">
                    <div
                        class="bg-red-600 text-white w-20 h-20 flex items-center justify-center rounded-[16px] text-4xl flex-shrink-0">
                        <i class="fas fa-layer-group"></i>
                    </div>
                    <div>
                        <div
                            class="text-5xl sm:text-6xl md:text-7xl font-black text-orange-500 tracking-tight mt-3 md:mt-0">
                            <span class="counter" data-target="300">300</span>+
                        </div>
                        <div class="text-gray-700 font-semibold text-sm sm:text-base">
                            {{ __('home/values.brands_handled') }}
                        </div>
                    </div>
                </div>

                {{-- Item 3 --}}
                <div class="flex flex-col md:flex-row items-center md:items-start gap-3 md:gap-5 text-center md:text-left">
                    <div
                        class="bg-red-600 text-white w-20 h-20 flex items-center justify-center rounded-[16px] text-4xl flex-shrink-0">
                        <i class="fas fa-handshake"></i>
                    </div>
                    <div>
                        <div
                            class="text-5xl sm:text-6xl md:text-7xl font-black text-orange-500 tracking-tight mt-3 md:mt-0">
                            <span class="counter" data-target="8">8</span>/10
                        </div>
                        <div class="text-gray-700 font-semibold text-sm sm:text-base">
                            {{ __('home/values.clients_return') }}
                        </div>
                    </div>
                </div>

            </div>

            {{-- Bottom Text --}}
            <div class="text-center max-w-3xl mx-auto text-gray-600 text-sm leading-relaxed">
                {{ __('home/values.bottom_text') }}
            </div>

        </div>
    </section>

    <style>
        .slot-number {
            display: inline-block;
            overflow: hidden;
            height: 1em;
            position: relative;
        }

        .slot-number span {
            display: block;
            position: absolute;
            top: 0;
            width: 100%;
            animation: slotRoll 1s linear infinite;
        }

        @keyframes slotRoll {
            0% {
                transform: translateY(0);
            }

            100% {
                transform: translateY(-100%);
            }
        }
    </style>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            document.querySelectorAll(".counter").forEach(counter => {
                const target = +counter.dataset.target;
                let duration = 1000; // total animasi 1 detik
                let startTime = null;

                function animateSlot(time) {
                    if (!startTime) startTime = time;
                    const progress = Math.min((time - startTime) / duration, 1);
                    const randomNum = Math.floor(Math.random() * target * 2);
                    counter.textContent = progress < 1 ? randomNum : target;
                    if (progress < 1) requestAnimationFrame(animateSlot);
                }

                requestAnimationFrame(animateSlot);
            });
        });
    </script>

    {{-- Section WHAT WE CAN DO FOR YOU --}}
    <section class="relative bg-white pt-8 sm:pt-10 md:pt-14 pb-16 sm:pb-20 md:pb-244">
        <div class="container max-w-7xl mx-auto px-4 sm:px-6 md:px-12">

            {{-- Title Section --}}
            <div class="text-center mb-16">
                <h2
                    class="text-2xl sm:text-3xl md:text-4xl text-[#666666] mb-2
                {{ app()->getLocale() == 'en' ? 'tracking-[0.3em]' : 'tracking-normal' }} leading-tight">
                    {!! __('home/what_we_do.title') !!}
                </h2><br />
                <p class="text-[#666666] text-base sm:text-lg md:text-xl">
                    {!! __('home/what_we_do.subtitle') !!}
                </p>
            </div>

            @php
                $cards = $card_services; // diambil dari controller
            @endphp

            {{-- Mobile: Single Column --}}
            <div class="md:hidden space-y-6">
                @foreach ($cards as $card)
                    <div class="bg-white border border-gray-300 rounded-[16px] flex flex-col mx-auto max-w-sm p-4">
                        <img src="{{ asset('storage/' . $card->img) }}" alt="{{ $card->title_en }}"
                            class="w-full h-48 sm:h-60 object-cover rounded-[12px] mb-4 filter grayscale hover:grayscale-0 transition duration-500">

                        <div class="flex flex-col items-center text-center w-full flex-1 pb-4">
                            <h3 class="font-bold text-gray-700 mb-3 break-words px-1 text-lg sm:text-xl">
                                {{ app()->getLocale() == 'en' ? $card->title_en : $card->title_id }}
                            </h3>

                            <p class="text-gray-600 leading-relaxed px-1 mb-6 flex-1 text-sm">
                                {{ app()->getLocale() == 'en' ? $card->desc_en : $card->desc_id }}
                            </p>

                            <a href="{{ route($card->route_name) }}"
                                class="bg-gray-800 text-white px-5 py-2 text-sm rounded-full hover:bg-gray-700 transition-colors">
                                {{ app()->getLocale() == 'en' ? $card->button_en : $card->button_id }}
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Desktop Layout --}}
            <div class="hidden md:block">
                {{-- row 1 (3 cards) --}}
                <div class="flex flex-wrap justify-center gap-6 mb-8">
                    @foreach ($cards->take(3) as $card)
                        <div
                            class="bg-white border border-gray-300 rounded-[16px] flex flex-col w-64 p-4 min-h-[480px] shadow-sm hover:shadow-md hover:-translate-y-1 transition-all duration-300">
                            <img src="{{ asset('storage/' . $card->img) }}"
                                class="w-full h-52 object-cover rounded-[12px] mb-4">

                            <div class="flex flex-col items-center text-center flex-1">
                                <h3 class="text-base font-bold text-gray-700 mb-3">
                                    {{ app()->getLocale() == 'en' ? $card->title_en : $card->title_id }}
                                </h3>

                                <p class="text-gray-600 text-sm mb-4 flex-1">
                                    {{ app()->getLocale() == 'en' ? $card->desc_en : $card->desc_id }}
                                </p>

                                <a href="{{ route($card->route_name) }}"
                                    class="bg-gray-800 text-white px-4 py-2 rounded-full hover:bg-gray-700 mt-auto text-sm">
                                    {{ app()->getLocale() == 'en' ? $card->button_en : $card->button_id }}
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>

                {{-- row 2 (2 cards) --}}
                <div class="flex flex-wrap justify-center gap-6">
                    @foreach ($cards->skip(3) as $card)
                        <div
                            class="bg-white border border-gray-300 rounded-[16px] flex flex-col w-72 p-4 min-h-[480px] shadow-sm hover:shadow-md hover:-translate-y-1 transition-all duration-300">
                            <img src="{{ asset('storage/' . $card->img) }}"
                                class="w-full h-56 object-cover rounded-[12px] mb-4">

                            <div class="flex flex-col items-center text-center flex-1">
                                <h3 class="text-lg font-bold text-gray-700 mb-3">
                                    {{ app()->getLocale() == 'en' ? $card->title_en : $card->title_id }}
                                </h3>

                                <p class="text-gray-600 text-sm mb-4 flex-1">
                                    {{ app()->getLocale() == 'en' ? $card->desc_en : $card->desc_id }}
                                </p>

                                <a href="{{ route($card->route_name) }}"
                                    class="bg-gray-800 text-white px-5 py-2 rounded-full hover:bg-gray-700 mt-auto text-sm">
                                    {{ app()->getLocale() == 'en' ? $card->button_en : $card->button_id }}
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </section>

    {{-- Section Divider --}}
    <section
        class="relative bg-cover bg-center bg-no-repeat flex flex-col items-center justify-center text-center
       py-24 md:py-32 px-6"
        style="background-image: url('{{ asset('assets/img/cta-bg.png') }}');">

        {{-- Overlay agar teks lebih kontras --}}
        <div class="absolute inset-0 bg-black/30"></div>

        {{-- Konten utama --}}
        <div class="relative z-10 max-w-3xl mx-auto">
            <h2
                class="text-white font-poppins font-semibold tracking-[0.5em]
                   text-2xl sm:text-3xl md:text-4xl lg:text-4xl uppercase mb-4">
                BRAND WE EMPOWER
            </h2>
            <p class="text-white/90 text-sm sm:text-base md:text-lg leading-relaxed">
                From local pioneers to global leaders, we’ve been trusted to bring visions to life,
                creating impact on both local and global scales.
            </p>
        </div>
    </section>


    {{-- ============================= --}}
    {{-- Section TRUSTED BY --}}
    {{-- ============================= --}}
    <section class="relative bg-white py-12 md:py-20">
        <div class="container max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- THREE SLIDER BASED ON CLIENT CATEGORY --}}
            @for ($i = 1; $i <= 3; $i++)
                @php
                    $sliderClients = $clients->where('category', $i);
                @endphp

                <div class="relative mb-10">

                    {{-- SLIDER CONTAINER --}}
                    <div id="logos-row-{{ $i }}"
                        class="flex gap-8 md:gap-12 items-center py-4 px-2 md:px-4 overflow-x-auto scrollbar-hide scroll-smooth relative">

                        @forelse ($sliderClients as $client)
                            <div class="flex-shrink-0 flex justify-center items-center w-2/5 sm:w-1/3 md:w-[16%]">
                                <img src="{{ asset('storage/' . $client->logo) }}" alt="{{ $client->company_name }}"
                                    class="h-12 md:h-16 w-auto object-contain grayscale hover:grayscale-0 transition duration-300" />
                            </div>
                        @empty
                            <div class="text-gray-400 text-sm italic">
                                No client in category {{ $i }}
                            </div>
                        @endforelse
                    </div>

                    {{-- SLIDER BUTTONS --}}
                    <button id="prev-logos-{{ $i }}"
                        class="absolute left-[-40px] top-1/2 -translate-y-1/2 p-2 flex items-center justify-center z-20">
                        <img src="{{ asset('assets/img/blog-slider-left.png') }}" class="w-6 h-6 invert" alt="Prev">
                    </button>

                    <button id="next-logos-{{ $i }}"
                        class="absolute right-[-40px] top-1/2 -translate-y-1/2 p-2 flex items-center justify-center z-20">
                        <img src="{{ asset('assets/img/blog-slider-right.png') }}" class="w-6 h-6 invert"
                            alt="Next">
                    </button>
                </div>
            @endfor


            {{-- SECTION TITLE --}}
            <div class="relative w-full py-16">
                <div class="container max-w-7xl mx-auto px-4 sm:px-6 text-center">
                    <h2
                        class="font-poppins font-light text-2xl sm:text-3xl md:text-4xl text-[#666666] tracking-[0.3em] leading-snug mb-3 sm:mb-5">
                        I D E A S &nbsp; I N &nbsp; A C T I O N
                    </h2>
                    <p class="text-xs md:text-sm leading-snug line-clamp-3">
                        {{ $project->description ?? '' }}
                    </p>
                </div>
            </div>

            @php
                $projects = $trustedProjects->where('is_highlighted', false)->values();
            @endphp

            {{-- PROJECT SLIDER --}}
            <div class="relative mb-8 md:mb-12 px-0 md:px-0">
                <div class="swiper projects-swiper overflow-hidden relative">
                    <div class="swiper-wrapper">
                        @foreach ($projects as $project)
                            <div class="swiper-slide relative group overflow-hidden rounded-2xl aspect-square p-2">

                                <img src="{{ $project->project_img ? asset('storage/' . $project->project_img) : asset('assets/img/dummy/dummy1.png') }}"
                                    class="w-full h-full object-cover transition duration-500 group-hover:scale-105 rounded-2xl"
                                    alt="{{ $project->name }}">

                                {{-- HOVER DESCRIPT --}}
                                <div
                                    class="absolute inset-0 bg-black bg-opacity-70 opacity-0 group-hover:opacity-100 transition-opacity duration-500 flex flex-col justify-center items-center text-white px-4 text-center rounded-2xl">
                                    <h3 class="text-sm md:text-base font-semibold mb-2">{{ $project->name }}</h3>
                                    <p class="text-xs md:text-sm leading-snug line-clamp-3">
                                        {{ $project->description ?? '' }}
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                {{-- NAV --}}
                <button id="my-prev"
                    class="hidden lg:flex absolute left-[-80px] top-1/2 -translate-y-1/2 p-2 flex items-center justify-center z-50">
                    <img src="{{ asset('assets/img/blog-slider-left.png') }}" class="w-10 h-10 invert" alt="Previous">
                </button>
                <button id="my-next"
                    class="hidden lg:flex absolute right-[-80px] top-1/2 -translate-y-1/2 p-2 flex items-center justify-center z-50">
                    <img src="{{ asset('assets/img/blog-slider-right.png') }}" class="w-10 h-10 invert" alt="Next">
                </button>

                <div class="swiper-pagination lg:hidden mt-6"></div>
            </div>

            {{-- BUTTON --}}
            <div class="text-center mt-10">
                <a href="{{ route('portofolio.index') }}"
                    class="inline-block px-8 py-3 text-sm md:text-base font-semibold text-white bg-black rounded-full
            transition-all duration-300 hover:bg-gradient-to-r hover:from-orange-500 hover:to-yellow-400 hover:text-black hover:scale-105">
                    Explore More
                </a>
            </div>

        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            for (let i = 1; i <= 3; i++) {
                const row = document.getElementById(`logos-row-${i}`);
                const next = document.getElementById(`next-logos-${i}`);
                const prev = document.getElementById(`prev-logos-${i}`);
                if (!row || !next || !prev) continue;

                const scrollStep = 300;

                next.addEventListener('click', () => {
                    row.scrollBy({
                        left: scrollStep,
                        behavior: 'smooth'
                    });
                });

                prev.addEventListener('click', () => {
                    row.scrollBy({
                        left: -scrollStep,
                        behavior: 'smooth'
                    });
                });
            }
        });
    </script>


    {{-- Swiper JS --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

    <script>
        const swiper = new Swiper('.projects-swiper', {
            slidesPerView: 1.2,
            spaceBetween: 12,
            loop: true,
            autoplay: {
                delay: 4000,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            breakpoints: {
                480: {
                    slidesPerView: 1.5
                },
                640: {
                    slidesPerView: 2
                },
                768: {
                    slidesPerView: 2.5
                },
                1024: {
                    slidesPerView: 3
                },
            }
        });

        // Tombol Navigasi Project
        document.getElementById('my-prev').addEventListener('click', () => swiper.slidePrev());
        document.getElementById('my-next').addEventListener('click', () => swiper.slideNext());
    </script>

    <section class="w-full bg-white relative min-h-[520px] flex items-center justify-center">
        <!-- Tombol kiri (di luar container) -->
        <button id="prev"
            class="absolute left-[2cm] top-1/2 -translate-y-1/2 z-30 w-14 h-14 flex items-center justify-center">
            <img src="{{ asset('assets/img/blog-slider-left.png') }}" alt="Prev"
                class="w-12 h-12 opacity-80 hover:opacity-100">
        </button>

        <!-- Container utama -->
        <div class="max-w-7xl mx-auto relative flex items-stretch min-h-[520px] overflow-hidden z-10">
            <!-- Container slider -->
            <div id="testimonial-container" class="flex w-full transition-transform duration-500 ease-in-out">
                @foreach ($testimonis as $testimoni)
                    <!-- satu item slider -->
                    <div class="flex-shrink-0 w-full flex relative items-stretch">
                        <!-- CARD TESTIMONI -->
                        <div
                            class="w-full md:w-[48%] flex items-center justify-center relative z-20 px-4 md:px-0 md:-mr-[6%]">
                            <div
                                class="bg-white rounded-xl p-6 md:p-8 shadow-lg w-full max-w-md md:max-w-none relative flex flex-col items-center">

                                <!-- Avatar -->
                                <div
                                    class="absolute -top-12 left-1/2 -translate-x-1/2 w-24 h-24 md:w-28 md:h-28 rounded-full overflow-hidden border-4 border-white shadow-md">
                                    <img src="{{ $testimoni->photo && file_exists(public_path('storage/' . $testimoni->photo))
                                        ? asset('storage/' . $testimoni->photo)
                                        : asset('assets/img/dummy/avatar.png') }}"
                                        alt="{{ $testimoni->name }}" class="w-full h-full object-cover">
                                </div>

                                <!-- Isi card -->
                                <div class="mt-16 text-center px-2 md:px-4">
                                    <h3 class="font-semibold text-lg">{{ $testimoni->name }}</h3>
                                    <p class="text-gray-500 text-sm">
                                        {{ $testimoni->title }} at {{ $testimoni->company }}
                                    </p>
                                    <p class="mt-4 text-gray-600 text-sm italic">
                                        {{ $testimoni->message }}
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- FOTO COVER (desktop) -->
                        <div class="hidden md:block md:w-[52%] relative overflow-hidden z-10">
                            @if ($testimoni->photo_cover && file_exists(public_path('storage/' . $testimoni->photo_cover)))
                                <img src="{{ asset('storage/' . $testimoni->photo_cover) }}" alt="Cover"
                                    class="absolute inset-0 w-full h-full object-cover">
                            @else
                                <img src="{{ asset('assets/img/dummy/dummy1.png') }}" alt="Cover"
                                    class="absolute inset-0 w-full h-full object-cover">
                            @endif
                        </div>

                        <!-- FOTO COVER (mobile) -->
                        @if ($testimoni->photo_cover && file_exists(public_path('storage/' . $testimoni->photo_cover)))
                            <img src="{{ asset('storage/' . $testimoni->photo_cover) }}" alt="Cover"
                                class="md:hidden absolute inset-0 w-full h-full object-cover z-0">
                        @else
                            <img src="{{ asset('assets/img/dummy/dummy1.png') }}" alt="Cover"
                                class="md:hidden absolute inset-0 w-full h-full object-cover z-0">
                        @endif
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Tombol kanan (di luar container) -->
        <button id="next"
            class="absolute right-[2cm] top-1/2 -translate-y-1/2 z-30 w-14 h-14 flex items-center justify-center">
            <img src="{{ asset('assets/img/blog-slider-right.png') }}" alt="Next"
                class="w-12 h-12 opacity-80 hover:opacity-100">
        </button>
    </section>

    {{-- Optional: Slider JS --}}
    <script>
        // Contoh simple slider
        const container = document.getElementById('testimonial-container');
        const prev = document.getElementById('prev');
        const next = document.getElementById('next');
        let index = 0;

        const total = container.children.length;

        prev.addEventListener('click', () => {
            index = (index - 1 + total) % total;
            container.style.transform = `translateX(-${index * 100}%)`;
        });

        next.addEventListener('click', () => {
            index = (index + 1) % total;
            container.style.transform = `translateX(-${index * 100}%)`;
        });
    </script>

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
                <a href="{{ route('contact.index') }}"
                    class="inline-block bg-white text-gray-900 px-6 py-3 rounded-full font-medium hover:bg-white-200 transition">
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
                <p class="text-gray-600 text-base sm:text-lg mt-2">
                    {{ __('home/insights.description') }}
                </p>
            </div>

            <!-- Masonry Layout -->
            <div class="columns-1 md:columns-3 gap-6 space-y-6">
                @foreach ($blogs as $blog)
                    <div class="break-inside-avoid bg-white rounded-2xl shadow-sm p-5 border border-gray-200 space-y-4">
                        <p class="text-sm text-gray-500">{{ $blog->category }}</p>
                        <a href="{{ route('insight.show', $blog->slug) }}" class="block">
                            <h3 class="text-lg font-medium text-[#666666] hover:text-[#666666] transition">
                                <strong>{{ $blog->title }}</strong>
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
