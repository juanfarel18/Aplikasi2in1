<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Golden Shine Car Wash - Layanan Detailing Profesional</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Poppins:wght@300;400;600&display=swap"
      rel="stylesheet"
    />

    <style>
      html,
      body {
        overflow-x: hidden;
        margin: 0;
        padding: 0;
        font-family: "Poppins", sans-serif;
        background-color: #121212;
        color: #e0e0e0;
      }

      /* Preloader Styles - Slim Progress Bar */
      #preloader {
        transition: opacity 0.5s ease-out;
      }
      #progress-bar {
        animation: load-progress 2s ease-out forwards;
        background-color: #d4af37; /* Gold color */
        box-shadow: 0 0 10px rgba(212, 175, 55, 0.5);
      }

      @keyframes load-progress {
        from {
          width: 0%;
        }
        to {
          width: 100%;
        }
      }

      #slider img {
        width: 100vw;
        height: 60vh; /* Tinggi gambar diubah menjadi 60% dari tinggi layar */
        object-fit: cover;
      }
      .animate-fadeIn {
        animation: fadeIn 0.3s ease-in-out;
      }
      @keyframes fadeIn {
        from {
          opacity: 0;
          transform: scale(0.95);
        }
        to {
          opacity: 1;
          transform: scale(1);
        }
      }

      /* Gradient overlay (kiri & kanan) */
      .slider-gradient::before,
      .slider-gradient::after {
        content: "";
        position: absolute;
        top: 0;
        bottom: 0;
        width: 150px; /* Made gradient wider for a softer fade */
        z-index: 5;
        pointer-events: none;
      }

      .slider-gradient::before {
        left: 0;
        background: linear-gradient(to right, #121212, transparent);
      }

      .slider-gradient::after {
        right: 0;
        background: linear-gradient(to left, #121212, transparent);
      }

      /* Bullet indikator */
      .slider-dots {
        position: absolute;
        bottom: 20px;
        left: 50%;
        transform: translateX(-50%);
        display: flex;
        gap: 8px;
        z-index: 10;
      }
      .slider-dot {
        width: 12px;
        height: 12px;
        border-radius: 9999px;
        background-color: rgba(255, 255, 255, 0.5);
        cursor: pointer;
        transition: background-color 0.3s;
      }
      .slider-dot.active {
        background-color: #d4af37; /* Matching gold color */
      }

      h1,
      h2,
      h3 {
        font-family: "Playfair Display", serif;
      }
      .gold-text {
        color: #d4af37; /* Warna emas utama */
      }
      .gold-border {
        border-color: #d4af37;
      }
      .gold-bg {
        background-color: #d4af37;
      }
      .gold-bg-hover:hover {
        background-color: #b89b32; /* Warna emas lebih gelap saat hover */
      }

      /* Animasi Scroll - Ditingkatkan */
      .fade-in-section {
        opacity: 0;
        transform: translateY(40px);
        transition: opacity 0.8s cubic-bezier(0.175, 0.885, 0.32, 1.275),
          transform 0.8s cubic-bezier(0.175, 0.885, 0.32, 1.275);
      }
      .fade-in-section.is-visible {
        opacity: 1;
        transform: translateY(0);
      }

      /* Agar transisi pop-up lebih halus */
      #loginModal > div,
      #registerModal > div {
        animation: zoomIn 0.3s ease;
      }

      @keyframes zoomIn {
        from {
          opacity: 0;
          transform: scale(0.9);
        }
        to {
          opacity: 1;
          transform: scale(1);
        }
      }

      .delay-0 {
        animation-delay: 0ms;
      }
      .delay-150 {
        animation-delay: 150ms;
      }
      .delay-300 {
        animation-delay: 300ms;
      }

      @keyframes shimmer {
        0% {
          transform: translateX(-100%);
        }
        100% {
          transform: translateX(100%);
        }
      }

      .animate-shimmer {
        animation: shimmer 1.5s infinite;
        background-size: 200% 100%;
      }
    </style>
  </head>
  <body class="bg-[#121212]">
    <!-- Loader -->
    <div
      id="loader"
      class="fixed inset-0 z-50 flex flex-col items-center justify-center bg-transparent backdrop-blur-sm transition-all duration-1000 ease-in-out"
    >
      <!-- Dot bouncing -->
      <div class="flex space-x-2 mb-4">
        <div
          class="w-3 h-3 bg-yellow-500 rounded-full animate-bounce delay-0"
        ></div>
        <div
          class="w-3 h-3 bg-yellow-500 rounded-full animate-bounce delay-150"
        ></div>
        <div
          class="w-3 h-3 bg-yellow-500 rounded-full animate-bounce delay-300"
        ></div>
      </div>

      <!-- Text shimmer -->
      <div
        class="relative overflow-hidden text-yellow-500 font-semibold text-lg tracking-wide"
      >
        <span class="relative z-10">Mohon tunggu...</span>
        <span
          class="absolute inset-0 bg-gradient-to-r from-transparent via-yellow-200/60 to-transparent animate-shimmer"
        ></span>
      </div>
    </div>

    <!-- Modal Login -->
    <div
      id="loginModal"
      class="fixed inset-0 z-50 bg-black/60 hidden flex justify-center items-center p-4"
    >
      <div
        class="bg-gray-900 border border-yellow-500/30 rounded-2xl p-6 w-full max-w-md relative shadow-2xl shadow-yellow-500/10"
      >
        <button
          onclick="toggleLoginModal()"
          class="absolute top-3 right-4 text-2xl font-bold text-gray-400 hover:text-white transition"
        >
          &times;
        </button>
        <h2 class="text-center text-2xl font-bold text-yellow-500 mb-6">
          Login
        </h2>
        <form>
          <div class="mb-4">
            <label class="block text-sm font-medium text-gray-300 mb-1"
              >Username / Email</label
            >
            <input
              type="text"
              class="mt-1 w-full bg-gray-800 border border-gray-600 text-white rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-yellow-500 placeholder-gray-400"
              placeholder="Masukkan email atau username"
              required
            />
          </div>
          <div class="mb-6">
            <label class="block text-sm font-medium text-gray-300 mb-1"
              >Password</label
            >
            <input
              type="password"
              class="mt-1 w-full bg-gray-800 border border-gray-600 text-white rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-yellow-500 placeholder-gray-400"
              placeholder="Masukkan password"
              required
            />
          </div>
          <button
            type="submit"
            class="w-full bg-yellow-500 text-black font-semibold py-2 rounded-lg hover:bg-yellow-600 transition"
          >
            Login
          </button>
        </form>
        <p class="text-center text-sm text-gray-400 mt-4">
          Belum punya akun?
          <a
            href="#"
            onclick="toggleRegisterModal(); toggleLoginModal()"
            class="text-yellow-500 hover:text-yellow-400 font-semibold transition"
            >Daftar</a
          >
        </p>
      </div>
    </div>

    <!-- Modal Register -->
    <div
      id="registerModal"
      class="fixed inset-0 z-50 bg-black/60 hidden flex justify-center items-center p-4"
    >
      <div
        class="bg-gray-900 border border-yellow-500/30 rounded-2xl p-6 w-full max-w-md relative shadow-2xl shadow-yellow-500/10"
      >
        <button
          onclick="toggleRegisterModal()"
          class="absolute top-3 right-4 text-2xl font-bold text-gray-400 hover:text-white transition"
        >
          &times;
        </button>
        <h2 class="text-center text-2xl font-bold text-yellow-500 mb-6">
          Daftar
        </h2>
        <form>
          <div class="mb-3">
            <label class="block text-sm font-medium text-gray-300 mb-1"
              >Nama Lengkap</label
            >
            <input
              type="text"
              class="mt-1 w-full bg-gray-800 border border-gray-600 text-white rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-yellow-500 placeholder-gray-400"
              placeholder="Nama lengkap"
              required
            />
          </div>
          <div class="mb-3">
            <label class="block text-sm font-medium text-gray-300 mb-1"
              >Email</label
            >
            <input
              type="email"
              class="mt-1 w-full bg-gray-800 border border-gray-600 text-white rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-yellow-500 placeholder-gray-400"
              placeholder="Email aktif"
              required
            />
          </div>
          <div class="mb-3">
            <label class="block text-sm font-medium text-gray-300 mb-1"
              >Password</label
            >
            <input
              type="password"
              class="mt-1 w-full bg-gray-800 border border-gray-600 text-white rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-yellow-500 placeholder-gray-400"
              placeholder="Password"
              required
            />
          </div>
          <div class="mb-4">
            <label class="block text-sm font-medium text-gray-300 mb-1"
              >Alamat Lengkap</label
            >
            <textarea
              class="mt-1 w-full bg-gray-800 border border-gray-600 text-white rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-yellow-500 placeholder-gray-400"
              placeholder="Masukkan alamat lengkap"
              rows="3"
              required
            ></textarea>
          </div>
          <button
            type="submit"
            class="w-full bg-yellow-500 text-black font-semibold py-2 rounded-lg hover:bg-yellow-600 transition"
          >
            Daftar
          </button>
        </form>
        <p class="text-center text-sm text-gray-400 mt-4">
          Sudah punya akun?
          <a
            href="#"
            onclick="toggleRegisterModal(); toggleLoginModal()"
            class="text-yellow-500 hover:text-yellow-400 font-semibold transition"
            >Login</a
          >
        </p>
      </div>
    </div>

    <!-- Header -->
    <header class="bg-black/80 backdrop-blur-sm sticky top-0 z-40 text-white">
      <!-- Navbar -->
      <nav
        class="container mx-auto px-6 py-4 flex justify-between items-center"
      >
        <!-- Logo -->
        <a
          href="index-carwash.html"
          class="text-2xl font-bold text-yellow-500 hover:text-yellow-400 transition"
          style="font-family: 'Playfair Display', serif"
        >
          Car Wash
        </a>

        <!-- Navigasi & Tombol (Desktop) -->
        <div class="hidden md:flex items-center space-x-6">
          <!-- HOME dengan dropdown -->
          <div class="relative group">
            <button
              class="inline-flex items-center gap-1 font-semibold text-yellow-500 border-b-2 border-yellow-500 pb-1 hover:text-white hover:border-white transition duration-300"
            >
              Home
              <svg
                class="w-4 h-4 transform transition-transform duration-300 group-hover:rotate-180"
                fill="none"
                stroke="currentColor"
                stroke-width="2"
                viewBox="0 0 24 24"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  d="M19 9l-7 7-7-7"
                />
              </svg>
            </button>
            <!-- Dropdown -->
            <div
              class="absolute mt-2 w-40 bg-white shadow-lg border border-gray-200 rounded-xl opacity-0 group-hover:opacity-100 invisible group-hover:visible transition-all duration-300 z-50"
            >
              <a
                href="index.html"
                class="block px-4 py-3 text-sm text-gray-700 hover:bg-yellow-100 hover:text-yellow-600 rounded-t-xl transition"
              >
                Home Page
              </a>
              <a
                href="aboutuscar.html"
                class="block px-4 py-3 text-sm text-gray-700 hover:bg-yellow-100 hover:text-yellow-600 transition"
              >
                About Us
              </a>
              <a
                href="contactuscar.html"
                class="block px-4 py-3 text-sm text-gray-700 hover:bg-yellow-100 hover:text-yellow-600 rounded-b-xl transition"
              >
                Contact Us
              </a>
            </div>
          </div>

          <!-- Link lain -->
          <a
            href="transaction-car.html"
            class="text-gray-300 hover:text-yellow-500 transition"
            >My Transaction</a
          >
          <a
            href="booking-car.html"
            class="text-gray-300 hover:text-yellow-500 transition"
            >Booking</a
          >
          <a
            href="galeri-car.html"
            class="text-gray-300 hover:text-yellow-500 transition"
            >Galeri</a
          >
          <a
            href="price-list-car.html"
            class="text-gray-300 hover:text-yellow-500 transition"
            >Price List</a
          >
          <a
            href="profile-car.html"
            class="text-gray-300 hover:text-yellow-500 transition"
            >Profile</a
          >

          <!-- Tombol Login & Daftar -->
          <div class="flex space-x-3">
            <button
              onclick="toggleLoginModal()"
              class="border border-yellow-500 text-yellow-500 px-4 py-1.5 rounded-lg hover:bg-yellow-500 hover:text-black transition"
            >
              Login
            </button>
            <button
              onclick="toggleRegisterModal()"
              class="bg-yellow-500 text-black px-4 py-1.5 rounded-lg hover:bg-black hover:text-yellow-500 border border-yellow-500 transition"
            >
              Daftar
            </button>
          </div>
        </div>

        <!-- Tombol Mobile -->
        <button id="mobile-menu-button" class="md:hidden text-white">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            class="h-6 w-6"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor"
          >
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="M4 6h16M4 12h16m-7 6h7"
            />
          </svg>
        </button>
      </nav>

      <!-- Menu Mobile -->
      <div id="mobile-menu" class="hidden md:hidden bg-black/90 p-4 space-y-2">
        <!-- Home with dropdown -->
        <div class="relative">
          <button
            onclick="toggleMobileDropdown()"
            class="w-full flex justify-between items-center text-gray-300 hover:text-yellow-500 transition py-2"
          >
            <a
              href="index-carwash.html"
              class="block py-2 text-yellow-500 font-semibold"
            >
              Home
            </a>
            <svg
              id="mobile-dropdown-icon"
              class="w-4 h-4 transform transition-transform duration-300"
              fill="none"
              stroke="currentColor"
              stroke-width="2"
              viewBox="0 0 24 24"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M19 9l-7 7-7-7"
              />
            </svg>
          </button>
          <div id="mobile-dropdown-menu" class="hidden pl-4 mt-2 space-y-2">
            <a
              href="index.html"
              class="block text-sm text-gray-400 hover:text-yellow-500 transition"
              >Home Page</a
            >
            <a
              href="aboutuscar.html"
              class="block text-sm text-gray-400 hover:text-yellow-500 transition"
              >About Us</a
            >
            <a
              href="contactuscar.html"
              class="block text-sm text-gray-400 hover:text-yellow-500 transition"
              >Contact Us</a
            >
          </div>
        </div>
        <a
          href="transaction-car.html"
          class="block py-2 text-gray-300 hover:text-yellow-500 transition"
          >My Transaction</a
        >
        <a
          href="booking-car.html"
          class="block py-2 text-gray-300 hover:text-yellow-500 transition"
          >Booking</a
        >
        <a
          href="galeri-car.html"
          class="block py-2 text-gray-300 hover:text-yellow-500 transition"
          >Galeri</a
        >
        <a
          href="price-list-car.html"
          class="block py-2 text-gray-300 hover:text-yellow-500 transition"
          >Price List</a
        >
        <a
          href="profile-car.html"
          class="block py-2 text-gray-300 hover:text-yellow-500 transition"
          >Profile</a
        >
        <div class="pt-4 space-y-2 border-t border-gray-700">
          <button
            onclick="toggleLoginModal()"
            class="w-full border border-yellow-500 text-yellow-500 py-2 rounded-lg hover:bg-yellow-500 hover:text-black transition"
          >
            Login
          </button>
          <button
            onclick="toggleRegisterModal()"
            class="w-full bg-yellow-500 text-black py-2 rounded-lg hover:bg-black hover:text-yellow-500 border border-yellow-500 transition"
          >
            Daftar
          </button>
        </div>
      </div>
    </header>

   <!-- HERO SLIDER -->
<section class="relative">
    <div class="relative overflow-hidden w-screen h-[60vh] slider-gradient">
        <div id="slider" class="flex transition-transform duration-700 ease-in-out">
          
          {{-- Loop menggunakan variabel $carwashes dari controller --}}
          @forelse($carwashes as $carwash)
            
            {{-- Cek apakah path gambar ada --}}
            @if($carwash->image_path)
              <div class="w-screen h-full flex-shrink-0">
                  <img src="{{ asset('storage/' . $carwash->image_path) }}" 
                       alt="Carwash Promo Image"
                       class="w-screen h-full object-cover" />
              </div>
            @endif

          @empty
            {{-- Tampilan ini akan muncul jika tidak ada data carwash yang aktif --}}
            <div class="w-screen h-full flex-shrink-0 flex items-center justify-center bg-gray-900">
                <p class="text-white text-xl">Tidak ada gambar untuk ditampilkan.</p>
            </div>
          @endforelse
          
        </div>

        <!-- Arrows -->
        <button id="prev-slide-btn" class="absolute top-1/2 left-4 -translate-y-1/2 bg-black/40 hover:bg-black/70 text-white p-3 rounded-full z-10">&#10094;</button>
        <button id="next-slide-btn" class="absolute top-1/2 right-4 -translate-y-1/2 bg-black/40 hover:bg-black/70 text-white p-3 rounded-full z-10">&#10095;</button>

        <!-- Bullet indicators -->
        <div id="sliderDots" class="slider-dots"></div>
    </div>
</section>

    <!-- KEUNGGULAN - Tema Elegan -->
    <section
      class="bg-black py-16 sm:py-24 px-4 sm:px-6 text-white text-center"
    >
      <!-- Judul -->
      <div class="mb-10 sm:mb-14 fade-in-section">
        <h2
          class="text-2xl sm:text-4xl md:text-5xl font-extrabold text-yellow-400 leading-snug"
        >
          Cuci Mobil Premium Tanpa Harus Keluar Rumah
        </h2>
        <p
          class="mt-4 sm:mt-5 text-gray-400 text-base sm:text-lg max-w-2xl mx-auto"
        >
          Kami hadir langsung ke lokasi Anda — praktis, bersih, dan profesional
          dengan layanan terjamin.
        </p>
      </div>

      <!-- Grid Keunggulan -->
      <div
        class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-4 gap-4 sm:gap-6 max-w-7xl mx-auto"
      >
        <!-- Keunggulan 1 -->
        <div
          class="bg-[#111111] rounded-3xl p-6 sm:p-8 border border-yellow-500/20 hover:shadow-yellow-500/30 shadow-xl transition duration-300 transform hover:-translate-y-2 fade-in-section"
          style="transition-delay: 100ms"
        >
          <div
            class="bg-yellow-500/10 w-14 h-14 sm:w-16 sm:h-16 flex items-center justify-center rounded-full mx-auto mb-4"
          >
            <!-- Icon -->
            <svg
              xmlns="http://www.w3.org/2000/svg"
              class="h-6 w-6 sm:h-8 sm:w-8 text-yellow-400"
              viewBox="0 0 20 20"
              fill="currentColor"
            >
              <path
                fill-rule="evenodd"
                d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                clip-rule="evenodd"
              />
            </svg>
          </div>
          <h3 class="text-lg sm:text-xl font-semibold text-yellow-300 mb-2">
            Datang ke Lokasi Anda
          </h3>
          <p class="text-gray-400 text-sm">
            Cukup booking, kami langsung menuju tempat Anda.
          </p>
        </div>

        <!-- Keunggulan 2 -->
        <div
          class="bg-[#111111] rounded-3xl p-6 sm:p-8 border border-yellow-500/20 hover:shadow-yellow-500/30 shadow-xl transition duration-300 transform hover:-translate-y-2 fade-in-section"
          style="transition-delay: 200ms"
        >
          <div
            class="bg-yellow-500/10 w-14 h-14 sm:w-16 sm:h-16 flex items-center justify-center rounded-full mx-auto mb-4"
          >
            <svg
              xmlns="http://www.w3.org/2000/svg"
              class="h-6 w-6 sm:h-8 sm:w-8 text-yellow-400"
              viewBox="0 0 20 20"
              fill="currentColor"
            >
              <path
                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"
              />
            </svg>
          </div>
          <h3 class="text-lg sm:text-xl font-semibold text-yellow-300 mb-2">
            Hasil Detil & Profesional
          </h3>
          <p class="text-gray-400 text-sm">
            Cuci menyeluruh luar-dalam dengan bahan premium.
          </p>
        </div>

        <!-- Keunggulan 3 -->
        <div
          class="bg-[#111111] rounded-3xl p-6 sm:p-8 border border-yellow-500/20 hover:shadow-yellow-500/30 shadow-xl transition duration-300 transform hover:-translate-y-2 fade-in-section"
          style="transition-delay: 300ms"
        >
          <div
            class="bg-yellow-500/10 w-14 h-14 sm:w-16 sm:h-16 flex items-center justify-center rounded-full mx-auto mb-4"
          >
            <svg
              xmlns="http://www.w3.org/2000/svg"
              class="h-6 w-6 sm:h-8 sm:w-8 text-yellow-400"
              viewBox="0 0 20 20"
              fill="currentColor"
            >
              <path
                fill-rule="evenodd"
                d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                clip-rule="evenodd"
              />
            </svg>
          </div>
          <h3 class="text-lg sm:text-xl font-semibold text-yellow-300 mb-2">
            Fleksibel & Sesuai Jadwal
          </h3>
          <p class="text-gray-400 text-sm">
            Atur waktu pencucian sesuai aktivitas harian Anda.
          </p>
        </div>

        <!-- Keunggulan 4 -->
        <div
          class="bg-[#111111] rounded-3xl p-6 sm:p-8 border border-yellow-500/20 hover:shadow-yellow-500/30 shadow-xl transition duration-300 transform hover:-translate-y-2 fade-in-section"
          style="transition-delay: 400ms"
        >
          <div
            class="bg-yellow-500/10 w-14 h-14 sm:w-16 sm:h-16 flex items-center justify-center rounded-full mx-auto mb-4"
          >
            <svg
              xmlns="http://www.w3.org/2000/svg"
              class="h-6 w-6 sm:h-8 sm:w-8 text-yellow-400"
              viewBox="0 0 20 20"
              fill="currentColor"
            >
              <path d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4z" />
              <path
                fill-rule="evenodd"
                d="M18 9H2v5a2 2 0 002 2h12a2 2 0 002-2V9zM4 13a1 1 0 011-1h1a1 1 0 110 2H5a1 1 0 01-1-1zm5-1a1 1 0 100 2h1a1 1 0 100-2H9z"
                clip-rule="evenodd"
              />
            </svg>
          </div>
          <h3 class="text-lg sm:text-xl font-semibold text-yellow-300 mb-2">
            Pembayaran Mudah
          </h3>
          <p class="text-gray-400 text-sm">
            Transfer bank, QRIS, dompet digital, semua tersedia.
          </p>
        </div>
      </div>
    </section>

    <!-- Langkah-Langkah Pemesanan -->
    <section id="how-to-book" class="py-16 sm:py-24 bg-[#1a1a1a]">
      <div class="container mx-auto px-4 sm:px-6 text-center">
        <!-- Judul -->
        <div class="fade-in-section">
          <h2 class="text-2xl sm:text-4xl font-bold gold-text mb-4">
            Cara Booking Mudah
          </h2>
          <p
            class="text-sm sm:text-lg text-gray-400 max-w-2xl mx-auto mb-10 sm:mb-16"
          >
            Hanya dengan 3 langkah sederhana, mobil Anda akan kembali berkilau.
          </p>
        </div>

        <!-- Grid Langkah-Langkah -->
        <div
          class="flex flex-col md:flex-row items-center justify-center gap-8 md:gap-16"
        >
          <!-- Langkah 1 -->
          <div
            class="flex flex-col items-center fade-in-section"
            style="transition-delay: 100ms"
          >
            <div
              class="bg-gray-800 border-2 border-yellow-500/30 w-20 h-20 sm:w-24 sm:h-24 flex items-center justify-center rounded-full text-yellow-400 text-2xl sm:text-3xl font-bold mb-4"
            >
              1
            </div>
            <h3 class="text-base sm:text-xl font-semibold text-white mb-2">
              Pilih Jadwal & Layanan
            </h3>
            <p class="text-sm sm:text-base text-gray-400 max-w-xs">
              Tentukan waktu dan paket detailing yang sesuai dengan kebutuhan
              Anda.
            </p>
          </div>

          <!-- Panah Penghubung -->
          <!-- Desktop: kanan, Mobile: bawah -->
          <div class="fade-in-section" style="transition-delay: 200ms">
            <!-- Panah Kanan (desktop) -->
            <div class="hidden md:block text-yellow-500/50">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-12 w-12"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
                stroke-width="2"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  d="M17 8l4 4m0 0l-4 4m4-4H3"
                />
              </svg>
            </div>
            <!-- Panah Bawah (mobile) -->
            <div class="block md:hidden text-yellow-500/50">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-8 w-8 mx-auto my-2"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
                stroke-width="2"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  d="M8 17l4 4m0 0l4-4m-4 4V3"
                />
              </svg>
            </div>
          </div>

          <!-- Langkah 2 -->
          <div
            class="flex flex-col items-center fade-in-section"
            style="transition-delay: 300ms"
          >
            <div
              class="bg-gray-800 border-2 border-yellow-500/30 w-20 h-20 sm:w-24 sm:h-24 flex items-center justify-center rounded-full text-yellow-400 text-2xl sm:text-3xl font-bold mb-4"
            >
              2
            </div>
            <h3 class="text-base sm:text-xl font-semibold text-white mb-2">
              Konfirmasi Pesanan
            </h3>
            <p class="text-sm sm:text-base text-gray-400 max-w-xs">
              Tim kami akan menghubungi Anda untuk konfirmasi detail pesanan dan
              lokasi.
            </p>
          </div>

          <!-- Panah Penghubung -->
          <!-- Desktop: kanan, Mobile: bawah -->
          <div class="fade-in-section" style="transition-delay: 200ms">
            <!-- Panah Kanan (desktop) -->
            <div class="hidden md:block text-yellow-500/50">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-12 w-12"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
                stroke-width="2"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  d="M17 8l4 4m0 0l-4 4m4-4H3"
                />
              </svg>
            </div>
            <!-- Panah Bawah (mobile) -->
            <div class="block md:hidden text-yellow-500/50">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-8 w-8 mx-auto my-2"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
                stroke-width="2"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  d="M8 17l4 4m0 0l4-4m-4 4V3"
                />
              </svg>
            </div>
          </div>

          <!-- Langkah 3 -->
          <div
            class="flex flex-col items-center fade-in-section"
            style="transition-delay: 500ms"
          >
            <div
              class="bg-gray-800 border-2 border-yellow-500/30 w-20 h-20 sm:w-24 sm:h-24 flex items-center justify-center rounded-full text-yellow-400 text-2xl sm:text-3xl font-bold mb-4"
            >
              3
            </div>
            <h3 class="text-base sm:text-xl font-semibold text-white mb-2">
              Nikmati Hasilnya
            </h3>
            <p class="text-sm sm:text-base text-gray-400 max-w-xs">
              Duduk santai sementara kami menyulap mobil Anda menjadi seperti
              baru.
            </p>
          </div>
        </div>
      </div>
    </section>
    <!-- Call to Action Section -->
    <section id="booking-cta" class="py-20 bg-black">
    <div class="container mx-auto px-6">
        <div class="bg-[#1a1a1a] rounded-xl shadow-lg overflow-hidden md:flex items-center">
            
            {{-- 1. TAMBAHKAN PADDING DI SINI (contoh: p-8) --}}
            <div class="md:w-1/2 p-8 fade-in-section" style="transition-delay: 100ms">
                <img
                    src="{{ $pageSettings?->cta_image ? asset('storage/' . $pageSettings->cta_image) : asset('assets/images/icons/ic-promolaundry1.jpg') }}"
                    alt="Detailing mobil mewah"
                    {{-- 2. TAMBAHKAN SUDUT TUMPUL (rounded-lg) --}}
                    class="h-full w-full object-cover rounded-lg shadow-lg"
                />
            </div>

            <div class="md:w-1/2 p-12 text-center md:text-left fade-in-section" style="transition-delay: 200ms">
                <h2 class="text-4xl font-bold gold-text mb-4">
                    Pesan Perawatan Premium Anda
                </h2>
                <p class="text-lg text-gray-400 mb-8">
                    Jadwalkan layanan detailing Anda hari ini dan biarkan para ahli
                    kami mengembalikan kesempurnaan kendaraan Anda.
                </p>
                <a
                    href="{{ route('carwash.booking.index') }}"
                    class="inline-block gold-bg text-black font-bold py-4 px-10 rounded-lg text-lg gold-bg-hover transition-transform transform hover:scale-105 shadow-lg shadow-yellow-500/20"
                >
                    Booking Sekarang
                </a>
            </div>
        </div>
    </div>
</section>

    <footer class="bg-black py-8">
      <div class="container mx-auto px-6 text-center text-gray-500">
        <p>&copy; 2025 Car Wash. All Rights Reserved.</p>
      </div>
    </footer>

    <script>
      // PRELOADER SCRIPT
      window.addEventListener("load", () => {
        const preloader = document.getElementById("preloader");
        if (preloader) {
          // Start the fade out
          preloader.style.opacity = "0";
          // Remove from layout after transition
          setTimeout(() => {
            preloader.style.display = "none";
          }, 500);
        }
      });

      // MODAL FUNCTIONS
      function toggleLoginModal() {
        document.getElementById("loginModal").classList.toggle("hidden");
      }
      function toggleRegisterModal() {
        document.getElementById("registerModal").classList.toggle("hidden");
      }

      // MOBILE MENU TOGGLE
      document
        .getElementById("mobile-menu-button")
        .addEventListener("click", () => {
          document.getElementById("mobile-menu").classList.toggle("hidden");
        });

      // SLIDER SCRIPT
      document.addEventListener("DOMContentLoaded", () => {
        const slider = document.getElementById("slider");
        if (!slider) return; // Exit if slider not found
        const slides = slider.children;
        const totalSlides = slides.length;
        const dotContainer = document.getElementById("sliderDots");
        let currentSlide = 0;
        let autoPlayInterval;

        // Create dots
        for (let i = 0; i < totalSlides; i++) {
          const dot = document.createElement("div");
          dot.classList.add("slider-dot");
          dot.addEventListener("click", () => {
            goToSlide(i);
          });
          dotContainer.appendChild(dot);
        }
        const dots = dotContainer.children;

        function updateSlide() {
          slider.style.transform = `translateX(-${currentSlide * 100}vw)`;
          // Update dot active state
          for (let i = 0; i < dots.length; i++) {
            dots[i].classList.toggle("active", i === currentSlide);
          }
        }

        function goToSlide(slideIndex) {
          currentSlide = slideIndex;
          updateSlide();
          resetAutoPlay();
        }

        function nextSlide() {
          currentSlide = (currentSlide + 1) % totalSlides;
          updateSlide();
        }

        function prevSlide() {
          currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
          updateSlide();
        }

        function startAutoPlay() {
          autoPlayInterval = setInterval(nextSlide, 5000);
        }

        function resetAutoPlay() {
          clearInterval(autoPlayInterval);
          startAutoPlay();
        }

        // Event Listeners for arrows
        document
          .getElementById("next-slide-btn")
          .addEventListener("click", () => {
            nextSlide();
            resetAutoPlay();
          });
        document
          .getElementById("prev-slide-btn")
          .addEventListener("click", () => {
            prevSlide();
            resetAutoPlay();
          });

        // Initialize
        updateSlide();
        startAutoPlay();
      });

      // SCROLL ANIMATION (Re-triggering)
      const animatedSections = document.querySelectorAll(".fade-in-section");
      const observer = new IntersectionObserver(
        (entries) => {
          entries.forEach((entry) => {
            if (entry.isIntersecting) {
              entry.target.classList.add("is-visible");
            } else {
              entry.target.classList.remove("is-visible");
            }
          });
        },
        {
          threshold: 0.15, // Trigger when 15% of the element is visible
        }
      );

      animatedSections.forEach((section) => {
        observer.observe(section);
      });

      window.addEventListener("load", function () {
        const loader = document.getElementById("loader");
        loader.classList.add("opacity-0");
        setTimeout(() => {
          loader.classList.add("hidden");
        }, 1000);
      });

      // Mobile Dropdown
      function toggleMobileDropdown() {
        const dropdown = document.getElementById("mobile-dropdown-menu");
        const icon = document.getElementById("mobile-dropdown-icon");
        dropdown.classList.toggle("hidden");
        icon.classList.toggle("rotate-180");
      }
    </script>
  </body>
</html>
