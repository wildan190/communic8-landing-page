@extends('layouts.web')

@section('content')
    <section class="relative pt-48 pb-20 bg-white"> <!-- pt lebih besar biar jauh dari navbar -->
        <div class="max-w-5xl mx-auto px-6 text-center">
            <!-- Title -->
            <h1
                class="font-poppins font-light text-3xl md:text-4xl tracking-[0.35em] uppercase text-gray-800 leading-relaxed text-center">
                LET’S START A <br> CONVERSATION
            </h1>

            <p class="mt-6 text-gray-600 max-w-3xl mx-auto">
                Whether you have a specific project in mind, a question about our services,
                or a grand vision for your brand in Asia, we are ready to listen.
                Reach out and let’s discuss how we can achieve your goals together.
            </p>
        </div>

        <!-- Contact Form -->
        <div class="max-w-4xl mx-auto mt-12 rounded-2xl p-8 shadow-sm" style="background-color: rgb(204, 204, 204);">
            <form action="{{ route('contact.store') }}" method="POST" class="space-y-6">
                @csrf

                <!-- Row 1 -->
                <div class="grid md:grid-cols-2 gap-6">
                    <input type="text" name="name" placeholder="Your name..."
                        class="w-full px-4 py-3 rounded-md border border-gray-300 focus:ring-2 focus:ring-gray-500">
                    <div class="flex">
                        <span class="px-3 flex items-center bg-gray-200 rounded-l-md text-gray-600">+62</span>
                        <input type="text" name="phone" placeholder="812-3456-7890"
                            class="w-full px-4 py-3 rounded-r-md border border-gray-300 focus:ring-2 focus:ring-gray-500">
                    </div>
                </div>

                <!-- Row 2 -->
                <div class="grid md:grid-cols-2 gap-6">
                    <input type="text" name="company" placeholder="Your company’s name..."
                        class="w-full px-4 py-3 rounded-md border border-gray-300 focus:ring-2 focus:ring-gray-500">
                    <input type="email" name="email" placeholder="your.email@domain.com"
                        class="w-full px-4 py-3 rounded-md border border-gray-300 focus:ring-2 focus:ring-gray-500">
                </div>

                <!-- Row 3 -->
                <div class="grid md:grid-cols-2 gap-6">
                    <select name="industry"
                        class="w-full px-4 py-3 rounded-md border border-gray-300 focus:ring-2 focus:ring-gray-500">
                        <option value="">(Industry...)</option>
                        <option value="Technology">Technology</option>
                        <option value="Finance">Finance</option>
                        <option value="Healthcare">Healthcare</option>
                        <option value="Education">Education</option>
                        <option value="Retail">Retail</option>
                        <option value="Manufacturing">Manufacturing</option>
                        <option value="Media & Entertainment">Media & Entertainment</option>
                        <option value="Hospitality">Hospitality</option>
                        <option value="Government">Government</option>
                        <option value="Other">Other</option>
                    </select>
                    <select name="services"
                        class="w-full px-4 py-3 rounded-md border border-gray-300 focus:ring-2 focus:ring-gray-500">
                        <option value="">(Which services interest you...)</option>
                        <option value="Brand Forge">Brand Forge</option>
                        <option value="Digital Compass">Digital Compass</option>
                        <option value="Public Presence">Public Presence</option>
                        <option value="Digital Architecture">Digital Architecture</option>
                    </select>
                </div>

                <!-- Row 4 -->
                <div>
                    <select name="find_us"
                        class="w-full px-4 py-3 rounded-md border border-gray-300 focus:ring-2 focus:ring-gray-500">
                        <option value="">(How did you find us...)</option>
                        <option value="Instagram">Instagram</option>
                        <option value="Facebook">Facebook</option>
                        <option value="Website">Website</option>
                        <option value="Linkedin">Linkedin</option>
                        <option value="Other">Other</option>
                    </select>
                </div>

                <!-- Radio -->
                <div class="text-gray-700">
                    <p class="mb-2">Select which area your email will be delivered...</p>
                    <div class="flex flex-wrap gap-6">
                        <label><input type="radio" name="area" value="1" class="mr-2"> Jakarta</label>
                        <label><input type="radio" name="area" value="2" class="mr-2"> Malaysia</label>
                        <label><input type="radio" name="area" value="3" class="mr-2"> Singapore</label>
                        <label><input type="radio" name="area" value="4" class="mr-2"> China</label>
                    </div>
                </div>

                <!-- Message -->
                <textarea name="message" placeholder="Tell us what you need..."
                    class="w-full px-4 py-3 rounded-md border border-gray-300 focus:ring-2 focus:ring-gray-500 h-32"></textarea>

                <!-- Checkbox (optional newsletter) -->
                <label class="flex items-center space-x-2 text-gray-600">
                    <input type="checkbox" class="rounded border-gray-300">
                    <span>Keep me ahead of the curve. Send me insights and updates.</span>
                </label>

                <!-- Submit -->
                <div class="flex justify-center">
                    <button type="submit"
                        class="px-10 py-3 rounded-full bg-gray-800 text-white hover:bg-gray-700 transition">
                        Submit
                    </button>
                </div>
            </form>
        </div>

        <!-- SweetAlert2 -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        @if (session('success'))
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: '{{ session('success') }}',
                    showConfirmButton: false,
                    timer: 2000
                });
            </script>
        @endif

        <!-- Office Grid -->
        <div class="max-w-6xl mx-auto px-6 mt-20">
            <div class="grid md:grid-cols-2 gap-10">
                @forelse($branchOffices as $office)
                    <div class="bg-white rounded-2xl shadow-sm border p-6 space-y-4 text-center">
                        @if ($office->picture_upload)
                            <img src="{{ asset('storage/' . $office->picture_upload) }}"
                                class="rounded-xl w-full object-cover">
                        @else
                            <img src="{{ asset('assets/img/default-office.png') }}" class="rounded-xl w-full object-cover">
                        @endif

                        <h3 class="text-lg font-semibold text-gray-800">{{ $office->name }}</h3>
                        <p class="text-gray-600 text-sm">{{ $office->address }}</p>
                        <p class="font-medium text-gray-800">{{ $office->phone }}</p>
                    </div>
                @empty
                    <p class="col-span-2 text-center text-gray-500">No branch offices available.</p>
                @endforelse
            </div>
        </div>

    </section>

    <!-- Map Section -->
    <section class="w-full">
        @if ($webInfo && $webInfo->address)
            <iframe width="100%" height="500" style="border:0;" loading="lazy" allowfullscreen
                referrerpolicy="no-referrer-when-downgrade"
                src="https://www.google.com/maps?q={{ urlencode($webInfo->address) }}&output=embed">
            </iframe>
        @else
            <div class="text-center py-10 text-gray-500 dark:text-gray-400">
                <i class="fa-solid fa-map-location-dot text-3xl mb-2"></i>
                <p>Alamat belum tersedia.</p>
            </div>
        @endif
    </section>


    {{-- CTA Section --}}
    <section class="relative bg-cover bg-center text-white font-poppins"
        style="background-image: url('/assets/img/cta-bg.png');">
        <div class="absolute inset-0 bg-black/40"></div> {{-- Overlay biar teks jelas --}}

        <div
            class="relative max-w-screen-xl mx-auto px-6 py-20 flex flex-col md:flex-row items-center md:items-start justify-between">

            {{-- Left Big Text --}}
            <div class="mb-12 md:mb-0">
                <h2 class="text-4xl md:text-6xl leading-relaxed tracking-[0.5em]">
                    <span class="font-thin block">DREAM</span>
                    <span class="font-bold block">BOLDER</span>
                    <span class="font-thin block">ACHIEVE</span>
                    <span class="font-bold block">BIGGER</span>
                </h2>
            </div>

            {{-- Right Content --}}
            <div class="max-w-lg">
                <h3 class="text-2xl md:text-3xl font-semibold mb-4">Let’s ignite your growth!</h3>
                <p class="text-base md:text-lg mb-6 leading-relaxed">
                    Partner with Communic8's 20 years of creative strategic expertise.
                    We're dedicated to understanding your unique goals and crafting innovative digital solutions
                    that deliver exceptional results across Southeast Asia.
                </p>
                <a href="#"
                    class="inline-block bg-white text-gray-900 px-6 py-3 rounded-full font-medium hover:bg-gray-200 transition">
                    Begin Your Ascent
                </a>
            </div>
        </div>
    </section>

    <!-- Blog Slider Section -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6">

            <!-- Section Title -->
            <div class="text-center mb-12 sm:mb-16">
                <h2
                    class="font-poppins text-xl sm:text-3xl md:text-4xl font-normal 
               text-[#666666] tracking-normal sm:tracking-[0.35em] leading-snug mb-4 sm:mb-6">
                    I N S I G H T S &nbsp; F O R
                    <span class="hidden sm:inline"><br /></span>
                    S T R A T E G I C &nbsp; M I N D
                </h2>
            </div>

            <!-- Wrapper for Desktop (with arrows) -->
            <div class="hidden sm:flex items-center space-x-6">
                <!-- Prev Button -->
                <button id="prevBtn" class="shrink-0">
                    <img src="{{ asset('assets/img/blog-slider-left.png') }}" alt="Prev" class="w-10 h-10">
                </button>

                <!-- Slider Container -->
                <div id="blog-slider"
                    class="flex overflow-x-auto space-x-6 scrollbar-hide snap-x snap-mandatory scroll-smooth w-full">
                    @foreach ($sliderBlogs as $blog)
                        <div
                            class="snap-center min-w-[280px] sm:min-w-[320px] md:min-w-[360px] bg-white rounded-2xl shadow-sm p-5 border border-gray-200 flex flex-col">
                            <p class="text-sm text-gray-500">{{ $blog->category }}</p>
                            <a href="{{ route('blogs.show', $blog->slug) }}" class="block flex-grow">
                                <h3
                                    class="text-base sm:text-lg font-medium text-gray-800 hover:text-gray-600 transition line-clamp-3 min-h-[72px] mb-4">
                                    {{ $blog->title }}
                                </h3>
                            </a>
                            @if ($blog->headline_img)
                                <img src="{{ asset('storage/' . $blog->headline_img) }}"
                                    alt="{{ $blog->headline_img_alt ?? $blog->title }}"
                                    class="w-full h-48 object-cover rounded-xl">
                            @else
                                <img src="{{ asset('assets/img/blog1.png') }}" alt="Default Image"
                                    class="w-full h-48 object-cover rounded-xl">
                            @endif
                        </div>
                    @endforeach
                </div>

                <!-- Next Button -->
                <button id="nextBtn" class="shrink-0">
                    <img src="{{ asset('assets/img/blog-slider-right.png') }}" alt="Next" class="w-10 h-10">
                </button>
            </div>

            <!-- Mobile: Slider full width, arrows below -->
            <div class="sm:hidden">
                <div id="blog-slider-mobile"
                    class="flex overflow-x-auto space-x-4 scrollbar-hide snap-x snap-mandatory scroll-smooth">
                    @foreach ($sliderBlogs as $blog)
                        <div
                            class="snap-center min-w-[260px] bg-white rounded-2xl shadow-sm p-4 border border-gray-200 flex flex-col">
                            <p class="text-xs text-gray-500">{{ $blog->category }}</p>
                            <a href="{{ route('blogs.show', $blog->slug) }}" class="block flex-grow">
                                <h3
                                    class="text-base font-medium text-gray-800 hover:text-gray-600 transition line-clamp-3 min-h-[60px] mb-3">
                                    {{ $blog->title }}
                                </h3>
                            </a>
                            @if ($blog->headline_img)
                                <img src="{{ asset('storage/' . $blog->headline_img) }}"
                                    alt="{{ $blog->headline_img_alt ?? $blog->title }}"
                                    class="w-full h-40 object-cover rounded-xl">
                            @else
                                <img src="{{ asset('assets/img/blog1.png') }}" alt="Default Image"
                                    class="w-full h-40 object-cover rounded-xl">
                            @endif
                        </div>
                    @endforeach
                </div>

                <!-- Arrows below slider -->
                <div class="flex justify-center space-x-6 mt-6">
                    <button id="prevBtnMobile">
                        <img src="{{ asset('assets/img/blog-slider-left.png') }}" alt="Prev" class="w-8 h-8">
                    </button>
                    <button id="nextBtnMobile">
                        <img src="{{ asset('assets/img/blog-slider-right.png') }}" alt="Next" class="w-8 h-8">
                    </button>
                </div>
            </div>

            <!-- Read More Button -->
            <div class="text-center mt-12">
                <a href="{{ route('insight.index') }}"
                    class="inline-block bg-gray-800 text-white px-6 py-3 rounded-full hover:bg-gray-700 transition">
                    Read More
                </a>
            </div>

        </div>
    </section>

    <!-- JS for slider scroll -->
    <script>
        // Desktop
        const slider = document.getElementById('blog-slider');
        document.getElementById('prevBtn').addEventListener('click', () => {
            slider.scrollBy({
                left: -400,
                behavior: 'smooth'
            });
        });
        document.getElementById('nextBtn').addEventListener('click', () => {
            slider.scrollBy({
                left: 400,
                behavior: 'smooth'
            });
        });

        // Mobile
        const sliderMobile = document.getElementById('blog-slider-mobile');
        document.getElementById('prevBtnMobile').addEventListener('click', () => {
            sliderMobile.scrollBy({
                left: -300,
                behavior: 'smooth'
            });
        });
        document.getElementById('nextBtnMobile').addEventListener('click', () => {
            sliderMobile.scrollBy({
                left: 300,
                behavior: 'smooth'
            });
        });
    </script>
@endsection
