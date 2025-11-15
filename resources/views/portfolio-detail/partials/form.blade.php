<div>
    <label class="block text-gray-700 dark:text-gray-300 font-semibold mb-1">Hero Title</label>
    <input type="text" name="hero_title" class="w-full border-gray-300 rounded-md shadow-sm"
        value="{{ old('hero_title', $portfolioDetail->hero_title ?? '') }}" required>
</div>

<div>
    <label class="block text-gray-700 dark:text-gray-300 font-semibold mb-1">Background Hero</label>
    <input type="file" name="bg_hero" class="w-full border-gray-300 rounded-md shadow-sm">
    @if(!empty($portfolioDetail->bg_hero))
        <img src="{{ asset('storage/'.$portfolioDetail->bg_hero) }}" class="h-24 mt-2 rounded" alt="Hero Image">
    @endif
</div>

<div>
    <label class="block text-gray-700 dark:text-gray-300 font-semibold mb-1">Client ID</label>
    <input type="number" name="client_id" class="w-full border-gray-300 rounded-md shadow-sm"
        value="{{ old('client_id', $portfolioDetail->client_id ?? '') }}">
</div>

<div>
    <label class="block text-gray-700 dark:text-gray-300 font-semibold mb-1">Description</label>
    <textarea name="description" class="w-full border-gray-300 rounded-md shadow-sm">{{ old('description', $portfolioDetail->description ?? '') }}</textarea>
</div>

<div>
    <label class="block text-gray-700 dark:text-gray-300 font-semibold mb-1">Delivery</label>
    <input type="text" name="delivery" class="w-full border-gray-300 rounded-md shadow-sm"
        value="{{ old('delivery', $portfolioDetail->delivery ?? '') }}">
</div>

<div>
    <label class="block text-gray-700 dark:text-gray-300 font-semibold mb-1">Image</label>
    <input type="file" name="img" class="w-full border-gray-300 rounded-md shadow-sm">
    @if(!empty($portfolioDetail->img))
        <img src="{{ asset('storage/'.$portfolioDetail->img) }}" class="h-24 mt-2 rounded" alt="Main Image">
    @endif
</div>

<div>
    <label class="block text-gray-700 dark:text-gray-300 font-semibold mb-1">Project Analysis</label>
    <textarea name="project_analysis" class="w-full border-gray-300 rounded-md shadow-sm">{{ old('project_analysis', $portfolioDetail->project_analysis ?? '') }}</textarea>
</div>

<div>
    <label class="block text-gray-700 dark:text-gray-300 font-semibold mb-1">Challenges & Insight</label>
    <textarea name="challenges_and_insight" class="w-full border-gray-300 rounded-md shadow-sm">{{ old('challenges_and_insight', $portfolioDetail->challenges_and_insight ?? '') }}</textarea>
</div>

<div class="pt-4">
    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">{{ $button }}</button>
</div>
