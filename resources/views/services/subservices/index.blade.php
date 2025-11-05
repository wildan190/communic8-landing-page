<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('SubServices') }}
        </h2>
    </x-slot>

    <div class="py-8 max-w-7xl mx-auto sm:px-6 lg:px-8">

        @if(session('success'))
            <div class="mb-4 bg-green-100 dark:bg-green-800 text-green-800 dark:text-green-100 px-4 py-2 rounded-md">
                {{ session('success') }}
            </div>
        @endif

        <div class="flex justify-end mb-4">
            <a href="{{ route('subservices.create') }}" 
               class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 dark:bg-indigo-500 dark:hover:bg-indigo-600">
                + Add SubService
            </a>
        </div>

        <div class="bg-white dark:bg-gray-800 shadow rounded-lg overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                <thead class="bg-gray-100 dark:bg-gray-900">
                    <tr>
                        <th class="px-4 py-3 text-left text-gray-700 dark:text-gray-300">Service</th>
                        <th class="px-4 py-3 text-left text-gray-700 dark:text-gray-300">Name</th>
                        <th class="px-4 py-3 text-left text-gray-700 dark:text-gray-300">Picture</th>
                        <th class="px-4 py-3 text-center text-gray-700 dark:text-gray-300">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                    @forelse($subservices as $subservice)
                        <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                            <td class="px-4 py-3 text-gray-800 dark:text-gray-200">
                                {{ $subservice->service->name ?? 'Unknown Service' }}
                            </td>
                            <td class="px-4 py-3 text-gray-800 dark:text-gray-200">
                                {{ $subservice->name }}
                            </td>
                            <td class="px-4 py-3">
                                @if($subservice->picture_upload)
                                    <img src="{{ asset('storage/' . $subservice->picture_upload) }}" 
                                         class="h-12 rounded object-cover">
                                @else
                                    <span class="text-gray-500 dark:text-gray-400">No Image</span>
                                @endif
                            </td>
                            <td class="px-4 py-3 text-center">
                                <div class="flex gap-3 justify-center">
                                    <a href="{{ route('subservices.edit', $subservice) }}" 
                                       class="text-yellow-600 dark:text-yellow-400 hover:underline">
                                        Edit
                                    </a>

                                    <form action="{{ route('subservices.destroy', $subservice) }}" method="POST"
                                          onsubmit="return confirm('Are you sure?')">
                                        @csrf @method('DELETE')
                                        <button type="submit" 
                                                class="text-red-600 dark:text-red-400 hover:underline">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4"
                                class="text-center py-6 text-gray-500 dark:text-gray-400">
                                No SubServices found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4">{{ $subservices->links() }}</div>
    </div>
</x-app-layout>
