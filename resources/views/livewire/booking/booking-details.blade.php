<div class="p-8 bg-white rounded-lg shadow-lg border border-gray-200">
    <div class="flex items-center mb-8">
        <svg class="w-7 h-7 text-blue-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
        </svg>
        <h2 class="text-2xl font-semibold text-gray-800">Booking Details</h2>
    </div>

    <div class="space-y-6">
        <!-- Room Info -->
        <div>
            <h3 class="text-lg font-semibold text-gray-700 mb-2">Room Information</h3>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-500">Room Name</label>
                    <p class="mt-1 text-sm text-gray-900">{{ $booking->room->name }}</p>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-500">Building</label>
                    <p class="mt-1 text-sm text-gray-900">{{ $booking->room->building }}</p>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-500">Capacity</label>
                    <p class="mt-1 text-sm text-gray-900">{{ $booking->room->capacity }} persons</p>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-500">Facilities</label>
                    <p class="mt-1 text-sm text-gray-900">{{ $booking->room->facilities }}</p>
                </div>
            </div>
        </div>

        <!-- Booking Info -->
        <div>
            <h3 class="text-lg font-semibold text-gray-700 mb-2">Booking Information</h3>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-500">Date</label>
                    <p class="mt-1 text-sm text-gray-900">{{ $booking->date->format('d M Y') }}</p>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-500">Time</label>
                    <p class="mt-1 text-sm text-gray-900">
                        {{ $booking->waktu_mulai ? $booking->waktu_mulai->format('H:i') : '-' }} - 
                        {{ $booking->waktu_selesai ? $booking->waktu_selesai->format('H:i') : '-' }}
                    </p>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-500">Status</label>
                    <span @class([
                        'mt-1 inline-flex px-2 py-1 text-xs font-semibold rounded-full',
                        'bg-yellow-100 text-yellow-800' => $booking->status === 'pending',
                        'bg-green-100 text-green-800' => $booking->status === 'approved',
                        'bg-red-100 text-red-800' => $booking->status === 'rejected',
                        'bg-gray-100 text-gray-800' => $booking->status === 'cancelled',
                    ])>
                        {{ ucfirst($booking->status) }}
                    </span>
                </div>
            </div>
        </div>
    </div>

    <div class="flex justify-end mt-8 pt-8 border-t border-gray-200">
        <button type="button" wire:click="$dispatch('closeModal')"
            class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-lg text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200">
            <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
            Close
        </button>
    </div>
</div>