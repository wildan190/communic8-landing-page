<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Gallery') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="mb-4 bg-green-50 dark:bg-green-900/20 text-green-700 dark:text-green-200 px-4 py-3 rounded-md">
                    {{ session('success') }}
                </div>
            @endif

            <div class="mb-4 flex justify-end">
                <a href="{{ route('galleries.create') }}"
                   class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700">
                    + Tambah Gambar
                </a>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                @forelse($galleries as $gallery)
                    <div class="bg-white dark:bg-gray-800 shadow rounded-lg overflow-hidden">
                        <img src="{{ asset('storage/' . $gallery->upload_picture) }}"
                             alt="Gallery Image"
                             class="w-full h-48 object-cover">
                        <div class="p-4 text-sm text-gray-700 dark:text-gray-300 flex justify-between items-center">
                            <span>{{ $gallery->date->format('d M Y') }}</span>
                            <div class="flex gap-3">
                                <a href="{{ route('galleries.edit', $gallery) }}" class="text-yellow-600 hover:underline">Edit</a>
                                <form action="{{ route('galleries.destroy', $gallery) }}" method="POST" onsubmit="return confirm('Yakin hapus?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="col-span-4 text-center text-gray-500 dark:text-gray-400">Belum ada gambar.</p>
                @endforelse
            </div>

            <div class="mt-6">
                {{ $galleries->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
