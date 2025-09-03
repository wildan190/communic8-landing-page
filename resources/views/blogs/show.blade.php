<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $blog->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 space-y-6">

                    <!-- Metadata -->
                    <div class="flex flex-wrap items-center gap-4 text-sm text-gray-600 dark:text-gray-400">
                        <span>Kategori: <span class="font-medium">{{ $blog->category }}</span></span>
                        <span>Tanggal: <span class="font-medium">{{ \Carbon\Carbon::parse($blog->date)->format('d M Y') }}</span></span>
                        <span>Status: 
                            <span class="px-2 py-1 rounded-md text-xs
                                @if($blog->status === 'published') bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200
                                @elseif($blog->status === 'draft') bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200
                                @else bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-200
                                @endif">
                                {{ ucfirst($blog->status) }}
                            </span>
                        </span>
                    </div>

                    <!-- Keywords -->
                    @if ($blog->keywords)
                        <div class="flex flex-wrap gap-2">
                            @foreach (explode(',', $blog->keywords) as $keyword)
                                <span class="px-2 py-1 bg-indigo-100 dark:bg-indigo-900 text-indigo-700 dark:text-indigo-200 rounded-md text-xs">
                                    {{ trim($keyword) }}
                                </span>
                            @endforeach
                        </div>
                    @endif

                    <!-- Headline Image -->
                    @if ($blog->headline_img)
                        <div class="w-full">
                            <img src="{{ asset('storage/' . $blog->headline_img) }}" 
                                alt="{{ $blog->headline_img_alt }}" 
                                class="rounded-lg shadow-md w-full object-cover max-h-[400px]">
                        </div>
                    @endif

                    <!-- Konten -->
                    <div class="prose prose-indigo dark:prose-invert max-w-none ql-snow">
                        {!! $blog->content !!}
                    </div>

                    <!-- Tombol aksi -->
                    <div class="flex justify-end gap-3 pt-6">
                        <a href="{{ route('blogs.index') }}"
                            class="inline-flex items-center px-4 py-2 rounded-md border border-gray-300 dark:border-gray-700 text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-900">
                            Kembali
                        </a>
                        <a href="{{ route('blogs.edit', $blog->id) }}"
                            class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-white hover:bg-indigo-700">
                            Edit
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Quill CSS untuk styling konten --}}
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <style>
        /* Pastikan Quill content tetap rapi */
        .ql-snow .ql-editor {
            padding: 0;
            font-size: 1rem;
            line-height: 1.6;
        }
    </style>
</x-app-layout>
