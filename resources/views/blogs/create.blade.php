<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tambah Blog') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if ($errors->any())
                        <div
                            class="mb-4 rounded-md border border-red-300 dark:border-red-800 bg-red-50 dark:bg-red-900/30 p-4 text-red-700 dark:text-red-200">
                            <div class="font-semibold mb-2">Periksa kembali input Anda:</div>
                            <ul class="list-disc ms-5">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('blogs.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                        @csrf

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Judul -->
                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Judul</label>
                                <input type="text" name="title" value="{{ old('title') }}"
                                    class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100 focus:border-indigo-500 focus:ring-indigo-500" />
                            </div>

                            <!-- Kategori -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Kategori</label>
                                <input type="text" name="category" value="{{ old('category') }}"
                                    class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100 focus:border-indigo-500 focus:ring-indigo-500" />
                            </div>

                            <!-- Tanggal -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Tanggal</label>
                                <input type="date" name="date" value="{{ old('date') }}"
                                    class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100 focus:border-indigo-500 focus:ring-indigo-500" />
                            </div>

                            <!-- Status -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Status</label>
                                <select name="status"
                                    class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100 focus:border-indigo-500 focus:ring-indigo-500">
                                    <option value="draft" {{ old('status') === 'draft' ? 'selected' : '' }}>Draft</option>
                                    <option value="published" {{ old('status') === 'published' ? 'selected' : '' }}>Published</option>
                                    <option value="archived" {{ old('status') === 'archived' ? 'selected' : '' }}>Archived</option>
                                </select>
                            </div>

                            <!-- Keywords -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Keywords</label>
                                <input type="text" name="keywords" value="{{ old('keywords') }}"
                                    class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100 focus:border-indigo-500 focus:ring-indigo-500" />
                            </div>

                            <!-- Headline Image -->
                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Headline Image</label>
                                <input type="file" name="headline_img"
                                    class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100 focus:border-indigo-500 focus:ring-indigo-500" />
                            </div>

                            <!-- Headline Alt -->
                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Headline Alt Text</label>
                                <input type="text" name="headline_img_alt" value="{{ old('headline_img_alt') }}"
                                    class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100 focus:border-indigo-500 focus:ring-indigo-500" />
                            </div>

                            <!-- Konten dengan Quill -->
                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Konten</label>
                                <div id="editor"
                                    class="mt-1 min-h-[250px] mb-6 rounded-md border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100">
                                </div>
                                <input type="hidden" name="content" id="content" value="{{ old('content') }}">
                            </div>
                        </div>

                        <br />

                        <!-- Tombol aksi -->
                        <div class="flex items-center justify-end gap-3 pt-6">
                            <a href="{{ route('blogs.index') }}"
                                class="inline-flex items-center px-4 py-2 rounded-md border border-gray-300 dark:border-gray-700 text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-900">
                                Batal
                            </a>
                            <button type="submit"
                                class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-white hover:bg-indigo-700 focus:outline-none">
                                Simpan Blog
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- QuillJS --}}
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <style>
        #editor .ql-editor {
            min-height: 200px;
        }
        .ql-toolbar {
            border-radius: 0.5rem 0.5rem 0 0;
        }
        .ql-container {
            border-radius: 0 0 0.5rem 0.5rem;
        }
    </style>
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        var quill = new Quill('#editor', {
            theme: 'snow',
            placeholder: 'Tulis konten blog di sini...',
            modules: {
                toolbar: [
                    [{ header: [1, 2, 3, false] }],
                    ['bold', 'italic', 'underline'],
                    ['link', 'blockquote', 'code-block', 'image'],
                    [{ list: 'ordered' }, { list: 'bullet' }],
                    [{ align: [] }],
                    ['clean']
                ]
            }
        });

        // isi editor dari old value
        let oldContent = {!! json_encode(old('content')) !!};
        if (oldContent) {
            quill.root.innerHTML = oldContent;
        }

        // sinkronisasi realtime ke hidden input
        quill.on('text-change', function() {
            document.querySelector('#content').value = quill.root.innerHTML;
        });

        // pastikan hidden input terisi sebelum submit
        document.querySelector('form').addEventListener('submit', function() {
            document.querySelector('#content').value = quill.root.innerHTML;
        });
    });
</script>

</x-app-layout>
