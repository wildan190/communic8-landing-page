<footer class="bg-white">
    <div class="bg-cover bg-center" style="background-image: url('{{ asset('assets/img/cta-bg.png') }}');">
        <div
            class="max-w-7xl mx-auto px-6 py-6 flex flex-col items-center md:flex-row md:justify-between md:items-center">
            <div
                class="flex flex-col items-center md:flex-row md:items-center space-y-4 md:space-y-0 md:space-x-4 mb-4 md:mb-0">
                <a href="{{ url('/') }}">
                    <img src="{{ asset('assets/img/logo-white.png') }}" alt="Logo" class="h-10">
                </a>
                <span class="text-white text-center md:text-left text-sm">
                    © 2025 Communic8 – All Right Reserved.
                </span>
            </div>

            <div class="flex space-x-4">
                @if ($webInformation && $webInformation->facebook)
                    <a href="{{ $webInformation->facebook }}" target="_blank" class="group">
                        <img src="{{ asset('assets/img/social/fb.png') }}" alt="Facebook"
                            class="h-8 w-8 group-hover:hidden">
                        <img src="{{ asset('assets/img/social/colored/fb.png') }}" alt="Facebook Colored"
                            class="h-8 w-8 hidden group-hover:block">
                    </a>
                @endif

                @if ($webInformation && $webInformation->instagram)
                    <a href="{{ $webInformation->instagram }}" target="_blank" class="group">
                        <img src="{{ asset('assets/img/social/ig.png') }}" alt="Instagram"
                            class="h-8 w-8 group-hover:hidden">
                        <img src="{{ asset('assets/img/social/colored/ig.png') }}" alt="Instagram Colored"
                            class="h-8 w-8 hidden group-hover:block">
                    </a>
                @endif

                @if ($webInformation && $webInformation->tiktok)
                    <a href="{{ $webInformation->tiktok }}" target="_blank" class="group">
                        <img src="{{ asset('assets/img/social/linkedin.png') }}" alt="LinkedIn"
                            class="h-8 w-8 group-hover:hidden">
                        <img src="{{ asset('assets/img/social/colored/linkedin-colored.png') }}" alt="LinkedIn Colored"
                            class="h-8 w-8 hidden group-hover:block">
                    </a>
                @endif
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-6 py-12 grid grid-cols-1 gap-8 text-gray-700 md:grid-cols-2 lg:grid-cols-4">

        <div class="col-span-1 md:col-span-2 grid grid-cols-1 sm:grid-cols-3 gap-6">
            <div>
                <h4 class="font-semibold mb-4">Get to know</h4>
                <ul class="space-y-2 text-sm">
                    <li><a href="{{ url('/') }}" class="hover:text-gray-500">Home</a></li>
                    <li><a href="{{ route('about.index') }}" class="hover:text-gray-500">About</a></li>
                    <li><a href="{{ route('portofolio.index') }}" class="hover:text-gray-500">Portfolio</a></li>
                </ul>
            </div>

            <div>
                <h4 class="font-semibold mb-4">Scope of works</h4>
                <ul class="space-y-2 text-sm">
                    <li><a href="{{ route('layanan.brand-land') }}" class="hover:text-gray-500">Brand Land</a></li>
                    <li><a href="{{ route('layanan.digital-stand') }}" class="hover:text-gray-500">Digital Stand</a></li>
                    <li><a href="{{ route('layanan.code-band') }}" class="hover:text-gray-500">Code Band</a></li>
                    <li><a href="{{ route('layanan.public-space-media') }}" class="hover:text-gray-500">Public Space Media</a></li>
                    <li><a href="{{ route('layanan.ott-advertising') }}" class="hover:text-gray-500">OTT Advertising</a></li>
                </ul>
            </div>

            <div>
                <h4 class="font-semibold mb-4">Insights</h4>
                <ul class="space-y-2 text-sm">
                    @forelse($insightCategories as $cat)
                        <li>
                            <a href="{{ route('home.index', ['category' => $cat]) }}" class="hover:text-gray-500">
                                {{ $cat }}
                            </a>
                        </li>
                    @empty
                        <li class="text-gray-400">Belum ada kategori</li>
                    @endforelse
                </ul>
            </div>
        </div>

        <div
            class="col-span-1 md:col-span-2 lg:col-span-2 grid grid-cols-1 sm:grid-cols-2 gap-8 lg:gap-6 lg:border-l lg:pl-6">
            @foreach ($branchOffices as $office)
                <div>
                    <h4 class="font-semibold mb-2">{{ $office->name }}</h4>
                    <p class="text-sm text-gray-600">
                        {!! nl2br(e($office->address)) !!} <br>
                        <span class="block mt-1">Phone number: {{ $office->phone }}</span>
                    </p>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Bagian paling bawah -->
    <div class="bg-gray-900 py-4">
        <div class="max-w-7xl mx-auto px-6 text-center text-sm text-white space-x-4">
            <a href="" class="hover:underline">Privacy Policy</a>
            <span>|</span>
            <a href="" class="hover:underline">Terms of Services</a>
            <span>|</span>
            <a href="" class="hover:underline">Google Certified Partner Disclosure</a>
        </div>
    </div>
</footer>
