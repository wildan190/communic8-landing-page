<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Landing Page Management
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white shadow sm:rounded-lg p-6">
                <form action="{{ route('landing.save') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf

                    {{-- Title --}}
                    <div>
                        <label class="block font-semibold mb-1">Title (English)</label>
                        <input type="text" name="title"
                            value="{{ old('title', $landing->title ?? '') }}"
                            class="w-full border-gray-300 rounded-md shadow-sm focus:ring-gray-500 focus:border-gray-500">
                    </div>
                    <div>
                        <label class="block font-semibold mb-1">Title (Indonesian)</label>
                        <input type="text" name="title_id"
                            value="{{ old('title_id', $landing->title_id ?? '') }}"
                            class="w-full border-gray-300 rounded-md shadow-sm focus:ring-gray-500 focus:border-gray-500">
                    </div>

                    {{-- Subtitle --}}
                    <div>
                        <label class="block font-semibold mb-1">Subtitle (English)</label>
                        <input type="text" name="subtitle"
                            value="{{ old('subtitle', $landing->subtitle ?? '') }}"
                            class="w-full border-gray-300 rounded-md shadow-sm focus:ring-gray-500 focus:border-gray-500">
                    </div>
                    <div>
                        <label class="block font-semibold mb-1">Subtitle (Indonesian)</label>
                        <input type="text" name="subtitle_id"
                            value="{{ old('subtitle_id', $landing->subtitle_id ?? '') }}"
                            class="w-full border-gray-300 rounded-md shadow-sm focus:ring-gray-500 focus:border-gray-500">
                    </div>

                    {{-- Banner Text --}}
                    <div>
                        <label class="block font-semibold mb-1">Banner Text (English)</label>
                        <textarea name="banner_text"
                            class="w-full border-gray-300 rounded-md shadow-sm focus:ring-gray-500 focus:border-gray-500"
                            rows="3">{{ old('banner_text', $landing->banner_text ?? '') }}</textarea>
                    </div>
                    <div>
                        <label class="block font-semibold mb-1">Banner Text (Indonesian)</label>
                        <textarea name="banner_text_id"
                            class="w-full border-gray-300 rounded-md shadow-sm focus:ring-gray-500 focus:border-gray-500"
                            rows="3">{{ old('banner_text_id', $landing->banner_text_id ?? '') }}</textarea>
                    </div>

                    {{-- Banner Image --}}
                    <div>
                        <label class="block font-semibold mb-1">Banner Image</label>
                        @if (!empty($landing->img))
                            <div class="mb-2">
                                <img src="{{ asset($landing->img) }}" alt="Banner" class="w-48 rounded shadow">
                            </div>
                        @endif
                        <input type="file" name="img"
                            class="w-full border-gray-300 rounded-md shadow-sm focus:ring-gray-500 focus:border-gray-500">
                    </div>

                    {{-- Images 1-5 --}}
                    @for ($i = 1; $i <= 5; $i++)
                        <div>
                            <label class="block font-semibold mb-1">Image {{ $i }}</label>
                            @if (!empty($landing->{'img_'.$i}))
                                <div class="mb-2">
                                    <img src="{{ asset($landing->{'img_'.$i}) }}" alt="Image {{ $i }}" class="w-48 rounded shadow">
                                </div>
                            @endif
                            <input type="file" name="img_{{ $i }}"
                                class="w-full border-gray-300 rounded-md shadow-sm focus:ring-gray-500 focus:border-gray-500">
                        </div>
                    @endfor

                    {{-- Text 1 --}}
                    <div>
                        <label class="block font-semibold mb-1">Title Text 1 (English)</label>
                        <input type="text" name="title_text1"
                            value="{{ old('title_text1', $landing->title_text1 ?? '') }}"
                            class="w-full border-gray-300 rounded-md shadow-sm focus:ring-gray-500 focus:border-gray-500">
                    </div>
                    <div>
                        <label class="block font-semibold mb-1">Title Text 1 (Indonesian)</label>
                        <input type="text" name="title_text1_id"
                            value="{{ old('title_text1_id', $landing->title_text1_id ?? '') }}"
                            class="w-full border-gray-300 rounded-md shadow-sm focus:ring-gray-500 focus:border-gray-500">
                    </div>
                    <div>
                        <label class="block font-semibold mb-1">Description 1 (English)</label>
                        <textarea name="description1"
                            class="w-full border-gray-300 rounded-md shadow-sm focus:ring-gray-500 focus:border-gray-500"
                            rows="3">{{ old('description1', $landing->description1 ?? '') }}</textarea>
                    </div>
                    <div>
                        <label class="block font-semibold mb-1">Description 1 (Indonesian)</label>
                        <textarea name="description1_id"
                            class="w-full border-gray-300 rounded-md shadow-sm focus:ring-gray-500 focus:border-gray-500"
                            rows="3">{{ old('description1_id', $landing->description1_id ?? '') }}</textarea>
                    </div>

                    {{-- Text 2 --}}
                    <div>
                        <label class="block font-semibold mb-1">Title Text 2 (English)</label>
                        <input type="text" name="title_text2"
                            value="{{ old('title_text2', $landing->title_text2 ?? '') }}"
                            class="w-full border-gray-300 rounded-md shadow-sm focus:ring-gray-500 focus:border-gray-500">
                    </div>
                    <div>
                        <label class="block font-semibold mb-1">Title Text 2 (Indonesian)</label>
                        <input type="text" name="title_text2_id"
                            value="{{ old('title_text2_id', $landing->title_text2_id ?? '') }}"
                            class="w-full border-gray-300 rounded-md shadow-sm focus:ring-gray-500 focus:border-gray-500">
                    </div>
                    <div>
                        <label class="block font-semibold mb-1">Description 2 (English)</label>
                        <textarea name="description2"
                            class="w-full border-gray-300 rounded-md shadow-sm focus:ring-gray-500 focus:border-gray-500"
                            rows="3">{{ old('description2', $landing->description2 ?? '') }}</textarea>
                    </div>
                    <div>
                        <label class="block font-semibold mb-1">Description 2 (Indonesian)</label>
                        <textarea name="description2_id"
                            class="w-full border-gray-300 rounded-md shadow-sm focus:ring-gray-500 focus:border-gray-500"
                            rows="3">{{ old('description2_id', $landing->description2_id ?? '') }}</textarea>
                    </div>

                    {{-- Text 3 --}}
                    <div>
                        <label class="block font-semibold mb-1">Title Text 3 (English)</label>
                        <input type="text" name="title_text3"
                            value="{{ old('title_text3', $landing->title_text3 ?? '') }}"
                            class="w-full border-gray-300 rounded-md shadow-sm focus:ring-gray-500 focus:border-gray-500">
                    </div>
                    <div>
                        <label class="block font-semibold mb-1">Title Text 3 (Indonesian)</label>
                        <input type="text" name="title_text3_id"
                            value="{{ old('title_text3_id', $landing->title_text3_id ?? '') }}"
                            class="w-full border-gray-300 rounded-md shadow-sm focus:ring-gray-500 focus:border-gray-500">
                    </div>
                    <div>
                        <label class="block font-semibold mb-1">Description 3 (English)</label>
                        <textarea name="description3"
                            class="w-full border-gray-300 rounded-md shadow-sm focus:ring-gray-500 focus:border-gray-500"
                            rows="3">{{ old('description3', $landing->description3 ?? '') }}</textarea>
                    </div>
                    <div>
                        <label class="block font-semibold mb-1">Description 3 (Indonesian)</label>
                        <textarea name="description3_id"
                            class="w-full border-gray-300 rounded-md shadow-sm focus:ring-gray-500 focus:border-gray-500"
                            rows="3">{{ old('description3_id', $landing->description3_id ?? '') }}</textarea>
                    </div>

                    {{-- Section 1 --}}
                    <div class="space-y-4 border p-4 rounded-md">
                        <h3 class="text-lg font-semibold">Section 1</h3>
                        @php
                            $section1_en = json_decode($landing->section1_en ?? '{}');
                            $section1_id = json_decode($landing->section1_id ?? '{}');
                        @endphp
                        <div>
                            <label class="block font-semibold mb-1">Title (English)</label>
                            <input type="text" name="section1_en_title"
                                value="{{ old('section1_en_title', $section1_en->title ?? '') }}"
                                class="w-full border-gray-300 rounded-md shadow-sm focus:ring-gray-500 focus:border-gray-500">
                        </div>
                        <div>
                            <label class="block font-semibold mb-1">Paragraph 1 (English)</label>
                            <textarea name="section1_en_p1"
                                class="w-full border-gray-300 rounded-md shadow-sm focus:ring-gray-500 focus:border-gray-500"
                                rows="3">{{ old('section1_en_p1', $section1_en->p1 ?? '') }}</textarea>
                        </div>
                        <div>
                            <label class="block font-semibold mb-1">Paragraph 2 (English)</label>
                            <textarea name="section1_en_p2"
                                class="w-full border-gray-300 rounded-md shadow-sm focus:ring-gray-500 focus:border-gray-500"
                                rows="3">{{ old('section1_en_p2', $section1_en->p2 ?? '') }}</textarea>
                        </div>
                        <div>
                            <label class="block font-semibold mb-1">Title (Indonesian)</label>
                            <input type="text" name="section1_id_title"
                                value="{{ old('section1_id_title', $section1_id->title ?? '') }}"
                                class="w-full border-gray-300 rounded-md shadow-sm focus:ring-gray-500 focus:border-gray-500">
                        </div>
                        <div>
                            <label class="block font-semibold mb-1">Paragraph 1 (Indonesian)</label>
                            <textarea name="section1_id_p1"
                                class="w-full border-gray-300 rounded-md shadow-sm focus:ring-gray-500 focus:border-gray-500"
                                rows="3">{{ old('section1_id_p1', $section1_id->p1 ?? '') }}</textarea>
                        </div>
                        <div>
                            <label class="block font-semibold mb-1">Paragraph 2 (Indonesian)</label>
                            <textarea name="section1_id_p2"
                                class="w-full border-gray-300 rounded-md shadow-sm focus:ring-gray-500 focus:border-gray-500"
                                rows="3">{{ old('section1_id_p2', $section1_id->p2 ?? '') }}</textarea>
                        </div>
                    </div>

                    {{-- Section 2 --}}
                    <div class="space-y-4 border p-4 rounded-md">
                        <h3 class="text-lg font-semibold">Section 2</h3>
                        @php
                            $section2_en = json_decode($landing->section2_en ?? '{}');
                            $section2_id = json_decode($landing->section2_id ?? '{}');
                        @endphp
                        <div>
                            <label class="block font-semibold mb-1">Title (English)</label>
                            <input type="text" name="section2_en_title"
                                value="{{ old('section2_en_title', $section2_en->title ?? '') }}"
                                class="w-full border-gray-300 rounded-md shadow-sm focus:ring-gray-500 focus:border-gray-500">
                        </div>
                        <div>
                            <label class="block font-semibold mb-1">Paragraph 1 (English)</label>
                            <textarea name="section2_en_p1"
                                class="w-full border-gray-300 rounded-md shadow-sm focus:ring-gray-500 focus:border-gray-500"
                                rows="3">{{ old('section2_en_p1', $section2_en->p1 ?? '') }}</textarea>
                        </div>
                        <div>
                            <label class="block font-semibold mb-1">Paragraph 2 (English)</label>
                            <textarea name="section2_en_p2"
                                class="w-full border-gray-300 rounded-md shadow-sm focus:ring-gray-500 focus:border-gray-500"
                                rows="3">{{ old('section2_en_p2', $section2_en->p2 ?? '') }}</textarea>
                        </div>
                        <div>
                            <label class="block font-semibold mb-1">Title (Indonesian)</label>
                            <input type="text" name="section2_id_title"
                                value="{{ old('section2_id_title', $section2_id->title ?? '') }}"
                                class="w-full border-gray-300 rounded-md shadow-sm focus:ring-gray-500 focus:border-gray-500">
                        </div>
                        <div>
                            <label class="block font-semibold mb-1">Paragraph 1 (Indonesian)</label>
                            <textarea name="section2_id_p1"
                                class="w-full border-gray-300 rounded-md shadow-sm focus:ring-gray-500 focus:border-gray-500"
                                rows="3">{{ old('section2_id_p1', $section2_id->p1 ?? '') }}</textarea>
                        </div>
                        <div>
                            <label class="block font-semibold mb-1">Paragraph 2 (Indonesian)</label>
                            <textarea name="section2_id_p2"
                                class="w-full border-gray-300 rounded-md shadow-sm focus:ring-gray-500 focus:border-gray-500"
                                rows="3">{{ old('section2_id_p2', $section2_id->p2 ?? '') }}</textarea>
                        </div>
                    </div>

                    {{-- Submit --}}
                    <div class="pt-4">
                        <button type="submit"
                            class="bg-gray-800 text-white px-6 py-3 rounded-full hover:bg-gray-700 transition">
                            Save Changes
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
