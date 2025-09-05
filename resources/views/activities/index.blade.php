<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Activity') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- Flash message --}}
            @if (session('success'))
                <div class="mb-4 bg-green-50 dark:bg-green-900/20 text-green-700 dark:text-green-200 px-4 py-3 rounded-md">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    {{-- Header action --}}
                    <div class="mb-4 flex items-center justify-between">
                        <form method="GET" class="flex items-center gap-2">
                            <input
                                type="text"
                                name="q"
                                value="{{ request('q') }}"
                                placeholder="Cari caption…"
                                class="w-64 rounded-md border-gray-300 dark:border-gray-700 
                                       bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100 
                                       focus:border-indigo-500 focus:ring-indigo-500"
                            />
                            <button class="px-3 py-2 rounded-md bg-indigo-600 text-white hover:bg-indigo-700">
                                Cari
                            </button>
                            @if(request()->has('q') && request('q') !== '')
                                <a href="{{ route('activities.index') }}" 
                                   class="text-sm text-gray-600 dark:text-gray-300 hover:underline">
                                    Reset
                                </a>
                            @endif
                        </form>

                        <a href="{{ route('activities.create') }}"
                           class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent 
                                  rounded-md font-semibold text-xs text-white uppercase tracking-widest 
                                  hover:bg-indigo-700 focus:outline-none">
                            + Tambah Activity
                        </a>
                    </div>

                    {{-- Table --}}
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead class="bg-gray-50 dark:bg-gray-900">
                                <tr>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">#</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Caption</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Image</th>
                                    <th class="px-4 py-3 text-center text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                                @forelse($activities as $activity)
                                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-900/40">
                                        <td class="px-4 py-3 text-gray-700 dark:text-gray-300">{{ $loop->iteration }}</td>
                                        <td class="px-4 py-3 text-gray-900 dark:text-gray-100">
                                            {{ $activity->caption }}
                                        </td>
                                        <td class="px-4 py-3">
                                            @if($activity->file_img)
                                                <img src="{{ asset('storage/' . $activity->file_img) }}" 
                                                     class="h-12 rounded shadow">
                                            @else
                                                <span class="text-gray-400 dark:text-gray-500 text-sm">No image</span>
                                            @endif
                                        </td>
                                        <td class="px-4 py-3 text-center">
                                            <div class="inline-flex items-center gap-3">
                                                <a href="{{ route('activities.edit', $activity->id) }}" 
                                                   class="text-yellow-600 dark:text-yellow-400 hover:underline">
                                                    Edit
                                                </a>
                                                <form action="{{ route('activities.destroy', $activity->id) }}" 
                                                      method="POST" 
                                                      onsubmit="return confirm('Yakin ingin hapus?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" 
                                                            class="text-red-600 dark:text-red-400 hover:underline">
                                                        Hapus
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="px-4 py-8 text-center text-gray-500 dark:text-gray-400">
                                            Belum ada activity.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    {{-- Pagination --}}
                    <div class="mt-4">
                        {{ $activities->withQueryString()->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
