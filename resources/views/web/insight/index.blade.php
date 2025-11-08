@extends('layouts.web')

@section('content')
    <!-- Hero Section -->
    <section class="relative pt-48 pb-20 bg-cover" style="background-image: url('{{ asset('assets/img/insightbg.png') }}');">
        <div class="absolute inset-0 bg-white/70"></div>

        <div class="relative z-10 max-w-5xl mx-auto px-6 text-center">
            <h1
                class="insight-hero-title text-center font-poppins text-[#666666] font-normal leading-snug
           text-sm md:text-3xl lg:text-4xl
           tracking-[0.05em] md:tracking-[0.4em]">
                {!! __('insight/hero.headline_light') !!}<br />
                {!! __('insight/hero.headline_bold') !!}
            </h1>

            <p class="mt-6 text-gray-600">{{ __('insight/hero.description') }}</p>

            <!-- Categories -->
            <div class="flex flex-wrap justify-center gap-4 mt-10">

                <a href="{{ route('insight.index') }}"
                    class="px-6 py-2 border border-gray-400 rounded-full
                {{ !$category ? 'bg-gray-800 text-white' : 'text-gray-700 hover:bg-gray-100' }}">
                    {{ __('insight/hero.all_categories') }}
                </a>

                @foreach ($categories as $id => $cat)
                    <a href="{{ route('insight.index', ['category' => $id]) }}"
                        class="px-6 py-2 border border-gray-400 rounded-full
                    {{ $category == $id ? 'bg-gray-800 text-white' : 'text-gray-700 hover:bg-gray-100' }}">
                        {{ $cat }}
                    </a>
                @endforeach

            </div>
        </div>
    </section>

    <!-- Masonry Grid -->
    <section class="py-20 bg-white relative z-10">
        <div class="max-w-7xl mx-auto px-6">

            <div class="columns-1 md:columns-3 gap-6 space-y-6">

                @foreach ($blogs as $blog)
                    <div class="break-inside-avoid bg-white rounded-2xl shadow-sm p-5 border border-gray-200 space-y-4">

                        <p class="text-sm text-gray-500">{{ $blog->category->name ?? '' }}</p>

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

            <div class="text-center mt-12">
                {{ $blogs->links() }}
            </div>

        </div>
    </section>
@endsection
