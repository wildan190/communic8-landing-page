<x-app-layout title="Edit About">
    <div class="max-w-4xl mx-auto py-10 px-6">

        {{-- Header --}}
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-2xl font-semibold text-gray-800 dark:text-gray-100">Edit About</h1>
            <a href="{{ route('about.index') }}"
               class="text-sm text-gray-600 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white transition">
               ← Kembali
            </a>
        </div>

        {{-- Form --}}
        <form action="{{ route('admin.about.update', $about->id) }}" method="POST" enctype="multipart/form-data"
              class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow space-y-6">
            @csrf

            {{-- Gambar --}}
            <div>
                <label for="img" class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-2">Gambar</label>

                @if ($about->img)
                    <div class="mb-3">
                        <img src="{{ asset('uploads/about/' . $about->img) }}"
                             alt="{{ $about->title }}"
                             class="w-28 h-28 object-cover rounded-md border border-gray-300 dark:border-gray-600 shadow-sm"
                             id="currentImage">
                    </div>
                @endif

                <input type="file" id="img" name="img"
                       class="block w-full text-sm text-gray-700 dark:text-gray-200 border-gray-300 dark:border-gray-600 rounded-md focus:ring-blue-500 focus:border-blue-500">

                <div class="mt-3">
                    <img id="preview" src="#" alt="Preview"
                         class="hidden w-28 h-28 object-cover rounded-md border border-gray-300 dark:border-gray-600">
                </div>

                @error('img')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Judul --}}
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-2">Judul</label>
                <input type="text" id="title" name="title"
                       class="block w-full border-gray-300 dark:border-gray-600 rounded-md shadow-sm text-gray-800 dark:text-gray-100 focus:ring-blue-500 focus:border-blue-500"
                       value="{{ old('title', $about->title) }}">
                @error('title')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Deskripsi --}}
            <div>
                <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-200 mb-2">Deskripsi</label>
                <textarea id="description" name="description" rows="4"
                          class="block w-full border-gray-300 dark:border-gray-600 rounded-md shadow-sm text-gray-800 dark:text-gray-100 focus:ring-blue-500 focus:border-blue-500">{{ old('description', $about->description) }}</textarea>
                @error('description')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Tombol --}}
            <div class="flex items-center justify-end space-x-3">
                <a href="{{ route('about.index') }}"
                   class="px-4 py-2 text-gray-600 dark:text-gray-300 bg-gray-100 dark:bg-gray-700 rounded-md hover:bg-gray-200 dark:hover:bg-gray-600 transition">
                    Batal
                </a>
                <button type="submit"
                        class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-md transition">
                    Update
                </button>
            </div>
        </form>

    </div>

    {{-- Preview Gambar Script --}}
    <script>
        document.getElementById('img').addEventListener('change', function (event) {
            const preview = document.getElementById('preview');
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = e => {
                    preview.src = e.target.result;
                    preview.classList.remove('hidden');
                };
                reader.readAsDataURL(file);
            } else {
                preview.classList.add('hidden');
                preview.src = '#';
            }
        });
    </script>
</x-app-layout>
