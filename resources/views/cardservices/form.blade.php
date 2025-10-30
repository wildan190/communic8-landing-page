@php $edit = isset($card); @endphp

<div class="grid grid-cols-1 md:grid-cols-2 gap-4">

    <!-- Title EN -->
    <div>
        <label class="font-semibold">Title (EN)</label>
        <input type="text" name="title_en" 
            value="{{ old('title_en', $edit ? $card->title_en : '') }}" 
            class="border w-full p-2 rounded">
        @error('title_en') <small class="text-red-500">{{ $message }}</small> @enderror
    </div>

    <!-- Title ID -->
    <div>
        <label class="font-semibold">Title (ID)</label>
        <input type="text" name="title_id" 
            value="{{ old('title_id', $edit ? $card->title_id : '') }}" 
            class="border w-full p-2 rounded">
        @error('title_id') <small class="text-red-500">{{ $message }}</small> @enderror
    </div>

    <!-- Desc EN -->
    <div class="col-span-2">
        <label class="font-semibold">Description (EN)</label>
        <textarea name="desc_en" rows="3" class="border w-full p-2 rounded">{{ old('desc_en', $edit ? $card->desc_en : '') }}</textarea>
        @error('desc_en') <small class="text-red-500">{{ $message }}</small> @enderror
    </div>

    <!-- Desc ID -->
    <div class="col-span-2">
        <label class="font-semibold">Description (ID)</label>
        <textarea name="desc_id" rows="3" class="border w-full p-2 rounded">{{ old('desc_id', $edit ? $card->desc_id : '') }}</textarea>
        @error('desc_id') <small class="text-red-500">{{ $message }}</small> @enderror
    </div>

    <!-- Button EN -->
    <div>
        <label class="font-semibold">Button Label (EN)</label>
        <input type="text" name="button_en" 
            value="{{ old('button_en', $edit ? $card->button_en : '') }}" 
            class="border w-full p-2 rounded">
        @error('button_en') <small class="text-red-500">{{ $message }}</small> @enderror
    </div>

    <!-- Button ID -->
    <div>
        <label class="font-semibold">Button Label (ID)</label>
        <input type="text" name="button_id" 
            value="{{ old('button_id', $edit ? $card->button_id : '') }}" 
            class="border w-full p-2 rounded">
        @error('button_id') <small class="text-red-500">{{ $message }}</small> @enderror
    </div>

    <!-- Route Name -->
    <div class="col-span-2">
        <label class="font-semibold">Route Name</label>
        <input type="text" name="route_name"
            value="{{ old('route_name', $edit ? $card->route_name : '') }}"
            class="border w-full p-2 rounded">
        @error('route_name') <small class="text-red-500">{{ $message }}</small> @enderror
        <small class="text-gray-500 text-sm">Contoh: <code>layanan.brand-land</code></small>
    </div>

    <!-- Image upload -->
    <div class="col-span-2">
        <label class="font-semibold">Image (Upload)</label>
        <input type="file" name="img" class="border w-full p-2 rounded">
        @error('img') <small class="text-red-500">{{ $message }}</small> @enderror

        @if($edit && $card->img)
            <div class="mt-2">
                <p class="text-sm text-gray-600 mb-1">Current Image:</p>
                <img src="{{ asset('storage/'.$card->img) }}" 
                     class="w-32 h-32 object-cover rounded border">
            </div>
        @endif
    </div>

</div>
