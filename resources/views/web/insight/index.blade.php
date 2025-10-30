<!-- resources/views/insight.blade.php -->
@extends('layouts.web')

@section('content')
    <!-- Hero Section -->
    <section class="relative pt-48 pb-20 bg-cover" style="background-image: url('{{ asset('assets/img/insightbg.png') }}');">

        <div class="absolute inset-0 bg-white/70"></div>

        <!-- Content -->
        <div class="relative z-10 max-w-5xl mx-auto px-6 text-center">
            <h1 class="font-poppins text-4xl md:text-5xl tracking-[0.3em] text-[#666666] font-normal leading-snug">
                {!! __('insight/hero.headline_light') !!}<br />
                {!! __('insight/hero.headline_bold') !!}
            </h1>

            <p class="mt-6 text-gray-600">
                {{ __('insight/hero.description') }}
            </p>

            <!-- Categories -->
            <div class="flex flex-wrap justify-center gap-4 mt-10">
                <a href="{{ route('insight.index') }}"
                    class="px-6 py-2 border border-gray-400 rounded-full 
              {{ !$category ? 'bg-gray-800 text-white' : 'text-gray-700 hover:bg-gray-100' }}
              transition">
                    {{ __('insight/hero.all_categories') }}
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

@endsection
