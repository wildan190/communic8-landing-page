<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Blog') }}
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

                    <form action="{{ route('blogs.update', $blog->id) }}" method="POST" enctype="multipart/form-data"
                        class="space-y-6">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Judul -->
                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Judul</label>
                                <input type="text" name="title" value="{{ old('title', $blog->title) }}"
                                    class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100 focus:border-indigo-500 focus:ring-indigo-500" />
                            </div>

                            <!-- Kategori -->
                            <div>
                                <label
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Kategori</label>
                                <select name="category"
                                    class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100 focus:border-indigo-500 focus:ring-indigo-500">
                                    <option value="">-- Pilih Kategori --</option>
                                    <option value="Communic8" {{ old('category') == 'Communic8' ? 'selected' : '' }}>
                                        Communic8</option>
                                    <option value="Travel" {{ old('category') == 'Travel' ? 'selected' : '' }}>Travel
                                    </option>
                                    <option value="Sport" {{ old('category') == 'Sport' ? 'selected' : '' }}>Sport
                                    </option>
                                    <option value="Automotive" {{ old('category') == 'Automotive' ? 'selected' : '' }}>
                                        Automotive</option>
                                    <option value="Lifestyle" {{ old('category') == 'Lifestyle' ? 'selected' : '' }}>
                                        Lifestyle</option>
                                    <option value="Politics" {{ old('category') == 'Politics' ? 'selected' : '' }}>
                                        Politics</option>
                                    <option value="Economy" {{ old('category') == 'Economy' ? 'selected' : '' }}>
                                        Economy</option>
                                </select>
                            </div>

                            <!-- Tanggal -->
                            <div>
                                <label
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Tanggal</label>
                                <input type="date" name="date" value="{{ old('date', $blog->date) }}"
                                    class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100 focus:border-indigo-500 focus:ring-indigo-500" />
                            </div>

                            <!-- Status -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Status</label>
                                <select name="status"
                                    class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100 focus:border-indigo-500 focus:ring-indigo-500">
                                    <option value="draft"
                                        {{ old('status', $blog->status) === 'draft' ? 'selected' : '' }}>Draft</option>
                                    <option value="published"
                                        {{ old('status', $blog->status) === 'published' ? 'selected' : '' }}>Published
                                    </option>
                                    <option value="archived"
                                        {{ old('status', $blog->status) === 'archived' ? 'selected' : '' }}>Archived
                                    </option>
                                </select>
                            </div>

                            <!-- Highlighted -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Highlighted</label>
                                <input type="checkbox" name="highlighted" value="1" {{ old('highlighted', $blog->highlighted) ? 'checked' : '' }}
                                    class="mt-1 rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:border-gray-700 dark:bg-gray-900 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" />
                            </div>

                            <!-- Keywords -->
                            <div>
                                <label
                                    class="block text-sm font-medium text-gray-700 dark:text-gray-300">Keywords</label>
                                <input type="text" name="keywords" value="{{ old('keywords', $blog->keywords) }}"
                                    class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100 focus:border-indigo-500 focus:ring-indigo-500" />
                            </div>

                            <!-- Headline Image -->
                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Headline
                                    Image</label>
                                <input type="file" name="headline_img"
                                    class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100 focus:border-indigo-500 focus:ring-indigo-500" />
                                @if ($blog->headline_img)
                                    <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">Gambar saat ini:</p>
                                    <img src="{{ asset('storage/' . $blog->headline_img) }}"
                                        alt="{{ $blog->headline_img_alt }}" class="mt-1 h-32 rounded-md object-cover">
                                @endif
                            </div>

                            <!-- Headline Alt -->
                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Headline Alt
                                    Text</label>
                                <input type="text" name="headline_img_alt"
                                    value="{{ old('headline_img_alt', $blog->headline_img_alt) }}"
                                    class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100 focus:border-indigo-500 focus:ring-indigo-500" />
                            </div>

                            <!-- Konten dengan Quill -->
                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Konten</label>
                                <div id="editor"
                                    class="mt-1 min-h-[250px] mb-6 rounded-md border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100">
                                </div>
                                <input type="hidden" name="content" id="content"
                                    value="{{ old('content', $blog->content) }}">
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
                                Perbarui Blog
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
                        [{
                            header: [1, 2, 3, false]
                        }],
                        ['bold', 'italic', 'underline'],
                        ['link', 'blockquote', 'code-block', 'image'],
                        [{
                            list: 'ordered'
                        }, {
                            list: 'bullet'
                        }],
                        [{
                            align: []
                        }],
                        ['clean']
                    ]
                }
            });

            // isi editor dari old value atau konten blog
            let initialContent = {!! json_encode(old('content', $blog->content)) !!};
            if (initialContent) {
                quill.root.innerHTML = initialContent;
            }

            // sinkronisasi realtime ke hidden input
            quill.on('text-change', function() {
                const html = quill.root.innerHTML;
                document.querySelector('#content').value = html;
                console.log('Quill content on text-change:', html);
            });

            // pastikan hidden input terisi sebelum submit
            document.querySelector('form').addEventListener('submit', function() {
                const html = quill.root.innerHTML;
                document.querySelector('#content').value = html;
                console.log('Quill content on form submit:', html);
            });

            // handle image upload
            quill.getModule('toolbar').addHandler('image', function() {
                selectLocalImage();
            });

            // handle drag and drop
            quill.root.addEventListener('drop', function(e) {
                e.preventDefault();
                if (e.dataTransfer && e.dataTransfer.files && e.dataTransfer.files.length) {
                    const file = e.dataTransfer.files[0];
                    if (/^image\//.test(file.type)) {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            const range = quill.getSelection(true);
                            quill.insertEmbed(range.index, 'image', e.target.result);
                            quill.setSelection(range.index + 1);
                        };
                        reader.readAsDataURL(file);
                    }
                }
            });

            function selectLocalImage() {
                const input = document.createElement('input');
                input.setAttribute('type', 'file');
                input.setAttribute('accept', 'image/*');
                input.click();

                input.onchange = function() {
                    const file = input.files[0];
                    if (/^image\//.test(file.type)) {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            const range = quill.getSelection(true);
                            quill.insertEmbed(range.index, 'image', e.target.result);
                            quill.setSelection(range.index + 1);
                        };
                        reader.readAsDataURL(file);
                    } else {
                        console.warn('You could only upload images.');
                    }
                };
            }
        });
    </script>
</x-app-layout>
