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
                    {{-- Layer Bawah --}}
                    <img src="{{ asset('assets/img/layerbawah.png') }}" alt="Layer Bawah"
                        class="max-w-[240px] sm:max-w-[260px] md:max-w-[280px] lg:max-w-[300px] relative z-0">
                    {{-- Layer Atas --}}
                    <img src="{{ asset('assets/img/layeratas.png') }}" alt="Layer Atas"
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
        <div class="w-full h-full bg-black bg-opacity-40 flex items-center justify-center text-center py-20 sm:py-24 md:py-32">
            <div class="text-white px-4 sm:px-6">
                <h2 class="text-xl sm:text-2xl md:text-3xl lg:text-4xl font-light tracking-[0.2em] sm:tracking-[0.3em] uppercase leading-tight">
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
                <h2 class="text-xl sm:text-2xl md:text-3xl lg:text-4xl tracking-[0.3em] sm:tracking-[0.5em] text-gray-700 font-extrabold uppercase leading-tight mt-6 sm:mt-8 md:mt-12 px-4">
                    WHAT WE CAN<br>DO FOR YOU
                </h2>
            </div>

            {{-- Mobile: Single Column Stack --}}
            <div class="md:hidden space-y-6">
                {{-- Card 1: Brand Forge --}}
                <div class="bg-white border border-gray-300 rounded-[16px] flex flex-col items-center p-4 mx-auto max-w-sm">
                    <img src="{{ asset('assets/img/forge.png') }}" alt="Brand Forge"
                        class="w-full max-w-60 h-48 sm:h-60 object-cover rounded-md mb-4">
                    <div class="flex flex-col items-center text-center w-full">
                        <h3 class="text-lg sm:text-xl font-bold text-gray-700 mb-2">Brand Forge</h3>
                        <p class="text-gray-600 mb-4 text-sm leading-relaxed px-2">
                            We build and fortify compelling brands that resonate deeply with the market and audience.
                            From establishing your unique identity to cultivating lasting trust and value, we ensure
                            your brand stands out and makes a memorable impact.
                        </p>
                        <button class="bg-gray-800 text-white px-4 py-2 text-sm rounded-full hover:bg-gray-700 transition-colors mt-auto">
                            Find your brand's identity
                        </button>
                    </div>
                </div>

                {{-- Card 2: Public Presence --}}
                <div class="bg-white border border-gray-300 rounded-[16px] flex flex-col items-center p-4 mx-auto max-w-sm">
                    <img src="{{ asset('assets/img/digital.png') }}" alt="Public Presence"
                        class="w-full max-w-60 h-48 sm:h-60 object-cover rounded-md mb-4">
                    <div class="flex flex-col items-center text-center w-full">
                        <h3 class="text-lg sm:text-xl font-bold text-gray-700 mb-2">Public Presence</h3>
                        <p class="text-gray-600 mb-4 text-sm leading-relaxed px-2">
                            Build powerful, real-world brand awareness by going beyond the screen. We make your brand
                            unmissable, elevating its public stature and impact.
                            Our strategic placements in OOH, DOOH, and Transit Media ensure your message connects with
                            your target audience in the right space.
                        </p>
                        <button class="bg-gray-800 text-white px-4 py-2 text-sm rounded-full hover:bg-gray-700 transition-colors mt-auto">
                            Be seen and heard
                        </button>
                    </div>
                </div>

                {{-- Card 3: Digital Compass --}}
                <div class="bg-white border border-gray-300 rounded-[16px] flex flex-col items-center p-4 mx-auto max-w-sm">
                    <img src="{{ asset('assets/img/compass.png') }}" alt="Digital Compass"
                        class="w-full max-w-60 h-48 sm:h-60 object-cover rounded-md mb-4">
                    <div class="flex flex-col items-center text-center w-full">
                        <h3 class="text-lg sm:text-xl font-bold text-gray-700 mb-2">Digital Compass</h3>
                        <p class="text-gray-600 mb-4 text-sm leading-relaxed px-2">
                            Amplify your reach and boost your business with our intelligent digital marketing
                            strategies.
                            We connect you with your target audience across diverse online channels, and drive
                            meaningful engagement.
                        </p>
                        <button class="bg-gray-800 text-white px-4 py-2 text-sm rounded-full hover:bg-gray-700 transition-colors mt-auto">
                            Get found & get growing
                        </button>
                    </div>
                </div>

                {{-- Card 4: Digital Architecture --}}
                <div class="bg-white border border-gray-300 rounded-[16px] flex flex-col items-center p-4 mx-auto max-w-sm">
                    <img src="{{ asset('assets/img/digital.png') }}" alt="Digital Architecture"
                        class="w-full max-w-60 h-48 sm:h-60 object-cover rounded-md mb-4">
                    <div class="flex flex-col items-center text-center w-full">
                        <h3 class="text-lg sm:text-xl font-bold text-gray-700 mb-2">Digital Architecture</h3>
                        <p class="text-gray-600 mb-4 text-sm leading-relaxed px-2">
                            Navigate the digital transformation and build your digital backbone with confidence.
                            Our expert team provides digital consultancy, designing and developing sophisticated
                            websites, applications, and platforms that enhance your operational efficiency and user
                            experience.
                        </p>
                        <button class="bg-gray-800 text-white px-4 py-2 text-sm rounded-full hover:bg-gray-700 transition-colors mt-auto">
                            Unlock digital possibilities
                        </button>
                    </div>
                </div>
            </div>

            {{-- Desktop: 2x2 Grid Layout --}}
            <div class="hidden md:block">
                {{-- Row 1 --}}
                <div class="flex flex-wrap justify-center gap-[10px] mb-2">
                    {{-- Card 1: Brand Forge --}}
                    <div class="bg-white border border-gray-300 rounded-[16px] flex flex-col items-center p-4 w-72">
                        <img src="{{ asset('assets/img/forge.png') }}" alt="Brand Forge"
                            class="w-60 h-60 object-cover rounded-md mb-4">
                        <div class="flex flex-col items-center text-center w-60 h-full">
                            <h3 class="text-xl font-bold text-gray-700 mb-2">Brand Forge</h3>
                            <p class="text-gray-600 mb-4 text-sm flex-auto">
                                We build and fortify compelling brands that resonate deeply with the market and audience.
                                From establishing your unique identity to cultivating lasting trust and value, we ensure
                                your brand stands out and makes a memorable impact.
                            </p>
                            <button class="bg-gray-800 text-white px-4 py-2 rounded-full hover:bg-gray-700 mt-auto transition-colors">
                                Find your brand's identity
                            </button>
                        </div>
                    </div>

                    {{-- Card 2: Public Presence --}}
                    <div class="bg-white border border-gray-300 rounded-[16px] flex flex-col items-center p-4 w-72">
                        <img src="{{ asset('assets/img/digital.png') }}" alt="Public Presence"
                            class="w-60 h-60 object-cover rounded-md mb-4">
                        <div class="flex flex-col items-center text-center w-60 h-full">
                            <h3 class="text-xl font-bold text-gray-700 mb-2">Public Presence</h3>
                            <p class="text-gray-600 mb-4 text-sm flex-auto">
                                Build powerful, real-world brand awareness by going beyond the screen. We make your brand
                                unmissable, elevating its public stature and impact.
                                Our strategic placements in OOH, DOOH, and Transit Media ensure your message connects with
                                your target audience in the right space.
                            </p>
                            <button class="bg-gray-800 text-white px-4 py-2 rounded-full hover:bg-gray-700 mt-auto transition-colors">
                                Be seen and heard
                            </button>
                        </div>
                    </div>
                </div>

                {{-- Row 2 --}}
                <div class="flex flex-wrap justify-center gap-[10px] mt-2">
                    {{-- Card 3: Digital Compass --}}
                    <div class="bg-white border border-gray-300 rounded-[16px] flex flex-col items-center p-4 w-72">
                        <img src="{{ asset('assets/img/compass.png') }}" alt="Digital Compass"
                            class="w-60 h-60 object-cover rounded-md mb-4">
                        <div class="flex flex-col items-center text-center w-60 h-full">
                            <h3 class="text-xl font-bold text-gray-700 mb-2">Digital Compass</h3>
                            <p class="text-gray-600 mb-4 text-sm flex-auto">
                                Amplify your reach and boost your business with our intelligent digital marketing
                                strategies.
                                We connect you with your target audience across diverse online channels, and drive
                                meaningful engagement.
                            </p>
                            <button class="bg-gray-800 text-white px-4 py-2 rounded-full hover:bg-gray-700 mt-auto transition-colors">
                                Get found & get growing
                            </button>
                        </div>
                    </div>

                    {{-- Card 4: Digital Architecture --}}
                    <div class="bg-white border border-gray-300 rounded-[16px] flex flex-col items-center p-4 w-72">
                        <img src="{{ asset('assets/img/digital.png') }}" alt="Digital Architecture"
                            class="w-60 h-60 object-cover rounded-md mb-4">
                        <div class="flex flex-col items-center text-center w-60 h-full">
                            <h3 class="text-xl font-bold text-gray-700 mb-2">Digital Architecture</h3>
                            <p class="text-gray-600 mb-4 text-sm flex-auto">
                                Navigate the digital transformation and build your digital backbone with confidence.
                                Our expert team provides digital consultancy, designing and developing sophisticated
                                websites, applications, and platforms that enhance your operational efficiency and user
                                experience.
                            </p>
                            <button class="bg-gray-800 text-white px-4 py-2 rounded-full hover:bg-gray-700 mt-auto transition-colors">
                                Unlock digital possibilities
                            </button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection