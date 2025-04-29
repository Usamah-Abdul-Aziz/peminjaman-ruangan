<div class="flex min-h-screen">
  @include('layouts.sidebar')

  <!-- Main Content -->
  <main class="flex-1 bg-gray-100 p-8">
    <div class="bg-white rounded-lg shadow-md p-6">
      <h1 class="text-3xl font-bold text-gray-800 mb-4">Dashboard</h1>

      <p class="text-gray-600 mb-6">
        Welcome back, {{ Auth::user()->name }}! 🎉
      </p>

      <!-- Cards -->
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <div class="bg-blue-100 p-4 rounded-lg shadow hover:shadow-lg transition">
          <h3 class="text-xl font-semibold text-blue-800">Bookings</h3>
          <p class="text-blue-600 mt-2">Lihat semua peminjaman ruangan.</p>
        </div>

        <div class="bg-green-100 p-4 rounded-lg shadow hover:shadow-lg transition">
          <h3 class="text-xl font-semibold text-green-800">Profile</h3>
          <p class="text-green-600 mt-2">Edit profil kamu disini.</p>
        </div>

        <div class="bg-purple-100 p-4 rounded-lg shadow hover:shadow-lg transition">
          <h3 class="text-xl font-semibold text-purple-800">Settings</h3>
          <p class="text-purple-600 mt-2">Pengaturan akun kamu.</p>
        </div>
      </div>
    </div>
  </main>
</div>
