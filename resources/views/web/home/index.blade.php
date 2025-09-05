@extends('layouts.web')

@section('content')
    <section class="relative w-full min-h-screen bg-cover bg-center"
        style="background-image: url('{{ asset('assets/img/sectionhero.png') }}')">

        <div
            class="container max-w-7xl mx-auto px-4 sm:px-6 flex flex-col items-center justify-between min-h-screen py-28 md:py-32 space-y-12">

            {{-- Title --}}
            <div class="text-center mt-12 md:mt-20">
                <img src="{{ asset('assets/img/text.png') }}" alt="Grow and Glow"
                    class="mx-auto w-56 sm:w-72 md:w-[420px] lg:w-[480px]">
            </div>


            {{-- Lampu (Layer Bawah & Atas) --}}
            <div class="flex justify-center">
                <div class="relative">

                    <img src="{{ asset('assets/img/lamp.png') }}" alt="Lamp"
                        class="max-w-[200px] sm:max-w-[220px] md:max-w-[240px] lg:max-w-[260px] absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 z-10">
                </div>
            </div>

            {{-- Bottom Row --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-10 w-full items-start text-center md:text-left">

                {{-- Left Content --}}
                <div class="space-y-6">
                    <p class="text-gray-600 text-base sm:text-lg leading-relaxed max-w-md mx-auto md:mx-0">
                        Your dedicated brand partner, crafting bespoke strategies
                        that connect your brand with the heart of the region's
                        diverse markets.
                    </p>
                    <button class="bg-gray-800 text-white px-6 py-3 rounded-full hover:bg-gray-700">
                        Discover your opportunities
                    </button>
                </div>

                {{-- Right Content --}}
                <div class="space-y-2 md:text-right">
                    <h2 class="text-orange-500 text-5xl sm:text-6xl font-extrabold">100+</h2>
                    <p class="text-gray-700 text-lg sm:text-xl font-semibold">Satisfied clients</p>
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
                        <h2 class="text-xl sm:text-2xl tracking-[0.2em] sm:tracking-[0.3em] text-gray-700 mb-4 sm:mb-6">
                            A T &nbsp; A &nbsp; G L A N C E
                        </h2>
                        <p class="text-gray-600 leading-relaxed text-sm sm:text-base px-2">
                            With over 20 years of experience, Communic8 has been the trusted creative digital agency
                            for ambitious brands.
                        </p>
                        <p class="mt-3 sm:mt-4 text-gray-600 leading-relaxed text-sm sm:text-base px-2">
                            We don't just deliver services. We build everlasting partnerships.
                            Through integrated solutions that combine creativity, digital intelligence,
                            and complex strategy that works. We elevate your business to achieve
                            your unique vision in this dynamic region.
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
                        <h2 class="text-2xl sm:text-3xl md:text-4xl tracking-[0.3em] text-gray-700 mb-6">
                            A T &nbsp; A &nbsp; G L A N C E
                        </h2>
                        <p class="text-gray-600 leading-relaxed max-w-lg">
                            With over 20 years of experience, Communic8 has been the trusted creative digital agency
                            for ambitious brands.
                        </p>
                        <p class="mt-4 text-gray-600 leading-relaxed max-w-lg">
                            We don't just deliver services. We build everlasting partnerships.
                            Through integrated solutions that combine creativity, digital intelligence,
                            and complex strategy that works. We elevate your business to achieve
                            your unique vision in this dynamic region.
                        </p>
                    </div>
                </div>

            </div>
        </section>

    </div>

    {{-- Section WHAT WE CAN DO FOR YOU --}}
    <section class="relative bg-white pt-16 sm:pt-20 md:pt-32 pb-16 sm:pb-20 md:pb-24">
        <div class="container max-w-7xl mx-auto px-4 sm:px-6 md:px-12">

            {{-- Title Section --}}
            <div class="text-center mb-8 sm:mb-12 md:mb-16">
                <h2
                    class="text-xl sm:text-2xl md:text-3xl lg:text-4xl tracking-[0.3em] sm:tracking-[0.5em] text-gray-700 font-extrabold uppercase leading-tight mt-6 sm:mt-8 md:mt-12 px-4">
                    WHAT WE CAN<br>DO FOR YOU
                </h2>
            </div>

            {{-- Mobile: Single Column Stack --}}
            <div class="md:hidden space-y-6">
                @php
                    $cardsMobile = [
                        [
                            'img' => 'forge.png',
                            'title' => 'Brand Forge',
                            'desc' =>
                                'We build and fortify compelling brands that resonate deeply with the market and audience. From establishing your unique identity to cultivating lasting trust and value, we ensure your brand stands out and makes a memorable impact.',
                            'btn' => 'Find your brand\'s identity',
                        ],
                        [
                            'img' => 'digital.png',
                            'title' => 'Public Presence',
                            'desc' =>
                                'Build powerful, real-world brand awareness by going beyond the screen. We make your brand unmissable, elevating its public stature and impact. Our strategic placements in OOH, DOOH, and Transit Media ensure your message connects with your target audience in the right space.',
                            'btn' => 'Be seen and heard',
                        ],
                        [
                            'img' => 'compass.png',
                            'title' => 'Digital Compass',
                            'desc' =>
                                'Amplify your reach and boost your business with our intelligent digital marketing strategies. We connect you with your target audience across diverse online channels, and drive meaningful engagement.',
                            'btn' => 'Get found & get growing',
                        ],
                        [
                            'img' => 'digital.png',
                            'title' => 'Digital Architecture',
                            'desc' =>
                                'Navigate the digital transformation and build your digital backbone with confidence. Our expert team provides digital consultancy, designing and developing sophisticated websites, applications, and platforms that enhance your operational efficiency and user experience.',
                            'btn' => 'Unlock digital possibilities',
                        ],
                    ];
                @endphp

                @foreach ($cardsMobile as $card)
                    <div
                        class="bg-white border border-gray-300 rounded-[16px] flex flex-col items-center p-4 mx-auto max-w-sm">
                        <img src="{{ asset('assets/img/' . $card['img']) }}" alt="{{ $card['title'] }}"
                            class="w-full max-w-60 h-48 sm:h-60 object-cover rounded-md mb-4 filter grayscale hover:grayscale-0 transition duration-500">
                        <div class="flex flex-col items-center text-center w-full">
                            <h3 class="text-lg sm:text-xl font-bold text-gray-700 mb-2">{{ $card['title'] }}</h3>
                            <p class="text-gray-600 mb-4 text-sm leading-relaxed px-2">{{ $card['desc'] }}</p>
                            <button
                                class="bg-gray-800 text-white px-4 py-2 text-sm rounded-full hover:bg-gray-700 transition-colors mt-auto">
                                {{ $card['btn'] }}
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Desktop: 2x2 Grid Layout --}}
            <div class="hidden md:block">
                @php
                    $cardsDesktop = $cardsMobile; // sama data
                @endphp

                {{-- Row 1 --}}
                <div class="flex flex-wrap justify-center gap-[10px] mb-2">
                    @for ($i = 0; $i < 2; $i++)
                        <div class="bg-white border border-gray-300 rounded-[16px] flex flex-col items-center p-4 w-72">
                            <img src="{{ asset('assets/img/' . $cardsDesktop[$i]['img']) }}"
                                alt="{{ $cardsDesktop[$i]['title'] }}"
                                class="w-60 h-60 object-cover rounded-md mb-4 filter grayscale hover:grayscale-0 transition duration-500">
                            <div class="flex flex-col items-center text-center w-60 h-full">
                                <h3 class="text-xl font-bold text-gray-700 mb-2">{{ $cardsDesktop[$i]['title'] }}</h3>
                                <p class="text-gray-600 mb-4 text-sm flex-auto">{{ $cardsDesktop[$i]['desc'] }}</p>
                                <button
                                    class="bg-gray-800 text-white px-4 py-2 rounded-full hover:bg-gray-700 mt-auto transition-colors">
                                    {{ $cardsDesktop[$i]['btn'] }}
                                </button>
                            </div>
                        </div>
                    @endfor
                </div>

                {{-- Row 2 --}}
                <div class="flex flex-wrap justify-center gap-[10px] mt-2">
                    @for ($i = 2; $i < 4; $i++)
                        <div class="bg-white border border-gray-300 rounded-[16px] flex flex-col items-center p-4 w-72">
                            <img src="{{ asset('assets/img/' . $cardsDesktop[$i]['img']) }}"
                                alt="{{ $cardsDesktop[$i]['title'] }}"
                                class="w-60 h-60 object-cover rounded-md mb-4 filter grayscale hover:grayscale-0 transition duration-500">
                            <div class="flex flex-col items-center text-center w-60 h-full">
                                <h3 class="text-xl font-bold text-gray-700 mb-2">{{ $cardsDesktop[$i]['title'] }}</h3>
                                <p class="text-gray-600 mb-4 text-sm flex-auto">{{ $cardsDesktop[$i]['desc'] }}</p>
                                <button
                                    class="bg-gray-800 text-white px-4 py-2 rounded-full hover:bg-gray-700 mt-auto transition-colors">
                                    {{ $cardsDesktop[$i]['btn'] }}
                                </button>
                            </div>
                        </div>
                    @endfor
                </div>
            </div>

        </div>
    </section>

    {{-- Section TRUSTED BY --}}
    <section class="relative bg-white py-20">
        <div class="container max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- Title Section --}}
            <div class="text-center mb-16">
                <h2 class="text-2xl sm:text-3xl md:text-4xl tracking-[0.3em] text-gray-700 mb-6">
                    T R U S T E D &nbsp; B Y
                </h2>
                <p class="text-gray-600">
                    We’ve been privileged to partner with a diverse range of leading brands, and across industries.
                </p>
            </div>

            {{-- Grid Projects --}}
            <div class="grid grid-cols-6 gap-6">
                @foreach ($trustedProjects as $key => $project)
                    @php
                        // 2 project pertama besar (col-span-3), sisanya kecil (col-span-2)
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
            </div>

            {{-- Button --}}
            <div class="flex justify-center mt-12">
                <button class="bg-gray-800 text-white px-6 py-3 rounded-full hover:bg-gray-700 transition-colors">
                    Explore more
                </button>
            </div>

            {{-- Clients logo row --}}
            <div class="flex flex-wrap justify-center items-center gap-7 mt-12">
                @foreach ($clients as $client)
                    <img src="{{ asset('storage/' . $client->logo) }}" class="h-12" alt="{{ $client->company_name }}">
                @endforeach
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

    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-6">

            <!-- Section Title -->
            <h2 class="text-center text-2xl md:text-3xl lg:text-4xl tracking-[0.3em] text-gray-700 mb-16">
                INSIGHTS FOR <br /> STRATEGIC MIND
            </h2>

            <!-- Masonry Layout -->
            <div class="columns-1 md:columns-3 gap-6 space-y-6">

                @foreach ($blogs as $blog)
                    <div class="break-inside-avoid bg-white rounded-2xl shadow-sm p-5 border border-gray-200 space-y-4">
                        <p class="text-sm text-gray-500">{{ $blog->category }}</p>
                        <a href="{{ route('blogs.show', $blog->slug) }}" class="block">
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
