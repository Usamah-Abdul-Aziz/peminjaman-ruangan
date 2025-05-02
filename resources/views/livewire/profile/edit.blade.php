<div class="max-w-4xl mx-auto py-10 sm:px-6 lg:px-8">
    <h2 class="text-2xl font-bold mb-6">Edit Profile</h2>

    <form wire:submit="updateProfile" class="space-y-8">
        <!-- Profile Photo -->
        <div class="flex flex-col items-center mb-8">
            <div class="mb-4">
                @if ($temp_profile_photo)
                    <!-- Preview upload baru -->
                    <img src="{{ $temp_profile_photo->temporaryUrl() }}" 
                        alt="Profile Photo Preview" 
                        class="h-32 w-32 rounded-full object-cover border-2 border-gray-200 shadow-md">
                @elseif ($profile_photo)
                    <!-- Foto profil yang sudah ada -->
                    <img src="{{ asset('storage/' . $profile_photo) }}" 
                        alt="Profile Photo" 
                        class="h-32 w-32 rounded-full object-cover border-2 border-gray-200 shadow-md">
                @else
                    <!-- Inisial nama sebagai fallback -->
                    <div class="h-32 w-32 rounded-full bg-indigo-100 flex items-center justify-center border-2 border-gray-200 shadow-md">
                        <span class="text-3xl font-medium text-indigo-700">{{ $this->getInitials() }}</span>
                    </div>
                @endif
            </div>
            
            <div class="w-full max-w-md">
                <label for="profile_photo" class="block text-sm font-medium text-gray-700 mb-2">Profile Photo</label>
                <input wire:model="temp_profile_photo" 
                    type="file" 
                    id="profile_photo"
                    class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4
                    file:rounded-md file:border-0 file:text-sm file:font-semibold
                    file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
                @error('temp_profile_photo') 
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p> 
                @enderror
            </div>
        </div>

        <!-- Name -->
        <div class="space-y-2">
            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
            <input wire:model="name" id="name" type="text"
                class="mt-2 p-2.5 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            @error('name') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <!-- Email -->
        <div class="space-y-2">
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input wire:model="email" id="email" type="email"
                class="mt-2 p-2.5 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            @error('email') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <!-- Phone -->
        <div class="space-y-2">
            <label for="phone" class="block text-sm font-medium text-gray-700">Phone Number</label>
            <div class="relative mt-2">
                <div class="absolute inset-y-0 left-0 flex items-center px-3 pointer-events-none bg-gray-100 border border-r-0 border-gray-300 rounded-l-md">
                    <span class="text-gray-600 sm:text-sm">+62</span>
                </div>
                <input wire:model.live="phone" id="phone" type="tel"
                    class="pl-16 p-2.5 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                    placeholder="8xxxxxxxxxx">
            </div>
            <p class="text-sm text-gray-500">Format: 8xxxxxxxxxx (9-12 digits)</p>
            @error('phone') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <!-- Address -->
        <div class="space-y-2">
            <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
            <textarea wire:model="address" id="address"
                class="mt-2 p-2.5 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                rows="3"></textarea>
            @error('address') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="flex items-center justify-end">
            <button type="submit"
                class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-white hover:bg-indigo-700 focus:outline-none">
                Save
            </button>
        </div>
    </form>
</div>