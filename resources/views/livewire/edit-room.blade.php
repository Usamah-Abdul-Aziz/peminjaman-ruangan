<div class="p-8 bg-white rounded-lg shadow-lg border border-gray-200">
  <div class="flex items-center mb-8">
    <svg class="w-7 h-7 text-indigo-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
        d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
    </svg>
    <h2 class="text-2xl font-semibold text-gray-800">Edit Room</h2>
  </div>

  <form wire:submit.prevent="save" class="space-y-8">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
      <!-- Name Field -->
      <div class="col-span-2">
        <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Room Name</label>
        <div class="relative rounded-lg shadow-sm">
          <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
            </svg>
          </div>
          <input type="text" wire:model="name" id="name"
            class="pl-10 w-full py-3 rounded-lg border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 shadow-sm text-base">
        </div>
        @error('name')
          <span class="text-red-500 text-xs mt-2">{{ $message }}</span>
        @enderror
      </div>

      <!-- Description Field -->
      <div class="col-span-2">
        <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Description</label>
        <div class="relative rounded-lg shadow-sm">
          <textarea wire:model="description" id="description" rows="4"
            class="w-full px-4 py-4 rounded-lg border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 shadow-sm text-base resize-y min-h-[120px]"
            placeholder="Describe the room features, location, or any special notes..."></textarea>
        </div>
        @error('description')
          <span class="text-red-500 text-xs mt-2">{{ $message }}</span>
        @enderror
      </div>

      <!-- Capacity Field -->
      <div>
        <label for="capacity" class="block text-sm font-medium text-gray-700 mb-2">Capacity</label>
        <div class="relative rounded-lg shadow-sm">
          <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
            </svg>
          </div>
          <input type="number" wire:model="capacity" id="capacity" min="0"
            class="pl-10 w-full py-3 rounded-lg border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 shadow-sm text-base">
        </div>
        @error('capacity')
          <span class="text-red-500 text-xs mt-2">{{ $message }}</span>
        @enderror
      </div>

      <!-- Building Field -->
      <div>
        <label for="building" class="block text-sm font-medium text-gray-700 mb-2">Building</label>
        <div class="relative rounded-lg shadow-sm">
          <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
            </svg>
          </div>
          <input type="text" wire:model="building" id="building"
            class="pl-10 w-full py-3 rounded-lg border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 shadow-sm text-base">
        </div>
        @error('building')
          <span class="text-red-500 text-xs mt-2">{{ $message }}</span>
        @enderror
      </div>

      <!-- Facilities Field -->
      <div class="col-span-2">
        <label for="facilities" class="block text-sm font-medium text-gray-700 mb-2">Facilities</label>
        <div class="relative rounded-lg shadow-sm">
          <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
            </svg>
          </div>
          <input type="text" wire:model="facilities" id="facilities"
            class="pl-10 w-full py-3 rounded-lg border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 shadow-sm text-base"
            placeholder="e.g. Projector, Whiteboard, AC">
        </div>
        @error('facilities')
          <span class="text-red-500 text-xs mt-2">{{ $message }}</span>
        @enderror
      </div>
    </div>

    <div class="flex justify-end space-x-4 pt-8 mt-8 border-t border-gray-200">
      <button type="button" wire:click="$dispatch('closeModal')"
        class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-lg text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors duration-200">
        <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
        Cancel
      </button>
      <button type="submit"
        class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-lg text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors duration-200">
        <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
        </svg>
        Save Changes
      </button>
    </div>
  </form>
</div>
