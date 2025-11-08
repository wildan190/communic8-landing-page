<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Hero Section Description
        </h2>
    </x-slot>

    <div class="max-w-4xl mx-auto py-8">

        @if(session('success'))
            <div class="bg-green-100 dark:bg-green-800 text-green-800 dark:text-green-100 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('hero.save') }}" method="POST"
              class="space-y-6 bg-white dark:bg-gray-800 p-6 rounded shadow">
            @csrf

            @php $hero ??= null; @endphp

            <div>
                <label class="font-semibold text-gray-700 dark:text-gray-200">Description</label>
                <textarea name="description" rows="6"
                    class="w-full border border-gray-300 dark:border-gray-600 rounded p-3
                           bg-white dark:bg-gray-900 text-gray-800 dark:text-gray-200"
                    required>{{ old('description', $hero->description ?? '') }}</textarea>
            </div>

            <div>
                <label class="font-semibold text-gray-700 dark:text-gray-200">Description (English)</label>
                <textarea name="description_en" rows="6"
                    class="w-full border border-gray-300 dark:border-gray-600 rounded p-3
                           bg-white dark:bg-gray-900 text-gray-800 dark:text-gray-200"
                    required>{{ old('description_en', $hero->description_en ?? '') }}</textarea>
            </div>

            <button
                class="bg-indigo-600 hover:bg-indigo-700 text-white dark:bg-indigo-500 dark:hover:bg-indigo-600 px-4 py-2 rounded">
                Save
            </button>
        </form>
    </div>
</x-app-layout>
