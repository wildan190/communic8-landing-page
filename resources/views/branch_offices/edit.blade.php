<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200">
            {{ __('Edit Branch Office') }}
        </h2>
    </x-slot>

    <div class="py-8 max-w-3xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-sm">
            <form method="POST" action="{{ route('branch-offices.update', $branchOffice) }}" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @method('PUT')
                <div>
                    <label class="block mb-1">Picture</label>
                    @if($branchOffice->picture_upload)
                        <img src="{{ asset('storage/' . $branchOffice->picture_upload) }}" class="h-16 mb-2">
                    @endif
                    <input type="file" name="picture_upload" class="block w-full">
                </div>
                <div>
                    <label class="block mb-1">Name</label>
                    <input type="text" name="name" value="{{ $branchOffice->name }}" class="w-full border rounded-md" required>
                </div>
                <div>
                    <label class="block mb-1">Address</label>
                    <textarea name="address" class="w-full border rounded-md" required>{{ $branchOffice->address }}</textarea>
                </div>
                <div>
                    <label class="block mb-1">Phone</label>
                    <input type="text" name="phone" value="{{ $branchOffice->phone }}" class="w-full border rounded-md">
                </div>
                <div>
                    <button type="submit" class="px-6 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700">
                        Update
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
