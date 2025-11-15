@extends('layouts.web')

@section('content')
    <section class="relative pt-48 pb-20 bg-white">
        <div class="max-w-5xl mx-auto px-6 text-center">
            <!-- Title -->
            <h1
                class="font-poppins font-light text-base md:text-3xl lg:text-4xl tracking-[0.05em] md:tracking-[0.35em] uppercase text-[#666666] leading-relaxed">
                {!! __('contact/form.title') !!}
            </h1>
            <p class="mt-6 text-[#666666] max-w-3xl mx-auto text-sm md:text-base">
                {{ __('contact/form.subtitle') }}
            </p>

        </div>

        <!-- Contact Form -->
        <div class="max-w-3xl mx-auto mt-12 bg-[#f3f3f3] rounded-3xl p-8 md:p-10 shadow-sm">
            <form action="{{ route('contact.store') }}" method="POST" class="space-y-6">
                @csrf

                <!-- Row 1 -->
                <div class="grid md:grid-cols-2 gap-6">
                    <input type="text" name="name" placeholder="{{ __('contact/form.name_placeholder') }}"
                        class="w-full px-4 py-3 rounded-lg border border-transparent focus:border-[#666666] focus:ring-0 placeholder-[#666666] text-[#666666]">

                    <!-- Phone -->
                    <div class="flex items-center rounded-lg">
                        <select name="country_code"
                            class="px-3 py-3 rounded-l-lg border-r-0 border border-transparent focus:border-[#666666] focus:ring-0 text-[#666666] text-sm appearance-none bg-white">
                            <option value="+1" data-country="US/Canada">+1</option>
                            <option value="+44" data-country="UK">+44</option>
                            <option value="+62" data-country="Indonesia">+62</option>
                            <option value="+65" data-country="Singapore">+65</option>
                            <option value="+60" data-country="Malaysia">+60</option>
                            <option value="+86" data-country="China">+86</option>
                            <option value="+81" data-country="Japan">+81</option>
                            <option value="+82" data-country="South Korea">+82</option>
                            <option value="+91" data-country="India">+91</option>
                            <option value="+61" data-country="Australia">+61</option>
                            <option value="+64" data-country="New Zealand">+64</option>
                            <option value="+66" data-country="Thailand">+66</option>
                            <option value="+84" data-country="Vietnam">+84</option>
                            <option value="+63" data-country="Philippines">+63</option>
                            <option value="+95" data-country="Myanmar">+95</option>
                            <option value="+855" data-country="Cambodia">+855</option>
                            <option value="+856" data-country="Laos">+856</option>
                            <option value="+673" data-country="Brunei">+673</option>
                            <option value="+852" data-country="Hong Kong">+852</option>
                            <option value="+853" data-country="Macau">+853</option>
                            <option value="+886" data-country="Taiwan">+886</option>
                            <option value="+49" data-country="Germany">+49</option>
                            <option value="+33" data-country="France">+33</option>
                            <option value="+39" data-country="Italy">+39</option>
                            <option value="+34" data-country="Spain">+34</option>
                            <option value="+31" data-country="Netherlands">+31</option>
                            <option value="+47" data-country="Norway">+47</option>
                            <option value="+46" data-country="Sweden">+46</option>
                            <option value="+45" data-country="Denmark">+45</option>
                            <option value="+358" data-country="Finland">+358</option>
                        </select>
                        <input type="text" name="phone" placeholder="{{ __('contact/form.phone_placeholder') }}"
                            class="w-full px-4 py-3 rounded-r-lg border border-transparent focus:border-[#666666] focus:ring-0 placeholder-[#666666] text-[#666666]">
                    </div>
                </div>

                <!-- Row 2 -->
                <div class="grid md:grid-cols-2 gap-6">
                    <input type="text" name="company" placeholder="{{ __('contact/form.company_placeholder') }}"
                        class="w-full px-4 py-3 rounded-lg border border-transparent focus:border-[#666666] focus:ring-0 placeholder-[#666666] text-[#666666]">
                    <input type="email" name="email" placeholder="{{ __('contact/form.email_placeholder') }}"
                        class="w-full px-4 py-3 rounded-lg border border-transparent focus:border-[#666666] focus:ring-0 placeholder-[#666666] text-[#666666]">
                </div>

                <!-- Row 3 -->
                <div class="grid md:grid-cols-2 gap-6">
                    <select name="industry"
                        class="w-full px-4 py-3 rounded-lg border border-transparent focus:border-[#666666] focus:ring-0 text-[#666666]">
                        <option value="">{{ __('contact/form.industry_placeholder') }}</option>
                        <option value="Finance">Finance</option>
                        <option value="Telekomunikasi">Telekomunikasi</option>
                        <option value="FnB">FnB</option>
                        <option value="Technology">Technology</option>
                        <option value="Oil & Gas">Oil & Gas</option>
                        <option value="Transportation">Transportation</option>
                        <option value="Hotel">Hotel</option>
                        <option value="Otomotif">Otomotif</option>
                        <option value="Media">Media</option>
                        <option value="Elektronik">Elektronik</option>
                        <option value="Banking">Banking</option>
                        <option value="Insurance">Insurance</option>
                        <option value="Manufacture">Manufacture</option>
                        <option value="Entertaiment & Leisure">Entertaiment & Leisure</option>
                        <option value="Plantation">Plantation</option>
                        <option value="Education & learning">Education & learning</option>
                        <option value="Travel or Accomodation">Travel or Accomodation</option>
                        <option value="Services">Services</option>
                        <option value="Community & Public Services">Community & Public Services</option>
                        <option value="Real Estate">Real Estate</option>
                        <option value="Gaming">Gaming</option>
                        <option value="Government">Government</option>
                        <option value="Pharmaceutical">Pharmaceutical</option>
                        <option value="Fashion">Fashion</option>
                        <option value="Cosmetics">Cosmetics</option>
                    </select>
                    <select name="services"
                        class="w-full px-4 py-3 rounded-lg border border-transparent focus:border-[#666666] focus:ring-0 text-[#666666]">
                        <option value="">{{ __('contact/form.service_placeholder') }}</option>
                        @foreach (__('contact/form.services') as $value => $label)
                            <option value="{{ $value }}">{{ $label }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Row 4 -->
                <div class="grid md:grid-cols-2 gap-6 items-start">
                    <select name="find_us"
                        class="w-full px-4 py-3 rounded-lg border border-transparent focus:border-[#666666] focus:ring-0 text-[#666666]">
                        <option value="">{{ __('contact/form.find_us_placeholder') }}</option>
                        @foreach (__('contact/form.find_us') as $value => $label)
                            <option value="{{ $value }}">{{ $label }}</option>
                        @endforeach
                    </select>

                    <!-- Radio -->
                    {{-- <div class="text-left">
                        <p class="text-sm text-[#666666] mb-2 font-medium">
                            {{ __('contact/form.radio_title') }}
                        </p>
                        <div class="flex items-center gap-6">
                            @foreach (__('contact/form.areas') as $value => $label)
                                <label class="flex items-center text-[#666666]">
                                    <input type="radio" name="area" value="{{ $value }}" class="mr-2">
                                    {{ $label }}
                                </label>
                            @endforeach
                        </div>
                    </div> --}}
                </div>

                <!-- Message -->
                <textarea name="message" placeholder="{{ __('contact/form.message_placeholder') }}"
                    class="w-full px-4 py-3 rounded-lg border border-transparent focus:border-[#666666] focus:ring-0 text-[#666666] h-32 placeholder-[#666666]"></textarea>

                <!-- Checkbox -->
                <label class="flex items-center space-x-2 text-[#666666] text-sm">
                    <input type="checkbox" class="rounded border-[#666666]">
                    <span>{{ __('contact/form.newsletter') }}</span>
                </label>

                <!-- Submit -->
                <div class="flex justify-center">
                    <button type="submit"
                        class="px-10 py-3 rounded-full bg-[#333333] text-white hover:bg-[#4d4d4d] transition text-sm font-medium">
                        {{ __('contact/form.submit') }}
                    </button>
                </div>
            </form>
        </div>

        <!-- SweetAlert -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        @if (session('success'))
            <script>
                Swal.fire({
                    icon: 'success',
                    title: '{{ __('contact/form.swal_title') }}',
                    text: '{{ session('success') }}',
                    showConfirmButton: false,
                    timer: 2000
                });
            </script>
        @endif
    </section>

    <!-- OFFICES & MAPS SECTION -->
    <section class="bg-white py-24 font-[Rubik]">
        <div class="max-w-7xl mx-auto px-6">

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                @forelse($branchOffices as $office)
                    <div
                        class="bg-white rounded-3xl shadow-md border border-gray-100 flex flex-col items-center text-center p-6 md:p-8">

                        <!-- MAP (square & padded) -->
                        <div class="w-full aspect-square rounded-2xl overflow-hidden mb-6">
                            @if ($office->address)
                                <iframe width="100%" height="100%" style="border:0;" loading="lazy" allowfullscreen
                                    referrerpolicy="no-referrer-when-downgrade"
                                    src="https://www.google.com/maps?q={{ urlencode($office->address) }}&output=embed">
                                </iframe>
                            @else
                                <div
                                    class="flex flex-col items-center justify-center h-full text-[#666666] bg-gray-50 rounded-2xl">
                                    <i class="fa-solid fa-map-location-dot text-3xl mb-2"></i>
                                    <p>Alamat belum tersedia.</p>
                                </div>
                            @endif
                        </div>

                        <!-- OFFICE DETAILS -->
                        <div class="flex flex-col items-center justify-center space-y-3">
                            <!-- Nama Kantor (Tebal & #666666) -->
                            <h3 class="text-xl font-bold text-[#666666]">
                                {{ $office->name }}
                            </h3>

                            <p class="text-[#666666] leading-relaxed">
                                {{ $office->address }}
                            </p>

                            @if ($office->phone)
                                <p class="text-[#666666] font-semibold">
                                    {{ $office->phone }}
                                </p>
                            @endif

                            @if ($office->email)
                                <p class="text-[#666666] font-medium">
                                    ✉️ {{ $office->email }}
                                </p>
                            @endif

                            @if ($office->website)
                                <a href="{{ $office->website }}" target="_blank"
                                    class="text-[#666666] font-medium hover:underline">
                                    🌐 {{ $office->website }}
                                </a>
                            @endif
                        </div>
                    </div>
                @empty
                    <p class="text-center text-[#666666] text-lg col-span-full font-[Rubik]">
                        {{ __('contact/form.no_branch') }}
                    </p>
                @endforelse
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
                    {!! __('home/insights.title') !!}
                </h2>
                <p class="text-gray-600 text-base sm:text-lg mt-2">
                    {{ __('home/insights.description') }}
                </p>
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
                            <p class="text-sm text-gray-500">{{ $blog->category->name }}</p>
                            <a href="{{ route('insight.show', $blog->slug) }}" class="block flex-grow">
                                <h3 class="text-lg font-medium text-[#666666] hover:text-[#666666] transition">
                                    <strong>{{ app()->getLocale() == 'id' ? $blog->title_id : $blog->title }}</strong>
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
                            <p class="text-xs text-gray-500">{{ $blog->category->name }}</p>
                            <a href="{{ route('insight.show', $blog->slug) }}" class="block flex-grow">
                                <h3 class="text-lg font-medium text-[#666666] hover:text-[#666666] transition">
                                <strong>{{ app()->getLocale() == 'id' ? $blog->title_id : $blog->title }}</strong>
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
