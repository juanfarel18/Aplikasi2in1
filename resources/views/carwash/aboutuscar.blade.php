<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Car Wash</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Poppins:wght@300;400;600&display=swap" rel="stylesheet" />
    <style>
      html, body {
        overflow-x: hidden;
        margin: 0;
        padding: 0;
        font-family: "Poppins", sans-serif;
        background: #121212;
        color: #e0e0e0;
      }
      h1,h2,h3 { font-family: "Playfair Display", serif; }
      .gold-text { color: #d4af37; }
      .gold-border { border-color: #d4af37; }
      .gold-bg { background-color: #d4af37; }
      .gold-bg-hover:hover { background-color: #b89b32; }
      .fade-in-section { opacity:0; transform:translateY(40px); transition:opacity 0.8s cubic-bezier(0.175,0.885,0.32,1.275), transform 0.8s cubic-bezier(0.175,0.885,0.32,1.275);}
      .fade-in-section.is-visible { opacity:1; transform:translateY(0);}
      #loginModal>div,#registerModal>div { animation:zoomIn 0.3s ease; }
      @keyframes zoomIn { from{opacity:0; transform:scale(0.9);} to{opacity:1; transform:scale(1);} }
      .delay-0 { animation-delay:0ms; }
      .delay-150 { animation-delay:150ms; }
      .delay-300 { animation-delay:300ms; }
      @keyframes shimmer { 0%{transform:translateX(-100%);} 100%{transform:translateX(100%);} }
      .animate-shimmer { animation:shimmer 1.5s infinite; background-size:200% 100%; }
      input[type="radio"]:checked + label { border-color:#d4af37; box-shadow:0 0 15px rgba(212,175,55,0.3);}
      @media (max-width:640px){ h1{font-size:1.75rem;} h2{font-size:1.5rem;} p{font-size:0.875rem;} }
    </style>
</head>
<body class="bg-[#121212]">

<!-- Loader -->
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

<!-- Navbar -->
<header class="bg-black/80 backdrop-blur-sm sticky top-0 z-40 text-white">
  <nav class="container mx-auto px-6 py-4 flex justify-between items-center">
    <a href="index-carwash.html" class="text-2xl font-bold text-yellow-500 hover:text-yellow-400 transition" style="font-family: 'Playfair Display', serif">Car Wash</a>
    <div class="hidden md:flex items-center space-x-6">
      <div class="relative group">
        <button class="inline-flex items-center gap-1 font-semibold text-yellow-500 border-b-2 border-yellow-500 pb-1 hover:text-white hover:border-white transition duration-300">
          <a href="index-carwash.html">Home</a>
          <svg class="w-4 h-4 transform transition-transform duration-300 group-hover:rotate-180" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
          </svg>
        </button>
        <div class="absolute mt-2 w-40 bg-white shadow-lg border border-gray-200 rounded-xl opacity-0 group-hover:opacity-100 invisible group-hover:visible transition-all duration-300 z-50">
          <a href="index.html" class="block px-4 py-3 text-sm text-gray-700 hover:bg-yellow-100 hover:text-yellow-600 rounded-t-xl transition">Home Page</a>
          <a href="aboutuscar.html" class="block px-4 py-3 text-sm md:text-base text-yellow-600 bg-yellow-100 font-semibold transition">About Us</a>
          <a href="contactuscar.html" class="block px-4 py-3 text-sm text-gray-700 hover:bg-yellow-100 hover:text-yellow-600 rounded-b-xl transition">Contact Us</a>
        </div>
      </div>
      <a href="transaction-car.html" class="text-gray-300 hover:text-yellow-500 transition">My Transaction</a>
      <a href="booking-car.html" class="text-gray-300 hover:text-yellow-500 transition">Booking</a>
      <a href="galeri-car.html" class="text-gray-300 hover:text-yellow-500 transition">Galeri</a>
      <a href="price-list-car.html" class="text-gray-300 hover:text-yellow-500 transition">Price List</a>
      <a href="profile-car.html" class="text-gray-300 hover:text-yellow-500 transition">Profile</a>
      <div class="flex space-x-3">
        <button onclick="toggleLoginModal()" class="border border-yellow-500 text-yellow-500 px-4 py-1.5 rounded-lg hover:bg-yellow-500 hover:text-black transition">Login</button>
        <button onclick="toggleRegisterModal()" class="bg-yellow-500 text-black px-4 py-1.5 rounded-lg hover:bg-black hover:text-yellow-500 border border-yellow-500 transition">Daftar</button>
      </div>
    </div>
    <button id="mobile-menu-button" class="md:hidden text-white">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"/>
      </svg>
    </button>
  </nav>

  <div id="mobile-menu" class="hidden md:hidden bg-black/90 p-4 space-y-2">
    <div class="relative">
      <button onclick="toggleMobileDropdown()" class="w-full flex justify-between items-center text-gray-300 hover:text-yellow-500 transition py-2">
        <a href="index-carwash.html" class="block py-2 text-yellow-500 font-semibold">Home</a>
        <svg id="mobile-dropdown-icon" class="w-4 h-4 transform transition-transform duration-300" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
        </svg>
      </button>
      <div id="mobile-dropdown-menu" class="hidden pl-4 mt-2 space-y-2">
        <a href="index.html" class="block text-sm text-gray-400 hover:text-yellow-500 transition">Home Page</a>
        <a href="aboutuscar.html" class="block py-2 text-yellow-500 font-semibold">About Us</a>
        <a href="contactuscar.html" class="block text-sm text-gray-400 hover:text-yellow-500 transition">Contact Us</a>
      </div>
    </div>
    <a href="transaction-car.html" class="block py-2 text-gray-300 hover:text-yellow-500 transition">My Transaction</a>
    <a href="booking-car.html" class="block py-2 text-gray-300 hover:text-yellow-500 transition">Booking</a>
    <a href="galeri-car.html" class="block py-2 text-gray-300 hover:text-yellow-500 transition">Galeri</a>
    <a href="price-list-car.html" class="block py-2 text-gray-300 hover:text-yellow-500 transition">Price List</a>
    <a href="profile-car.html" class="block py-2 text-gray-300 hover:text-yellow-500 transition">Profile</a>
    <div class="pt-4 space-y-2 border-t border-gray-700">
      <button onclick="toggleLoginModal()" class="w-full border border-yellow-500 text-yellow-500 py-2 rounded-lg hover:bg-yellow-500 hover:text-black transition">Login</button>
      <button onclick="toggleRegisterModal()" class="w-full bg-yellow-500 text-black py-2 rounded-lg hover:bg-black hover:text-yellow-500 border border-yellow-500 transition">Daftar</button>
    </div>
  </div>
</header>

<!-- Main Content -->
<main>
  <section class="bg-gradient-to-b from-black via-gray-900 to-[#121212] py-24 sm:py-32 text-center fade-in-section">
    <div class="container mx-auto px-6 lg:px-8">
      <h1 class="text-4xl md:text-6xl font-bold text-yellow-500" style="font-family: 'Playfair Display', serif">Dimulai dari Semangat Kami</h1>
      <p class="mt-4 max-w-2xl mx-auto text-lg sm:text-base text-gray-300">Sebuah awal baru dalam dunia perawatan mobil, khusus untuk Anda.</p>
    </div>
  </section>

  <section class="py-20 sm:py-28 fade-in-section">
    <div class="container mx-auto px-6 lg:px-8 max-w-4xl">
      <h2 class="text-4xl font-bold text-yellow-500 mb-6" style="font-family: 'Playfair Display', serif">Cerita Kami</h2>
      <div class="space-y-4 text-gray-300 text-lg sm:text-base">
        <p>Jujur saja, kami memulai ini karena kami sama seperti Anda: seorang pencinta mobil. Kami tahu rasanya saat melihat mobil kesayangan kotor dan tidak terawat, dan betapa terbatasnya waktu untuk merawatnya dengan benar.</p>
        <p>Kami bukan perusahaan besar. Kami adalah tim kecil yang punya mimpi besar: memberikan layanan cuci mobil yang benar-benar peduli pada detail. Kami ingin Anda merasakan kepuasan yang sama seperti yang kami rasakan saat melihat mobil kembali berkilau sempurna.</p>
        <p>Setiap mobil yang kami tangani, kami kerjakan dengan tangan dan hati-hati, seolah itu adalah milik kami sendiri. Ini adalah janji kami, dari sesama pencinta mobil, untuk Anda.</p>
      </div>
    </div>
  </section>
</main>

<!-- Footer -->
<footer class="bg-black py-8 mt-16">
  <div class="container mx-auto px-6 text-center text-gray-500">
    <p>&copy; 2025 Car Wash. All Rights Reserved.</p>
  </div>
</footer>

<script>
window.addEventListener("load", function() {
  const loader = document.getElementById("loader");
  if(loader){
    loader.classList.add("opacity-0");
    setTimeout(()=>{loader.classList.add("hidden");},1000);
  }
});
function toggleLoginModal(){ alert("Login modal toggle"); }
function toggleRegisterModal(){ alert("Register modal toggle"); }
document.getElementById("mobile-menu-button")?.addEventListener("click",()=>{document.getElementById("mobile-menu").classList.toggle("hidden");});
function toggleMobileDropdown(){ const dropdown=document.getElementById("mobile-dropdown-menu"); const icon=document.getElementById("mobile-dropdown-icon"); dropdown.classList.toggle("hidden"); icon.classList.toggle("rotate-180");}
const animatedSections=document.querySelectorAll(".fade-in-section"); const observer=new IntersectionObserver((entries)=>{entries.forEach(entry=>{if(entry.isIntersecting){entry.target.classList.add("is-visible");}else{entry.target.classList.remove("is-visible");}});},{threshold:0.15}); animatedSections.forEach(section=>observer.observe(section));
</script>
</body>
</html>
