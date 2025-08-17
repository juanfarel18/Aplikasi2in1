import "../css/input.css";

function toggleLoginModal() {
  document.getElementById("loginModal").classList.toggle("hidden");
}
function toggleRegisterModal() {
  document.getElementById("registerModal").classList.toggle("hidden");
}
function toggleMobileMenu() {
  const menu = document.getElementById("mobileMenu");
  menu.classList.toggle("translate-x-full");
  menu.classList.toggle("translate-x-0");
}

function toggleMobileDropdown() {
  const dropdown = document.getElementById("mobileDropdownMenu");
  const icon = document.getElementById("dropdownIcon");
  dropdown.classList.toggle("hidden");
  icon.classList.toggle("rotate-180");
}
//navbar sembunyi
let lastScrollTop = 0;
let navbar = document.getElementById("navbar");
let isScrollingDown = false;

window.addEventListener("scroll", () => {
  const scrollTop = window.pageYOffset || document.documentElement.scrollTop;

  if (Math.abs(scrollTop - lastScrollTop) > 10) {
    // hanya deteksi jika beda > 10px
    if (scrollTop > lastScrollTop && scrollTop > 100) {
      // Scroll ke bawah dan sudah agak jauh → sembunyikan navbar
      if (!isScrollingDown) {
        navbar.classList.add("-translate-y-full");
        isScrollingDown = true;
      }
    } else {
      // Scroll ke atas → tampilkan navbar
      if (isScrollingDown) {
        navbar.classList.remove("-translate-y-full");
        isScrollingDown = false;
      }
    }
    lastScrollTop = scrollTop <= 0 ? 0 : scrollTop;
  }
});

window.addEventListener("load", () => {
  const slider = document.getElementById("slider");
  const slides = slider.children;
  let currentSlide = 0;
  const totalSlides = slides.length;

  function updateSlide(animated = true) {
    slider.style.transition = animated ? "transform 0.7s ease-in-out" : "none";
    slider.style.transform = `translateX(-${currentSlide * 100}vw)`;
  }

  function nextSlide() {
    currentSlide = (currentSlide + 1) % totalSlides;
    updateSlide();
  }

  function prevSlide() {
    currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
    updateSlide();
  }

  slider.classList.remove("opacity-0");
  window.nextSlide = nextSlide;
  window.prevSlide = prevSlide;
  setInterval(nextSlide, 5000);
});

window.addEventListener("load", () => {
  const slider = document.getElementById("slider");
  const slides = slider.children;
  const totalSlides = slides.length;
  let currentSlide = 0;

  const dotContainer = document.getElementById("sliderDots");

  // Buat indikator dot
  for (let i = 0; i < totalSlides; i++) {
    const dot = document.createElement("div");
    dot.classList.add("slider-dot");
    if (i === 0) dot.classList.add("active");
    dotContainer.appendChild(dot);
  }

  const dots = dotContainer.children;

  function updateSlide(animated = true) {
    slider.style.transition = animated ? "transform 0.7s ease-in-out" : "none";
    slider.style.transform = `translateX(-${currentSlide * 100}vw)`;

    // Update active dot
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

  // Tampilkan pertama kali tanpa animasi
  updateSlide(false);
  setTimeout(() => {
    slider.classList.add("animate");
  }, 100);

  // Auto slide
  setInterval(nextSlide, 5000);

  // Expose ke tombol
  window.nextSlide = nextSlide;
  window.prevSlide = prevSlide;
});
// Observer untuk elemen scroll umum
const observerScroll = new IntersectionObserver(
  (entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        entry.target.classList.add("visible");
      } else {
        entry.target.classList.remove("visible"); // supaya bisa muncul berkali-kali saat scroll
      }
    });
  },
  {
    threshold: 0.3,
  }
);

document
  .querySelectorAll(".scroll-animate, .scroll-animate-right")
  .forEach((el) => {
    observerScroll.observe(el);
  });

// Observer untuk fade-in dari atas dan dari tengah (pudar zoom)
document.addEventListener("DOMContentLoaded", () => {
  const observerFade = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          entry.target.classList.add("show");
        } else {
          entry.target.classList.remove("show");
        }
      });
    },
    { threshold: 0.1 }
  );

  document
    .querySelectorAll(".fade-in-top, .fade-in-center")
    .forEach((el) => observerFade.observe(el));
});

function toggleMenu() {
  const menuContainer = document.getElementById("mobileMenu");
  const menuContent = document.getElementById("mobileMenuContent");

  if (menuContainer.classList.contains("hidden")) {
    // Tampilkan menu
    menuContainer.classList.remove("hidden");
    // Sedikit delay agar transisi terlihat
    setTimeout(() => {
      menuContent.classList.remove("translate-x-full");
    }, 10);
  } else {
    // Sembunyikan menu
    menuContent.classList.add("translate-x-full");
    // Tunggu animasi selesai sebelum menyembunyikan container
    setTimeout(() => {
      menuContainer.classList.add("hidden");
    }, 300); // 300ms sesuai durasi transisi
  }
}

//loading
window.addEventListener("load", () => {
  const loader = document.getElementById("loader");
  loader.classList.add("opacity-0", "pointer-events-none");
  setTimeout(() => (loader.style.display = "none"), 800);
});
