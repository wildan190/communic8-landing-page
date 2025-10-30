<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Create Card Service
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    
                    <form method="POST" action="{{ route('card-services.store') }}" enctype="multipart/form-data">
                        @csrf
                        @include('cardservices.form')

                        <button class="mt-6 bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">
                            Save
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
