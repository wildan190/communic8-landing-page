<x-app-layout>
    <div class="max-w-5xl mx-auto py-10 px-6">

        <h1 class="text-2xl font-bold mb-8 text-gray-900 dark:text-gray-100">
            🧭 Digital Compass Content
        </h1>

        @if (session('success'))
            <div class="mb-6 p-4 rounded-lg bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white dark:bg-gray-800 shadow-sm rounded-xl p-6 space-y-8">
            <form action="{{ route('digital.compass.save') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
                @csrf

                {{-- Head Image --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Head Image</label>
                    @if ($content && $content->head_img)
                        <img src="{{ Storage::url($content->head_img) }}" class="w-48 rounded-lg mb-3 shadow">
                    @endif
                    <input type="file" name="head_img"
                        class="w-full text-sm text-gray-900 dark:text-gray-200 bg-gray-50 dark:bg-gray-700 rounded-lg border border-gray-300 dark:border-gray-600 cursor-pointer focus:outline-none">
                </div>

                {{-- Services Image --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Services Image</label>
                    @if ($content && $content->img_services)
                        <img src="{{ Storage::url($content->img_services) }}" class="w-48 rounded-lg mb-3 shadow">
                    @endif
                    <input type="file" name="img_services"
                        class="w-full text-sm text-gray-900 dark:text-gray-200 bg-gray-50 dark:bg-gray-700 rounded-lg border border-gray-300 dark:border-gray-600 cursor-pointer focus:outline-none">
                </div>

                {{-- Dynamic Titles --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @for ($i = 1; $i <= 4; $i++)
                        <div class="space-y-2">
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Title {{ $i }}
                            </label>
                            <input type="text" name="title{{ $i }}"
                                value="{{ $content->{'title'.$i} ?? '' }}"
                                class="w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200 focus:ring-indigo-500 focus:border-indigo-500">

                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mt-2">
                                Value Title {{ $i }}
                            </label>
                            <textarea name="value_title{{ $i }}" rows="3"
                                class="w-full rounded-lg border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200 focus:ring-indigo-500 focus:border-indigo-500">{{ $content->{'value_title'.$i} ?? '' }}</textarea>
                        </div>
                    @endfor
                </div>

                <div class="flex justify-end">
                    <button type="submit"
                        class="px-6 py-2 bg-indigo-600 text-white text-sm rounded-lg shadow hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800">
                        💾 Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
