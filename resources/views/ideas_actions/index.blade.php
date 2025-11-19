<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Ideas Action
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-semibold">List Ideas Action</h3>
                        <a href="{{ route('ideas-actions.create') }}"
                           class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                            + Create
                        </a>
                    </div>

                    <table class="min-w-full divide-y divide-gray-300 dark:divide-gray-700">
                        <thead class="bg-gray-100 dark:bg-gray-700">
                            <tr>
                                <th class="px-4 py-2 text-left">Name</th>
                                <th class="px-4 py-2 text-left">Description</th>
                                <th class="px-4 py-2 text-left">Image</th>
                                <th class="px-4 py-2 text-left">Portfolio</th>
                                <th class="px-4 py-2 text-left">Action</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">

                            @foreach ($ideas as $idea)
                            <tr>
                                <td class="px-4 py-2">{{ $idea->name }}</td>
                                <td class="px-4 py-2">{{ $idea->description }}</td>
                                <td class="px-4 py-2">
                                    @if($idea->img_upload)
                                        <img src="{{ asset('uploads/ideas/' . $idea->img_upload) }}"
                                             class="h-16 rounded shadow">
                                    @endif
                                </td>
                                <td class="px-4 py-2">
                                    {{ $idea->portfolioDetail->hero_title ?? '-' }}
                                </td>
                                <td class="px-4 py-2">
                                    <a href="{{ route('ideas-actions.edit', $idea->id) }}"
                                       class="px-3 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600">
                                        Edit
                                    </a>

                                    <a href="{{ route('ideas-actions.delete', $idea->id) }}"
                                       class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700 ml-2"
                                       onclick="return confirm('Delete this item?')">
                                        Delete
                                    </a>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
