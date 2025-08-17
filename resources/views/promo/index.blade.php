<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Cuciin Ajaaa - Promo</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Google Fonts -->
    <link
      href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@600&display=swap"
      rel="stylesheet"
    />

    <style>
      html,
      body {
        overflow-x: hidden;
        margin: 0;
        padding: 0;
      }
      #slider img {
        width: 100vw;
        height: 70vh;
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

      /* Tambahkan position relative agar gradient overlay bekerja */
      .slider-gradient {
        position: relative;
      }

      /* Gradient overlay (kiri & kanan) */
      .slider-gradient::before,
      .slider-gradient::after {
        content: "";
        position: absolute;
        top: 0;
        bottom: 0;
        width: 60px;
        z-index: 5;
        pointer-events: none;
      }

      .slider-gradient::before {
        left: 0;
        background: linear-gradient(
          to right,
          rgba(255, 255, 255, 1),
          transparent
        );
      }

      .slider-gradient::after {
        right: 0;
        background: linear-gradient(
          to left,
          rgba(255, 255, 255, 1),
          transparent
        );
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
        transition: background-color 0.3s;
        cursor: pointer;
      }
      .slider-dot.active {
        background-color: #f97316;
      }
    </style>
  </head>

  <body class="bg-black text-white font-sans">
    <!-- LOGIN MODAL -->
    <div
      id="loginModal"
      class="fixed inset-0 bg-black/70 flex items-center justify-center z-50 hidden"
    >
      <div
        class="bg-white rounded-lg w-[90%] max-w-sm p-6 relative shadow-lg animate-fadeIn"
      >
        <button
          onclick="toggleLoginModal()"
          class="absolute top-3 right-3 text-black text-xl font-bold hover:text-red-600"
        >
          &times;
        </button>
        <h2 class="text-2xl font-bold text-center text-[#F97316] mb-4">
          Login
        </h2>

        <form method="POST" action="{{ route('login') }}" class="space-y-4">
          @csrf
          <div>
            <label for="email" class="block text-sm font-medium text-gray-700"
              >Email</label
            >
            <input
              type="email"
              name="email"
              id="email"
              required
              class="w-full border rounded px-3 py-2 text-black"
            />
          </div>
          <div>
            <label
              for="password"
              class="block text-sm font-medium text-gray-700"
              >Password</label
            >
            <input
              type="password"
              name="password"
              id="password"
              required
              class="w-full border rounded px-3 py-2 text-black"
            />
          </div>
          <button
            type="submit"
            class="w-full bg-[#F97316] text-white py-2 rounded hover:bg-orange-600 transition"
          >
            Login
          </button>
        </form>

        <p class="text-center mt-4 text-sm text-gray-600">
          Belum punya akun?
          <a href="{{ route('register') }}" class="text-[#F97316] hover:underline">Daftar</a>
        </p>
      </div>
    </div>

    <!-- NAVBAR -->
    <nav
      class="fixed top-0 left-0 right-0 z-50 px-4 py-4 h-20 flex justify-between items-center bg-black"
    >
      <a
        href="{{ url('/') }}"
        class="text-4xl sm:text-5xl text-[#F97316] font-bold"
        style="font-family: 'Dancing Script', cursive"
        >Cuciin Ajaaa</a
      >
      <div class="hidden sm:flex items-center space-x-4">
        <a href="#about" class="hover:text-[#F97316]">About</a>
        <a href="#contact" class="hover:text-[#F97316]">Contact</a>
        <button
          onclick="toggleLoginModal()"
          class="border px-4 py-1.5 rounded hover:bg-[#F97316]"
        >
          Login
        </button>
        <a
          href="{{ route('register') }}"
          class="bg-[#F97316] px-4 py-1.5 rounded hover:bg-orange-600"
          >Daftar</a
        >
        <a
          href="{{ url('/profile') }}"
          id="profileBtn"
          class="hidden border px-4 py-1.5 rounded hover:bg-[#F97316]"
          >Profile</a
        >
      </div>
      <button
        onclick="toggleMenu()"
        class="text-white sm:hidden text-3xl font-bold"
      >
        &#9776;
      </button>
    </nav>

    <!-- MOBILE MENU -->
    <div
      id="mobileMenu"
      class="fixed top-0 right-0 w-3/4 max-w-xs h-auto bg-black/90 z-40 hidden flex flex-col items-center p-6 space-y-6 shadow-lg text-center"
    >
      <button
        onclick="toggleMenu()"
        class="text-white text-3xl absolute top-3 right-4"
      >
        &times;
      </button>
      <div class="pt-12 w-full flex flex-col items-center space-y-4">
        <a href="#about" class="text-white text-lg hover:text-[#F97316]"
          >About</a
        >
        <a href="#contact" class="text-white text-lg hover:text-[#F97316]"
          >Contact</a
        >
        <button
          onclick="toggleLoginModal()"
          class="border px-4 py-1.5 rounded text-white hover:bg-[#F97316]"
        >
          Login
        </button>
        <a
          href="{{ route('register') }}"
          class="bg-[#F97316] text-white px-4 py-1.5 rounded hover:bg-orange-600"
          >Daftar</a
        >
      </div>
    </div>

    <!-- HERO SLIDER -->
    <section class="pt-20 relative bg-white">
      <div class="relative overflow-hidden w-screen h-[70vh] slider-gradient">
        <div
          id="slider"
          class="flex"
          style="width: {{ count($sliders ?? []) * 100 }}vw; transform: translateX(0);"
        >
          @foreach ($sliders ?? [] as $slider)
            <a href="{{ $slider->link ?? '#' }}" class="flex-shrink-0 w-screen h-full block">
                <img
                    src="{{ asset('storage/' . $slider->image_path) }}"
                    alt="{{ $slider->title ?? 'Slider Image' }}"
                    class="w-screen h-full object-cover"
                />
            </a>
        @endforeach
        </div>

        <!-- Arrows -->
        <button
          onclick="prevSlide()"
          class="absolute top-1/2 left-4 -translate-y-1/2 bg-black/40 hover:bg-black/70 text-white p-2 rounded-full z-10"
        >
          &#10094;
        </button>
        <button
          onclick="nextSlide()"
          class="absolute top-1/2 right-4 -translate-y-1/2 bg-black/40 hover:bg-black/70 text-white p-2 rounded-full z-10"
        >
          &#10095;
        </button>

        <!-- Bullet indicators -->
        <div id="sliderDots" class="slider-dots"></div>
      </div>
    </section>

    <!-- ABOUT -->
    <section id="about" class="py-12 px-4 sm:px-8 bg-black">
      <div class="container mx-auto">
        <h2 class="text-3xl font-bold text-center text-[#F97316] mb-6">
          Choose Menu
        </h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
          <a
            href="{{ url('indexlaundry') }}"
            class="group text-center bg-white/90 border rounded-xl p-4 transition hover:bg-[#F97316]"
          >
            <img
              src="{{ asset('assets/images/icons/ic-ldr1.png') }}"
              class="w-16 h-16 mx-auto mb-3"
              alt="Laundry"
            />
            <h3 class="text-lg font-semibold text-gray-800 mb-1">Laundry</h3>
            <p class="text-sm text-gray-600">Layanan 1 Hari Jadi</p>
          </a>
         <a
    href="{{ route('carwash.page') }}"
    class="group text-center bg-white/90 border rounded-xl p-4 transition hover:bg-[#F97316]">
    <img
      src="{{ asset('assets/images/icons/ic-car1.png') }}"
      class="w-16 h-16 mx-auto mb-3"
      alt="Car Wash"
    />
    <h3 class="text-lg font-semibold text-gray-800 mb-1">Car Wash</h3>
    <p class="text-sm text-gray-600">
      Spesialis cuci mobil dari rumah ke rumah
    </p>
