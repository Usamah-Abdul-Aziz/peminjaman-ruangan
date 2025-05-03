<div class="p-6 bg-white rounded-lg">
  <div class="flex items-center mb-4 text-green-600">
    <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
    </svg>
    <h3 class="text-lg font-semibold">Approve Confirmation</h3>
  </div>

  <p class="mb-6 text-gray-600">
    Are you sure you want to approve booking for <span class="font-semibold">{{ $booking->room->name }}</span> by
    <span class="font-semibold">{{ $booking->user->name }}</span>?
  </p>

  <div class="flex justify-end space-x-3">
    <button wire:click="$dispatch('closeModal')"
      class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50">
      Cancel
    </button>
    <button wire:click="approve" class="px-4 py-2 text-sm font-medium text-white bg-green-600 rounded-lg hover:bg-green-700">
      Approve Booking
    </button>
  </div>
</div>
