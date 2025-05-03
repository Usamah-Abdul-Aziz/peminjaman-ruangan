<div>
  <section class="mt-10">
    <div class="mx-auto max-w-screen-xl px-4 lg:px-20">
      <!-- Tambahkan judul di sini -->
      <div class="mb-6">
        <h1 class="text-2xl font-semibold text-gray-800">My Bookings</h1>
      </div>

      <div class="bg-white relative shadow-md sm:rounded-lg overflow-hidden">
        <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
          <div class="w-full md:w-1/2">
            <div class="relative">
              <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <svg class="w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd"
                    d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                    clip-rule="evenodd"></path>
                </svg>
              </div>
              <input wire:model.live.debounce.300ms="search" type="text"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2"
                placeholder="Search room name...">
            </div>
          </div>
          <div class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3">
            <select wire:model.live="filter"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5">
              <option value="all">All Status</option>
              <option value="pending">Pending</option>
              <option value="approved">Approved</option>
              <option value="rejected">Rejected</option>
              <option value="cancelled">Cancelled</option>
            </select>
          </div>
        </div>
        <div class="overflow-x-auto">
          <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
              <tr>
                <th scope="col" class="px-4 py-3">Room</th>
                <th scope="col" class="px-4 py-3">Date</th>
                <th scope="col" class="px-4 py-3">Time</th>
                <th scope="col" class="px-4 py-3">Status</th>
                <th scope="col" class="px-4 py-3">Actions</th>
              </tr>
            </thead>
            <tbody>
              @if ($bookings->isEmpty())
                <tr>
                  <td colspan="5" class="px-4 py-8 text-center">
                    <div class="flex flex-col items-center justify-center space-y-3">
                      <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                      </svg>

                      @if ($filter === 'all')
                        <p class="text-gray-500 text-base">You haven't booked any rooms yet</p>
                      @elseif($filter === 'pending')
                        <p class="text-gray-500 text-base">You don't have any pending bookings</p>
                      @elseif($filter === 'approved')
                        <p class="text-gray-500 text-base">You don't have any approved bookings</p>
                      @elseif($filter === 'rejected')
                        <p class="text-gray-500 text-base">You don't have any rejected bookings</p>
                      @elseif($filter === 'cancelled')
                        <p class="text-gray-500 text-base">You don't have any cancelled bookings</p>
                      @endif

                      @if ($filter === 'all' || $filter === 'pending')
                        <a href="{{ route('booking.create') }}"
                          class="inline-flex items-center px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-lg hover:bg-blue-700">
                          Book a Room Now
                        </a>
                      @endif
                    </div>
                  </td>
                </tr>
              @else
                @foreach ($bookings as $booking)
                  <tr class="border-b">
                    <td class="px-4 py-3 font-medium text-gray-900">
                      {{ $booking->room->name }}
                    </td>
                    <td class="px-4 py-3">
                      {{ $booking->date->format('d M Y') }}
                    </td>
                    <td class="px-4 py-3">
                      @if ($booking->waktu_mulai && $booking->waktu_selesai)
                        {{ $booking->waktu_mulai->format('H:i') }} - {{ $booking->waktu_selesai->format('H:i') }}
                      @else
                        <span class="text-gray-400">Not specified</span>
                      @endif
                    </td>
                    <td class="px-4 py-3">
                      <span
                        class="px-2 py-1 text-xs font-semibold rounded-full
                                                {{ $booking->status === 'approved' ? 'bg-green-100 text-green-800' : '' }}
                                                {{ $booking->status === 'pending' ? 'bg-yellow-100 text-yellow-800' : '' }}
                                                {{ $booking->status === 'rejected' ? 'bg-red-100 text-red-800' : '' }}
                                                {{ $booking->status === 'cancelled' ? 'bg-gray-100 text-gray-800' : '' }}">
                        {{ ucfirst($booking->status) }}
                      </span>
                    </td>
                    <td class="px-4 py-3 flex items-center space-x-2">
                      <button wire:click="$dispatch('openModal', { component: 'booking.booking-details', arguments: { booking: {{ $booking->id }} }})"
                        class="inline-flex items-center text-blue-600 hover:text-blue-800 text-sm font-medium">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                          class="w-4 h-4 mr-1">
                          <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                          <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        Details
                      </button>
                      @if ($booking->status === 'pending')
                        <button
                          wire:click="$dispatch('openModal', { component: 'booking.cancel-booking', arguments: { booking: {{ $booking->id }} }})"
                          class="inline-flex items-center text-red-600 hover:text-red-800 text-sm font-medium">
                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                            class="w-4 h-4 mr-1">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                          </svg>
                          Cancel
                        </button>
                      @endif
                    </td>
                  </tr>
                @endforeach
              @endif
            </tbody>
          </table>
        </div>
        <div class="py-4 px-3">
          <div class="flex space-x-4 items-center mb-3">
            <label class="w-32 text-sm font-medium text-gray-900">Per Page</label>
            <select wire:model.live="perPage"
              class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
              <option value="5">5</option>
              <option value="10">10</option>
              <option value="20">20</option>
              <option value="50">50</option>
            </select>
          </div>
          {{ $bookings->links() }}
        </div>
      </div>
    </div>
  </section>
</div>
