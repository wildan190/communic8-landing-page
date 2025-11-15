<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Portfolio Detail') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('portfolio-detail.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf

                    {{-- =====================
                        PORTFOLIO DETAIL FORM
                    ====================== --}}
                    <div>
                        <label class="block text-gray-700 dark:text-gray-300 font-semibold mb-1">Hero Title</label>
                        <input type="text" name="hero_title" class="w-full border-gray-300 rounded-md shadow-sm" required>
                    </div>

                    {{-- CLIENT SELECT MODAL --}}
                    <div>
                        <label class="block text-gray-700 dark:text-gray-300 font-semibold mb-1">Client</label>

                        {{-- Hidden input client_id --}}
                        <input type="hidden" name="client_id" id="client_id">

                        {{-- Display selected client --}}
                        <div class="flex items-center space-x-3">
                            <input type="text" id="client_name" class="w-full border-gray-300 rounded-md shadow-sm bg-gray-100 dark:bg-gray-700" placeholder="Select a client..." readonly>
                            <button type="button" id="openClientModal" class="bg-blue-600 text-white px-3 py-2 rounded-md hover:bg-blue-700">
                                Select
                            </button>
                        </div>
                    </div>

                    <div>
                        <label class="block text-gray-700 dark:text-gray-300 font-semibold mb-1">Description</label>
                        <textarea name="description" class="w-full border-gray-300 rounded-md shadow-sm"></textarea>
                    </div>

                    <div>
                        <label class="block text-gray-700 dark:text-gray-300 font-semibold mb-1">Delivery</label>
                        <input type="text" name="delivery" class="w-full border-gray-300 rounded-md shadow-sm">
                    </div>

                    <div>
                        <label class="block text-gray-700 dark:text-gray-300 font-semibold mb-1">Project Analysis</label>
                        <textarea name="project_analysis" class="w-full border-gray-300 rounded-md shadow-sm"></textarea>
                    </div>

                    <div>
                        <label class="block text-gray-700 dark:text-gray-300 font-semibold mb-1">Challenges & Insight</label>
                        <textarea name="challenges_and_insight" class="w-full border-gray-300 rounded-md shadow-sm"></textarea>
                    </div>

                    <div>
                        <label class="block text-gray-700 dark:text-gray-300 font-semibold mb-1">Background Hero</label>
                        <input type="file" name="bg_hero" class="w-full border-gray-300 rounded-md shadow-sm">
                    </div>

                    <div>
                        <label class="block text-gray-700 dark:text-gray-300 font-semibold mb-1">Main Image</label>
                        <input type="file" name="img" class="w-full border-gray-300 rounded-md shadow-sm">
                    </div>

                    {{-- =====================
                        PROJECT RESULT FORM
                    ====================== --}}
                    <hr class="border-gray-300 dark:border-gray-700 my-6">

                    <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-4">Project Results</h3>

                    <div id="results-wrapper" class="space-y-4">
                        <div class="result-item border p-4 rounded-md bg-gray-50 dark:bg-gray-900">
                            <div>
                                <label class="block text-gray-700 dark:text-gray-300 font-semibold mb-1">Result Name</label>
                                <input type="text" name="results[0][name]" class="w-full border-gray-300 rounded-md shadow-sm">
                            </div>

                            <div class="mt-3">
                                <label class="block text-gray-700 dark:text-gray-300 font-semibold mb-1">Description</label>
                                <textarea name="results[0][description]" class="w-full border-gray-300 rounded-md shadow-sm"></textarea>
                            </div>

                            <div class="mt-3">
                                <label class="block text-gray-700 dark:text-gray-300 font-semibold mb-1">Result Image</label>
                                <input type="file" name="results[0][result_img]" class="w-full border-gray-300 rounded-md shadow-sm">
                            </div>
                        </div>
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
                            Create Portfolio Detail
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

