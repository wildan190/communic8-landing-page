<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Gambar') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">
                <form action="{{ route('galleries.update', $gallery) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <div>
                        <label class="block text-gray-700 dark:text-gray-300">Upload Picture</label>
                        <input type="file" name="upload_picture" class="mt-2 block w-full border rounded-md">
                        @if($gallery->upload_picture)
                            <img src="{{ asset('storage/' . $gallery->upload_picture) }}" class="mt-2 h-32 rounded-md object-cover">
                        @endif
                        @error('upload_picture') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-gray-700 dark:text-gray-300">Date</label>
                        <input type="date" name="date" value="{{ $gallery->date->format('Y-m-d') }}" class="mt-2 block w-full rounded-md border-gray-300">
                        @error('date') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
                    </div>

                    <div class="flex justify-end">
                        <button class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
