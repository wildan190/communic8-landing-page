<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Public Presence Content') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- Success message --}}
            @if(session('success'))
                <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">

                <form action="{{ route('public-presence.storeOrUpdate') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    {{-- Head Image --}}
                    <div class="mb-4">
                        <label class="block text-gray-700 font-semibold mb-2">Head Image</label>
                        @if($content && $content->head_img)
                            <img src="{{ Storage::url($content->head_img) }}" alt="Head Image" class="w-48 h-32 object-cover mb-2 rounded">
                        @endif
                        <input type="file" name="head_img" class="border border-gray-300 p-2 rounded w-full">
                        @error('head_img') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>

                    {{-- INSIGHT_DRIVEN_STRATEGY --}}
                    <div class="mb-4">
                        <label class="block text-gray-700 font-semibold mb-2">INSIGHT DRIVEN STRATEGY</label>
                        <input type="text" name="INSIGHT_DRIVEN_STRATEGY" value="{{ $content->INSIGHT_DRIVEN_STRATEGY ?? '' }}" class="border border-gray-300 p-2 rounded w-full">
                        @error('INSIGHT_DRIVEN_STRATEGY') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-semibold mb-2">Description INSIGHT DRIVEN STRATEGY</label>
                        <textarea name="desc_INSIGHT_DRIVEN_STRATEGY" class="border border-gray-300 p-2 rounded w-full" rows="4">{{ $content->desc_INSIGHT_DRIVEN_STRATEGY ?? '' }}</textarea>
                        @error('desc_INSIGHT_DRIVEN_STRATEGY') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-semibold mb-2">Image INSIGHT DRIVEN STRATEGY</label>
                        @if($content && $content->img_INSIGHT_DRIVEN_STRATEGY)
                            <img src="{{ Storage::url($content->img_INSIGHT_DRIVEN_STRATEGY) }}" alt="INSIGHT Image" class="w-48 h-32 object-cover mb-2 rounded">
                        @endif
                        <input type="file" name="img_INSIGHT_DRIVEN_STRATEGY" class="border border-gray-300 p-2 rounded w-full">
                        @error('img_INSIGHT_DRIVEN_STRATEGY') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>

                    {{-- Creative and Channel Synergy --}}
                    <div class="mb-4">
                        <label class="block text-gray-700 font-semibold mb-2">Creative and Channel Synergy</label>
                        <input type="text" name="Creative_and_Channel_Synergy" value="{{ $content->Creative_and_Channel_Synergy ?? '' }}" class="border border-gray-300 p-2 rounded w-full">
                        @error('Creative_and_Channel_Synergy') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-semibold mb-2">Description Creative and Channel Synergy</label>
                        <textarea name="desc_Creative_and_Channel_Synergy" class="border border-gray-300 p-2 rounded w-full" rows="4">{{ $content->desc_Creative_and_Channel_Synergy ?? '' }}</textarea>
                        @error('desc_Creative_and_Channel_Synergy') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-semibold mb-2">Image Creative and Channel Synergy</label>
                        @if($content && $content->img_Creative_and_Channel_Synergy)
                            <img src="{{ Storage::url($content->img_Creative_and_Channel_Synergy) }}" alt="Creative Image" class="w-48 h-32 object-cover mb-2 rounded">
                        @endif
                        <input type="file" name="img_Creative_and_Channel_Synergy" class="border border-gray-300 p-2 rounded w-full">
                        @error('img_Creative_and_Channel_Synergy') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>

                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                        Save Content
                    </button>

                </form>

            </div>
        </div>
    </div>
</x-app-layout>
