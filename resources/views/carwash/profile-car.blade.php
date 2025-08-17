{{-- resources/views/profile.blade.php --}}
<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Profil Saya - Golden Shine Car Wash</title>

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
      h1, h2, h3 {
        font-family: "Playfair Display", serif;
      }
      .gold-text { color: #d4af37; }
      .gold-border { border-color: #d4af37; }
      .gold-bg { background-color: #d4af37; }
      .gold-bg-hover:hover { background-color: #b89b32; }

      /* Animasi Scroll */
      .fade-in-section { opacity: 0; transform: translateY(40px); transition: opacity .8s cubic-bezier(0.175,0.885,0.32,1.275), transform .8s cubic-bezier(0.175,0.885,0.32,1.275); }
      .fade-in-section.is-visible { opacity: 1; transform: translateY(0); }

      /* Modal zoom */
      #loginModal>div, #registerModal>div, #editProfileModal>div { animation: zoomIn .3s ease; }
      @keyframes zoomIn { from{opacity:0;transform:scale(.9);} to{opacity:1;transform:scale(1);} }

      /* Loader */
      .delay-0 { animation-delay:0ms; } .delay-150 { animation-delay:150ms; } .delay-300 { animation-delay:300ms; }
      @keyframes shimmer { 0%{transform:translateX(-100%);} 100%{transform:translateX(100%);} }
      .animate-shimmer { animation: shimmer 1.5s infinite; background-size:200% 100%; }
    </style>
  </head>
  <body class="bg-[#121212]">
    
    {{-- Loader --}}
    <div id="loader" class="fixed inset-0 z-[100] flex flex-col items-center justify-center bg-transparent backdrop-blur-sm transition-all duration-1000 ease-in-out">
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

    {{-- Modal Edit Profile --}}
    <div id="editProfileModal" class="fixed inset-0 z-50 bg-black/60 hidden flex justify-center items-center p-4">
      <div class="bg-gray-900 border border-yellow-500/30 rounded-2xl p-6 w-full max-w-md relative shadow-2xl shadow-yellow-500/10">
        <button onclick="toggleEditProfileModal()" class="absolute top-3 right-4 text-2xl font-bold text-gray-400 hover:text-white transition">&times;</button>
        <h2 class="text-center text-2xl font-bold text-yellow-500 mb-6">Ubah Profil</h2>
        
        <form action="{{ route('profile.update') }}" method="POST">
          @csrf
          @method('PUT')
          <div class="mb-4">
            <label for="edit-name" class="block text-sm font-medium text-gray-300 mb-1">Nama Lengkap</label>
            <input type="text" id="edit-name" name="name" value="{{ auth()->user()->name ?? 'Guest' }}" required
              class="w-full bg-gray-800 border border-gray-600 text-white rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-yellow-500" />
          </div>
          <div class="mb-4">
            <label for="edit-email" class="block text-sm font-medium text-gray-300 mb-1">Email</label>
            <input type="email" id="edit-email" name="email" value="{{ auth()->user()->email ?? '' }}" required
              class="w-full bg-gray-800 border border-gray-600 text-white rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-yellow-500" />
          </div>
          <div class="mb-4">
            <label for="edit-phone" class="block text-sm font-medium text-gray-300 mb-1">No. Telepon</label>
            <input type="tel" id="edit-phone" name="phone" value="{{ auth()->user()->phone ?? '' }}" required
              class="w-full bg-gray-800 border border-gray-600 text-white rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-yellow-500" />
          </div>
          <div class="mb-6">
            <label for="edit-address" class="block text-sm font-medium text-gray-300 mb-1">Alamat</label>
            <textarea id="edit-address" name="address" rows="3" required
              class="w-full bg-gray-800 border border-gray-600 text-white rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-yellow-500">{{ auth()->user()->address ?? '' }}</textarea>
          </div>
          <button type="submit" class="w-full bg-yellow-500 text-black font-semibold py-2 rounded-lg hover:bg-yellow-600 transition">Simpan Perubahan</button>
        </form>
      </div>
    </div>

    {{-- Header --}}
    <header class="bg-black/80 backdrop-blur-sm sticky top-0 z-40 text-white">
      <nav class="container mx-auto px-6 py-4 flex justify-between items-center">
        <a href="{{ route('front.index') }}" class="text-2xl font-bold text-yellow-500 hover:text-yellow-400 transition" style="font-family: 'Playfair Display', serif">Car Wash</a>
        
        {{-- Menu Desktop --}}
        <div class="hidden md:flex items-center space-x-6">
          <a href="{{ route('front.index') }}" class="text-gray-300 hover:text-yellow-500 transition">Home</a>
          <a href="{{ route('transactions.index') }}" class="text-gray-300 hover:text-yellow-500 transition">My Transaction</a>
          <a href="{{ route('booking.index') }}" class="text-gray-300 hover:text-yellow-500 transition">Booking</a>
          <a href="{{ route('gallery.index') }}" class="text-gray-300 hover:text-yellow-500 transition">Galeri</a>
          <a href="{{ route('price.index') }}" class="text-gray-300 hover:text-yellow-500 transition">Price List</a>
          <a href="{{ route('profile.index') }}" class="text-yellow-500 font-semibold border-b-2 border-yellow-500 pb-1">Profile</a>
          
          @auth
            <form action="{{ route('logout') }}" method="POST">
              @csrf
              <button type="submit" class="bg-gray-700 text-white px-4 py-1.5 rounded-lg hover:bg-gray-600 transition">Logout</button>
            </form>
          @else
            <div class="flex space-x-3">
              <button onclick="toggleLoginModal()" class="border border-yellow-500 text-yellow-500 px-4 py-1.5 rounded-lg hover:bg-yellow-500 hover:text-black transition">Login</button>
              <button onclick="toggleRegisterModal()" class="bg-yellow-500 text-black px-4 py-1.5 rounded-lg hover:bg-black hover:text-yellow-500 border border-yellow-500 transition">Daftar</button>
            </div>
          @endauth
        </div>
      </nav>
    </header>

    {{-- Konten --}}
    <main class="container mx-auto px-4 sm:px-6 py-8 sm:py-16">
      <div class="max-w-4xl mx-auto">
        <div class="text-center mb-10 sm:mb-12 fade-in-section">
          <h1 class="text-3xl sm:text-5xl font-bold gold-text">Profil Saya</h1>
          <p class="text-base sm:text-lg text-gray-400 mt-4 max-w-2xl mx-auto">Kelola informasi akun dan kendaraan Anda.</p>
        </div>

        <div class="space-y-8">
          {{-- Informasi Akun --}}
          <div class="bg-[#1a1a1a] rounded-xl shadow-lg p-6 sm:p-8 fade-in-section" style="transition-delay:100ms">
            <div class="flex justify-between items-center mb-6">
              <h2 class="text-xl sm:text-2xl font-semibold text-yellow-400">Informasi Akun</h2>
              <button onclick="toggleEditProfileModal()" class="text-sm text-yellow-500 hover:text-yellow-400 font-semibold">Ubah Profil</button>
            </div>
            <div class="flex flex-row items-center gap-4 sm:gap-6 text-left">
              <div class="flex-shrink-0">
                <img class="h-20 w-20 sm:h-24 sm:w-24 rounded-full object-cover border-4 border-yellow-500/30"
                  src="{{ auth()->user()->profile_photo_url ?? 'https://placehold.co/96x96/1a1a1a/d4af37?text=JF' }}" alt="Foto Profil"/>
              </div>
              <div class="flex-grow w-full space-y-4 text-gray-300">
                <div>
                  <p class="text-xs sm:text-sm text-gray-500">Nama Lengkap</p>
                  <p class="text-base sm:text-lg">{{ auth()->user()->name ?? '-' }}</p>
                </div>
                <div>
                  <p class="text-xs sm:text-sm text-gray-500">Email</p>
                  <p class="text-base sm:text-lg">{{ auth()->user()->email ?? '-' }}</p>
                </div>
                <div>
                  <p class="text-xs sm:text-sm text-gray-500">No. Telepon</p>
                  <p class="text-base sm:text-lg">{{ auth()->user()->phone ?? '-' }}</p>
                </div>
                <div>
                  <p class="text-xs sm:text-sm text-gray-500">Alamat</p>
                  <p class="text-base sm:text-lg">{{ auth()->user()->address ?? '-' }}</p>
                </div>
              </div>
            </div>
          </div>

          {{-- Tombol Aksi --}}
          <div class="flex flex-col sm:flex-row gap-4 fade-in-section" style="transition-delay:300ms">
            <a href="{{ route('transactions.index') }}" class="w-full text-center bg-yellow-500 text-black font-bold py-3 px-6 rounded-lg hover:bg-yellow-600 transition">Lihat Riwayat Transaksi</a>
            <form action="{{ route('logout') }}" method="POST" class="w-full">
              @csrf
              <button type="submit" class="w-full bg-gray-700 text-white font-bold py-3 px-6 rounded-lg hover:bg-gray-600 transition">Keluar</button>
            </form>
          </div>
        </div>
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
        if (loader) {
          loader.classList.add("opacity-0");
          setTimeout(() => loader.classList.add("hidden"), 1000);
        }
      });
      function toggleLoginModal(){document.getElementById("loginModal").classList.toggle("hidden");}
      function toggleRegisterModal(){document.getElementById("registerModal").classList.toggle("hidden");}
      function toggleEditProfileModal(){document.getElementById("editProfileModal").classList.toggle("hidden");}
      const animatedSections=document.querySelectorAll(".fade-in-section");
      const observer=new IntersectionObserver(entries=>{
        entries.forEach(entry=>{ if(entry.isIntersecting){entry.target.classList.add("is-visible");} else{entry.target.classList.remove("is-visible");} });
      },{threshold:0.15});
      animatedSections.forEach(section=>observer.observe(section));
    </script>
  </body>
</html>
