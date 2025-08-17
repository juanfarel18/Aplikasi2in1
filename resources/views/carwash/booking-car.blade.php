<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Car Wash</title>
    <script src="https://cdn.tailwindcss.com"></script>
  </head>
  <body class="bg-gray-50 text-gray-800">

    <!-- Header -->
    <header class="bg-white shadow-md">
      <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
        <a href="{{ route('front.index') }}" class="text-xl font-bold text-blue-600">
          Car Wash
        </a>
        <nav class="flex gap-6">
          <a href="{{ route('front.index') }}" class="hover:text-blue-500">Home</a>
          <a href="{{ route('transactions.index') }}" class="hover:text-blue-500">Transaksi</a>
          <a href="{{ route('bookings.index') }}" class="hover:text-blue-500 font-semibold">Booking</a>
          <a href="#" class="hover:text-blue-500">Profil</a>
        </nav>
      </div>
    </header>

    <!-- Main Content -->
    <main class="max-w-3xl mx-auto px-4 py-10">
      <h1 class="text-2xl font-bold mb-6 text-center">Form Booking Cuci Mobil</h1>

      <div class="bg-white p-8 rounded-xl shadow">
        <form action="{{ route('bookings.store') }}" method="POST" class="space-y-6">
          @csrf

          <!-- Nama -->
          <div>
            <label for="name" class="block mb-2 font-medium">Nama Lengkap</label>
            <input type="text" name="name" id="name" class="w-full border rounded-lg px-4 py-2 focus:ring focus:ring-blue-200" required>
          </div>

          <!-- Nomor HP -->
          <div>
            <label for="phone" class="block mb-2 font-medium">Nomor HP</label>
            <input type="text" name="phone" id="phone" class="w-full border rounded-lg px-4 py-2 focus:ring focus:ring-blue-200" required>
          </div>

          <!-- Tanggal Booking -->
          <div>
            <label for="date" class="block mb-2 font-medium">Tanggal Booking</label>
            <input type="date" name="date" id="date" class="w-full border rounded-lg px-4 py-2 focus:ring focus:ring-blue-200" required>
          </div>

          <!-- Jenis Layanan -->
          <div>
            <label for="service" class="block mb-2 font-medium">Jenis Layanan</label>
            <select name="service" id="service" class="w-full border rounded-lg px-4 py-2 focus:ring focus:ring-blue-200" required>
              <option value="">-- Pilih Layanan --</option>
              <option value="cuci-eksterior">Cuci Mobil Eksterior</option>
              <option value="detailing-interior">Detailing Interior</option>
              <option value="poles-wax">Poles & Wax</option>
            </select>
          </div>

          <!-- Tombol -->
          <div class="text-center">
            <button type="submit" class="bg-blue-600 text-white px-6 py-3 rounded-lg shadow hover:bg-blue-700">
              Booking Sekarang
            </button>
          </div>
        </form>
      </div>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-gray-300 py-6 mt-12">
      <div class="max-w-7xl mx-auto px-4 flex justify-between">
        <p>&copy; {{ date('Y') }} Golden Shine Car Wash. All rights reserved.</p>
        <p>Powered by Laravel</p>
      </div>
    </footer>

  </body>
</html>
