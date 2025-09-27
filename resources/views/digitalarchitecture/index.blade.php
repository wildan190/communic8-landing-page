<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Digital Architecture Content
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="mb-4 p-4 bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-200 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white dark:bg-gray-800 shadow sm:rounded-lg p-6">
                <form action="{{ route('digital-architecture-content.save') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    {{-- Head Image --}}
                    <div>
                        <label class="block font-medium text-gray-700 dark:text-gray-300">Head Image</label>
                        <input type="file" name="head_img" class="mt-1 block w-full text-sm text-gray-900 dark:text-gray-300">
                        @if ($content && $content->head_img)
                            <img src="{{ Storage::url($content->head_img) }}" class="mt-2 w-48 rounded">
                        @endif
                    </div>

                    {{-- Services Image --}}
                    <div class="mt-4">
                        <label class="block font-medium text-gray-700 dark:text-gray-300">Services Image</label>
                        <input type="file" name="img_services" class="mt-1 block w-full text-sm text-gray-900 dark:text-gray-300">
                        @if ($content && $content->img_services)
                            <img src="{{ Storage::url($content->img_services) }}" class="mt-2 w-48 rounded">
                        @endif
                    </div>

                    @for ($i = 1; $i <= 4; $i++)
                        <div class="mt-6">
                            <label class="block text-gray-700 dark:text-gray-300">Title {{ $i }}</label>
                            <input type="text" name="title{{ $i }}" value="{{ $content?->{'title'.$i} }}"
                                   class="mt-1 block w-full rounded-md bg-gray-100 dark:bg-gray-700 text-gray-900 dark:text-gray-100">

                            <label class="block mt-2 text-gray-700 dark:text-gray-300">Value {{ $i }}</label>
                            <textarea name="value_title{{ $i }}" rows="3"
                                      class="mt-1 block w-full rounded-md bg-gray-100 dark:bg-gray-700 text-gray-900 dark:text-gray-100">{{ $content?->{'value_title'.$i} }}</textarea>
                        </div>
                    @endfor

                    <div class="mt-6 text-right">
                        <x-primary-button>{{ $content ? 'Update' : 'Save' }}</x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
