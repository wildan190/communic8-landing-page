<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Activity') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg">
                <div class="p-6">
                    {{-- Pesan error --}}
                    @if ($errors->any())
                        <div class="mb-4 bg-red-50 dark:bg-red-900/30 text-red-700 dark:text-red-200 px-4 py-3 rounded-md">
                            <ul class="list-disc ml-5 text-sm">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('activities.update', $activity->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                        @csrf
                        @method('PUT')

                        {{-- Caption --}}
                        <div>
                            <label for="caption" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Caption
                            </label>
                            <input type="text" name="caption" id="caption" value="{{ old('caption', $activity->caption) }}"
                                   class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 
                                          bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100 
                                          focus:border-indigo-500 focus:ring-indigo-500" required>
                        </div>

                        {{-- File Image --}}
                        <div>
                            <label for="file_img" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Upload Image
                            </label>
                            @if($activity->file_img)
                                <div class="mb-2">
                                    <img src="{{ asset('storage/' . $activity->file_img) }}" class="h-20 rounded shadow">
                                </div>
                            @endif
                            <input type="file" name="file_img" id="file_img"
                                   class="mt-1 block w-full text-sm text-gray-900 dark:text-gray-100
                                          file:mr-4 file:py-2 file:px-4
                                          file:rounded-md file:border-0
                                          file:text-sm file:font-semibold
                                          file:bg-indigo-50 dark:file:bg-gray-700 
                                          file:text-indigo-700 dark:file:text-indigo-300
                                          hover:file:bg-indigo-100 dark:hover:file:bg-gray-600">
                        </div>

                        {{-- Tombol --}}
                        <div class="flex justify-end gap-3">
                            <a href="{{ route('activities.index') }}" 
                               class="px-4 py-2 rounded-md border border-gray-300 dark:border-gray-600 
                                      text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700">
                                Batal
                            </a>
                            <button type="submit" 
                                    class="px-4 py-2 rounded-md bg-indigo-600 text-white hover:bg-indigo-700">
                                Update
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
