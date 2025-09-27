<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Brand Forge Content') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-lg sm:rounded-2xl p-8">

                @if(session('success'))
                    <div class="mb-6 p-4 bg-green-100 dark:bg-green-900/40 text-green-800 dark:text-green-200 rounded-md">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('brandforge.save') }}" method="POST" enctype="multipart/form-data" class="space-y-10">
                    @csrf

                    {{-- 🖼️ Head Image --}}
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Head Image</label>

                        <div onclick="document.getElementById('head_img').click()"
                            class="relative flex flex-col items-center justify-center border-2 border-dashed border-gray-300 dark:border-gray-700 rounded-xl p-6 text-center cursor-pointer hover:border-indigo-500 transition">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-400 dark:text-gray-500 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 15a4 4 0 01.88-2.55l4.1-5.25A4 4 0 0112 5h0a4 4 0 013.99 2.19l4.1 5.25A4 4 0 0121 15v4a2 2 0 01-2 2H5a2 2 0 01-2-2v-4z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 15l5-5 4 4 5-5 4 4" />
                            </svg>
                            <p class="text-sm text-gray-600 dark:text-gray-400">Klik untuk unggah gambar</p>
                            <p class="text-xs text-gray-400 mt-1">PNG, JPG, atau WEBP (maks. 2MB)</p>
                        </div>

                        <input type="file" name="head_img" id="head_img" class="hidden" accept="image/*" onchange="previewImage(this, 'preview_head_img')">

                        <div class="mt-4 flex justify-center">
                            @if(isset($content->head_img))
                                <img id="preview_head_img" src="{{ asset('storage/'.$content->head_img) }}" class="rounded-xl shadow-md w-64 object-cover">
                            @else
                                <img id="preview_head_img" class="hidden rounded-xl shadow-md w-64 object-cover">
                            @endif
                        </div>

                        @error('head_img')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- 📊 Insight Strategy Driven --}}
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Insight Strategy Driven</label>
                        <input type="text" name="insight_strategy_driven"
                            class="w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 focus:ring-indigo-500 focus:border-indigo-500"
                            value="{{ old('insight_strategy_driven', $content->insight_strategy_driven ?? '') }}">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Deskripsi Insight Strategy Driven</label>
                        <textarea name="desc_insight_strategy_driven" rows="4"
                            class="w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 focus:ring-indigo-500 focus:border-indigo-500">{{ old('desc_insight_strategy_driven', $content->desc_insight_strategy_driven ?? '') }}</textarea>
                    </div>

                    {{-- 📸 Gambar Insight --}}
                    @include('brandforge.partials.file-upload', [
                        'name' => 'img_insight_strategy_driven',
                        'label' => 'Image Insight Strategy Driven',
                        'preview' => $content->img_insight_strategy_driven ?? null
                    ])

                    {{-- 💡 Bold Creative Ideas --}}
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Bold Creative Ideas</label>
                        <input type="text" name="bold_creative_ideas"
                            class="w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 focus:ring-indigo-500 focus:border-indigo-500"
                            value="{{ old('bold_creative_ideas', $content->bold_creative_ideas ?? '') }}">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Deskripsi Bold Creative Ideas</label>
                        <textarea name="desc_bold_creative_ideas" rows="4"
                            class="w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 focus:ring-indigo-500 focus:border-indigo-500">{{ old('desc_bold_creative_ideas', $content->desc_bold_creative_ideas ?? '') }}</textarea>
                    </div>

                    {{-- 📸 Gambar Bold --}}
                    @include('brandforge.partials.file-upload', [
                        'name' => 'img_bold_creative_ideas',
                        'label' => 'Image Bold Creative Ideas',
                        'preview' => $content->img_bold_creative_ideas ?? null
                    ])

                    {{-- 🎨 Impactful Visual Identity --}}
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Impactful Visual Identity</label>
                        <input type="text" name="impactful_visual_identity"
                            class="w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 focus:ring-indigo-500 focus:border-indigo-500"
                            value="{{ old('impactful_visual_identity', $content->impactful_visual_identity ?? '') }}">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">Deskripsi Impactful Visual Identity</label>
                        <textarea name="desc_impactful_visual_identity" rows="4"
                            class="w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100 focus:ring-indigo-500 focus:border-indigo-500">{{ old('desc_impactful_visual_identity', $content->desc_impactful_visual_identity ?? '') }}</textarea>
                    </div>

                    {{-- 📸 Gambar Impactful --}}
                    @include('brandforge.partials.file-upload', [
                        'name' => 'img_impactful_visual_identity',
                        'label' => 'Image Impactful Visual Identity',
                        'preview' => $content->img_impactful_visual_identity ?? null
                    ])

                    <div class="flex justify-end pt-6">
                        <button type="submit" class="px-6 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 focus:ring-4 focus:ring-indigo-400 transition">
                            Simpan Perubahan
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <script>
        function previewImage(input, previewId) {
            const file = input.files[0];
            const preview = document.getElementById(previewId);

            if (file) {
                const reader = new FileReader();
                reader.onload = (e) => {
                    preview.src = e.target.result;
                    preview.classList.remove('hidden');
                };
                reader.readAsDataURL(file);
            }
        }
    </script>
</x-app-layout>
