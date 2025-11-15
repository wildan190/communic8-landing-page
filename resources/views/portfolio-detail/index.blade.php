<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Portfolio Detail') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">List Portfolio Details</h3>
                    <a href="{{ route('portfolio-detail.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">+ Add New</a>
                </div>

                <table class="min-w-full text-sm text-gray-800 dark:text-gray-200">
                    <thead>
                        <tr class="border-b border-gray-200 dark:border-gray-700">
                            <th class="py-2 text-left">Hero Title</th>
                            <th class="py-2 text-left">Client ID</th>
                            <th class="py-2 text-left">Delivery</th>
                            <th class="py-2 text-left">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($portfolioDetails as $detail)
                            <tr class="border-b border-gray-200 dark:border-gray-700">
                                <td class="py-2">{{ $detail->hero_title }}</td>
                                <td class="py-2">{{ $detail->client_id ?? '-' }}</td>
                                <td class="py-2">{{ $detail->delivery ?? '-' }}</td>
                                <td class="py-2 flex space-x-2">
                                    <a href="{{ route('portfolio-detail.edit', $detail->id) }}" class="bg-yellow-500 text-white px-3 py-1 rounded-md hover:bg-yellow-600">Edit</a>
                                    <form action="{{ route('portfolio-detail.destroy', $detail->id) }}" method="POST" onsubmit="return confirm('Delete this item?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-600 text-white px-3 py-1 rounded-md hover:bg-red-700">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr><td colspan="4" class="py-4 text-center text-gray-500">No portfolio details found.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