{{-- =====================
    CLIENT MODAL (DENGAN SEARCH & PAGINATION)
====================== --}}
<div id="clientModal" class="hidden fixed inset-0 z-50 bg-black bg-opacity-50 flex items-center justify-center">
    <div class="bg-white dark:bg-gray-800 w-full max-w-5xl rounded-lg shadow-lg p-6">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200">Pilih Client</h3>
            <button id="closeClientModal" class="text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">✕</button>
        </div>

        {{-- 🔍 Search Input --}}
        <div class="mb-4">
            <input type="text" id="clientSearch" placeholder="Cari berdasarkan nama perusahaan atau industri..."
                class="w-full border-gray-300 rounded-md shadow-sm px-3 py-2 focus:border-blue-500 focus:ring focus:ring-blue-200 dark:bg-gray-700 dark:text-gray-200">
        </div>

        {{-- 🧾 Table --}}
        <div class="overflow-x-auto">
            <table id="clientTable" class="min-w-full text-sm text-gray-800 dark:text-gray-200">
                <thead>
                    <tr class="border-b border-gray-300 dark:border-gray-700 bg-gray-100 dark:bg-gray-700">
                        <th class="py-3 px-4 text-left">Logo</th>
                        <th class="py-3 px-4 text-left">Perusahaan</th>
                        <th class="py-3 px-4 text-left">Industri</th>
                        <th class="py-3 px-4 text-left">Kategori</th>
                        <th class="py-3 px-4 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody id="clientTableBody">
                    @foreach($clients as $client)
                        <tr class="client-row border-b border-gray-200 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700 transition"
                            data-name="{{ strtolower($client->company_name) }}"
                            data-industry="{{ strtolower($client->industry) }}">
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

        {{-- 📄 Pagination Controls --}}
        <div class="flex justify-between items-center mt-4 text-sm text-gray-700 dark:text-gray-300">
            <div>
                <span id="paginationInfo">Menampilkan 1–5 dari {{ count($clients) }}</span>
            </div>
            <div class="space-x-2">
                <button id="prevPage" class="px-3 py-1 border rounded-md hover:bg-gray-100 dark:hover:bg-gray-700">Prev</button>
                <button id="nextPage" class="px-3 py-1 border rounded-md hover:bg-gray-100 dark:hover:bg-gray-700">Next</button>
            </div>
        </div>
    </div>
</div>

<script>
    // =======================
    // MODAL OPEN / CLOSE
    // =======================
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

    // =======================
    // SEARCH & PAGINATION FRONTEND
    // =======================
    const rows = Array.from(document.querySelectorAll('.client-row'));
    const searchInput = document.getElementById('clientSearch');
    const paginationInfo = document.getElementById('paginationInfo');
    const prevBtn = document.getElementById('prevPage');
    const nextBtn = document.getElementById('nextPage');

    let currentPage = 1;
    const perPage = 5;
    let filteredRows = [...rows];

    function renderTable() {
        const total = filteredRows.length;
        const totalPages = Math.ceil(total / perPage);
        const start = (currentPage - 1) * perPage;
        const end = start + perPage;

        rows.forEach(row => row.classList.add('hidden'));
        filteredRows.slice(start, end).forEach(row => row.classList.remove('hidden'));

        const startNum = total === 0 ? 0 : start + 1;
        const endNum = Math.min(end, total);
        paginationInfo.textContent = `Menampilkan ${startNum}–${endNum} dari ${total}`;

        prevBtn.disabled = currentPage === 1;
        nextBtn.disabled = currentPage === totalPages || totalPages === 0;
    }

    searchInput.addEventListener('input', function() {
        const keyword = this.value.toLowerCase().trim();
        filteredRows = rows.filter(row =>
            row.dataset.name.includes(keyword) || row.dataset.industry.includes(keyword)
        );
        currentPage = 1;
        renderTable();
    });

    prevBtn.addEventListener('click', function() {
        if (currentPage > 1) {
            currentPage--;
            renderTable();
        }
    });

    nextBtn.addEventListener('click', function() {
        const totalPages = Math.ceil(filteredRows.length / perPage);
        if (currentPage < totalPages) {
            currentPage++;
            renderTable();
        }
    });

    renderTable();
</script>

</x-app-layout>
