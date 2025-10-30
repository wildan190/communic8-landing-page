<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Card Services
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <div class="flex justify-between mb-4">
                        <h3 class="text-lg font-semibold">List Card Services</h3>
                        <a href="{{ route('card-services.create') }}" 
                           class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">
                            + Add New
                        </a>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-300 dark:divide-gray-700">
                            <thead>
                            <tr class="bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-200">
                                <th class="px-3 py-2 text-left text-sm">Image</th>
                                <th class="px-3 py-2 text-left text-sm">Title</th>
                                <th class="px-3 py-2 text-left text-sm">Route</th>
                                <th class="px-3 py-2 text-right text-sm">Actions</th>
                            </tr>
                            </thead>
                            <tbody class="divide-y dark:divide-gray-700">
                            @foreach($cards as $item)
                                <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                                    <td class="px-3 py-2">
                                        <img src="{{ asset('storage/'.$item->img) }}" 
                                             class="h-12 w-12 rounded object-cover">
                                    </td>
                                    <td class="px-3 py-2">{{ $item->title_en }}</td>
                                    <td class="px-3 py-2 text-gray-500 text-sm">{{ $item->route_name }}</td>
                                    <td class="px-3 py-2 text-right flex justify-end space-x-2">

                                        <a href="{{ route('card-services.edit', $item->id) }}"
                                           class="text-blue-600 hover:text-blue-800 dark:text-blue-400">
                                            Edit
                                        </a>

                                        <form action="{{ route('card-services.destroy',$item->id) }}" method="POST">
                                            @csrf @method('DELETE')
                                            <button onclick="return confirm('Yakin hapus?')"
                                                    class="text-red-600 hover:text-red-800 dark:text-red-400">
                                                Delete
                                            </button>
                                        </form>

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
