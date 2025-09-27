<div>
    <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">{{ $label }}</label>

    <div onclick="document.getElementById('{{ $name }}').click()"
        class="relative flex flex-col items-center justify-center border-2 border-dashed border-gray-300 dark:border-gray-700 rounded-xl p-6 text-center cursor-pointer hover:border-indigo-500 transition">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-400 dark:text-gray-500 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 15a4 4 0 01.88-2.55l4.1-5.25A4 4 0 0112 5h0a4 4 0 013.99 2.19l4.1 5.25A4 4 0 0121 15v4a2 2 0 01-2 2H5a2 2 0 01-2-2v-4z" />
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 15l5-5 4 4 5-5 4 4" />
        </svg>
        <p class="text-sm text-gray-600 dark:text-gray-400">Klik untuk unggah gambar</p>
        <p class="text-xs text-gray-400 mt-1">PNG, JPG, atau WEBP (maks. 2MB)</p>
    </div>

    <input type="file" name="{{ $name }}" id="{{ $name }}" class="hidden" accept="image/*" onchange="previewImage(this, 'preview_{{ $name }}')">

    <div class="mt-4 flex justify-center">
        @if($preview)
            <img id="preview_{{ $name }}" src="{{ asset('storage/' . $preview) }}" class="rounded-xl shadow-md w-64 object-cover">
        @else
            <img id="preview_{{ $name }}" class="hidden rounded-xl shadow-md w-64 object-cover">
        @endif
    </div>

    @error($name)
        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
    @enderror
</div>
