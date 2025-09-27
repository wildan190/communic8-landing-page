<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Project') }}
        </h2>
    </x-slot>

    <div class="py-8 max-w-3xl mx-auto sm:px-6 lg:px-8">
        <form method="POST" action="{{ route('projects.update', $project) }}" enctype="multipart/form-data"
            class="space-y-6 bg-white dark:bg-gray-800 p-6 rounded-lg shadow">
            @csrf @method('PUT')

            {{-- if error --}}
            @if ($errors->any())
                <div class="mb-4 bg-red-100 text-red-800 px-4 py-2 rounded-md">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div>
                <label class="block font-medium">Name</label>
                <input type="text" name="name" value="{{ old('name', $project->name) }}" required
                    class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700">
            </div>

            <div>
                <label class="block font-medium">Client</label>
                <input type="text" name="client" value="{{ old('client', $project->client) }}"
                    class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700">
            </div>

            <div>
                <label class="block font-medium">Project Image</label>
                @if ($project->project_img)
                    <img src="{{ asset('storage/' . $project->project_img) }}" class="h-20 mb-2 rounded">
                @endif
                <input type="file" name="project_img" class="mt-1 block w-full text-sm text-gray-500">
            </div>

            <div>
                <label class="block font-medium">Project URL</label>
                <input type="url" name="project_url" value="{{ old('project_url', $project->project_url) }}"
                    class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700">
            </div>

            <div class="mt-4">
                <label class="inline-flex items-center">
                    <input type="checkbox" name="is_highlighted" value="1" class="form-checkbox"
                        {{ old('is_highlighted', $project->is_highlighted ?? false) ? 'checked' : '' }}>
                    <span class="ml-2 text-gray-700 dark:text-gray-300">Highlight Project</span>
                </label>
                @error('is_highlighted')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-end gap-4">
                <a href="{{ route('projects.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded-md">Cancel</a>
                <button type="submit"
                    class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700">Update</button>
            </div>

        </form>
    </div>
</x-app-layout>
