<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Website Information') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="mb-6 p-4 rounded-lg bg-green-100 dark:bg-green-900/40 text-green-700 dark:text-green-200 shadow">
                    <i class="fa-solid fa-circle-check mr-2"></i> {{ session('success') }}
                </div>
            @endif

            <div class="bg-white dark:bg-gray-800 shadow-xl sm:rounded-2xl p-8">
                @if ($webInfo)
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        {{-- Phone --}}
                        <div class="flex items-start space-x-3">
                            <div class="p-3 rounded-full bg-indigo-100 dark:bg-indigo-900">
                                <i class="fa-solid fa-phone text-indigo-600 dark:text-indigo-300"></i>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500 dark:text-gray-400">Phone</p>
                                <p class="font-medium text-gray-800 dark:text-gray-100">{{ $webInfo->phone }}</p>
                            </div>
                        </div>

                        {{-- Email --}}
                        <div class="flex items-start space-x-3">
                            <div class="p-3 rounded-full bg-indigo-100 dark:bg-indigo-900">
                                <i class="fa-solid fa-envelope text-indigo-600 dark:text-indigo-300"></i>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500 dark:text-gray-400">Email</p>
                                <p class="font-medium text-gray-800 dark:text-gray-100">{{ $webInfo->email }}</p>
                            </div>
                        </div>

                        {{-- Address --}}
                        <div class="flex items-start space-x-3 md:col-span-2">
                            <div class="p-3 rounded-full bg-indigo-100 dark:bg-indigo-900">
                                <i class="fa-solid fa-location-dot text-indigo-600 dark:text-indigo-300"></i>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500 dark:text-gray-400">Address</p>
                                <p class="font-medium text-gray-800 dark:text-gray-100">{{ $webInfo->address }}</p>
                            </div>
                        </div>

                        {{-- Facebook --}}
                        <div class="flex items-start space-x-3">
                            <div class="p-3 rounded-full bg-blue-100 dark:bg-blue-900">
                                <i class="fa-brands fa-facebook text-blue-600 dark:text-blue-300"></i>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500 dark:text-gray-400">Facebook</p>
                                <a href="{{ $webInfo->facebook }}" target="_blank"
                                   class="text-indigo-600 dark:text-indigo-400 hover:underline">
                                    {{ $webInfo->facebook }}
                                </a>
                            </div>
                        </div>

                        {{-- Instagram --}}
                        <div class="flex items-start space-x-3">
                            <div class="p-3 rounded-full bg-pink-100 dark:bg-pink-900">
                                <i class="fa-brands fa-instagram text-pink-600 dark:text-pink-300"></i>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500 dark:text-gray-400">Instagram</p>
                                <a href="{{ $webInfo->instagram }}" target="_blank"
                                   class="text-indigo-600 dark:text-indigo-400 hover:underline">
                                    {{ $webInfo->instagram }}
                                </a>
                            </div>
                        </div>

                        {{-- TikTok --}}
                        <div class="flex items-start space-x-3">
                            <div class="p-3 rounded-full bg-gray-200 dark:bg-gray-700">
                                <i class="fa-brands fa-tiktok text-gray-800 dark:text-gray-100"></i>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500 dark:text-gray-400">TikTok</p>
                                <a href="{{ $webInfo->tiktok }}" target="_blank"
                                   class="text-indigo-600 dark:text-indigo-400 hover:underline">
                                    {{ $webInfo->tiktok }}
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="mt-8">
                        <a href="{{ route('web_information.edit', $webInfo) }}"
                           class="inline-flex items-center px-5 py-2.5 bg-yellow-500 hover:bg-yellow-600 text-white font-medium rounded-lg shadow transition">
                            <i class="fa-solid fa-pen-to-square mr-2"></i> Edit Information
                        </a>
                    </div>
                @else
                    <div class="text-center py-10">
                        <p class="text-gray-500 dark:text-gray-400">No information added yet.</p>
                        <a href="{{ route('web_information.create') }}"
                           class="mt-6 inline-block px-5 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white font-medium rounded-lg shadow transition">
                            <i class="fa-solid fa-plus mr-2"></i> Add Information
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
