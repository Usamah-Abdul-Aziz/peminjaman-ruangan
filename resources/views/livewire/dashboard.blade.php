<div class="flex min-h-screen">
  <!-- Main Content -->
  <main class="flex-1 bg-gray-100 p-8">
    <div class="bg-white rounded-lg shadow-md p-6">
      <h1 class="text-3xl font-bold text-gray-800 mb-4">Dashboard</h1>

      <p class="text-gray-600 mb-6">
        Welcome back, {{ Auth::user()->name }}! 🎉
      </p>

      <!-- Cards -->
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @if(Auth::user()->role === 'admin')
          <!-- Admin Cards -->
          <div class="bg-blue-100 p-4 rounded-lg shadow hover:shadow-lg transition">
            <h3 class="text-xl font-semibold text-blue-800">Rooms</h3>
            <p class="text-blue-600 mt-2">{{ $totalRooms }} Available Rooms</p>
            <a href="{{ route('admin.rooms') }}" class="text-blue-700 hover:underline mt-2 inline-block">Manage Rooms →</a>
          </div>

          <div class="bg-green-100 p-4 rounded-lg shadow hover:shadow-lg transition">
            <h3 class="text-xl font-semibold text-green-800">Bookings</h3>
            <p class="text-green-600 mt-2">{{ $pendingBookings }} Pending Requests</p>
            <a href="{{ route('admin.bookings.index') }}" class="text-green-700 hover:underline mt-2 inline-block">Review Bookings →</a>
          </div>

          <div class="bg-purple-100 p-4 rounded-lg shadow hover:shadow-lg transition">
            <h3 class="text-xl font-semibold text-purple-800">Users</h3>
            <p class="text-purple-600 mt-2">{{ $totalUsers }} Registered Users</p>
          </div>
        @else
          <!-- User Cards -->
          <div class="bg-blue-100 p-4 rounded-lg shadow hover:shadow-lg transition">
            <h3 class="text-xl font-semibold text-blue-800">My Bookings</h3>
            <p class="text-blue-600 mt-2">{{ $userBookings }} Active Bookings</p>
            <a href="{{ route('mybookings') }}" class="text-blue-700 hover:underline mt-2 inline-block">View Bookings →</a>
          </div>

          <div class="bg-green-100 p-4 rounded-lg shadow hover:shadow-lg transition">
            <h3 class="text-xl font-semibold text-green-800">Book a Room</h3>
            <p class="text-green-600 mt-2">Find and book available rooms</p>
            <a href="{{ route('booking.create') }}" class="text-green-700 hover:underline mt-2 inline-block">Book Now →</a>
          </div>

          <div class="bg-purple-100 p-4 rounded-lg shadow hover:shadow-lg transition">
            <h3 class="text-xl font-semibold text-purple-800">Calendar</h3>
            <p class="text-purple-600 mt-2">View room availability</p>
            <a href="{{ route('calendar.index') }}" class="text-purple-700 hover:underline mt-2 inline-block">Open Calendar →</a>
          </div>
        @endif
      </div>
    </div>
  </main>
</div>
