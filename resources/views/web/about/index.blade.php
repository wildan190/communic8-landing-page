{{-- resources/views/about/index.blade.php --}}
@extends('layouts.web')

@section('content')

<div class="relative">

{{-- Hero Section --}}
<section class="relative bg-cover bg-center min-h-[125vh] flex flex-col items-center justify-start text-center px-6"
    style="background-image: url('{{ asset('assets/img/sectionhero.png') }}');">
    <div class="absolute inset-0 bg-white/20"></div>

    {{-- Hero Title --}}
    <div class="relative z-10 pt-40">
        <h1 class="font-poppins text-2xl sm:text-3xl md:text-4xl font-semibold tracking-[0.5em] text-black mb-4">
            WE DON’T CHASE TRENDS
        </h1>
        <h1 class="font-poppins text-2xl sm:text-3xl md:text-4xl font-semibold tracking-[0.5em] text-black">
            WE CRAFT LEGACIES
        </h1>
    </div>

    {{-- Red Box PNG --}}
    <div class="absolute top-1/3 left-1/2 -translate-x-1/2 z-20">
        <img src="{{ asset('assets/img/redbox.png') }}" alt="Red Box"
            class="w-[420px] md:w-[520px] lg:w-[640px]">
    </div>

    {{-- About Us --}}
    <div class="relative z-10 mt-[36rem] md:mt-[40rem] lg:mt-[44rem] max-w-3xl pb-20">
        <h2 class="text-lg tracking-[0.3em] font-medium mb-6">ABOUT US</h2>
        <p class="text-gray-700 leading-relaxed">
            Communic8 is a creative digital agency based in Jakarta, dedicated to propel brands forward across the
            dynamic Southeast Asia region. <br><br>
            We pursue more than just digital fads. We delve into the core of our business, market trends, and
            audience behaviors, ensuring every strategy is built on a foundation of insight. <br><br>
            Our innate drive for boundless creativity and innovation transforms well-researched strategies into
            compelling out-of-the-box ideas and crafted digital experiences that not only engage but also inspire.
        </p>
    </div>
</section>


{{-- THE PHILOSOPHY --}}
<section class="relative overflow-visible z-10 bg-gradient-to-r from-gray-300 via-gray-200 to-gray-600 py-20 md:py-24 -mb-20">
  <div class="container max-w-7xl mx-auto px-4 sm:px-6 md:px-12 relative">

    {{-- Lamp (left) – big & overlapping top/bottom --}}
    <img
      src="{{ asset('assets/img/lamp.png') }}"
      alt="Lamp"
      class="hidden md:block absolute -top-40 left-0 w-[380px] lg:w-[500px] xl:w-[560px] drop-shadow-2xl z-40 pointer-events-none" />

    {{-- Mobile lamp (smaller, inline flow) --}}
    <div class="md:hidden mb-6 -mt-20 flex justify-center">
      <img src="{{ asset('assets/img/lamp.png') }}" alt="Lamp"
           class="w-64 drop-shadow-2xl">
    </div>

    {{-- Grid: spacer kiri untuk lamp, teks di kanan --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-10 md:gap-12 items-center">
      {{-- Spacer kolom lamp --}}
      <div class="hidden md:block"></div>

      {{-- Text Right --}}
      <div class="text-left text-white md:pl-6">
        <h2 class="font-poppins text-2xl sm:text-3xl md:text-4xl tracking-[0.35em] font-semibold mb-6">
          THE PHILOSOPHY
        </h2>
        <p class="leading-relaxed opacity-95">
          Communic8 is a creative digital agency focused on communication and innovation, committed to
          delivering exceptional results for clients. Leveraging strategic partnerships, superior services,
          and boundless creativity, we optimize business performance.
        </p>
        <p class="leading-relaxed mt-4 opacity-95">
          With 20 years of expertise, we aim to become a leading digital creative partner globally. We craft
          masterpiece programs, leaving a lasting legacy in the global creative industry.
        </p>
        <p class="leading-relaxed mt-4 opacity-95">
          We design integrated solutions blending strategy, creativity, technical expertise and digital
          intelligence—fueled by strategic thinking, creative passion, technical precision and digital innovation.
        </p>
      </div>
    </div>
  </div>
</section>

{{-- WHY OUR PARTNER CHOOSE US --}}
<section class="relative pt-56 pb-24 bg-white">
  <div class="container max-w-6xl mx-auto px-4 sm:px-6 md:px-12">
    
    {{-- Title --}}
    <div class="text-center mb-20">
      <h2 class="font-poppins text-2xl sm:text-3xl md:text-4xl tracking-[0.35em] font-semibold mb-6">
        WHY OUR PARTNER <br class="sm:hidden"> CHOOSE US
      </h2>
      <p class="text-gray-600 max-w-3xl mx-auto">
        Our approach is defined by three core principles that guide every project we undertake. 
        This is our commitment to every client, ensuring we not only meet your goals but exceed them with exceptional value.
      </p>
    </div>

    {{-- List Items --}}
    <div class="space-y-16">
      {{-- Item 1 --}}
      <div class="flex items-center gap-10">
        <img src="{{ asset('assets/img/dummy/dummy3.png') }}" alt="Creative Thinking"
             class="w-48 h-48 object-cover rounded-lg shadow-xl flex-shrink-0">
        <div>
          <h3 class="font-semibold text-2xl mb-3">Creative Strategic Thinking</h3>
          <p class="text-gray-600 leading-relaxed">
            We believe that powerful creativity must be guided by sharp strategy. 
            Our team provides strategies that are relevant with the latest trend according to your needs, 
            ensuring every idea is not only imaginative but also purposeful. 
            We specialize in wrapping these strategies in out-of-the-box concepts with creative and different thinking 
            that cut through the noise and deliver your message with real impact.
          </p>
        </div>
      </div>

      {{-- Item 2 --}}
      <div class="flex items-center gap-10">
        <img src="{{ asset('assets/img/dummy/dummy3.png') }}" alt="Everlasting Partnership"
             class="w-48 h-48 object-cover rounded-lg shadow-xl flex-shrink-0">
        <div>
          <h3 class="font-semibold text-2xl mb-3">An Everlasting Partnership</h3>
          <p class="text-gray-600 leading-relaxed">
            Your success is our success. We are committed to building lasting relationships 
            founded on good communication as we fulfill your objectives, desires and wishes to be achieved. 
            We work as a seamless extension of your team, providing dedicated service and a collaborative spirit 
            that transforms business goals into shared victories.
          </p>
        </div>
      </div>

      {{-- Item 3 --}}
      <div class="flex items-center gap-10">
        <img src="{{ asset('assets/img/dummy/dummy3.png') }}" alt="Legacy of Results"
             class="w-48 h-48 object-cover rounded-lg shadow-xl flex-shrink-0">
        <div>
          <h3 class="font-semibold text-2xl mb-3">A Legacy of Proven Results</h3>
          <p class="text-gray-600 leading-relaxed">
            Our commitment is backed by a legacy of delivering tangible outcomes. 
            With a team that holds over 20 years of experience, we stand at the forefront of tried-and-true methodologies. 
            We don’t just promise results, our track record is built on proving them.
          </p>
        </div>
      </div>
    </div>
  </div>
</section>


</div>




@endsection
