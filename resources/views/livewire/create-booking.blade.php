<div class="p-8 bg-white shadow-lg border border-gray-200">
    <div class="flex items-center mb-8">
        <svg class="w-7 h-7 text-indigo-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
        </svg>
        <h2 class="text-2xl font-semibold text-gray-800">Room Booking Form</h2>
    </div>

    <form wire:submit="createBooking" class="space-y-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Building Selection -->
            <div class="col-span-2">
                <label for="building" class="block text-sm font-medium text-gray-700 mb-2">Building</label>
                <div class="relative rounded-lg shadow-sm">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                    </div>
                    <select wire:model.live="selectedBuilding" id="building" 
                            class="pl-10 w-full py-3 rounded-lg border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 shadow-sm text-base">
                        <option value="">-- Select Building --</option>
                        @foreach($buildings as $building)
                            <option value="{{ $building }}">{{ $building }}</option>
                        @endforeach
                    </select>
                </div>
                @error('selectedBuilding') <span class="text-red-500 text-xs mt-2">{{ $message }}</span> @enderror
            </div>

            <!-- Room Selection -->
            <div class="col-span-2">
                <label for="selectedRoom" class="block text-sm font-medium text-gray-700 mb-2">Room</label>
                <div class="relative rounded-lg shadow-sm">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                    </div>
                    <select wire:model.live="selectedRoom" id="selectedRoom" 
                            class="pl-10 w-full py-3 rounded-lg border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 shadow-sm text-base">
                        <option value="">-- Select Room --</option>
                        @foreach($rooms as $room)
                            <option value="{{ $room->id }}">{{ $room->name }}</option>
                        @endforeach
                    </select>
                </div>
                @error('selectedRoom') <span class="text-red-500 text-xs mt-2">{{ $message }}</span> @enderror
            </div>

            <!-- Room Info -->
            @if($roomDetails)
            <div class="col-span-2 bg-gray-50 rounded-lg p-4 border border-gray-200">
                <h4 class="text-lg font-semibold mb-4 text-gray-800 flex items-center">
                    <svg class="w-5 h-5 mr-2 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    Room Information
                </h4>
                <div class="space-y-2">
                    <p class="flex items-center text-gray-600">
                        <span class="font-medium mr-2">Description:</span> 
                        {{ $roomDetails['description'] ?? '-' }}
                    </p>
                    <p class="flex items-center text-gray-600">
                        <span class="font-medium mr-2">Capacity:</span>
                        {{ $roomDetails['capacity'] ?? '-' }} people
                    </p>
                    <p class="flex items-center text-gray-600">
                        <span class="font-medium mr-2">Facilities:</span>
                        {{ $roomDetails['facilities'] ?? '-' }}
                    </p>
                </div>
            </div>
            @endif

            <!-- Date -->
            <div>
                <label for="date" class="block text-sm font-medium text-gray-700 mb-2">Booking Date</label>
                <div class="relative rounded-lg shadow-sm">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <input type="date" wire:model="date" id="date"
                           class="pl-10 w-full py-3 rounded-lg border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 shadow-sm text-base">
                </div>
                @error('date') <span class="text-red-500 text-xs mt-2">{{ $message }}</span> @enderror
            </div>

            <!-- Time -->
            <div class="space-y-4">
                <div>
                    <label for="waktu_mulai" class="block text-sm font-medium text-gray-700 mb-2">Start Time</label>
                    <div class="relative rounded-lg shadow-sm">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <input type="time" wire:model="waktu_mulai" id="waktu_mulai"
                               class="pl-10 w-full py-3 rounded-lg border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 shadow-sm text-base">
                    </div>
                    @error('waktu_mulai') <span class="text-red-500 text-xs mt-2">{{ $message }}</span> @enderror
                </div>
                
                <div>
                    <label for="waktu_selesai" class="block text-sm font-medium text-gray-700 mb-2">End Time</label>
                    <div class="relative rounded-lg shadow-sm">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <input type="time" wire:model="waktu_selesai" id="waktu_selesai"
                               class="pl-10 w-full py-3 rounded-lg border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 shadow-sm text-base">
                    </div>
                    @error('waktu_selesai') <span class="text-red-500 text-xs mt-2">{{ $message }}</span> @enderror
                </div>
            </div>
        </div>

        <div class="flex justify-end space-x-4 pt-8 mt-8 border-t border-gray-200">
            <a href="{{ route('dashboard') }}"
               class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-lg text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors duration-200">
                <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
                Cancel
            </a>
            <button type="submit"
                    class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-lg text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors duration-200">
                <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
                Submit Booking
            </button>
        </div>
    </form>
</div>