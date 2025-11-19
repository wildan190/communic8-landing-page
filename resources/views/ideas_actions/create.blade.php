<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Create Ideas Action
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <h3 class="text-lg font-semibold mb-4">Add New Ideas Action</h3>

                    <form action="{{ route('ideas-actions.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-4">
                            <label class="block font-medium mb-1">Name</label>
                            <input type="text" name="name"
                                   class="w-full px-3 py-2 rounded bg-gray-100 dark:bg-gray-700 border border-gray-300 dark:border-gray-600">
                        </div>

                        <div class="mb-4">
                            <label class="block font-medium mb-1">Description</label>
                            <textarea name="description"
                                      class="w-full px-3 py-2 rounded bg-gray-100 dark:bg-gray-700 border border-gray-300 dark:border-gray-600"></textarea>
                        </div>

                        <div class="mb-4">
                            <label class="block font-medium mb-1">Portfolio Detail</label>
                            <select name="portfolio_detail_id" class="w-full px-3 py-2 rounded bg-gray-100 dark:bg-gray-700 border border-gray-300 dark:border-gray-600" required>
                                @foreach($portfolioDetails as $p)
                                    <option value="{{ $p->id }}">{{ $p->hero_title }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label class="block font-medium mb-1">Image Upload</label>
                            <input type="file" name="img_upload"
                                   class="w-full bg-gray-100 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded px-3 py-2">
                        </div>

                        <button class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                            Save
                        </button>

                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
