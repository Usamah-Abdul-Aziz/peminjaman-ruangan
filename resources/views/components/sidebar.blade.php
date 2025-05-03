<div x-data="{ isOpen: localStorage.getItem('sidebarOpen') === 'true' }" class="min-h-screen bg-white border-r border-gray-200 transition-all duration-300 relative"
  :class="isOpen ? 'w-64' : 'w-20'">

  <!-- Toggle Button -->
  <button @click="isOpen = !isOpen; localStorage.setItem('sidebarOpen', isOpen)"
    class="absolute top-4 bg-white rounded-full p-1.5 border border-gray-200 shadow-sm" :class="isOpen ? '-right-3' : '-right-3'">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-gray-600"
      :class="isOpen ? 'rotate-0' : 'rotate-180'">
      <path stroke-linecap="round" stroke-linejoin="round" x-show="isOpen" d="M15.75 19.5 8.25 12l7.5-7.5" />
      <path stroke-linecap="round" stroke-linejoin="round" x-show="!isOpen" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
    </svg>
  </button>

  <!-- Logo -->
  <div class="flex items-center justify-center h-16 border-b">
    <img src="{{ asset('images/logo-untirta.png') }}" alt="Logo" class="h-10 w-10">
    <span x-show="isOpen" x-transition:enter="transition-opacity duration-300" class="ml-3 font-semibold text-gray-800">SIPIR</span>
  </div>

  <!-- Navigation -->
  <nav class="mt-6 px-2">
    <div class="space-y-4">
      <!-- Menu Section -->
      <div class="px-3 text-xs font-semibold text-gray-500 uppercase tracking-wider" x-show="isOpen">
        MENU
      </div>

      <!-- Dashboard -->
      <a href="{{ route('dashboard') }}"
        class="flex items-center px-3 py-2 text-sm rounded-lg transition-colors duration-200 {{ request()->routeIs('dashboard') ? 'bg-blue-50 text-blue-600' : 'text-gray-600 hover:bg-gray-100' }}"
        :class="!isOpen ? 'justify-center' : ''">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
        </svg>
        <span class="ml-3" x-show="isOpen" x-transition:enter="transition-opacity duration-300">Dashboard</span>
      </a>

      <!-- Profile -->
      <a href="{{ route('profile.edit') }}"
        class="flex items-center px-3 py-2 text-sm rounded-lg transition-colors duration-200 {{ request()->routeIs('profile.edit') ? 'bg-blue-50 text-blue-600' : 'text-gray-600 hover:bg-gray-100' }}"
        :class="!isOpen ? 'justify-center' : ''">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
        </svg>
        <span class="ml-3" x-show="isOpen" x-transition:enter="transition-opacity duration-300">Profile</span>
      </a>

      <!-- Halaman Booking -->
      <a href="{{ route('calendar.index') }}"
        class="flex items-center px-3 py-2 text-sm rounded-lg transition-colors duration-200 {{ request()->routeIs('calendar.index') ? 'bg-blue-50 text-blue-600' : 'text-gray-600 hover:bg-gray-100' }}"
        :class="!isOpen ? 'justify-center' : ''">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
        </svg>
        <span class="ml-3" x-show="isOpen" x-transition:enter="transition-opacity duration-300">Booking</span>
      </a>

      <!-- My Bookings -->
      <a href="{{ route('mybookings') }}"
        class="flex items-center px-3 py-2 text-sm rounded-lg transition-colors duration-200 {{ request()->routeIs('mybookings') ? 'bg-blue-50 text-blue-600' : 'text-gray-600 hover:bg-gray-100' }}"
        :class="!isOpen ? 'justify-center' : ''">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
        </svg>
        <span class="ml-3" x-show="isOpen" x-transition:enter="transition-opacity duration-300">My Bookings</span>
      </a>

      <!-- Virtual Tour -->
      <a href="{{ route('virtual-tour') }}"
        class="flex items-center px-3 py-2 text-sm rounded-lg transition-colors duration-200 {{ request()->routeIs('virtual-tour') ? 'bg-blue-50 text-blue-600' : 'text-gray-600 hover:bg-gray-100' }}"
        :class="!isOpen ? 'justify-center' : ''">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
        </svg>
        <span class="ml-3" x-show="isOpen" x-transition:enter="transition-opacity duration-300">Virtual Tour</span>
      </a>

      <!-- Admin Section -->
      @if(Auth::check() && Auth::user()->role === 'admin')
        <div class="mt-8" :class="!isOpen ? 'border-t border-gray-200 pt-4' : ''">
          <div class="px-3 text-xs font-semibold text-gray-500 uppercase tracking-wider" x-show="isOpen">
            ADMIN
          </div>

          <!-- Manage Rooms -->
          <a href="{{ route('admin.rooms') }}"
            class="flex items-center px-3 py-2 mt-3 text-sm rounded-lg transition-colors duration-200 {{ request()->routeIs('admin.rooms') ? 'bg-red-50 text-red-600' : 'text-gray-600 hover:bg-gray-100' }}"
            :class="!isOpen ? 'justify-center' : ''">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
            </svg>
            <span class="ml-3" x-show="isOpen" x-transition:enter="transition-opacity duration-300">Manage Rooms</span>
          </a>

          <!-- Manage Bookings -->
          <a href="{{ route('admin.bookings.index') }}"
            class="flex items-center px-3 py-2 mt-2 text-sm rounded-lg transition-colors duration-200 {{ request()->routeIs('admin.bookings.*') ? 'bg-red-50 text-red-600' : 'text-gray-600 hover:bg-gray-100' }}"
            :class="!isOpen ? 'justify-center' : ''">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
            </svg>
            <span class="ml-3" x-show="isOpen" x-transition:enter="transition-opacity duration-300">Manage Bookings</span>
          </a>
        </div>
      @endif
    </div>
  </nav>
</div>
