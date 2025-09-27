<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Projects') }}
        </h2>
    </x-slot>

    <div class="py-8 max-w-7xl mx-auto sm:px-6 lg:px-8">
        @if (session('success'))
            <div class="mb-4 bg-green-100 text-green-800 px-4 py-2 rounded-md">
                {{ session('success') }}
            </div>
        @endif

        <div class="flex justify-end mb-4">
            <a href="{{ route('projects.create') }}"
                class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700">
                + Add Project
            </a>
        </div>

        <div class="bg-white dark:bg-gray-800 shadow rounded-lg overflow-hidden">
            <table class="min-w-full">
                <thead class="bg-gray-100 dark:bg-gray-700">
                    <tr>
                        <th class="px-4 py-3 text-left">Name</th>
                        <th class="px-4 py-3 text-left">Client</th>
                        <th class="px-4 py-3 text-left">Image</th>
                        <th class="px-4 py-3 text-left">URL</th>
                        <th class="px-4 py-3 text-center">Highlighted</th>
                        <th class="px-4 py-3 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($projects as $project)
                        <tr class="border-t">
                            <td class="px-4 py-3">{{ $project->name }}</td>
                            <td class="px-4 py-3">{{ $project->client }}</td>
                            <td class="px-4 py-3">
                                @if ($project->project_img)
                                    <img src="{{ asset('storage/' . $project->project_img) }}" class="h-12 rounded">
                                @endif
                            </td>
                            <td class="px-4 py-3">
                                @if ($project->project_url)
                                    <a href="{{ $project->project_url }}" target="_blank"
                                        class="text-indigo-600 hover:underline">
                                        Link
                                    </a>
                                @endif
                            </td>
                            <td class="px-4 py-3 text-center">
                                @if ($project->is_highlighted)
                                    <span
                                        class="bg-yellow-200 text-yellow-800 px-2 py-1 rounded-full text-sm">Yes</span>
                                @else
                                    <span class="text-gray-400">No</span>
                                @endif
                            </td>
                            <td class="px-4 py-3 text-center">
                                <div class="flex gap-3 justify-center">
                                    <a href="{{ route('projects.edit', $project) }}" class="text-yellow-600">Edit</a>
                                    <form action="{{ route('projects.destroy', $project) }}" method="POST"
                                        onsubmit="return confirm('Are you sure?')">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="text-red-600">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-6 text-gray-500">No projects found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4">{{ $projects->links() }}</div>
    </div>
</x-app-layout>
