<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Detail Pesan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 space-y-6 text-gray-800 dark:text-gray-200">

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <p><span class="font-semibold">Name:</span> {{ $message->name }}</p>
                        <p><span class="font-semibold">Company:</span> {{ $message->company }}</p>
                        <p><span class="font-semibold">Phone:</span> {{ $message->phone }}</p>
                        <p><span class="font-semibold">Industry:</span> {{ $message->industry }}</p>
                        <p><span class="font-semibold">Service:</span> {{ $message->services }}</p>
                        <p><span class="font-semibold">Find us:</span> {{ $message->find_us }}</p>
                        <p><span class="font-semibold">Area:</span>
                            @switch($message->area)
                                @case('1') Jakarta @break
                                @case('2') Malaysia @break
                                @case('3') Singapore @break
                                @case('4') China @break
                                @default -
                            @endswitch
                        </p>
                    </div>

                    <div>
                        <span class="font-semibold">Message:</span>
                        <div class="mt-2 p-4 bg-gray-50 dark:bg-gray-900 rounded">
                            {{ $message->message }}
                        </div>
                    </div>

                    <div class="flex justify-end gap-3">
                        <a href="{{ route('messages.index') }}"
                           class="px-4 py-2 bg-gray-600 text-white rounded-md hover:bg-gray-700">
                            Kembali
                        </a>
                        <form action="{{ route('messages.destroy', $message) }}" method="POST" onsubmit="return confirm('Hapus pesan ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700">
                                Hapus
                            </button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
