<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Add SubService') }}
        </h2>
    </x-slot>

    <div class="py-8 max-w-3xl mx-auto sm:px-6 lg:px-8">

        @if ($errors->any())
            <div class="mb-4 bg-red-100 dark:bg-red-800 text-red-800 dark:text-red-100 px-4 py-2 rounded-md">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">
            <form action="{{ route('subservices.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- Service --}}
                <div class="mb-4">
                    <label class="block mb-1 text-gray-700 dark:text-gray-200">Service</label>
                    <select name="service_id"
                        class="w-full border border-gray-300 dark:border-gray-600 rounded-md p-2 bg-white dark:bg-gray-900 text-gray-800 dark:text-gray-200">
                        @foreach ($services as $service)
                            <option value="{{ $service->id }}">{{ $service->name }}</option>
                        @endforeach
                    </select>
                </div>

                {{-- Name --}}
                <div class="mb-4">
                    <label class="block mb-1 text-gray-700 dark:text-gray-200">Name</label>
                    <input type="text" name="name" value="{{ old('name') }}"
                        class="w-full border border-gray-300 dark:border-gray-600 rounded-md p-2 bg-white dark:bg-gray-900 text-gray-800 dark:text-gray-200" required>
                </div>

                {{-- Picture Upload --}}
                <div class="mb-4">
                    <label class="block mb-1 text-gray-700 dark:text-gray-200">Picture Upload</label>
                    <input type="file" name="picture_upload" accept="image/*"
                        class="text-gray-700 dark:text-gray-200 dark:file:bg-gray-700 dark:file:text-gray-200">
                </div>

                {{-- Description --}}
                <div class="mb-4">
                    <label class="block mb-1 text-gray-700 dark:text-gray-200">Description</label>
                    <textarea name="description" rows="4"
                        class="w-full border border-gray-300 dark:border-gray-600 rounded-md p-2 bg-white dark:bg-gray-900 text-gray-800 dark:text-gray-200">{{ old('description') }}</textarea>
                </div>

                {{-- Submit --}}
                <div class="flex justify-end">
                    <button type="submit"
                        class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 dark:bg-indigo-500 dark:hover:bg-indigo-600">
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
