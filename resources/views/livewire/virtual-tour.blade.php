<div>
  <!-- Hero Section with Slider -->
  <div class="h-[90svh] md:h-[85svh] min-h-[550px] w-full bg-stone-10" data-theme="dark">
    <div class="relative h-full" role="region" aria-roledescription="carousel">
      <div class="overflow-hidden h-full">
        <div class="flex h-full transition-transform duration-500" style="transform: translateX(-{{ $currentSlide * 100 }}%)">
          <!-- Slide 1 -->
          <div class="min-w-full shrink-0">
            <section class="relative h-full">
              <iframe class="w-full h-full object-cover absolute"
                src="https://www.youtube.com/embed/gpac_4wS_Vw?autoplay=1&mute=1&loop=1&playlist=gpac_4wS_Vw&controls=0&showinfo=0&modestbranding=1&start=10"
                allowfullscreen>
              </iframe>
              <!-- Content overlay -->
              <div class="absolute inset-0 flex items-center justify-center text-white">
                <div class="text-center">
                  <img src="/images/dashboard_logo.png" alt="Dashboard Logo" class="mx-auto mb-4 w-[300px] md:w-[370px]">
                  <p class="text-lg mb-6">Official digital service portal of the Faculty of Engineering UNTIRTA for room reservations.</p>
                  <div class="flex justify-center gap-4">
                    <a href="https://linktr.ee/VirtualTourTeknikUntirta" target="_blank"
                      class="px-6 py-2 bg-white text-black rounded-full hover:bg-gray-100 transition">
                      Explore
                    </a>
                    <a href="https://www.youtube.com/@ftuntirta.official" target="_blank"
                      class="px-6 py-2 bg-white text-black rounded-full hover:bg-gray-100 transition">
                      Youtube
                    </a>
                  </div>
                </div>
              </div>
            </section>
          </div>

          <!-- Slide 2 -->
          <div class="min-w-full shrink-0">
            <!-- Similar structure as slide 1 but with different content -->
          </div>
        </div>
      </div>

      <!-- Navigation Buttons -->
      <button wire:click="prevSlide" class="absolute left-4 top-1/2 -translate-y-1/2 bg-white rounded-full p-2 hidden md:block">
        <!-- Previous arrow icon -->
      </button>
      <button wire:click="nextSlide" class="absolute right-4 top-1/2 -translate-y-1/2 bg-white rounded-full p-2 hidden md:block">
        <!-- Next arrow icon -->
      </button>

      <!-- Slide Indicators -->
      <div class="absolute bottom-4 left-1/2 -translate-x-1/2 flex gap-2">
        @for ($i = 0; $i < 2; $i++)
          <button wire:click="$set('currentSlide', {{ $i }})"
            class="w-3 h-3 rounded-full {{ $i === $currentSlide ? 'bg-white' : 'bg-white/50' }}">
          </button>
        @endfor
      </div>
    </div>
  </div>

  <!-- Location Cards -->
  <section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4">
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        @foreach ($locations as $location)
          <a href="{{ $location['url'] }}" target="_blank" class="p-8 rounded-xl transition-transform hover:-translate-y-1"
            style="background-color: {{ $location['color'] }}">
            <h3 class="text-xl font-bold text-white mb-4">{{ $location['title'] }}</h3>
            <div class="flex justify-between items-center">
              <span class="text-white">Explore →</span>
            </div>
          </a>
        @endforeach
      </div>
    </div>
  </section>

  <!-- Maps Section -->
  <section class="bg-gray-100 py-16">
    <div class="max-w-7xl mx-auto px-4">
      <div class="bg-white rounded-xl shadow-lg p-8">
        <h2 class="text-3xl font-bold text-gray-800 mb-6">Faculty of Engineering UNTIRTA Location</h2>

        <!-- Maps container with better aspect ratio -->
        <div class="relative w-full h-0 pb-[56.25%] mb-6">
          <iframe class="absolute top-0 left-0 w-full h-full rounded-lg"
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3967.9883110569804!2d106.02950537553521!3d-5.996339958913829!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e418e2782651571%3A0x249411dd80bfd66e!2sEngineering%20Faculty%20of%20Sultan%20Ageng%20Tirtayasa%20University!5e0!3m2!1sen!2sid!4v1746089556039!5m2!1sen!2sid"
            style="border:0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
          </iframe>
        </div>

        <div class="flex items-center gap-4 text-gray-600">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
              clip-rule="evenodd" />
          </svg>
          <p class="text-sm">
            Jend. Sudirman Street Km. 3, Kotabaru, Serang District, Serang City, Banten 42116
          </p>
        </div>
      </div>
    </div>
  </section>
</div>