</a>

        </div>
      </div>
    </section>

    <!-- CONTACT -->
    <section id="contact" class="py-12 px-4 sm:px-8 bg-[#0d0d0d]">
      <div class="container mx-auto text-center">
        <h2 class="text-3xl font-bold text-[#F97316] mb-4">Contact Us</h2>
        <p class="text-gray-300">Hubungi kami untuk info lebih lanjut.</p>
      </div>
    </section>

    <!-- SCRIPT -->
    <script>
      window.addEventListener("load", () => {
        const slider = document.getElementById("slider");
        const slides = slider.children;
        const totalSlides = slides.length;
        let currentSlide = 0;

        const dotContainer = document.getElementById("sliderDots");

        // Create dots
        for (let i = 0; i < totalSlides; i++) {
          const dot = document.createElement("div");
          dot.classList.add("slider-dot");
          if (i === 0) dot.classList.add("active");
          dotContainer.appendChild(dot);

          dot.addEventListener("click", () => {
            currentSlide = i;
            updateSlide();
          });
        }

        const dots = dotContainer.children;

        function updateSlide(animated = true) {
          slider.style.transition = animated
            ? "transform 0.7s ease-in-out"
            : "none";
          slider.style.transform = `translateX(-${currentSlide * 100}vw)`;

          // Update dot active state
          for (let i = 0; i < dots.length; i++) {
            dots[i].classList.toggle("active", i === currentSlide);
          }
        }

        function nextSlide() {
          currentSlide = (currentSlide + 1) % totalSlides;
          updateSlide();
        }

        function prevSlide() {
          currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
          updateSlide();
        }

        // Show first slide without animation
        updateSlide(false);
        setTimeout(() => {
          slider.classList.add("animate");
        }, 100);

        // Auto play every 5 seconds
        setInterval(nextSlide, 5000);

        // Global controls for buttons
        window.nextSlide = nextSlide;
        window.prevSlide = prevSlide;
      });

      // Toggle login modal visibility
      function toggleLoginModal() {
        const modal = document.getElementById("loginModal");
        modal.classList.toggle("hidden");
      }

      // Toggle mobile menu visibility
      function toggleMenu() {
        const menu = document.getElementById("mobileMenu");
        menu.classList.toggle("hidden");
      }
    </script>
  </body>
</html>
