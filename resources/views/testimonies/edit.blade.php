<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Testimoni') }}
        </h2>
    </x-slot>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('testimonies.update', $testimoni) }}" method="POST" enctype="multipart/form-data" onsubmit="return confirmSave(this)">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-200">Nama</label>
                        <input type="text" name="name" value="{{ old('name', $testimoni->name) }}" class="w-full rounded-md border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-200">Jabatan</label>
                        <input type="text" name="title" value="{{ old('title', $testimoni->title) }}" class="w-full rounded-md border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-200">Perusahaan</label>
                        <input type="text" name="company" value="{{ old('company', $testimoni->company) }}" class="w-full rounded-md border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100">
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-200">Pesan</label>
                        <textarea name="message" rows="4" class="w-full rounded-md border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100" required>{{ old('message', $testimoni->message) }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-200">Foto Saat Ini</label>
                        @if($testimoni->photo)
                            <img src="{{ asset('storage/'.$testimoni->photo) }}" class="w-32 h-32 object-cover mb-2 rounded-md">
                        @else
                            <p class="text-gray-500 dark:text-gray-400 text-sm">Tidak ada foto.</p>
                        @endif
                        <label class="block text-gray-700 dark:text-gray-200 mt-2">Ganti Foto</label>
                        <input type="file" name="photo">
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-200">Foto Cover Saat Ini</label>
                        @if($testimoni->photo_cover)
                            <img src="{{ asset('storage/'.$testimoni->photo_cover) }}" class="w-32 h-32 object-cover mb-2 rounded-md">
                        @else
                            <p class="text-gray-500 dark:text-gray-400 text-sm">Tidak ada foto cover.</p>
                        @endif
                        <label class="block text-gray-700 dark:text-gray-200 mt-2">Ganti Foto Cover</label>
                        <input type="file" name="photo_cover">
                    </div>

                    <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700">Simpan Perubahan</button>
                    <a href="{{ route('testimonies.index') }}" class="px-4 py-2 ml-2 bg-gray-500 text-white rounded-md hover:bg-gray-600">Kembali</a>
                </form>
            </div>
        </div>
    </div>

    <script>
        function confirmSave(form) {
            event.preventDefault();
            Swal.fire({
                title: 'Simpan perubahan testimoni ini?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Simpan',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if(result.isConfirmed){
                    form.submit();
                }
            });
            return false;
        }
    </script>
</x-app-layout>
