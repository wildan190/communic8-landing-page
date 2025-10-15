<x-app-layout title="About List">
    <div class="max-w-6xl mx-auto py-10 px-6">

        {{-- Header --}}
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-2xl font-semibold text-gray-800 dark:text-gray-100">Daftar About</h1>
            <a href="{{ route('admin.about.create') }}"
                class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-lg transition">
                + Tambah
            </a>
        </div>

        {{-- Flash Message --}}
        @if (session('success'))
            <div class="mb-6 p-4 rounded-md bg-green-100 text-green-800 border border-green-300">
                {{ session('success') }}
            </div>
        @endif

        {{-- Table --}}
        <div class="overflow-x-auto bg-white dark:bg-gray-800 shadow rounded-lg">
            <table class="min-w-full border-collapse">
                <thead>
                    <tr
                        class="bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-200 text-sm uppercase tracking-wide">
                        <th class="p-3 text-left">Gambar</th>
                        <th class="p-3 text-left">Judul</th>
                        <th class="p-3 text-left">Deskripsi</th>
                        <th class="p-3 text-center w-32">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                    @forelse ($abouts as $about)
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                            {{-- Gambar --}}
                            <td class="p-3">
                                @if ($about->img && file_exists(public_path('uploads/about/' . $about->img)))
                                    <img src="{{ asset('uploads/about/' . $about->img) }}" 
                                         alt="{{ $about->title }}"
                                         class="w-16 h-16 object-cover rounded-md shadow-sm">
                                @else
                                    <span class="text-gray-400 italic text-sm">Tidak ada gambar</span>
                                @endif
                            </td>

                            {{-- Judul --}}
                            <td class="p-3 font-medium text-gray-800 dark:text-gray-100">
                                {{ $about->title }}
                            </td>

                            {{-- Deskripsi --}}
                            <td class="p-3 text-gray-600 dark:text-gray-300">
                                {{ Str::limit($about->description, 80) }}
                            </td>

                            {{-- Aksi --}}
                            <td class="p-3 text-center">
                                <div class="flex justify-center space-x-2">
                                    <a href="{{ route('admin.about.edit', $about->id) }}"
                                        class="px-3 py-1.5 bg-yellow-400 hover:bg-yellow-500 text-white text-xs rounded-md transition">
                                        Edit
                                    </a>
                                    <form action="{{ route('admin.about.destroy', $about->id) }}" method="POST"
                                          onsubmit="return confirm('Yakin ingin hapus data ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="px-3 py-1.5 bg-red-600 hover:bg-red-700 text-white text-xs rounded-md transition">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="p-6 text-center text-gray-500 dark:text-gray-300">
                                Tidak ada data About.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
