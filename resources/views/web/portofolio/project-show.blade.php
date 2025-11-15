@extends('layouts.web')

@section('title', $project->name ?? 'Project Detail')

@section('content')
    @if($portfolioDetail)
        {{-- =======================
            HERO SECTION
        ======================== --}}
        <section class="relative w-full h-[70vh] flex items-center justify-center overflow-hidden">
            @if($portfolioDetail->bg_hero)
                <img src="{{ asset('storage/' . $portfolioDetail->bg_hero) }}" 
                     alt="{{ $portfolioDetail->hero_title }}"
                     class="absolute inset-0 w-full h-full object-cover">
            @endif
            <div class="absolute inset-0 bg-black/30"></div>

            <h1 class="relative z-10 text-white text-5xl md:text-6xl font-light tracking-[0.4em] text-center uppercase">
                {{ $portfolioDetail->hero_title }}
            </h1>
        </section>

        {{-- =======================
            CLIENT & DESCRIPTION
        ======================== --}}
        <section class="max-w-6xl mx-auto py-16 px-6 md:px-0 grid md:grid-cols-2 gap-12 items-start">
            <div>
                {{-- CLIENT LOGO --}}
                @if($portfolioDetail->client && $portfolioDetail->client->logo)
                    <div class="mb-6">
                        <img src="{{ asset('storage/' . $portfolioDetail->client->logo) }}" 
                             alt="{{ $portfolioDetail->client->company_name }}"
                             class="h-16 object-contain">
                    </div>
                @endif

                {{-- DESCRIPTION --}}
                <div class="text-gray-700 leading-relaxed">
                    {!! nl2br(e($portfolioDetail->description)) !!}
                </div>
            </div>

            {{-- DELIVERY LIST --}}
            <div>
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Communic8 Deliverables:</h3>
                @if($portfolioDetail->delivery)
                    @php
                        $deliverables = array_map('trim', explode(',', $portfolioDetail->delivery));
                    @endphp
                    <div class="flex flex-wrap gap-3">
                        @foreach($deliverables as $item)
                            <span class="bg-black text-white px-4 py-2 rounded-full text-sm font-medium">
                                {{ $item }}
                            </span>
                        @endforeach
                    </div>
                @endif
            </div>
        </section>

        {{-- =======================
            MAIN IMAGE SECTION
        ======================== --}}
        @if($portfolioDetail->img)
            <section class="w-full py-20 px-4">
                <div class="max-w-6xl mx-auto">
                    <div class="w-full bg-red-300 rounded-2xl overflow-hidden shadow-md">
                        <img src="{{ asset('storage/' . $portfolioDetail->img) }}" 
                             alt="Project Image" 
                             class="w-full h-[400px] md:h-[500px] object-cover">
                    </div>
                </div>
            </section>
        @endif
    @else
        <section class="py-20">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center">
                    <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">
                        Project details not found
                    </h2>
                    <p class="mt-4 text-lg text-gray-500">
                        The details for this project are not available at the moment.
                    </p>
                </div>
            </div>
        </section>
    @endif
@endsection
