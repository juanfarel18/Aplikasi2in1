<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Galeri - Golden Shine Car Wash</title>

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
      h1,h2,h3 { font-family: "Playfair Display", serif; }
      .gold-text { color: #d4af37; }
      .gold-border { border-color: #d4af37; }
      .gold-bg { background-color: #d4af37; }
      .gold-bg-hover:hover { background-color: #b89b32; }
      .fade-in-section { opacity: 0; transform: translateY(40px);
        transition: opacity 0.8s cubic-bezier(0.175,0.885,0.32,1.275),
        transform 0.8s cubic-bezier(0.175,0.885,0.32,1.275);}
      .fade-in-section.is-visible { opacity: 1; transform: translateY(0);}
      #loginModal > div, #registerModal > div, #imageModal > div { animation: zoomIn 0.3s ease; }
      @keyframes zoomIn { from {opacity: 0; transform: scale(0.9);} to {opacity: 1; transform: scale(1);} }
      .delay-0 { animation-delay: 0ms; }
      .delay-150 { animation-delay: 150ms; }
      .delay-300 { animation-delay: 300ms; }
      @keyframes shimmer { 0% {transform: translateX(-100%);} 100% {transform: translateX(100%);} }
      .animate-shimmer { animation: shimmer 1.5s infinite; background-size: 200% 100%; }
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

    {{-- Header --}}
    <header class="bg-black/80 backdrop-blur-sm sticky top-0 z-40 text-white">
      <nav class="container mx-auto px-6 py-4 flex justify-between items-center">
        <a href="{{ url('/') }}"
          class="text-2xl font-bold text-yellow-500 hover:text-yellow-400 transition"
          style="font-family: 'Playfair Display', serif">
          Car Wash
        </a>
        <div class="hidden md:flex items-center space-x-6">
          <a href="{{ url('/') }}" class="text-gray-300 hover:text-yellow-500 transition">Home</a>
          <a href="{{ url('/transactions') }}" class="text-gray-300 hover:text-yellow-500 transition">My Transaction</a>
          <a href="{{ url('/booking') }}" class="text-gray-300 hover:text-yellow-500 transition">Booking</a>
          <a href="{{ url('/galeri') }}" class="text-yellow-500 font-semibold border-b-2 border-yellow-500 pb-1">Galeri</a>
          <a href="{{ url('/price-list') }}" class="text-gray-300 hover:text-yellow-500 transition">Price List</a>
          <a href="{{ url('/profile') }}" class="text-gray-300 hover:text-yellow-500 transition">Profile</a>
          <div class="flex space-x-3">
            <button onclick="toggleLoginModal()" class="border border-yellow-500 text-yellow-500 px-4 py-1.5 rounded-lg hover:bg-yellow-500 hover:text-black transition">
              Login
            </button>
            <button onclick="toggleRegisterModal()" class="bg-yellow-500 text-black px-4 py-1.5 rounded-lg hover:bg-black hover:text-yellow-500 border border-yellow-500 transition">
              Daftar
            </button>
          </div>
        </div>
        <button id="mobile-menu-button" class="md:hidden text-white">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"/>
          </svg>
        </button>
      </nav>
    </header>

    <main class="container mx-auto px-6 py-12 sm:py-16">
      <!-- Judul Halaman -->
      <div class="text-center mb-12 fade-in-section">
        <h1 class="text-3xl sm:text-5xl font-bold gold-text">Galeri Hasil Kerja Kami</h1>
        <p class="text-base sm:text-lg text-gray-400 mt-4 max-w-2xl mx-auto">
          Lihat bagaimana kami mengubah kendaraan menjadi sebuah karya seni yang berkilau.
        </p>
      </div>

      <!-- Galeri -->
      <div class="grid grid-cols-2 md:grid-cols-3 gap-4 sm:gap-8">
        @php
          $items = [
            ['img' => 'https://images.unsplash.com/photo-1583121274602-3e2820c69888?q=80&w=2070&auto=format&fit=crop','title' => 'Kilau Sempurna','desc' => 'Eksterior detailing'],
            ['img' => 'https://images.unsplash.com/photo-1542282088-fe84a6589544?q=80&w=2070&auto=format&fit=crop','title' => 'Interior Mewah','desc' => 'Interior detailing'],
            ['img' => 'https://images.unsplash.com/photo-1626947346165-4c2288dadc2a?q=80&w=1974&auto=format&fit=crop','title' => 'Velg Berkilau','desc' => 'Pembersihan mendalam'],
            ['img' => 'https://images.unsplash.com/photo-1552519507-da3b142c6e-3d?q=80&w=2070&auto=format&fit=crop','title' => 'Warna Cerah Kembali','desc' => 'Paint correction'],
            ['img' => 'https://images.unsplash.com/photo-1617194659422-b5e1a5f6e6e8?q=80&w=1887&auto=format&fit=crop','title' => 'Sentuhan Profesional','desc' => 'Proses coating'],
            ['img' => 'https://images.unsplash.com/photo-1605067050936-223b2a2a0a23?q=80&w=1887&auto=format&fit=crop','title' => 'Setiap Sudut Bersih','desc' => 'Detailing roda'],
          ];
        @endphp

        @foreach ($items as $index => $item)
          <div class="fade-in-section" style="transition-delay: {{ ($index+1)*100 }}ms">
            <div class="group relative overflow-hidden rounded-xl shadow-lg cursor-pointer"
              onclick="openImageModal('{{ $item['img'] }}')">
              <img src="{{ $item['img'] }}" alt="{{ $item['title'] }}"
                class="w-full h-56 sm:h-72 object-cover transform group-hover:scale-110 transition-transform duration-500 ease-in-out"/>
              <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent"></div>
              <div class="absolute bottom-0 left-0 p-4 sm:p-6">
                <h3 class="text-lg sm:text-xl font-bold text-white">{{ $item['title'] }}</h3>
                <p class="text-xs sm:text-sm text-gray-300 mt-1">{{ $item['desc'] }}</p>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </main>

    {{-- Modal Image --}}
    <div id="imageModal" class="fixed inset-0 z-50 bg-black/80 hidden flex justify-center items-center p-4" onclick="closeImageModal()">
      <div class="relative max-w-4xl max-h-full">
        <button onclick="closeImageModal()" class="absolute -top-4 -right-4 text-white bg-gray-800 rounded-full p-2 leading-none">&times;</button>
        <img id="modalImage" src="" alt="Detail Galeri" class="object-contain max-w-full max-h-[90vh] rounded-lg"/>
      </div>
    </div>

    <footer class="bg-black py-8 mt-16">
      <div class="container mx-auto px-6 text-center text-gray-500">
        <p>&copy; {{ date('Y') }} Car Wash. All Rights Reserved.</p>
      </div>
    </footer>

    <script>
      window.addEventListener("load", function () {
        const loader = document.getElementById("loader");
        if (loader) {
          loader.classList.add("opacity-0");
          setTimeout(() => { loader.classList.add("hidden"); }, 1000);
        }
      });
      function toggleLoginModal() { document.getElementById("loginModal")?.classList.toggle("hidden"); }
      function toggleRegisterModal() { document.getElementById("registerModal")?.classList.toggle("hidden"); }
      function openImageModal(src) { document.getElementById("modalImage").src = src; document.getElementById("imageModal").classList.remove("hidden"); }
      function closeImageModal() { document.getElementById("imageModal").classList.add("hidden"); }
      document.getElementById("mobile-menu-button")?.addEventListener("click", () => {
        document.getElementById("mobile-menu")?.classList.toggle("hidden");
      });
      const animatedSections = document.querySelectorAll(".fade-in-section");
      const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) entry.target.classList.add("is-visible");
          else entry.target.classList.remove("is-visible");
        });
      }, { threshold: 0.15 });
      animatedSections.forEach((section) => observer.observe(section));
    </script>
  </body>
</html>
