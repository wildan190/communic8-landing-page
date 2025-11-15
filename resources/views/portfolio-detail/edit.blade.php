<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Portfolio Detail') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('portfolio-detail.update', $portfolioDetail->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    @method('PUT')

                    {{-- =====================
                        PORTFOLIO DETAIL FORM
                    ====================== --}}
                    <div>
                        <label class="block text-gray-700 dark:text-gray-300 font-semibold mb-1">Hero Title</label>
                        <input type="text" name="hero_title" value="{{ old('hero_title', $portfolioDetail->hero_title) }}" class="w-full border-gray-300 rounded-md shadow-sm" required>
                    </div>

                    {{-- CLIENT SELECT MODAL --}}
                    <div>
                        <label class="block text-gray-700 dark:text-gray-300 font-semibold mb-1">Client</label>

                        <input type="hidden" name="client_id" id="client_id" value="{{ old('client_id', $portfolioDetail->client_id) }}">

                        <div class="flex items-center space-x-3">
                            <input type="text" id="client_name" 
                                   value="{{ old('client_name', $portfolioDetail->client->company_name ?? '') }}"
                                   class="w-full border-gray-300 rounded-md shadow-sm bg-gray-100 dark:bg-gray-700"
                                   placeholder="Pilih client..." readonly>
                            <button type="button" id="openClientModal" class="bg-blue-600 text-white px-3 py-2 rounded-md hover:bg-blue-700">
                                Pilih
                            </button>
                        </div>
                    </div>

                    <div>
                        <label class="block text-gray-700 dark:text-gray-300 font-semibold mb-1">Description</label>
                        <textarea name="description" class="w-full border-gray-300 rounded-md shadow-sm">{{ old('description', $portfolioDetail->description) }}</textarea>
                    </div>

                    <div>
                        <label class="block text-gray-700 dark:text-gray-300 font-semibold mb-1">Delivery</label>
                        <input type="text" name="delivery" value="{{ old('delivery', $portfolioDetail->delivery) }}" class="w-full border-gray-300 rounded-md shadow-sm">
                    </div>

                    <div>
                        <label class="block text-gray-700 dark:text-gray-300 font-semibold mb-1">Project Analysis</label>
                        <textarea name="project_analysis" class="w-full border-gray-300 rounded-md shadow-sm">{{ old('project_analysis', $portfolioDetail->project_analysis) }}</textarea>
                    </div>

                    <div>
                        <label class="block text-gray-700 dark:text-gray-300 font-semibold mb-1">Challenges & Insight</label>
                        <textarea name="challenges_and_insight" class="w-full border-gray-300 rounded-md shadow-sm">{{ old('challenges_and_insight', $portfolioDetail->challenges_and_insight) }}</textarea>
                    </div>

                    {{-- Background Hero --}}
                    <div>
                        <label class="block text-gray-700 dark:text-gray-300 font-semibold mb-1">Background Hero</label>
                        @if($portfolioDetail->bg_hero)
                            <img src="{{ asset('storage/' . $portfolioDetail->bg_hero) }}" alt="" class="h-32 rounded-md mb-2 object-cover">
                        @endif
                        <input type="file" name="bg_hero" class="w-full border-gray-300 rounded-md shadow-sm">
                    </div>

                    {{-- Main Image --}}
                    <div>
                        <label class="block text-gray-700 dark:text-gray-300 font-semibold mb-1">Main Image</label>
                        @if($portfolioDetail->img)
                            <img src="{{ asset('storage/' . $portfolioDetail->img) }}" alt="" class="h-32 rounded-md mb-2 object-cover">
                        @endif
                        <input type="file" name="img" class="w-full border-gray-300 rounded-md shadow-sm">
                    </div>

                    {{-- =====================
                        PROJECT RESULT FORM
                    ====================== --}}
                    <hr class="border-gray-300 dark:border-gray-700 my-6">

                    <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-4">Project Results</h3>

                    <div id="results-wrapper" class="space-y-4">
                        @foreach($portfolioDetail->projectResults as $index => $result)
                            <div class="result-item border p-4 rounded-md bg-gray-50 dark:bg-gray-900">
                                <input type="hidden" name="results[{{ $index }}][id]" value="{{ $result->id }}">
                                <div class="flex justify-between items-center">
                                    <h4 class="text-gray-800 dark:text-gray-200 font-semibold">Result #{{ $index + 1 }}</h4>
                                    <button type="button" class="text-red-600 hover:text-red-800 text-sm remove-result">Remove</button>
                                </div>
                                <div class="mt-2">
                                    <label class="block text-gray-700 dark:text-gray-300 font-semibold mb-1">Result Name</label>
                                    <input type="text" name="results[{{ $index }}][name]" value="{{ $result->name }}" class="w-full border-gray-300 rounded-md shadow-sm">
                                </div>
                                <div class="mt-3">
                                    <label class="block text-gray-700 dark:text-gray-300 font-semibold mb-1">Description</label>
                                    <textarea name="results[{{ $index }}][description]" class="w-full border-gray-300 rounded-md shadow-sm">{{ $result->description }}</textarea>
                                </div>
                                <div class="mt-3">
                                    <label class="block text-gray-700 dark:text-gray-300 font-semibold mb-1">Result Image</label>
                                    @if($result->result_img)
                                        <img src="{{ asset('storage/' . $result->result_img) }}" alt="" class="h-24 mb-2 rounded-md object-cover">
                                    @endif
                                    <input type="file" name="results[{{ $index }}][result_img]" class="w-full border-gray-300 rounded-md shadow-sm">
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="pt-2">
                        <button type="button" id="add-result" class="bg-green-600 text-white px-3 py-2 rounded-md hover:bg-green-700">
                            + Add Another Result
                        </button>
                    </div>

                    {{-- =====================
                        SUBMIT BUTTON
                    ====================== --}}
                    <div class="pt-6">
                        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">
                            Update Portfolio Detail
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- =====================
        CLIENT MODAL
    ====================== --}}
    <div id="clientModal" class="hidden fixed inset-0 z-50 bg-black bg-opacity-50 flex items-center justify-center">
        <div class="bg-white dark:bg-gray-800 w-full max-w-5xl rounded-lg shadow-lg p-6">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200">Pilih Client</h3>
                <button id="closeClientModal" class="text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">✕</button>
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full text-sm text-gray-800 dark:text-gray-200">
                    <thead>
                        <tr class="border-b border-gray-300 dark:border-gray-700 bg-gray-100 dark:bg-gray-700">
                            <th class="py-3 px-4 text-left">Logo</th>
                            <th class="py-3 px-4 text-left">Perusahaan</th>
                            <th class="py-3 px-4 text-left">Industri</th>
                            <th class="py-3 px-4 text-left">Kategori</th>
                            <th class="py-3 px-4 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($clients as $client)
                            <tr class="border-b border-gray-200 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                                <td class="py-3 px-4">
                                    @if($client->logo)
                                        <img src="{{ asset('storage/' . $client->logo) }}" alt="{{ $client->company_name }}" class="h-10 w-10 rounded-md object-cover">
                                    @else
                                        <div class="h-10 w-10 rounded-md bg-gray-300 dark:bg-gray-600 flex items-center justify-center text-gray-500">N/A</div>
                                    @endif
                                </td>
                                <td class="py-3 px-4 font-medium">{{ $client->company_name }}</td>
                                <td class="py-3 px-4">{{ $client->industry }}</td>
                                <td class="py-3 px-4">
                                    @switch($client->category)
                                        @case(1) <span class="text-blue-600 font-semibold">Corporate</span> @break
                                        @case(2) <span class="text-green-600 font-semibold">Startup</span> @break
                                        @case(3) <span class="text-yellow-600 font-semibold">Agency</span> @break
                                        @default <span class="text-gray-500">Unknown</span>
                                    @endswitch
                                </td>
                                <td class="py-3 px-4 text-center">
                                    <button type="button"
                                        class="select-client bg-blue-600 text-white px-3 py-1 rounded-md hover:bg-blue-700 text-sm"
                                        data-id="{{ $client->id }}"
                                        data-name="{{ $client->company_name }}">
                                        Pilih
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- =====================
        JAVASCRIPT SECTION
    ====================== --}}
    <script>
        // Handle Client Modal
        const clientModal = document.getElementById('clientModal');
        const openClientModal = document.getElementById('openClientModal');
        const closeClientModal = document.getElementById('closeClientModal');

        openClientModal.addEventListener('click', () => clientModal.classList.remove('hidden'));
        closeClientModal.addEventListener('click', () => clientModal.classList.add('hidden'));

        document.addEventListener('click', function(e) {
            if (e.target.classList.contains('select-client')) {
                const id = e.target.getAttribute('data-id');
                const name = e.target.getAttribute('data-name');
                document.getElementById('client_id').value = id;
                document.getElementById('client_name').value = name;
                clientModal.classList.add('hidden');
            }
        });

        // Dynamic Project Result
        let resultIndex = {{ $portfolioDetail->projectResults->count() }};
        document.getElementById('add-result').addEventListener('click', function() {
            const wrapper = document.getElementById('results-wrapper');
            const newItem = document.createElement('div');
            newItem.classList.add('result-item', 'border', 'p-4', 'rounded-md', 'bg-gray-50', 'dark:bg-gray-900', 'mt-4');
            newItem.innerHTML = `
                <div class="flex justify-between items-center">
                    <h4 class="text-gray-800 dark:text-gray-200 font-semibold">New Result</h4>
                    <button type="button" class="text-red-600 hover:text-red-800 text-sm remove-result">Remove</button>
                </div>
                <div class="mt-2">
                    <label class="block text-gray-700 dark:text-gray-300 font-semibold mb-1">Result Name</label>
                    <input type="text" name="results[${resultIndex}][name]" class="w-full border-gray-300 rounded-md shadow-sm">
                </div>
                <div class="mt-3">
                    <label class="block text-gray-700 dark:text-gray-300 font-semibold mb-1">Description</label>
                    <textarea name="results[${resultIndex}][description]" class="w-full border-gray-300 rounded-md shadow-sm"></textarea>
                </div>
                <div class="mt-3">
                    <label class="block text-gray-700 dark:text-gray-300 font-semibold mb-1">Result Image</label>
                    <input type="file" name="results[${resultIndex}][result_img]" class="w-full border-gray-300 rounded-md shadow-sm">
                </div>
            `;
            wrapper.appendChild(newItem);
            resultIndex++;
        });

        document.addEventListener('click', function(e) {
            if (e.target.classList.contains('remove-result')) {
                e.target.closest('.result-item').remove();
            }
        });
    </script>
</x-app-layout>
