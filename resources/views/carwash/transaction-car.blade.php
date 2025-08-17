{{-- resources/views/transactions/index.blade.php --}}
<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Car Wash</title>

    {{-- Tailwind CDN (kalau pakai vite, bisa @vite('resources/css/app.css')) --}}
    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Poppins:wght@300;400;600&display=swap"
      rel="stylesheet"
    />

    <style>
      html, body {
        overflow-x: hidden;
        margin: 0;
        padding: 0;
        font-family: "Poppins", sans-serif;
        background-color: #121212;
        color: #e0e0e0;
      }
      h1, h2, h3 { font-family: "Playfair Display", serif; }
      .gold-text { color: #d4af37; }
      .gold-border { border-color: #d4af37; }
      .gold-bg { background-color: #d4af37; }
      .gold-bg-hover:hover { background-color: #b89b32; }
      .fade-in-section { opacity: 0; transform: translateY(40px); transition: opacity 0.8s, transform 0.8s; }
      .fade-in-section.is-visible { opacity: 1; transform: translateY(0); }
      #loginModal > div, #registerModal > div { animation: zoomIn 0.3s ease; }
      @keyframes zoomIn { from { opacity: 0; transform: scale(0.9);} to {opacity:1; transform:scale(1);} }
      .delay-0 { animation-delay: 0ms; } .delay-150 { animation-delay: 150ms; } .delay-300 { animation-delay: 300ms; }
      @keyframes shimmer { 0% {transform: translateX(-100%);} 100% {transform: translateX(100%);} }
      .animate-shimmer { animation: shimmer 1.5s infinite; background-size: 200% 100%; }
    </style>
  </head>
  <body class="bg-[#121212]">
    
    {{-- Loader --}}
    <div id="loader" class="fixed inset-0 z-50 flex flex-col items-center justify-center bg-transparent backdrop-blur-sm transition-all duration-1000 ease-in-out">
      <div class="flex space-x-2 mb-4">
        <div class="w-3 h-3 bg-yellow-500 rounded-full animate-bounce delay-0"></div>
        <div class="w-3 h-3 bg-yellow-500 rounded-full animate-bounce delay-150"></div>
        <div class="w-3 h-3 bg-yellow-500 rounded-full animate-bounce delay-300"></div>
      </div>
      <div class="relative overflow-hidden text-yellow-500 font-semibold text-lg tracking-wide">
        <span class="relative z-10">Mohon tunggu...</span>
        <span class="absolute inset-0 bg-gradient-to-r from-transparent via-yellow-200/60 to-transparent animate-shimmer"></span>
      </div>
    </div>

    {{-- Modal Login --}}
    <div id="loginModal" class="fixed inset-0 z-50 bg-black/60 hidden flex justify-center items-center p-4">
      <div class="bg-gray-900 border border-yellow-500/30 rounded-2xl p-6 w-full max-w-md relative shadow-2xl shadow-yellow-500/10">
        <button onclick="toggleLoginModal()" class="absolute top-3 right-4 text-2xl font-bold text-gray-400 hover:text-white transition">&times;</button>
        <h2 class="text-center text-2xl font-bold text-yellow-500 mb-6">Login</h2>
        <form method="POST" action="{{ route('login') }}">
          @csrf
          <div class="mb-4">
            <label class="block text-sm font-medium text-gray-300 mb-1">Username / Email</label>
            <input type="text" name="email" class="mt-1 w-full bg-gray-800 border border-gray-600 text-white rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-yellow-500 placeholder-gray-400" placeholder="Masukkan email atau username" required />
          </div>
          <div class="mb-6">
            <label class="block text-sm font-medium text-gray-300 mb-1">Password</label>
            <input type="password" name="password" class="mt-1 w-full bg-gray-800 border border-gray-600 text-white rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-yellow-500 placeholder-gray-400" placeholder="Masukkan password" required />
          </div>
          <button type="submit" class="w-full bg-yellow-500 text-black font-semibold py-2 rounded-lg hover:bg-yellow-600 transition">Login</button>
        </form>
        <p class="text-center text-sm text-gray-400 mt-4">
          Belum punya akun?
          <a href="#" onclick="toggleRegisterModal(); toggleLoginModal()" class="text-yellow-500 hover:text-yellow-400 font-semibold transition">Daftar</a>
        </p>
      </div>
    </div>

    {{-- Modal Register --}}
    <div id="registerModal" class="fixed inset-0 z-50 bg-black/60 hidden flex justify-center items-center p-4">
      <div class="bg-gray-900 border border-yellow-500/30 rounded-2xl p-6 w-full max-w-md relative shadow-2xl shadow-yellow-500/10">
        <button onclick="toggleRegisterModal()" class="absolute top-3 right-4 text-2xl font-bold text-gray-400 hover:text-white transition">&times;</button>
        <h2 class="text-center text-2xl font-bold text-yellow-500 mb-6">Daftar</h2>
        <form method="POST" action="{{ route('register') }}">
          @csrf
          <div class="mb-3">
            <label class="block text-sm font-medium text-gray-300 mb-1">Nama Lengkap</label>
            <input type="text" name="name" class="mt-1 w-full bg-gray-800 border border-gray-600 text-white rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-yellow-500 placeholder-gray-400" placeholder="Nama lengkap" required />
          </div>
          <div class="mb-3">
            <label class="block text-sm font-medium text-gray-300 mb-1">Email</label>
            <input type="email" name="email" class="mt-1 w-full bg-gray-800 border border-gray-600 text-white rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-yellow-500 placeholder-gray-400" placeholder="Email aktif" required />
          </div>
          <div class="mb-3">
            <label class="block text-sm font-medium text-gray-300 mb-1">Password</label>
            <input type="password" name="password" class="mt-1 w-full bg-gray-800 border border-gray-600 text-white rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-yellow-500 placeholder-gray-400" placeholder="Password" required />
          </div>
          <div class="mb-4">
            <label class="block text-sm font-medium text-gray-300 mb-1">Alamat Lengkap</label>
            <textarea name="address" class="mt-1 w-full bg-gray-800 border border-gray-600 text-white rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-yellow-500 placeholder-gray-400" placeholder="Masukkan alamat lengkap" rows="3" required></textarea>
          </div>
          <button type="submit" class="w-full bg-yellow-500 text-black font-semibold py-2 rounded-lg hover:bg-yellow-600 transition">Daftar</button>
        </form>
        <p class="text-center text-sm text-gray-400 mt-4">
          Sudah punya akun?
          <a href="#" onclick="toggleRegisterModal(); toggleLoginModal()" class="text-yellow-500 hover:text-yellow-400 font-semibold transition">Login</a>
        </p>
      </div>
    </div>

    {{-- Header --}}
    <header class="bg-black/80 backdrop-blur-sm sticky top-0 z-40 text-white">
      <nav class="container mx-auto px-6 py-4 flex justify-between items-center">
        <a href="{{ route('front.index') }}" class="text-2xl font-bold text-yellow-500 hover:text-yellow-400 transition" style="font-family: 'Playfair Display', serif">Car Wash</a>
        <div class="hidden md:flex items-center space-x-6">
          <a href="{{ route('front.index') }}" class="text-gray-300 hover:text-yellow-500 transition">Home</a>
          <a href="{{ route('transactions.index') }}" class="text-yellow-500 font-semibold border-b-2 border-yellow-500 pb-1">My Transaction</a>
          <a href="{{ route('booking.index') }}" class="text-gray-300 hover:text-yellow-500 transition">Booking</a>
          <a href="{{ route('gallery.index') }}" class="text-gray-300 hover:text-yellow-500 transition">Galeri</a>
          <a href="{{ route('price-list.index') }}" class="text-gray-300 hover:text-yellow-500 transition">Price List</a>
          <a href="{{ route('profile.index') }}" class="text-gray-300 hover:text-yellow-500 transition">Profile</a>
          <div class="flex space-x-3">
            <button onclick="toggleLoginModal()" class="border border-yellow-500 text-yellow-500 px-4 py-1.5 rounded-lg hover:bg-yellow-500 hover:text-black transition">Login</button>
            <button onclick="toggleRegisterModal()" class="bg-yellow-500 text-black px-4 py-1.5 rounded-lg hover:bg-black hover:text-yellow-500 border border-yellow-500 transition">Daftar</button>
          </div>
        </div>
      </nav>
    </header>

    {{-- Main --}}
    <main class="container mx-auto px-6 py-8 sm:py-16">
      <div class="text-center mb-12 fade-in-section">
        <h1 class="text-3xl sm:text-5xl font-bold gold-text">Riwayat Transaksi</h1>
        <p class="text-base sm:text-lg text-gray-400 mt-4 max-w-2xl mx-auto">
          Lihat semua pesanan Anda yang sudah selesai maupun yang sedang berjalan.
        </p>
      </div>

      <div class="space-y-6 max-w-4xl mx-auto">
        {{-- Contoh loop transaksi --}}
        @foreach($transactions as $trx)
          <div class="bg-[#1a1a1a] rounded-xl p-4 sm:p-6 md:flex items-center justify-between transition-shadow hover:shadow-lg hover:shadow-yellow-500/10 fade-in-section">
            <div class="flex-grow">
              <p class="text-sm text-gray-400">ID Pesanan: #{{ $trx->code }}</p>
              <h3 class="text-lg sm:text-xl font-semibold text-white mt-1">{{ $trx->service_name }}</h3>
              <p class="text-gray-500 text-sm mt-1">{{ $trx->date->format('d F Y') }}</p>
            </div>
            <div class="mt-4 md:mt-0 md:text-right flex-shrink-0">
              <span class="inline-block px-3 py-1 rounded-full mb-2 text-xs font-semibold 
                @if($trx->status == 'Selesai') bg-green-500/10 text-green-400 
                @elseif($trx->status == 'Menunggu Konfirmasi') bg-yellow-500/10 text-yellow-400 
                @else bg-red-500/10 text-red-400 @endif">
                {{ $trx->status }}
              </span>
              <p class="text-xl sm:text-2xl font-bold text-white">Rp {{ number_format($trx->amount, 0, ',', '.') }}</p>
            </div>
            <div class="mt-4 md:mt-0 md:ml-6 flex-shrink-0">
              <a href="{{ route('transactions.show', $trx->id) }}" 
                class="inline-block w-full md:w-auto text-center border border-yellow-500 text-yellow-500 px-5 py-2 rounded-lg hover:bg-yellow-500 hover:text-black transition text-sm font-semibold">
                Lihat Detail
              </a>
            </div>
          </div>
        @endforeach
      </div>
    </main>

    {{-- Footer --}}
    <footer class="bg-black py-8 mt-16">
      <div class="container mx-auto px-6 text-center text-gray-500">
        <p>&copy; {{ date('Y') }} Car Wash. All Rights Reserved.</p>
      </div>
    </footer>

    {{-- Script --}}
    <script>
      window.addEventListener("load", function () {
        const loader = document.getElementById("loader");
        loader.classList.add("opacity-0");
        setTimeout(() => { loader.classList.add("hidden"); }, 1000);
      });
      function toggleLoginModal() { document.getElementById("loginModal").classList.toggle("hidden"); }
      function toggleRegisterModal() { document.getElementById("registerModal").classList.toggle("hidden"); }
    </script>
  </body>
</html>
