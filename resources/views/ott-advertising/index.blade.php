<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Landing Page Management
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
                <div id="success-banner"
                    class="mb-4 p-4 bg-green-100 text-green-700 rounded-lg shadow-md flex justify-between items-center">
                    <span>{{ session('success') }}</span>
                    <button onclick="document.getElementById('success-banner').style.display='none'"
                        class="text-green-700">&times;</button>
                </div>
            @endif

            <form action="{{ route('landing.save') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
                @csrf

                {{-- Hero Section --}}
                <div class="bg-white p-6 rounded-2xl shadow-lg">
                    <h3 class="text-xl font-bold text-gray-800 mb-6 border-b pb-4">Hero Section</h3>
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-x-8 gap-y-6">
                        {{-- English --}}
                        <div class="space-y-4">
                            <div>
                                <label class="block font-semibold text-gray-700 mb-1">Title (EN)</label>
                                <input type="text" name="title"
                                    value="{{ old('title', $landing->title ?? '') }}"
                                    class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                            </div>
                            <div>
                                <label class="block font-semibold text-gray-700 mb-1">Subtitle (EN)</label>
                                <input type="text" name="subtitle"
                                    value="{{ old('subtitle', $landing->subtitle ?? '') }}"
                                    class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                            </div>
                            <div>
                                <label class="block font-semibold text-gray-700 mb-1">Banner Text (EN)</label>
                                <textarea name="banner_text"
                                    class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                                    rows="4">{{ old('banner_text', $landing->banner_text ?? '') }}</textarea>
                            </div>
                        </div>
                        {{-- Indonesian --}}
                        <div class="space-y-4">
                            <div>
                                <label class="block font-semibold text-gray-700 mb-1">Title (ID)</label>
                                <input type="text" name="title_id"
                                    value="{{ old('title_id', $landing->title_id ?? '') }}"
                                    class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                            </div>
                            <div>
                                <label class="block font-semibold text-gray-700 mb-1">Subtitle (ID)</label>
                                <input type="text" name="subtitle_id"
                                    value="{{ old('subtitle_id', $landing->subtitle_id ?? '') }}"
                                    class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                            </div>
                            <div>
                                <label class="block font-semibold text-gray-700 mb-1">Banner Text (ID)</label>
                                <textarea name="banner_text_id"
                                    class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                                    rows="4">{{ old('banner_text_id', $landing->banner_text_id ?? '') }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Media Section --}}
                <div class="bg-white p-6 rounded-2xl shadow-lg">
                    <h3 class="text-xl font-bold text-gray-800 mb-6 border-b pb-4">Media Assets</h3>
                    {{-- Banner Image --}}
                    <div>
                        <label class="block font-semibold text-gray-700 mb-2">Banner Image</label>
                        <div class="flex items-center gap-6">
                            @if (!empty($landing->img))
                                <img src="{{ asset($landing->img) }}" alt="Banner"
                                    class="w-40 h-40 object-cover rounded-lg shadow-md">
                            @else
                                <div
                                    class="w-40 h-40 bg-gray-100 rounded-lg flex items-center justify-center text-gray-400">
                                    No Image</div>
                            @endif
                            <input type="file" name="img"
                                class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
                        </div>
                    </div>
                    <hr class="my-6">
                    {{-- Gallery Images --}}
                    <div>
                        <label class="block font-semibold text-gray-700 mb-4">Gallery Images (Up to 5)</label>
                        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">
                            @for ($i = 1; $i <= 5; $i++)
                                <div class="space-y-2">
                                    <label class="block text-sm font-medium text-gray-600">Image
                                        {{ $i }}</label>
                                    @if (!empty($landing->{'img_' . $i}))
                                        <img src="{{ asset($landing->{'img_' . $i}) }}"
                                            alt="Image {{ $i }}"
                                            class="w-full h-32 object-cover rounded-lg shadow-md">
                                    @else
                                        <div
                                            class="w-full h-32 bg-gray-100 rounded-lg flex items-center justify-center text-gray-400">
                                            No Image</div>
                                    @endif
                                    <input type="file" name="img_{{ $i }}"
                                        class="block w-full text-sm text-gray-500 file:mr-2 file:py-1 file:px-2 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-gray-50 file:text-gray-700 hover:file:bg-gray-100">
                                </div>
                            @endfor
                        </div>
                    </div>
                </div>

                {{-- Text Content Sections --}}
                <div class="bg-white p-6 rounded-2xl shadow-lg space-y-8">
                    <h3 class="text-xl font-bold text-gray-800 mb-2 border-b pb-4">Content Blocks</h3>
                    @foreach ([1, 2, 3] as $i)
                        <div class="border border-gray-200 p-6 rounded-lg">
                            <h4 class="text-lg font-semibold text-gray-800 mb-4">Text Block {{ $i }}</h4>
                            <div class="grid grid-cols-1 lg:grid-cols-2 gap-x-8 gap-y-6">
                                {{-- English --}}
                                <div class="space-y-4">
                                    <div>
                                        <label class="block font-semibold text-gray-700 mb-1">Title (EN)</label>
                                        <input type="text" name="title_text{{ $i }}"
                                            value="{{ old('title_text' . $i, $landing->{'title_text' . $i} ?? '') }}"
                                            class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                                    </div>
                                    <div>
                                        <label class="block font-semibold text-gray-700 mb-1">Description
                                            (EN)</label>
                                        <textarea name="description{{ $i }}"
                                            class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                                            rows="3">{{ old('description' . $i, $landing->{'description' . $i} ?? '') }}</textarea>
                                    </div>
                                </div>
                                {{-- Indonesian --}}
                                <div class="space-y-4">
                                    <div>
                                        <label class="block font-semibold text-gray-700 mb-1">Title (ID)</label>
                                        <input type="text" name="title_text{{ $i }}_id"
                                            value="{{ old('title_text' . $i . '_id', $landing->{'title_text' . $i . '_id'} ?? '') }}"
                                            class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                                    </div>
                                    <div>
                                        <label class="block font-semibold text-gray-700 mb-1">Description
                                            (ID)</label>
                                        <textarea name="description{{ $i }}_id"
                                            class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                                            rows="3">{{ old('description' . $i . '_id', $landing->{'description' . $i . '_id'} ?? '') }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                {{-- Custom Sections --}}
                <div class="bg-white p-6 rounded-2xl shadow-lg space-y-8">
                    <h3 class="text-xl font-bold text-gray-800 mb-2 border-b pb-4">Custom Sections</h3>
                    @foreach ([1, 2] as $i)
                        @php
                            $section_en = json_decode($landing->{'section' . $i . '_en'} ?? '{}');
                            $section_id = json_decode($landing->{'section' . $i . '_id'} ?? '{}');
                        @endphp
                        <div class="border border-gray-200 p-6 rounded-lg">
                            <h4 class="text-lg font-semibold text-gray-800 mb-4">Section {{ $i }}</h4>
                            <div class="grid grid-cols-1 lg:grid-cols-2 gap-x-8 gap-y-6">
                                {{-- English --}}
                                <div class="space-y-4">
                                    <h5 class="font-semibold text-gray-600">English Content</h5>
                                    <div>
                                        <label class="block font-semibold text-gray-700 mb-1">Title</label>
                                        <input type="text" name="section{{ $i }}_en_title"
                                            value="{{ old('section' . $i . '_en_title', $section_en->title ?? '') }}"
                                            class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                                    </div>
                                    <div>
                                        <label class="block font-semibold text-gray-700 mb-1">Paragraph 1</label>
                                        <textarea name="section{{ $i }}_en_p1"
                                            class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                                            rows="3">{{ old('section' . $i . '_en_p1', $section_en->p1 ?? '') }}</textarea>
                                    </div>
                                    <div>
                                        <label class="block font-semibold text-gray-700 mb-1">Paragraph 2</label>
                                        <textarea name="section{{ $i }}_en_p2"
                                            class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                                            rows="3">{{ old('section' . $i . '_en_p2', $section_en->p2 ?? '') }}</textarea>
                                    </div>
                                </div>
                                {{-- Indonesian --}}
                                <div class="space-y-4">
                                    <h5 class="font-semibold text-gray-600">Indonesian Content</h5>
                                    <div>
                                        <label class="block font-semibold text-gray-700 mb-1">Title</label>
                                        <input type="text" name="section{{ $i }}_id_title"
                                            value="{{ old('section' . $i . '_id_title', $section_id->title ?? '') }}"
                                            class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                                    </div>
                                    <div>
                                        <label class="block font-semibold text-gray-700 mb-1">Paragraph 1</label>
                                        <textarea name="section{{ $i }}_id_p1"
                                            class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                                            rows="3">{{ old('section' . $i . '_id_p1', $section_id->p1 ?? '') }}</textarea>
                                    </div>
                                    <div>
                                        <label class="block font-semibold text-gray-700 mb-1">Paragraph 2</label>
                                        <textarea name="section{{ $i }}_id_p2"
                                            class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                                            rows="3">{{ old('section' . $i . '_id_p2', $section_id->p2 ?? '') }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                {{-- Submit Button --}}
                <div class="flex justify-end pt-4">
                    <button type="submit"
                        class="bg-indigo-600 text-white font-bold px-8 py-3 rounded-full hover:bg-indigo-700 transition-transform transform hover:scale-105 shadow-lg">
                        Save Changes
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
