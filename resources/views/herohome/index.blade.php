<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Hero Section Description
        </h2>
    </x-slot>

    <div class="max-w-4xl mx-auto py-8">
        @if(session('success'))
            <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('hero.save') }}" method="POST" class="space-y-6 bg-white p-6 rounded shadow">
            @csrf

            @php $hero ??= null; @endphp

            <div>
                <label class="font-semibold">Description</label>
                <textarea name="description" rows="6"
                          class="w-full border p-3 rounded"
                          required>{{ old('description', $hero->description ?? '') }}</textarea>
            </div>

            <button class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded">
                Save
            </button>
        </form>
    </div>
</x-app-layout>
