<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200">
            {{ __('Branch Offices') }}
        </h2>
    </x-slot>

    <div class="py-8 max-w-7xl mx-auto sm:px-6 lg:px-8">
        @if(session('success'))
            <div class="mb-4 bg-green-100 dark:bg-green-800 text-green-800 dark:text-green-100 px-4 py-3 rounded-md">
                {{ session('success') }}
            </div>
        @endif

        <div class="mb-4 flex justify-end">
            <a href="{{ route('branch-offices.create') }}"
               class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 dark:bg-indigo-500 dark:hover:bg-indigo-600">
                + Add Branch Office
            </a>
        </div>

        <div class="bg-white dark:bg-gray-800 shadow-sm rounded-lg p-6">
            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                <thead class="bg-gray-50 dark:bg-gray-900">
                    <tr>
                        <th class="px-4 py-2 text-gray-700 dark:text-gray-300">Logo</th>
                        <th class="px-4 py-2 text-gray-700 dark:text-gray-300">Name</th>
                        <th class="px-4 py-2 text-gray-700 dark:text-gray-300">Address</th>
                        <th class="px-4 py-2 text-gray-700 dark:text-gray-300">Phone</th>
                        <th class="px-4 py-2 text-center text-gray-700 dark:text-gray-300">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                    @forelse($branches as $branch)
                        <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                            <td class="px-4 py-2">
                                @if($branch->picture_upload)
                                    <img src="{{ asset('storage/' . $branch->picture_upload) }}" class="h-12 w-12 object-cover rounded-full">
                                @else
                                    <span class="text-gray-500 dark:text-gray-400">No Image</span>
                                @endif
                            </td>
                            <td class="px-4 py-2 text-gray-800 dark:text-gray-200">{{ $branch->name }}</td>
                            <td class="px-4 py-2 text-gray-800 dark:text-gray-200">{{ $branch->address }}</td>
                            <td class="px-4 py-2 text-gray-800 dark:text-gray-200">{{ $branch->phone ?? '-' }}</td>
                            <td class="px-4 py-2 text-center">
                                <a href="{{ route('branch-offices.edit', $branch) }}" class="text-yellow-600 dark:text-yellow-400 hover:underline">
                                    Edit
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-4 py-6 text-center text-gray-500 dark:text-gray-400">
                                No branch offices found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="mt-4">{{ $branches->links() }}</div>
        </div>
    </div>
</x-app-layout>
