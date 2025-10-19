<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Hero About Content') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    @if (session('success'))
                        <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('admin.heroes-about.update') }}" enctype="multipart/form-data">
                        @csrf

                        <!-- Title -->
                        <div>
                            <x-input-label for="title" :value="__('Title')" />
                            <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title', $heroAbout->title)" autofocus />
                            <x-input-error :messages="$errors->get('title')" class="mt-2" />
                        </div>

                        <!-- About Us -->
                        <div class="mt-4">
                            <x-input-label for="about_us" :value="__('About Us')" />
                            <textarea id="about_us" name="about_us" class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">{{ old('about_us', $heroAbout->about_us) }}</textarea>
                            <x-input-error :messages="$errors->get('about_us')" class="mt-2" />
                        </div>

                        <!-- Box Image -->
                        <div class="mt-4">
                            <x-input-label for="box_img" :value="__('Box Image')" />
                            <input id="box_img" class="block mt-1 w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" type="file" name="box_img" />
                            <x-input-error :messages="$errors->get('box_img')" class="mt-2" />
                            @if ($heroAbout->box_img)
                                <div class="mt-2">
                                    <img src="{{ asset('storage/' . $heroAbout->box_img) }}" alt="Box Image" class="h-24 w-auto rounded-md bg-gray-200 dark:bg-gray-700 p-1">
                                </div>
                            @endif
                        </div>

                        <hr class="my-6 border-gray-300 dark:border-gray-700">

                        <!-- Philosophy 1 -->
                        <div class="mt-4">
                            <x-input-label for="philosophy_title_1" :value="__('Philosophy Title 1')" />
                            <x-text-input id="philosophy_title_1" class="block mt-1 w-full" type="text" name="philosophy_title_1" :value="old('philosophy_title_1', $heroAbout->philosophy_title_1)" />
                            <x-input-error :messages="$errors->get('philosophy_title_1')" class="mt-2" />
                        </div>
                        <div class="mt-4">
                            <x-input-label for="content_philosophy_title_1" :value="__('Philosophy Content 1')" />
                            <textarea id="content_philosophy_title_1" name="content_philosophy_title_1" class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">{{ old('content_philosophy_title_1', $heroAbout->content_philosophy_title_1) }}</textarea>
                            <x-input-error :messages="$errors->get('content_philosophy_title_1')" class="mt-2" />
                        </div>

                        <!-- Philosophy 2 -->
                        <div class="mt-4">
                            <x-input-label for="philosophy_title_2" :value="__('Philosophy Title 2')" />
                            <x-text-input id="philosophy_title_2" class="block mt-1 w-full" type="text" name="philosophy_title_2" :value="old('philosophy_title_2', $heroAbout->philosophy_title_2)" />
                            <x-input-error :messages="$errors->get('philosophy_title_2')" class="mt-2" />
                        </div>
                        <div class="mt-4">
                            <x-input-label for="content_philosophy_title_2" :value="__('Philosophy Content 2')" />
                            <textarea id="content_philosophy_title_2" name="content_philosophy_title_2" class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">{{ old('content_philosophy_title_2', $heroAbout->content_philosophy_title_2) }}</textarea>
                            <x-input-error :messages="$errors->get('content_philosophy_title_2')" class="mt-2" />
                        </div>

                        <!-- Philosophy 3 -->
                        <div class="mt-4">
                            <x-input-label for="philosophy_title_3" :value="__('Philosophy Title 3')" />
                            <x-text-input id="philosophy_title_3" class="block mt-1 w-full" type="text" name="philosophy_title_3" :value="old('philosophy_title_3', $heroAbout->philosophy_title_3)" />
                            <x-input-error :messages="$errors->get('philosophy_title_3')" class="mt-2" />
                        </div>
                        <div class="mt-4">
                            <x-input-label for="content_philosophy_title_3" :value="__('Philosophy Content 3')" />
                            <textarea id="content_philosophy_title_3" name="content_philosophy_title_3" class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">{{ old('content_philosophy_title_3', $heroAbout->content_philosophy_title_3) }}</textarea>
                            <x-input-error :messages="$errors->get('content_philosophy_title_3')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ml-4">
                                {{ __('Update') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>