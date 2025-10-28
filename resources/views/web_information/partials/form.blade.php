<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <div>
        <label class="block text-gray-700 dark:text-gray-300 mb-1">
            <i class="fa-solid fa-phone mr-1 text-indigo-500"></i> Phone
        </label>
        <input type="text" name="phone" value="{{ old('phone', $webInformation->phone ?? '') }}"
               class="w-full rounded-lg border-gray-300 dark:border-gray-700 bg-gray-50 dark:bg-gray-900 text-gray-800 dark:text-gray-100 focus:ring-indigo-500 focus:border-indigo-500">
    </div>

    <div>
        <label class="block text-gray-700 dark:text-gray-300 mb-1">
            <i class="fa-solid fa-envelope mr-1 text-indigo-500"></i> Email
        </label>
        <input type="email" name="email" value="{{ old('email', $webInformation->email ?? '') }}"
               class="w-full rounded-lg border-gray-300 dark:border-gray-700 bg-gray-50 dark:bg-gray-900 text-gray-800 dark:text-gray-100 focus:ring-indigo-500 focus:border-indigo-500">
    </div>

    <div class="md:col-span-2">
        <label class="block text-gray-700 dark:text-gray-300 mb-1">
            <i class="fa-solid fa-location-dot mr-1 text-indigo-500"></i> Address
        </label>
        <textarea name="address" rows="3"
                  class="w-full rounded-lg border-gray-300 dark:border-gray-700 bg-gray-50 dark:bg-gray-900 text-gray-800 dark:text-gray-100 focus:ring-indigo-500 focus:border-indigo-500">{{ old('address', $webInformation->address ?? '') }}</textarea>
    </div>

    <div>
        <label class="block text-gray-700 dark:text-gray-300 mb-1">
            <i class="fa-brands fa-facebook mr-1 text-blue-500"></i> Facebook
        </label>
        <input type="url" name="facebook" value="{{ old('facebook', $webInformation->facebook ?? '') }}"
               class="w-full rounded-lg border-gray-300 dark:border-gray-700 bg-gray-50 dark:bg-gray-900 text-gray-800 dark:text-gray-100 focus:ring-indigo-500 focus:border-indigo-500">
    </div>

    <div>
        <label class="block text-gray-700 dark:text-gray-300 mb-1">
            <i class="fa-brands fa-instagram mr-1 text-pink-500"></i> Instagram
        </label>
        <input type="url" name="instagram" value="{{ old('instagram', $webInformation->instagram ?? '') }}"
               class="w-full rounded-lg border-gray-300 dark:border-gray-700 bg-gray-50 dark:bg-gray-900 text-gray-800 dark:text-gray-100 focus:ring-indigo-500 focus:border-indigo-500">
    </div>

    <div>
        <label class="block text-gray-700 dark:text-gray-300 mb-1">
            <i class="fa-brands fa-tiktok mr-1 text-gray-800 dark:text-gray-100"></i> Linkedin
        </label>
        <input type="url" name="tiktok" value="{{ old('tiktok', $webInformation->tiktok ?? '') }}"
               class="w-full rounded-lg border-gray-300 dark:border-gray-700 bg-gray-50 dark:bg-gray-900 text-gray-800 dark:text-gray-100 focus:ring-indigo-500 focus:border-indigo-500">
    </div>
</div>
