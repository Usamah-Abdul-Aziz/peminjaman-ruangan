<div class="p-6 bg-white rounded-lg">
  <div class="flex items-center mb-4 text-red-600">
    <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
        d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
    </svg>
    <h3 class="text-lg font-semibold">Reject Confirmation</h3>
  </div>

  <p class="mb-6 text-gray-600">
    Are you sure you want to reject booking for <span class="font-semibold">{{ $booking->room->name }}</span> by
    <span class="font-semibold">{{ $booking->user->name }}</span>?
  </p>

  <div class="flex justify-end space-x-3">
    <button wire:click="$dispatch('closeModal')"
      class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50">
      Cancel
    </button>
    <button wire:click="reject" class="px-4 py-2 text-sm font-medium text-white bg-red-600 rounded-lg hover:bg-red-700">
      Reject Booking
    </button>
  </div>
</div>
