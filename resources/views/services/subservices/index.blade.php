<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('SubServices') }}
        </h2>
    </x-slot>

    <div class="py-8 max-w-7xl mx-auto sm:px-6 lg:px-8">

        @if(session('success'))
            <div class="mb-4 bg-green-100 text-green-800 px-4 py-2 rounded-md">
                {{ session('success') }}
            </div>
        @endif

        <div class="flex justify-end mb-4">
            <a href="{{ route('subservices.create') }}" 
               class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700">
                + Add SubService
            </a>
        </div>

        <div class="bg-white dark:bg-gray-800 shadow rounded-lg overflow-hidden">
            <table class="min-w-full">
                <thead class="bg-gray-100 dark:bg-gray-700">
                    <tr>
                        <th class="px-4 py-3 text-left">Service</th>
                        <th class="px-4 py-3 text-left">Name</th>
                        <th class="px-4 py-3 text-left">Picture</th>
                        <th class="px-4 py-3 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($subservices as $subservice)
                        <tr class="border-t">
                            <td class="px-4 py-3">{{ $subservice->service->name ?? 'Unknown Service' }}</td>
                            <td class="px-4 py-3">{{ $subservice->name }}</td>
                            <td class="px-4 py-3">
                                @if($subservice->picture_upload)
                                    <img src="{{ asset('storage/' . $subservice->picture_upload) }}" 
                                         class="h-12 rounded">
                                @endif
                            </td>
                            <td class="px-4 py-3 text-center">
                                <div class="flex gap-3 justify-center">
                                    <a href="{{ route('subservices.edit', $subservice) }}" class="text-yellow-600">Edit</a>
                                    <form action="{{ route('subservices.destroy', $subservice) }}" method="POST" 
                                          onsubmit="return confirm('Are you sure?')">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="text-red-600">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="4" class="text-center py-6 text-gray-500">No SubServices found.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4">{{ $subservices->links() }}</div>
    </div>
</x-app-layout>
