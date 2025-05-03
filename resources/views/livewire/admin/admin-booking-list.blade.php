<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
  <div class="flex justify-between items-center mb-8">
    <h2 class="text-3xl font-bold text-gray-800">Room Booking List</h2>
  </div>

  <!-- Filter -->
  <div class="bg-white p-6 rounded-lg shadow mb-8">
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
      <div>
        <label for="search" class="block text-sm font-medium text-gray-700 mb-2">Search User Name</label>
        <div class="relative rounded-md shadow-sm">
          <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
          </div>
          <input type="text" wire:model.live="search" id="search"
            class="pl-10 w-full h-11 rounded-lg border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 text-base" placeholder="Search...">
        </div>
      </div>

      <div>
        <label for="status" class="block text-sm font-medium text-gray-700 mb-2">Status</label>
        <select wire:model.live="status" id="status"
          class="w-full h-11 rounded-lg border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 text-base">
          <option value="">All Status</option>
          <option value="pending">Pending</option>
          <option value="approved">Approved</option>
          <option value="rejected">Rejected</option>
          <option value="cancelled">Cancelled</option>
        </select>
      </div>

      <div>
        <label for="date_range" class="block text-sm font-medium text-gray-700 mb-2">Date Range</label>
        <div class="grid grid-cols-2 gap-3">
          <input type="date" wire:model.live="startDate" id="start_date"
            class="w-full h-11 rounded-lg border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 text-base" placeholder="Dari">
          <input type="date" wire:model.live="endDate" id="end_date"
            class="w-full h-11 rounded-lg border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 text-base" placeholder="Sampai">
        </div>
      </div>

      <div class="flex items-end">
        <button wire:click="resetFilters"
          class="w-full h-11 inline-flex justify-center items-center px-6 py-2 rounded-lg text-sm font-medium text-gray-700 bg-gray-50 border border-gray-300 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors duration-200">
          <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
          </svg>
          Reset Filter
        </button>
      </div>
    </div>
  </div>

  <!-- Table -->
  <div class="bg-white shadow rounded-lg overflow-hidden">
    <div class="overflow-x-auto">
      <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
          <tr>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">User Name</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Room</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Time</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
            <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
          </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
          @forelse($pendingBookings as $booking)
            <tr wire:key="{{ $booking->id }}" class="hover:bg-gray-50">
              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                {{ $booking->user->name }}
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                {{ $booking->room->name }}
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                {{ \Carbon\Carbon::parse($booking->date)->format('d M Y') }}
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                {{ $booking->waktu_mulai ? \Carbon\Carbon::parse($booking->waktu_mulai)->format('H:i') : '-' }} -
                {{ $booking->waktu_selesai ? \Carbon\Carbon::parse($booking->waktu_selesai)->format('H:i') : '-' }}
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <span @class([
                    'px-2 py-1 text-xs font-semibold rounded-full',
                    'bg-yellow-100 text-yellow-800' => $booking->status === 'pending',
                    'bg-green-100 text-green-800' => $booking->status === 'approved',
                    'bg-red-100 text-red-800' => $booking->status === 'rejected',
                    'bg-gray-100 text-gray-800' => $booking->status === 'cancelled',
                ])>
                  {{ ucfirst($booking->status) }}
                </span>
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-center text-sm space-x-1">
                <button wire:click="$dispatch('openModal', { component: 'admin.booking-list.details', arguments: { booking: {{ $booking->id }} }})"
                  class="inline-flex items-center px-2.5 py-1.5 border border-gray-300 text-xs font-medium rounded text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
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
                    wire:click="$dispatch('openModal', { component: 'admin.booking-list.approve-booking', arguments: { booking: {{ $booking->id }} }})"
                    class="inline-flex items-center px-2.5 py-1.5 border border-transparent text-xs font-medium rounded shadow-sm text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    Approve
                  </button>
                  <button
                    wire:click="$dispatch('openModal', { component: 'admin.booking-list.reject-booking', arguments: { booking: {{ $booking->id }} }})"
                    class="inline-flex items-center px-2.5 py-1.5 border border-transparent text-xs font-medium rounded shadow-sm text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                    Reject
                  </button>
                @endif
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="6" class="px-6 py-10 text-center text-gray-500 text-sm">
                <div class="flex flex-col items-center">
                  <svg class="w-12 h-12 text-gray-400 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                  </svg>
                  <p class="font-medium">No booking requests found</p>
                  <p class="text-gray-400">Please try different filters</p>
                </div>
              </td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>

    <div class="px-6 py-4 border-t border-gray-200">
      <div class="flex flex-col sm:flex-row items-center justify-between gap-4">
        <div class="flex items-center gap-4">
          <label class="text-sm font-medium text-gray-900">Per Page</label>
          <select wire:model.live="perPage"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5">
            <option value="5">5</option>
            <option value="10">10</option>
            <option value="20">20</option>
            <option value="50">50</option>
          </select>
        </div>
        <div class="w-full sm:w-auto">
          <!-- Updated pagination links with appends -->
          {{ $pendingBookings->links() }}
        </div>
      </div>
    </div>
  </div>
</div>
